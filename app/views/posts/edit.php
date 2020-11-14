<?php require APPROOT . '/views/inc/header.php'; ?>
  <a href="<?php echo URLROOT; ?>/posts" class="btn btn-light"><i class="fa fa-backward"></i> Go Back</a>
    <div class="card card-body bg-light mt-5">
        <h2>Yeaaa... maybe you should edit that post. </h2>
        <small>** REQUIRED **</small><hr>
        <form action="<?php echo URLROOT; ?>/posts/edit/<?php echo $data['id']; ?>" method="post">

            <div class="form-group">
                <label for="title"><sup>**</sup> Title <sup>**</sup></label>
                <input type="title" name="title" 
                class="form-control form-control-lg <?php echo (!empty($data['title_err'])) ? 'is-invalid' : ''; ?>"
                value="<?php echo $data['title']; ?>">
                <span class="invalid-feedback"><?php echo $data['title_err']; ?></span>
            </div>

            <div class="form-group">
                <label for="content"><sup>**</sup> Post Content <sup>**</sup></label>
                <textarea name="content" 
                class="form-control form-control-lg <?php echo (!empty($data['content_err'])) ? 'is-invalid' : ''; ?>">
                    <?php echo $data['content']; ?>
                </textarea>
                <span class="invalid-feedback"><?php echo $data['content_err']; ?></span>
            </div>
            
            <div class="col">
                <input type="submit" value="Full Send!" class="btn btn-success btn-block">
            </div>
            
        </form>
    </div>
        
<?php require APPROOT . '/views/inc/footer.php'; ?>