<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title>Get Rekt</title>
        <meta http-equiv="content-type" content="text/html; UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="<?php echo $globals['base_path']; ?>js/vendor/bootstrap-3.3.6-dist/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="<?php echo $globals['base_path']; ?>css/app.css">
    </head>
    <body>
        <header>
           <div id="sidebar-wrapper">
            <ul class="sidebar-nav">
                <li>
                    <a href="<?php echo $globals['base_path']; ?>">Accueil</a>
                </li>
                <li>
                    <a href="<?php echo $globals['base_path']; ?>?page=video&action=add">Soumettre une vidéo</a>
                </li>
                <li>
                    <a href="<?php echo $globals['base_path']; ?>?page=user&action=add">Inscription</a>
                </li>
                
                    <?php
                        if($secu->logged())
                        {
                            ?>
                           
                <li class="deco">
                    <a href="<?php echo $globals['base_path']; ?>?page=deconnexion">Déconnexion<span class="sr-only">(current)</span></a>
                </li>
                        <?php
                        }
                        ?>
            </ul>
        </div>
        </header>
        
        <aside class="connection-container">
            <form class="user-form" id="connect-user-form" action="" method="POST">    
                <input class="field" name="pseudo" type="text" placeholder="Pseudo">
                <input class="field" name="motDePasse" type="password" placeholder="Mot de passe">
                <input class="get-rekt-btn" name="submit" type="submit" value="Se connecter">
            </form>            
        </aside>
        
        <section class ="section">
        