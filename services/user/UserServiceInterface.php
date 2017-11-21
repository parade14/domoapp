<?php
/**
 * User: quentin
 * Date: 20/11/2017
 */

namespace domoapp\Services\User;

use domoapp\services\ServiceHandler\ServiceInterface;

interface UserServiceInterface extends ServiceInterface
{
    /**
     * Add an user in database
     * @param UserInterface $user
     * @return boolean|\LogicException
     */
    public function createUser(UserInterface $user);

    /**
     * Delete an user in database
     * @param string $idUser
     * @return boolean|\LogicException
     */
    public function deleteUser($idUser);

    /**
     * Update an user in database with the new value
     * @param UserInterface $user
     * @return boolean|\LogicException
     */
    public function updateUser(UserInterface $user);

    /**
     * Search one user by the id
     * @param string $idUser
     * @return UserInterface|\LogicException
     */
    public function getUserById($idUser);



}