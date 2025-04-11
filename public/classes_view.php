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

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["classid"]))
    {
        $classID = $_POST["classid"];
        // Prepare the DELETE query to remove the class by its ID
        $query = "DELETE FROM classes WHERE id = :classID";
        $stmt = $pdo->prepare($query);
        $stmt->bindParam(':classID', $classID, PDO::PARAM_INT);

        // Execute the query and check if it was successful
        if ($stmt->execute()) {
            alert("Class deleted successfully");
        } else {
            alert("Delete failed");
        }
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

    <h2>Classes</h2>

    <table border="1">
    <tr>
        <th>id</th>  <!-- Table header for class ID -->
        <th>class</th>  <!-- Table header for class -->
        <th>class_name</th>  <!-- Table header for class_name -->
        <th>building</th>  <!-- Table header for building -->
        <th>capacity</th>  <!-- Table header for capacity -->
        <th>current_capacity</th>  <!-- Table header for current_capacity -->
        <th>teacher_id</th>  <!-- Table header for teacher_id -->
        <th>created_at</th>  <!-- Table header for created_at -->
        <th>updated_at</th>  <!-- Table header for updated_at -->
        <th>actions</th>  <!-- Table header for actions e.g. delete -->
    </tr>
    <?php
    // Fetch all classes from the database ordered by class ID
    $sql = "SELECT * FROM classes ORDER BY id";
    $stmt = $pdo->query($sql);  // Execute the query

    // Loop through the results and display them in the table
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        echo "<tr>
                <td>" . htmlspecialchars($row['id']) . "</td>  <!-- Display class ID -->
                <td>" . htmlspecialchars($row['class']) . "</td>  <!-- Display class -->
                <td>" . htmlspecialchars($row['class_name']) . "</td>  <!-- Display class_name -->
                <td>" . htmlspecialchars($row['building']) . "</td>  <!-- Display building -->
                <td>" . htmlspecialchars($row['capacity']) . "</td>  <!-- Display capacity -->
                <td>" . htmlspecialchars($row['current_capacity']) . "</td>  <!-- Display current_capacity -->
                <td>" . htmlspecialchars($row['teacher_id']) . "</td>  <!-- Display teacher_id -->
                <td>" . htmlspecialchars($row['created_at']) . "</td>  <!-- Display created_at -->
                <td>" . htmlspecialchars($row['updated_at']) . "</td>  <!-- Display updated_at -->
                <td>
                    <!-- Delete button form for each class -->
                    <form method='POST'>
                        <input type='hidden' name='classid' value='" . htmlspecialchars($row['id']) . "' />
                        <input type='submit' onclick='return confirm(\"This class will be permanently deleted and cannot be recovered. Are you sure?\")' value='Delete' />
                    </form>
                </td>
              </tr>";
    }
    ?>
    </table>


</body>
</html>
