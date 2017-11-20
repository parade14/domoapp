<?php
/**
 * User: quentin
 * Date: 20/11/2017
 */

namespace domoapp\Entities;


class GroupAccomodation
{

    /**
     * @var int
     */
    protected $accomodationId;

    /**
     * @var int
     */
    protected $groupId;



    /**
     * @return int
     */
    public function getAccomodationId()
    {
        return $this->accomodationId;
    }

    /**
     * @param int $accomodationId
     * @return GroupAccomodation
     */
    public function setAccomodationId($accomodationId)
    {
        $this->accomodationId = $accomodationId;
        return $this;
    }

    /**
     * @return int
     */
    public function getGroupId()
    {
        return $this->groupId;
    }

    /**
     * @param int $groupId
     * @return GroupAccomodation
     */
    public function setGroupId($groupId)
    {
        $this->groupId = $groupId;
        return $this;
    }


  

}