<?php require APPROOT . '/views/inc/header.php'; ?>
    <a href="<?php echo URLROOT; ?>/posts" class="btn btn-light shadow mb-5"><i class="fa fa-backward"></i> Go Back</a>
    <br>
    <div class="p-5 shadow">
        <h1><?php echo $data['post']->title; ?></h1>
        <div class="bg-secondary text-white p-2 mb-3">
            <p><strong class="post-show-sn"><?php echo $data['user']->screenname; ?></strong> on <?php echo $data['post']->created_at; ?></p>
        </div>
        <p><?php echo $data['post']->content; ?></p>

        <?php if ($data['post']->user_id == $_SESSION['user_id']) : ?>
            <hr>
            <a href="<?php echo URLROOT; ?>/posts/edit/<?php echo $data['post']->id; ?>" class="btn btn-dark shadow">Edit Post</a>
            <form class="pull-right" 
            action="<?php echo URLROOT ;?>/posts/delete/<?php echo $data['post']->id; ?>" 
            method="post">
                <input type="submit" value="Delete" class="btn btn-danger shadow">
            </form>
    </div>
    <?php endif; ?>
<?php require APPROOT . '/views/inc/footer.php'; ?>