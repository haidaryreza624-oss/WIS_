<?php

include("db.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $full_name = trim($_POST["full_name"]);
    $father_name = trim($_POST["father_name"]);
    $email = trim($_POST["email"]);
    $phone = trim($_POST["phone"]);
    $program = trim($_POST["program"]);

    if (
        empty($full_name) ||
        empty($father_name) ||
        empty($email) ||
        empty($phone) ||
        empty($program)
    ) {
        header("Location: admission.php?error=true");
        exit;
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        header("Location: admission.php?email_error=true");
        exit;
    }

    $statement = $con->prepare(
        "INSERT INTO admission_table
        (full_name, father_name, email, phone, program)
        VALUES (?, ?, ?, ?, ?)"
    );

    $statement->bind_param(
        "sssss",
        $full_name,
        $father_name,
        $email,
        $phone,
        $program
    );

    if ($statement->execute()) {
        $statement->close();
        header("Location: admission.php?success=true");
        exit;
    } else {
        $statement->close();
        header("Location: admission.php?db_error=true");
        exit;
    }
}

$result = $con->query(
    "SELECT * FROM admission_table ORDER BY id DESC"
);

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>Student Admission</title>

    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
    >

</head>

<body class="bg-light">

<div class="container">

    <div class="card shadow-sm my-5 mx-auto">

        <div class="card-header bg-primary text-white text-center">

            <h3 class="mb-1">
                Student Admission
            </h3>

            <small>
                Enter student information below
            </small>

        </div>

        <div class="card-body p-4">

            <?php if (isset($_GET["success"])) { ?>

                <div class="alert alert-success alert-dismissible fade show">

                    Admission Successful

                    <button
                        type="button"
                        class="close"
                        data-dismiss="alert"
                    >
                        <span>&times;</span>
                    </button>

                </div>

            <?php } ?>

            <?php if (isset($_GET["error"])) { ?>

                <div class="alert alert-danger alert-dismissible fade show">

                    All Fields Required

                    <button
                        type="button"
                        class="close"
                        data-dismiss="alert"
                    >
                        <span>&times;</span>
                    </button>

                </div>

            <?php } ?>

            <?php if (isset($_GET["email_error"])) { ?>

                <div class="alert alert-warning alert-dismissible fade show">

                    Email is not valid

                    <button
                        type="button"
                        class="close"
                        data-dismiss="alert"
                    >
                        <span>&times;</span>
                    </button>

                </div>

            <?php } ?>

            <?php if (isset($_GET["db_error"])) { ?>

                <div class="alert alert-danger alert-dismissible fade show">

                    Something went wrong during admission.

                    <button
                        type="button"
                        class="close"
                        data-dismiss="alert"
                    >
                        <span>&times;</span>
                    </button>

                </div>

            <?php } ?>

            <form action="admission.php" method="POST">

                <div class="form-group">

                    <label for="name_inp">
                        Full Name:
                    </label>

                    <input
                        type="text"
                        name="full_name"
                        id="name_inp"
                        class="form-control"
                        placeholder="Enter full name"
                        required
                    >

                </div>

                <div class="form-group">

                    <label for="fname_inp">
                        Father's Name:
                    </label>

                    <input
                        type="text"
                        name="father_name"
                        id="fname_inp"
                        class="form-control"
                        placeholder="Enter father's name"
                        required
                    >

                </div>

                <div class="form-group">

                    <label for="email_inp">
                        Email:
                    </label>

                    <input
                        type="email"
                        name="email"
                        id="email_inp"
                        class="form-control"
                        placeholder="example@email.com"
                        required
                    >

                </div>

                <div class="form-group">

                    <label for="phone_inp">
                        Phone:
                    </label>

                    <input
                        type="text"
                        name="phone"
                        id="phone_inp"
                        class="form-control"
                        placeholder="Enter phone number"
                        required
                    >

                </div>

                <div class="form-group">

                    <label for="program_inp">
                        Program:
                    </label>

                    <select
                        name="program"
                        id="program_inp"
                        class="form-control"
                        required
                    >

                        <option value="">
                            Select Program
                        </option>

                        <option value="Information System">
                            Information System
                        </option>

                        <option value="Software Engineering">
                            Software Engineering
                        </option>

                        <option value="Computer Science">
                            Computer Science
                        </option>

                    </select>

                </div>

                <button
                    type="submit"
                    class="btn btn-primary btn-block mt-4"
                >
                    Register Student
                </button>

            </form>

        </div>

    </div>

    <div class="card shadow-sm mb-5">

        <div class="card-header bg-white">

            <h4 class="mb-1">
                Admission Records
            </h4>

            <small class="text-muted">
                Registered students
            </small>

        </div>

        <div class="card-body p-0">

            <div class="table-responsive">

                <table class="table table-striped table-hover table-bordered mb-0">

                    <thead class="thead-dark">

                        <tr>

                            <th class="text-center">
                                ID
                            </th>

                            <th>
                                Full Name
                            </th>

                            <th>
                                Father Name
                            </th>

                            <th>
                                Email
                            </th>

                            <th>
                                Phone
                            </th>

                            <th>
                                Program
                            </th>

                        </tr>

                    </thead>

                    <tbody>

                        <?php while ($row = $result->fetch_assoc()) { ?>

                            <tr>

                                <td class="text-center font-weight-bold">
                                    <?php echo htmlspecialchars($row["id"]); ?>
                                </td>

                                <td>
                                    <?php echo htmlspecialchars($row["full_name"]); ?>
                                </td>

                                <td>
                                    <?php echo htmlspecialchars($row["father_name"]); ?>
                                </td>

                                <td>
                                    <?php echo htmlspecialchars($row["email"]); ?>
                                </td>

                                <td>
                                    <?php echo htmlspecialchars($row["phone"]); ?>
                                </td>

                                <td>
                                    <span class="badge badge-primary">
                                        <?php echo htmlspecialchars($row["program"]); ?>
                                    </span>
                                </td>

                            </tr>

                        <?php } ?>

                    </tbody>

                </table>

            </div>

        </div>

    </div>

</div>

<script
    src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"
></script>

</body>

</html>
