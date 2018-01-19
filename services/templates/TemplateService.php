<?php
/**
 * Created by PhpStorm.
 * User: Nicolas
 * Date: 17/01/2018
 * Time: 21:54
 */

namespace services\templates;
use Kernel\ServiceHandler\ServiceInterface;

/**
 * Class TemplateService
 * @package services\templates
 */
class TemplateService implements ServiceInterface
{


    /**
     * TemplateObject constructor.
     */
    public function __construct()
    {
    }


    /**
     * @return bool|string
     * @throws \Exception
     */
    public function parse($file, $params =array())
    {
        if (!is_file($file))
        {
            throw new \Exception($file . ' is not a valid file');
        }


        if( file_exists($file.'.cache' )) {
            return file_get_contents( $file.'.cache' );
        }

        extract( $params);

        ob_start();

        require $file;

        $result = ob_get_contents();

        ob_end_clean();

        file_put_contents( $file.'.cache',
            $result );

        return $result;
    }

    public static function getName()
    {
        return "template.service";
    }
}