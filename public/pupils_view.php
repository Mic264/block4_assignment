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

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["pupilid"])) {
    $pupilID = $_POST["pupilid"];

    try {
        $pdo->beginTransaction();  // Start the transaction

        $sql = "SELECT * FROM pupils WHERE id = :pupilID";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':pupilID', $pupilID);
        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        $address_id = $row['address_id'];
        $p1_guardian_id = $row['parent_one'];
        $p2_guardian_id = $row['parent_two'];

        // Prepare the DELETE query to remove the pupil by its ID
        $query4 = "DELETE FROM pupils WHERE id = :pupilID";
        $stmt4 = $pdo->prepare($query4);
        $stmt4->bindParam(':pupilID', $pupilID);
        $stmt4->execute();

        // Prepare the DELETE query to remove the pupil parent/guardian one
        $query2 = "DELETE FROM parent_guardians WHERE id = :guardianID";
        $stmt2 = $pdo->prepare($query2);
        $stmt2->bindParam(':guardianID', $p1_guardian_id);
        $stmt2->execute();

        // Prepare the DELETE query to remove the pupil parent/guardian two
        $query3 = "DELETE FROM parent_guardians WHERE id = :guardianID";
        $stmt3 = $pdo->prepare($query3);
        $stmt3->bindParam(':guardianID', $p2_guardian_id);
        $stmt3->execute();

        // Prepare the DELETE query to remove the pupil address
        $query1 = "DELETE FROM addresses WHERE id = :addressID";
        $stmt1 = $pdo->prepare($query1);
        $stmt1->bindParam(':addressID', $address_id);
        $stmt1->execute();

        $pdo->commit();  // Commit the transaction

        alert("Pupil deleted successfully");
    } catch (PDOException $e) {
        // If an error occurs, roll back the transaction to maintain data integrity
        $pdo->rollBack();
        alert("Error deleting pupil: " . $e->getMessage());
    }
}

CloseCon();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8"> <!-- Set character encoding to UTF-8 -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> <!-- Ensure the page is mobile-friendly -->
    <title>St Alphonsus Primary School</title> <!-- Title of the web page -->
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

    <h2>Pupils</h2>
    <table border="1">
        <tr>
            <th>pupil_id</th> <!-- Table header for pupil_id -->
            <th>first_name</th> <!-- Table header for first_name -->
            <th>last_name</th> <!-- Table header for last_name -->
            <th>address_id</th> <!-- Table header for address_id -->
            <th>medical_information</th> <!-- Table header for medical_information -->
            <th>class_name</th> <!-- Table header for class_name -->
            <th>birth_date</th> <!-- Table header for birth_date -->
            <th>sex</th> <!-- Table header for sex -->
            <th>pupil_email</th> <!-- Table header for pupil_email -->
            <th>pupil_ID</th> <!-- Table header for pupil_ID -->
            <th>parent_one</th> <!-- Table header for parent_one -->
            <th>parent_two</th> <!-- Table header for parent_two -->
            <th>contact_number</th> <!-- Table header for contact_number -->
            <th>created_at</th> <!-- Table header for created_at -->
            <th>updated_at</th> <!-- Table header for updated_at -->
            <th>actions</th> <!-- Table header for actions e.g. delete -->
        </tr>
        <?php    
        // Fetch all pupils from the database ordered by pupil_id
        $sql = "SELECT * FROM pupils ORDER BY id";
        $stmt = $pdo->query($sql);  // Execute the query

        // Loop through the results and display them in the table
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            echo "<tr>
            <td>" . htmlspecialchars($row['id']) . "</td>  <!-- Display pupil_id -->
            <td>" . htmlspecialchars($row['first_name']) . "</td>  <!-- Display first_name -->
            <td>" . htmlspecialchars($row['last_name']) . "</td>  <!-- Display last_name -->
            <td>" . htmlspecialchars($row['address_id']) . "</td>  <!-- Display address_id -->
            <td>" . htmlspecialchars($row['medical_information']) . "</td>  <!-- Display medical_information -->
            <td>" . htmlspecialchars($row['class_name']) . "</td>  <!-- Display class_name -->
            <td>" . htmlspecialchars($row['birth_date']) . "</td>  <!-- Display birth_date -->
            <td>" . htmlspecialchars($row['sex']) . "</td>  <!-- Display sex -->
            <td>" . htmlspecialchars($row['pupil_email']) . "</td>  <!-- Display pupil_email -->
            <td>" . htmlspecialchars($row['pupil_ID']) . "</td>  <!-- Display pupil_ID -->
            <td>" . htmlspecialchars($row['parent_one']) . "</td>  <!-- Display parent_one -->
            <td>" . htmlspecialchars($row['parent_two']) . "</td>  <!-- Display parent_two -->
            <td>" . htmlspecialchars($row['contact_number']) . "</td>  <!-- Display contact_number -->
            <td>" . htmlspecialchars($row['created_at']) . "</td>  <!-- Display created_at -->
            <td>" . htmlspecialchars($row['updated_at']) . "</td>  <!-- Display updated_at -->
            <td>
                <!-- Delete button form for each pupil -->
                <form method='POST'>
                    <input type='hidden' name='pupilid' value='" . htmlspecialchars($row['id']) . "' />
                    <input type='submit' onclick='return confirm(\"This pupil will be permanently deleted and cannot be recovered. Are you sure?\")' value='Delete' />
                </form>
            </td>
            </tr>";
        }
        ?>
    </table>

</body>

</html>