<?php


namespace Ling\Ingenico\FlexCheckout;


use Ling\Bat\HttpTool;
use Ling\Ingenico\Config\IngenicoConfigInterface;
use Ling\Ingenico\Exception\IngenicoException;
use Ling\Ingenico\Util\IngenicoUtil;

class FlexCheckout implements FlexCheckoutInterface
{

    /**
     * @var IngenicoConfigInterface
     */
    private $config;


    public function __construct(IngenicoConfigInterface $config)
    {
        $this->config = $config;
    }


    public function injectFlexFormToIframe($iFrameName, array $data, $isTest = false)
    {
        if (false === $isTest) {
            $url = 'https://secure.ogone.com/Tokenization/HostedPage';
        } else {
            $url = 'https://ogone.test.v-psp.com/Tokenization/HostedPage?';

        }

        $formId = "tandogzeo";
        $conf = $this->config->getValues();


        //--------------------------------------------
        // creating the data set
        //--------------------------------------------
        // https://payment-services.ingenico.com/int/en/ogone/support/guides/integration%20guides/flexcheckout/integrating%20flexcheckout%20as%20a%20tokenization%20page
        $data = array_merge([
            'CARD.BRAND' => "",
            'CARD.PAYMENTMETHOD' => "",
            'ALIAS.ORDERID' => "",
            'ALIAS.STOREPERMANENTLY' => "",
            'PARAMETERS.ACCEPTURL' => "",
            'PARAMETERS.EXCEPTIONURL' => "",
            'PARAMETERS.DECLINEURL' => "",
        ], $data);
        $data['ACCOUNT.PSPID'] = $conf['PSPID'];

        /**
         * Wrong Signature
         * String to Hash:
         * ACCOUNT.PSPID=Leaderfitequipement
         * ALIAS.ORDERID=checkoutogone4
         * ALIAS.STOREPERMANENTLY=Y
         * CARD.BRAND=VISA
         * CARD.PAYMENTMETHOD=CreditCard
         * PARAMETERS.ACCEPTURL=https://monplanning.ovh/back.php?myaccepted-deferred
         * PARAMETERS.EXCEPTIONURL=https://monplanning.ovh/back.php?myaccepted-deferred
         */


        $passPhrase = $this->config->getPassPhrase();
        if (false !== $passPhrase) {
            $dataToHash = $data;
            unset($dataToHash["PARAMETERS.DECLINEURL"]);
            $sign = IngenicoUtil::createShaSignature($dataToHash, $passPhrase);
            $data["SHASIGN"] = $sign;
        }

        $s = $this->line('<form action="' . $url . '" method="post" target="' . $iFrameName . '" id="' . $formId . '">');

        foreach ($data as $k => $v) {
            $s .= $this->line('<input type="text" name="' . $k . '" value="' . $v . '">');
        }
        $s .= $this->line('</form>');


        $s .= "\n";
        $s .= "\n";
        $s .= $this->line('<script>');
        $s .= $this->line(<<<EEE
    document.addEventListener("DOMContentLoaded", function (event) {
        var form = document.getElementById('$formId');
        form.submit();
        form.parentNode.removeChild(form);
    });
EEE
        );
        $s .= $this->line('</script>');


        return $s;
    }




    private function line($s)
    {
        return $s . "\n";
    }
}