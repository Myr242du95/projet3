<?php
namespace Myrna\projet3\model;

require_once('Manager.php');

// Création de la classe Gésionnaire de post de blog
  class PostManager extends Manager
  {
    // récuparation de tous les posts
    public function getPosts()
    {
        $bdd=$this->bddConnexion();
        $resultat=$bdd->query('SELECT id_article,titre_article,DATE_FORMAT(date_article,\'%d/%m/%Y à %Hh%imin%ss\' ) AS date_article_fr,chapo,contenu,auteur FROM publication ORDER BY date_article DESC');

      return $resultat;
    }

    // récupération d'un seul post
    public function getPost($postId)
    {   
        $bdd=$this->bddConnexion();
        $req=$bdd->prepare('SELECT id_article,titre_article,DATE_FORMAT(date_article,\'%d/%m/%Y à %Hh%imin%ss\' ) AS date_article_fr,chapo,contenu,auteur FROM publication WHERE id_article=? ORDER BY date_article DESC');

        $req->execute(array($postId));

        $post=$req->fetch();

      return $post;
    }

    //Connexion à la base de données 
 /*   private function bddConnexion()
    {    
        $bdd = new PDO('mysql:host=localhost;dbname=blogsql;charset=utf8','root','', array(PDO::ATTR_ERRMODE=> PDO::ERRMODE_EXCEPTION) );

        return $bdd;    
    } */
}

?>