<?php
session_start();
if(!isset($_SESSION['username']))
{

    $_SESSION['msg']="You must log in first to view this page";
    header("location : login1.php");
}

if(isset($_GET['logout']))
{
      
   
    unset($_SESSION['username']);
    session_destroy();
    header("location: login1.php");
}

?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" content="width=device-width, initial-scale=1" name="viewport"/>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
<script src= "main.js"></script>


    <style>


      /* Profile container */
        .profile {
            margin: 20px 0;
        }

        /* Profile sidebar */
        .profile-sidebar {
            padding: 20px 0 10px 0;
            background: #fff;
        }

        .profile-userpic img {
            float: none;
            margin: 0 auto;
            width: 50%;
            height: 50%;
            -webkit-border-radius: 50% !important;
            -moz-border-radius: 50% !important;
            border-radius: 50% !important;
        }

        .profile-usertitle {
            text-align: center;
            margin-top: 20px;
        }

        .profile-usertitle-name {
            color: #5a7391;
            font-size: 16px;
            font-weight: 600;
            margin-bottom: 7px;
        }

        .profile-usertitle-job {
            text-transform: uppercase;
            color: #5b9bd1;
            font-size: 12px;
            font-weight: 600;
            margin-bottom: 15px;
        }

        .profile-userbuttons {
            text-align: center;
            margin-top: 10px;
        }

        .profile-userbuttons .btn {
            text-transform: uppercase;
            font-size: 11px;
            font-weight: 600;
            padding: 6px 15px;
            margin-right: 5px;
        }

        .profile-userbuttons .btn:last-child {
            margin-right: 0px;
        }

        .profile-usermenu {
            margin-top: 30px;
        }

        .profile-usermenu ul li {
            border-bottom: 1px solid #f0f4f7;
        }

        .profile-usermenu ul li:last-child {
            border-bottom: none;
        }

        .profile-usermenu ul li a {
            color: #93a3b5;
            font-size: 14px;
            font-weight: 400;
        }

        .profile-usermenu ul li a i {
            margin-right: 8px;
            font-size: 14px;
        }

        .profile-usermenu ul li a:hover {
            background-color: #fafcfd;
            color: #5b9bd1;
        }

        .profile-usermenu ul li.active {
            border-bottom: none;
        }

        .profile-usermenu ul li.active a {
            color: #5b9bd1;
            background-color: #f6f9fb;
            border-left: 2px solid #5b9bd1;
            margin-left: -2px;
        }

        /* Profile Content */
        .profile-content {
            padding: 20px;
            background: #fff;
            min-height: 460px;
        }
    </style>

    <script>
    function removef(movieId)
{
   
    $.ajax({
       url:"remove.php",
       method:"post",
       data:{Id:movieId},
       success: function(res){
           console.log(res);
       }
    })  

     console.log(movieId);
   

}
function watchf(movieId)
{
   
    $.ajax({
       url:"watch.php",
       method:"post",
       data:{Id:movieId},
       success: function(res){
           console.log(res);
       }
    })  

     console.log(movieId);
   

}
function notwatchf(movieId)
{
   
    $.ajax({
       url:"awatch.php",
       method:"post",
       data:{Id:movieId},
       success: function(res){
           console.log(res);
       }
    })  

     console.log(movieId);
   

}

function aprivatef()
{
    
    $.ajax({
       url:"aprivate.php",
       method:"post",
       
       success: function(res){
           console.log(res);
       }
    })  

}



</script>
<title>Home Page</title>
</head>
  <body>

   <?php if(isset($_SESSION['username'])) : ?>
  
     <?php endif ?>
      <form class="formx" method="post">

          <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
              <!-- Navbar content -->
              <a class="navbar-brand" href="index.php">Nithin Movies</a>
              <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarNav">
                  <ul class="navbar-nav">
                      <li class="nav-item active">
                          <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>

                      <li>
                          <div class="col-sm-6">
                              <?php if(isset($_SESSION['username'])) : ?>
                              <input type="text" placeholder="Search Movies...." id='search' style=" height: 40px; width: 200px;"onkeyup="showResult(this.value)"
                          </div>
                      <li>
                          <button  style = " float: right;"class="btn btn-primary" onclick="getPosts();" type="button" id='search1'>search</button>
                          <?php endif ?>
                      </li>
                      </li>

                      <li class="nav-item" style="float: right

">
                          <a class="nav-link" href="logout.php">Logout</a>
                      </li>

                  </ul>
              </div>
          </nav>
          <div class="container">
              <div  style="margin-left: 0px; " class="row" align="left">

                  <div  style= "overflow: no-display; border: 1px solid black; margin-left: 0px;" >
                      <div style="margin-left: 40%; overflow: hidden; background-color: white;" >
                          <div align="left">
                              <!-- SIDEBAR USERPIC -->
                              <div  class="profile-userpic"  style="width: 300px; height: 350px; margin-left:0px; margin-top: 5%; overflow: hidden;">
                                  <img src="https://cdn3.iconfinder.com/data/icons/business-round-flat-vol-1-1/36/user_account_profile_avatar_person_student_male-512.png" class="img-responsive" alt="">
                              </div>
                              <div class="name"><p><?php echo $_SESSION['username']; ?></p></div>
                              <!-- END SIDEBAR USERPIC -->
                              <!-- SIDEBAR USER TITLE -->
                          </div>

                          <li class="active"><a href="profile.php">Favourite</a></li>
                          <br>
                          <br>

                      </div>

                      </ul>
              <div class="row">
                  <div class="col">

              </div>
              </div>
                  </div>
				<!-- END MENU -->

<center>

</center>
<br>
<br>





          <?php
          $usernamed= $_SESSION['username'];
          $db= mysqli_connect('localhost','root','', 'movie')or die("could not connect database..");
          $sql="SELECT DISTINCT favouritesid, status  FROM `$usernamed` WHERE NOT favouritesid ='NULL';";
          $result=mysqli_query($db, $sql);
          echo "<div class=\"col-6\">
                     ";?>
          <?php while($row=mysqli_fetch_array($result)):?>
              <?php   $id=$row['favouritesid'];
              $url='http://www.omdbapi.com/?i='.$id.'&apikey=adc9f2be';
              $api_json= file_get_contents($url);
              $api_array=json_decode($api_json,true);

              $poster=$api_array['Poster'];
              $Title=$api_array['Title'];
              $status=$row['status'];?>
              <?php
              if($status=='WATCHED')
              {
                  echo"<br><div class='backa'>
           <div class='col-sm-4'>
           <img src='$poster' class='thumbnail'/>
       </div>
   <div class='col-sm-8'>
   
   <h4>$Title</h4>
";
                  ?><div>
                  <button  type='submit' onclick = "watchf('<?php echo $id ?>');"  class='btn btn-success'>WATCHED &#9989</button>
                  <button  type='submit' onclick = "notwatchf('<?php echo $id ?>');" class='btn btn-primary'>NEED TO WATCH</button>
                  <?php
                  echo "<div class='sot'>";
                  ?>
                  <button  type='submit' onclick = "removef('<?php echo $id ?>');" class='btn btn-danger'> REMOVE FROM FAVOURITES </button>
                  <?php
                  echo "</div>

</div>
</div>
</div>";

              }
              ?>
              <?php
              if($status=='NEED TO WATCH')
              {
              echo"<br><div class='backa'>
           <div class='col-sm-4'>
           <img src='$poster' class='thumbnail'/>
       </div>
   <div class='col-sm-8'>
   
   <h4>$Title</h4>
";
              ?><div>
                          <button  type='submit' onclick = "watchf('<?php echo $id ?>');"  class='btn btn-success'>WATCHED</button>
                          <button  type='submit' onclick = "notwatchf('<?php echo $id ?>');" class='btn btn-primary'>NEED TO WATCH &#9989 </button>
                          <?php
                          echo "<div class='sot'>";
                          ?>
                          <button  type='submit' onclick = "removef('<?php echo $id ?>');" class='btn btn-danger'> REMOVE FROM FAVOURITES </button>
                          <?php
                          echo "</div>

</div>
</div>
</div>";

              }
              ?>
              <?php
              if($status!='NEED TO WATCH'&& $status!='WATCHED')
              {
              echo"<br><div class='backa'>
           <div class='col-sm-4'>
           <img src='$poster' class='thumbnail'/>
       </div>
   <div class='col-sm-8'>
   
   <h4>$Title</h4>
";
              ?><div>
                              <button  type='submit' onclick = "watchf('<?php echo $id ?>');"  class='btn btn-success'>WATCHED &#9989</button>
                              <button  type='submit' onclick = "notwatchf('<?php echo $id ?>');" class='btn btn-primary'>NEED TO WATCH</button>
                              <?php
                              echo "<div class='sot'>";
                              ?>
                              <button  type='submit' onclick = "removef('<?php echo $id ?>');" class='btn btn-danger'> REMOVE FROM FAVOURITES </button>
                              <?php
                              echo "</div>

</div>
</div>
</div>";

              }
              ?>
          <?php endwhile;?>

          </div>
                          <div style="width: 400px;" class="col">
                              <div style="width: 200px;" class="backab">
                  <h1>ACTIVITY</h1>
                  <?php
                  $usernamed= $_SESSION['username'];
                  $db= mysqli_connect('localhost','root','', 'movie')or die("could not connect database..");
                  $sql="SELECT DISTINCT users, act FROM activites WHERE users='$usernamed' ";
                  $resultf=mysqli_query($db, $sql);

                  if($resultf)
                  {   $rowv=mysqli_fetch_array($resultf);
                      $act=$rowv['act'];


                  }?>
                  <ul class="list-group" >

                      <?php
                      $usernamed= $_SESSION['username'];
                      $i=0;
                      $name=$usernamed.$i;
                      $db= mysqli_connect('localhost','root','', 'movie')or die("could not connect database..");
                      $sql="SELECT  * FROM `$name` ORDER BY `time` DESC ;";
                      $result=mysqli_query($db, $sql);
                      ?>
                      <?php while($rows=mysqli_fetch_array($result)):?>
                          <?php
                          $msg= $rows['message'];
                          $date=$rows['time'];

                          ?>

                          <li class="list-group-item"><strong><?php echo $date." "; ?></strong><?php echo $msg;?> </li>
                      <?php endwhile; ?>
                  </ul>
              </div>
                          </div>
                      </div>
                      </div>


 </form>
  </body>
</html>
