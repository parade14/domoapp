<?php
/**
 * User: quentin
 * Date: 21/11/2017
 */

namespace domoapp\services\accommodation;


interface AccommodationInterface
{

    /**
     * @return int
     */
    public function getId();

    /**
     * @param int $id
     * @return Accommodation
     */
    public function setId($id);


    /**
     * @return string
     */
    public function getStreet();

    /**
     * @param string $street
     * @return Accommodation
     */
    public function setStreet($street);

    /**
     * @return int
     */
    public function getStreetNumber();

    /**
     * @param int $streetNumber
     * @return Accommodation
     */
    public function setStreetNumber($streetNumber);

    /**
     * @return string
     */
    public function getPostalCode();

    /**
     * @param string $postalCode
     * @return Accommodation
     */
    public function setPostalCode($postalCode);

    /**
     * @return string
     */
    public function getCity();

    /**
     * @param string $city
     * @return Accommodation
     */
    public function setCity($city);


    /**
     * @return string
     */
    public function getArea();

    /**
     * @param string $area
     * @return Accommodation
     */
    public function setArea($area);

    /**
     * @return int
     */
    public function getInhabitantNumber();

    /**
     * @param int $inhabitantNumber
     * @return Accommodation
     */
    public function setInhabitantNumber($inhabitantNumber);

    /**
     * @return int
     */
    public function getOwnerId();

    /**
     * @param int $ownerId
     * @return Accommodation
     */
    public function setOwnerId($ownerId);
  

}