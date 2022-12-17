<?php session_start(); ?>
<?php require("../controller/config.php"); ?>
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
  <script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/css/toastr.css" rel="stylesheet" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/js/toastr.js"></script>
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
  <?php if (isset($_SESSION['login']) && ($_SESSION['login'] == 'success')) { ?>
    <script type="text/javascript">
      $(document).ready(function() {
        toastr.options.timeOut = 2500; // 1.5s
        toastr.success('Welcome to admin dashboard', 'Login Successful!');
      });
    </script>
  <?php } ?>
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
                    <a href="index.php" style=""><img src="img/logo/h3_logo.png" alt="Logo" /></a>
                    <a style="	color: #1c1121;
	display: block;
	font-weight: 500;
	padding: 16px 30px;
	text-align: center;
	font-size: 13px;
	margin-bottom: 8px;
	text-transform: uppercase;
	letter-spacing: 2px;" href="logout.php">Log Out</a>
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

  <!-- main-area -->
  <main >
    <!-- slider-area -->
    <div class="page-header pb-6 page-header-dark bg-gray">
      <div class="container-fluid">
        <div class="page-header-content d-flex align-items-center justify-content-between text-white">
          <h1 class="page-header-title">
            <div class="page-header-icon"><i data-feather="users"></i></div>

          </h1>

        </div>

        <!--Seerch bar-->
        <div class="form-row justify-content-center">

          <div class="col-lg-6 col-md-8">
            <div class="form-group mr-0 mr-lg-2">
              <input name="search-keyword" id="myInput" onkeyup="myFunction()" class="form-control form-control-solid rounded-pill" type="text" placeholder="Search users..." />
            </div>
          </div>

        </div>
        <br /><br />
      </div>
    </div>
    <!--Start Table-->
    <div class="container-fluid mt-n10">
      <div class="card mb-4">
        <div class="card-header">USERS</div>
        <div class="card-body">
          <div class="datatable table-responsive">
            <div class="dropdown">
              <button class="btn btn-teal dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Download database as
              </button>
              <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                <a class="dropdown-item" href="./pdf_genrator/generate_pdf users.php">PDF</a>
                <a class="dropdown-item" onclick="exportTableToExcel('dataTable')" href="#">Excel</a>

              </div>
            </div>
            <br>

           
            <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th onclick="sortTable(0)"><i data-feather="list"></i> ID</th>
                  <th onclick="sortTable(1)"><i data-feather="list"></i> Username</th>
                  <th onclick="sortTable(2)"><i data-feather="list"></i> Fullname</th>
                  <th onclick="sortTable(3)"><i data-feather="list"></i> Email</th>
                  <th onclick="sortTable(4)"><i data-feather="list"></i> Register Date</th>
                  <th onclick="sortTable(5)"><i data-feather="list"></i> Role</th>
                  <th>Edit</th>
                  <th>Delete</th>
                  <th onclick="sortTable(8)"><i data-feather="list"></i> Ban Option</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $pdo=config::getConnexion();
                $sql = "SELECT * FROM user";
                $stmt = $pdo->prepare($sql);
                $stmt->execute();
                while ($users = $stmt->fetch(PDO::FETCH_ASSOC)) {
                  $user_id = $users['id'];
                  $user_name = $users['username'];
                  $user_firstname = $users['first_name'];
                  $user_lastname = $users['last_name'];
                  $registered_on = $users['creation_date'];
                  $email = $users['email'];
                  $gender = $users['gender'];
                  $user_role = $users['role'];
                  $isBanned = $users['isBanned'];
                ?>
                  <tr>
                    <td>
                      <?php echo $user_id; ?>
                    </td>
                    <td>
                      <?php echo $user_name; ?>
                    </td>
                    <td>
                      <?php echo $user_firstname; ?>
                      <?php echo $user_lastname; ?>
                    </td>
                    <td>
                      <?php echo $email; ?>
                    </td>
                    <td>
                      <?php echo $registered_on; ?>
                    </td>

                    <td>
                      <div class="badge badge-<?php echo $user_role == "ADMIN" ? "primary" : "warning"; ?>">
                        <?php echo $user_role; ?>
                      </div>
                    </td>
                    <td>
                      <?php
                      if (isset($_COOKIE['_uid_'])) {
                        $u_id = base64_decode($_COOKIE['_uid_']);
                      } else if (isset($_SESSION['id'])) {
                        $u_id = $_SESSION['id'];
                      } else {
                        $u_id = -1;
                      }
                      ?>
                      <?php
                      if ($user_id == $u_id) { ?>
                        <button title="You can't edit yourself!" class="btn btn-info btn-icon"><i data-feather="edit"></i></button>
                      <?php } else { ?>
                        <form action="update-user.php" method="POST">
                          <input type="hidden" name="id" value="<?php echo $user_id; ?>">
                          <button name="edit-user" class="btn btn-info btn-icon"><i data-feather="edit"></i></button>
                        </form>
                      <?php }
                      ?>

                    </td>
                    <td>

                      <?php
                      if (isset($_POST['user'])) {
                        $u_id = $_POST['id'];
                        $sql = "DELETE FROM user WHERE id = :id";
                        $stmt = $pdo->prepare($sql);
                        $stmt->execute([':id' => $u_id]);
                        header('Location: http://localhost/foreal/view/userDashboard');
                        die();
                      }
                      ?>
                      <?php
                      if (isset($_COOKIE['_uid_'])) {
                        $u_id = base64_decode($_COOKIE['_uid_']);
                      } else if (isset($_SESSION['id'])) {
                        $u_id = $_SESSION['id'];
                      } else {
                        $u_id = -1;
                      }
                      ?>

                      <?php
                      if ($user_id == $u_id) { ?>
                        <button title="You can't delete yourself!" class="btn btn-red btn-icon"><i data-feather="trash-2"></i></button>
                      <?php } else { ?>
                        <form action="userDashboard.php" method="POST">
                          <input type="hidden" name="id" value="<?php echo $user_id; ?>">
                          <button name="user" type="submit" class=" btn-danger btn-icon"><i data-feather="trash-2"></i></button>
                        </form>
                      <?php }
                      ?>

                    </td>
                    <td>
                      <?php
                      if (isset($_POST['access'])) {

                        $u_id = $_POST['id'];
                        $isBanned = !$_POST['isBanned'];
                        $sql = "UPDATE user SET isBanned = :isBanned WHERE id = :id";
                        $stmt = $pdo->prepare($sql);
                        $stmt->execute([':id' => $u_id, ':isBanned' => $isBanned]);
                        header("Location: userDashboard.php");
                        die();
                      }
                      ?>
                      <form action="userDashboard.php" method="POST">
                        <input type="hidden" name="id" value="<?php echo $user_id; ?>">
                        <input type="hidden" name="isBanned" value="<?php echo $isBanned; ?>">

                        <button type="submit" name="access" class="btn btn-<?php echo ($isBanned == "0" ? "success" : "red"); ?>">
                          <?php echo ($isBanned == "1" ? "UNBAN" : "Ban"); ?>
                        </button>
                      </form>

                    </td>
                  </tr>
                <?php }
                ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
    <!--End Table-->
    <section class="third-banner-bg">
      <div class="container custom-container">
        <div class="row">
          <div class="col-12">
            <div class="third-banner-img wow bounceInDown" data-wow-delay=".2s"></div>
            <div class="third-banner-content text-center wow bounceInUp" data-wow-delay=".2s"></div>
          </div>
        </div>
      </div>
    </section>
  </main>
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