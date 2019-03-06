<?php


namespace Ling\Ingenico\Handler;


use Ling\Ingenico\Config\IngenicoConfig;
use Ling\Ingenico\Config\IngenicoConfigInterface;
use Ling\Ingenico\DirectLink\DirectLink;
use Ling\Ingenico\DirectLink\DirectLinkInterface;
use Ling\Ingenico\Ecommerce\Ecommerce;
use Ling\Ingenico\Ecommerce\EcommerceInterface;
use Ling\Ingenico\Exception\IngenicoException;
use Ling\Ingenico\FlexCheckout\FlexCheckout;
use Ling\Ingenico\FlexCheckout\FlexCheckoutInterface;

class IngenicoHandler implements IngenicoHandlerInterface
{

    /**
     * @var IngenicoConfigInterface
     */
    private $config;
    /**
     * @var DirectLinkInterface
     */
    private $_directLink;
    /**
     * @var EcommerceInterface
     */
    private $_ecommerce;

    /**
     * @var FlexCheckoutInterface
     */
    private $_flexCheckout;

    public static function createByConfFile($confFile)
    {
        $o = new static();
        if (file_exists($confFile)) {
            $conf = [];
            include $confFile;
            $config = new IngenicoConfig($conf);
            $o->setConfig($config);
        } else {
            throw new IngenicoException("Config file not found: $confFile");
        }
        return $o;
    }

    public static function createByConfArray(array $conf)
    {
        $o = new static();
        $config = new IngenicoConfig($conf);
        $o->setConfig($config);
        return $o;
    }

    /**
     * @return FlexCheckoutInterface
     */
    public function flexCheckout()
    {
        if (null === $this->_flexCheckout) {
            $this->_flexCheckout = new FlexCheckout($this->config);
        }
        return $this->_flexCheckout;
    }

    /**
     * @return DirectLinkInterface
     */
    public function directLink()
    {
        if (null === $this->_directLink) {
            $this->_directLink = new DirectLink($this->config);
        }
        return $this->_directLink;
    }

    /**
     * @return EcommerceInterface
     */
    public function ecommerce()
    {
        if (null === $this->_ecommerce) {
            $this->_ecommerce = new Ecommerce($this->config);
        }
        return $this->_ecommerce;
    }


    //--------------------------------------------
    //
    //--------------------------------------------
    public function setConfig(IngenicoConfigInterface $config)
    {
        $this->config = $config;
        return $this;
    }
}