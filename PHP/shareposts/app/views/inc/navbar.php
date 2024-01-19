<nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-3">
    <div class="container-fluid" style="margin:auto 12% auto 12%">
        <a class="navbar-brand" href="<?php echo URLROOT; ?>"><?php echo SITENAME; ?></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse"
                data-target="#navbarExampleDefault"
                aria-controls="navbarExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarExampleDefault">
            <ul class="navbar-nav me-auto ">
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="<?php echo URLROOT; ?>">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo URLROOT; ?>/pages/about">About</a>
                </li>
            </ul>
            <ul class="navbar-nav ml-auto">
                <?php if (isset($_SESSION['user_id'])) : ?>

                    <li class="nav-item">
                        <a class="nav-link" aria-current="page"
                           href="<?php echo URLROOT; ?>/users/logout">Logout</a>
                    </li>

                <?php else : ?>

                    <li class="nav-item">
                        <a class="nav-link" aria-current="page"
                           href="<?php echo URLROOT; ?>/users/register">Register</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo URLROOT; ?>/users/login">Log In</a>
                    </li>
                <?php endif; ?>
            </ul>
            <form class="d-flex" role="search" style="margin: auto 2% auto 2%">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Search</button>
            </form>
        </div>
    </div>
</nav>