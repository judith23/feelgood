<?php
class ClientsManager
{
	private $PDO;

	public function __construct($PDO)
	{
		$this->PDO = $PDO;
	}

	public function findById($id)
	{
		$sql = "SELECT * FROM client WHERE id=?";
		$query = $this->PDO->prepare($sql);
		$query->execute([$id]);
		$client = $query->fetchObject('Clients');
		return $client;
	}

	public function findByPseudo($pseudo)
	{
		$sql = "SELECT * FROM client WHERE pseudo=?";
		$query = $this->PDO->prepare($sql);
		$query->execute([$pseudo]);
		$client = $query->fetchObject('Clients');
		return $client;
	}

	public function create($pseudo, $mdp, $nom, $prenom, $adresse, $ville, $telephone, $email)
	{
		$client = new Client();
		$client->setPseudo($pseudo);
		$client->setMdp($mdp);
		$client->setNom($nom);
		$client->setPrenom($prenom);
		$client->setAdresse($adresse);
		$client->setVille($ville);
		$client->setTelephone($telephone);
		$client->setEmail($email);

		$sql = "INSERT INTO client (pseudo, mdp, nom, prenom, adresse, ville, telephone, email) VALUES(?, ?, ?, ?, ?, ?, ?, ?,)";
		$query = $this->PDO->prepare($sql);
		$query->execute([$client->getPseudo(), $client->getMdp(), $client->getNom(), $client->getPrenom(), $client->getAdresse(), $client->getVille(), $client->getTelephone(), $client->getEmail()]);
		$id = $this->PDO->lastInsertId();
		return $this->findById($id);
	}

	public function remove(Clients $client)
	{
		$sql = "DELETE FROM client WHERE id=?";
		$query = $this->PDO->prepare($sql);
		$query->execute([$client->getId()]);
	}

	public function update(Clients $client)
	{
		$sql = "UPDATE client SET pseudo=?, mdp=?, nom=?, prenom=?, adresse=?, ville=?, telephone=?, email=? WHERE id=?";
		$query = $this->PDO->prepare($sql);
		$query->execute([$client->getPseudo(), $client->getMdp(), $client->getNom(), $client->getPrenom(), $client->getAdresse(), $client->getVille(), $client->getTelephone(), $client->getEmail(), $client->getId()]);
		return $this->findById($client->getId());
	}

}
?>