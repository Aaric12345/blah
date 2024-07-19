<header class="bg-light border-bottom">
        <div class="container">
            <div class="row align-items-center">
                <div class="col">
                    <h1 class="text-success"><a href="index.php">GreenScape</a></h1>
                </div>
                <div class="col d-flex justify-content-center">
                    <nav>
                        <a href="#" class="text-dark mx-3">Home</a>
                        <a href="#" class="text-dark mx-3">Landscapers</a>
                    </nav>
                </div>
                <div class="col d-flex justify-content-end">
                    <?php if ($loggedIn): ?>
                        <div class="dropdown">
                            <?php echo $_SESSION['first_name'] . ' ' . $_SESSION['last_name']; ?>
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