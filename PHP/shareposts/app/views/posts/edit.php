<?php require APPROOT . '/views/inc/header.php'; ?>

<a href="<?php echo URLROOT ?>/posts" class="btn btn-light"><i class="fa fa-backward"> Back</i></a>

<div class="card card-body bg-light mt-5">
    <h2 align="center">Edit Post</h2>
    <p align="center">Edit the post with this form</p>
    <form class="form-group" action="<?php echo URLROOT; ?>/posts/edit/<?php echo $data['id']; ?>" method="post">
        <div class="form-group">
            <label for="text" class="form-label">Title: <sup>*</sup></label>
            <input type="text"
                   class="form-control form-control-lg <?php echo (!empty($data['title_error'])) ? 'is-invalid' : ''; ?>"
                   value="<?php echo $data['title']; ?>" id="title" name="title">
            <span class="invalid-feedback"><?php echo $data['title_error'] ?></span>
        </div>
        <div class="form-group mb-3 mt-1">
            <label for="body" class="form-label">Body: <sup>*</sup></label>
            <textarea
                    name="body"
                    class="form-control form-control-lg <?php echo (!empty($data['body_error'])) ? 'is-invalid' : ''; ?>"
                    id="body" name="body"><?php echo $data['body']; ?></textarea>
            <span class="invalid-feedback"><?php echo $data['body_error'] ?></span>
        </div>
        <input type="submit" class="btn btn-success" value="Submit">
    </form>
</div>

<?php require APPROOT . '/views/inc/footer.php'; ?>
