<?php

//var_dump($_POST, $_SESSION);


if (isset($_POST['action']))
{
	$action = $_POST['action'];
	if ($action == 'create')
	{
		if (isset($_POST['id_produit'], $_SESSION['id'], $_POST['description']))
		{
			$clientManager = new ClientsManager($pdo);
			$auteur = $clientManager->findById($_SESSION['id']);
			if ($auteur)
			{
				$produitManager = new ProduitsManager($pdo);
				$produit = $produitManager->findById($_POST['id_produit']);
				if ($produit)
				{
					$manager = new CommentairesManager($pdo);
					$commentaire = $manager->create($produit, $_POST['description'], $auteur);
					header('Location: index.php?page=produit&id='.$commentaire->getProduit()->getId());
					exit;
				}
			}
			else
				$error = "Le commentaire n'existe pas.";
		}
	}
	else if ($action == 'update')
	{
		if (isset($_POST['id_produit'], $_POST['id_auteur'], $_POST['description']))
		{
			$manager = new CommentairesManager($pdo);
			$commentaire = $manager->findById($_POST['id']);
			if ($commentaire)
			{
				$commentaire->setIdProduit($_POST['id_produit']);
				$commentaire->setIdAuteur($_POST['id_auteur']);
				$commentaire->setDescription($_POST['description']);
				header('Location: index.php');
				exit;
			}
			else
				$error = "Le commentaire n'existe pas.";
		}
	}
	else if ($action == 'delete')
	{
		if (isset($_POST['id']))
		{
			$manager = new CommentairesManager($pdo);
			$commentaire = $manager->findById($_POST['id']);
			if ($commentaire)
			{
				$manager->remove($commentaire);
				header('Location: index.php');
				exit;
			}
			else
				$error = "Le commentaire n'existe pas.";
		}
	}
}
?>	