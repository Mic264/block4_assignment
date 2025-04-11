<?php
include '../scr/php/db_connection.php';  // Include the database connection file
include '../scr/php/utils.php';  // Include the utilities file

try {
    $pdo = OpenCon();  // Establish PDO connection
} catch (PDOException $e) {
    alert("Connection failed: " . $e->getMessage());
    exit();  // Stop if the connection fails
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $house_number = $_POST['house_number'];
    $street = $_POST['street'];
    $city = $_POST['city'];
    $postcode = $_POST['postcode'];
    $medical_information = $_POST['medical_information'];
    $class_name = $_POST['class_name'];
    $birth_date = $_POST['birth_date'];
    $sex = $_POST['sex'];
    $pupil_email = $_POST['pupil_email'];
    $pupil_ID = $_POST['pupil_ID'];
    $contact_number = $_POST['contact_number'];

    // Parent 1 info
    $p1_first_name = $_POST['p1_first_name'];
    $p1_last_name = $_POST['p1_last_name'];
    $p1_guardian_email = $_POST['p1_guardian_email'];
    $p1_guardian_telephone = $_POST['p1_guardian_telephone'];

    // Parent 2 info
    $p2_first_name = $_POST['p2_first_name'];
    $p2_last_name = $_POST['p2_last_name'];
    $p2_guardian_email = $_POST['p2_guardian_email'];
    $p2_guardian_telephone = $_POST['p2_guardian_telephone'];

    try {
        $pdo->beginTransaction();  // Start the transaction

        try {
          $sql = "UPDATE classes SET current_capacity = current_capacity + 1 
                WHERE class_name = :classname";
          $stmt = $pdo->prepare($sql);
          $stmt->bindParam(':classname', $class_name);
          $stmt->execute();
        } catch (Exception $e) {
          alert("Class " .  $class_name . " is already full. Please use a different class."); 
          throw new PDOException("Error updating class capacity: " . $e->getMessage());
        }

        // Insert address
        $sql1 = "INSERT INTO addresses (house_number, street, city, postcode) 
                VALUES (:house_number, :street, :city, :postcode)";
        $stmt1 = $pdo->prepare($sql1);
        $stmt1->bindParam(':house_number', $house_number);
        $stmt1->bindParam(':street', $street);
        $stmt1->bindParam(':city', $city);
        $stmt1->bindParam(':postcode', $postcode);
        $stmt1->execute();

        // Get the address_id
        $sql2 = "SELECT id FROM addresses WHERE house_number = :house_number AND street = :street AND postcode = :postcode";
        $stmt2 = $pdo->prepare($sql2);
        $stmt2->bindParam(':house_number', $house_number);
        $stmt2->bindParam(':street', $street);
        $stmt2->bindParam(':postcode', $postcode);
        $stmt2->execute();
        $row = $stmt2->fetch(PDO::FETCH_ASSOC);
        $address_id = $row['id'];
        // $address_id = $pdo->lastInsertId();  // Get the ID of inserted address

          // Insert parent one data
          $sql3 = "INSERT INTO parent_guardians (first_name, last_name, guardian_email, guardian_telephone, address_id) 
                VALUES (:first_name, :last_name, :guardian_email, :guardian_telephone, :address_id)";
          $stmt3 = $pdo->prepare($sql3);
          $stmt3->bindParam(':first_name', $p1_first_name);
          $stmt3->bindParam(':last_name', $p1_last_name);
          $stmt3->bindParam(':guardian_email', $p1_guardian_email);
          $stmt3->bindParam(':guardian_telephone', $p1_guardian_telephone);
          $stmt3->bindParam(':address_id', $address_id);
          $stmt3->execute();
          $p1_guardian_id = $pdo->lastInsertId();  // Get the ID of inserted parent 1
  
          // Insert parent two data
          $sql4 = "INSERT INTO parent_guardians (first_name, last_name, guardian_email, guardian_telephone, address_id) 
                 VALUES (:first_name, :last_name, :guardian_email, :guardian_telephone, :address_id)";
          $stmt4 = $pdo->prepare($sql4);
          $stmt4->bindParam(':first_name', $p2_first_name);
          $stmt4->bindParam(':last_name', $p2_last_name);
          $stmt4->bindParam(':guardian_email', $p2_guardian_email);
          $stmt4->bindParam(':guardian_telephone', $p2_guardian_telephone);
          $stmt4->bindParam(':address_id', $address_id);
          $stmt4->execute();
          $p2_guardian_id = $pdo->lastInsertId();  // Get the ID of inserted parent 2

        // Insert pupil data
        $sql5 = "INSERT INTO pupils (first_name, last_name, address_id, parent_one, parent_two, medical_information, class_name, birth_date, sex, pupil_email, pupil_ID, contact_number) 
                 VALUES (:first_name, :last_name, :address_id, :parent_one, :parent_two, :medical_information, :class_name, :birth_date, :sex, :pupil_email, :pupil_ID, :contact_number)";
        $stmt5 = $pdo->prepare($sql5);
        $stmt5->bindParam(':first_name', $first_name);
        $stmt5->bindParam(':last_name', $last_name);
        $stmt5->bindParam(':address_id', $address_id);
        $stmt5->bindParam(':parent_one', $p1_guardian_id);
        $stmt5->bindParam(':parent_two', $p2_guardian_id);
        $stmt5->bindParam(':medical_information', $medical_information);
        $stmt5->bindParam(':class_name', $class_name);
        $stmt5->bindParam(':birth_date', $birth_date);
        $stmt5->bindParam(':sex', $sex);
        $stmt5->bindParam(':pupil_email', $pupil_email);
        $stmt5->bindParam(':pupil_ID', $pupil_ID);
        $stmt5->bindParam(':contact_number', $contact_number);
        $stmt5->execute();
        $pupil_data_id = $pdo->lastInsertId();  // Get the database ID of inserted pupil

      $pdo->commit();  // Commit the transaction
      alert("Pupil and parent information added successfully!");
    } catch (PDOException $e) {
        if ($pdo->inTransaction()) {
            $pdo->rollBack();  // Rollback if any error occurs
        }
        echo "Transaction failed. Error: " . $e->getMessage();
    }
}

$class_names = [];
try {
    $stmt = $pdo->query("SELECT class_name FROM classes");
    $class_names = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    alert("Error fetching class name: " . $e->getMessage());
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
    <!-- Form to collect pupil details -->
    <main class="form-signin w-100 m-auto">
    <div class="form-container">
    <form action="pupils_add.php" method="POST">
      <img class="mb-4" src="../assets/brand/logo.png" alt="" width="72" height="57">
      <h1 class="h3 mb-3 fw-normal">Add New Pupil</h1>
  
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
  
      <!-- Medical Information -->
      <div class="form-floating">
        <textarea class="form-control" id="medical_information" name="medical_information" placeholder="Medical Information"></textarea>
        <label for="medicalInformation">Medical Information</label>
      </div>
  
      <!-- Class Name -->
      <label for="class" class="form-control">Class Name: 
        <select id="class_name" name="class_name" required>
            <option value="">Select a class name</option>
            <?php foreach ($class_names as $class_name): ?>
                <option value="<?php echo $class_name['class_name']; ?>">
                    <?php echo htmlspecialchars($class_name['class_name']); ?>
                </option>
            <?php endforeach; ?>
      </select></label>
  
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
  
      <!-- Pupil Email -->
      <div class="form-floating">
        <input type="email" class="form-control" id="pupil_email" name="pupil_email" placeholder="Pupil Email" required>
        <label for="pupilEmail">Pupil Email</label>
      </div>
  
      <!-- Pupil ID -->
      <div class="form-floating">
        <input type="text" class="form-control" id="pupil_ID" name="pupil_ID" placeholder="Pupil ID" required>
        <label for="pupilID">Pupil ID</label>
      </div>
  
      <!-- Contact Number -->
      <div class="form-floating">
        <input type="tel" class="form-control" id="contact_number" name="contact_number" placeholder="Contact Number" required>
        <label for="contactNumber">Contact Number</label>
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

  </main>

  <main class="form-signin w-100 m-auto">
  <div class="form-container">

      Parent One Details</br>
  
      <!-- First Name -->
      <div class="form-floating">
        <input type="text" class="form-control" id="p1_first_name" name="p1_first_name" placeholder="First Name" required>
        <label for="firstName">First Name</label>
      </div>
  
      <!-- Last Name -->
      <div class="form-floating">
        <input type="text" class="form-control" id="p1_last_name" name="p1_last_name" placeholder="Last Name" required>
        <label for="lastName">Last Name</label>
      </div>
  
      <!-- Guardian Email -->
      <div class="form-floating">
        <input type="email" class="form-control" id="guardian_email" name="p1_guardian_email" placeholder="Guardian Email" required>
        <label for="guardianEmail">Guardian Email</label>
      </div>
  
      <!-- Guardian Telephone -->
      <div class="form-floating">
        <input type="tel" class="form-control" id="guardian_telephone" name="p1_guardian_telephone" placeholder="Guardian Telephone" required>
        <label for="guardianTelephone">Guardian Telephone</label>
      </div>
    </div>

  </main>

  <main class="form-signin w-100 m-auto">
  <div class="form-container">

      Parent Two Details</br>
  
      <!-- First Name -->
      <div class="form-floating">
        <input type="text" class="form-control" id="p2_first_name" name="p2_first_name" placeholder="First Name" required>
        <label for="firstName">First Name</label>
      </div>
  
      <!-- Last Name -->
      <div class="form-floating">
        <input type="text" class="form-control" id="p2_last_name" name="p2_last_name" placeholder="Last Name" required>
        <label for="lastName">Last Name</label>
      </div>
  
      <!-- Guardian Email -->
      <div class="form-floating">
        <input type="email" class="form-control" id="guardian_email" name="p2_guardian_email" placeholder="Guardian Email" required>
        <label for="guardianEmail">Guardian Email</label>
      </div>
  
      <!-- Guardian Telephone -->
      <div class="form-floating">
        <input type="tel" class="form-control" id="guardian_telephone" name="p2_guardian_telephone" placeholder="Guardian Telephone" required>
        <label for="guardianTelephone">Guardian Telephone</label>
      </div>
      </div>
  
      <!-- Submit Button -->
      <button class="btn btn-primary w-100 py-2" type="submit">Add Pupil</button>
  
      <p class="mt-5 mb-3 text-body-secondary">&copy; 2017–2024</p>
    </form>
  </main>

</body>
</html>
