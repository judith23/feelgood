<?php
class Clients
{
	private $id;
	private $pseudo;
	private $mdp;
	private $nom;
	private $prenom;
	private $adresse;
	private $ville;
	private $telephone;
	private $email;

	public function getId()
	{
		return $this->id;
	}
	public function getPseudo()
	{
		return $this->pseudo;
	}
	public function getMdp()
	{
		return $this->mdp;
	}
	public function getNom()
	{
		return $this->nom;
	}
	public function getPrenom()
	{
		return $this->prenom;
	}
	public function getAdresse()
	{
		return $this->adresse;
	}
	public function getVille()
	{
		return $this->ville;
	}
	public function getTelephone()
	{
		return $this->telephone;
	}
	public function getEmail()
	{
		return $this->email;
	}

	public function setPseudo($pseudo)
	{
		$this->pseudo = $pseudo;
	}
	public function setMdp($mdp)
	{
		$this->mdp = $mdp;
	}
	public function setNom($nom)
	{
		$this->nom = $nom;
	}
	public function setPrenom($prenom)
	{
		$this->prenom = $prenom;
	}
	public function setAdresse($adresse)
	{
		$this->adresse = $adresse;
	}
	public function setVille($ville)
	{
		$this->ville = $ville;
	}
	public function setTelephone($telephone)
	{
		$this->telephone = $telephone;
	}
	public function setEmail($email)
	{
		$this->email = $email;
	}

}
?>