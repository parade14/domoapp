<?php
/**
 * Created by PhpStorm.
 * User: nicol
 * Date: 20/11/2017
 * Time: 09:26
 */

namespace Kernel\ServiceHandler;

use ReflectionClass;
final class ServiceHandler implements ServiceHandlerInterface
{
    /**
     * @var array
     */
    protected $servicesReferenced = array();
    /**
     * @var array
     */
    protected $loading = array();
    /**
     * @var array
     */
    protected $loaded = array();





    public function addService(ServiceInterface $service)
    {
        array_key_exists($service->getServiceName(), $this->servicesReferenced) ? :
            $this->servicesReferenced[$service->getServiceName()] = $service;
        return $this;
    }

    public function get($serviceName)
    {
        if(array_key_exists($serviceName, $this->loaded)) return $this->loaded[$serviceName];
        elseif(array_key_exists($serviceName, $this->loading)) throw new \LogicException("Circular references for service $serviceName");
        elseif(array_key_exists($serviceName, $this->servicesReferenced)){

        }




        Throw new \LogicException("unknow sevice $serviceName");
    }

    public function hasService($serviceName)
    {
        return array_key_exists($serviceName, $this->servicesReferenced) ? true : false ;

    }

    public function getServiceName()
    {
       return self::class;
    }


    /**
     * Resolve dependencies injections
     * @param $key
     * @return object
     * @throws \Exception
     */
    private function resolve($key){
        $reflected_class = new ReflectionClass($key); // On récupère la class depuis la chaine de caractère
        if($reflected_class->isInstantiable()){ // On a bien une class instanciable (et pas une interface)
            $constructor = $reflected_class->getConstructor(); // On récupère le constructeur
            if($constructor){
                // Si le constructeur existe alors on va analyser ses paramètres
                $parameters = $constructor->getParameters();
                $constructor_parameters = [];
                foreach($parameters as $parameter){
                    if( $parameter->getClass() ){
                        $constructor_parameters[] = $this->get($parameter->getClass()->getName());
                    } else {
                        $constructor_parameters[] = $parameter->getDefaultValue();
                    }
                }
                return $reflected_class->newInstanceArgs($constructor_parameters);
            } else {
                // sinon on peut directement instancier notre objet à vide.
                return $reflected_class->newInstance();
            }
        } else {
            throw new \Exception($key . " is not an instanciable Class");
        }
    }

}