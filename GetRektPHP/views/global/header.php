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
            <div id="menu">
                <div class="logo">
                    <img src="<?php echo $globals['base_path']; ?>media/image/common/logo-white.png" />
                </div>
                <h1 class="link-home"><a href="<?php echo $globals['base_path']; ?>"><span class="coloured">Get</span> Rekt</a></h1>
                <div class="links-right">
                <?php
                if ($secu->logged()) {
                    ?>
                    <a class="link-btn participe" href="<?php echo $globals['base_path']; ?>?page=video&action=add">Participe !</a>                        
                    <a class="link-btn deconnexion" href="<?php echo $globals['base_path']; ?>?page=deconnexion">Déconnexion<span class="sr-only">(current)</span></a>

                    <?php
                } else {
                    ?>
                    <a class="link-btn inscription" href="<?php echo $globals['base_path']; ?>?page=user&action=add">Inscription</a>
                    <?php
                }
                ?>
                </div>
            </div>
        </header>


        <section class ="section">

            <?php if (!$secu->logged()) { ?>
                <aside class="connection-container">
                    <h1 class="block-title">Connexion</h1>
                    <form class="user-form" id="connect-user-form" action="" method="POST">
                        <div class="form-item">
                        <input class="field" name="pseudo" type="text" placeholder="Pseudo">                            
                        </div>
                        <div class="form-item">
                        <input class="field" name="motDePasse" type="password" placeholder="Mot de passe">                          
                        </div>
                        <div class="form-item">
                            <input class="get-rekt-btn" name="submit" type="submit" value="Se connecter">                      
                        </div>
                    </form>            
                </aside>
            <?php } ?>
