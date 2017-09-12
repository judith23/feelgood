<?php
$manager = new ProduitsManager($pdo);
$produits = $manager->findAll();
require('views/produits_list.phtml');
?>