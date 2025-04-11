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

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get form data
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $house_number = $_POST['house_number'];
    $street = $_POST['street'];
    $city = $_POST['city'];
    $postcode = $_POST['postcode'];
    $teacher_email = $_POST['teacher_email'];
    $teacher_telephone = $_POST['teacher_telephone'];
    $annual_salary = $_POST['annual_salary'];
    $background_check = isset($_POST['background_check']) ? 1 : 0; // Handle checkbox for background check
    $class = $_POST['class'];
    $birth_date = $_POST['birth_date'];
    $sex = $_POST['sex'];
    $working_hours = $_POST['working_hours'];
    $educational_qualifications = $_POST['educational_qualifications'];

    try {

        $pdo->beginTransaction();  // Start a transaction

        $sql = "INSERT INTO addresses (house_number, street, city, postcode) 
            VALUES (:house_number, :street, :city, :postcode)";
        
        $stmt = $pdo->prepare($sql);
        
        // Bind parameters
        $stmt->bindParam(':house_number', $house_number);
        $stmt->bindParam(':street', $street);
        $stmt->bindParam(':city', $city);
        $stmt->bindParam(':postcode', $postcode);

        // Execute the statement
        $stmt->execute();


        $sql2 = "SELECT * FROM addresses WHERE (house_number = :house_number AND street = :street AND postcode = :postcode)";

        $stmt2 = $pdo->prepare($sql2);
        $stmt2->bindParam(':house_number', $house_number);    
        $stmt2->bindParam(':street', $street);
        $stmt2->bindParam(':postcode', $postcode);

        $stmt2->execute();
        
        $row = $stmt2->fetch(PDO::FETCH_ASSOC);
        $address_id = $row['id'];

        // Insert into the teachers table

        $sql3 = "INSERT INTO teachers (first_name, last_name, address_id, teacher_email, teacher_telephone, annual_salary, background_check, class, birth_date, sex, working_hours, educational_qualifications)
                VALUES (:first_name, :last_name, :address_id, :teacher_email, :teacher_telephone, :annual_salary, :background_check, :class, :birth_date, :sex, :working_hours, :educational_qualifications)";
        
        $stmt3 = $pdo->prepare($sql3);
        
        // Bind parameters
        $stmt3->bindParam(':first_name', $first_name);
        $stmt3->bindParam(':last_name', $last_name);
        $stmt3->bindParam(':address_id', $address_id);
        $stmt3->bindParam(':teacher_email', $teacher_email);
        $stmt3->bindParam(':teacher_telephone', $teacher_telephone);
        $stmt3->bindParam(':annual_salary', $annual_salary);
        $stmt3->bindParam(':background_check', $background_check);
        $stmt3->bindParam(':class', $class);
        $stmt3->bindParam(':birth_date', $birth_date);
        $stmt3->bindParam(':sex', $sex);
        $stmt3->bindParam(':working_hours', $working_hours);
        $stmt3->bindParam(':educational_qualifications', $educational_qualifications);

        // Execute the statement
        $stmt3->execute();

        $pdo->commit();  // Commit the transaction

        alert("Teacher added successfully!");

    } catch (PDOException $e) {
      if ($pdo->inTransaction()) {
        $pdo->rollBack();  // Rollback the transaction if an error occurs
      }
        // Display an error message
        echo("Transaction failed. Error: " . $e->getMessage());
    }
}

$classes= [];
try {
    $stmt = $pdo->query("SELECT id, class_name AS class_name FROM classes");
    $classes = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    alert("Error fetching class year: " . $e->getMessage());
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
    <main class="form-signin w-100 m-auto">
    <div class="form-container">
      <form action="teachers_add.php" method="POST">
        <img class="mb-4" src="../assets/brand/logo.png" alt="" width="72" height="57">
        <h1 class="h3 mb-3 fw-normal">Add New Teacher</h1>
    
        <!-- First Name -->
        <div class="form-floating">
          <input type="text" class="form-control" id="first_name" name="first_name" placeholder="First Name" required>
          <label for="firstName">First Name</label>
        </div>
    
        <!-- Last Name -->
        <div class="form-floating">
          <input type="text" class="form-control" id="last_name" name="last_name" placeholder="Last Name" required>
          <label for="lastName">Last Name</label>
        </div>

        <!-- Teacher Email -->
        <div class="form-floating">
          <input type="text" class="form-control" id="teacher_email" name="teacher_email" placeholder="Teacher Email" required>
          <label for="teacherEmail">Teacher Email</label>
        </div>
    
        <!-- Teacher Telephone -->
        <div class="form-floating">
          <input type="tel" class="form-control" id="teacher_telephone" name="teacher_telephone" placeholder="Teacher Telephone" required>
          <label for="teacherTelephone">Teacher Telephone</label>
        </div>
    
        <!-- Annual Salary -->
        <div class="form-floating">
          <input type="number" step="0.01" class="form-control" id="annual_salary" name="annual_salary" placeholder="Annual Salary" required>
          <label for="annualSalary">Annual Salary</label>
        </div>
    
        <!-- Background Check -->
        <div class="form-check">
          <input class="form-check-input" type="checkbox" id="background_check" name="background_check" value="1">
          <label class="form-check-label" for="backgroundCheck">
            Background Check Completed
          </label>
        </div>

        <!-- Class -->
      <div class="form-floating mb-3">
        <select class="form-select" id="class" name="class">
          <option value="">Select a class (optional)</option>
          <?php foreach ($classes as $class): ?>
              <option value="<?php echo $class['id']; ?>">
                  <?php echo htmlspecialchars($class['class_name']); ?>
              </option>
          <?php endforeach; ?>
        </select>
        <label for="class">Class</label>
      </div>
    
        <!-- Birth Date -->
        <div class="form-floating">
          <input type="date" class="form-control" id="birth_date" name="birth_date" placeholder="Birth Date" required>
          <label for="birthDate">Birth Date</label>
        </div>
    
        <!-- Sex -->
        <div class="form-floating">
          <select class="form-control" id="sex" name="sex" required>
            <option value="Male">Male</option>
            <option value="Female">Female</option>
            <option value="Other">Other</option>
          </select>
          <label for="sex">Sex</label>
        </div>
    
        <!-- Working Hours -->
        <div class="form-floating">
          <input type="number" class="form-control" id="workingHours" name="working_hours" placeholder="Working Hours" required>
          <label for="workingHours">Working Hours</label>
        </div>
    
        <!-- Educational Qualifications -->
        <div class="form-floating">
          <textarea class="form-control" id="educationQualifications" name="educational_qualifications" placeholder="Educational Qualifications" required></textarea>
          <label for="educationQualifications">Educational Qualifications</label>
        </div>
      </div>

    </main>    

  <main class="form-signin w-100 m-auto">
  <div class="form-container">
    <!-- House Number -->
    <div class="form-floating">
      <input type="text" class="form-control" id="houseNumber" name="house_number" placeholder="House Number" required>
      <label for="houseNumber">House Number</label>
    </div>

    <!-- Street -->
    <div class="form-floating">
      <input type="text" class="form-control" id="street" name="street" placeholder="Street" required>
      <label for="street">Street</label>
    </div>

    <!-- City -->
    <div class="form-floating">
      <input type="text" class="form-control" id="city" name="city" placeholder="City" required>
      <label for="city">City</label>
    </div>

    <!-- Postcode -->
    <div class="form-floating">
      <input type="text" class="form-control" id="postcode" name="postcode" placeholder="Postcode" required>
      <label for="postcode">Postcode</label>
    </div>
  </div>

    <!-- Submit Button -->
    <button class="btn btn-primary w-100 py-2" type="submit">Add Teacher</button>

    <p class="mt-5 mb-3 text-body-secondary">&copy; 2017–2024</p>
  
  </main>
 

</body>
</html>
