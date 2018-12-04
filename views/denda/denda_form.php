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
        <h2 style="margin-top:0px">Daftar Denda</h2>
        <hr>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="varchar">Jenis Denda <?php echo form_error('jenis_denda') ?></label>
            <input type="text" class="form-control" name="jenis_denda" id="jenis_denda" placeholder="Jenis Denda" value="<?php echo $jenis_denda; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Biaya Denda <?php echo form_error('biaya_denda') ?></label>
            <input type="text" class="form-control" name="biaya_denda" id="biaya_denda" placeholder="Biaya Denda" value="<?php echo $biaya_denda; ?>" />
        </div>
	    <input type="hidden" name="id_denda" value="<?php echo $id_denda; ?>" />
	    <button type="submit" class="btn btn-warning">Simpan</button> 
	    <a href="<?php echo site_url('denda') ?>" class="btn btn-warning">Batal</a>
	</form>
    </body>
</html>
