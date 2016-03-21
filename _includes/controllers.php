<?php 
    /*if(!empty($_GET['cat'])){   //Dans le cas d'une URL du type .../index.php?cat=ma_page
        if(is_file('_views/'.$_GET['cat'].'_root.php')){    //Vérification de l'existence de la page racine
            if(!empty($_GET['view'])){  //Dans le cas d'une URL du type .../index.php?cat=ma_page&view=une_page_particuliere
                if(is_file('_views/'.$_GET['cat'].'/'.$_GET['view'].'.php')){   //Vérification de son existence
                    include('_views/'.$_GET['cat'].'/'.$_GET['view'].'.php');   //Inclusion pour affichage
                }
                else{   //Si fichier inexistant
                    include('_controllers/404.php');    //Affichage erreur 404
                }
            }
            else{   //Si pas de _view appelée
                include('_views/'.$_GET['cat'].'_root.php');    //Affichage page racine
            }
        }
        else{   //Si page racine inexistante
            include('_controllers/404.php');    //Affichage erreur 404  
        }
    }
    else{ //Si aucun des conditions ci-dessus n'est rempli (= visite de la page d'accueil)
        include('_includes/accueil.php');   //Affichage de la page d'accueil
    }*/
    if(!empty($_GET['cat']) && !empty($_GET['view'])){  //Si appel d'une page _view de la catégorie _cat
        if(is_file('_views/'.$_GET['cat'].'/'.$_GET['view'].'.php')){   //Si fichier existe
            include('_views/'.$_GET['cat'].'/'.$_GET['view'].'.php');   //Affichage
        }
        else{   //Si inexistant
            include('_views/404.php');    //Erreur 404
        }
    }
    else{ //Si aucune des conditions ci-dessus n'est rempli (= visite de la page d'accueil)
        include('_includes/accueil.php');   //Affichage de la page d'accueil
    }
?>