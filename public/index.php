<?php

include '../scr/php/db_connection.php';  // Include the database connection file

try {
    // Attempt to establish a connection to the database using PDO (PHP Data Objects)
    $pdo = OpenCon();  // Call the OpenCon function to get the connection object
} catch (PDOException $e) {
    // If the connection fails, display an error message
    echo "Connection failed: " . $e->getMessage();
    exit();  // Stop further execution if the connection fails
}

CloseCon();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">  <!-- Set character encoding to UTF-8 -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">  <!-- Ensure the page is mobile-friendly -->
    <title>St Alphonsus Primary School</title>  <!-- Title of the web page -->
    <link rel="canonical" href="https://getbootstrap.com/docs/5.3/examples/sign-in/">    

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@docsearch/css@3">

    <link href="../assets/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/style.css" rel="stylesheet">
</head>

 <div class="cover-container d-flex w-100 h-100 p-3 mx-auto flex-column">
  <header class="mb-auto">
      <h3 class="float-md-start mb-0">St Alphonsus Primary School</h3>
      <nav class="nav nav-masthead justify-content-center float-md-end">
    <div class="dropdown">
        <button>Home</button>
        <div class="dropdown-content">
            <a href="index.php">Return to home Page</a>
        </div>
    </div>
    <div class="dropdown">
        <button>Pupil</button>
        <div class="dropdown-content">
            <a href="pupils_add.php">Add</a>
            <a href="pupils_view.php">View All</a>
        </div>
    </div>

    <div class="dropdown">
        <button>Parent</button>
        <div class="dropdown-content">
            <a href="parent_guardians_view.php">View All</a>
        </div>
    </div>

    <div class="dropdown">
        <button>Teacher</button>
        <div class="dropdown-content">
            <a href="teachers_add.php">Add</a>
            <a href="teachers_view.php">View All</a>
        </div>
    </div>

    <div class="dropdown">
        <button>Class</button>
        <div class="dropdown-content">
            <a href="classes_add.php">Add</a>
            <a href="classes_view.php">View All</a>
        </div>
    </div>
  </header>

<body>
    <img src="../assets/brand/logo.png" alt="" width="72" height="57">
    <h1>Welcome to St Alphonsus Primary School management system</h1>

</body>
</html>
