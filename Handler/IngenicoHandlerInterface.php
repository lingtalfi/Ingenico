<?php


namespace Ling\Ingenico\Handler;


use Ling\Ingenico\DirectLink\DirectLinkInterface;
use Ling\Ingenico\Ecommerce\EcommerceInterface;
use Ling\Ingenico\FlexCheckout\FlexCheckoutInterface;

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