<?php
/**
 * User: quentin
 * Date: 21/11/2017
 */

namespace services\accommodation;


use services\accommodation\AccommodationInterface;
use Kernel\ServiceHandler\ServiceInterface;
//use Kernel\ServiceHandler\ServiceInterface;

interface AccommodationServiceInterface extends ServiceInterface
{
    /**
     * Add an accomodation in database
     * @param $accommodation AccommodationInterface
     * @return boolean|\LogicException
     */
    public function createAccommodation(AccommodationInterface $accommodation);

    /**
     * Delete an accomodation in database
     * @param string $idAccommodation
     * @return boolean|\LogicException
     */
    public function deleteAccommodation($idAccommodation);

    /**
     * Update an accomodation in database with the new value
     * @param AccommodationInterface $accommodation
     * @return boolean|\LogicException
     */
    public function updateAccommodation(AccommodationInterface $accommodation);

    /**
     * Search accomodation by id
     * @param string $idAccommodation
     * @return AccommodationInterface|\LogicException
     */
    public function getAccommodationById($idAccommodation);
    
    public function getAccommodationByUserId($idUser);
    
    public function getAllAccommodations();



}