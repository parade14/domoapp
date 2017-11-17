<?php
/**
 * Created by PhpStorm.
 * User: nicol
 * Date: 17/11/2017
 * Time: 14:46
 */

namespace domoapp\Services\Language;


interface LanguageObjectInterface
{

    /**
     * @return string
     */
    public function getName();

    /**
     * @return string
     */
    public function getCode();
}