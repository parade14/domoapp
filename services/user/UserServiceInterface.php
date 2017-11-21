<?php
/**
 * User: quentin
 * Date: 20/11/2017
 */

namespace domoapp\Services\User;


use domoapp\services\handler\ServiceInterface;
use domoapp\entity\User;

interface UserServiceInterface extends \domoapp\services\ServiceHandler\ServiceInterface
{
    /**
     * Add an user in database
     * @param User $user
     * @return boolean
     */
    public function createUser(User $user);

    /**
     * Delete an user in database
     * @param string $idUser
     * @return boolean
     */
    public function deleteUser($idUser);

    /**
     * Update an user in database with the new value
     * @param string $idUser
     * @return boolean
     */
    public function updateUser($idUser);

    /**
     * Return the user with the id in parameter
     * @param string $idUser
     * @return User
     */
    public function getUser($idUser);



}