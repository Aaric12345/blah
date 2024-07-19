<?php
// Include database connection
$host = 'localhost';
$user = 'root';
$pass = '';
$db = 'greenscape';

$conn = new mysqli($host, $user, $pass, $db);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Define variables and initialize with empty values
$firstName = $lastName = $email = $password = $confirmPassword = $role = "";
$firstNameErr = $lastNameErr = $emailErr = $passwordErr = $confirmPasswordErr = $roleErr = "";

// Processing form data when form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate first name
    if (empty(trim($_POST["first_name"]))) {
        $firstNameErr = "Please enter your first name.";
    } else {
        $firstName = trim($_POST["first_name"]);
    }
    
    // Validate last name
    if (empty(trim($_POST["last_name"]))) {
        $lastNameErr = "Please enter your last name.";
    } else {
        $lastName = trim($_POST["last_name"]);
    }

    // Validate email
    if (empty(trim($_POST["email"]))) {
        $emailErr = "Please enter your email.";
    } else {
        $email = trim($_POST["email"]);
        // Check if email already exists
        $sql = "SELECT id FROM users WHERE email = ?";
        if ($stmt = $conn->prepare($sql)) {
            $stmt->bind_param("s", $email);
            if ($stmt->execute()) {
                $stmt->store_result();
                if ($stmt->num_rows > 0) {
                    $emailErr = "This email is already registered.";
                }
            } else {
                echo "Oops! Something went wrong. Please try again later.";
            }
            $stmt->close();
        }
    }

    // Validate password
    if (empty(trim($_POST["password"]))) {
        $passwordErr = "Please enter a password.";
    } elseif (strlen(trim($_POST["password"])) < 6) {
        $passwordErr = "Password must have at least 6 characters.";
    } else {
        $password = trim($_POST["password"]);
    }

    // Validate confirm password
    if (empty(trim($_POST["confirm_password"]))) {
        $confirmPasswordErr = "Please confirm your password.";
    } else {
        $confirmPassword = trim($_POST["confirm_password"]);
        if ($password != $confirmPassword) {
            $confirmPasswordErr = "Passwords do not match.";
        }
    }

    // Validate role
    if (empty(trim($_POST["role"]))) {
        $roleErr = "Please select a role.";
    } else {
        $role = trim($_POST["role"]);
    }

    // Check input errors before inserting in database
    if (empty($firstNameErr) && empty($lastNameErr) && empty($emailErr) && empty($passwordErr) && empty($confirmPasswordErr) && empty($roleErr)) {
        // Prepare an insert statement
        $sql = "INSERT INTO users (first_name, last_name, email, password, role) VALUES (?, ?, ?, ?, ?)";
        
        if ($stmt = $conn->prepare($sql)) {
            // Bind variables to the prepared statement as parameters
            $stmt->bind_param("sssss", $paramFirstName, $paramLastName, $paramEmail, $paramPassword, $paramRole);

            // Set parameters
            $paramFirstName = $firstName;
            $paramLastName = $lastName;
            $paramEmail = $email;
            $paramPassword = password_hash($password, PASSWORD_DEFAULT); // Creates a password hash
            $paramRole = $role;

            // Attempt to execute the prepared statement
            if ($stmt->execute()) {
                // Redirect to login page
                header("location: login.php");
                exit();
            } else {
                echo "Something went wrong. Please try again later.";
            }

            // Close statement
            $stmt->close();
        }
    } else {
        // Display errors if any
        echo "<div class='alert alert-danger'>";
        echo $firstNameErr ? "<p>$firstNameErr</p>" : "";
        echo $lastNameErr ? "<p>$lastNameErr</p>" : "";
        echo $emailErr ? "<p>$emailErr</p>" : "";
        echo $passwordErr ? "<p>$passwordErr</p>" : "";
        echo $confirmPasswordErr ? "<p>$confirmPasswordErr</p>" : "";
        echo $roleErr ? "<p>$roleErr</p>" : "";
        echo "</div>";
    }
}

// Close connection
$conn->close();
?>
