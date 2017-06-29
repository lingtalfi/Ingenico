<?php


namespace Ingenico\Config;


interface IngenicoConfigInterface
{

    /**
     * @return array of config key => value
     * - PSPID:
     * - PSWD:
     * - USERID:
     *
     */
    public function getValues();

    /**
     * @return false|string, the passphrase set in your ingenico backoffice
     *                  in: Configuration
     *                          > Technical Information
     *                              > Data and origin verification
     *
     * @param string $type , the passPhrase type.
     *                  It can be one of the following:
     *                      - ecommerce
     *                      - directlink
     *                  Those are configured in your ingenico backoffice (v04.121 in 2017-06) in:
     *                      configuration > technical information > data and origin verification
     *
     */
    public function getPassPhrase($type = "directlink");

}