<?php
class Commentaires
{
	private $id;
	private $id_produit;
	private $description;
	private $date;
	private $id_auteur;

	public function getId()
	{
		return $this->id;
	}
	public function getIdProduit()
	{
		return $this->id_produit;
	}
	public function getDescription()
	{
		return $this->description;
	}
	public function getDate()
	{
		return $this->date;
	}
	public function getIdAuteur()
	{
		return $this->id_auteur;
	}
	

	public function setIdProduit($id_produit)
	{
		$this->id_produit = $id_produit;
	}
	public function setDescription($description)
	{
		$this->description = $description;
	}
	public function setIdAuteur($id_auteur)
	{
		$this->id_auteur = $id_auteur;
	}
	
}
?>