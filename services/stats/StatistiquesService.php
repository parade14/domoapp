<?php
/**
 * Created by PhpStorm.
 * User: nicol
 * Date: 01/02/2018
 * Time: 14:36
 */

namespace services\stats;


use Kernel\ServiceHandler\ServiceInterface;

class StatistiquesService implements ServiceInterface
{
    public static function getName(){
        return 'statistique.service';
    }


    /**
     * @param IsHistorisableInterface[] $datas
     * @return array
     */
    public function historicStats($datas){
        $array = array();

        foreach($datas as $data){
            $array[(string) $data->getDate()] = $data->getValue();
        }

        ksort($array);

        return $array;
    }

}