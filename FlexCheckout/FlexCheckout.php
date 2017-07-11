<?php


namespace Ingenico\FlexCheckout;


use Bat\HttpTool;
use Ingenico\Config\IngenicoConfigInterface;
use Ingenico\Exception\IngenicoException;
use Ingenico\Util\IngenicoUtil;

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
    });
EEE
        );
        $s .= $this->line('</script>');


        return $s;
    }


    /**
     * Deprecated: doesn't work
     */
    public function getFlexForm(array $data, $isTest = false)
    {

        $values = $this->config->getValues();


        $data = array_merge([
            'CARD.BRAND' => "",
            'PARAMETERS.ACCEPTURL' => "",
            'PARAMETERS.EXCEPTIONURL' => "",
            /**
             * Important note: at the time of writing,
             * the parameters.DECLILNEURL must be present
             * in the request (otherwise the form won't be displayed),
             * but not present in the SHASIGN (I know, this sounds crazy,
             * I suppose this is a bug from them).
             *
             * This is not found in this doc (at the time of writing):
             * https://payment-services.ingenico.com/int/en/ogone/support/guides/integration%20guides/flexcheckout/integrating%20flexcheckout%20as%20a%20tokenization%20page
             */
            'PARAMETERS.DECLINEURL' => "",
        ], $data);


        $data['ACCOUNT.PSPID'] = $values['PSPID'];


        if (false === $isTest) {
            $url = 'https://secure.ogone.com/Tokenization/HostedPage';
        } else {
            $url = 'https://ogone.test.v-psp.com/Tokenization/HostedPage';

        }


        $passPhrase = $this->config->getPassPhrase();
        if (false !== $passPhrase) {

            $dataToHash = $data;
            unset($dataToHash["PARAMETERS.DECLINEURL"]);

            $sign = IngenicoUtil::createShaSignature($dataToHash, $passPhrase);
            $data["SHASIGNATURE.SHASIGN"] = $sign;
        }

        return $this->doRequest($url, $data);
    }


    //--------------------------------------------
    //
    //--------------------------------------------
    private function doRequest($url, array $data)
    {
        if (false !== ($html = HttpTool::post($url, $data))) {
            $formAction = "/Tokenization/HostedPage/ProcessCreditCardForm"; // change it with str_replace?
            return $html;
        } else {
            throw new IngenicoException("The request failed");
        }
    }


    private function line($s)
    {
        return $s . "\n";
    }
}