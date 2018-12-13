<?php
class NewsController extends BaseController{
     
    public function __construct() {
        parent::__construct();
    }
     
    public function index(){
         
        //Creamos el objeto usuario
        $usuario=new Usuario();
         
        //Conseguimos todos los usuarios
        $allusers=$usuario->getAll();
        
        //Cargamos la vista index y le pasamos valores
        $this->view("index",array(
            "allusers"=>$allusers,
            "Hola"    =>"Soy Víctor Robles"
        ));
    }
     
    public function crear(){
        if(isset($_POST["nombre"])){
             
            //Creamos un usuario
            $usuario=new Usuario();
            $usuario->setNombre($_POST["nombre"]);
            $usuario->setApellido($_POST["apellido"]);
            $usuario->setEmail($_POST["email"]);
            $usuario->setPassword(sha1($_POST["password"]));
            $save=$usuario->save();
        }
        $this->redirect("Usuarios", "index");
    }
     
    public function borrar(){
        if(isset($_GET["id"])){ 
            $id=(int)$_GET["id"];
             
            $usuario=new Usuario();
            $usuario->deleteById($id); 
        }
        $this->redirect();
    }
     
     
    public function hola(){
        $usuarios=new UsuariosModel();
        $usu=$usuarios->getUnUsuario();
        var_dump($usu);
    }
    
    public function getArticle(){
        
        if(isset($_GET["lang"])){ 
            $lang_id =(int)$_GET["lang"];
        }
        if(isset($_GET["arti"])){
            $article_id = (int)$_GET["arti"];
        }
        
        $str_type = "ii";
        $a_params = array($str_type, $lang_id, $article_id);
        $article = new ArticleModel();
        $art = $article->selectOne($a_params);
        var_dump($art);
        
    }
    
    public function getAllArticles(){
        if(isset($_GET["lang"])){ 
            $lang_id =(int)$_GET["lang"];
        }else{
            $lang_id = 94;
        }
        $str_type = "i";
        $a_params = array($str_type, $lang_id);
        $article = new ArticleModel();
        $arts = $article->selectAll($a_params);
        return json_encode($arts);
    }
 
}
?>