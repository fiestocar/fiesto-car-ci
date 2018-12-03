<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/main.css') ?>">

    <title>Masuk Member</title>
  </head>
  <body>

    <nav class="navbar navbar-dark background">
      <div class="container">
        <a class="navbar-brand" href="#"><span class="text-logo">Fiesto Car</span></a>

        <div class="ml-auto">
          <ul class="navbar-nav">
            <li class="nav-item">
              <div class="btn-group">
                <a href="#" class="btn btn-outline-light">Daftar</a>
                <a href="#" class="btn btn-outline-light">Masuk</a>
              </div>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <nav class="navbar navbar-expand-sm navbar-light bg-light bayang">
      <div class="container">
        <button class="navbar-toggler ml-auto" type="button" data-toggle="collapse" data-target="#navbarsExample03" aria-controls="navbarsExample03" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarsExample03">
          <ul class="navbar-nav mr-auto text-center">
            <li class="nav-item">
              <a class="nav-link font-weight-bold" href="#">Sewa Mobil</a>
            </li>
            <li class="nav-item">
              <a class="nav-link font-weight-bold" href="#">Tentang</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    
    <div class="pemberitahuan">
      <?php echo $this->session->flashdata('gagal_masuk'); ?>
    </div>

    <?php echo form_open('masuk/proses_masuk',array('class'=>'form-signin'));?>
      <div class="text-center mb-2">
        <h1 class="mb-4 font-weight-light">Masuk</h1>
      </div>
      <div class="form-group my-3">
        <label for="email">Email Anda</label>
        <input type="email" id="email" name="email" class="form-control" required autofocus>
      </div>
      <div class="form-group my-3">
        <label for="kata_sandi">Kata Sandi</label>
        <input type="password" id="kata_sandi" name="kata_sandi" class="form-control" required>
      </div>
      <button class="btn btn-outline-danger btn-block" type="submit">Masuk</button>
    </form>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>