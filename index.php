<?php
require_once("connect.php");
session_start();
if(isset($_SESSION['username'])){
    $username=$_SESSION['username'];
     $query="select fullname from users where username='$username'";
    $result=mysqli_query($connect , $query);
    $row = mysqli_fetch_array($result);
    $name = $row['fullname'];
    }

else
    header('Location:login.php');

?>
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link src="http://www.omdbapi.com/?i=tt3896198&apikey=d7d5aafc">
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">


    </head>


<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

<script src= "main.js"></script>
<script>

    movieshome();
    serieshome();
</script>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <!-- Navbar content -->
        <a class="navbar-brand" href="#">Nithin Movies</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
                </li>

                <div align="right" class="nav-item">
                    <a class="nav-link" <?php echo'href="profile.php?username='.$username.'">Profile</a>'?>
                </div>

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


    <br>
    <br><br>
<div style="margin-left: 10%" id="contain">
    <div id="output" class="row">
        <div class="row">
            <div class="movieshome">
                <h1><u>Movies</u></h1>
            </div></div>
        <div id="output1" class="row"></div><br>
        <br><br>
        <div class="row">
            <div class="movieshome">
                <h1>Series</h1>
            </div></div>
        <br><br>
        <div id="output2" class="row"></div>

    </div>

</div>

</body>
</html>

