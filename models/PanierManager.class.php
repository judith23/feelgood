<?php
class PanierManager
{
	private $PDO;

	public function __construct($PDO)
	{
		$this->PDO = $PDO;
	}

	public function findById($id)
	{
		$sql = "SELECT * FROM panier WHERE id=?";
		$query = $this->PDO->prepare($sql);
		$query->execute([$id]);
		$panier = $query->fetchObject('Panier');
		return $panier;
	}

	public function create($id_commande, $id_produit)
	{
		$panier = new Panier();
		$panier->setIdCommande($id_commande);
		$panier->setIdProduit($id_produit);

		$sql = "INSERT INTO panier (id_commande, id_produit VALUES(?, ?)";
		$query = $this->PDO->prepare($sql);
		$query->execute([$panier->getIdCommande(),
						$panier->getIdProduit();
		$id = $this->PDO->lastInsertId();
		return $this->findById($id);
	}

	public function remove(Panier $panier)
	{
		$sql = "DELETE FROM panier WHERE id=?";
		$query = $this->PDO->prepare($sql);
		$query->execute([$panier->getId()]);
	}
	public function update(Panier $panier)
	{
		$sql = "UPDATE panier SET id_commande=?, id_produit=? WHERE id=?";
		$query = $this->PDO->prepare($sql);
		$query->execute([$panier->getIdCommande(),
						$panier->getIdProduit()]);
		return $this->findById($panier->getId());
	}
}
?>