<?php
/**
 * User: quentin
 * Date: 05/12/2017
 */

namespace Services\room;


use Services\database\DatabaseServiceInterface;
use Services\database\DatabaseObjectInterface;

class AccommodationService implements AccommodationServiceInterface
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
     * @var $serviceConnect DatabaseServiceInterface
     * @var $databaseObject DatabaseObjectInterface
     */
    public function __construct($serviceConnect, $databaseObject) {
        $this->serviceConnect = $serviceConnect;
        $this->databaseObject = $databaseObject;
    }



    /**
     * Add an accommodation in database
     * @param $accommodation AccommodationInterface
     * @return boolean|\LogicException
     */
    public function createAccommodation(AccommodationInterface $accommodation){

        $conn = $this->serviceConnect->connect($this->databaseObject);

        $sql = "INSERT INTO accommodation(street, street_number, postal_code, city, area, inhabitant_number, owner_id) VALUES (:street, :street_number, :postal_code, :city, :area, :inhabitant_number, :owner_id)";
        
        $stmt->bindParam(':street', $accommodation->getStreet();, PDO::PARAM_STR);       
        $stmt->bindParam(':street_number', $accommodation->getStreetNumber(), PDO::PARAM_STR);    
        $stmt->bindParam(':city', $accommodation->getCity();, PDO::PARAM_STR);
        $stmt->bindParam(':postal_code', $accommodation->getPostalCode();, PDO::PARAM_INT);
        $stmt->bindParam(':area', $accommodation->getArea();, PDO::PARAM_INT);
        $stmt->bindParam(':inhabitant_number', $accommodation->getInhabitantNumber();, PDO::PARAM_INT);  
        $stmt->bindParam(':owner_id', $accommodation->getOwnerId();, PDO::PARAM_INT);  

        $stmt = $conn->prepare($sql);
        $stmt->execute();
    }

    /**
     * Delete an accommodation in database
     * @param string $idAccommodation
     * @return boolean|\LogicException
     */
    public function deleteAccommodation($idAccommodation){
        $conn = $this->serviceConnect->connect($this->databaseObject);

        $sql = "DELETE FROM accommodation WHERE id='".$idAccommodation."')";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
    }

    /**
     * Update an accommodation in database with the new value
     * @param AccommodationInterface $accommodation
     * @return boolean|\LogicException
     */
    public function updateAccommodation(AccommodationInterface $accommodation){
        $conn = $this->serviceConnect->connect($this->databaseObject);

        $sql = "UPDATE accommodation SET street=:street, street_number=:street_number, city=:city, postal_code=:postal_code, area=:area, inhabitant_number=:inhabitant_number, owner_id=:owner_id WHERE id=:id)";

        $stmt->bindParam(':street', $accommodation->getStreet();, PDO::PARAM_STR);       
        $stmt->bindParam(':street_number', $accommodation->getStreetNumber(), PDO::PARAM_STR);    
        $stmt->bindParam(':city', $accommodation->getCity();, PDO::PARAM_STR);
        $stmt->bindParam(':postal_code', $accommodation->getPostalCode();, PDO::PARAM_INT);
        $stmt->bindParam(':area', $accommodation->getArea();, PDO::PARAM_INT);
        $stmt->bindParam(':inhabitant_number', $accommodation->getInhabitantNumber();, PDO::PARAM_INT);  
        $stmt->bindParam(':owner_id', $accommodation->getOwnerId();, PDO::PARAM_INT);  

        $stmt->execute();
    }

    /**
     * Search accommodation by id
     * @param string $idAccommodation
     * @return AccommodationInterface|\LogicException
     */
    public function getAccommodationById($idAccommodation){

        $conn = $this->serviceConnect->connect($this->databaseObject);

        $resultats=$connexion->query("SELECT * FROM accommodation WHERE id='".$idAccommodation."'");
        $resultats->setFetchMode(PDO::FETCH_ASSOC);
        $datas = $resultats->fetchAll();
        $return = array();
        foreach ($datas as $data) {

            $accommodation = new RoomInterface();
            $accommodation->setId($data['id']);
            $accommodation->setStreet($data['street']);
            $accommodation->setStreetNumber($data['street_number']);
            $accommodation->setArea($data['area']);
            $accommodation->setPostalCode($data['postal_code']);
            $accommodation->setPostalCode($data['postal_code']);
            $accommodation->setCity($data['city']);
            $accommodation->setOwnerId($data['owner_id']);

            array_push($return, $accommodation);
        } 

        $resultats->closeCursor();

        return $return;
    }



}