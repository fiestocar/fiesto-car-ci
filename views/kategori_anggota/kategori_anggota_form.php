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
        <h2 style="margin-top:0px">Kategori Anggota</h2>
        <hr>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="varchar">Kategori <?php echo form_error('kategori') ?></label>
            <hr>
            <input type="text" class="form-control" name="kategori" id="kategori" placeholder="Kategori" value="<?php echo $kategori; ?>" />
        </div>
	    <input type="hidden" name="id_kategori" value="<?php echo $id_kategori; ?>" />
	    <button type="submit" class="btn btn-warning">Simpan</button>
	    <a href="<?php echo site_url('kategori_anggota') ?>" class="btn btn-warning">Batal</a>
	</form>
    </body>
</html>
