<?php
// Start the session
session_start();

// Check if the user is logged in
$loggedIn = isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <title>GreenScape</title>
    <style>
        .hero {
            background: url('garden.jpeg') no-repeat center center;
            background-size: cover;
            color: white;
            padding: 120px 0;
        }

        .hero h1 {
            font-size: 3rem;
            font-weight: bold;
        }

        .hero p {
            font-size: 1.5rem;
        }

        .category-card:hover {
            transform: scale(1.05);
            border-color: #28a745;
        }

        .category-card {
            transition: transform 0.2s, border-color 0.2s;
        }

        a {
            text-decoration: none;
            color: inherit;
        }
    </style>
</head>

<body>
   <?php include"include/home_header.php";?>

    <section class="hero text-center">
        <div class="container">
            <h1>Your Landscape, Our Passion</h1>
            <p>Find professional landscapers or offer your gardening services.</p>
            <div class="input-group mt-4 w-50 mx-auto">
                <input type="text" class="form-control" placeholder="Search for landscapers, services...">
                <button class="btn btn-success">Search</button>
            </div>
        </div>
    </section>

    <section class="container my-5">
        <h2 class="text-center mb-4">Explore Categories</h2>
        <div class="row">
            <div class="col-md-4 mb-4">
                <div class="card category-card h-100 p-4 text-center border">
                    <img src="garden.jpeg" class="card-img-top mx-auto" alt="Gardening">
                    <div class="card-body">
                        <h5 class="card-title">Gardening</h5>
                        <p class="card-text">Professional gardening services to keep your plants healthy.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card category-card h-100 p-4 text-center border">
                    <img src="garden.jpeg" class="card-img-top mx-auto" alt="Landscaping">
                    <div class="card-body">
                        <h5 class="card-title">Landscaping</h5>
                        <p class="card-text">Transform your yard with our expert landscaping services.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card category-card h-100 p-4 text-center border">
                    <img src="garden.jpeg" class="card-img-top mx-auto" alt="Planting">
                    <div class="card-body">
                        <h5 class="card-title">Planting</h5>
                        <p class="card-text">Specialized planting services for a greener garden.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="bg-light py-5">
        <div class="container">
            <h2 class="text-center mb-4">Why Choose Us?</h2>
            <div class="row text-center">
                <div class="col-md-4">
                    <i class="bi bi-check-circle-fill text-success mb-2" style="font-size: 2rem;"></i>
                    <h5>Trusted Professionals</h5>
                    <p>All our landscapers are verified and trusted.</p>
                </div>
                <div class="col-md-4">
                    <i class="bi bi-clock-fill text-success mb-2" style="font-size: 2rem;"></i>
                    <h5>Quick and Efficient</h5>
                    <p>Get your landscaping project completed quickly and efficiently.</p>
                </div>
                <div class="col-md-4">
                    <i class="bi bi-people-fill text-success mb-2" style="font-size: 2rem;"></i>
                    <h5>Customer Support</h5>
                    <p>24/7 customer support to help with any queries.</p>
                </div>
            </div>
        </div>
    </section>

    <footer class="bg-dark text-white py-3">
        <div class="container text-center">
            <p>&copy; 2024 GreenScape. All rights reserved.</p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>
