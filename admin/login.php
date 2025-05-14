<?php require_once 'core/dbConfig.php'; ?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <style>
      body {
        font-family: "Arial";
        background-image: url("photos/admin.jpg");
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
        height: 100vh;
        margin: 0;
        padding: 0;
        overflow: hidden;
      }
      html {
        height: 100%;
        margin: 0;
        padding: 0;
        overflow: hidden;
      }
      .login-container {
        max-width: 500px;
        margin: 100px auto;
        background-color: white;
        border-radius: 5px;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
      }
      .login-header {
        background-color: #f8f9fa;
        padding: 20px;
        border-bottom: 1px solid #e9ecef;
        border-top-left-radius: 5px;
        border-top-right-radius: 5px;
      }
      .login-body {
        padding: 20px;
      }
      .login-footer {
        padding: 15px 20px;
        text-align: right;
        border-top: 1px solid #e9ecef;
      }
    </style>
    <title>Admin Login</title>
  </head>
  <body>
    <div class="container">
      <div class="login-container">
        <div class="login-header">
          <h2>Welcome to Admin Dashboard! Login Now!</h2>
        </div>
        <form action="core/handleForms.php" method="POST">
          <div class="login-body">
            <?php  
            if (isset($_SESSION['message']) && isset($_SESSION['status'])) {
              if ($_SESSION['status'] == "200") {
                echo "<div class='alert alert-success'>{$_SESSION['message']}</div>";
              } else {
                echo "<div class='alert alert-danger'>{$_SESSION['message']}</div>"; 
              }
            }
            unset($_SESSION['message']);
            unset($_SESSION['status']);
            ?>
            <div class="form-group">
              <label for="username">Username</label>
              <input type="text" class="form-control" id="username" name="username" required>
            </div>
            <div class="form-group">
              <label for="password">Password</label>
              <input type="password" class="form-control" id="password" name="password" required>
            </div>
          </div>
          <div class="login-footer">
            <button type="submit" class="btn btn-primary" name="loginUserBtn">Login</button>
          </div>
        </form>
      </div>
    </div>
  </body>
</html>
