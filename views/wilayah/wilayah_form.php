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
        <h2 style="margin-top:0px">Wilayah Operasi</h2>
        <hr>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="varchar">Kota <?php echo form_error('kota') ?></label>
            <input type="text" class="form-control" name="kota" id="kota" placeholder="Kota" value="<?php echo $kota; ?>" />
        </div>
	    <input type="hidden" name="id_wilayah" value="<?php echo $id_wilayah; ?>" />
	    <button type="submit" class="btn btn-warning">Simpan</button> 
	    <a href="<?php echo site_url('wilayah') ?>" class="btn btn-warning">Batal</a>
	</form>
    </body>
</html>
