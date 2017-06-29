<?php


namespace Ingenico\Config;


use Bat\ArrayTool;
use Ingenico\Util\IngenicoUtil;

class IngenicoConfig implements IngenicoConfigInterface
{
    private $values;
    private $passPhraseDirectLink;
    private $passPhraseEcommerce;


    /**
     * - PSPID:
     * - PSWD:
     * - USERID:
     * - ?PASSPHRASE_DIRECTLINK
     * - ?PASSPHRASE_ECOMMERCE
     *
     *
     */
    public function __construct(array $data)
    {
        $keys = [
            "PSPID",
            "PSWD",
            "USERID",
        ];

        IngenicoUtil::checkMandatoryKeys($keys, $data);
        $this->values = ArrayTool::superimpose($data, array_flip($keys));


        if (array_key_exists('PASSPHRASE_DIRECTLINK', $data)) {
            $this->passPhraseDirectLink = $data['PASSPHRASE_DIRECTLINK'];
        } else {
            $this->passPhraseDirectLink = false;
        }
        if (array_key_exists('PASSPHRASE_ECOMMERCE', $data)) {
            $this->passPhraseEcommerce = $data['PASSPHRASE_ECOMMERCE'];
        } else {
            $this->passPhraseEcommerce = false;
        }
    }

    public function getValues()
    {
        return $this->values;
    }

    public function getPassPhrase($type = "directlink")
    {
        if ("directlink" === $type) {
            return $this->passPhraseDirectLink;
        }
        return $this->passPhraseEcommerce;
    }


}