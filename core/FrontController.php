<?php
/**
Ahora crearemos el fichero ControladorFrontal.func.php que tiene las funciones que
 *  se encargan de cargar un controlador u otro y una acción u otra en función de lo que se le diga por la url.
*/

/**
 * FRONT CONTROLLER
 * Loads a controller an one of its actions depending on the parameters specified
 * in the URL.
 */
class  FrontController{
    
    public function __construct(){
        //Global config
        $gl_cfg = require_once "config/global.php";
        $this->DEFAULT_CONTROLLER = $gl_cfg["DEFAULT_CONTROLLER"];
        $this->DEFAULT_ACTION = $gl_cfg["DEFAULT_ACTION"];
        

    }
    /**
     * 
     * @param string $controller
     * @return \controlador
     */
    public function loadController(){
        if (isset($_GET["controller"])){
            $controller = $_GET["controller"];
        }else{
            $controller = $this->DEFAULT_CONTROLLER;
        }
        $controller_name=ucwords($controller).'Controller';
        $strFileController='controller/'.$controller_name.'.php';
     
        if(!is_file($strFileController)){
            $strFileController='controller/'.ucwords($this->DEFAULT_CONTROLLER).'Controller.php';   
        }
        require_once $strFileController;
        $controllerObj = new $controller_name();
        return $controllerObj;
    }
    
    public function loadAction($controllerObj,$action){
        $accion=$action;
        $controllerObj->$accion();
    }
    
    public function launchAction($controllerObj){
        if(isset($_GET["action"]) && method_exists($controllerObj, $_GET["action"])){
            $this->loadAction($controllerObj, $_GET["action"]);
        }else{
            $this->loadAction($controllerObj, $this->DEFAULT_ACTION);
        }
    }
}

 

 

 
?>