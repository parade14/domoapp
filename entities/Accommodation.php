<?php
/**
 * User: quentin
 * Date: 20/11/2017
 */

namespace Entities;


use services\database\EntityHasOwnerInterface;

class Accommodation implements EntityHasOwnerInterface
{
    
    public static function getName()
        {
          return "accommodation.entity";
        }

    /**
     * @var integer
     */
    protected $id;

    /**
     * @var string
     */
    protected $street;

    /**
     * @var integer
     */
    protected $streetNumber;

    /**
     * @var string
     */
    protected  $postalCode;

    /**
     * @var string
     */
    protected $city;

    /**
     * @var integer
     */
    protected $area;

    /**
     * @var integer
     */
    protected $inhabitantNumber;

    /**
     * @var integer
     */
    protected $ownerId;



    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return Accommodation
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }



    /**
     * @return string
     */
    public function getStreet()
    {
        return $this->street;
    }

    /**
     * @param string $street
     * @return Accommodation
     */
    public function setStreet($street)
    {
        $this->street = $street;
        return $this;
    }

    /**
     * @return int
     */
    public function getStreetNumber()
    {
        return $this->streetNumber;
    }

    /**
     * @param int $streetNumber
     * @return Accommodation
     */
    public function setStreetNumber($streetNumber)
    {
        $this->streetNumber = $streetNumber;
        return $this;
    }

    /**
     * @return string
     */
    public function getPostalCode()
    {
        return $this->postalCode;
    }

    /**
     * @param string $postalCode
     * @return Accommodation
     */
    public function setPostalCode($postalCode)
    {
        $this->postalCode = $postalCode;
        return $this;
    }

    /**
     * @return string
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * @param string $city
     * @return Accommodation
     */
    public function setCity($city)
    {
        $this->city = $city;
        return $this;
    }


    /**
     * @return string
     */
    public function getArea()
    {
        return $this->area;
    }

    /**
     * @param string $area
     * @return Accommodation
     */
    public function setArea($area)
    {
        $this->area = $area;
        return $this;
    }

    /**
     * @return int
     */
    public function getInhabitantNumber()
    {
        return $this->inhabitantNumber;
    }

    /**
     * @param int $inhabitantNumber
     * @return Accommodation
     */
    public function setInhabitantNumber($inhabitantNumber)
    {
        $this->inhabitantNumber = $inhabitantNumber;
        return $this;
    }

    /**
     * @return int
     */
    public function getOwnerId()
    {
        return $this->ownerId;
    }

    /**
     * @param int $ownerId
     * @return Accommodation
     */
    public function setOwnerId($ownerId)
    {
        $this->ownerId = $ownerId;
        return $this;
    }
  

}