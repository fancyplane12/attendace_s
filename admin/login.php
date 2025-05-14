<?php require_once 'core/dbConfig.php'; ?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Admin Login</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <style>
      body {
        font-family: 'Poppins', sans-serif;
        background-image: url("photos/admin.jpg");
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
        height: 100vh;
        margin: 0;
        padding: 0;
        overflow: hidden;
      }
      .login-container {
        max-width: 500px;
        margin: 100px auto;
        background-color: rgba(255, 255, 255, 0.9);
        backdrop-filter: blur(10px);
        border-radius: 15px;
        box-shadow: 0 8px 32px rgba(0, 0, 0, 0.1);
      }
      .login-header {
        background-color: rgba(248, 249, 250, 0.8);
        padding: 30px;
        border-bottom: 1px solid rgba(233, 236, 239, 0.5);
        border-top-left-radius: 15px;
        border-top-right-radius: 15px;
      }
      .login-header h2 {
        margin: 0;
        color: #2c3e50;
        font-weight: 600;
      }
      .login-body {
        padding: 30px;
      }
      .login-footer {
        padding: 20px 30px;
        text-align: right;
        border-top: 1px solid rgba(233, 236, 239, 0.5);
      }
      .form-control {
        background-color: rgba(255, 255, 255, 0.9);
        border: 1px solid rgba(0, 0, 0, 0.1);
        border-radius: 10px;
        padding: 12px;
      }
      .form-control:focus {
        box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.25);
      }
      .btn-primary {
        padding: 12px 30px;
        border-radius: 10px;
        background-color: #007bff;
        border: none;
        transition: all 0.3s ease;
      }
      .btn-primary:hover {
        background-color: #0056b3;
        transform: translateY(-2px);
      }
      .alert {
        border-radius: 10px;
        margin-bottom: 20px;
      }
    </style>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
  </head>
  <body>
    <div class="container">
      <div class="login-container">
        <div class="login-header">
          <h2>Welcome to Admin Dashboard</h2>
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