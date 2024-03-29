<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Lab 5 - Schools</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>
<body>
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <span class="navbar-brand mb-0 h1">Lab 5 - Schools</span>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" href="index.php">Home</a>
        </li>
        <li class="nav-item active">
          <a class="nav-link" href="login.php">Login</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="create_account.php">Create Account</a>
        </li>
      </ul>
    </div>
  </nav>
  <?php 
    session_start();
    include '../utils/isPostRequest.php';

    $feedback = "";
    if(isPostRequest()) {
      include '../utils/dbConnect.php';
      include '../utils/formValidation.php';
      
      $username = filter_input(INPUT_POST, 'username');
      
      if(isUserBool($username)) {
        include '../utils/dbUsers.php';
        $password = filter_input(INPUT_POST, 'userpassword');
        $result = loginUser($username, $password);
        if($result) {
          $_SESSION['authed'] = true;
          $_SESSION['user'] = $username;
          header("Location: ./authed/upload.php");
        } else {
          $feedback = "Error with your password.";
        }
      } else {
        $feedback = "Error with your username.";
      }
    } else {
      if(isset($_SESSION['authed']) && $_SESSION['authed']) {
        header('Location: ./authed/upload.php');
      }
    }

    
  ?>
  <div class="container col-md-6 mt-5">
    <form method="post">
      <div class="form-group col-md-8 m-auto">
        <label for="username">Username</label>
        <input type="text" class="form-control" id="username" name="username">
      </div>
      <div class="form-group col-md-8 m-auto">
        <label class="mt-3" for="userpassword">Password</label>
        <input type="password" class="form-control" id="userpassword" name="userpassword">
      </div>
      <div class="form-group col-md-8 m-auto">
        <button class="btn btn-primary mt-3" type="submit">Login</button>
      </div>
      <div class="col-md-8 m-auto"><?php echo $feedback ?></div>
    </form>
  </div>
</body>
</html>