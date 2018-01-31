<?php
/**
 * User: quentin
 * Date: 05/12/2017
 */

namespace services\accomodation;


use Kernel\ServiceHandler\ServiceInterface;
use services\accommodation\AccommodationServiceInterface;
use Services\Database\DatabaseObjectInterface;
use Services\Database\DatabaseServiceInterface;
use Services\Database\DatabaseService;
use Services\Database\DatabaseObject;
use Entities\Accommodation;

use PDO;

class AccommodationService implements ServiceInterface
{

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
    
    public function setServiceConnect($serviceConnect) {
        $this->serviceConnect = $serviceConnect;
    }

    public function setDataBaseObject($databaseObject) {
        $this->databaseObject = $databaseObject;
    }

    /**
     * constructor
     * @var $serviceConnect DatabaseService
     * @var $databaseObject DatabaseObject
     */
    public function __construct(DatabaseService $serviceConnect, DatabaseObject $databaseObject) {
        $this->serviceConnect = $serviceConnect;
        $this->databaseObject = $databaseObject;
    }

public static function getName()
{
  return "accommodation.service";
}

    /**
     * Add an accomodation in database
     * @param $accommodation Accommodation
     * @return Accommodation
     * @throws \PDOException
     */
    public function createAccommodation(Accommodation $accommodation){
        
        try {
            
            $street = $accommodation->getStreet();
            $streetNumber = $accommodation->getStreetNumber();
            $city = $accommodation->getCity();
            $postalCode = $accommodation->getPostalCode();
            $area = $accommodation->getArea();
            $inhabitantNumber = $accommodation->getInhabitantNumber();
            $userId = $accommodation->getOwnerId();

            $conn = $this->serviceConnect->connect($this->databaseObject);
            $sql = "INSERT INTO Accommodation(street, street_number, postal_code, city, area, inhabitant_number, user_id) VALUES (:street, :street_number, :postal_code, :city, :area, :inhabitant_number, :owner_id)";
            $stmt = $conn->prepare($sql);
            
            $stmt->execute(array(
            'street'=>$street,
            'street_number'=>$streetNumber,
            'postal_code'=>$postalCode,
            'city'=>$city,
            'area'=>$area,
            'inhabitant_number'=>$inhabitantNumber,
            'owner_id'=>$userId,
            ));            
        } catch (\LogicException $e){
            throw $e;
        }
        return $accommodation;
    }

    /**
     * Delete an accomodation in database
     * @param string $idAccommodation
     * @return boolean|\LogicException
     */
    public function deleteAccommodation($idAccommodation){
        
        try {
            $conn = $this->serviceConnect->connect($this->databaseObject);
            
            $sql = "DELETE FROM `DataSensor` WHERE sensor_id IN (SELECT id from `Sensor` where room_id IN (SELECT id from `Room` where accommodation_id=:id))";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':id', $idAccommodation, PDO::PARAM_INT);
            $stmt->execute();
            
            $sql = "DELETE FROM `Sensor` WHERE room_id IN (SELECT id from `Room` where accommodation_id=:id)";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':id', $idAccommodation, PDO::PARAM_INT);
            $stmt->execute();

            
            $sql = "DELETE FROM `Room` WHERE accommodation_id=:id";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':id', $idAccommodation, PDO::PARAM_INT);  
            $stmt->execute();
            
            $sql = "DELETE FROM `GroupAccommodation` WHERE accommodation_id=:id";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':id', $idAccommodation, PDO::PARAM_INT);  
            $stmt->execute();
            
            $sql = "DELETE FROM `Accommodation` WHERE id=:id";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':id', $idAccommodation, PDO::PARAM_INT);  
            $stmt->execute();
        } catch (LogicException $e){
            throw $e;
        }
        return true;
    }

    /**
     * Update an accomodation in database with the new value
     * @param Accommodation $accommodation
     * @return boolean|\LogicException
     */
    public function updateAccommodation(Accommodation $accommodation){
        try {
            $street = $accommodation->getStreet();
            $streetNumber = $accommodation->getStreetNumber();
            $city = $accommodation->getCity();
            $postalCode = $accommodation->getPostalCode();
            $area = $accommodation->getArea();
            $inhabitantNumber = $accommodation->getInhabitantNumber();
            $userId = $accommodation->getOwnerId();
            $id = $accommodation->getId();

            $conn = $this->serviceConnect->connect($this->databaseObject);
            $sql = "UPDATE `Accommodation` SET street=:street, street_number=:street_number, city=:city, postal_code=:postal_code, area=:area, inhabitant_number=:inhabitant_number, user_id=:owner_id WHERE id=:id";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':street', $street, PDO::PARAM_STR);       
            $stmt->bindParam(':street_number', $streetNumber, PDO::PARAM_STR);    
            $stmt->bindParam(':city', $city, PDO::PARAM_STR);
            $stmt->bindParam(':postal_code', $postalCode, PDO::PARAM_INT);
            $stmt->bindParam(':area', $area, PDO::PARAM_INT);
            $stmt->bindParam(':inhabitant_number', $inhabitantNumber , PDO::PARAM_INT);  
            $stmt->bindParam(':owner_id', $userId, PDO::PARAM_INT);  
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);  
            $stmt->execute();
                        
        } catch (LogicException $e){
            throw $e;
        }
        return $accommodation;
    }

    /**
     * Search accomodation by id
     * @param string $idAccommodation
     * @return Accommodation|\LogicException
     */
    public function getAccommodationById($idAccommodation){
        
        try {
            $conn = $this->serviceConnect->connect($this->databaseObject);

            $resultats=$conn->query("SELECT * FROM `Accommodation` WHERE id='$idAccommodation'");
            $resultats->setFetchMode(PDO::FETCH_ASSOC);
            $datas = $resultats->fetchAll();
            $return = array();  
            foreach ($datas as $data) {
                $accommodation = new Accommodation();
                $accommodation->setId($data['id']);
                $accommodation->setStreet($data['street']);
                $accommodation->setStreetNumber($data['street_number']);
                $accommodation->setArea($data['area']);
                $accommodation->setInhabitantNumber($data['inhabitant_number']);
                $accommodation->setPostalCode($data['postal_code']);
                $accommodation->setCity($data['city']);
                $accommodation->setOwnerId($data['user_id']);
                array_push($return, $accommodation);
            } 
            $resultats->closeCursor();
            
        } catch (LogicException $e){
            throw $e;
        }
        return $return;
    }
    
    /**
     * Search accomodation by id
     * @return Accommodation|\LogicException
     */
    public function getAccommodationByUserId($idUser){
        
        try {
            $conn = $this->serviceConnect->connect($this->databaseObject);

            $resultats=$conn->query("SELECT * FROM `Accommodation` WHERE user_id='$idUser'");
            $resultats->setFetchMode(PDO::FETCH_ASSOC);
            $datas = $resultats->fetchAll();
            $return = array();
            foreach ($datas as $data) {
                $accommodation = new Accommodation();
                $accommodation->setId($data['id']);
                $accommodation->setStreet($data['street']);
                $accommodation->setStreetNumber($data['street_number']);
                $accommodation->setArea($data['area']);
                $accommodation->setPostalCode($data['postal_code']);
                $accommodation->setInhabitantNumber($data['inhabitant_number']);
                $accommodation->setCity($data['city']);
                $accommodation->setOwnerId($data['user_id']);
                array_push($return, $accommodation);
            } 
            $resultats->closeCursor();
            
        } catch (LogicException $e){
            throw $e;
        }
        return $return;
    }


    public function getAllAccommodations(){
        
        try {
            $conn = $this->serviceConnect->connect($this->databaseObject);

            $resultats=$conn->query("SELECT * FROM `Accommodation`");
            $resultats->setFetchMode(PDO::FETCH_ASSOC);
            $datas = $resultats->fetchAll();
            $return = array();
            foreach ($datas as $data) {
                $accommodation = new Accommodation();
                $accommodation->setId($data['id']);
                $accommodation->setStreet($data['street']);
                $accommodation->setStreetNumber($data['street_number']);
                $accommodation->setArea($data['area']);
                $accommodation->setPostalCode($data['postal_code']);
                $accommodation->setInhabitantNumber($data['inhabitant_number']);
                $accommodation->setCity($data['city']);
                $accommodation->setOwnerId($data['user_id']);
                array_push($return, $accommodation);
            } 
            $resultats->closeCursor();
            
        } catch (LogicException $e){
            throw $e;
        }
        return $return;
    }


}