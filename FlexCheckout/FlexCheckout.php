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
        ], $data);


        $data['ACCOUNT.PSPID'] = $values['PSPID'];
        $data['ACCOUNT.PSPID'] = $values['PSPID'];

        if (false === $isTest) {
            $url = 'https://secure.ogone.com/Tokenization/HostedPage';
        } else {
            $url = 'https://ogone.test.v-psp.com/Tokenization/HostedPage';

        }


        $passPhrase = $this->config->getPassPhrase();
        if (false !== $passPhrase) {
            $sign = IngenicoUtil::createShaSignature($data, $passPhrase);
            $data["SHASIGNATURE.SHASIGN"] = $sign;
        }

//        az($data);
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