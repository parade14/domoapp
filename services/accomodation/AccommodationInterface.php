<?php
/**
 * User: quentin
 * Date: 21/11/2017
 */

namespace services\accommodation;


interface AccommodationInterface
{

    /**
     * @return int
     */
    public function getId();

    /**
     * @param int $id
     * @return AccommodationInterface
     */
    public function setId($id);


    /**
     * @return string
     */
    public function getStreet();

    /**
     * @param string $street
     * @return AccommodationInterface
     */
    public function setStreet($street);

    /**
     * @return int
     */
    public function getStreetNumber();

    /**
     * @param int $streetNumber
     * @return AccommodationInterface
     */
    public function setStreetNumber($streetNumber);

    /**
     * @return string
     */
    public function getPostalCode();

    /**
     * @param string $postalCode
     * @return AccommodationInterface
     */
    public function setPostalCode($postalCode);

    /**
     * @return string
     */
    public function getCity();

    /**
     * @param string $city
     * @return AccommodationInterface
     */
    public function setCity($city);


    /**
     * @return string
     */
    public function getArea();

    /**
     * @param string $area
     * @return AccommodationInterface
     */
    public function setArea($area);

    /**
     * @return int
     */
    public function getInhabitantNumber();

    /**
     * @param int $inhabitantNumber
     * @return AccommodationInterface
     */
    public function setInhabitantNumber($inhabitantNumber);

    /**
     * @return int
     */
    public function getOwnerId();

    /**
     * @param int $ownerId
     * @return AccommodationInterface
     */
    public function setOwnerId($ownerId);
  

}