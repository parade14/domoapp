<?php
/**
 * Created by PhpStorm.
 * User: nicol
 * Date: 17/11/2017
 * Time: 14:22
 */

namespace domoapp\Services\Language;


interface LanguageServiceInterface
{
    /**
     * @param string $text
     * @param LanguageObjectInterface $language
     * @return mixed
     */
    public function mergeText($text, $language);

    /**
     * @param $language
     * @return LanguageObjectInterface
     */
    public function changeLanguage($language);
}