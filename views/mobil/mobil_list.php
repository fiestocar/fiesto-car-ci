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
        <div class="row" style="margin-bottom: 10px">
            <div class="col-md-4">
                <?php echo anchor(site_url('mobil/create'),'Tambah', 'class="btn btn-warning"'); ?>
            </div>
            <div class="col-md-4 text-center">
                <div style="margin-top: 8px" id="message">
                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                </div>
            </div>
            <div class="col-md-1 text-right">
            </div>
            <div class="col-md-3 text-right">
                <form action="<?php echo site_url('mobil/index'); ?>" class="form-inline" method="get">
                    <div class="input-group">
                        <input type="text" class="form-control" name="q" value="<?php echo $q; ?>">
                        <span class="input-group-btn">
                            <?php
                                if ($q <> '')
                                {
                                    ?>
                                    <a href="<?php echo site_url('mobil'); ?>" class="btn btn-warning">Reset</a>
                                    <?php
                                }
                            ?>
                          <button class="btn btn-warning" type="submit">Cari</button>
                        </span>
                    </div>
                </form>
            </div>
        </div>
        <table class="table table-bordered" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>No Plat</th>
		<th>Merk</th>
		<th>Tahun</th>
		<th>Jenis</th>
		<th>Kota</th>
		<th>Harga Sewa</th>
		<th>Kondisi</th>
		<th style="text-align:center" width="200px">Baca | Ubah | Hapus</th>
            </tr><?php
            foreach ($mobil_data as $mobil)
            {
                ?>
                <tr>
			<td width="80px"><?php echo ++$start ?></td>
			<td><?php echo $mobil->no_plat ?></td>
			<td><?php echo $mobil->merk ?></td>
			<td><?php echo $mobil->tahun ?></td>
			<td><?php echo $mobil->nama_jenis ?></td>
			<td><?php echo $mobil->kota ?></td>
			<td><?php echo $mobil->harga_sewa ?></td>
			<td><?php echo $mobil->kondisi ?></td>
			<td style="text-align:center" width="200px">
				<?php
				echo anchor(site_url('mobil/read/'.$mobil->id_mobil),'<i class="fa fa-eye"></i>',array('title'=>'detail','class'=>'btn btn-primary btn-sm'));
				echo '  ';
				echo anchor(site_url('mobil/update/'.$mobil->id_mobil),'<i class="fa fa-pencil-square-o"></i>',array('title'=>'ubah','class'=>'btn btn-warning btn-sm'));
				echo '  ';
				echo anchor(site_url('mobil/delete/'.$mobil->id_mobil),'<i class="fa fa-trash-o"></i>','title="hapus" class="btn btn-danger btn-sm" onclick="javasciprt: return confirm(\'Are You Sure ?\')"');
				?>
			</td>
		</tr>
                <?php
            }
            ?>
        </table>
        <div class="row">
            <div class="col-md-6">
                <a href="#" class="btn btn-warning">Total Record : <?php echo $total_rows ?></a>
		<?php echo anchor(site_url('mobil/excel'), 'Excel', 'class="btn btn-warning"'); ?>
		<?php echo anchor(site_url('mobil/word'), 'Word', 'class="btn btn-warning"'); ?>
	    </div>
            <div class="col-md-6 text-right">
                <?php echo $pagination ?>
            </div>
        </div>
    </body>
</html>
