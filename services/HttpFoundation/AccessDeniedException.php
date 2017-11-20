<?php
/**
 * Created by PhpStorm.
 * User: nicol
 * Date: 20/11/2017
 * Time: 14:04
 */

namespace \domoapp\Services\HttpFoundation;


class AccessDeniedException extends \RuntimeException
{

    /**
     * @var array
     */
    private $attributes = array();
    /**
     * @var
     */
    private $subject;

    /**
     * AccessDeniedException constructor.
     * @param string $message
     * @param \Exception|null $previous
     */
    public function __construct(string $message = 'Access Denied.', \Exception $previous = null)
    {
        parent::__construct($message, 403, $previous);
    }

    /**
     * @return array
     */
    public function getAttributes()
    {
        return $this->attributes;
    }

    /**
     * @param array $attributes
     */
    public function setAttributes($attributes)
    {
        $this->attributes = $attributes;
    }

    /**
     * @return mixed
     */
    public function getSubject()
    {
        return $this->subject;
    }

    /**
     * @param mixed $subject
     */
    public function setSubject($subject)
    {
        $this->subject = $subject;
    }


}