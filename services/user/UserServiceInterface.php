<?php
/**
 * User: quentin
 * Date: 20/11/2017
 */

namespace Services\User;


use Services\ServiceHandler\ServiceInterface;

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
     * Search user(s) by the field in parameter
     * @param string $field email|id|name
     * @param string $value
     * @return array of UserInterface|\LogicException
     */
    public function getUserBy($field, $value);



}