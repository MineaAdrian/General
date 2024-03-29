<nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-3">
    <div class="container">
        <a class="navbar-brand" href="<?php echo URLROOT; ?>"><?php echo SITENAME; ?></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="container-fluid">
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="<?php echo URLROOT; ?>">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo URLROOT; ?>/pages/about">About</a>
                    </li>
                </ul>
                <ul class="navbar-nav ml-auto">
                    <?php if (isset($_SESSION['user_id'])) : ?>

                        <form method="get" class="d-flex" action="<?php echo URLROOT; ?>/posts/search">
                            <button type="submit" class="btn btn-success btn-sm">Search</button>
                            <input type="text" placeholder="Search post title" name="search" class="form-control">
                        </form>

                        <li class="nav-item">
                            <a class="nav-link" aria-current="page"
                               href="<?php echo URLROOT; ?>/users/logout">Logout (<?php echo $_SESSION['user_name']; ?>
                                )</a>
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
            </div>
        </div>
    </div>
</nav>

