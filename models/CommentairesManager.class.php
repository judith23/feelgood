<?php
class CommentairesManager
{
	private $PDO;

	public function __construct($PDO)
	{
		$this->PDO = $PDO;
	}

	public function findById($id)
	{
		$sql = "SELECT * FROM commentaire WHERE id=?";
		$query = $this->PDO->prepare($sql);
		$query->execute([$id]);
		$commentaire = $query->fetchObject('Commentaires');
		return $commentaire;
	}

	public function create($id_produit, $description, $id_auteur)
	{
		$Commentaire = new Commentaires();
		$Commentaire->setIdProduit($id_produit);
		$Commentaire->setDescription($description);
		$Commentaire->setIdAuteur($id_auteur);

		$sql = "INSERT INTO commentaire (id_produit, description, id_auteur) VALUE (?, ?, ?)";
		$query = $this->PDO->prepare($sql);
		$query->execute([$commentaire->getIdProduit(),
						$commentaire->getDescription(),
						$commentaire->getIdAuteur()]);
		$id = $this->PDO->lastInsertId();
		return $this->findById($id);
	}

	public function remove(Commentaires $commentaire)
	{
		$sql = "DELETE FROM commentaire WHERE id=?";
		$query = $this->PDO->prepare($sql);
		$query->execute([$commentaire->getId()]);
	}

	public function update(Commentaires $commentaire)
	{
		$sql = "UPDATE commentaire SET id_produit=?, description=?, id_auteur=? WHERE id=?";
		$query = $this->PDO->prepare($sql);
		$query->execute([$commentaire->getIdProduit(),
						$commentaire->getDescription()
						$commentaire->getIdAuteur()]);
		return $this->findById($commentaire->getId());
	}	
}
?>