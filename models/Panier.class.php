<?php
class Panier
{
	private $id;
	private $id_commande;
	private $id_produit;

	//a oublier

	public function getId()
	{
		return $this->id;
	}
	public function getIdCommande()
	{
		return $this->id_commande;
	}
	public function getIdProduit()
	{
		return $this->id_produit;
	}
		

	public function setIdCommande($id_commande)
	{
		$this->id_commande = $id_commande;
	}
	public function setIdProduit($id_produit)
	{
		$this->id_produit = $id_produit;
	}
	
}
?>