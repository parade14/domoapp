<?php
/**
 * User: quentin
 * Date: 20/11/2017
 */

namespace Entities;


use services\database\EntityHasOwnerInterface;

class Group implements EntityHasOwnerInterface
{

    /**
     * @var int
     */
    protected $id;

    /**
     * @var int
     */
    protected $gestionnaireId;



    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return Group
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return int
     */
    public function getGestionnaireId()
    {
        return $this->gestionnaireId;
    }

    /**
     * @param int $gestionnaireId
     * @return Group
     */
    public function setGestionnaireId($gestionnaireId)
    {
        $this->gestionnaireId = $gestionnaireId;
        return $this;
    }


    public function getOwnerId()
    {
        return $this->getGestionnaireId();
    }


}