<?php

session_start();

$pdo = new PDO('mysql:host=192.168.1.10;dbname=my_website', 'my_website', 'my_website', [
	PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
	PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
]);

$pdo->exec('SET NAMES UTF8');

function __autoload($classname)
{
	require('models/'.$classname.'.class.php');
}

$page = 'produits_list';
$access = ['produits_list', 'client', "create", "connexion", "logout", "produit", "produits", "commentaire", "panier"];
if (isset($_GET['page']))
{
	if (in_array($_GET['page'], $access))
	{
		$page = $_GET['page'];
	}
	else
	{
		header('Location: index.php');
		exit;
	}
}

$accessTraitement = ["create" => "client", "connexion" => "client", "logout" => "client", "produits" => 'produit', "produit" => "commentaire", "panier" => "commande"];
if (isset($accessTraitement[$page]))
{
	require('apps/traitement_'.$accessTraitement[$page].'.php');
}

require('apps/skel.php');

?>