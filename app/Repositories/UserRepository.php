<?php

require_once __DIR__ . '/../../config/database.php';
require_once __DIR__ . '/RepositoryInterface.php';

class UserRepository implements RepositoryInterface
{
    private $db;

    public function __construct()
    {
        $this->db = Database::connect();
    }

    // ==========================
    // Ajouter un utilisateur
    // ==========================
    public function create($data)
    {
        $sql = "INSERT INTO users
                (nom, email, password, role)
                VALUES (?, ?, ?, ?)";

        $stmt = $this->db->prepare($sql);

        return $stmt->execute([
            $data['nom'],
            $data['email'],
            password_hash($data['password'], PASSWORD_DEFAULT),
            $data['role']
        ]);
    }

    // ==========================
    // Tous les utilisateurs
    // ==========================
    public function findAll()
    {
        return $this->db
            ->query("SELECT * FROM users ORDER BY id DESC")
            ->fetchAll(PDO::FETCH_ASSOC);
    }

    // ==========================
    // Rechercher par ID
    // ==========================
    public function findById($id)
    {
        $stmt = $this->db->prepare(
            "SELECT * FROM users WHERE id = ?"
        );

        $stmt->execute([$id]);

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // ==========================
    // Rechercher par Email
    // ==========================
    public function findByEmail($email)
{
    $stmt = $this->db->prepare(
        "SELECT * FROM users WHERE email = ?"
    );

    $stmt->execute([$email]);

    return $stmt->fetch(PDO::FETCH_ASSOC);
}
    // ==========================
    // Modifier
    // ==========================
    public function update($id, $data)
    {
        $stmt = $this->db->prepare(
            "UPDATE users
             SET
                nom = ?,
                email = ?,
                role = ?
             WHERE id = ?"
        );

        return $stmt->execute([
            $data['nom'],
            $data['email'],
            $data['role'],
            $id
        ]);
    }

    // ==========================
    // Modifier le mot de passe
    // ==========================
    public function updatePassword($id, $password)
    {
        $stmt = $this->db->prepare(
            "UPDATE users
             SET password = ?
             WHERE id = ?"
        );

        return $stmt->execute([
            password_hash($password, PASSWORD_DEFAULT),
            $id
        ]);
    }

    // ==========================
    // Supprimer
    // ==========================
    public function delete($id)
    {
        $stmt = $this->db->prepare(
            "DELETE FROM users
             WHERE id = ?"
        );

        return $stmt->execute([$id]);
    }

    // ==========================
    // Nombre total d'utilisateurs
    // ==========================
    public function count()
    {
        return $this->db
            ->query("SELECT COUNT(*) FROM users")
            ->fetchColumn();
    }

    // ==========================
    // Nombre par rôle
    // ==========================
    public function countByRole($role)
    {
        $stmt = $this->db->prepare(
            "SELECT COUNT(*) FROM users
             WHERE role = ?"
        );

        $stmt->execute([$role]);

        return $stmt->fetchColumn();
    }
}