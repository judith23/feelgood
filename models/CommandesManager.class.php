<?php
class CommandesManager
{
	private $PDO;

	public function __construct($PDO)
	{
		$this->PDO = $PDO;
	}

	public function findById($id)
	{
		$sql = "SELECT * FROM commande WHERE id=?";
		$query = $this->PDO->prepare($sql);
		$query->execute([$id]);
		$client = $query->fetchObject('Commandes');
		return $client;
	}

	public function create($nom, $prenom, $email, $adresse_livraison, $id_client)
	{
		$commande = new Commandes();
		$commande->setNom($nom);
		$commande->setPrenom($prenom);
		$commande->setEmail($email);
		$commande->setAdresseLivraison($adresse_livraison);
		$commande->setIdClient($id_client);

		$sql = "INSERT INTO commande (nom, prenom, email, adresse_livraison, id_client) VALUES(?, ?, ?, ?, ?)";
		$query = $this->PDO->prepare($sql);
		$query->execute([$commande->getNom(),
						$commande->getPrenom(),
						$commande->getEmail(),
						$commande->getAdresseLivraison(),
						$commande->getIdClient()]);
		$id = $this->PDO->lastInsertId();
		return $this->findById($id);

	public function remove(Commandes $commande)
	{
		$sql = "DELETE FROM commande WHERE id=?";
		$query = $this->PDO->prepare($sql);
		$query->execute([$id]);
	}
	
	public function update(Commandes $commande)
	{
		$sql = "UPDATE commande SET nom=?, prenom=?, email=?, adresse_livraison=?, id_client=? WHERE id=?";
		$query = $this->PDO->prepare($sql);
		$query->execute([$commande->getNom(),
						$commande->getPrenom(),
						$commande->getEmail(),
						$commande->getAdresseLivraison(),
						$commande->getIdClient()]);
		return $this->findById($commande->getId());
	}
	
}
?>