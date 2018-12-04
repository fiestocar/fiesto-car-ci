
<!doctype html>
<html lang="en">

<!-- Mirrored from getbootstrap.com/docs/4.1/examples/jumbotron/ by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 07 Nov 2018 23:42:00 GMT -->
<meta http-equiv="content-type" content="text/html;charset=utf-8" /><!-- /Added by HTTrack -->
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="https://getbootstrap.com/favicon.ico">

    <title>Fiesto Car Dashboard</title>

    <!-- Bootstrap core CSS -->
    <link href="<?php echo base_url() ?>assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="jumbotron.css" rel="stylesheet">
  </head>

  <body>

    <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
      <?php echo anchor('dashboard','Fiesto Car Dashboard',array('class'=>'navbar-brand')); ?>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav mr-auto">
          <!-- <li class="nav-item">
            <?php echo anchor('kategori','Kategori Barang',array('class'=>'nav-link')); ?>
          </li>
          <li class="nav-item">
            <?php echo anchor('barang','Data Barang',array('class'=>'nav-link')); ?>
          </li>
          <li class="nav-item">
            <?php echo anchor('operator','Operator Sistem',array('class'=>'nav-link')); ?>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="http://example.com/" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Transaksi</a>
            <div class="dropdown-menu" aria-labelledby="dropdown01">
              <?php echo anchor('transaksi','Form Transaksi',array('class'=>'dropdown-item')); ?>
              <?php echo anchor('transaksi/laporan','Laporan Transaksi',array('class'=>'dropdown-item')); ?>
            </div>
          </li> -->
        </ul>
        <form class="form-inline my-2 my-lg-0">
          <?php echo anchor('auth/logout','Logout',array('class'=>'btn btn-outline-secondary')); ?>
        </form>
      </div>
    </nav>

    <main role="main">

      <!-- Main jumbotron for a primary marketing message or call to action -->
      <div class="jumbotron">
        <div class="container">
            <?php echo $contents; ?>
        </div>
      </div>

      <div class="container">

      </div> <!-- /container -->

    </main>

    <footer class="container">

      <!-- <p>&copy; Company 2017-2018</p> -->
    </footer>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="<?php echo base_url() ?>assets/js/jquery-2.2.4.min.js" ></script>
    <script>window.jQuery || document.write('<script src="<?php echo base_url() ?>assets/js/jquery-2.2.4.min.js"><\/script>')</script>
    <script src="../../assets/js/popper.min.js"></script>
    <script src="<?php echo base_url() ?>assets/bootstrap/js/bootstrap.min.js"></script>
  </body>

<!-- Mirrored from getbootstrap.com/docs/4.1/examples/jumbotron/ by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 07 Nov 2018 23:42:01 GMT -->
</html>
