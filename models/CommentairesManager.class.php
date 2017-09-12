<?php
class CommentairesManager
{
	private $pdo;

	public function __construct($pdo)
	{
		$this->pdo = $pdo;
	}

	public function findByProduit(Produits $produit)
	{
		$sql = "SELECT * FROM commentaire WHERE id_produit=?";
		$query = $this->pdo->prepare($sql);
		$query->execute([$produit->getId()]);
		$commentaires = $query->fetchAll(PDO::FETCH_CLASS, 'Commentaires', [$this->pdo]);
		return $commentaires;
	}

	public function findById($id)
	{
		$sql = "SELECT * FROM commentaire WHERE id=?";
		$query = $this->pdo->prepare($sql);
		$query->execute([$id]);
		$commentaire = $query->fetchObject('Commentaires',[$this->pdo]);
		return $commentaire;
	}

	public function findByClient(Client $client)
	{
		$sql = "SELECT * FROM commentaire WHERE id_client=?";
		$query = $this->pdo->prepare($sql);
		$query->execute([$client->getId()]);
		$commentaire = $query->fetchAll(PDO::FETCH_CLASS,'Commentaires',[$this->pdo]);
		return $commentaire;
	}

	public function findAll()
	{
		$sql = "SELECT * FROM commentaire";
		$query = $this->pdo->prepare($sql);
		$query->execute();
		$commentaire = $query->fetchAll(PDO::FETCH_CLASS, 'Commentaires', [$this->pdo]);
		return $commentaire;
	}	

	public function create(Produits $produit, $description, Clients $auteur)
	{
		$commentaire = new Commentaires($this->pdo);
		$commentaire->setProduit($produit);
		$commentaire->setDescription($description);
		$commentaire->setAuteur($auteur);

		$sql = "INSERT INTO commentaire (id_produit, description, id_auteur) VALUE (?, ?, ?)";
		$query = $this->pdo->prepare($sql);
		$query->execute([$commentaire->getProduit()->getId(),
						$commentaire->getDescription(),
						$commentaire->getAuteur()->getId()]);
		$id = $this->pdo->lastInsertId();
		return $this->findById($id);
	}

	public function remove(Commentaires $commentaire)
	{
		$sql = "DELETE FROM commentaire WHERE id=?";
		$query = $this->pdo->prepare($sql);
		$query->execute([$commentaire->getId()]);
	}

	public function update(Commentaires $commentaire)
	{
		$sql = "UPDATE commentaire SET id_produit=?, description=?, id_auteur=? WHERE id=?";
		$query = $this->pdo->prepare($sql);
		$query->execute([$commentaire->getIdProduit(),
						$commentaire->getDescription(),
						$commentaire->getAuteur()->getId()]);
		return $this->findById($commentaire->getId());
	}	
}
?>