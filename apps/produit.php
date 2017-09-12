<?php
if (isset($_GET['id']))
{
	$manager = new ProduitsManager($pdo);
	$produit = $manager->findById($_GET['id']);
	require('views/produit.phtml');
}
?>