<?php


namespace Ling\Ingenico\Util;


use Ling\Bat\XmlTool;
use Ling\Ingenico\Exception\IngenicoException;
use Ling\Ingenico\Request\Result\StandardIngenicoRequestResult;
use Ling\Ingenico\Request\Result\StandardIngenicoRequestResultInterface;

class IngenicoUtil
{


    public static function checkSignature(array $data, $passPhrase)
    {
        /**
         * Todo: implement
         */
        return true;
    }

    public static function createShaSignature(array $data, $passPhrase)
    {
        ksort($data);
        $s = '';
        foreach ($data as $k => $v) {
            if ('' === trim($v)) {
                continue;
            }

            $k = strtoupper($k);
            $s .= "$k=$v";
//            $s .= "<br>";
            $s .= $passPhrase;
        }
        $s = sha1($s);
        return $s;
    }

    public static function checkMandatoryKeys(array $mandatoryKeys, array $data)
    {
        foreach ($mandatoryKeys as $key) {
            if (false === array_key_exists($key, $data)) {
                throw new IngenicoException("Missing mandatory key: $key");
            }
        }
    }


    /**
     * @param $xml
     * @return StandardIngenicoRequestResultInterface|false
     */
    public static function xmlToResult($xml)
    {
        if (false !== ($arr = XmlTool::toArray($xml))) {

            $values = $arr['attributes'];


            //--------------------------------------------
            // 3d secure
            //--------------------------------------------
            $children = $arr['children'];
            $htmlAnswer = null;
            foreach ($children as $ch) {
                if ('HTML_ANSWER' === $ch['name']) {
                    // the 3d secure answer
                    // it needs to be base64 decoded
                    $htmlAnswer = base64_decode($ch['content']);
                    break;
                }
            }

            $o = StandardIngenicoRequestResult::fromValues($values);
            if (null !== $htmlAnswer) {
                $o->setHtmlContent($htmlAnswer);
            }

            return $o;
        }
        return false;
    }
}