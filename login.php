<?php
// Start the session
session_start();

// Include database connection
include "config/conn.php";

// Define variables and initialize with empty values
$email = $password = "";
$emailErr = $passwordErr = "";

// Processing form data when form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if email is empty
    if (empty(trim($_POST["email"]))) {
        $emailErr = "Please enter your email.";
    } else {
        $email = trim($_POST["email"]);
    }

    // Check if password is empty
    if (empty(trim($_POST["password"]))) {
        $passwordErr = "Please enter your password.";
    } else {
        $password = trim($_POST["password"]);
    }

    // Validate credentials
    if (empty($emailErr) && empty($passwordErr)) {
        // Prepare a select statement
        $sql = "SELECT id, first_name, last_name, email, password, role FROM users WHERE email = ?";

        if ($stmt = $conn->prepare($sql)) {
            // Bind variables to the prepared statement as parameters
            $stmt->bind_param("s", $paramEmail);

            // Set parameters
            $paramEmail = $email;

            // Attempt to execute the prepared statement
            if ($stmt->execute()) {
                // Store result
                $stmt->store_result();

                // Check if email exists, if yes then verify password
                if ($stmt->num_rows == 1) {
                    // Bind result variables
                    $stmt->bind_result($id, $firstName, $lastName, $email, $hashedPassword, $role);
                    if ($stmt->fetch()) {
                        // Using SHA1 for verification (not recommended for production)
                        if (sha1($password) === $hashedPassword) {
                            // Password is correct, start a new session
                            session_start();

                            // Store data in session variables
                            $_SESSION["loggedin"] = true;
                            $_SESSION["id"] = $id;
                            $_SESSION["first_name"] = $firstName;
                            $_SESSION["last_name"] = $lastName;
                            $_SESSION["role"] = $role;

                            // Redirect user based on their role
                            switch ($role) {
                                case 'admin':
                                    header("location: admin/index.php");
                                    break;
                                case 'landscaper':
                                    header("location: landscaper/index.php");
                                    break;
                                default:
                                    header("location: index.php");
                                    break;
                            }
                            exit;
                        } else {
                            // Password is not valid, display a generic error message
                            $passwordErr = "The password you entered was not valid.";
                        }
                    }
                } else {
                    // Email doesn't exist, display a generic error message
                    $emailErr = "No account found with that email.";
                }
            } else {
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            $stmt->close();
        }
    }

    // Close connection
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>GreenScape - Login</title>
    <style>
        a {
            text-decoration: none;
            color: inherit;
        }
    </style>
</head>

<body>
    <?php include "include/login_signup_header.php"; ?>
    <div class="container d-flex justify-content-center align-items-center mt-0 p-5" style="min-height: 100vh;">
        <div class="card p-4">
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="text" id="email" name="email" class="form-control <?php echo (!empty($emailErr)) ? 'is-invalid' : ''; ?>" value="<?php echo $email; ?>">
                    <span class="invalid-feedback"><?php echo $emailErr; ?></span>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" id="password" name="password" class="form-control <?php echo (!empty($passwordErr)) ? 'is-invalid' : ''; ?>">
                    <span class="invalid-feedback"><?php echo $passwordErr; ?></span>
                </div>
                <button class="btn btn-success w-100" type="submit">Login</button>
            </form>
            <div class="mt-3 text-center">
                <h6>Don't have a GreenScape account?</h6>
                <a href="signup.php" class="btn btn-outline-success w-100">Sign Up</a>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>
