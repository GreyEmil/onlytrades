<?php session_start(); ?>
<?php require("../controller/config.php"); ?>
<?php
$pdo=config::getConnexion();
if (isset($_GET['code'])) {

    $code = $_GET['code'];

    $query = "UPDATE user SET isVerified='1' WHERE verification_token =$code ";
    $stmt = $pdo->prepare($query);

    if ( $stmt->execute()) {
        echo "Your account is verified";
        header('Location: http://localhost/foreal/view/');
        die();
    }
} else {

    $message = "Wrong url";
}

?>

