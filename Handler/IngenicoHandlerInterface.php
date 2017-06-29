<?php


namespace Ingenico\Handler;


use Ingenico\DirectLink\DirectLinkInterface;
use Ingenico\Ecommerce\EcommerceInterface;
use Ingenico\FlexCheckout\FlexCheckoutInterface;

interface IngenicoHandlerInterface
{


    /**
     * @return DirectLinkInterface
     */
    public function directLink();

    /**
     * @return EcommerceInterface
     */
    public function ecommerce();

    /**
     * @return FlexCheckoutInterface
     */
    public function flexCheckout();
}