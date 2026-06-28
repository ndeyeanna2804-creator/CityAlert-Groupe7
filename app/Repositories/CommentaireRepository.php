<?php

require_once __DIR__ . '/../../config/database.php';
require_once __DIR__ . '/RepositoryInterface.php';

class CommentaireRepository implements RepositoryInterface
{
    private $db;

    public function __construct()
    {
        $this->db = Database::connect();
    }

    public function create($data)
    {
        $stmt = $this->db->prepare("
            INSERT INTO commentaires
            (contenu,user_id,signalement_id)
            VALUES (?,?,?)
        ");

        return $stmt->execute([
            $data['contenu'],
            $data['user_id'],
            $data['signalement_id']
        ]);
    }

    public function findAll()
    {
        return $this->db
            ->query("
                SELECT c.*,u.nom AS auteur
                FROM commentaires c
                INNER JOIN users u
                ON c.user_id=u.id
                ORDER BY c.created_at DESC
            ")
            ->fetchAll(PDO::FETCH_ASSOC);
    }

    public function findById($id)
    {
        $stmt=$this->db->prepare(
            "SELECT * FROM commentaires WHERE id=?"
        );

        $stmt->execute([$id]);

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function findBySignalement($id)
    {
        $stmt=$this->db->prepare("
            SELECT c.*,u.nom AS auteur
            FROM commentaires c
            INNER JOIN users u
            ON c.user_id=u.id
            WHERE signalement_id=?
            ORDER BY c.created_at ASC
        ");

        $stmt->execute([$id]);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function update($id,$data)
    {
        $stmt=$this->db->prepare(
            "UPDATE commentaires
             SET contenu=?
             WHERE id=?"
        );

        return $stmt->execute([
            $data['contenu'],
            $id
        ]);
    }

    public function delete($id)
    {
        $stmt=$this->db->prepare(
            "DELETE FROM commentaires WHERE id=?"
        );

        return $stmt->execute([$id]);
    }

    public function count()
    {
        return $this->db
            ->query("SELECT COUNT(*) FROM commentaires")
            ->fetchColumn();
    }
}