<?php
namespace Myrna\projet3\model;

// Classe de commentaires un gestionnaire de commentaire
  class Manager
  { 
    //Connexion à la base de données 
    protected function bddConnexion()
    {    
       /* $bdd = new PDO('mysql:host=localhost;dbname=blogsql;charset=utf8','root','', array(PDO::ATTR_ERRMODE=> PDO::ERRMODE_EXCEPTION) ); */
      $bdd = new \PDO('mysql:host=localhost;dbname=blogsql;charset=utf8','root','');

      return $bdd;    
    }
  }
?>