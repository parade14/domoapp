<?php
/**
 * User: quentin
 * Date: 20/11/2017
 */

namespace Entities;


class Room
{

    /**
     * @var integer
     */
    protected $id;

    /**
     * @var string
     */
    protected $name;

    /**
     * @var int
     */
    protected $area;

    /**
     * @var int
     */
    protected $accommodationId;


    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return Room
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
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
     * @return Room
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return int
     */
    public function getArea()
    {
        return $this->area;
    }

    /**
     * @param int $area
     * @return Room
     */
    public function setArea($area)
    {
        $this->area = $area;
        return $this;
    }

    /**
     * @return int
     */
    public function getAccommodationId()
    {
        return $this->accommodationId;
    }

    /**
     * @param int $accommodationId
     * @return Room
     */
    public function setAccommodationId($accommodationId)
    {
        $this->accommodationId = $accommodationId;
        return $this;
    }

  

}