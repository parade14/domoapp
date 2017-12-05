<?php
/**
 * User: quentin
 * Date: 05/12/2017
 */

namespace Services\room;


interface Room
{
    /**
     * @return int
     */
    public function getId();

    /**
     * @param int $id
     * @return Room
     */
    public function setId($id);
    /**
     * @return string
     */
    public function getName();

    /**
     * @param string $name
     * @return Room
     */
    public function setName($name);
    /**
     * @return int
     */
    public function getArea();

    /**
     * @param int $area
     * @return Room
     */
    public function setArea($area);

    /**
     * @return int
     */
    public function getAccommodationId();

    /**
     * @param int $accommodationId
     * @return Room
     */
    public function setAccommodationId($accommodationId);
  

}