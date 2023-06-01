<?php if (!isset($_SESSION))session_start(); ?>
<?php require_once "config.php"; 
require_once "user.php"?>
<?php


//Mailer Service Configuration
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

require_once '/xampp/htdocs/onlytrades/controller/PHPMailer/src/PHPMailer.php';
require_once '/xampp/htdocs/onlytrades/controller/PHPMailer/src/Exception.php';
require_once '/xampp/htdocs/onlytrades/controller/PHPMailer/src/SMTP.php';

//Load Composer's autoloader
// require '../controller/autoload.php';
//Create an instance; passing `true` enables exceptions
$pdo=config::getConnexion();
function sendEmail($to, $from, $subject, $message)
{
    $mail = new PHPMailer(true);
    //Server settings
    $mail->isSMTP(); //Send using SMTP
    $mail->Host = "smtp.gmail.com"; //Set the SMTP server to send through
    $mail->SMTPAuth = true; //Enable SMTP authentication
    $mail->Username = 'only.trades.tn@gmail.com'; //SMTP username
    $mail->Password = 'hbebdhacbzaamzoi'; //SMTP password
    $mail->SMTPSecure = 'tls';
    $mail->Port = 587;

    //Recipients
    $mail->setFrom($from, 'OnlyTrades');
    $mail->addAddress($to); //Name is optional

    //Content
    $mail->isHTML(true); //Set email format to HTML
    $mail->Subject = $subject;
    $mail->Body = $message;
    //send email
    if ($mail->send()) {
        $_SESSION['email'] = 'success';
        return true; //
    }else{
        $_SESSION['email'] = 'failed';
        return false; //
    }
}

// REGISTER USER
if (isset($_POST["birthdate"])) {
    // receive all input values from the form
    $username = $_POST['firstName'];
    $email = $_POST['email'];
    $gender = $_POST['gender'];
    $password = $_POST['password'];
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $birthdate = $_POST['birthdate'];

    $user_check_query = "SELECT * FROM user WHERE email = :email";
    $stmt2 = $pdo->prepare($user_check_query);
    $stmt2->execute([
        ':email' => $email
    ]);
    $userCount = $stmt2->rowCount();

    if ($userCount != 0) { // if user exists
        echo ("email already exists");
    } else {
        $user_nickname = $username;

        $d_user_nickname = base64_encode($user_nickname);

        // user nickname
        setcookie('_uiid_', $d_user_nickname, time() + 60 * 60 * 24, '/', '', '', true);
        $_SESSION['user_name'] = $username;
        $code = rand(1111, 9999);
        user::signUp($_POST,$_FILES["photo"]["tmp_name"],$code);
        $_SESSION["register"]="success";
        // $password = md5($password_1); //encrypt the password before saving in the database

        
        // userid
        $_SESSION['id'] = $_SESSION["user"]["id"];
        $d_user_id = base64_encode($last_id);
        setcookie('_uid_', $d_user_id, time() + 60 * 60 * 24, '/', '', '', true);
        $message = '<div style="text-align: center;"><div style="color:#1c1421;font-size: 20px;"> Please click this button to verify your <b>OnlyTrades</b> account: </div > <br><br> <div style="background-color:#1c1421;border:none;color:white;padding: 20px;text-align: center;display: inline-block;font-size: 16px;margin: 3px 2px; border-radius: 8px;"> <a href=http://localhost/onlytrades/view/verify.php?code='. $code .  '>  <i>Verify Account</i></a></div> <br><br> <em style="font-size: 20px;">Thank you for using OnlyTrades!</em></div>';
        sendEmail($email, "only.trades.tn@gmail.com", "Email Verification", $message);
        header('Location: http://localhost/onlytrades/view/index.php');
        die();
    }
}
//edit user
if (isset($_POST['edit_user'])) {


    if (isset($_SESSION['id'])) {
        $u_id = $_SESSION['id'];
    } else {
        $u_id = -1;
    }
    $sql = "SELECT * FROM user WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        ':id' => $u_id
    ]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    //receive all input values from the form
    if (($_POST['username']) != null) {
        $username = $_POST['username'];
    } else {
        $username = $user['username'];
    }
    if (($_POST['email']) != null) {
        $email = $_POST['email'];
    } else {
        $email = $user['email'];
    }

    if (($_POST['lastName']) != null) {
        $lastName = $_POST['lastName'];
    } else {
        $lastName = $user['last_name'];
    }

    if (($_POST['firstName']) != null) {
        $firstName = $_POST['firstName'];
    } else {
        $firstName = $user['first_name'];
    }

    if (($_POST['password']) != null) {
        $password = $_POST['password'];
    } else {
        $password = $user['password'];
    }
    if (($_FILES['image']["tmp_name"]) != null) {
        $photo = base64_encode(file_get_contents($_FILES['image']["tmp_name"]));
    } else {
        $photo = $_SESSION["user"]["photo"];
    }
    $user_nickname = $username;
    $d_user_nickname = base64_encode($user_nickname);
    // user nickname
    setcookie('_uiid_', $d_user_nickname, time() + 60 * 60 * 24, '/', '', '', true);
    $_SESSION['user_name'] = $username;
    $_SESSION['role'] = $user_role;

    // $password = md5($password_1); //encrypt the password before saving in the database
    $hash = password_hash($password, PASSWORD_BCRYPT, ['cost' => 10]);
    $query = "UPDATE user SET username = :username, email = :email, first_name = :first_name, last_name = :last_name, password = :password, photo= :photo WHERE id = :id";
    $stmt = $pdo->prepare($query);
    if (
        $stmt->execute([
            ':username' => $username,
            ':email' => $email,
            ':first_name' => $firstName,
            ':last_name' => $lastName,
            ':password' => $password,
            ':id' => $user['id'],
            ':photo' => $photo
        ])
    ) {
        $_SESSION['edit'] = 'success';
        $req=$pdo->prepare("SELECT * FROM user where id=?");
        $req->execute(array($_SESSION["id"]));
        $user=$req->fetchAll()[0];
        $_SESSION["user"]=$user;
    } else {
        $_SESSION['edit'] = 'failed';
    }
    header('Location: http://localhost/onlytrades/view/profile.php');
    die();
}

// LOGIN USER

if (isset($_POST['login_user'])) {
    echo "wiw";
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);
    $sql = "SELECT * FROM user WHERE email = :email";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        ':email' => $email
    ]);
    
    $count = $stmt->rowCount();
    if ($count == 0) {
        $_SESSION['credentials'] = 'wrong';
    } else if ($count > 1) {
        $_SESSION['credentials'] = 'wrong';
    } else if ($count == 1) {
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        $_SESSION["user"]=$user;
        $user_password_hash = $user['password'];
        $user_name = $user['username'];
        $user_role = $user['role'];
        $user_status = $user['isBanned'];
        $hash = password_hash($password, PASSWORD_BCRYPT, ['cost' => 10]);
        if ($user_status == 1) {
            header('Location: http://localhost/onlytrades/view/banned.php');
            die();
        } else {
            
            $success = "Sign in successful!";
            $user_id = $user['id'];
            $user_nickname = $user['username'];
            $d_user_id = base64_encode($user_id);
            $d_user_nickname = base64_encode($user_nickname);

            if ($user_role == 'ADMIN') {
                $_SESSION['loginAs'] = 'not_user';
                header('Location: http://localhost/onlytrades/view/signinAdmin.php');
                die();
            } else {
                $_SESSION['login'] = 'success';
                // userid
                setcookie('_uid_', $d_user_id, time() + 60 * 60 * 24, '/', '', '', true);
                // user nickname
                setcookie('_uiid_', $d_user_nickname, time() + 60 * 60 * 24, '/', '', '', true);
                $_SESSION['user_name'] = $user_name;
                $_SESSION['id'] = $user['id'];
                $_SESSION['role'] = $user_role;
                
                header('Location: http://localhost/onlytrades/view/index.php');
                die();
                
            }
         
        }
    }
}

// LOGIN ADMIN
if (isset($_POST['login_admin'])) {
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);
    $sql = "SELECT * FROM user WHERE email = :email";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        ':email' => $email
    ]);
    $count = $stmt->rowCount();
    if ($count == 0) {
        $_SESSION['credentials'] = 'wrong';
    } else if ($count > 1) {
        $error = "Wrong credentials!";
        $_SESSION['credentials'] = 'wrong';
    } else if ($count == 1) {
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        $_SESSION["user"]=$user;
        $user_password_hash = $user['password'];
        $user_name = $user['username'];
        $user_role = $user['role'];
        $user_status = $user['isBanned'];
        $hash = password_hash($password, PASSWORD_BCRYPT, ['cost' => 10]);
        
            $success = "Sign in successful!";
            $user_id = $user['id'];
            $user_nickname = $user['username'];
            $d_user_id = base64_encode($user_id);
            $d_user_nickname = base64_encode($user_nickname);
            if ($user_role == 'ADMIN') {
                $_SESSION['login'] = 'success';
                setcookie('_uid_', $d_user_id, time() + 60 * 60 * 24, '/', '', '', true);
                // user nickname
                setcookie('_uiid_', $d_user_nickname, time() + 60 * 60 * 24, '/', '', '', true);
                $_SESSION['user_name'] = $user_name;
                $_SESSION['id'] = $user['id'];
                $_SESSION['role'] = $user_role;
                header('Location: http://localhost/onlytrades/view/backendfinale.php');
                die();
            } else {
                $_SESSION['loginAs'] = 'not_admin';
                header('Location: http://localhost/onlytrades/view/signin.php');
                die();
            }
         
    }
}

//reset password email

if (isset($_POST['reset_pass_mail'])) {
    $email = trim($_POST['email']);

    $sql = "SELECT * FROM user WHERE email = :email";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        ':email' => $email
    ]);
    $count = $stmt->rowCount();
    if ($count == 0) {
        $error = "Wrong credentials!";
    } else if (
        $count > 1
    ) {
        $error = "Wrong credentials!";
    } else if ($count == 1) {
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        $message = '<div style="text-align: center;"><div style="color:#1c1421;font-size: 20px;"> Please click this button to be redirected to your reset password page: </div > <br><br> <div style="background-color:#1c1421;border:none;color:white;padding: 20px;text-align: center;display: inline-block;font-size: 16px;margin: 3px 2px; border-radius: 8px;"> <a href=http://localhost/onlytrades/view/resetPassword.php>  <i>Go to reset page</i></a></div> <br><br> <em style="font-size: 20px;">Thank you for using OnlyTrades!</em></div>';
        if (sendEmail($email, "only.trades.tn@gmail.com", "Reset your password", $message)) {
            $_SESSION['reset_email'] = 'success';
            $_SESSION['email'] = $email;
            header('Location: http://localhost/onlytrades/view/emailresetPassword.php');
            die();
        }else {
            $_SESSION['reset_email'] = 'failed';
            header('Location: http://localhost/onlytrades/view/emailResetPassword.php');
            die();
        }
      
    }
}

//reset password 


if (isset($_POST['reset_pass'])) {
    $password = trim($_POST['password']);
    $hash = password_hash($password, PASSWORD_BCRYPT, ['cost' => 10]);
    $query = "UPDATE user SET password = :password WHERE email = :email";
    $stmt = $pdo->prepare($query);
    $stmt->execute([
        ':password' => $password,
        ':email' => $_SESSION['email']
    ]);
    $_SESSION['reset'] = 'success';
    header('Location: http://localhost/onlytrades/view/signin.php');
    die();
}
