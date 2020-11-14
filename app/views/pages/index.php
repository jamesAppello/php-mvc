<?php require APPROOT . '/views/inc/header.php'; ?>
<div class="content-idx">
    <div class="jumbotron jumbotron-fluid">
        <div class="container">
            <h1 class="display-3"><?php echo $data['title']; ?></h1>
            <p class="lead"><?php echo $data['description']; ?></p>
        </div>
    </div>
    <hr>
</div>
    <section class="idx-sc-sect shadow-lg">
        <div class="row shadow pb-2">
            <div class="col-5" id="idx-sect-left">
                <caption>Wanna see something cool? <strong>Check this out!</strong></caption>
                <form class="form-body pt-2">
                    <input class="form-control" type="text" placeholder="Type something..."id="idxIpt">
                    <br>
                    <button id="subBtn" class="btn btn-warning">
                        H4$H
                    </button>
                </form>

            </div>
            <div class="col-5" id="idx-sect-right">
                <h4 id='shdr' class="r-sect-hdr" hidden="true">RandomButCool!</h4>
                <p class="here" id="txthere"></p>
            </div>
        </div>
    </section>
<?php require APPROOT . '/views/inc/footer.php'; ?>