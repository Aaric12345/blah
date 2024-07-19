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
    <title>GreenScape Freelancing</title>
    <style>
        .hero {
            background: url('hero-image.jpg') no-repeat center center;
            background-size: cover;
            color: white;
            padding: 120px 0;
            text-align: center;
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
            border: 1px solid #ddd;
            border-radius: 5px;
            padding: 20px;
            text-align: center;
        }
        a {
            text-decoration: none;
            color: inherit;
        }
        .freelancer-card {
            transition: transform 0.2s, border-color 0.2s;
            border: 1px solid #ddd;
            border-radius: 5px;
            padding: 20px;
            text-align: center;
        }
        .freelancer-card:hover {
            transform: scale(1.05);
            border-color: #28a745;
        }
        .profile-img {
            border-radius: 50%;
            width: 80px;
            height: 80px;
            object-fit: cover;
        }
    </style>
</head>
<body>
<header class="bg-light border-bottom">
    <div class="container">
        <div class="row align-items-center">
            <div class="col">
                <h1 class="text-success"><a href="index.php">GreenScape</a></h1>
            </div>
            <div class="col d-flex justify-content-center">
                <nav>
                    <a href="#" class="text-dark mx-3">Home</a>
                    <a href="#" class="text-dark mx-3">Notification</a>
                    <a href="#" class="text-dark mx-3">Message</a>
                </nav>
            </div>
            <div class="col d-flex justify-content-end">
                <?php if ($loggedIn): ?>
                    <div class="dropdown">
                        <span><?php echo $_SESSION['first_name'] . ' ' . $_SESSION['last_name']; ?></span>
                        <button class="btn btn-light dropdown-toggle border-0" type="button" id="profileDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="bi bi-person-circle fs-4 me-2"></i>
                        </button>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="profileDropdown">
                            <li><a class="dropdown-item" href="#">Profile</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="functions/logout.php">Logout</a></li>
                        </ul>
                    </div>
                <?php else: ?>
                    <a href="signup.php" class="text-dark me-3">Sign Up</a>
                    <a href="login.php" class="text-dark">Login</a>
                <?php endif; ?>
            </div>
        </div>
    </div>
</header>

<main>
    <!-- Hero Section -->
    <section class="hero">
        <div class="container">
            <h1>Find the Perfect Freelancer for Your Project</h1>
            <p>Connect with talented professionals from around the world.</p>
            <form class="d-flex justify-content-center mt-4">
                <input class="form-control me-2" type="search" placeholder="Search for services" aria-label="Search">
                <button class="btn btn-success" type="submit">Search</button>
            </form>
        </div>
    </section>

    <!-- Categories Section -->
    <section class="py-5">
        <div class="container">
            <h2 class="mb-4 text-center">Explore Categories</h2>
            <div class="row">
                <div class="col-md-4 mb-4">
                    <div class="category-card">
                        <i class="bi bi-brush fs-1 text-success"></i>
                        <h5 class="mt-3">Design & Graphics</h5>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="category-card">
                        <i class="bi bi-code-slash fs-1 text-success"></i>
                        <h5 class="mt-3">Programming & Tech</h5>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="category-card">
                        <i class="bi bi-mic fs-1 text-success"></i>
                        <h5 class="mt-3">Music & Audio</h5>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Featured Freelancers Section -->
    <section class="py-5 bg-light">
        <div class="container">
            <h2 class="mb-4 text-center">Top Freelancers</h2>
            <div class="row">
                <div class="col-md-3 mb-4">
                    <div class="freelancer-card">
                        <img src="freelancer1.jpg" alt="Freelancer 1" class="profile-img mb-3">
                        <h5>John Doe</h5>
                        <p>Web Developer</p>
                    </div>
                </div>
                <div class="col-md-3 mb-4">
                    <div class="freelancer-card">
                        <img src="freelancer2.jpg" alt="Freelancer 2" class="profile-img mb-3">
                        <h5>Jane Smith</h5>
                        <p>Graphic Designer</p>
                    </div>
                </div>
                <div class="col-md-3 mb-4">
                    <div class="freelancer-card">
                        <img src="freelancer3.jpg" alt="Freelancer 3" class="profile-img mb-3">
                        <h5>Mike Johnson</h5>
                        <p>Content Writer</p>
                    </div>
                </div>
                <div class="col-md-3 mb-4">
                    <div class="freelancer-card">
                        <img src="freelancer4.jpg" alt="Freelancer 4" class="profile-img mb-3">
                        <h5>Emily Davis</h5>
                        <p>SEO Expert</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- User Profile Section -->
    <section class="py-5">
        <div class="container">
            <h2 class="mb-4 text-center">Create Your Profile</h2>
            <div class="row">
                <div class="col-md-6 mx-auto">
                    <form action="profile-create.php" method="POST" enctype="multipart/form-data">
                        <div class="mb-3">
                            <label for="firstName" class="form-label">First Name</label>
                            <input type="text" class="form-control" id="firstName" name="firstName" required>
                        </div>
                        <div class="mb-3">
                            <label for="lastName" class="form-label">Last Name</label>
                            <input type="text" class="form-control" id="lastName" name="lastName" required>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email" required>
                        </div>
                        <div class="mb-3">
                            <label for="profileImage" class="form-label">Profile Image</label>
                            <input type="file" class="form-control" id="profileImage" name="profileImage" accept="image/*" required>
                        </div>
                        <div class="mb-3">
                            <label for="skills" class="form-label">Skills</label>
                            <input type="text" class="form-control" id="skills" name="skills" placeholder="e.g. Web Development, Graphic Design" required>
                        </div>
                        <div class="mb-3">
                            <label for="profileDescription" class="form-label">Profile Description</label>
                            <textarea class="form-control" id="profileDescription" name="profileDescription" rows="4" maxlength="1500" placeholder="Describe your skills and experience" required></textarea>
                        </div>
                        <button type="submit" class="btn btn-success w-100">Create Profile</button>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <!-- Publish Services Section -->
    <section class="py-5 bg-light">
        <div class="container">
            <h2 class="mb-4 text-center">Publish Your Services</h2>
            <div class="row">
                <div class="col-md-6 mx-auto">
                    <form action="service-publish.php" method="POST" enctype="multipart/form-data">
                        <div class="mb-3">
                            <label for="serviceTitle" class="form-label">Service Title</label>
                            <input type="text" class="form-control" id="serviceTitle" name="serviceTitle" required>
                        </div>
                        <div class="mb-3">
                            <label for="serviceDescription" class="form-label">Service Description</label>
                            <textarea class="form-control" id="serviceDescription" name="serviceDescription" rows="4" maxlength="1500" placeholder="Describe the service you are offering" required></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="servicePrice" class="form-label">Price</label>
                            <input type="number" class="form-control" id="servicePrice" name="servicePrice" required>
                        </div>
                        <div class="mb-3">
                            <label for="serviceImage" class="form-label">Service Portfolio Images</label>
                            <input type="file" class="form-control" id="serviceImage" name="serviceImage[]" accept="image/*" multiple required>
                        </div>
                        <button type="submit" class="btn btn-success w-100">Publish Service</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
</main>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2gD2Nkbu0+6Lpebd4gU2yU7WO3oZ2a1uB4MAm1ntB93Fftj0c4S0b6LS6+2" crossorigin="anonymous"></script>
</body>
</html>
                    