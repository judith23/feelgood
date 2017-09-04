<?php
class Panier
{
	private $id;
	private $idCommande;
	private $idProduit;

	public function getId()
	{
		return $this->id;
	}
	public function getIdCommande()
	{
		return $this->idCommande;
	}
	public function getProduit()
	{
		return $this->produit;
	}
		

	public function setIdCommande($idCommande)
	{
		$this->idCommande = $idCommande;
	}
	public function setProduit($Produit)
	{
		$this->produit = $Produit;
	}
	

}
?>