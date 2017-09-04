<?php
class Commentaires
{
	private $id;
	private $idProduit;
	private $description;
	private $date;
	private $idAuteur;

	public function getId()
	{
		return $this->id;
	}
	public function getIdProduit()
	{
		return $this->idProduit;
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
		return $this->idAuteur;
	}
	

	public function setIdProduit($idProduit)
	{
		$this->idProduit = $idProduit;
	}
	public function setDescription($description)
	{
		$this->description = $description;
	}
	public function setIdAuteur($idAuteur)
	{
		$this->idAuteur = $idAuteur;
	}
	

}
?>