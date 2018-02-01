<?php
/**
 * Created by PhpStorm.
 * User: nicol
 * Date: 31/01/2018
 * Time: 14:27
 */

namespace services\message;


use Entities\Message;
use Kernel\ServiceHandler\ServiceInterface;
use Services\Database\DatabaseObjectInterface;
use Services\Database\DatabaseServiceInterface;

class MessageService implements ServiceInterface
{


    public static function getName()
    {
        return 'message.service';
    }


    /**
     * The database connection
     * @var DatabaseServiceInterface
     */
    protected $serviceConnect;

    /**
     * The database connection
     * @var DatabaseObjectInterface
     */
    protected $databaseObject;

    /**
     * MessageService constructor.
     * @param DatabaseServiceInterface $serviceConnect
     * @param DatabaseObjectInterface $databaseObject
     */
    public function __construct(DatabaseServiceInterface $serviceConnect, DatabaseObjectInterface $databaseObject)
    {
        $this->serviceConnect = $serviceConnect;
        $this->databaseObject = $databaseObject;
    }

    /**
     * @param Message $message
     * @return bool
     */
    public function createMessage(Message $message)
    {
        $con = $this->connect();

        $stmt = $con->prepare('INSERT INTO `message`(subject, content, recipient_id, author_id) VALUES (:subject, :content, :recipient_id, :author_id)');

        return $stmt->execute(array(
            ':subject' => $message->getSubject(),
            ':content' => $message->getContent(),
            ':recipient_id' => $message->getDestinataireId(),
            ':author_id' => $message->getAuthorId(),
        ));

    }

    /**
     * @param $messageId int
     * @return bool
     */
    public function deleteMessage($messageId){
        return $this->connect()->prepare('DELETE FROM `message` WHERE id=:id')->execute(array(':id'=>$messageId));
    }

    /**
     * @param $messageId int
     * @return Message
     */
    public function getOneById($messageId){
        $req = $this->connect()->prepare('SELECT * FROM `message` WHERE id=:id');
        $req->execute(array(':id'=>$messageId));
        return $req->fetchObject(Message::class);
    }

    /**
     * @param $userId int
     * @param bool $order
     * @return array|Message[]
     */
    public function getMessagesByUser($userId, $order=true){
        $req = $this->connect()->prepare('SELECT * FROM `message` WHERE author_id=:id'.($order ? 'ORDER BY id' : ''));
        $req->execute(array('id'=>$userId));
        while($message = $req->fetchObject(Message::class)) $messages[]=$message;
        return (!empty($messages) and isset($messages)) ? $messages : array();
    }


    /**
     * @return \PDO
     */
    protected function connect(){
        return $this->serviceConnect->connect($this->databaseObject);
    }
}
