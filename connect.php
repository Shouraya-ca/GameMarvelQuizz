<?php
session_start(); // Démarrer la session

// Charger la configuration de la base de données
$dbConfig = parse_ini_file(".env");

$host = $dbConfig["host"];
$user = $dbConfig["username"];
$pass = $dbConfig["password"];
$dbName = $dbConfig["name"];
$dsn = 'mysql:host=' . $host . ';dbname=' . $dbName;

$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];

try {
    $pdo = new PDO($dsn, $user, $pass, $options);
} catch (Exception $e) {
    die('Erreur de connexion à la base de données : ' . $e->getMessage());
}

// Vérifier si le formulaire est soumis
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = trim($_POST['email'] ?? '');
    $motdepasse = trim($_POST['password'] ?? '');

    if (!empty($email) && !empty($motdepasse)) {
        // Vérifier si l'email existe dans la base de données
        $sql = "SELECT id, Password FROM utilisateurs WHERE Email = :email";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        $user = $stmt->fetch();

        if ($user && password_verify($motdepasse, $user['Password'])) {
            // Connexion réussie -> Création de la session
            $_SESSION['user_id'] = $user['id'];
            header("Location: ../Controllers/indexgame.php"); // Redirection vers la page connectée
            exit();
        } else {
            // Stocker le message d'erreur dans la session
            $_SESSION['error_message'] = "Email ou mot de passe incorrect.";
            header("Location: ../Pages/connect.php"); // Retour à la page de connexion
            exit();
        }
    } else {
        $_SESSION['error_message'] = "Tous les champs sont requis.";
        header("Location: ../Pages/connect.php"); // Retour à la page de connexion
        exit();
    }
}
?>
```
