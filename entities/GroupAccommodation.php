<?php
/**
 * User: quentin
 * Date: 20/11/2017
 */

namespace Entities;


class GroupAccommodation
{

    /**
     * @var int
     */
    protected $accommodationId;

    /**
     * @var int
     */
    protected $groupId;



    /**
     * @return int
     */
    public function getAccommodationId()
    {
        return $this->accommodationId;
    }

    /**
     * @param int $accommodationId
     * @return GroupAccommodation
     */
    public function setAccommodationId($accommodationId)
    {
        $this->accommodationId = $accommodationId;
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
     * @return GroupAccommodation
     */
    public function setGroupId($groupId)
    {
        $this->groupId = $groupId;
        return $this;
    }


  

}