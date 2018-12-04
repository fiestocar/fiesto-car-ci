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
        <h2 style="margin-top:0px">Daftar Mobil</h2>
        <hr>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="varchar">No Plat <?php echo form_error('no_plat') ?></label>
            <input type="text" class="form-control" name="no_plat" id="no_plat" placeholder="No Plat" value="<?php echo $no_plat; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Merk <?php echo form_error('merk') ?></label>
            <input type="text" class="form-control" name="merk" id="merk" placeholder="Merk" value="<?php echo $merk; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Warna <?php echo form_error('warna') ?></label>
            <input type="text" class="form-control" name="warna" id="warna" placeholder="Warna" value="<?php echo $warna; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Tahun <?php echo form_error('tahun') ?></label>
            <input type="text" class="form-control" name="tahun" id="tahun" placeholder="Tahun" value="<?php echo $tahun; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Jenis Mobil <?php echo form_error('id_jenis') ?></label>
            <?php echo cmb_dinamis('id_jenis','jenis','nama_jenis','id_jenis',$id_jenis) ?>
            <!-- <input type="text" class="form-control" name="id_jenis" id="id_jenis" placeholder="Jenis Mobil" value="<?php echo $id_jenis; ?>" /> -->
        </div>
	    <div class="form-group">
            <label for="int">Kota <?php echo form_error('id_wilayah') ?></label>
            <?php echo cmb_dinamis('id_wilayah','wilayah','kota','id_wilayah',$id_wilayah) ?>
            <!-- <input type="text" class="form-control" name="id_wilayah" id="id_wilayah" placeholder="Id Wilayah" value="<?php echo $id_wilayah; ?>" /> -->
        </div>
	    <div class="form-group">
            <label for="int">Harga Sewa <?php echo form_error('harga_sewa') ?></label>
            <input type="text" class="form-control" name="harga_sewa" id="harga_sewa" placeholder="Harga Sewa" value="<?php echo $harga_sewa; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Kondisi <?php echo form_error('id_kondisi') ?></label>
            <?php echo cmb_dinamis('id_kondisi','kondisi','kondisi','id_kondisi',$id_kondisi) ?>
            <!-- <input type="text" class="form-control" name="id_kondisi" id="id_kondisi" placeholder="Id Kondisi" value="<?php echo $id_kondisi; ?>" /> -->
        </div>
	    <input type="hidden" name="id_mobil" value="<?php echo $id_mobil; ?>" />
	    <button type="submit" class="btn btn-warning">Simpan</button>
	    <a href="<?php echo site_url('mobil') ?>" class="btn btn-warning">Batal</a>
	</form>
    </body>
</html>
