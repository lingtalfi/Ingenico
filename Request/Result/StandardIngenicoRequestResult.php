<?php


namespace Ling\Ingenico\Request\Result;


use Ling\Ingenico\Exception\IngenicoException;

class StandardIngenicoRequestResult implements StandardIngenicoRequestResultInterface
{

    private $values;
    private $_html;

    public function __construct()
    {
        $this->values = [];
        $this->_html = null;
    }


    //--------------------------------------------
    //
    //--------------------------------------------
    public function isSuccess()
    {
        if (
            array_key_exists("NCERROR", $this->values) &&
            "0" === $this->values["NCERROR"]
        ) {
            return true;
        }
        return false;
    }

    public function getStatus()
    {
        return $this->getValue("STATUS");
    }

    public function getErrorCode()
    {
        return $this->getValue("NCERROR");
    }

    public function getValues()
    {
        return $this->values;
    }

    public function getHtmlContent()
    {
        return $this->_html;
    }


    //--------------------------------------------
    //
    //--------------------------------------------
    public function setHtmlContent($answer)
    {
        $this->_html = $answer;
        return $this;
    }


    //--------------------------------------------
    //
    //--------------------------------------------
    public static function fromValues(array $values)
    {
        $o = new static();
        $o->setValues($values);
        return $o;
    }

    //--------------------------------------------
    //
    //--------------------------------------------
    private function getValue($key)
    {
        if (array_key_exists($key, $this->values)) {
            return $this->values[$key];
        }
        $this->keyNotFound($key);
    }

    private function keyNotFound($key)
    {
        throw new IngenicoException("Key not found: $key");
    }

    private function setValues(array $values)
    {
        $this->values = $values;
        return $this;
    }
}