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

	private $panier;


	public function __construct($pdo)
	{
		$this->pdo = $pdo;
	}

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
		if (strlen($pseudo) >= 4 && strlen($pseudo) <= 65)
			$this->pseudo = $pseudo;
		else
			throw new Exception ("Pseudo invalide (la taille doit être compris entre 4 et 65 caractères)");
	}
	public function setMdp($mdp)
	{
		if (strlen($mdp) >= 4 && strlen($mdp) <= 255)
			$this->mdp = $mdp;
		else
			throw new Exception("Mdp invalide (la taille doit être compris entre 4 et 255 caractères)");
	}
	public function setNom($nom)
	{
		if (strlen($nom) >= 4 && strlen($nom) <= 63)
			$this->nom = $nom;
		else
			throw new Exception("Nom invalide (la taille doit être compris entre 4 et 63 caractères)");
			
	}
	public function setPrenom($prenom)
	{
		if (strlen($prenom) >= 4 && strlen($prenom) <= 63)
			$this->prenom = $prenom;
		else
			throw new Exception("Prenom invalide (la taille doit être compris entre 4 et 63 caractères)");
	}
	public function setAdresse($adresse)
	{
		if (strlen($adresse) >= 4 && strlen($adresse) <= 255)
			$this->adresse = $adresse;
		else
			throw new Exception("Adresse invalide (la taille doit être compris entre 4 et 63 caractères)");
	}
	public function setVille($ville)
	{
		if (strlen($ville) >= 2 && strlen($ville) <= 63)
			$this->ville = $ville;
		else
			throw new Exception("Ville invalide (la taille doit être compris entre 2 et 63 caractères)");
	}
	public function setTelephone($telephone)
	{
		if (strlen($telephone) >= 9 && strlen($telephone) <= 10)
			$this->telephone = $telephone;
		else
			throw new Exception("Telephone invalide (la taille doit être compris entre 9 et 10 caractères)");
	}
	public function setEmail($email)
	{
		if (strlen($email) >= 10 && strlen($email) <= 63)
			$this->email = $email;
		else
			throw new Exception("Email invalide (la taille doit être compris entre 10 et 63 caractères)");
	}

	public function getPanier()
	{
		$manager = new CommandesManager($this->pdo);
		$this->panier = $manager->findPanierByClients($this);
		if (!$this->panier)
		{
			$this->panier = $manager->create($this);
		}
		// cherche un panier en fonction du client
		return $this->panier;
	}

}
?>