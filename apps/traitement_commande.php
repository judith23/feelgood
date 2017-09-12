<?php
var_dump($_POST,$_SESSION);

if (isset($_POST['action']))
{
	$action = $_POST['action'];
	if ($action == 'ajouter')
	{
		if (isset($_POST['id_produit'], $_SESSION['id']))
		{
			$produitManager = new ProduitsManager($pdo);
			$produit = $produitManager->findById($_POST['id_produit']);
			if ($produit)
			{
				$clientsManager = new ClientsManager($pdo);
				$client = $clientsManager->findById($_SESSION['id']);

				$commandesManager = new CommandesManager($pdo);
				$panier = $client->getPanier();// id_client=? AND statut=?
				header('Location: index.php');
			}
		}
		else
		{
			$error = "OUPS ...";
		}
	}
}
	
?>	