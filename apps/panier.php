<?php
if (isset($_SESSION['id']))
{
	$manager = new ClientsManager($pdo);
	$user = $manager->findById($_SESSION['id']);
	require('views/panier.phtml');
}
?>