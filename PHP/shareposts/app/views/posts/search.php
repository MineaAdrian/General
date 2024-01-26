<?php require APPROOT . '/views/inc/header.php'; ?>
<?php flash('post_message'); ?>

    <div class="row mb-3">
        <div class="col-md-6">
            <h1>Results for your search: <?php echo $data['search'] ?></h1>
        </div>
        <div class="col-md-6">
            <a href="<?php echo URLROOT; ?>/posts/add" class="btn btn-primary pull-right">
                <i class="bi bi-pencil-fill">Add Post</i>
            </a>
        </div>
    </div>

<?php if (!empty($data)) {
    foreach ($data['posts'] as $post)  : ?>
        <div class="card card-body mb-3">
            <h4 class="card-title"><?php echo $post->title; ?></h4>
            <p class="card-text"><?php echo $post->body; ?></p>
            <a href="<?php echo URLROOT ?>/posts/show/<?php echo $post->id; ?>" class="btn btn-dark">More</a>
        </div>
    <?php endforeach;
} ?>

<?php require APPROOT . '/views/inc/footer.php'; ?>