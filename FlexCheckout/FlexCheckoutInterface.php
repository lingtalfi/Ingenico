<?php


namespace Ingenico\FlexCheckout;


interface FlexCheckoutInterface
{


    /**
     * @param array $data
     * @param bool $isTest
     * @return string
     */
    public function getFlexForm(array $data, $isTest = false);


    public function injectFlexFormToIframe($iFrameName, array $data, $isTest = false);

}