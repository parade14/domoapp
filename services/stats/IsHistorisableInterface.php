<?php
/**
 * Created by PhpStorm.
 * User: nicol
 * Date: 01/02/2018
 * Time: 14:38
 */

namespace services\stats;


interface IsHistorisableInterface
{
    /**
     * @return \DateTime
     */
    public function getDate();

    /**
     * @return float|int;
     */
    public function getValue();
}