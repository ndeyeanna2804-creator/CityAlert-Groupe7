<?php

require_once __DIR__ . '/../../config/database.php';
require_once __DIR__ . '/RepositoryInterface.php';

class SignalementRepository implements RepositoryInterface
{
    private $db;

    public function __construct()
    {
        $this->db = Database::connect();
    }

    // ==========================
    // Ajouter un signalement
    // ==========================
    public function create($data)
    {
        $sql = "INSERT INTO signalements
                (titre, description, categorie, adresse, statut, user_id)
                VALUES (?, ?, ?, ?, ?, ?)";

        $stmt = $this->db->prepare($sql);

        return $stmt->execute([
            $data['titre'],
            $data['description'],
            $data['categorie'],
            $data['adresse'],
            'Nouveau',
            $data['user_id']
        ]);
    }

    // ==========================
    // Afficher tous les signalements
    // ==========================
    public function findAll()
    {
        $sql = "SELECT * FROM signalements ORDER BY id DESC";

        return $this->db
            ->query($sql)
            ->fetchAll(PDO::FETCH_ASSOC);
    }

    // ==========================
    // Rechercher par ID
    // ==========================
    public function findById($id)
    {
        $stmt = $this->db->prepare(
            "SELECT * FROM signalements WHERE id = ?"
        );

        $stmt->execute([$id]);

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // ==========================
    // Modifier un signalement
    // ==========================
    public function update($id, $data)
    {
        $stmt = $this->db->prepare(
            "UPDATE signalements
             SET
                titre = ?,
                description = ?,
                categorie = ?,
                adresse = ?
             WHERE id = ?"
        );

        return $stmt->execute([
            $data['titre'],
            $data['description'],
            $data['categorie'],
            $data['adresse'],
            $id
        ]);
    }

    // ==========================
    // Modifier le statut
    // ==========================
    public function updateStatus($id, $statut)
    {
        $stmt = $this->db->prepare(
            "UPDATE signalements
             SET statut = ?
             WHERE id = ?"
        );

        return $stmt->execute([
            $statut,
            $id
        ]);
    }

    // ==========================
    // Supprimer
    // ==========================
    public function delete($id)
    {
        $stmt = $this->db->prepare(
            "DELETE FROM signalements
             WHERE id = ?"
        );

        return $stmt->execute([$id]);
    }

    // ==========================
    // Nombre total de signalements
    // ==========================
    public function count()
    {
        return $this->db
            ->query("SELECT COUNT(*) FROM signalements")
            ->fetchColumn();
    }

    // ==========================
    // Nombre par statut
    // ==========================
    public function countByStatus($statut)
    {
        $stmt = $this->db->prepare(
            "SELECT COUNT(*) FROM signalements
             WHERE statut = ?"
        );

        $stmt->execute([$statut]);

        return $stmt->fetchColumn();
    }

    // ==========================
    // Nombre par catégorie
    // ==========================
    public function countByCategorie($categorie)
    {
        $stmt = $this->db->prepare(
            "SELECT COUNT(*) FROM signalements
             WHERE categorie = ?"
        );

        $stmt->execute([$categorie]);

        return $stmt->fetchColumn();
    }
    public function getLastFive()
{
    $sql = "SELECT * FROM signalements
            ORDER BY id DESC
            LIMIT 5";

    $stmt = $this->db->query($sql);

    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
}