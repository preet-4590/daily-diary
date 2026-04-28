<?php
session_start();
if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit();
}
?>

<link rel="stylesheet" href="style.css">

<div class="dashboard">

    <!-- Sidebar -->
    <div class="sidebar">
        <h3>Clerk Panel</h3>
        <a href="dashboard.php">Dashboard</a>
        <a href="add_student.php">Add Student</a>
        <a href="logout.php">Logout</a>
    </div>

    <!-- Main Content -->
    <div class="main-content">

        <!-- Header -->
        <div class="header">
            <h2>Welcome,
                <?php echo $_SESSION['user']; ?>
            </h2>
        </div>

        <!-- Cards -->
        <div class="cards">
            <div class="card">
                <h3>Total Students</h3>
                <h2>--</h2>
            </div>

            <div class="card">
                <h3>Today's Entries</h3>
                <h2>--</h2>
            </div>

        </div>

    </div>
</div>