<?php 
   session_start();
   require 'mysql_query.php';
?>
<!doctype html>
<html lang="fr">
   <head>
      <meta charset="utf-8">
      <title>BLOOD - Accueil</title>
      <link rel="stylesheet" href="style.css">
   </head>
   <body>
      <div id="background">
         <div id="header">
            <div id="child">
               ETUDE BLOOD | Interface web 
               <br><br>
               Page de connexion
            </div>
         </div>
         <div id="body">
            <div id="child">
               <form method="post" action="">
                  <br>
                  <br>
                  <br>
                  Identifiant : 
                  <br>
                  <input type="text" id="buttonAndInput" name="identifiant_CLR">
                  <br>
                  Mot de passe : 
                  <br>
                  <input type="password" id="buttonAndInput" name="mdp_CLR">
                  <br>
                  <br>
                  <input type="submit" id="buttonAndInput" name="connexion" value="Connexion">
               </form>

               <?php

               if (isset($_POST['connexion']))
                  {
                  $id = $_POST['identifiant_CLR'];
                  $mdp = $_POST['mdp_CLR'];
                  if (empty($id))
                     {
                     echo "Veuillez saisir votre identifiant.<br/>";
                     }
                  elseif (empty($mdp))
                     {
                     echo "Veuillez saisir votre mot de passe.<br/>";
                     }
                    else
                     {
                     include ("initialisation.php");

                     $query = "SELECT idUtil, mdpUtil, niveauAcces FROM utilisateur WHERE idUtil='$id' AND mdpUtil='$mdp'";
                                                            
                     if (database::query($query, false)==1)
                        { // l'utilisateur existe dans la base de données
                        $_SESSION['identifiant'] = $id;
                        foreach(database::query($query, true) as $ligne)
                           {
                           if ($ligne["niveauAcces"] == 1)
                              {
                              header('Location:CLR.php');
                              }
                           elseif ($ligne["niveauAcces"] == 2)
                              {
                              header('Location:CS.php');
                              }
                             else
                              {
                              header('Location:LPH.php');
                              }
                           }
                        }
                       else
                        {
                        echo "Identifiant ou mot de passe incorrect.";
                        }
                     }
                  }

               ?>

            </div>
         </div>

         <div id="bottom">
            <div id="bottomChild">
               Simon Hay - Charles Tholliez | 2017
            </div>
         </div>

      </div>
   </body>
</html>
