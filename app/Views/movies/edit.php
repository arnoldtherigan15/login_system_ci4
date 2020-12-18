<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>
<a href="/movies/<?= $movie['id']; ?>" class="pull-left" style="color: #7b7b7b;">Back</a>
<div class="row" style="margin-top: 30px;">

    <div class="col-md-7">
        <!-- general form elements -->
        <div class="box box-primary">
            <!-- /.box-header -->
            <!-- form start -->
            <form action="/movies/update/<?= $movie['id']; ?>" method="post" enctype="multipart/form-data">
                <?= csrf_field(); ?>
                <input type="hidden" name="posterOld" value="<?= $movie['poster']; ?>">
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
                        <input type="text" class="form-control" name="title" id="title" placeholder="E.g. Dora the explorer" value="<?= old('title') ?  old('title') : $movie['title']; ?>">
                    </div>
                    <div class="form-group">
                        <label for="rating">Rating</label>
                        <input type="number" class="form-control" name="rating" id="rating" placeholder="E.g. 5" min="1" max="5" value="<?= old('rating') ?  old('rating') : $movie['rating']; ?>">
                    </div>
                    <div class="form-group">
                        <label for="year">Released Year</label>
                        <input type="number" class="form-control" name="year" id="year" placeholder="E.g. 2001" value="<?= old('year') ?  old('year') : $movie['year']; ?>">
                    </div>
                    <div class="form-group">
                        <label>Genre</label>
                        <select name="genre" class="form-control">
                            <?php
                            $option = ['action', 'musical', 'drama', 'horror', 'thriller'];
                            foreach ($option as $el) {
                                //Display Customer Info
                                if ($el == $movie['genre']) {
                                    $selected = "selected";
                                } else {
                                    $selected = "";
                                }
                                $output = '<option value="' . $el . '" ' . $selected . '>' . $el . '</option>';

                                //Echo output
                                echo $output;
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Storyline</label>
                        <textarea name="description" class="form-control" rows="3" placeholder="Movies description ..."><?= old('description') ?  old('description') : $movie['description']; ?>"</textarea>
                    </div>
                    <div class="form-group" style="display: flex;">
                        <img src="/img/<?= $movie['poster']; ?>" style="height: 100px;margin-right:10px">
                        <div>
                            <label for="poster">Poster</label>
                            <input name="poster" type="file" id="poster" value="<?= $movie['poster']; ?>">
                        </div>
                    </div>
                </div>
                <!-- /.box-body -->

                <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Edit</button>
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