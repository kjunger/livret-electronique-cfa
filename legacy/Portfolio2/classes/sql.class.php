<?php

/**********************************************************************************************************/
/*******************************************class mysql wnn V1*********************************************/
/********************************class pour gérer une base de donné mysql**********************************/
/**************************Class créé pour webnewnet.tk ainsi que thewod.com*******************************/
/*************************************Tous droits réserver a Nadim*****************************************/
/***Vous êtes libre d'utiliser cette classe autant que vous le désirez, cependant vous devez laisser les***/
/******************************************commentaires suivants*******************************************/
/**********************************************************************************************************/
class mysql
	{
		var $sql_serveur;
		var $sql_utlisateur;
		var $sql_password ;
		var $sql_bd;
		var $connection_sql;
		var $select_bd;
		var $resultat;
		var $sql_debug; // permet d'afficher les erreur mysql lors qu'il y en a, sinon le message d'erreur défini dans le fichier constante
		var $connection_verif;
		var $nb_requete;
		var $requete;
		var $erreur;
		var $message_erreur;
		
		//constructeur
		function mysql()
		{
			$this->sql_serveur = SERVER;
			$this->sql_utilisateur = LOGIN;
			$this->sql_password = PASS;
			$this->sql_bd = BDD;
			$this->sql_debug = SQL_DEBUG;
			$this->message_erreur = MESS_ERREUR;
			$this->resultat = array();
			$this->connection_verif = 0;
			$this->connection();
		}
				
		//fonction de connection a mysql
		function connection()
			{
				if($this->connection_verif == "0")
					{
						$this->connection_sql = @mysql_connect($this->sql_serveur, $this->sql_utilisateur, $this->sql_password);
						if(!$this->connection_sql)
							{
								$this->mysql_erreur();
							}
						else
							{
								$this->selection_bd();
							}
					}
			}
		
		//fonction de selection de la base de donnée
		function selection_bd()
			{
				$this->select_bd = @mysql_select_db($this->sql_bd, $this->connection_sql);  
				if(!$this->select_bd) 
					{ 
            			$this->mysql_erreur(); 
					}
				else
					{
						$this->connection_verif = 1;
					}
			}
		
		//fonction de déconnexion de la base de donnée
		function deconnexion()
		{
			mysql_close($this->connection_sql);
		}
			
		//fonction d'execution de requête
		function requete($requete, $p)
			{
				$this->requete = $requete;
				$this->resultat[$p] = mysql_query($requete);
				$this->nb_requete++;
				if(!$this->resultat[$p])
					{
						$this->mysql_erreur();
					}
			}
		
		//fontion qui retourne les donnée dans un tableau grace a fetch array
		function resultat($p)
			{
				return @mysql_fetch_array($this->resultat[$p]);
			}
		
		//fonction permettant de compter le nombre de resultat trouvé
		function nb_resultat($p)
			{
				return @mysql_num_rows($this->resultat[$p]);
			}
			
		function new_id()
		{
			return mysql_insert_id();
		}
		//function d'affichage des erreur mysql	
		function mysql_erreur()
			{
				if($this->sql_debug == 0)
					{
						echo $this->message_erreur;
					}
				elseif($this->sql_debug == 1)
					{
						$this->erreur = @mysql_error($this->connection_sql); 
						$message = "une erreur mysql est survenue : <br />".$this->requete." <form name='mysql'><textarea rows='15' cols='60'>".$this->erreur."</textarea></form>";
						echo $message;
					}
			}
	}
?>

