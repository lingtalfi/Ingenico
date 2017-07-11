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
}