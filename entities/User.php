<?php
/**
 * Created by PhpStorm.
 * User: nicol
 * Date: 24/10/2017
 * Time: 09:38
 */

namespace Entities;


use services\database\EntityHasOwnerInterface;
use Services\User\UserInterface;

class User implements EntityHasOwnerInterface, UserInterface
{
    /**
     * @var integer
     */
    protected $id;

    /**
     * @var string;
     */
    protected $firstName;

    /**
     * @var string
     */
    protected $lastName;

    /**
     * @var string
     */
    protected $phone;

    /**
     * @var string
     */
    protected $email;

    /**
     * @var string
     */
    protected $password;

    /**
     * @var int
     */
    protected $profileType;

    /**
     * @var array
     */
    protected $roles =array();

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return User
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return string
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * @param string $firstName
     * @return User
     */
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;
        return $this;
    }

    /**
     * @return string
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * @param string $lastName
     * @return User
     */
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;
        return $this;
    }

    /**
     * @return string
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * @param string $phone
     * @return User
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;
        return $this;
    }

    /**
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param string $email
     * @return User
     */
    public function setEmail($email)
    {
        $this->email = $email;
        return $this;
    }

    /**
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param string $password
     * @return User
     */
    public function setPassword($password)
    {
        $this->password = md5($password);
        return $this;
    }

    /**
     * @return string
     */
    public function getProfileType()
    {
        return (int) $this->profileType;
    }

    /**
     * @param int $profileType
     * @return User
     */
    public function setProfileType($profileType)
    {
        $this->profileType =(int) $profileType;
        return $this;
    }

    public function getOwnerId()
    {
      return $this->getId();
    }

    public function getRoles()
    {
        return $this->roles;
    }

    public function addRoles($roles)
    {
        if(is_array($roles)) foreach ($roles as $role) $this->addRoles($role);

        else if(!in_array($roles, $this->roles)) $this->roles[]=$roles;
    }


}