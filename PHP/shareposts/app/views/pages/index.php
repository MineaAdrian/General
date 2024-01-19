<?php require APPROOT . '/views/inc/header.php'; ?>

    <div class=".jumbotron.jumbotron-fluid">
        <div class="container">
            <h1 class="display-3" align="center"><?php
                if (!empty($data)) {
                    echo $data['title'];
                }
                ?></h1>
            <p class="lead" align="center">
                <?php if (!empty($data)) {
                    echo $data['description'];
                } ?>
            </p>
        </div>
    </div>

<?php require APPROOT . '/views/inc/footer.php'; ?>