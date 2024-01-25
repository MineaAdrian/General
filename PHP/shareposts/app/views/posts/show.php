<?php require APPROOT . '/views/inc/header.php'; ?>

<a href="<?php echo URLROOT ?>/posts" class="btn btn-light"><i class="fa fa-backward"> Back</i></a>
<div class="row mb-3">
    <div class="col-md-6">
        <h1><?php if (isset($data)) {
                echo $data['post']->title;
            } ?></h1>
        <div class="bg-secondary text-white p-2 mb-3">
            Written by <?php echo $data['user']->name; ?> on <?php echo $data['post']->created_at; ?>
        </div>
        <p><?php echo $data['post']->body; ?></p>
    </div>
</div>

<?php if ($data['post']->user_id == $_SESSION['user_id']) : ?>
    <hr>
    <a href="<?php echo URLROOT; ?>/posts/edit/<?php echo $data['post']->id; ?>" class="btn btn-dark">Edit</a>
    <form class="pull pull-right" action="<?php echo URLROOT; ?>/posts/delete/<?php echo $data['post']->id; ?>"
          method="post">
        <input type="submit" value="Delete" class="btn btn-danger">
    </form>
<?php endif; ?>

<?php require APPROOT . '/views/inc/footer.php'; ?>
