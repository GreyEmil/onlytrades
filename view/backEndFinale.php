<?php error_reporting(E_ERROR | E_WARNING | E_PARSE); session_start(); 

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>CodePen - Glassmorphism Creative Cloud App Redesign</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
  <link rel="stylesheet" href="css/bestyle.css">
  <link rel="stylesheet" href="css/backend.css">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <script src="https://kit.fontawesome.com/9ee4261700.js" crossorigin="anonymous"></script>

</head>

<body>
  <!-- partial:index.partial.html -->
  <div class="video-bg">
    <video width="320" height="240" autoplay loop muted>
      <source src="img/vid2.mp4" type="video/mp4">
      Your browser does not support the video tag.
    </video>
  </div>
  <div class="dark-light">
    <svg viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5" fill="none" stroke-linecap="round"
      stroke-linejoin="round">
      <path d="M21 12.79A9 9 0 1111.21 3 7 7 0 0021 12.79z" />
    </svg>
  </div>
  <div class="app">
    <div class="header">
      <div class="menu-circle"></div>
      <div class="admin-icon"><img id="adminIcon" class="img" src="data:image;base64,<?php echo $_SESSION["user"]["photo"] ;?>" alt=""></div>



    </div>
    <div class="wrapper">
      <div class="left-side">
        <div class="side-wrapper">
          <div class="side-title">Apps</div>
          <div class="side-menu">
            <a href="#" id="chart">
              <svg viewBox="0 0 512 512">
                <g xmlns="http://www.w3.org/2000/svg" fill="currentColor">
                  <path d="M0 0h128v128H0zm0 0M192 0h128v128H192zm0 0M384 0h128v128H384zm0 0M0 192h128v128H0zm0 0"
                    data-original="#bfc9d1" />
                </g>
                <path xmlns="http://www.w3.org/2000/svg" d="M192 192h128v128H192zm0 0" fill="currentColor"
                  data-original="#82b1ff" />
                <path xmlns="http://www.w3.org/2000/svg"
                  d="M384 192h128v128H384zm0 0M0 384h128v128H0zm0 0M192 384h128v128H192zm0 0M384 384h128v128H384zm0 0"
                  fill="currentColor" data-original="#bfc9d1" />
              </svg>
              Charts
            </a>
            <a href="#">
              <svg viewBox="0 0 488.932 488.932" fill="currentColor">
                <path
                  d="M243.158 61.361v-57.6c0-3.2 4-4.9 6.7-2.9l118.4 87c2 1.5 2 4.4 0 5.9l-118.4 87c-2.7 2-6.7.2-6.7-2.9v-57.5c-87.8 1.4-158.1 76-152.1 165.4 5.1 76.8 67.7 139.1 144.5 144 81.4 5.2 150.6-53 163-129.9 2.3-14.3 14.7-24.7 29.2-24.7 17.9 0 31.8 15.9 29 33.5-17.4 109.7-118.5 192-235.7 178.9-98-11-176.7-89.4-187.8-187.4-14.7-128.2 84.9-237.4 209.9-238.8z" />
              </svg>
              Updates
              <span class="notification-number updates">3</span>
            </a>
          </div>
        </div>
        <div class="side-wrapper">
          <div class="side-title">Categories</div>
          <div class="side-menu">
            <a href="#">
              <svg viewBox="0 0 488.455 488.455" fill="currentColor">
                <path
                  d="M287.396 216.317c23.845 23.845 23.845 62.505 0 86.35s-62.505 23.845-86.35 0-23.845-62.505 0-86.35 62.505-23.845 86.35 0" />
                <path
                  d="M427.397 91.581H385.21l-30.544-61.059H133.76l-30.515 61.089-42.127.075C27.533 91.746.193 119.115.164 152.715L0 396.86c0 33.675 27.384 61.074 61.059 61.074h366.338c33.675 0 61.059-27.384 61.059-61.059V152.639c-.001-33.674-27.385-61.058-61.059-61.058zM244.22 381.61c-67.335 0-122.118-54.783-122.118-122.118s54.783-122.118 122.118-122.118 122.118 54.783 122.118 122.118S311.555 381.61 244.22 381.61z" />
              </svg>
              Photography
            </a>
            <a href="#">
              <svg viewBox="0 0 512 512" fill="currentColor">
                <circle cx="295.099" cy="327.254" r="110.96" transform="rotate(-45 295.062 327.332)" />
                <path
                  d="M471.854 338.281V163.146H296.72v41.169a123.1 123.1 0 01121.339 122.939c0 3.717-.176 7.393-.5 11.027zM172.14 327.254a123.16 123.16 0 01100.59-120.915L195.082 73.786 40.146 338.281H172.64c-.325-3.634-.5-7.31-.5-11.027z" />
              </svg>
              Graphic Design
            </a>
            <a href="#">
              <svg viewBox="0 0 58 58" fill="currentColor">
                <path
                  d="M57 6H1a1 1 0 00-1 1v44a1 1 0 001 1h56a1 1 0 001-1V7a1 1 0 00-1-1zM10 50H2v-9h8v9zm0-11H2v-9h8v9zm0-11H2v-9h8v9zm0-11H2V8h8v9zm26.537 12.844l-11 7a1.007 1.007 0 01-1.018.033A1.001 1.001 0 0124 36V22a1.001 1.001 0 011.538-.844l11 7a1.003 1.003 0 01-.001 1.688zM56 50h-8v-9h8v9zm0-11h-8v-9h8v9zm0-11h-8v-9h8v9zm0-11h-8V8h8v9z" />
              </svg>
              Video
            </a>
            <a href="#">
              <svg viewBox="0 0 512 512" fill="currentColor">
                <path
                  d="M499.377 46.402c-8.014-8.006-18.662-12.485-29.985-12.613a41.13 41.13 0 00-.496-.003c-11.142 0-21.698 4.229-29.771 11.945L198.872 275.458c25.716 6.555 47.683 23.057 62.044 47.196a113.544 113.544 0 0110.453 23.179L500.06 106.661C507.759 98.604 512 88.031 512 76.89c0-11.507-4.478-22.33-12.623-30.488zM176.588 302.344a86.035 86.035 0 00-3.626-.076c-20.273 0-40.381 7.05-56.784 18.851-19.772 14.225-27.656 34.656-42.174 53.27C55.8 397.728 27.795 409.14 0 416.923c16.187 42.781 76.32 60.297 115.752 61.24 1.416.034 2.839.051 4.273.051 44.646 0 97.233-16.594 118.755-60.522 23.628-48.224-5.496-112.975-62.192-115.348z" />
              </svg>
              Illustrations
            </a>
            <a href="#">
              <svg viewBox="0 0 512 512" fill="currentColor">
                <path
                  d="M497 151H316c-8.401 0-15 6.599-15 15v300c0 8.401 6.599 15 15 15h181c8.401 0 15-6.599 15-15V166c0-8.401-6.599-15-15-15zm-76 270h-30c-8.401 0-15-6.599-15-15s6.599-15 15-15h30c8.401 0 15 6.599 15 15s-6.599 15-15 15zm0-180h-30c-8.401 0-15-6.599-15-15s6.599-15 15-15h30c8.401 0 15 6.599 15 15s-6.599 15-15 15z" />
                <path
                  d="M15 331h196v60h-75c-8.291 0-15 6.709-15 15s6.709 15 15 15h135v-30h-30v-60h30V166c0-24.814 20.186-45 45-45h135V46c0-8.284-6.716-15-15-15H15C6.716 31 0 37.716 0 46v270c0 8.284 6.716 15 15 15z" />
              </svg>
              UI/UX
            </a>
            <a href="#">
              <svg viewBox="0 0 512 512" fill="currentColor">
                <path
                  d="M0 331v112.295a14.996 14.996 0 007.559 13.023L106 512V391L0 331zM136 391v121l105-60V331zM271 331v121l105 60V391zM406 391v121l98.441-55.682A14.995 14.995 0 00512 443.296V331l-106 60zM391 241l-115.754 57.876L391 365.026l116.754-66.15zM262.709 1.583a15.006 15.006 0 00-13.418 0L140.246 57.876 256 124.026l115.754-66.151L262.709 1.583zM136 90v124.955l105 52.5V150zM121 241L4.246 298.876 121 365.026l115.754-66.15zM271 150v117.455l105-52.5V90z" />
              </svg>
              3D/AR
            </a>
          </div>
        </div>
        <div class="side-wrapper">
          <div class="side-title">Fonts</div>
          <div class="side-menu">
            <a href="#">
              <svg viewBox="0 0 332 332" fill="currentColor">
                <path
                  d="M282.341 8.283C275.765 2.705 266.211 0 253.103 0c-18.951 0-36.359 5.634-51.756 16.743-14.972 10.794-29.274 28.637-42.482 53.028-4.358 7.993-7.428 11.041-8.973 12.179h-26.255c-10.84 0-19.626 8.786-19.626 19.626 0 8.989 6.077 16.486 14.323 18.809l-.05.165h.589c1.531.385 3.109.651 4.757.651h18.833l-32.688 128.001c-7.208 27.848-10.323 37.782-11.666 41.24-1.445 3.711-3.266 7.062-5.542 10.135-.42-5.39-2.637-10.143-6.508-13.854-4.264-4.079-10.109-6.136-17.364-6.136-8.227 0-15.08 2.433-20.37 7.229-5.416 4.93-8.283 11.193-8.283 18.134 0 5.157 1.701 12.712 9.828 19.348 6.139 4.97 14.845 7.382 26.621 7.382 17.096 0 32.541-4.568 45.891-13.577 13.112-8.845 24.612-22.489 34.166-40.522 9.391-17.678 18.696-45.124 28.427-83.9l18.598-73.479h30.016c10.841 0 19.625-8.785 19.625-19.625s-8.784-19.626-19.625-19.626h-19.628c6.34-21.62 14.175-37.948 23.443-48.578 2.284-2.695 5.246-5.692 8.412-7.678-1.543 3.392-2.325 6.767-2.325 10.055 0 6.164 2.409 11.714 6.909 16.03 4.484 4.336 10.167 6.54 16.888 6.54 7.085 0 13.373-2.667 18.17-7.716 4.76-5.005 7.185-11.633 7.185-19.703.017-9.079-3.554-16.899-10.302-22.618z" />
              </svg>
              Manage Fonts
            </a>
          </div>
        </div>
        <div class="side-wrapper">
          <div class="side-title">Resource Links</div>
          <div class="side-menu">
            <a href="#">
              <svg viewBox="0 0 512 512" fill="currentColor">
                <path
                  d="M467 0H45C20.186 0 0 20.186 0 45v422c0 24.814 20.186 45 45 45h422c24.814 0 45-20.186 45-45V45c0-24.814-20.186-45-45-45zM181 241c41.353 0 75 33.647 75 75s-33.647 75-75 75-75-33.647-75-75c0-8.291 6.709-15 15-15s15 6.709 15 15c0 24.814 20.186 45 45 45s45-20.186 45-45-20.186-45-45-45c-41.353 0-75-33.647-75-75s33.647-75 75-75 75 33.647 75 75c0 8.291-6.709 15-15 15s-15-6.709-15-15c0-24.814-20.186-45-45-45s-45 20.186-45 45 20.186 45 45 45zm180 120h30c8.291 0 15 6.709 15 15s-6.709 15-15 15h-30c-24.814 0-45-20.186-45-45V211h-15c-8.291 0-15-6.709-15-15s6.709-15 15-15h15v-45c0-8.291 6.709-15 15-15s15 6.709 15 15v45h45c8.291 0 15 6.709 15 15s-6.709 15-15 15h-45v135c0 8.276 6.724 15 15 15z" />
              </svg>
              Stock
            </a>
            <a href="#">
              <svg viewBox="0 0 511.441 511.441" fill="currentColor">
                <path d="M255.721 347.484L90.22 266.751v106.57l165.51 73.503 165.509-73.503V266.742z" />
                <path
                  d="M511.441 189.361L255.721 64.617 0 189.361l255.721 124.744 195.522-95.378v111.032h30V204.092z" />
              </svg>
              Tutorials
            </a>
            <a href="#">
              <svg viewBox="0 0 512 512" fill="currentColor">
                <path d="M196 151h-75v90h75c24.814 0 45-20.186 45-45s-20.186-45-45-45z" />
                <path
                  d="M467 0H45C20.186 0 0 20.186 0 45v422c0 24.814 20.186 45 45 45h422c24.814 0 45-20.186 45-45V45c0-24.814-20.186-45-45-45zM196 271h-75v105c0 8.291-6.709 15-15 15s-15-6.709-15-15V136c0-8.291 6.709-15 15-15h90c41.353 0 75 33.647 75 75s-33.647 75-75 75zm210-60c8.291 0 15 6.709 15 15s-6.709 15-15 15h-45v135c0 8.291-6.709 15-15 15s-15-6.709-15-15V241h-15c-8.291 0-15-6.709-15-15s6.709-15 15-15h15v-45c0-24.814 20.186-45 45-45h30c8.291 0 15 6.709 15 15s-6.709 15-15 15h-30c-8.276 0-15 6.724-15 15v45h45z" />
              </svg>
              Portfolio
            </a>
            <a href="#">
              <svg viewBox="0 0 512 512" fill="currentColor">
                <path
                  d="M181 181h-60v60h60c16.54 0 30-13.46 30-30s-13.46-30-30-30zm0 0M181 271h-60v60h60c16.54 0 30-13.46 30-30s-13.46-30-30-30zm0 0M346 241c-19.555 0-36.238 12.54-42.438 30h84.875c-6.199-17.46-22.882-30-42.437-30zm0 0" />
                <path
                  d="M436 0H75C33.648 0 0 33.648 0 75v362c0 41.352 33.648 75 75 75h361c41.352 0 76-33.648 76-75V75c0-41.352-34.648-75-76-75zM286 151h120v30H286zm-45 150c0 33.09-26.91 60-60 60H91V151h90c33.09 0 60 26.91 60 60 0 18.008-8.133 33.996-20.73 45 12.597 11.004 20.73 26.992 20.73 45zm180 0H303.562c6.196 17.46 22.883 30 42.438 30 16.012 0 30.953-8.629 38.992-22.516l25.957 15.032C397.58 346.629 372.687 361 346 361c-41.352 0-75-33.648-75-75s33.648-75 75-75 75 33.648 75 75zm0 0" />
              </svg>
              Behance
            </a>
            <a href="#">
              <svg viewBox="0 0 512 512" fill="currentColor">
                <path
                  d="M352 0H64C28.704 0 0 28.704 0 64v320a16.02 16.02 0 009.216 14.496A16.232 16.232 0 0016 400c3.68 0 7.328-1.248 10.24-3.712L117.792 320H352c35.296 0 64-28.704 64-64V64c0-35.296-28.704-64-64-64z" />
                <path
                  d="M464 128h-16v128c0 52.928-43.072 96-96 96H129.376L128 353.152V400c0 26.464 21.536 48 48 48h234.368l75.616 60.512A16.158 16.158 0 00496 512c2.336 0 4.704-.544 6.944-1.6A15.968 15.968 0 00512 496V176c0-26.464-21.536-48-48-48z" />
              </svg>
              Social Forum
            </a>
          </div>
        </div>
      </div>
      <div class="main-container">
        <div class="main-header">
          <a class="menu-link-main" href="#">All Apps</a>
          <div class="header-menu">
            <a class="main-header-link is-active" id="account" href="#">Accounts</a>
            <a class="main-header-link is-active" id="trade" href="#">Trades</a>
            <a class="main-header-link" id="product" href="#">Products</a>
            <a class="main-header-link" id="competition" href="#" >Competitions</a>
            <a class="main-header-link " href="#">Merch</a>
            <a class="main-header-link" id="forum" href="#">Forums</a>
            <a class="main-header-link" id="report" href="#">Reports</a>

          </div>
        </div>
        <div class="content-wrapper" id="sheesh" >
          <table class="table table-striped table-hover " >
            <thead id="tablehead">
            </thead>
            <tbody id="tablebody">
            </tbody>
          </table>
          <div id="ticket"></div>
          <div id="statistics" style="background:none;width:100%;height:100%"></div>
        </div>
      </div>
    </div>
    <div class="overlay-app"></div>
  </div>
  <div id="temp" style="visibility:hidden"></div>
  <form action=""  class="edit-user" id="fform">
    <label for="username" class="label">Username</label>
    <input type="text" name="username" id="username" class="input-change">
    <label for="firstname" class="label">First name</label>
    <input type="text" name="firstname" id="firstname" class="input-change">
    <label for="lastname" class="label">Last name</label>
    <input type="text" name="lastname"  id="lastname"class="input-change">
    <label for="email" class="label">Email</label>
    <input type="text" name="email" id="email" class="input-change">
    <input type="text" name="id" id="id" class="input-change" style="display:none">
    <button id="submit" class="submit">Edit</button>
    <button id="close" class="submit">Close</button>
  </form>
  <div id="ADMINID" style="display:none"><?php echo $_SESSION["user"]["id"] ;?></div>
  <div id="adminProfile" class="admin-info">
    <div class="admin-logout" id="logout">Log Out</div>
    <a class="admin-website" href="index.php" >Go to Website</a>
    <div class="admin-logout" id="closeAdmin" style="top:unset;bottom:20px">Close</div>
    <div class="container">
      <div class="row info-row" >
        <img id="imageee"src="data:image;base64,<?php echo $_SESSION["user"]["photo"] ;?>" alt="" class="admin-photo">&nbsp
        <i id="adminImage" class="fa-solid fa-thumbtack" style="cursor:pointer"></i>
        <div style="width:100%"><form id="adminimage" action="" method="post" enctype="multipart/form-data">
        <input  class="image-inactive" name="image" type="file" value="<?php echo $_SESSION["user"]["username"] ;?>" disabled>
        </form></div>
      </div>
      
        <div class="row info-row" style="padding:5px">
        <div class="col-lg-6">
          <label class="admin-label" for="username">Username</label>&nbsp<i id="adminUsername" class="fa-solid fa-thumbtack" style="cursor:pointer"></i>
          <div style="width:100%"><input id="adminusername" class="info-inactive" type="text" value="<?php echo $_SESSION["user"]["username"] ;?>" disabled></div>
          <p id="errorusername" class="admin-error"></p>
          </div>
          
        </div>
        
        <div class="row info-row" style="padding:5px">
        <div class="col">
          <label class="admin-label" for="lastname">Last name</label>&nbsp<i id="adminLastname" class="fa-solid fa-thumbtack" style="cursor:pointer"></i>
          <div style="width:100%"><input id="adminlastname" class="info-inactive" type="text" value="<?php echo $_SESSION["user"]["last_name"] ;?>" disabled></div>
          <p id="errorlastname" class="admin-error"></p>
          </div>
          <div class="col">
          <label class="admin-label" for="firstname">First name</label> &nbsp<i id="adminFirstname" class="fa-solid fa-thumbtack" style="cursor:pointer"></i>
          <div style="width:100%"><input id="adminfirstname" class="info-inactive" type="text" value="<?php echo $_SESSION["user"]["first_name"] ;?>" disabled></div>
          <p id="errorfirstname" class="admin-error"></p>
          </div>
        </div>
        
        <div class="row info-row" style="padding:5px">
        <div class="col">
          <label class="admin-label" for="email">Email</label>&nbsp<i id="adminEmail" class="fa-solid fa-thumbtack" style="cursor:pointer"></i>
          <div style="width:100%"><input id="adminemail" class="info-inactive" type="text" value="<?php echo $_SESSION["user"]["email"] ;?>" disabled></div>
          <p id="erroremail" class="admin-error"></p>
          </div>
          <div class="col">
          <label class="admin-label" for="password">Password</label>&nbsp<i id="adminPassword" class="fa-solid fa-thumbtack" style="cursor:pointer"></i>
          <div style="width:100%"><input id="adminpassword" class="info-inactive" type="password" value="<?php echo $_SESSION["user"]["password"] ;?>" disabled></div>
          <p id="errorpassword" class="admin-error"></p>
          </div>
        </div>
      
    </div>
  </div>
  <!-- partial -->
  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
  <script src="js/bescript.js"></script>
  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
  
  <script>
    var locationb="accounts";
    var thead=$('#tablehead');
    var tbody=$('#tablebody');
    var usernameT=0,firstnameT=0,lastnameT=0,passwordT=0,emailT=0,imageT=0,profileT=0;
    $('#adminUsername').click(toggleInput);
    $('#adminLastname').click(toggleInput);
    $('#adminFirstname').click(toggleInput);
    $('#adminEmail').click(toggleInput);
    $('#adminPassword').click(toggleInput);
    $('#adminImage').click(toggleInput);
    $('#adminIcon').click(toggleProfile);
    $('#logout').click(logout);
    $('#closeAdmin').click(function(){
      profileT=0;
      $('#adminProfile').css("display","none");
    });

    $('#chart').click(getStatistics);

    $('#adminimage').change(updateAdmin);
    $('#adminusername').keypress(updateAdmin);
    $('#adminlastname').keypress(updateAdmin);
    $('#adminfirstname').keypress(updateAdmin);
    $('#adminemail').keypress(updateAdmin);
    $('#adminpassword').keypress(updateAdmin);

    function getStatistics(e)
    {
      thead.html('');
      tbody.html('');
      e.preventDefault();
      if(locationb=='trades')
      {
          $.when($.ajax({
            url:'../controller/backend.php',
            type:'post',
            data:{'request':'getstatistics',
              'of':locationb,
            },

          })).then(function(data){
            var stats=JSON.parse(data.trim());
            google.charts.load("current", {packages:["corechart"]});
          google.charts.setOnLoadCallback(drawChart);
          function drawChart() {
            var data = google.visualization.arrayToDataTable([
              ['Task', 'Hours per Day'],
              ['APPROVED',     stats['approved']],
              ['REJECTED',      stats['rejected']],
              ['AWAITING APPROVAL',  stats['awaitingApproval']],
              ['CLOSED', stats['closed']],
              
            ]);

            var options = {
              title: 'Trades Statistics',
              pieHole: 0.4,
              backgroundColor:'transparent',
              titleTextStyle: {
              color: 'black'
              },
              hAxis: {
                  textStyle: {
                      color: 'black'
                  },
                  titleTextStyle: {
                      color: 'black'
                  }
              },
              vAxis: {
                  textStyle: {
                      color: 'black'
                  },
                  titleTextStyle: {
                      color: 'black'
                  }
              },
              legend: {
                  textStyle: {
                      color: 'black'
                  }
              },
              is3D: false,
            };

            var chart = new google.visualization.PieChart(document.getElementById('statistics'));
            chart.draw(data, options);
          }
          
          })
      }

      if(locationb=='reports')
      {
          $.when($.ajax({
            url:'../controller/backend.php',
            type:'post',
            data:{'request':'getstatistics',
              'of':locationb,
            },

          })).then(function(data){
            var stats=JSON.parse(data.trim());
            google.charts.load("current", {packages:["corechart"]});
          google.charts.setOnLoadCallback(drawChart);
          function drawChart() {
            var data = google.visualization.arrayToDataTable([
              ['Task', 'Hours per Day'],
              ['OPEN',     stats['open']],
              ['AWAITING REPLY',      stats['awaitingReply']],
              ['SOLVED',  stats['solved']],
              
              
            ]);

            var options = {
              title: 'Reports Statistics',
              pieHole: 0.4,
              backgroundColor:'transparent',
              titleTextStyle: {
              color: 'black'
              },
              hAxis: {
                  textStyle: {
                      color: 'black'
                  },
                  titleTextStyle: {
                      color: 'black'
                  }
              },
              vAxis: {
                  textStyle: {
                      color: 'black'
                  },
                  titleTextStyle: {
                      color: 'black'
                  }
              },
              legend: {
                  textStyle: {
                      color: 'black'
                  }
              },
              is3D: false,
            };

            var chart = new google.visualization.PieChart(document.getElementById('statistics'));
            chart.draw(data, options);
          }
          
          })
      }



    }

    function logout()
    {
      $.when($.ajax({
        url:'../controller/backend.php',
        type:'post',
        data:{"request":"logout",
        },
      })).then(function(){window.location="index.php";});
    }

    function toggleProfile()
    {
      if(profileT==0)
      {
        $('#adminProfile').css("display","block");
        profileT=1;
      }
      else
      {
        $('#adminProfile').css("display","none");
        profileT=0;
      }
    }

    function getMyProfile()
    {
      $.when($.ajax({
        url:'../controller/backend.php',
        type:'post',
        data:{"request":"getmyprofile",
        "id":<?php echo $_SESSION["user"]["id"] ;?>},
      })).then(function(data){displayMyProfile(data)});
    }
    function displayMyProfile(data)
    {
      var profile=JSON.parse(data.trim());
      $('#adminusername').val(profile["username"]);
      $('#adminfirstname').val(profile["first_name"]);
      $('#adminlastname').val(profile["last_name"]);
      $('#adminemail').val(profile["email"]);
      $('#adminpassword').val(profile["password"]);
      $('#imageee').attr('src','data:image;base64,'+profile["photo"]);
      $('#adminIcon').attr('src','data:image;base64,'+profile["photo"]);
    }


    function updateAdmin(e)
    {
      var element=$(this);
      id=$('#ADMINID').text();
      if($(this).attr('id')=="adminimage")
      {
        let formData=new FormData($('#adminimage')[0]);
        formData.append("request","updateadmin")
        formData.append("id",id);
        $.when($.ajax({
        url:'../controller/backend.php',
        type:'post',
        data:formData,
        contentType:false,
        processData:false,
      })).then(getMyProfile);

      }
      if(e.keyCode==13)
      {
        
        if($(this).attr('id')=="adminusername")
        {
          
          if($(this).val().length<3)
          {
            $('#errorusername').text('Username is invalid!');
          }
          else
          {
            $.when($.ajax({
              url:'../controller/backend.php',
              type:'post',
              data:{'username':$(this).val(),
                'request':'checkusername',
              }
            })).then(function(data){
              if(data.trim()==0)
              {
                $.ajax({
                url:'../controller/backend.php',
                type:'post',
                data:{'username':element.val(),
                  'request':'updateadmin',
                  'id':id,
                }
                })

                $('#errorusername').text('');
                usernameT=0;
                element.attr("class","info-inactive");
                element.attr("disabled",true);
              }
              else
              {
                $('#errorusername').text('Username already exists!');
              }
            });
            
          }
        }

        if($(this).attr('id')=="adminlastname")
        {
          if($(this).val().length<2)
          {
            $('#errorlastname').text('Lastname is invalid!');
          }
          else
          {
            $.ajax({
                url:'../controller/backend.php',
                type:'post',
                data:{'lastname':element.val(),
                  'request':'updateadmin',
                  'id':id,
                }
                })
            $('#errorlastname').text('');
            lastnameT=0;
            $(this).attr("class","info-inactive");
            $(this).attr("disabled",true);
          }
  
        }

        if($(this).attr('id')=="adminfirstname")
        {
          if($(this).val().length<3)
          {
            $('#errorfirstname').text('Firstname is invalid!');
          }
          else
          {
            $.ajax({
                url:'../controller/backend.php',
                type:'post',
                data:{'firstname':element.val(),
                  'request':'updateadmin',
                  'id':id,
                }
                })
            $('#errorfirstname').text('');
            firstnameT=0;
            $(this).attr("class","info-inactive");
            $(this).attr("disabled",true);
          }
          
        }

        if($(this).attr('id')=="adminemail")
        {
          if(!/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(element.val()))
          {
            $('#erroremail').text('Email is invalid');
          }
          else
          {
            $.when($.ajax({
              url:'../controller/backend.php',
              type:'post',
              data:{'email':$(this).val(),
                'request':'checkemail',
              }
            })).then(function(data){
              if(data.trim()==0)
              {
                $.ajax({
                url:'../controller/backend.php',
                type:'post',
                data:{'email':element.val(),
                  'request':'updateadmin',
                  'id':id,
                }
                })

                $('#erroremail').text('');
                emailT=0;
                element.attr("class","info-inactive");
                element.attr("disabled",true);
              }
              else{
                $('#erroremail').text('Email already exists!');
              }
            });
            
          }
        }

        if($(this).attr('id')=="adminpassword")
        {
          if($(this).val().length<8)
          {
            $('#errorpassword').text('Password is invalid!');
          }
          else
          {
            $.ajax({
                url:'../controller/backend.php',
                type:'post',
                data:{'password':element.val(),
                  'request':'updateadmin',
                  'id':id,
                }
                })
            $('#errorpassword').text('');
            passwordT=0;
            $(this).attr("class","info-inactive");
            $(this).attr("disabled",true);
          }
          
        }
      }
    }


    function toggleInput()
    {

      if($(this).attr('id')=="adminImage")
      {
        if(imageT==0)
        {
          $(this).next().children().children().first().attr("class","image-active");
          $(this).next().children().children().first().attr("disabled",false);
          $(this).css("color","#3a6df0");
          imageT=1;
        }
        else
        {
          $(this).next().children().children().first().attr("class","image-inactive");
          $(this).next().children().children().first().attr("disabled",true);
          $(this).css("color","white");
          imageT=0;
        }
        
      }



      if($(this).attr('id')=="adminUsername")
      {
        if(usernameT==0)
        {
          $(this).css("color","#3a6df0");
          $(this).next().children().first().attr("class","info-active");
          $(this).next().children().first().attr("disabled",false);
          
          usernameT=1;
        }
        else
        {
          $(this).css("color","white");
          $(this).next().children().first().attr("class","info-inactive");
          $(this).next().children().first().attr("disabled",true);
          usernameT=0;
        }
        
      }

      if($(this).attr('id')=="adminLastname")
      {
        if(lastnameT==0)
        {
          $(this).css("color","#3a6df0");
          $(this).next().children().first().attr("class","info-active");
          $(this).next().children().first().attr("disabled",false);
          lastnameT=1;
        }
        else
        {
          $(this).css("color","white");
          $(this).next().children().first().attr("class","info-inactive");
          $(this).next().children().first().attr("disabled",true);
          lastnameT=0;
        }
        
      }

      if($(this).attr('id')=="adminFirstname")
      {
        if(firstnameT==0)
        {
          $(this).css("color","#3a6df0");
          $(this).next().children().first().attr("class","info-active");
          $(this).next().children().first().attr("disabled",false);
          firstnameT=1;
        }
        else
        {
          $(this).css("color","white");
          $(this).next().children().first().attr("class","info-inactive");
          $(this).next().children().first().attr("disabled",true);
          firstnameT=0;
        }
        
      }

      if($(this).attr('id')=="adminEmail")
      {
        if(emailT==0)
        {
          $(this).css("color","#3a6df0");
          $(this).next().children().first().attr("class","info-active");
          $(this).next().children().first().attr("disabled",false);
          emailT=1;
        }
        else
        {
          $(this).css("color","white");
          $(this).next().children().first().attr("class","info-inactive");
          $(this).next().children().first().attr("disabled",true);
          emailT=0;
        }
        
      }

      if($(this).attr('id')=="adminPassword")
      {
        if(passwordT==0)
        {
          $(this).css("color","#3a6df0");
          $(this).next().children().first().attr("class","info-active");
          $(this).next().children().first().attr("disabled",false);
          passwordT=1;
        }
        else
        {
          $(this).css("color","white");
          $(this).next().children().first().attr("class","info-inactive");
          $(this).next().children().first().attr("disabled",true);
          passwordT=0;
        }
        
      }

      
    }

    






    
    
    loadAccounts();
    
    $('#account').click(loadAccounts);
    $('#report').click(loadReports);
    $('#trade').click(loadTrades);
    $('#submit').click(modifyInfo);
    $('#close').click(function(e){ e.preventDefault();$('#fform').css("display","none"); });
    

    function loadTrades()
    {
      $('#statistics').html('');
      locationb="trades";
      $.when($.ajax({
        url:'../controller/backend.php',
        type:'post',
        data:{'request':'gettrades'},
      })).then(function(data){displayTrades(data)});
    }
    function loadAccounts()
    {
      $('#statistics').html('');
      locationb="accounts";
      $.when($.ajax({
        url:'../controller/backend.php',
        type:'post',
        data:{'request':'getaccounts'},
      })).then(function(data){displayAccounts(data)});
    }

    function loadReports()
    {
      $('#statistics').html('');
      locationb="reports";
      $.when($.ajax({
        url:'../controller/backend.php',
        type:'post',
        data:{'request':'gettickets'},
      })).then(function(data){displayReports(data)});
      
    }

    function displayTrades(data)
    {
      var trades=JSON.parse(data);
      $('#ticket').html('');
      tbody.html('');
      thead.html('');
      var sel;
      thead.html('<tr > <th scope="col">ID</th> <th scope="col">NAME</th> <th scope="col">OWNER</th> <th scope="col">STATUS</th> <th scope="col">IMAGE</th></tr>');
      for(var trade of trades){
        if(trade["status"]!="DONE" && trade["status"]!="ACCEPTED")
        {
        if(trade["status"]=="AWAITING APPROVAL")
        sel='<select id="trade'+trade["id"]+'"><option value="APPROVED">APPROVED</option><option selected="selected" value="AWAITING APPROVAL">AWAITING APPROVAL</option><option value="REJECTED">REJECTED</option></select>';
        if(trade["status"]=="REJECTED")
        sel='<select id="trade'+trade["id"]+'"><option value="APPROVED">APPROVED</option><option value="AWAITING APPROVAL">AWAITING APPROVAL</option><option slected="selected" value="REJECTED">REJECTED</option></select>';
        if(trade["status"]=="APPROVED")
        sel='<select id="trade'+trade["id"]+'"><option selected="selected" value="APPROVED">APPROVED</option><option value="AWAITING APPROVAL">AWAITING APPROVAL</option><option value="REJECTED">REJECTED</option></select>';
        }
        else
        {
          sel='CLOSED';
        }
        tbody.append("<tr></tr>");
        tbody.children().last().append('<th scope="row">'+trade["id"]+'</th> <th scope="row" >'+trade["name"]+'</th> <th>'+trade["user"]["username"]+'</th>  <th>'+sel+'</th> <th><img class="user-image" src="data:image/jpeg;base64,'+trade["image"]+'" alt=""></th>');
        $('#trade'+trade["id"]).unbind();
        $('#trade'+trade["id"]).change(changeTradeStatus);

      }
    }
    function changeTradeStatus()
    {
      $.when($.ajax({
        url:'../controller/backend.php',
        type:'post',
        data:{
          'request':"updatetradestatus",
          'status':$(this).val(),
          'id':$(this).attr('id').substring(5),

        },
        
      })).then(); 
    }

    function displayReports(data)
    {
      var tickets=JSON.parse(data);
      $('#ticket').html('');
      tbody.html('');
      thead.html('');
      thead.html('<tr > <th scope="col">ID</th> <th scope="col">SUBJECT</th> <th scope="col">Username</th> <th scope="col">Status</th> <th scope="col">Last Update</th></tr>');
      for(var ticket of tickets){
        tbody.append("<tr></tr>");
        tbody.children().last().append('<th scope="row">'+ticket["id"]+'</th> <th scope="row" id='+ticket["id"]+'>'+ticket["subject"]+'</th> <th></th>  <th>'+ticket["status"]+'</th> <th></th>');
        $('#'+ticket["id"]).unbind();
        $('#'+ticket["id"]).click(function() {getTicket($(this).attr("id"))})
      }
    }
    function getTicket(id)
    {
      $.when($.ajax({
        url:'../controller/backend.php',
        type:'post',
        data:{'request':'getticket',
              
              'id':id,
        },
      })).then(function(data){displayTicket(data,id)}); 
    }
    function displayTicket(data,id)
    {
      tbody.html('');
      thead.html('');
      $('#ticket').html(data);
      $('#reply_btn').unbind();
      $('#reply_btn').click(function(e){e.preventDefault();updateTicket(id);$('#status').val("AWAITING YOUR REPLY");updateStatus(id)});
      $('#selectstatus').unbind();
      $('#status').on('change',function(e){e.preventDefault();updateStatus(id)});
    }

    function updateStatus(id)
    {
      $.when($.ajax({
        url:'../controller/backend.php',
        type:'post',
        data:{
          'request':"updatestatus",
          'status':$('#status').val(),
          'id_ticket':id

        },
        
      })).then(); 
    }
    function updateTicket()
    {
      
      let formData=new FormData($('#reply')[0]);
      formData.append("request","updateticket");
      $.when($.ajax({
        url:'../controller/backend.php',
        type:'post',
        data:formData,
        contentType:false,
        processData:false,
      })).then(loadReports); 
    }
    function displayAccounts(data)
    {
      var accounts=JSON.parse(data);
      $('#ticket').html('');
      var thead=$('#tablehead');
      var tbody=$('#tablebody');
      tbody.html('');
      thead.html('');
      thead.html("<tr> <th>ID</th> <th>Username</th><th>First name</th> <th>Last name</th> <th>E-mail</th>  <th>Status</th> <th>Action</th></tr>")
      for(var account of accounts)
      {
        tbody.append("<tr></tr>");
        tbody.children().last().append('<th scope="row">'+account["id"]+'</th><th>'+account["username"]+'</th> <th>'+account["first_name"]+'</th>    <th>'+account["last_name"]+'</th> <th>'+account["email"]+'</th>');
        if(account['isBanned']==1)
        {
          tbody.children().last().append('<th>Banned</th>');
          tbody.children().last().append('<th><div id="unban'+account["id"]+'">Unban</div> <div id="remove'+account["id"]+'">Remove</div> <div id="modify'+account["id"]+'">modify</div></th>');
          $('#unban'+account["id"]).click(function(){takeAction($(this).attr('id').substring(0,5),$(this).attr('id').substring(5))});
          $('#remove'+account["id"]).click(function(){takeAction($(this).attr('id').substring(0,6),$(this).attr('id').substring(6))});
          $('#modify'+account["id"]).click(function(){modify($(this).parent().parent())});
        }
        else 
        {
          tbody.children().last().append('<th>Active</th>');
          tbody.children().last().append('<th><div id="ban'+account["id"]+'">Ban</div> <div id="remove'+account["id"]+'">Remove</div> <div id="modify'+account["id"]+'">modify</div></th>');
          $('#ban'+account["id"]).click(function(){takeAction($(this).attr('id').substring(0,3),$(this).attr('id').substring(3))});
          $('#remove'+account["id"]).click(function(){takeAction($(this).attr('id').substring(0,6),$(this).attr('id').substring(6))});
          $('#modify'+account["id"]).click(function(){modify($(this).parent().parent())});
        }

      }
    }


    function takeAction(action,id)
    {
      $.when($.ajax({
        url:'../controller/backend.php',
        type:'post',
        data:{'request':'takeaction',
              'action':action,
              'id':id,
        },
      })).then(loadAccounts());  
    }

    function modify(navigate)
      {
        $('#fform').css("display","block"); 
        $('#id').val(navigate.children()[0].innerHTML);
      }

      function modifyInfo(e)
      {
        e.preventDefault();
        let formData=new FormData($('#fform')[0]);
        formData.append("request","modify"); 
        $.when($.ajax({
          url:'../controller/backend.php',
          type:'post',
          data:formData,
          contentType:false,
          processData:false,

        })
        ).then(function(){
          $('#fform').css("display","none");
          loadAccounts();})
          $('#username').val('');
          $('#lastname').val('');
          $('#firstname').val('');
          $('#lastname').val('');

      }

    
  </script>
</body>


</html>