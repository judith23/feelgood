<?php
class Commandes
{
	private $id;
	private $nom;
	private $prenom;
	private $email;
	private $adresseLivraison;
	private $date;
	private $idClient;

	public function getId()
	{
		return $this->id;
	}
	public function getNom()
	{
		return $this->nom;
	}
	public function getPrenom()
	{
		return $this->prenom;
	}
	public function getEmail()
	{
		return $this->email;
	}
	public function getAdresseLivraison()
	{
		return $this->adresseLivraison;
	}
	public function getDate()
	{
		return $this->date;
	}
	public function getIdClient()
	{
		return $this->idClient;
	}

	public function setNom($nom)
	{
		$this->nom = $nom;
	}
	public function setPrenom($prenom)
	{
		$this->prenom = $prenom;
	}
	public function setEmail($email)
	{
		$this->email = $email;
	}
	public function setAdresseLivraison($adresseLivraison)
	{
		$this->adresseLivraison;
	}
	public function setIdClient($idClient)
	{
		$this->idClient;
	}

}
?>