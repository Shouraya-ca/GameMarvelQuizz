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
    $name = trim($_POST['name'] ?? '');
    $username = trim($_POST['username'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $password = trim($_POST['password'] ?? '');
    $tel = trim($_POST['tel'] ?? '');

    if (!empty($name) && !empty($username) && !empty($email) && !empty($password) && !empty($tel)) {
        // Hacher le mot de passe
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        
        // Insérer les données dans la base de données
        $sql = "INSERT INTO utilisateurs (Name, Username, Email, Password, Tel)
                VALUES (:name, :username, :email, :password, :tel)";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':password', $hashedPassword);
        $stmt->bindParam(':tel', $tel);

        if ($stmt->execute()) {
            header("Location: ../Controllers/indexgame.php"); // Redirection en cas de succès
            exit();
        } else {
            echo "Erreur lors de l'inscription.";
        }
    } else {
        echo "Tous les champs sont requis.";
    }
}
?>