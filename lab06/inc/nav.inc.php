<nav class="navbar bg-body-tertiary fixed-top" data-bs-theme="dark">
    <div class="container-fluid">
            <a class="navbar-brand" href="#"><img src="images/logo.jpg" class="navbar-logo"/></a>
            <div class="d-flex me-auto">
                <a class="nav-link navis me-3 index" aria-current="page" href="/">Home</a>
                <a class="nav-link navis me-3" href="#dogs">Dogs</a>
                <a class="nav-link navis me-3" href="#cats">Cats</a>
            </div>
            <a class="nav-link navis me-3 ml-auto register" href="register.php">
                <i class="fas fa-user-plus"></i> Register
            </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
            <div class="offcanvas-header">
                <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Hazel's world of pets</h5>
                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body">
                <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#dogs">Dogs</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#cats">Cats</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            All pets
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#dogs">Poodles</a></li>
                            <li><a class="dropdown-item" href="#dogs">Chihuahua</a></li>
                            <li><a class="dropdown-item" href="#cats">Tabby</a></li>
                            <li><a class="dropdown-item" href="#cats">Calico</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>