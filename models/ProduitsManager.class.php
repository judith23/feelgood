<?php
class ProduitsManager
{
	private $pdo;

	public function __construct($pdo)
	{
		$this->pdo = $pdo;
	}

	public function findById($id)
	{
		$sql = "SELECT * FROM produit WHERE id=?";
		$query = $this->pdo->prepare($sql);
		$query->execute([$id]);
		$produit = $query->fetchObject('Produits', [$this->pdo]);
		return $produit;
	}

	public function findAll()
	{
		$sql = "SELECT * FROM produit";
		$query = $this->pdo->prepare($sql);
		$query->execute();
		$produit = $query->fetchAll(PDO::FETCH_CLASS, 'Produits', [$this->pdo]);
		return $produit;
	}

	public function create($nom_produit, $image, $description_produit, $prix, $quantite, $couleur, $gamme)
	{
		$produit = new Produits($this->pdo);
		$produit->setNomProduit($nom_produit);
		$produit->setImage($image);
		$produit->setDescriptionProduit($description_produit);
		$produit->setPrix($prix);
		$produit->setQuantite($quantite);
		$produit->setCouleur($couleur);
		$produit->setGamme($gamme);

		$sql = "INSERT INTO produit (nom_produit, image, description_produit, prix, quantite, couleur, gamme) VALUES(?, ?, ?, ?, ?, ?, ?)";
		$query = $this->pdo->prepare($sql);
		$query->execute([$produit->getNomProduit(),
						$produit->getImage(),
						$produit->getDescriptionProduit(),
						$produit->getPrix(),
						$produit->getQuantite(),
						$produit->getCouleur(),
						$produit->getGamme()]);
		$id = $this->pdo->lastInsertId();
		return $this->findById($id);
	}
	
	public function remove(Produits $produit)
	{
		$sql = "DELETE FROM produit WHERE id=?";
		$query = $this->pdo->prepare($sql);
		$query->execute([$produit->getId()]);
	}

	public function update(Produits $produit)
	{
		$sql = "UPDATE produit SET nom_produit=?, image=?, description_produit=?, prix=?, quantite=?, couleur=?, gamme=? WHERE id=?";
		$query = $this->pdo->prepare($sql);
		$query->execute([$produit->getNomProduit(),
						$produit->getImage(),
						$produit->getDescriptionProduit(),
						$produit->getPrix(),
						$produit->getQuantite(),
						$produit->getCouleur(),
						$produit->getGamme()]);
		return $this->findById($produit->getId());
	}
}
?>