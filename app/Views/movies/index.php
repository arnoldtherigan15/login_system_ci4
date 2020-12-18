<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>
<!-- Default box -->

<div class="row" style="margin-top: 30px;">
    <?php
    $message = session()->getFlashdata('message');
    if (!empty($message)) : ?>
        <div class="alert alert-success" role="alert">
            <p><?= esc($message) ?></p>
        </div>
    <?php endif ?>
    <?php foreach ($movies as $movie) : ?>
        <div class="col-md-3">
            <!-- Box Comment -->
            <div class="box box-widget" style="box-shadow: 5px 5px 20px #d2d7de;">
                <div class="box-header with-border">
                    <div style="display: flex; justify-content:center; align-items:center;">
                        <div style="display: flex; flex-direction:column; text-align:center;">
                            <span class="title" style="font-size: 1.5em;"><?= $movie['title']; ?></span>
                        </div>
                    </div>
                    <!-- /.box-tools -->
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <img class="img-responsive pad thumbnail" src="/img/<?= $movie['poster']; ?>" alt="Photo">

                    <div class="pull-left" style="display: flex; flex-direction:column; text-align:right">
                        <span class="badge" style="font-size: 10px;"><?= $movie['genre']; ?></span>
                        <div style="display: flex; margin-top:5px;">
                            <?php for ($i = 1; $i <= $movie['rating']; $i++) : ?>
                                <i class="fa fa-star text-yellow"></i>
                            <?php endfor; ?>
                        </div>
                    </div>

                    <a href="/movies/<?= $movie['id']; ?>" class="pull-right btn" style="background-color: #7b7b7b; color:white">Detail</a>
                </div>


            </div>
            <!-- /.box -->
        </div>
    <?php endforeach; ?>
</div>
<!-- /.box -->
<?= $this->endSection(); ?>