<?php
/**
 * User: quentin
 * Date: 20/11/2017
 */

namespace domoapp\Entities;


class Accomodation
{

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
     * @return Accomodation
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
     * @return Accomodation
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
     * @return Accomodation
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
     * @return Accomodation
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
     * @return Accomodation
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
     * @return Accomodation
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
        return $this->postalCode;
    }

    /**
     * @param int $inhabitantNumber
     * @return Accomodation
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
     * @return Accomodation
     */
    public function setOwnerId($ownerId)
    {
        $this->ownerId = $ownerId;
        return $this;
    }
  

}