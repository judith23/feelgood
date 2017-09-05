<?php
class Produits
{
	private $id;
	private $nom_produit;
	private $image;
	private $description_produit;
	private $prix;
	private $quantite;
	private $couleur;
	private $gamme;

	public function getId()
	{
		return $this->id;
	}
	public function getNomProduit()
	{
		return $this->nom_produit;
	}
	public function getImage()
	{
		return $this->image;
	}
	public function getDescriptionProduit()
	{
		return $this->description_produit;
	}
	public function getPrix()
	{
		return $this->prix;
	}
	public function getQuantite()
	{
		return $this->quantite;
	}
	public function getCouleur()
	{
		return $this->couleur;
	}
	public function getGamme()
	{
		return $this->gamme;
	}	



	public function setNomProduit($nom_produit)
	{
		$this->nom_produit = $nom_produit;
	}
	public function setImage($image)
	{
		$this->image = $image;
	}
	public function setDescriptionProduit($description_produit)
	{
		$this->description_produit = $description_produit;
	}
	public function setPrix($prix)
	{
		 $this->prix = $prix;
	}
	public function setQuantite($quantite)
	{
		$this->quantite = $quantite;
	}
	public function setCouleur($couleur)
	{
		$this->couleur = $couleur;
	}
	public function setGamme($gamme)
	{
		$this->gamme = $gamme;
	}	

}
?>