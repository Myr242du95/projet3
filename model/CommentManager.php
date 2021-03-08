<?php
namespace Myrna\projet3\model;

require_once('Manager.php');

// Classe de commentaires un gestionnaire de commentaire
  class CommentManager extends Manager{

    // récupération des commentaires liés à un post
    public function getComments($postId)
    {   
        $bdd=$this->bddConnexion();
        $req=$bdd->prepare('SELECT id_commentaires,id_publication,auteur,commentaire,DATE_FORMAT(date_commentaire,\'%d/%m/%Y à %Hh%imin%ss\' ) AS date_commentaire_fr FROM commentaires WHERE id_publication=? ORDER BY date_commentaire DESC LIMIT 0,5');

        $req->execute(array($postId));
        //$post=$req->fetch();

      return $req;
    } 

    //Ajout des données dans la bdd
    public function addComment($id_publication,$auteur,$commentaire)
    {
        $bdd=$this->bddConnexion();
        //requête
       /* $sql='INSERT INTO commentaires(id_publication,auteur,commentaire,date_commentaire)VALUES(?,?,?,NOW())'; */

       //$data= $bdd->prepare($sql);
       $data= $bdd->prepare('INSERT INTO commentaires(id_publication,auteur,commentaire,date_commentaire)VALUES(?,?,?,NOW())');

       $resultat=$data->execute(array($id_publication,$auteur,$commentaire) );

    return $resultat;
    }

    //Identification
    public function loginVisitor()
    {
        $bdd=$this->bddConnexion();

        $sql='SELECT * FROM identifiant WHERE pseudo= :pseudo and mdp = :mdp';

        $req= $bdd->prepare($sql);
//$donnees=$req->fetch();
        //Liens des paramètres
        $pseudo=htmlentities(addslashes($_POST['pseudo']) );
        $mdp=htmlentities(addslashes($_POST['mdp']) );

        $req->bindValue(':pseudo', $pseudo);
        $req->bindValue(':mdp', $mdp);
        $req->execute();

        return $req;
    }

//Identification
    public function inscription()
    {
        $nom=htmlspecialchars(trim($_POST["nom"]));
        $pseudo=htmlspecialchars(trim($_POST["pseudo"]));
        $email=htmlspecialchars($_POST["email"]);

        /*$mdp=sha1($_POST["mdp"]);
         $mdpC=sha1($_POST["mdp"]); */


        $mdp1=htmlentities(addslashes($_POST['mdp']) );
        $mdp=password_hash($mdp1, PASSWORD_DEFAULT);

        $bdd=$this->bddConnexion();
        $sql='INSERT INTO inscription(nom,pseudo,email,mdp)VALUES(?,?,?,?)';

        $data= $bdd->prepare($sql);

        $data->execute(array($nom,$pseudo,$email,$mdp));

        $req= $bdd->prepare($sql);
//$donnees=$req->fetch();
        //Liens des paramètres
        

        $req->bindValue(':pseudo', $pseudo);
        $req->bindValue(':mdp', $mdp);
        $req->execute();

        return $req;
    }

}

?>