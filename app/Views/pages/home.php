<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>
<!-- Default box -->
<div>
    <h1>NetfilxFake</h1>
    <p>This is a clone app of netflix. I tried to make a simple website using codeigniter4 using mysql as database</p>
</div>
<div class="row">
    <?php if (session('role') == 'user') : ?>
        <div class="col-md-6">
            <div class="box box-default">
                <div class="box-header with-border">
                    <i class="fa fa-bullhorn"></i>

                    <h3 class="box-title">User Features</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="callout callout-danger">
                        <h4>See All Movies</h4>

                        <p>User that has 'user' role can only read movies</p>
                    </div>
                    <div class="callout callout-info">
                        <h4>See Movie Detail</h4>

                        <p>User can see movie detail by click the detail button on the movies list card</p>
                    </div>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
    <?php else : ?>
        <div class="col-md-6">
            <div class="box box-default">
                <div class="box-header with-border">
                    <i class="fa fa-bullhorn"></i>

                    <h3 class="box-title">Admin Features</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="callout callout-danger">
                        <h4>See All Movies</h4>

                        <p>User that has 'user' role can only read movies</p>
                    </div>
                    <div class="callout callout-info">
                        <h4>See Movie Detail</h4>

                        <p>User can see movie detail by click the detail button on the movies list card</p>
                    </div>
                    <div class="callout callout-warning">
                        <h4>Create New Movie</h4>

                        <p>Only admin can create new movie. I also make the validation.</p>
                    </div>
                    <div class="callout callout-success">
                        <h4>Update Movie Data</h4>

                        <p>Only admin can edit movie data.</p>
                    </div>
                    <div class="callout callout-danger">
                        <h4>Delete Movie Data</h4>

                        <p>Only admin can delete movie data.</p>
                    </div>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
    <?php endif ?>
</div>
<!-- /.box -->
<?= $this->endSection(); ?>