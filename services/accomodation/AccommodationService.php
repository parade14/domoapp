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
use services\accommodation\AccommodationInterface;
use Services\Database\DatabaseObject;

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
  return "accomodation.service";
}

    /**
     * Add an accomodation in database
     * @param $accommodation AccommodationInterface
     * @return AccommodationInterface
     * @throws \PDOException
     */
    public function createAccommodation(AccommodationInterface $accommodation){
        
        try {

            $conn = $this->serviceConnect->connect($this->databaseObject);
            $sql = "INSERT INTO accomodation(street, street_number, postal_code, city, area, inhabitant_number, owner_id) VALUES (:street, :street_number, :postal_code, :city, :area, :inhabitant_number, :owner_id)";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':street', $accommodation->getStreet(), PDO::PARAM_STR);       
            $stmt->bindParam(':street_number', $accommodation->getStreetNumber(), PDO::PARAM_STR);    
            $stmt->bindParam(':city', $accommodation->getCity(), PDO::PARAM_STR);
            $stmt->bindParam(':postal_code', $accommodation->getPostalCode(), PDO::PARAM_INT);
            $stmt->bindParam(':area', $accommodation->getArea(), PDO::PARAM_INT);
            $stmt->bindParam(':inhabitant_number', $accommodation->getInhabitantNumber(), PDO::PARAM_INT);  
            $stmt->bindParam(':owner_id', $accommodation->getOwnerId(), PDO::PARAM_INT);  
            $stmt->execute();
            
            if ($conn->query($sql) === TRUE) {
                $last_id = $conn->insert_id;
                $accommodation->setId($last_id);
            }
            
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
            $sql = "DELETE FROM Accommodation WHERE id='$idAccommodation')";
            $stmt = $conn->prepare($sql);
            $stmt->execute();
        } catch (LogicException $e){
            throw $e;
        }
        return true;
    }

    /**
     * Update an accomodation in database with the new value
     * @param AccommodationInterface $accommodation
     * @return boolean|\LogicException
     */
    public function updateAccommodation(AccommodationInterface $accommodation){
        try {
            $conn = $this->serviceConnect->connect($this->databaseObject);
            $sql = "UPDATE Accommodation SET street=:street, street_number=:street_number, city=:city, postal_code=:postal_code, area=:area, inhabitant_number=:inhabitant_number, user_id=:owner_id WHERE id=:id)";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':street', $accommodation->getStreet(), PDO::PARAM_STR);       
            $stmt->bindParam(':street_number', $accommodation->getStreetNumber(), PDO::PARAM_STR);    
            $stmt->bindParam(':city', $accommodation->getCity(), PDO::PARAM_STR);
            $stmt->bindParam(':postal_code', $accommodation->getPostalCode(), PDO::PARAM_INT);
            $stmt->bindParam(':area', $accommodation->getArea(), PDO::PARAM_INT);
            $stmt->bindParam(':inhabitant_number', $accommodation->getInhabitantNumber(), PDO::PARAM_INT);  
            $stmt->bindParam(':owner_id', $accommodation->getOwnerId(), PDO::PARAM_INT);  
            $stmt->execute();
        } catch (LogicException $e){
            throw $e;
        }
        return $accommodation;
    }

    /**
     * Search accomodation by id
     * @param string $idAccommodation
     * @return AccommodationInterface|\LogicException
     */
    public function getAccommodationById($idAccommodation){
        
        try {
            $conn = $this->serviceConnect->connect($this->databaseObject);

            $resultats=$conn->query("SELECT * FROM Accommodation WHERE id='$idAccommodation'");
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
     * @return AccommodationInterface|\LogicException
     */
    public function getAccommodationByUserId($idUser){
        
        try {
            $conn = $this->serviceConnect->connect($this->databaseObject);

            $resultats=$conn->query("SELECT * FROM Accommodation WHERE user_id='$idUser'");
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