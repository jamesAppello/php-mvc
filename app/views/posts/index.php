<?php require APPROOT . '/views/inc/header.php'; ?>
    <div class="row">
        <div class="col-md-6">
            <?php flash_msg('post_msg');?>
            <h1 class="lead mb-5">Yapp about some sh!t.</h1>
        </div>
        <div class="col-md-6">
            <a href="<?php echo URLROOT; ?>/posts/new" class="btn btn-warning pull-right shadow">
                <i class="fa fa-pencil"></i> New Post
            </a>
        </div>
    </div>
    <?php foreach($data['posts'] as $post) : ?>
    <div class="card card-body mb-3 shadow">
        <h4 class="card-title"><?php echo $post->title; ?></h4>
        <div class="bg-light p-2 mb-3">
            <caption>Witten by <?php echo $post->screenname;?> on <?php echo $post->ptime; ?></caption>
        </div>
        <p class="card-body"><?php echo $post->content;?></p>
        <a href="<?php echo URLROOT; ?>/posts/show/<?php echo $post->postID?>" class="btn btn-dark">view post</a>
    </div>
    <?php endforeach; ?>

<?php require APPROOT . '/views/inc/footer.php'; ?>