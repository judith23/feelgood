<?php
class ClientsManager
{
	private $pdo;

	public function __construct($pdo)
	{
		$this->pdo = $pdo;
	}

	public function findById($id)
	{
		$sql = "SELECT * FROM client WHERE id=?";
		$query = $this->pdo->prepare($sql);
		$query->execute([$id]);
		$client = $query->fetchObject('Clients',[$this->pdo]);
		return $client;
	}

	public function findByPseudo($pseudo)
	{
		$sql = "SELECT * FROM client WHERE pseudo=?";
		$query = $this->pdo->prepare($sql);
		$query->execute([$pseudo]);
		$client = $query->fetchObject('Clients',[$this->pdo]);
		return $client;
	}

	public function create($pseudo, $mdp, $nom, $prenom, $adresse, $ville, $telephone, $email)
	{
		$client = new Clients($this->pdo);
		$client->setPseudo($pseudo);
		$client->setMdp($mdp);
		$client->setNom($nom);
		$client->setPrenom($prenom);
		$client->setAdresse($adresse);
		$client->setVille($ville);
		$client->setTelephone($telephone);
		$client->setEmail($email);

		$sql = "INSERT INTO client (pseudo, mdp, nom, prenom, adresse, ville, telephone, email) VALUES(?, ?, ?, ?, ?, ?, ?, ?)";
		$query = $this->pdo->prepare($sql);
		$query->execute([$client->getPseudo(), $client->getMdp(), $client->getNom(), $client->getPrenom(), $client->getAdresse(), $client->getVille(), $client->getTelephone(), $client->getEmail()]);
		$id = $this->pdo->lastInsertId();
		return $this->findById($id);
	}

	public function remove(Clients $client)
	{
		$sql = "DELETE FROM client WHERE id=?";
		$query = $this->pdo->prepare($sql);
		$query->execute([$client->getId()]);
	}

	public function update(Clients $client)
	{
		$sql = "UPDATE client SET pseudo=?, mdp=?, nom=?, prenom=?, adresse=?, ville=?, telephone=?, email=? WHERE id=?";
		$query = $this->pdo->prepare($sql);
		$query->execute([$client->getPseudo(), $client->getMdp(), $client->getNom(), $client->getPrenom(), $client->getAdresse(), $client->getVille(), $client->getTelephone(), $client->getEmail(), $client->getId()]);
		return $this->findById($client->getId());
	}

}
?>