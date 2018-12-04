<!doctype html>
<html>
    <head>
        <title>Fiesto Car</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
        <style>
            body{
                padding: 15px;
            }
        </style>
    </head>
    <body>
        <h2 style="margin-top:0px">Jenis Mobil</h2>
        <hr>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="varchar">Nama Jenis <?php echo form_error('nama_jenis') ?></label>
            <input type="text" class="form-control" name="nama_jenis" id="nama_jenis" placeholder="Nama Jenis" value="<?php echo $nama_jenis; ?>" />
        </div>
	    <input type="hidden" name="id_jenis" value="<?php echo $id_jenis; ?>" />
	    <button type="submit" class="btn btn-warning">Simpan</button>
	    <a href="<?php echo site_url('jenis') ?>" class="btn btn-warning">Batal</a>
	</form>
    </body>
</html>
