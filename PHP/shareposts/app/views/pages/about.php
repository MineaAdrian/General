<?php
require APPROOT . '/views/inc/header.php';
?>

<div class=".jumbotron.jumbotron-fluid">
    <div class="container">
        <h1 class="display-3"><?php
            if (!empty($data)) {
                echo $data['title'];
            }
            ?></h1>
        <p class="lead">
            <?php if (!empty($data)) {
                echo $data['description'];
            } ?>
        </p>
        <p>Version <strong><?php echo APPVERSION; ?></strong></p>
    </div>
</div>

<?php require APPROOT . '/views/inc/footer.php'; ?>

