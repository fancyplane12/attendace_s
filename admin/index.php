<?php 
require_once 'core/dbConfig.php'; 
require_once 'core/models.php';

if (!isset($_SESSION['username'])) {
  header("Location: login.php");
}

if ($_SESSION['is_admin'] == 0) {
  header("Location: ../employees/index.php");
}
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <style>
      body {
        font-family: 'Poppins', sans-serif;
        background-color: #f8f9fa;
      }
      .welcome-section {
        background: linear-gradient(135deg, #007bff, #00bcd4);
        color: white;
        padding: 40px 0;
        margin-bottom: 30px;
        border-radius: 0 0 20px 20px;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
      }
      .stat-card {
        background: white;
        border-radius: 15px;
        padding: 25px;
        margin-bottom: 20px;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.05);
        transition: transform 0.3s ease;
      }
      .stat-card:hover {
        transform: translateY(-5px);
      }
      .stat-icon {
        font-size: 2.5rem;
        margin-bottom: 15px;
        color: #007bff;
      }
      .stat-title {
        font-size: 1.1rem;
        color: #6c757d;
        margin-bottom: 10px;
      }
      .stat-value {
        font-size: 1.8rem;
        font-weight: 600;
        color: #2c3e50;
      }
      .quick-actions {
        margin-top: 30px;
      }
      .action-btn {
        padding: 15px 25px;
        border-radius: 10px;
        font-weight: 500;
        transition: all 0.3s ease;
      }
      .action-btn:hover {
        transform: translateY(-2px);
      }
    </style>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
  </head>
  <body>
    <?php include 'includes/navbar.php'; ?>
    
    <div class="welcome-section">
      <div class="container">
        <h1>Welcome, <?php echo $_SESSION['username']; ?>!</h1>
        <p class="lead">Manage your organization's attendance system efficiently</p>
      </div>
    </div>

    <div class="container">
      <div class="row">
        <div class="col-md-4">
          <div class="stat-card">
            <i class="fas fa-users stat-icon"></i>
            <div class="stat-title">Total Employees</div>
            <div class="stat-value">
              <?php 
                $stmt = $pdo->query("SELECT COUNT(*) as count FROM attendance_system_users WHERE is_admin = 0");
                echo $stmt->fetch()['count'];
              ?>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="stat-card">
            <i class="fas fa-clock stat-icon"></i>
            <div class="stat-title">Today's Attendance</div>
            <div class="stat-value">
              <?php 
                $stmt = $pdo->prepare("SELECT COUNT(DISTINCT user_id) as count FROM attendance_records WHERE date_added = CURDATE()");
                $stmt->execute();
                echo $stmt->fetch()['count'];
              ?>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="stat-card">
            <i class="fas fa-calendar-alt stat-icon"></i>
            <div class="stat-title">Pending Leaves</div>
            <div class="stat-value">
              <?php 
                $stmt = $pdo->query("SELECT COUNT(*) as count FROM leaves WHERE status = 'Pending'");
                echo $stmt->fetch()['count'];
              ?>
            </div>
          </div>
        </div>
      </div>

      <div class="quick-actions">
        <h2 class="mb-4">Quick Actions</h2>
        <div class="row">
          <div class="col-md-4">
            <a href="all_attendances.php" class="btn btn-primary btn-block action-btn">
              <i class="fas fa-list-alt mr-2"></i>View Attendances
            </a>
          </div>
          <div class="col-md-4">
            <a href="leaves.php" class="btn btn-info btn-block action-btn">
              <i class="fas fa-calendar-check mr-2"></i>Manage Leaves
            </a>
          </div>
          <div class="col-md-4">
            <a href="all_users.php" class="btn btn-success btn-block action-btn">
              <i class="fas fa-user-plus mr-2"></i>View Employees
            </a>
          </div>
        </div>
      </div>
    </div>

    <?php include 'includes/footer.php'; ?>
  </body>
</html>