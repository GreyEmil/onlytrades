<?php session_start(); ?>
<?php require("C:\\xampp\htdocs\\foreal\controller\\config.php"); ?>
<?php require_once('./includes/js.php'); ?>

<head>
    <meta charset="utf-8" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <title>BackEndAdmin</title>
    <meta name="description" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <link rel="shortcut icon" type="image/x-icon" href="img/favicon.png" />
    <!-- Place favicon.ico in the root directory -->

    <!-- CSS here -->
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <link rel="stylesheet" href="css/animate.min.css" />
    <link rel="stylesheet" href="css/magnific-popup.css" />
    <link rel="stylesheet" href="css/fontawesome-all.min.css" />
    <link rel="stylesheet" href="css/odometer.css" />
    <link rel="stylesheet" href="css/aos.css" />
    <link rel="stylesheet" href="css/owl.carousel.min.css" />
    <link rel="stylesheet" href="css/meanmenu.css" />
    <link rel="stylesheet" href="css/slick.css" />
    <link rel="stylesheet" href="css/default.css" />
    <link rel="stylesheet" href="css/style.css" />
    <link rel="stylesheet" href="css/styles.css" />
    <link rel="stylesheet" href="css/responsive.css" />
</head>

<body>
    <!-- preloader -->
    <div id="preloader">
        <div id="loading-center">
            <div id="loading-center-absolute">
                <img src="img/icon/o.gif" alt="" />
            </div>
        </div>
    </div>
    <!-- preloader-end -->

    <!-- header-area -->
    <header class=" third-header-bg">
        <div class="bg"></div>
        <div id="sticky-header">
            <div class="container custom-container">
                <div class="row">
                    <div class="col-12">
                        <div class="main-menu menu-style-two">
                            <nav>
                                <div class="logo d-block d-lg-none">
                                    <a href="#"><img class="logoh" src="img/logo/logo.png" alt="Logo" /></a>
                                </div>
                                <div class="navbar-wrap d-none d-lg-flex">
                                    <ul class="left">
                                        <li><a href="userDashboard.php">USERS</a></li>
                                        <li><a href="#">PRODUCT</a></li>
                                        <li><a href="#">OFFER</a></li>
                                    </ul>
                                    <div>
                                        <a href="index.php"><img src="img/logo/h3_logo.png" alt="Logo" /></a>
                                    </div>
                                    <ul class="right">
                                        <li><a href="#">AUCTION</a></li>
                                        <li><a href="#">POINTSSHOP</a></li>
                                        <li><a href="#">FORUM</a></li>
                                    </ul>
                                </div>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </header>
    <!-- header-area-end -->
    <?php
    if (isset($_POST['edit-user'])) {
        $id = $_POST['id'];
        $url = "http://localhost/FoodHaus/backend/update-user.php?id=" . $id;
        header("Location: {$url}");
    }
    ?>
    <?php
    if (isset($_POST['update'])) {
        $username = trim($_POST['username']);
        $sql1 = "SELECT * FROM  WHERE username = :username";
        $stmt1 = $pdo->prepare($sql1);
        $stmt1->execute([':username' => $username]);
        $email = trim($_POST['email']);
        // email exist
        $sql2 = "SELECT * FROM user WHERE email = :email";
        $stmt2 = $pdo->prepare($sql2);
        $stmt2->execute([':email' => $email]);
        $email_count = $stmt2->rowCount();
        $role = $_POST['role'];
        $sql = "UPDATE user SET username = :username, email = :email, role = :role WHERE id = :id";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            ':username' => $username,
            ':email' => $email,
            ':role' => $role,
            ':id' => $_GET['id']
        ]);
        header("Location: userDashboard.php");
        die();
    }
    ?>

    <?php
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $sql = "SELECT * FROM user WHERE id = :id";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([':id' => $user_id]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        $id = $user['id'];
        $username = $user['username'];
        $email = $user['email'];
        $role = $user['role'];
    }
    ?>
    <!--Start Table-->
    <div class="container-fluid mt-n10">
        <div class="card mb-4">
            <div class="card-header">Edit User</div>
            <div class="card-body">
                <form action="update-user.php?id=<?php echo $_GET['id']; ?>" method="POST" enctype="multipart/form-data">

                    <div class="form-group">
                        <label for="username">Username:</label>
                        <input name="username" class="form-control" id="username" type="text" placeholder="User Name..." />
                    </div>
                    <div class="form-group">
                        <label for="email"> Email:</label>
                        <input name="email" class="form-control" id="email" type="email" placeholder="User Email..." />
                    </div>
                    <div class="form-group">
                        <label for="role">Role:</label>
                        <select name="role" class="form-control" id="ole">
                            <option value="ADMIN">Admin</option>
                            <option value="MEMBER">Member</option>
                        </select>
                    </div>
                    <button name="update" class="btn btn-primary mr-2 my-1" type="submit">Update user!</button>
                </form>
            </div>
        </div>
    </div>
    <!-- slider-area-end -->
    <!-- JS here -->
    <script src="js/vendor/jquery-3.4.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/isotope.pkgd.min.js"></script>
    <script src="js/slick.min.js"></script>
    <script src="js/jquery.meanmenu.min.js"></script>
    <script src="js/wow.min.js"></script>
    <script src="js/aos.js"></script>
    <script src="js/jquery.lettering.js"></script>
    <script src="js/jquery.textillate.js"></script>
    <script src="js/jquery.odometer.min.js"></script>
    <script src="js/jquery.appear.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/jquery.countdown.min.js"></script>
    <script src="js/jquery.scrollUp.min.js"></script>
    <script src="js/imagesloaded.pkgd.min.js"></script>
    <script src="js/jquery.magnific-popup.min.js"></script>
    <script src="js/plugins.js"></script>
    <script src="js/main.js"></script>
</body>

<!-- Mirrored from themebeyond.com/html/geco/Geco/index-3.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 31 Oct 2022 13:00:57 GMT -->

</html>