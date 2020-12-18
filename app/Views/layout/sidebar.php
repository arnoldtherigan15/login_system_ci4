  <!-- Left side column. contains the sidebar -->
  <aside class="main-sidebar">
      <!-- sidebar: style can be found in sidebar.less -->
      <section class="sidebar">
          <!-- Sidebar user panel -->
          <div class="user-panel">
              <div class="pull-left image">
                  <img src="/img/<?= $_SESSION['photo']; ?>" class="img-circle" alt="User Image">
              </div>
              <div class="pull-left info">
                  <p><?= $_SESSION['full_name']; ?></p>
                  <a href="#"><i class="fa fa-user text-primary"></i> <?= session('role'); ?></a>
              </div>
          </div>

          <!-- /.search form -->
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu" data-widget="tree">
              <li class="header">MAIN NAVIGATION</li>
              <li>
                  <a href="/dashboard">
                      <i class="fa fa-home"></i> <span>Home</span>
                  </a>
              </li>
              <li>
                  <a href="/movies">
                      <i class="fa fa-film"></i> <span>Movies</span>
                  </a>
              </li>
              <?php if (session('role') == 'admin') : ?>
                  <li>
                      <a href="/movies/add-movie">
                          <i class="fa fa-plus"></i> <span>Add New Movie</span>
                      </a>
                  </li>
              <?php endif; ?>


          </ul>
      </section>
      <!-- /.sidebar -->
  </aside>

  <!-- =============================================== -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
          <h1>
              <?= $title; ?>
          </h1>
      </section>

      <!-- Main content -->
      <section class="content">