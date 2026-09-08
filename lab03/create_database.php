
<?php

$message = '';

$alertClass = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $databaseName = trim($_POST["database_name"]);

    if (empty($databaseName)) {

        $message = "Database name cannot be empty.";
        $alertClass = "danger";

    } elseif (!preg_match('/^[A-Za-z0-9_]+$/', $databaseName)) {

        $message = "Invalid database name. Use only letters, numbers, and underscores.";
        $alertClass = "danger";

    } else {

        $conn = new mysqli("localhost", "root", "");

        if ($conn->connect_error) {

            $message = "Connection failed: " . $conn->connect_error;
            $alertClass = "danger";

        } else {

            $sql = "CREATE DATABASE `$databaseName`";

            if ($conn->query($sql) === TRUE) {

                $message = "Database '$databaseName' created successfully!";
                $alertClass = "success";

            } else {

                $message = "Error creating database: " . $conn->error;
                $alertClass = "danger";
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
    <title>Create Database</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

    <div class="container mt-5">
        <div class="card shadow">

            <div class="card-header bg-primary text-white">
                <h3 class="mb-0">Create Database</h3>
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
                        <label for="database_name" class="form-label">Database Name</label>

                        <input
                            type="text"
                            name="database_name"
                            id="database_name"
                            class="form-control"
                            placeholder="e.g., wis_lab"
                            pattern="[A-Za-z0-9_]+"
                            title="Only letters, numbers, underscores"
                            required
                        >

                        <div class="form-text">
                            Only letters, numbers, and underscores allowed.
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary">
                        Create Database
                    </button>

                </form>

            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
```
