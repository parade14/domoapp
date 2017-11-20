<?php
/**
 * Created by PhpStorm.
 * User: nicol
 * Date: 17/11/2017
 * Time: 15:28
 */

namespace domoapp\Services\Notification;
use \DateTime;

interface NotificationObjectInterface
{
    /**
     * @return string
     */
    public function getType();

    /**
     * @return string
     */
    public function getMessage();

    /**
     * @return DateTime
     */
    public function getDateTime();

    /**
     * @param $type string
     * @return $this
     */
    public function setType($type);

    /**
     * @param $message string
     * @return $this
     */
    public function setMessage($message);

    /**
     * @param $dateTime DateTime
     * @return $this
     */
    public function setDateTime($dateTime);
}