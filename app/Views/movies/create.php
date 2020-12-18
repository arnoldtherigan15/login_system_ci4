<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>
<div class="row" style="margin-top: 30px;">

    <div class="col-md-7">
        <!-- general form elements -->
        <div class="box box-primary">
            <!-- /.box-header -->
            <!-- form start -->
            <form action="/movies/save" method="post" enctype="multipart/form-data">
                <?= csrf_field(); ?>
                <?php
                $errors = session()->getFlashdata('errors');
                if (!empty($errors)) : ?>
                    <div class="alert alert-danger" role="alert">
                        <ul>
                            <?php foreach ($errors as $error) : ?>
                                <li><?= esc($error) ?></li>
                            <?php endforeach ?>
                        </ul>
                    </div>
                <?php endif ?>
                <div class="box-body">
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" class="form-control" name="title" id="title" placeholder="E.g. Dora the explorer" value="<?= old('title'); ?>">
                    </div>
                    <div class="form-group">
                        <label for="rating">Rating</label>
                        <input type="number" class="form-control" name="rating" id="rating" placeholder="E.g. 5" min="1" max="5" value="<?= old('rating'); ?>">
                    </div>
                    <div class="form-group">
                        <label for="year">Released Year</label>
                        <input type="number" class="form-control" name="year" id="year" placeholder="E.g. 2001" value="<?= old('year'); ?>">
                    </div>
                    <div class="form-group">
                        <label>Genre</label>
                        <select name="genre" class="form-control">
                            <option value="action">Action</option>
                            <option value="musical">Musical</option>
                            <option value="drama">Drama</option>
                            <option value="horror">Horror</option>
                            <option value="thriller">Thriller</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Storyline</label>
                        <textarea name="description" class="form-control" rows="3" placeholder="Movies description ..." value="<?= old('description'); ?>"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="poster">Poster</label>
                        <input name="poster" type="file" id="poster">
                    </div>
                </div>
                <!-- /.box-body -->

                <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
    <div class="col-md-4">
        <img src="/img/movies.jpg" style="height: 600px;">
    </div>
</div>
<!-- /.box -->
<?= $this->endSection(); ?>