<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>GreenScape</title>
    <style>
        .card-title {
            font-size: 1.25rem;
            font-weight: bold;
        }
        .card {
            cursor: pointer;
            transition: transform 0.2s;
        }
        .card:hover {
            transform: scale(1.05);
            border-color: #28a745;
        }
        a{
            text-decoration: none;
            color: inherit;
            
        }
    </style>
</head>

<body>

    <?php include"include/login_signup_header.php";?>
    <div class="container d-flex flex-column justify-content-center align-items-center mt-5" style="min-height: 100vh;">
        <h1 class="mb-4">Sign Up as a Client or Landscaper</h1>
        <div class="row w-100 justify-content-center">
            <div class="col-md-5">
                <div class="card p-4 text-center me-md-4 mb-4">
                    <h6 class="card-title">Client</h6>
                    <p>Find the best landscapers for your project.</p>
                    <a href="user_register.php" class="btn btn-outline-success">Sign Up as Client</a>
                </div>
            </div>
            <div class="col-md-5">
                <div class="card p-4 text-center mb-4">
                    <h6 class="card-title">Landscaper</h6>
                    <p>Showcase your skills and find new clients.</p>
                    <a href="landscaper_register.php" class="btn btn-outline-success">Sign Up as Landscaper</a>
                </div>
            </div>
        </div>
        <div class="mt-3 text-center">
                <h6>Already have an account?</h6>
                <a href="login.php" class="btn btn-outline-success w-100">Login</a>
            </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>
