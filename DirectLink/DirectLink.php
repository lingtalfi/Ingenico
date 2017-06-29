<?php


namespace Ingenico\DirectLink;


use Bat\HttpTool;
use Ingenico\Exception\IngenicoException;
use Ingenico\Config\IngenicoConfigInterface;

use Ingenico\Request\Result\StandardIngenicoRequestResultInterface;
use Ingenico\Util\IngenicoUtil;


class DirectLink implements DirectLinkInterface
{
    /**
     * @var IngenicoConfigInterface
     */
    private $config;


    public function __construct(IngenicoConfigInterface $config)
    {
        $this->config = $config;
    }

    public function maintenanceRequest(array $data, $isTest = false)
    {

        $data = array_merge($this->config->getValues(), $data);

        IngenicoUtil::checkMandatoryKeys([
            "AMOUNT",
            "OPERATION",
        ], $data);

        if (
            false === array_key_exists("ORDERID", $data) &&
            false === array_key_exists("PAYID", $data)
        ) {
            throw new IngenicoException("Missing mandatory key: either ORDERID or PAYID should be set");
        }


        $passPhrase = $this->config->getPassPhrase();
        if (false !== $passPhrase) {
            $sign = IngenicoUtil::createShaSignature($data, $passPhrase);
            $data["SHASIGN"] = $sign;
        }


        if (false === $isTest) {
            // https://payment-services.ingenico.com/int/en/ogone/support/guides/integration%20guides/directlink/maintenance
            $url = 'https://secure.ogone.com/ncol/prod/maintenancedirect.asp';
        } else {
            $url = 'https://ogone.test.v-psp.com/ncol/test/maintenancedirect.asp';
        }

        return $this->request($url, $data);
    }


    /**
     * @param array $data
     * @return StandardIngenicoRequestResultInterface
     * @throws IngenicoException
     */
    public function orderRequest(array $data, $isTest = false)
    {


        /**
         * "CARDNO",
         * "ED",
         * "CVC",
         * "ORDERID",
         * "AMOUNT", // x100
         * "CURRENCY",
         *
         * // https://payment-services.ingenico.com/fr/fr/ogone/support/guides/integration%20guides/directlink
         * "OPERATION", // RES,SAL,RFD,PAU
         *
         *
         */
        $data = array_merge($this->config->getValues(), $data);

        IngenicoUtil::checkMandatoryKeys([
            "PSPID",
            "USERID",
            "PSWD",
            //
            /**
             *
             */
        ], $data);


        $passPhrase = $this->config->getPassPhrase();
        if (false !== $passPhrase) {
            $sign = IngenicoUtil::createShaSignature($data, $passPhrase);
            $data["SHASIGN"] = $sign;
        }


        if (false === $isTest) {
            // https://payment-services.ingenico.com/fr/fr/ogone/support/guides/integration%20guides/directlink
            $url = 'https://secure.ogone.com/ncol/prod/orderdirect.asp';
        } else {
            $url = 'https://ogone.test.v-psp.com/ncol/test/orderdirect.asp';
        }

        return $this->request($url, $data);
    }


    /**
     *
     * https://payment-services.ingenico.com/int/en/ogone/support/guides/integration%20guides/directlink-3-d
     *
     *
     * @param array $data
     * @return StandardIngenicoRequestResultInterface
     * @throws IngenicoException
     */
    public function orderRequest3d(array $data, $isTest = false)
    {

        $options = [
//            "ACCEPTURL" => "https://monplanning.ovh/back.php?type=accept",
//            "DECLINEURL" => "https://monplanning.ovh/back.php?type=accept",
//            "EXCEPTIONURL" => "https://monplanning.ovh/back.php?type=accept",
//            "PARAMPLUS" => "pou=6",
//            "COMPLUS" => "pooo",
//            "LANGUAGE" => "en_US",
            "ACCEPTURL" => "",
            "DECLINEURL" => "",
            "EXCEPTIONURL" => "",
            "PARAMPLUS" => "",
            "COMPLUS" => "",
            "LANGUAGE" => "",
        ];
        $data = array_merge($options, $data);
        $data = array_merge($this->config->getValues(), $data);
        $data['FLAG3D'] = "Y";
        $data['HTTP_ACCEPT'] = (array_key_exists('HTTP_ACCEPT', $_SERVER)) ? $_SERVER['HTTP_ACCEPT'] : "*/*";
        $data['HTTP_USER_AGENT'] = (array_key_exists('HTTP_USER_AGENT', $_SERVER)) ? $_SERVER['HTTP_USER_AGENT'] : "not found";
        $data['WIN3DS'] = "MAINW";


        IngenicoUtil::checkMandatoryKeys([
            "PSPID",
            "USERID",
            "PSWD",
            //
            "ORDERID",
            "AMOUNT", // x100
            "CURRENCY",
            "CARDNO",
            "ED",
            "CVC",
            // https://payment-services.ingenico.com/fr/fr/ogone/support/guides/integration%20guides/directlink
            "OPERATION", // RES,SAL,RFD,PAU
        ], $data);


        $passPhrase = $this->config->getPassPhrase();
        if (false !== $passPhrase) {
            $sign = IngenicoUtil::createShaSignature($data, $passPhrase);
            $data["SHASIGN"] = $sign;
        }


        if (false === $isTest) {
            // https://payment-services.ingenico.com/fr/fr/ogone/support/guides/integration%20guides/directlink
            $url = 'https://secure.ogone.com/ncol/prod/orderdirect.asp';
        } else {
            $url = 'https://ogone.test.v-psp.com/ncol/test/orderdirect.asp';
        }

        return $this->request($url, $data);
    }



    //--------------------------------------------
    //
    //--------------------------------------------
    private function request($url, array $data)
    {
        if (false !== ($xml = HttpTool::post($url, $data))) {
            return IngenicoUtil::xmlToResult($xml);
        } else {
            throw new IngenicoException("The request failed");
        }
    }
}