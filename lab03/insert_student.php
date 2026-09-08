```php
<?php

$message = '';

$alertClass = '';

$formData = ['full_name' => '', 'email' => '', 'department' => ''];

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $fullName = trim($_POST["full_name"]);
    $email = trim($_POST["email"]);
    $department = trim($_POST["department"]);

    $formData = [
        'full_name' => $fullName,
        'email' => $email,
        'department' => $department
    ];

    if (empty($fullName) || empty($email) || empty($department)) {

        $message = "All fields are required.";
        $alertClass = "danger";

    } else {

        $dbName = "wis_lab";

        $conn = new mysqli("localhost", "root", "", $dbName);

        if ($conn->connect_error) {

            $message = "Connection failed: " . $conn->connect_error;
            $alertClass = "danger";

        } else {

            $stmt = $conn->prepare("INSERT INTO students (full_name, email, department) VALUES (?, ?, ?)");

            if ($stmt === false) {

                $message = "Prepare failed: " . $conn->error;
                $alertClass = "danger";

            } else {

                $stmt->bind_param("sss", $fullName, $email, $department);

                if ($stmt->execute()) {

                    $message = "Student added successfully!";
                    $alertClass = "success";

                    $formData = [
                        'full_name' => '',
                        'email' => '',
                        'department' => ''
                    ];

                } else {

                    $message = "Error inserting: " . $stmt->error;
                    $alertClass = "danger";
                }

                $stmt->close();
            }

            $conn->close();
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert Student</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

    <div class="container mt-5">

        <div class="card shadow">

            <div class="card-header bg-info text-white">
                <h3 class="mb-0">Add New Student</h3>
            </div>

            <div class="card-body">

                <?php if ($message): ?>

                    <div class="alert alert-<?= $alertClass ?> alert-dismissible fade show" role="alert">
                        <?= htmlspecialchars($message) ?>

                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>

                <?php endif; ?>

                <form method="POST" action="">

                    <div class="mb-3">

                        <label for="full_name" class="form-label">
                            Full Name
                        </label>

                        <input
                            type="text"
                            name="full_name"
                            id="full_name"
                            class="form-control"
                            placeholder="Enter full name"
                            value="<?= htmlspecialchars($formData['full_name']) ?>"
                            required
                        >

                    </div>

                    <div class="mb-3">

                        <label for="email" class="form-label">
                            Email
                        </label>

                        <input
                            type="email"
                            name="email"
                            id="email"
                            class="form-control"
                            placeholder="Enter email"
                            value="<?= htmlspecialchars($formData['email']) ?>"
                            required
                        >

                    </div>

                    <div class="mb-3">

                        <label for="department" class="form-label">
                            Department
                        </label>

                        <input
                            type="text"
                            name="department"
                            id="department"
                            class="form-control"
                            placeholder="Enter department"
                            value="<?= htmlspecialchars($formData['department']) ?>"
                            required
                        >

                    </div>

                    <button type="submit" class="btn btn-primary">
                        Save Student
                    </button>

                    <button type="reset" class="btn btn-secondary">
                        Clear
                    </button>

                </form>

            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
```
