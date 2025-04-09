<?php

include '../scr/php/db_connection.php';  // Include the database connection file

try {
    // Attempt to establish a connection to the database using PDO (PHP Data Objects)
    $pdo = OpenCon();  // Call the OpenCon function to get the connection object
} catch (PDOException $e) {
    // If the connection fails, display an error message
    echo "Connection failed: " . $e->getMessage();
    exit();  // Stop further script execution if the connection fails
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["teacherid"]))
    {
        $teacherID = $_POST["teacherid"];
        // Prepare the DELETE query to remove the teacher by its ID
        $query = "DELETE FROM teachers WHERE id = :teacherID";
        $stmt = $pdo->prepare($query);
        $stmt->bindParam(':teacherID', $teacherID, PDO::PARAM_INT);

        // Execute the query and check if it was successful
        if ($stmt->execute()) {
            echo("Teacher deleted successfully");
        } else {
            echo("Delete failed");
        }
    }

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
        <button>Pupil</button>
        <div class="dropdown-content">
            <a href="pupils_add.php">Add</a>
            <a href="pupils_view.php">View All</a>
        </div>
    </div>

    <div class="dropdown">
        <button>Parent</button>
        <div class="dropdown-content">
            <a href="parent_guardians_add.php">Add</a>
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

    <h2>Teachers</h2>
    
    <table border="1">
    <tr>
        <th>teacher_id</th>  <!-- Table header for teacher_id -->
        <th>first_name</th>  <!-- Table header for first_name -->
        <th>last_name</th>  <!-- Table header for last_name -->
        <th>address_id</th>  <!-- Table header for address_id -->
        <th>teacher_email</th>  <!-- Table header for teacher_email -->
        <th>teacher_telephone</th>  <!-- Table header for teacher_telephone -->
        <th>annual_salary</th>  <!-- Table header for annual_salary -->
        <th>background_check</th>  <!-- Table header for background_check -->
        <th>class</th>  <!-- Table header for class -->
        <th>birth_date</th>  <!-- Table header for birth_date -->
        <th>sex</th>  <!-- Table header for sex -->
        <th>working_hours</th>  <!-- Table header for working_hours -->
        <th>educational_qualifications</th>  <!-- Table header for educational_qualifications -->
        <th>actions</th>  <!-- Table header for actions e.g. delete -->
    </tr>
    <?php
    // Fetch all teachers from the database ordered by teacher_id
    $sql = "SELECT * FROM teachers ORDER BY id";
    $stmt = $pdo->query($sql);  // Execute the query

    // Loop through the results and display them in the table
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        echo "<tr>
                <td>" . htmlspecialchars($row['id']) . "</td>  <!-- Display teacher_id -->
                <td>" . htmlspecialchars($row['first_name']) . "</td>  <!-- Display first_name -->
                <td>" . htmlspecialchars($row['last_name']) . "</td>  <!-- Display last_name -->
                <td>" . htmlspecialchars($row['address_id']) . "</td>  <!-- Display address_id -->
                <td>" . htmlspecialchars($row['teacher_email']) . "</td>  <!-- Display teacher_email -->
                <td>" . htmlspecialchars($row['teacher_telephone']) . "</td>  <!-- Display teacher_telephone -->
                <td>" . htmlspecialchars($row['annual_salary']) . "</td>  <!-- Display annual_salary -->
                <td>" . ($row['background_check'] ? 'Yes' : 'No') . "</td>  <!-- Display background_check -->
                <td>" . htmlspecialchars($row['class']) . "</td>  <!-- Display class -->
                <td>" . htmlspecialchars($row['birth_date']) . "</td>  <!-- Display birth_date -->
                <td>" . htmlspecialchars($row['sex']) . "</td>  <!-- Display sex -->
                <td>" . htmlspecialchars($row['working_hours']) . "</td>  <!-- Display working_hours -->
                <td>" . htmlspecialchars($row['educational_qualifications']) . "</td>  <!-- Display educational_qualifications -->
                <td>
                    <!-- Delete button form for each teacher -->
                    <form method='POST'>
                        <input type='hidden' name='teacherid' value='" . htmlspecialchars($row['id']) . "' />
                        <input type='submit' onclick='return confirm(\"This teacher will be permanently deleted and cannot be recovered. Are you sure?\")' value='Delete' />
                    </form>
                </td>
              </tr>";
    }
    ?>
</table>

</body>
</html>
