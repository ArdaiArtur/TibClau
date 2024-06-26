<!doctype html>
<html lang="en">
  <head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>

  <div >

    <section id="card" class="vh-100"  style=" background: linear-gradient(0deg, #0CBAA6 0%, #2779e2 100%);"> 
    <div class="mask d-flex align-items-center h-100 gradient-custom-3">
    <div class="container h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-12 col-md-9 col-lg-7 col-xl-6">
          <div class="card" style="border-radius: 15px;">
            <div class="card-body p-5">
                <h1 class="text-uppercase text-center mb-5">Login</h1> 
    <br>
    <form action="admstartsite.php" method="post">
        
    <div class="form-group">
      <label for="uid">UserName or Email:</label>
      <input type="text" class="form-control" id="uid" name="uid" placeholder="Name/Email...">
    </div>
    <div class="form-group">
      <label for="pwd">Password:</label>
      <input type="password" class="form-control" id="pwd" name="pwd" placeholder="Password...">
    </div>
        <div class="d-flex justify-content-center">
        <button type="submit" class="btn btn-info btn-lg mb-1 ":hover action="Mainpage.php" 
        name="submit">Login</button>
        </div>
        
         <div class="d-flex justify-content-center">
         <?php
       if(isset($_GET["error"])){
        if($_GET["error"]=="EmptyInput"){
            echo "<h4>Fill in all the fields!</h4>";
        }
        else if ($_GET["error"]=="WrongCredentials") {
            echo "<h4>Incorrect Username or Password</h4>";
        }
       }
      ?> 
      </div>
      </form>
      </div>
          </div>
        </div>
      </div>
    </div>
  </div>
      
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>