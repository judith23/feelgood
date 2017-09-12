<?php
// var_dump($_POST,$_SESSION);

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
				if ($client)
				{
					$panier = $client->getPanier();
					$panier->ajoutProduit($produit);
					header('Location: index.php?page=panier');
					exit;
				}
			}
		}
		else
		{
			$error = "OUPS ...";
		}
	}
}
	
?>	