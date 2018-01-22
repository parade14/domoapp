<?php
/**
 * Created by PhpStorm.
 * User: nicol
 * Date: 20/11/2017
 * Time: 09:26
 */

namespace Kernel\ServiceHandler;

use kernel\Kernel;
use ReflectionClass;
use Kernel\ServiceHandler\ServiceHandlerInterface;

class ServiceHandler
{
    /**
     * @var array
     */
    protected $servicesReferencedByName = array();

    /**
     * @var array
     */
    protected $loading = array();
    /**
     * @var array
     */
    protected $loaded = array();


    public static function getName()
    {
      return "service.handler";
    }

    public function __construct(Kernel $kernel)
    {
        $this->loaded[$kernel::getName()] = $kernel;
        $this->servicesReferencedByName[$kernel::getName()] = Kernel::class;
    }

    /**
     * @param $var
     * @param string $key
     * @return $this|ServiceHandlerInterface
     * @throws \LogicException
     */
    public function addService($var, $key="")
    {
        if(is_array($var)) foreach($var as $key=>$value) $this->addService($value, $key);
        else{
            $key = empty($key) ? $var::getName() : $key;

            if(!key_exists($key, $this->servicesReferencedByName)){
                $this->servicesReferencedByName[$key] = $var;
            }
            else{
                throw new \LogicException(sprintf("Key %s already exists in dependency injection container", $key));
            }
        }
        return $this;
    }

    /**
     * @param string $serviceName
     * @return ServiceInterface|mixed
     * @throws \Exception
     */
    public function get($serviceName)
    {
        if(array_key_exists($serviceName, $this->loaded)) return $this->loaded[$serviceName];
        elseif(array_key_exists($serviceName, $this->loading)) throw new \LogicException("Circular references for service $serviceName");
        elseif(array_key_exists($serviceName, $this->servicesReferencedByName)){
            return $this->loaded[$serviceName] = $this->resolve($this->servicesReferencedByName[$serviceName]);
        }
        elseif(in_array($serviceName, $this->servicesReferencedByName)) return $this->resolve($this->servicesReferencedByName[array_search($serviceName, $this->servicesReferencedByName)]);
        else throw new \LogicException("Unknow service $serviceName");


    }

    public function hasService($serviceName)
    {
        return array_key_exists($serviceName, $this->servicesReferencedByName) ? true : false ;

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
                        $constructor_parameters[] = $this->get(str_replace('Interface',"",$parameter->getClass()->getName()));
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