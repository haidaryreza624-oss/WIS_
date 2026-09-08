
<?php

$message = '';

$alertClass = '';

$dbName = "wis_lab";

$conn = new mysqli("localhost", "root", "", $dbName);

if ($conn->connect_error) {

    die("Connection failed: " . $conn->connect_error);
}

$sql = "CREATE TABLE IF NOT EXISTS students (
    id INT PRIMARY KEY AUTO_INCREMENT,
    full_name VARCHAR(100) NOT NULL,
    email VARCHAR(120) NOT NULL,
    department VARCHAR(80) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";

if ($conn->query($sql) === TRUE) {

    $message = "Table 'students' created successfully (or already exists).";
    $alertClass = "success";

} else {

    $message = "Error creating table: " . $conn->error;
    $alertClass = "danger";
}

$conn->close();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Table</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

    <div class="container mt-5">

        <div class="card shadow">

            <div class="card-header bg-success text-white">
                <h3 class="mb-0">Create Students Table</h3>
            </div>

            <div class="card-body">

                <?php if ($message): ?>

                    <div class="alert alert-<?= $alertClass ?> alert-dismissible fade show" role="alert">
                        <?= htmlspecialchars($message) ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>

                <?php endif; ?>

                <p>Table creation attempt completed. Check phpMyAdmin to verify.</p>

                <a href="insert_student.php" class="btn btn-primary">
                    Go to Insert Student
                </a>

            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
```
