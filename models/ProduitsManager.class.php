<?php
class ProduitsManager
{
	private $PDO;

	public function __construct($PDO)
	{
		$this->PDO = $PDO;
	}

	public function findById($id)
	{
		$sql = "SELECT * FROM produit WHERE id=?";
		$query = $this->PDO->prepare($sql);
		$query->execute([$id]);
		$produit = $query->fetchObject('Produits');
		return $produit;
	}

	public function findAll($id)
	{
		$sql = "SELECT * FROM produit";
		$query = $this->PDO->prepare($sql);
		$query->execute();
		$produit = $query->fetchAll(PDO::FETCH_CLASS, 'Produit');
		return $produit;
	}

	public function create($nom_produit, $image, $description_produit, $prix, $quantite, $couleur, $gamme)
	{
		$produit = new Produits();
		$produit->setNomProduit($nom_produit);
		$produit->setImage($image);
		$produit->etDescriptionProduit($description_produit);
		$produit->setPrix($prix);
		$produit->setQuantite($quantite);
		$produit->setCouleur($couleur);
		$produit->setGamme($gamme);

		$sql = "INSERT INTO produit (nom_produit, image, description_produit, prix, quantite, couleur, gamme) VALUES(?, ?, ?, ?, ?, ?, ?)";
		$query = $this->PDO->prepare($sql);
		$query->execute([$produit->getNomProduit(),
						$produit->getImage(),
						$produit->getDescriptionProduit(),
						$produit->getPrix()
						$produit->getQuantite()
						$produit->getCouleur()
						$produit->getGamme()]);
		$id = $this->PDO->lastInsertId();
		return $this->findById($id);
	}
	
	public function remove(Produits $produit)
	{
		$sql = "DELETE FROM produit WHERE id=?";
		$query = $this->PDO->prepare($sql);
		$query->execute([$produit->getId()]);
	}

	public function update(Produits $produit)
	{
		$sql = "UPDATE produit SET nom_produit=?, image=?, description_produit=?, prix=?, quantite=?, couleur=?, gamme=? WHERE id=?";
		$query = $this->PDO->prepare($sql);
		$query->execute([$produit->getNomProduit(),
						$produit->getImage(),
						$produit->getDescriptionProduit(),
						$produit->getPrix()
						$produit->getQuantite()
						$produit->getCouleur()
						$produit->getGamme()]);
		return $this->findById($produit->getId());
	}
}
?>