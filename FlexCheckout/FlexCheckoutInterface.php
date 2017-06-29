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

}