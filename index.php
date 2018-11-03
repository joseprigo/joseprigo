<?php
//Configuración global
//require_once 'config/global.php';
// 
////Base para los controladores
//require_once 'core/ControladorBase.php';
// 
////Funciones para el controlador frontal
//require_once 'core/ControladorFrontal.func.php';
// 
////Cargamos controladores y acciones
//if(isset($_GET["controller"])){
//    $controllerObj=cargarControlador($_GET["controller"]);
//    lanzarAccion($controllerObj);
//}else{
//    $controllerObj=cargarControlador(CONTROLADOR_DEFECTO);
//    lanzarAccion($controllerObj);
//}
//$controllerObj = cargarControlador($controller)

// exemple 1: mostrar el llistat de notícies
// parameters:
/**
 * Care must be taken when using mysqli_stmt_bind_param() in conjunction with call_user_func_array().
 * Note that mysqli_stmt_bind_param() requires parameters to be passed by reference,
 * whereas call_user_func_array() can accept as a parameter a list of variables that can represent
 * references or values.
 * https://stackoverflow.com/questions/16120822/mysqli-bind-param-expected-to-be-a-reference-value-given
 * @param type $arr
 * @return type
 */
$str_type = "i";
$lang_id = 18;
$a_params = array($str_type, $lang_id);
require_once 'model/ArticleModel.php';
try{
    $articleModel = new ArticleModel();
    $noticies = $articleModel->selectAll();
    print_r($noticies);
} catch (Exception $ex) {
    echo "Error";
}




?>
<!DOCTYPE html>
<html>
    <head>
        <title> Josep Rigo Official </title>
        <meta charset="utf-8_spanish_ci">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
        <link rel="stylesheet" type="text/css" href="view/styles/articles.css">
    </head>
    <body>
        <nav class="navbar navbar-expand-md bg-dark navbar-dark">
            <a class="navbar-brand" href="#">Inici</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="collapsibleNavbar">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="#news">Notícies</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#cV">Currículum</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Links</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Contacte</a>
                </li>
            </ul>
            </div>  
        </nav>
        <div class="container-fluid">
            <h1> Josep Rigo Personal Web site</h1>
            <div class="row">
            </div>
            <div class="row">
            	<div class="col-md-9">
            		<div class="row">
            			<div class="col-md-12">
            				<h2 id="news"> Notícies</h2>
            				<article>
            					<h3>Web en construcció</h3>
                            	<p>4-07-2018</p>
                                            <p>Em sembla oportú explicar les dues raons per les que he decidit començar aquesta web. D’una banda la vull utilitzar com a blog / currículum per anar publicant coses que vaig fent. D’altra banda vull posar en pràctica coneixements que estic aprenent. </p>
                                            <p>Respecte el segon punt, el meu objectiu és programar un blog aplicant el MVC mitjançant programació orientada objectes en PHP. També intentaré tenir la web integrament en català, castellà i anglès. </p>
                                            <p>La idea és anar actualitzant cada setmana ja sigui els continguts o la programació</p>
                                            <img src="view/img/enconstruccio.jpg" title="En construcció" />
                                        </article>
                                        <article>
                                            <h3>Reconeixement a l'alumnat de Molins de Rei</h3>
                                            <p>29-06-2018</p>
                                            <p>El passat 20 de juny, juntament amb altres 20 alumnes de diferents instituts de Molins de Rei, vaig rebre un diploma de reconeixement al nostre esforç durant aquest curs acadèmic.</p>
                                            <p>De l'acte vull destacar la presentació de la Cesca Figueres. L'astrofísica molinenca ens va explicar la feina que està realitzant en el projecte Gaia de la ESA, dedicat a estudiar la distància i posició de les estrelles de la nostra galàxia. Va ser tot un  privilegi gaudir de la seva presència. </p>
                                            <p> veure la notícia original: <a href="http://www.molinsderei.cat/actualitat/noticies/reconeixement-als-millors-alumnes-de-la-vila">molinsderei.cat</a></p>
                                        </article>
            			</div>
            			<div class="col-md-12">
            				<h2 id="cV"> Currículum </h2>
            			</div>
            		</div>
            		
            	</div>
            	<div class="col-md-3">
                	<h2>See Also</h2>
                	<ul>
                    	<li><a href="https://www.imdb.com/name/nm7721692/">My IMDB link</a></li>
                        <li><a href="https://www.linkedin.com/in/josep-rigo-927691165/">Linkedin profile</a></li>
                	</ul>
            	</div>
            </div>
        </div>
    </body>
</html>
<!--  



-->