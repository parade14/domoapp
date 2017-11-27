<?php
/**
 * Created by PhpStorm.
 * User: nicol
 * Date: 17/11/2017
 * Time: 14:46
 */

namespace Services\Language;


interface LanguageObjectInterface
{

    /**
     * @return string
     */
    static public function getName();

    /**
     * @return string
     */
    static public function getCode();
}