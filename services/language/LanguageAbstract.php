<?php
/**
 * Created by PhpStorm.
 * User: nicol
 * Date: 17/11/2017
 * Time: 15:03
 */

namespace domoapp\Services\Language;


abstract class LanguageAbstract implements LanguageObjectInterface
{
    /**
     * @var string
     */
    static public $Name;

    /**
     * @var string
     */
    static protected $Code;

    /**
     * @return string
     */
    static public function getName()
    {
        return self::$Name;
    }

    /**
     * @return string
     */
    static public function getCode()
    {
       return self::$Code;
    }

}