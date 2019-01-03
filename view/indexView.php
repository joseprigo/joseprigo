<?php

?>
<!DOCTYPE html>
<html>
    <head>
        <title> Josep Rigo Official </title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
        <link rel="stylesheet" type="text/css" href="view/styles/articles.css">
    </head>
    <script>
        var informacio;
        $(document).ready(function(){
            
            $("#botoajax").on("click", function(){
                
                $.get("index_5_view.php", {controller: "News", action: "baseTest"}, function(info){
                    alert(info.msg);
                }, "json");
                
            });
        });
        
    </script>
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
                                        <button id="botoajax">Clica'm</button>
                                        <?php foreach ($data["allArt"] as $key => $currArt) { ?>
                                            <h3><?php echo $currArt["title"]; ?></h3>
                                            <article>
                                                <p><?php echo $currArt["creation"]; ?></p>
                                                <p><?php echo $currArt["text"]; ?></p>
                                            </article>
                                        <?php } ?>
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
