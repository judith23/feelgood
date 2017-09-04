<?php
class Produits
{
	private $id;
	private $nomProduit;
	private $image;
	private $descriptionProduit;
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
		return $this->nomProduit;
	}
	public function getImage()
	{
		return $this->image;
	}
	public function getDescriptionProduit()
	{
		return $this->descriptionProduit;
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



	public function setNomProduit($nomProduit)
	{
		$this->nomProduit = $nomProduit;
	}
	public function setImage($image)
	{
		$this->image = $image;
	}
	public function setDescriptionProduit($descriptionProduit)
	{
		$this->descriptionProduit = $descriptionProduit;
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