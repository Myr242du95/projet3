<?php
// récuparation de tous les posts

function getPosts()
{
    $bdd=bddConnexion();
    $resultat=$bdd->query('SELECT id_article,titre_article,DATE_FORMAT(date_article,\'%d/%m/%Y à %Hh%imin%ss\' ) AS date_article_fr,contenu,auteur FROM publication ORDER BY date_article DESC');

	return $resultat;
}


// récupération d'un seul post
function getPost($postId)
{   
    $bdd=bddConnexion();
    $req=$bdd->prepare('SELECT id_article,titre_article,DATE_FORMAT(date_article,\'%d/%m/%Y à %Hh%imin%ss\' ) AS date_article_fr,contenu,auteur FROM publication WHERE id_article=? ORDER BY date_article DESC');

    $req->execute(array($postId));

    $post=$req->fetch();

	return $post;
}

// récupération des commentaires liés à un post
function getComments($postId)
{   
    $bdd=bddConnexion();
    $req=$bdd->prepare('SELECT id_commentaires,id_publication,auteur,commentaire,DATE_FORMAT(date_commentaire,\'%d/%m/%Y à %Hh%imin%ss\' ) AS date_commentaire_fr FROM commentaires WHERE id_publication=? ORDER BY date_commentaire DESC LIMIT 0,5');

    $req->execute(array($postId));
    //$post=$req->fetch();

	return $req;
} 

//Ajout des données dans la bdd
function addComment($id_publication,$auteur,$commentaire)
{
    $bdd=bddConnexion();
    //requête
    $sql='INSERT INTO commentaires(id_publication,auteur,commentaire,date_commentaire)VALUES(?,?,?,NOW())'; 

   $data= $bdd->prepare($sql);
  // $data= $bdd->prepare('INSERT INTO commentaires(id_publication,auteur,commentaire,date_commentaire)VALUES(?,?,?,NOW())');

   $resultat=$data->execute(array($id_publication,$auteur,$commentaire) );

return $resultat;
   //echo 'les données sont enregistrées';
}
//addPost('1','mymy','on essait tous les jours',NOW());
//Connexion à la base de données 
function bddConnexion()
{    
    $bdd = new PDO('mysql:host=localhost;dbname=blogsql;charset=utf8','root','', array(PDO::ATTR_ERRMODE=> PDO::ERRMODE_EXCEPTION) );

    return $bdd;    
}

?>