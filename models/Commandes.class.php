<?php
class Commandes
{
	private $id;
	private $nom;
	private $prenom;
	private $email;
	private $adresse_livraison;
	private $date;
	private $id_client;

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
		return $this->adresse_livraison;
	}
	public function getDate()
	{
		return $this->date;
	}
	public function getIdClient()
	{
		return $this->id_client;
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
	public function setAdresseLivraison($adresse_livraison)
	{
		$this->adresse_livraison;
	}
	public function setIdClient($id_client)
	{
		$this->id_client;
	}

}
?>