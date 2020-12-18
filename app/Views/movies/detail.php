<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>
<!-- Default box -->
<a href="/movies" class="pull-left" style="color: #7b7b7b;">Back</a>
<div class="row" style="margin-top: 30px;">
    <?php
    $message = session()->getFlashdata('message');
    if (!empty($message)) : ?>
        <div class="alert alert-success" role="alert">
            <p><?= esc($message) ?></p>
        </div>
    <?php endif ?>
    <div class="col-md-7">
        <div class="box box-solid">
            <div class="box-header with-border" style="display: flex; justify-content:space-between">
                <div style="width: 60%;">
                    <i class="fa fa-text-width"></i>
                    <h3 class="box-title">Description</h3>
                </div>
                <?php if (session('role') == 'admin') : ?>
                    <div style="width: 40%;display:flex; align-items:center;justify-content:flex-end">
                        <button class="btn-xs btn-warning" style="margin-left: 5px;">
                            <a href="/movies/edit-movie/<?= $movie['id']; ?>">Edit</a></button>
                        <!-- <i class="fa fa-trash"><a href="" style="margin-left: 5px;">Delete</a></i> -->
                        <form action="/movies/<?= $movie['id']; ?>" method="post">
                            <?= csrf_field(); ?>
                            <input type="hidden" name="_method" value="DELETE">
                            <button class="btn-xs btn-danger" style="margin-left: 5px;" onclick="return confirm('this cannot be revert, are you sure?')">Delete</button>
                        </form>
                    </div>
                <?php endif; ?>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <dl>
                    <dt><?= $movie['title']; ?></dt>
                    <dd>Released year: <?= $movie['year']; ?></dd>
                    <dt>Genre</dt>
                    <dd><?= $movie['genre']; ?></dd>
                    <dt>Rating</dt>
                    <dd style="display: flex; margin-top:5px; align-items:center">
                        <?php for ($i = 1; $i <= $movie['rating']; $i++) : ?>
                            <i class="fa fa-star text-yellow"></i>
                        <?php endfor; ?>
                        <span style="margin-left:5px">[<?= $movie['rating']; ?>.0]</span>
                    </dd>
                    <dt>Storyline</dt>
                    <dd><?= $movie['description']; ?></dd>

                </dl>
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </div>
    <div class="col-md-5">
        <img class="img-responsive" src="/img/<?= $movie['poster']; ?>" style="height: 500px;">
    </div>
</div>

<!-- /.box -->
<?= $this->endSection(); ?>