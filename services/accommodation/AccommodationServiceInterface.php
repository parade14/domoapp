<?php
/**
 * User: quentin
 * Date: 21/11/2017
 */

namespace domoapp\Services\Accommodation;


use domoapp\services\handler\ServiceInterface;

interface AccommodationServiceInterface extends ServiceInterface
{
    /**
     * Add an accomodation in database
     * @param User $user
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
     * Search accommodation by id
     * @param string $idAccommodation
     * @return Accommodation|\LogicException
     */
    public function getAccommodationById($idAccommodation);



}