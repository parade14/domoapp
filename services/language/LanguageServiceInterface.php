<?php
/**
 * Created by PhpStorm.
 * User: nicol
 * Date: 17/11/2017
 * Time: 14:22
 */

namespace Services\Language;



use Kernel\ServiceHandler\ServiceInterface;

interface LanguageServiceInterface extends ServiceInterface
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