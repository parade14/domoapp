<?php
/**
 * Created by PhpStorm.
 * User: nicol
 * Date: 24/10/2017
 * Time: 09:44
 */

namespace Entities;


use services\database\EntityHasOwnerInterface;
use Services\Security\AccessGranterInterface;

class Message implements EntityHasOwnerInterface
{

    /**
     * @var integer
     */
    protected $id;

    /**
     * @var integer
     */
    protected $subject;

    /**
     * @var string
     */
    protected $content;

    /**
     * @var integer
     */
    protected  $destinataireId;

    /**
     * @var integer
     */
    protected $authorId;

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return Message
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return int
     */
    public function getSubject()
    {
        return $this->subject;
    }

    /**
     * @param int $subject
     * @return Message
     */
    public function setSubject($subject)
    {
        $this->subject = $subject;
        return $this;
    }

    /**
     * @return string
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * @param string $content
     * @return Message
     */
    public function setContent($content)
    {
        $this->content = $content;
        return $this;
    }

    /**
     * @return int
     */
    public function getDestinataireId()
    {
        return $this->destinataireId;
    }

    /**
     * @param int $destinataireId
     * @return Message
     */
    public function setDestinataireId($destinataireId)
    {
        $this->destinataireId = $destinataireId;
        return $this;
    }

    /**
     * @return int
     */
    public function getAuthorId()
    {
        return $this->authorId;
    }

    /**
     * @param int $authorId
     * @return Message
     */
    public function setAuthorId($authorId)
    {
        $this->authorId = $authorId;
        return $this;
    }

    public function getOwnerId()
    {
      return $this->getAuthorId();
    }

}