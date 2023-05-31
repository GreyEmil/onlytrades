<?php error_reporting(E_ERROR | E_WARNING | E_PARSE); session_start(); 

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>ADMIN DASHBOARD</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
  <link rel="stylesheet" href="css/bestyle.css">
  <link rel="stylesheet" href="css/backend.css">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="shortcut icon" type="image/x-icon" href="img/favicon.png" />
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
            
          </div>
        </div>
        
       
      </div>
      <div class="main-container">
        <div class="main-header">
          <a class="menu-link-main" href="#">All Apps</a>
          <div class="header-menu">
            <a class="main-header-link is-active" id="account" href="#">Accounts</a>
            <a class="main-header-link" id="trade" href="#">Trades</a>
            <a class="main-header-link" id="auction" href="#">Auctions</a>
           
            <a class="main-header-link " id="merch" href="backendmerch.php">Merch</a>
            <a class="main-header-link" id="forum" href="#">Forums</a>
            <a class="main-header-link" id="report" href="#">Reports</a>

          </div>
        </div>
        <div class="content-wrapper" id="cooo" >
          <table class="table table-striped table-hover table-responsive-lg" >
            <thead id="tablehead">
            </thead>
            <tbody id="tablebody">
            </tbody>
          </table>
          <div id="ticket"></div>
          <div id="sheesh"></div>
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
              color: 'white'
              },
              hAxis: {
                  textStyle: {
                      color: 'white'
                  },
                  titleTextStyle: {
                      color: 'white'
                  }
              },
              vAxis: {
                  textStyle: {
                      color: 'white'
                  },
                  titleTextStyle: {
                      color: 'white'
                  }
              },
              legend: {
                  textStyle: {
                      color: 'white'
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
              color: 'white'
              },
              hAxis: {
                  textStyle: {
                      color: 'white'
                  },
                  titleTextStyle: {
                      color: 'white'
                  }
              },
              vAxis: {
                  textStyle: {
                      color: 'white'
                  },
                  titleTextStyle: {
                      color: 'white'
                  }
              },
              legend: {
                  textStyle: {
                      color: 'white'
                  }
              },
              is3D: false,
            };

            var chart = new google.visualization.PieChart(document.getElementById('statistics'));
            chart.draw(data, options);
          }
          
          })
      }



      if(locationb=='auctions')
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
              ['Less Than 15 minutes',     stats['<15']],
              ['Between 15 And 30 minutes',      stats['>15<30']],
              ['Between 30 And 45 minutes',  stats['>30<45']],
              ['More Than 45minutes ', stats['>45']],
              
            ]);

            var options = {
              title: 'Auction Duration',
              pieHole: 0.4,
              backgroundColor:'transparent',
              titleTextStyle: {
              color: 'white'
              },
              hAxis: {
                  textStyle: {
                      color: 'white'
                  },
                  titleTextStyle: {
                      color: 'white'
                  }
              },
              vAxis: {
                  textStyle: {
                      color: 'white'
                  },
                  titleTextStyle: {
                      color: 'white'
                  }
              },
              legend: {
                  textStyle: {
                      color: 'white'
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
    $('#auction').click(loadAuctions);
    $('#merch').click(loadMerch);
    $('#forum').click(loadThreads);
    $('#submit').click(modifyInfo);
    $('#close').click(function(e){ e.preventDefault();$('#fform').css("display","none"); });
    
    function loadThreads()
    {
      $('#sheesh').html('');
      $('#statistics').html('');
      locationb="forum";
      $.when($.ajax({
        url:'../controller/backend.php',
        type:'post',
        data:{'request':'getthreads'},
      })).then(function(data){displayThreads(data)});
    }

    function displayThreads(data)
    {
      var threads=JSON.parse(data);
      $('#ticket').html('');
      tbody.html('');
      thead.html('');
      thead.html('<tr > <th scope="col"">ID</th> <th scope="col">Subject</th> <th scope="col">WRITER</th> <th scope="col">PUBLISH DATE</th>   <th scope="col">Comments</th> <th scope="col">Action</th> </tr>');
      for(var thread of threads){
        tbody.append("<tr></tr>");
        tbody.children().last().append('<th scope="row">'+thread["id"]+'</th> <th scope="row" >'+thread["subject"]+'</th> <th>'+thread["user"]["username"]+'</th> <th>'+thread["publish_date"]+'</th> <th>'+thread["comments"]+'</th> <th id="thread'+thread["id"]+'" scope="col" style="cursor:pointer">Remove</th> ');
        $('#thread'+thread["id"]).unbind();
        $('#thread'+thread["id"]).click(removeThread);
      }
    }

    function removeThread()
    {
      
      $.when($.ajax({
        url:'../controller/backend.php',
        type:'post',
        data:{'request':'deletethread',
        'idThread':$(this).attr("id").substring(6),}
      })).then(loadThreads())
    }



    function loadMerch()
    {
      $('#sheesh').html('');
      $('#statistics').html('');
      locationb="merch";
      $.when($.ajax({
        url:'../controller/backend.php',
        type:'post',
        data:{'request':'getmerch'},
      })).then(function(data){displayMerch(data)});
    }

    function displayMerch(data)
    {
      var merchs=JSON.parse(data);
      $('#ticket').html('');
      tbody.html('');
      thead.html('');
      thead.html('<tr > <th scope="col"">ID</th> <th scope="col">NAME</th> <th scope="col">DESCRIPTION</th> <th scope="col">PRICE</th>  <th scope="col" >QUANTITY</th> <th scope="col">IMAGE</th> </tr>');
      for(var merch of merchs){
        tbody.append("<tr></tr>");
        tbody.children().last().append('<th scope="row">'+merch["id"]+'</th> <th scope="row" >'+merch["name"]+'</th> <th>'+merch["description"]+'</th>  <th>'+merch["price"]+'</th> <th ><input class="info-inactive" style="background-color:rgba(0,0,0,0.5)" id="quantity'+merch["id"]+'" value="'+merch["quantity"]+'"></th>  </th>');
        $('#quantity'+merch["id"]).unbind();
        $('#quantity'+merch["id"]).keypress(changeQuantity);

      }
    }
  

    function loadAuctions()
    {
      $('#sheesh').html('');
      $('#statistics').html('');
      locationb="auctions";
      $.when($.ajax({
        url:'../controller/backend.php',
        type:'post',
        data:{'request':'getauctions'},
      })).then(function(data){displayAuctions(data)});
    }


    function loadTrades()
    {
      $('#sheesh').html('');
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
      $('#sheesh').html('');
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
      $('#sheesh').html('');
      $('#statistics').html('');
      locationb="reports";
      $.when($.ajax({
        url:'../controller/backend.php',
        type:'post',
        data:{'request':'gettickets'},
      })).then(function(data){displayReports(data)});
      
    }

    function displayAuctions(data)
    {
      var auctions=JSON.parse(data);
      $('#ticket').html('');
      tbody.html('');
      thead.html('');
      thead.html('<tr > <th scope="col"">ID</th> <th scope="col">OWNER</th> <th scope="col">NAME</th> <th scope="col">DESCRIPTION</th> <th scope="col" >START DATE</th> <th scope="col">IMAGE</th> <th scope="col">ACTION </th> </tr>');
      for(var auction of auctions){
        tbody.append("<tr></tr>");
        tbody.children().last().append('<th scope="row">'+auction["id"]+'</th> <th scope="row" >'+auction["user"]["username"]+'</th> <th>'+auction["name"]+'</th>  <th>'+auction["description"]+'</th> <th>'+auction["startDate"]+'</th> <th><img class="user-image" src="data:image/jpeg;base64,'+auction["images"][0]["bin"]+'" alt=""> <th scope="col" id="auction'+auction['id']+'" style="cursor:pointer">REMOVE</th></th>');
        $('#auction'+auction["id"]).unbind();
        $('#auction'+auction["id"]).click(removeAuction);

      }
    }
    function removeAuction()
    {
      $.when($.ajax({
        url:'../controller/backend.php',
        type:'post',
        data:{'request':'removeauction',
        'idAuction':$(this).attr('id').substring(7)},
      })).then(loadAuctions());
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
        sel='<select id="trade'+trade["id"]+'"><option value="APPROVED">APPROVED</option><option value="AWAITING APPROVAL">AWAITING APPROVAL</option><option selected="selected" value="REJECTED">REJECTED</option></select>';
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
      thead.html('<tr > <th scope="col">ID</th> <th scope="col">SUBJECT</th>  <th scope="col">Status</th> </tr>');
      for(var ticket of tickets){
        tbody.append("<tr></tr>");
        tbody.children().last().append('<th scope="row">'+ticket["id"]+'</th> <th scope="row" id='+ticket["id"]+'>'+ticket["subject"]+'</th> <th>'+ticket["status"]+'</th> <th></th>');
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
          tbody.children().last().append('<th style="cursor:pointer"><div id="unban'+account["id"]+'">Unban</div> <div id="remove'+account["id"]+'">Remove</div> <div id="modify'+account["id"]+'">modify</div></th>');
          $('#unban'+account["id"]).click(function(){takeAction($(this).attr('id').substring(0,5),$(this).attr('id').substring(5))});
          $('#remove'+account["id"]).click(function(){takeAction($(this).attr('id').substring(0,6),$(this).attr('id').substring(6))});
          $('#modify'+account["id"]).click(function(){modify($(this).parent().parent())});
        }
        else 
        {
          tbody.children().last().append('<th>Active</th>');
          tbody.children().last().append('<th style="cursor:pointer"><div id="ban'+account["id"]+'">Ban</div> <div id="remove'+account["id"]+'">Remove</div> <div id="modify'+account["id"]+'">modify</div></th>');
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

    
  




      // var questionNum=0,questionCounter=0,validQuest=0,validAnswer=[];
      // var allQuestValid=0;allAnswersValid=0;
      
      // var date;
      // document.getElementById('competition').addEventListener('click',resetAll);
      // document.getElementById('competition').addEventListener('click',start);
 
      // function resetAll()
      // {
      //   questionNum=0;
      //   questionCounter=0;
      // }

      // var addQuestButton=document.createElement('button');
      // addQuestButton.id='add_quest';
      // addQuestButton.innerText='Add Question';
      // addQuestButton.className='comp-button';
      // addQuestButton.type='button';

      // var submitButton=document.createElement('button');
      // submitButton.id='submit';
      // submitButton.innerText='submit';
      // submitButton.type='submit';
      // submitButton.className='comp-button';

      // var createCompButton=document.createElement('button');
      // createCompButton.id='create';
      // createCompButton.innerText='Create New Competition';
      // createCompButton.className='comp-button';

      // var viewCompetitionsButton=document.createElement('button');
      // viewCompetitionsButton.id='view';
      // viewCompetitionsButton.innerText='View All Competitions';
      // viewCompetitionsButton.className='comp-button';


      // function start()
      // {
      //   thead.html('');
      //   tbody.html('');
      //   $('#statistics').html('');
      //   $('#ticket').html('');
      //   document.getElementById('sheesh').innerHTML='';
      //   var container =document.createElement('form');
      //   container.enctype='multipart/form-data';
      //   container.method='post';
      //   container.id='wiw';
      //   container.className='comp-container';
      //   document.getElementById('sheesh').appendChild(container);
      //   document.getElementById('temp').innerHTML="3";
      //   document.getElementById('wiw').appendChild(createCompButton);
      //   document.getElementById('wiw').appendChild(viewCompetitionsButton);
      //   document.getElementById('create').addEventListener('click',addCompetetion);
      //   document.getElementById('view').addEventListener('click',viewCompetitions);

      // }

      // function addCompetetion()
      // {
      //   var image=document.createElement('input');
      //   image.type='file';
      //   image.id='image';
      //   image.style.marginLeft='-70%';
      //   image.style.marginTop='10px';
      //   image.style.marginBottom='10px';
      //   var imageLabel=document.createElement('label');
      //   imageLabel.htmlFor='image'
      //   imageLabel.innerText='Competition Image';
      //   imageLabel.className='quest-label';
      //   imageLabel.id='imageLabel';
      //   var container =document.createElement('div');
      //   container.id='wiiw';
      //   container.className='input-container';
      //   document.getElementById('wiw').appendChild(imageLabel);
      //   document.getElementById('wiw').appendChild(image);
      //   document.getElementById('wiw').appendChild(container);
      //   document.getElementById('create').remove();
      //   document.getElementById('view').remove();
      //   document.getElementById('wiw').appendChild(addQuestButton);
      //   document.getElementById('wiw').appendChild(submitButton);
      //   document.getElementById('add_quest').addEventListener('click',addQuestion);
      // }

      // function addQuestion()
      // {
        
      //   if((questionCounter==0 || (validQuest==1 && validAnswer[0]==1  && validAnswer[1]==1 && validAnswer[2]==1)) && questionCounter<10)
      //   {
      //     validQuest=0;
      //     validAnswer[0]=0;
      //     validAnswer[1]=0;
      //     validAnswer[2]=0;
      //     questionCounter++;
      //     questionNum++;
      //     document.getElementById('add_quest').remove();
      //     document.getElementById('submit').remove();
          
      //     var questionContainer=document.createElement('div');
      //     questionContainer.id='questionContainer'+questionNum.toString();
      //     questionContainer.className='quest-Container';

      //     var questInput=document.createElement('input');
      //     questInput.type='text';
      //     questInput.id='question'+questionNum.toString();
      //     questInput.className='quest-input';

      //     var questionLabel=document.createElement('label');
      //     questionLabel.htmlFor='question'+questionNum.toString();
      //     questionLabel.innerText='Question Number '+questionCounter+' : ';
      //     questionLabel.className='quest-label';
      //     questionLabel.id='questionLabel'+questionNum.toString();
          

      //     var removeQuestButton=document.createElement('button');
      //     removeQuestButton.type='button';
      //     removeQuestButton.innerText='remove';
      //     removeQuestButton.id='removebutton'+questionNum.toString();
      //     removeQuestButton.className='remove-button';

      //     // var startDate=document.createElement('input');
      //     // startDate.type='datetime-local';
      //     // startDate.id='date'+questionNum.toString();
      //     // startDate.className='date';
          
          
          
      //     document.getElementById('wiiw').appendChild(questionContainer);
      //     document.getElementById('questionContainer'+questionNum.toString()).appendChild(questionLabel);
      //     document.getElementById('questionContainer'+questionNum.toString()).appendChild(questInput);
          
      //     for(var i=0;i<3;i++)
      //     {
      //       var answerLabel=document.createElement('label');
      //       answerLabel.htmlFor='answer'+questionNum.toString()+i.toString();
      //       answerLabel.innerText='Answer Num '+(i+1)+' : ';
      //       answerLabel.className='answer-label'
      //       document.getElementById('questionContainer'+questionNum.toString()).appendChild(answerLabel);

      //       var answer=document.createElement('input');
      //       answer.id='answer'+questionNum.toString()+i.toString();
      //       answer.className='answer-input';
      //       answer.type='text';
      //       document.getElementById('questionContainer'+questionNum.toString()).appendChild(answer);

      //       var correctAnwser=document.createElement('input');
      //       correctAnwser.name='correctAnswer'+questionNum.toString()
      //       correctAnwser.id='correctAnswer'+questionNum.toString()+i.toString();
      //       correctAnwser.className='correct-answer';
      //       correctAnwser.type='radio';
      //       document.getElementById('questionContainer'+questionNum.toString()).appendChild(correctAnwser);

      //       answer.onchange=checkAnswer;
      //       answer.onblur=checkAnswer;
      //       answer.onsubmit=checkAnswer;
      //     }
      //     //document.getElementById('questionContainer'+questionNum.toString()).appendChild(startDate);
      //     document.getElementById('questionContainer'+questionNum.toString()).appendChild(removeQuestButton);
      //     document.getElementById('removebutton'+questionNum.toString()).onclick=removeQuestion;
      //     questInput.onchange=checkInput;
      //     questInput.onblur=checkInput;
      //     document.getElementById('wiw').appendChild(addQuestButton);
      //     document.getElementById('wiw').appendChild(submitButton);
      //     document.getElementById('submit').addEventListener('click',submitAll);
      //     document.getElementById('add_quest').addEventListener('click',addQuestion);
          
      //   }
      // }

      // function checkInput()
      // {
      //   if(this.value.length>20)
      //     { 
      //       this.style.boxShadow='inset 0px 0px 10px 2px rgba(138, 209, 128, 0.5)';
      //       validQuest=1;
      //     } else 
      //     {
      //       validQuest=0; 
      //       this.style.boxShadow='inset 0px 0px 10px 2px rgba(105, 44, 44, 0.5)';
      //     }
      // }
      // function removeQuestion()
      // {
      //   var k=1;
      //   questionCounter--;
      //   document.getElementById('questionContainer'+this.id.charAt(this.id.length-1)).remove();
      //   for(var j=0;j<questionNum+1;j++)
      //   {
      //     if(document.getElementById('questionContainer'+j.toString())!=null)
      //     {
      //       document.getElementById('questionLabel'+j.toString()).innerText='Question Number '+k.toString()+' : ';
      //       k++;
      //     }
      //   }

      // }
      // function checkAnswer()
      // {
      //   if(this.value.trim().length!=0)
      //     { 
      //       this.style.boxShadow='inset 0px 0px 10px 2px rgba(138, 209, 128, 0.5)';
      //       validAnswer[this.id[parseInt(this.id.length-1)]]=1;
      //     } else 
      //     {
      //       validAnswer[this.id[parseInt(this.id.length-1)]]=0; 
      //       this.style.boxShadow='inset 0px 0px 10px 2px rgba(105, 44, 44, 0.5)';
      //     }
         
      // }
      
      // function submitAll(e)
      // {
      //   var errorMessage='';
      //   var answers=[];
      //   var quest='';
      //   var correctAns=[];
      //   var l=1;
        
        
      //   e.preventDefault();
        
      //   for(var i=1;i<questionNum+1;i++)
      //   {
      //     if(document.getElementById('questionContainer'+i.toString())!=null)
      //     {
            
      //       quest=document.getElementById('question'+i.toString());
      //       answers[0]=document.getElementById('answer'+i.toString()+'0');
      //       answers[1]=document.getElementById('answer'+i.toString()+'1');
      //       answers[2]=document.getElementById('answer'+i.toString()+'2');
      //       correctAns[0]=document.getElementById('correctAnswer'+i.toString()+'0').checked;
      //       correctAns[1]=document.getElementById('correctAnswer'+i.toString()+'1').checked;
      //       correctAns[2]=document.getElementById('correctAnswer'+i.toString()+'2').checked;
      //       if(quest.value.trim().length<20) 
      //       {
      //         quest.style.boxShadow='inset 0px 0px 10px 2px rgba(105, 44, 44, 0.5)';
      //         errorMessage='Question Number '+l.toString()+' must  be at least 20 characters long!';
      //         break;
      //       } else {
      //         quest.style.boxShadow='inset 0px 0px 10px 2px rgba(138, 209, 128, 0.5)';
      //         if(answers[0].value.trim()=='' || answers[1].value.trim()=='' || answers[2].value.trim()=='')
      //         {
      //           if(answers[0].value.trim()=='') answers[0].style.boxShadow='inset 0px 0px 10px 2px rgba(105, 44, 44, 0.5)'; else answers[0].style.boxShadow='inset 0px 0px 10px 2px rgba(138, 209, 128, 0.5)';
      //           if(answers[1].value.trim()=='') answers[1].style.boxShadow='inset 0px 0px 10px 2px rgba(105, 44, 44, 0.5)'; else answers[1].style.boxShadow='inset 0px 0px 10px 2px rgba(138, 209, 128, 0.5)';
      //           if(answers[2].value.trim()=='') answers[2].style.boxShadow='inset 0px 0px 10px 2px rgba(105, 44, 44, 0.5)'; else answers[2].style.boxShadow='inset 0px 0px 10px 2px rgba(138, 209, 128, 0.5)';
      //           errorMessage="All question Number "+l.toString()+"'s answers must not be emtpy!";
      //           break;
      //         }else{
      //           if(correctAns[0]==false && correctAns[1]==false && correctAns[2]==false)
      //           {
      //             errorMessage='You should select the correct answer of Question Num '+l.toString()+'!';
      //             break;
      //           }else errorMessage='';
      //       }
      //     }
      //       l++;
      //     }
      //     else continue;
      //   }

      //   if(errorMessage!='')
      //   {
      //     var error;
      //     if(document.getElementById('error')==null)
      //     {
      //     error=document.createElement('p');
      //     error.innerText=errorMessage;
      //     error.id='error';
      //     error.style.color='rgba(200, 44, 44, 0.9)';
      //     error.style.fontWeight='bold';
      //     error.style.fontSize='18px';

      //     document.getElementById('sheesh').appendChild(error);
      //     } else document.getElementById('error').innerText=errorMessage;
          
      //   }else 
      //   {
      //     if(document.getElementById('error')!=null)
      //       document.getElementById('error').innerText='';
      //       if(l>1) 
      //       {
              
      //         var jsonStr='['
      //         for(var i=1;i<questionNum+1;i++)
      //         {
      //           if(document.getElementById('questionContainer'+i.toString())!=null)
      //           {
      //             quest=document.getElementById('question'+i.toString());
      //             answers[0]=document.getElementById('answer'+i.toString()+'0');
      //             answers[1]=document.getElementById('answer'+i.toString()+'1');
      //             answers[2]=document.getElementById('answer'+i.toString()+'2');
      //             correctAns[0]=document.getElementById('correctAnswer'+i.toString()+'0').checked;
      //             correctAns[1]=document.getElementById('correctAnswer'+i.toString()+'1').checked;
      //             correctAns[2]=document.getElementById('correctAnswer'+i.toString()+'2').checked;
      //             //date=document.getElementById('date'+i.toString());
      //             var correctAnswer;
      //             if(correctAns[0]) correctAnswer=answers[0].value;
      //             if(correctAns[1]) correctAnswer=answers[1].value;
      //             if(correctAns[2]) correctAnswer=answers[2].value;
      //             jsonStr+='{"question":"'+quest.value+'","answer1":"'+answers[0].value+'","answer2":"'+answers[1].value+'","answer3":"'+answers[2].value+'","correctAnswer":"'+correctAnswer+'"},';
      //             alert(jsonStr);
      //           }
      //         }
      //       }
      //       // var fReader = new FileReader();
      //       // var img;
      //       // fReader.readAsDataURL(image.files[0]);
      //       // fReader.onloadend = function(event){
      //       // img=event.target.result;
      //       // }
      //       jsonStr=jsonStr.slice(0,-1);
      //       jsonStr+=']';
      //       try
      //       {
      //         xhr = new XMLHttpRequest();
      //         xhr.open("POST","../controller/addCompetition.php");
      //         xhr.setRequestHeader("Content-Type","application/json");
      //         xhr.send(jsonStr);
              
              
      //         document.getElementById('sheesh').innerText="Competition Has Been Added!";
      //         resetAll();
      //         start();
      //       }catch(e){alert("sth went wrong");}
      //   }
      // }
      // function viewCompetitions()
      // {
      //   document.getElementById('view').remove();
      //   document.getElementById('create').remove();
      //   var xhr3= new XMLHttpRequest();
      //   xhr3.open('GET',"../controller/viewAllCompetitionsBE.php",true);
      //   xhr3.onload=function()
      //   {
          
      //     if(this.status==200)
      //     {
      //       document.getElementById('sheesh').innerHTML=this.responseText;
      //     }
      //   }
        
      //   xhr3.send();
      // }
      

    </script>
</body>


</html>