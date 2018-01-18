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
     * @var array
     */
    private $attributs = array();
    /**
     * @var array
     */
    private $properties = array();

    /**
     * TemplateObject constructor.
     * @param $file
     * @throws \Exception
     */
    public function __construct( $file )
    {

        if (!is_file($file))
        {
            throw new \Exception($file . ' is not a valid file');
        }
        $this->attributs['file'] = $file;
    }

    /**
     * @param $property
     * @param $value
     */
    public function assign( $property, $value )
    {
        $this->properties[ $property ] = $value;
    }

    /**
     * @return bool|string
     */
    public function parse()
    {

        if( file_exists($this->attributs['file'].'.cache' )) {
            return file_get_contents( $this->attributs['file'].'.cache' );
        }

        extract( $this->properties );

        ob_start();

        require $this->attributs['file'];

        $result = ob_get_contents();

        ob_end_clean();

        file_put_contents( $this->attributs['file'].'.cache',
            $result );

        return $result;
    }

    public static function getName()
    {
        return "template.service";
    }
}