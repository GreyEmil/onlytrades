<?php
session_start();

	include '../controller/ReclamationC.php';
	$reclamationC=new ReclamationC();
    $email=$_SESSION['email'];
  
    if(isset($_GET['recherche']))
    { 
        $listeReclamations=$reclamationC->rechercherreclamation($_GET['recherche']);
    }
    else if(isset($_POST['date']))
    {
        $listeReclamations=$reclamationC->trierreclamation($email);  
    }
    else{
        $listeReclamations=$reclamationC->afficherreclamation($email); 
    }
?>
<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>dashboard admin</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
<link rel="stylesheet" href="assets/back_temp/dist/style.css">
<style>

.buttonClass {
  font-size:15px;
  font-family:Arial;
  width:140px;
  height:50px;
  border-width:1px;
  color:#333333;
  border-color:#ffaa22;
  font-weight:bold;
  border-top-left-radius:6px;
  border-top-right-radius:6px;
  border-bottom-left-radius:6px;
  border-bottom-right-radius:6px;
  box-shadow: 0px 1px 0px 0px #fff6af;
  text-shadow: 0px 1px 0px #ffee66;
  background:linear-gradient(#ffec64, #ffab23);
}

.buttonClass:hover {
  background: linear-gradient(#ffab23, #ffec64);
}
              

</style>
</head>
<body>
<!-- partial:index.partial.html -->
<div class="video-bg">
 <video width="320" height="240" autoplay loop muted>
  <source src="assets/back_temp/dist/vid2.mp4" type="video/mp4">
Your browser does not support the video tag.
</video>
</div>
<div class="dark-light">
    <svg viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5" fill="none" stroke-linecap="round" stroke-linejoin="round">
     <path d="M21 12.79A9 9 0 1111.21 3 7 7 0 0021 12.79z" /></svg>
   </div>
<div class="app">
 <div class="header">
  <div class="menu-circle"></div>


  
 </div>
 <div class="wrapper">
  <div class="left-side">
   <div class="side-wrapper">
    <div class="side-title">Main</div>
    <div class="side-menu">
     <a href="./tous _rec.php">
      <svg viewBox="0 0 488.932 488.932" fill="currentColor">
       <path d="M243.158 61.361v-57.6c0-3.2 4-4.9 6.7-2.9l118.4 87c2 1.5 2 4.4 0 5.9l-118.4 87c-2.7 2-6.7.2-6.7-2.9v-57.5c-87.8 1.4-158.1 76-152.1 165.4 5.1 76.8 67.7 139.1 144.5 144 81.4 5.2 150.6-53 163-129.9 2.3-14.3 14.7-24.7 29.2-24.7 17.9 0 31.8 15.9 29 33.5-17.4 109.7-118.5 192-235.7 178.9-98-11-176.7-89.4-187.8-187.4-14.7-128.2 84.9-237.4 209.9-238.8z" />
      </svg>
      Reports
      <span class="notification-number updates">1</span>
     </a>
     <a href="./Consulterreponse.php">
      <svg viewBox="0 0 512 512" fill="currentColor">
       <path d="M352 0H64C28.704 0 0 28.704 0 64v320a16.02 16.02 0 009.216 14.496A16.232 16.232 0 0016 400c3.68 0 7.328-1.248 10.24-3.712L117.792 320H352c35.296 0 64-28.704 64-64V64c0-35.296-28.704-64-64-64z" />
       <path d="M464 128h-16v128c0 52.928-43.072 96-96 96H129.376L128 353.152V400c0 26.464 21.536 48 48 48h234.368l75.616 60.512A16.158 16.158 0 00496 512c2.336 0 4.704-.544 6.944-1.6A15.968 15.968 0 00512 496V176c0-26.464-21.536-48-48-48z" />
      </svg>
      View Responces
     </a>
    </div>
   </div>
  
  </div>
  <div class="main-container">
   <div class="main-header">
    <a class="menu-link-main" href="#">All Apps</a>
    <div class="header-menu">
     <a class="main-header-link " href="#">Accounts</a>
     <a class="main-header-link" href="#">Produvts</a>
     <a class="main-header-link" href="#">Events</a>
     <a class="main-header-link " href="#">Merch</a>
     <a class="main-header-link" href="#">Forums</a>
     <a class="main-header-link is-active" href="tous _rec.php">Reports</a>

    </div>
   </div>
   <div class="content-wrapper">
   <div style=" height: 500px;">
                    <!--<h4 style="color: white;">La Liste Des Rèclamations </h3>-->
                    


        
                    <form action="" method="GET">
                        <table style=" position:relative;top:70px;">
                            <tr>
                        <td><input type="research" placeholder="Rechercher" name="recherche" ></td>
                        <td><input class="buttonClass" Type="submit" value="Research"></td>

                      </table>
                    </form>
                    <form action="" method="POST">
                        <table style=" position:relative;top:10px; right:-650px;">
                            <tr>
                        <td><input type="text"  name="date" hidden value="1"></td>
                        <td><input class="buttonClass"Type="submit" value="Sort by Date" style="width:200px;"></td>
                      </table>
                    </form>
                    <div class="text-center">
        	
                            
                          </div>
                                  <table border="4" style="position: relative;  top: 50px; width: 100%; height: 150px; ">
                                  <tr>
                                      <th style="color:gold;">ID</th>
                                      <th style="color: gold;">Type</th>
                                      <th style="color: gold;">Date</th>
                                      <th style="color: gold;">Description</th>
                                      <th style="color:gold;">Email</th>
                                      <th style="color:gold;">subject</th>
                                      <th colspan="2" style="color:gold;">Actions</th>

                                  </tr>
                                  <?php
                                  foreach($listeReclamations as $reclamation){
                                      ?>
                                      <tr>
                                <td style="color:white;"><?php echo $reclamation['id_reclamation']; ?></td>
                          <td style="color:white;"><?php echo $reclamation['type']; ?></td>
                          <td style="color:white;"><?php echo $reclamation['date']; ?></td>
                          <td style="color:white;"><?php echo $reclamation['description']; ?></td>
                          <td style="color:white;"><?php echo $reclamation['mail']; ?></td>
                                  <td style="color:white;"><?php echo $reclamation['sujet']; ?></td>
                                  <td>
                            <form method="POST" action="ajouterreponse.php">
                              <input type="image" id="image" src="assets/reply.png">
                              <input type="hidden" value=<?PHP echo $reclamation['id_reclamation']; ?> name="id">
                            </form>
                          </td>
                          <td>
                                  <form method="POST" action="supprimerreclamation.php">
                              <input type="image" id="image" src="assets/remove.png">
                              <input type="hidden" value=<?PHP echo $reclamation['id_reclamation']; ?> name="id">
                            </form>
                            
                          </td>
                                  </tr>
                                  <?php
                                  }
                                  ?>

                                  </table>
                              
                                  
                                                              
                              </div>
                  
   </div>
  </div>
 </div>
 <div class="overlay-app"></div>
</div>
<!-- partial -->
  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script><script  src="./script.js"></script>

</body>
</html>




















