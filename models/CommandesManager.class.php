<?php
class CommandesManager
{
	private $pdo;

	public function __construct($pdo)
	{
		$this->pdo = $pdo;
	}

	public function findPanierByClients(Clients $client)
	{
		$sql = "SELECT * FROM commande WHERE statut=? AND id_client=?";
		$query = $this->pdo->prepare($sql);
		$query->execute(['panier', $client->getId()]);
		$panier = $query->fetchObject('Commandes',[$this->pdo]);
		return $panier;
	}

	public function findById($id)
	{
		$sql = "SELECT * FROM commande WHERE id=?";
		$query = $this->pdo->prepare($sql);
		$query->execute([$id]);
		$client = $query->fetchObject('Commandes',[$this->pdo]);
		return $client;
	}

	public function findAll()
	{
		$sql = "SELECT * FROM statut";
		$query = $this->pdo->prepare($sql);
		$query->execute();
		$statut = $query->fetchAll(PDO::FETCH_CLASS, 'Commandes', [$this->pdo]);
		return $statut;
	}

	public function create(Clients $client)
	{
		$commande = new Commandes($this->pdo);
		$commande->setNom($client->getNom());
		$commande->setPrenom($client->getPrenom());
		$commande->setEmail($client->getEmail());
		$commande->setClient($client);
		// $commande->setStatut($statut);

		$sql = "INSERT INTO commande (nom, prenom, email, id_client) VALUES(?, ?, ?, ?)";
		$query = $this->pdo->prepare($sql);
		$query->execute([$commande->getNom(),
						$commande->getPrenom(),
						$commande->getEmail(),
						$commande->getClient()->getId()]);
		$id = $this->pdo->lastInsertId();
		return $this->findById($id);
}
	public function remove(Commandes $commande)
	{
		$sql = "DELETE FROM commande WHERE id=?";
		$query = $this->pdo->prepare($sql);
		$query->execute([$id]);
	}
	
	public function update(Commandes $commande)
	{
		$sql = "UPDATE commande SET nom=?, prenom=?, email=?, adresse_livraison=?, id_client=?, statut=? WHERE id=?";
		$query = $this->pdo->prepare($sql);
		$query->execute([$commande->getNom(),
						$commande->getPrenom(),
						$commande->getEmail(),
						$commande->getAdresseLivraison(),
						$commande->getIdClient(),
						$commande->getStatut()]);
		return $this->findById($commande->getId());
	}

	public function ajoutProduit(Commandes $commande, Produits $produit)
	{
		$sql = "INSERT INTO panier (id_commande, id_produit) VALUES(?, ?)";
		$query = $this->pdo->prepare($sql);
		$query->execute([$commande->getId(),
						$produit->getId()]);
		return $this->findById($commande->getId());
	}
	
}
?>