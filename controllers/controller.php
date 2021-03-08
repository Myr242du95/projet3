<?php
//Fonction pour récup tous les billets
require_once('model/PostManager.php');
require_once('model/CommentManager.php');

//Accueil
function homePage()
{	
	require('view/homePage.php');
}

function loginPage()
{
	require('view/loginPage.php');
}
function signUp()
{
	require('view/signUp.php');
}

function loginVisitor()
{
	$instance_comment=new \Myrna\projet3\model\CommentManager();
	$req = $instance_comment->loginVisitor();
	
	require('view/verif_login.php');
}


function getListPost()
{
	$instance_req=new \Myrna\projet3\model\PostManager();
	//$req= getPosts();
	$req= $instance_req->getPosts();
	require('view/listPost.php');
}

function getPostComments()
{
	$instance_post=new \Myrna\projet3\model\PostManager();
	$instance_comment=new \Myrna\projet3\model\CommentManager();

	$post=$instance_post->getPost($_GET['id_article']);
	$comment= $instance_comment->getComments($_GET['id_article']);

	require('view/postView.php');
}

function addComments($id_publication,$auteur,$commentaire)
{
	$instance_comment=new \Myrna\projet3\model\CommentManager();
	$comments=$instance_comment->addComment($id_publication,$auteur,$commentaire);

	if($comments === false)
	{
		//die('Impossible d\'ajouter le commentaire !');
		throw new Exception('Impossible d\'ajouter le commentaire !');		
	}
	else
	{
		header('Location: index.php?action=getPostComments&id_article=' . $id_publication);		

	}
}


?>