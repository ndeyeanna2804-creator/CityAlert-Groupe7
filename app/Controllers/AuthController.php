<?php

require_once __DIR__ . '/../Repositories/UserRepository.php';

class AuthController
{
    private $repo;

    public function __construct()
    {
        $this->repo = new UserRepository();
    }

    // ==========================
    // INSCRIPTION
    // ==========================
    public function register()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $nom = trim($_POST['nom']);
            $email = trim($_POST['email']);
            $password = trim($_POST['password']);
            $role = trim($_POST['role']);

            if (
                empty($nom) ||
                empty($email) ||
                empty($password) ||
                empty($role)
            ) {
                $erreur = "Tous les champs sont obligatoires.";
                require_once __DIR__ . '/../Views/auth/register.php';
                return;
            }

            if ($this->repo->findByEmail($email)) {

                $erreur = "Cet email existe déjà.";

                require_once __DIR__ . '/../Views/auth/register.php';

                return;
            }

            $data = [

                'nom' => $nom,

                'email' => $email,

                'password' => $password,

                'role' => $role

            ];

            if ($this->repo->create($data)) {

                header("Location: index.php?action=login");
                exit();

            } else {

                $erreur = "Erreur lors de l'inscription.";

            }
        }

        require_once __DIR__ . '/../Views/auth/register.php';
    }

    // ==========================
    // CONNEXION
    // ==========================
    public function login()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $email = trim($_POST['email']);
            $password = trim($_POST['password']);

            if (empty($email) || empty($password)) {

                $erreur = "Veuillez remplir tous les champs.";

                require_once __DIR__ . '/../Views/auth/login.php';

                return;
            }

            $user = $this->repo->findByEmail($email);

            if (!$user) {

                $erreur = "Utilisateur introuvable.";

                require_once __DIR__ . '/../Views/auth/login.php';

                return;
            }

            if (!password_verify($password, $user['password'])) {

                $erreur = "Mot de passe incorrect.";

                require_once __DIR__ . '/../Views/auth/login.php';

                return;
            }

            $_SESSION['id'] = $user['id'];
            $_SESSION['nom'] = $user['nom'];
            $_SESSION['email'] = $user['email'];
            $_SESSION['role'] = $user['role'];

            switch ($user['role']) {

                case 'admin':
                    header("Location: index.php?action=dashboard");
                    exit();

                case 'agent':
                    header("Location: index.php?action=dashboard");
                    exit();

                case 'citoyen':
                    header("Location: index.php?action=dashboard");
                    exit();

                default:
                    session_destroy();

                    $erreur = "Rôle utilisateur invalide.";

                    require_once __DIR__ . '/../Views/auth/login.php';

                    return;
            }
        }

        require_once __DIR__ . '/../Views/auth/login.php';
    }

    // ==========================
    // DECONNEXION
    // ==========================
    public function logout()
    {
        session_unset();

        session_destroy();

        header("Location: index.php?action=login");

        exit();
    }

    // ==========================
    // UTILISATEUR CONNECTÉ
    // ==========================
    public static function isLogged()
    {
        return isset($_SESSION['id']);
    }

    // ==========================
    // ROLE
    // ==========================
    public static function role()
    {
        return $_SESSION['role'] ?? null;
    }
}