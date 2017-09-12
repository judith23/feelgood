<?php

if (isset($_GET['page']) && $page == 'logout')
{
	$_SESSION = [];
	session_destroy();
	header('Location: index.php');
	exit;
}
if (isset($_POST['action']))
{
	$action = $_POST['action'];
	if ($action == 'create')
	{
		if (isset($_POST['pseudo'], $_POST['mdp'], $_POST['nom'], $_POST['prenom'], $_POST['adresse'], $_POST['ville'], $_POST['telephone'], $_POST['email']))
		{
			$manager = new ClientsManager($pdo);
			$client = $manager->create($_POST['pseudo'], $_POST['mdp'], $_POST['nom'], $_POST['prenom'], $_POST['adresse'], $_POST['ville'], $_POST['telephone'], $_POST['email']);
			header('Location: index.php?page=connexion');
			exit;
		}
	}
	else if ($action == 'login')
	{	
		if (isset($_POST['pseudo'], $_POST['mdp']))
		{
			$manager = new ClientsManager($pdo);
			$client = $manager->findByPseudo($_POST['pseudo']);
			if ($client)
			{
				if ($client->getMdp() == $_POST['mdp'])
				{
					$_SESSION['id']=$client->getId();
					header('Location: index.php');
					exit;
				}
			}
			else
			{
				$error = "Le mot de passe n'existe pas.";
			}
		}
	}
	else if ($action == 'update')
	{
		if (isset($_POST['id'], $_POST['pseudo'], $_POST['mdp'], $_POST['nom'], $_POST['prenom'], $_POST['adresse'], $_POST['ville'], $_POST['telephone'], $_POST['email']))
		{
			$manager = new ClientsManager($pdo);
			$client = $manager->findById($_POST['id']);
			if ($client)
			{
				$client->setPseudo($_POST['pseudo']);
				$client->setMdp($_POST['mdp']);
				$client->setNom($_POST['nom']);
				$client->setPrenom($_POST['prenom']);
				$client->setAdresse($_POST['adresse']);
				$client->setVille($_POST['ville']);
				$client->setTelephone($_POST['telephone']);
				$client->setEmail($_POST['email']);
				header('Location: index.php?page=client&id='.$client->getId());
				exit;
			}
			else
				$error = "Le compte client n'existe pas.";
		}
	}
	else if ($action == 'delete')
	{
		if (isset($_POST['id']))
		{
			$manager = new ClientsManager($pdo);
			$client = $manager->findById($_POST['id']);
			if ($client)
			{
				$manager->remove($client);
				header('Location: index.php?page=client');
				exit;
			}
			else
				$error = "Le compte n'existe pas.";
		}
	}
}
?>			