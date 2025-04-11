<?php

include '../scr/php/db_connection.php';  // Include the database connection file
include '../scr/php/utils.php';  // Include the utilities file

try {
    // Attempt to establish a connection to the database using PDO (PHP Data Objects)
    $pdo = OpenCon();  // Call the OpenCon function to get the connection object
} catch (PDOException $e) {
    // If the connection fails, display an error message
    alert("Connection failed: " . $e->getMessage());
    exit();  // Stop further script execution if the connection fails
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

    <h2>Parents/guardians</h2>
    <table border="1">
    <tr>
        <th>parent_guardian_id</th>  <!-- Table header for parent_guardian_id -->
        <th>first_name</th>  <!-- Table header for first_name -->
        <th>last_name</th>  <!-- Table header for last_name -->
        <th>guardian_email</th>  <!-- Table header for guardian_email -->
        <th>guardian_telephone</th>  <!-- Table header for guardian_telephone -->
        <th>address_id</th>  <!-- Table header for address_id -->
        <th>created_at</th>  <!-- Table header for created_at -->
        <th>updated_at</th>  <!-- Table header for updated_at -->
    </tr>
    <?php
    // Fetch all parent guardians from the database ordered by parent_guardian_id
    $sql = "SELECT * FROM parent_guardians ORDER BY id";
    $stmt = $pdo->query($sql);  // Execute the query

    // Loop through the results and display them in the table
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        echo "<tr>
                <td>" . htmlspecialchars($row['id']) . "</td>  <!-- Display parent_guardian_id -->
                <td>" . htmlspecialchars($row['first_name']) . "</td>  <!-- Display first_name -->
                <td>" . htmlspecialchars($row['last_name']) . "</td>  <!-- Display last_name -->
                <td>" . htmlspecialchars($row['guardian_email']) . "</td>  <!-- Display guardian_email -->
                <td>" . htmlspecialchars($row['guardian_telephone']) . "</td>  <!-- Display guardian_telephone -->
                <td>" . htmlspecialchars($row['address_id']) . "</td>  <!-- Display address_id -->
                <td>" . htmlspecialchars($row['created_at']) . "</td>  <!-- Display created_at -->
                <td>" . htmlspecialchars($row['updated_at']) . "</td>  <!-- Display updated_at -->
              </tr>";
    }
    ?>
    </table>

</body>
</html>
