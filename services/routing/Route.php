<?php
/**
 * Created by PhpStorm.
 * User: nicol
 * Date: 27/11/2017
 * Time: 11:02
 */

namespace services\Routing;


class Route
{
    /**
     * @var string
     */
    private $name;
    /**
     * @var array
     */
    private $path       = array();
    /**
     * @var array
     */
    private $options    = array();

    /**
     * @var string
     */
    private $method;

    public function __construct($name, $path=array(), $options =array(), $method = "GET")
    {
        $this->name = $name;
        $this->path = $path;
        $this->options = $options;
        $this->method = $method;
    }


    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return Route
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return array
     */
    public function getPath()
    {
        return $this->path;
    }

    /**
     * @param array $path
     * @return Route
     */
    public function setPath($path)
    {
        $this->path = $path;
        return $this;
    }

    /**
     * @return array
     */
    public function getOptions()
    {
        return $this->options;
    }

    /**
     * @param array $options
     * @return Route
     */
    public function setOptions($options)
    {
        $this->options = $options;
        return $this;
    }

    /**
     * @return string
     */
    public function getMethod()
    {
        return $this->method;
    }

    /**
     * @param string $method
     */
    public function setMethod($method)
    {
        $this->method = $method;
    }




}