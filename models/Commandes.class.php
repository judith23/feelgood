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
	private $statut;

	private $client;
	
	private $pdo;
	
	public function __construct($pdo)
	{
		$this->pdo = $pdo;
	}

	//faire la composition : $db $client setclient getclient + constructor

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
	/*public function getIdClient()
	{
		return $this->id_client;
	}*/

	public function getClient()
	{
		$manager = new ClientsManager($this->pdo);
		$this->client = $manager->findById($this->id_client);
		return $this->client;
	}

	public function getStatut()
	{
		return $this->statut;
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
	/*public function setIdClient($id_client)
	{
		$this->id_client;
	}*/

	public function setClient(Clients $client)
	{
		$this->id_client = $client->getId();
		$this->client = $client;
	}
	public function setStatut($statut)
	{
		$this->statut = $statut;
	}

	public function ajoutProduit(Produits $produit)
	{
		$manager = new CommandesManager($this->pdo);
		$manager->ajoutProduit($this, $produit);
	}

	public function getProduits()
	{
		$manager = new ProduitsManager($this->pdo);
		return $manager->findByCommande($this);
	}

	public function getPrix()
	{
		$prix = 0;
		$manager = new ProduitsManager($this->pdo);
		$produits = $manager->findByCommande($this);
		foreach ($produits AS $produit)
		{
			$prix += $produit->getPrix();
		}
		return $prix;
	}

}
?>