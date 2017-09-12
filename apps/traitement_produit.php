<?php

// var_dump($_POST);

if (isset($_POST['action']))
{
	$action = $_POST['action'];
	if (isset($_POST['nom_produit'], $_POST['image'], $_POST['description_produit'],
		$_POST['prix'], $_POST['quantite'], 
		$_POST['couleur'], $_POST['gamme']))
	{
		$manager = new ProduitsManager($pdo);
		$produit = $manager->create($_POST['nom_produit'], $_POST['image'], $_POST['description_produit'], $_POST['prix'], $_POST['quantite'], 
			$_POST['couleur'], $_POST['gamme']);
		header('Location: index.php?page=produit&id='.$produit->getId());
		exit;
	}
else if ($action == 'update')
	{
	if (isset($_POST['nom_produit'], $_POST['image'], $_POST['description_produit'],
			$_POST['prix'], $_POST['quantite'], 
			$_POST['couleur'], $_POST['gamme']))
		{
			$manager = new ProduitsManager($pdo);
			$produit = $manager->findById($_POST['id']);
			if ($produit)
			{
				$produit->setNomPrdruit($_POST['nom_produit']);
				$produit->setImage($_POST['image']);
				$produit->setDescriptionProduit($_POST['description_produit']);
				$produit->setPrix($_POST['prix']);
				$produit->setQuantite($_POST['quantite']);
				$produit->setCouleur($_POST['couleur']);
				$produit->setGamme($_POST['gamme']);
				header('Location: index.php?page=produit&id='.$produit->getId());
				exit;
			}
			else
				$error = "Le produit n'existe pas.";
		}
	}
else if ($action == 'delete')
	{
		if (isset($_POST['id']))
		{
			$manager = new ProduitsManager($pdo);
			$produit = $manager->findById($_POST['id']);
			if ($produit)
			{
				$manager->remove($produit);
				header('Location: index.php?page=produit');
				exit;
			}
			else
				$error = "Le produit n'existe pas.";
		}
	}
	
}


?>