<?php

namespace controllers;

use Services\HttpFoundation\AccessDeniedException;


class ModifProfilController extends BaseController
{
    public static function getName(){
        return "modifProfil.controller";
    }

    /**
     * @param $post
     * @return mixed
     * @throws \Exception
     */
    public function index($post){

        if(!empty($post['last_name'])){
            $dataBase = $this->get("database.object");
            $databaseService = $this->get("database.service");
            $userService = $this->get("user.service");
            $sessionService = $this->get("session.manager");
            $userService->setServiceConnect($databaseService);
            $userService->setDataBaseObject($dataBase);
            $databaseService->connect($dataBase);


            $last_name = $post["last_name"];
            $first_name = $post["first_name"];
            $phone = $post["phone"];
            $email = $post["email"];
            $id = $post["id"];

            $userTab = $userService->getUserBy('id',$id);
            if(sizeOf($userTab)>0){
                $user = $userTab[0];
                $user->setFirstName($first_name);
                $user->setLastName($last_name);
                $user->setPhone($phone);
                $user->setEmail($email);

                if(isset($post['password']) && $post['password'] != ""){
                    $user->setPassword($post['password']);
                } else {
                    $user->setPassword(NULL);
                }

                echo $user->getPassword();
                echo is_null($user->getPassword());
                $userService->updateUser($user);
                $this->get('roles.manager')->addRole($user, $this->get('session.manager')->getCurrentUser()->getRoles());
                $sessionService->setCurrentUser($user);


            }
        }




        $kernel = $this->kernel;

        $dataBase = $kernel->get("database.object");
        $databaseService = $kernel->get("database.service");
        $userService = $kernel->get("user.service");
        $userService->setServiceConnect($databaseService);
        $userService->setDataBaseObject($dataBase);
        $databaseService->connect($dataBase);
        $user = $this->get('session.manager')->getCurrentUser();
       

        $var = $this->get('access.granter')->isGranted("AUTHENTICATED_USER");
        if($var){
            return $this->get("template.service")->parse("modifierProfil/modificationClient.php", array("user"=>$user));
        }else{
            header('Location: ../');
            throw new AccessDeniedException();
        }
    }
}

