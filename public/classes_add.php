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

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get form data
    $class = $_POST['class'];
    $class_name = $_POST['class_name'];
    $building = $_POST['building'];
    $capacity = $_POST['capacity'];
    $current_capacity = $_POST['current_capacity'];
    $teacher_id = $_POST['teacher_id'];

    // Insert into database
    try {
        $sql = "INSERT INTO classes (class, class_name, building, capacity, current_capacity, teacher_id)
                VALUES (:class, :class_name, :building, :capacity, :current_capacity, :teacher_id)";
        
        $stmt = $pdo->prepare($sql);
        
        // Bind parameters
        $stmt->bindParam(':class', $class);
        $stmt->bindParam(':class_name', $class_name);
        $stmt->bindParam(':building', $building);
        $stmt->bindParam(':capacity', $capacity);
        $stmt->bindParam(':current_capacity', $current_capacity);
        $stmt->bindParam(':teacher_id', $teacher_id);

        // Execute the statement
        $stmt->execute();

        echo "Class added successfully!";
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}

// Fetch teacher IDs for the dropdown
$teachers = [];
try {
    $stmt = $pdo->query("SELECT id, CONCAT(first_name, ' ', last_name) AS teacher_name FROM teachers");
    $teachers = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo "Error fetching teachers: " . $e->getMessage();
}

$class_years = [];
try {
    $stmt = $pdo->query("SELECT id, class AS class_year_name FROM class_year");
    $class_years = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo "Error fetching class year: " . $e->getMessage();
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
            <a href="pupils.php">Add</a>
            <a href="#">View All</a>
        </div>
    </div>

    <div class="dropdown">
        <button>Parent</button>
        <div class="dropdown-content">
            <a href="parentguardians.php">Add</a>
            <a href="#">View All</a>
        </div>
    </div>

    <div class="dropdown">
        <button>Teacher</button>
        <div class="dropdown-content">
            <a href="teachers.php">Add</a>
            <a href="#">View All</a>
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
    <form action="classes_add.php" method="POST">
      <img class="mb-4" src="../assets/brand/bootstrap-logo.svg" alt="" width="72" height="57">
      <h1 class="h3 mb-3 fw-normal">Add a Class</h1>

      <!-- Class Year -->
      <div class="form-floating mb-3">
        <select class="form-select" id="class" name="class" required>
          <option value="">Select a class</option>
          <?php foreach ($class_years as $class_year): ?>
              <option value="<?php echo $class_year['id']; ?>">
                  <?php echo htmlspecialchars($class_year['class_year_name']); ?>
              </option>
          <?php endforeach; ?>
        </select>
        <label for="class">Class Year</label>
      </div>

      <!-- Class Name -->
      <div class="form-floating mb-3">
        <input type="text" class="form-control" id="class_name" name="class_name" required placeholder="Class Name">
        <label for="class_name">Class Name</label>
      </div>

      <!-- Building -->
      <div class="form-floating mb-3">
        <input type="text" class="form-control" id="building" name="building" required placeholder="Building">
        <label for="building">Building</label>
      </div>

      <!-- Capacity -->
      <div class="form-floating mb-3">
        <input type="number" class="form-control" id="capacity" name="capacity" required placeholder="Capacity">
        <label for="capacity">Capacity</label>
      </div>

      <!-- Current Capacity -->
      <div class="form-floating mb-3">
        <input type="number" class="form-control" id="current_capacity" name="current_capacity" required placeholder="Current Capacity">
        <label for="current_capacity">Current Capacity</label>
      </div>

      <!-- Teacher -->
      <div class="form-floating mb-3">
        <select class="form-select" id="teacher_id" name="teacher_id" required>
          <option value="">Select a Teacher</option>
          <?php foreach ($teachers as $teacher): ?>
              <option value="<?php echo $teacher['id']; ?>">
                  <?php echo htmlspecialchars($teacher['teacher_name']); ?>
              </option>
          <?php endforeach; ?>
        </select>
        <label for="teacher_id">Teacher</label>
      </div>

      <!-- Submit Button -->
      <button class="btn btn-primary w-100 py-2" type="submit">Add Class</button>

      <p class="mt-5 mb-3 text-body-secondary">&copy; 2017–2024</p>
    </form>

</body>
</html>
