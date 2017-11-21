<?php
/**
 * Created by PhpStorm.
 * User: nicol
 * Date: 21/11/2017
 * Time: 09:03
 */

namespace domoapp\services\user;



interface UserInterface
{
    /**
     * @return int
     */
    public function getId();

    /**
     * @param int $id
     * @return UserInterface
     */
    public function setId($id);

    /**
     * @return string
     */
    public function getFirstName();

    /**
     * @param string $firstName
     * @return UserInterface
     */
    public function setFirstName($firstName);

    /**
     * @return string
     */
    public function getLastName();

    /**
     * @param string $lastName
     * @return UserInterface
     */
    public function setLastName($lastName);

    /**
     * @return string
     */
    public function getPhone();

    /**
     * @param string $phone
     * @return UserInterface
     */
    public function setPhone($phone);

    /**
     * @return string
     */
    public function getEmail();

    /**
     * @param string $email
     * @return UserInterface
     */
    public function setEmail($email);

    /**
     * @return string
     */
    public function getPassword();

    /**
     * @param string $password
     * @return UserInterface
     */
    public function setPassword($password);

    /**
     * @return string
     */
    public function getProfileType();

    /**
     * @param string $profileType
     * @return UserInterface
     */
    public function setProfileType($profileType);


}