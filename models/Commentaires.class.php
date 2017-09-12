<?php
class Commentaires
{
	private $id;
	private $id_produit;
	private $description;
	private $date;
	private $id_auteur;


//fair la compo avec le produit
	private $auteur;

	private $pdo;


	public function __construct($pdo)
	{
		$this->pdo = $pdo;
	}

	public function getId()
	{
		return $this->id;
	}
	
	/*public function getIdProduit()
	{
		return $this->id_produit;
	}*/

	public function getDescription()
	{
		return $this->description;
	}
	public function getDate()
	{
		return $this->date;
	}
	/*public function getIdAuteur()
	{
		return $this->id_auteur;
	}
	*/
	public function getAuteur()
	{
		$manager = new ClientsManager($this->pdo);
		$this->auteur = $manager->findById($this->id_auteur);
		return $this->auteur;
	}

	public function getProduit()
	{	
		$manager = new ProduitsManager($this->pdo);
		$this->produit = $manager->findById($this->id_produit);
		return $this->produit;
	}

	

	/*public function setIdProduit($id_produit)
	{
		$this->id_produit = $id_produit;
	}*/
	public function setDescription($description)
	{
		$this->description = $description;
	}
	/*
	public function setIdAuteur($id_auteur)
	{
		$this->id_auteur = $id_auteur;
	}
	*/
	public function setAuteur(Clients $auteur)
	{
		$this->id_auteur = $auteur->getId();
		$this->auteur = $auteur;
	}

	public function setProduit(Produits $produit)
	{
		$this->id_produit = $produit->getId();
		$this->produit = $produit;
	}

}
?>