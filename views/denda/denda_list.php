<!doctype html>
<html>
    <head>
        <title>Fiesto Car</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap.min.css') ?>"/>
        <style>
            body{
                padding: 15px;
            }
        </style>
    </head>
    <body>
        <h2 style="margin-top:0px">Daftar Denda</h2>
        <hr>
        <div class="row" style="margin-bottom: 10px">
            <div class="col-md-4">
                <?php echo anchor(site_url('denda/create'),'Tambah', 'class="btn btn-warning"'); ?>
            </div>
            <div class="col-md-4 text-center">
                <div style="margin-top: 8px" id="message">
                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                </div>
            </div>
            <div class="col-md-1 text-right">
            </div>
            <div class="col-md-3 text-right">
                <form action="<?php echo site_url('denda/index'); ?>" class="form-inline" method="get">
                    <div class="input-group">
                        <input type="text" class="form-control" name="q" value="<?php echo $q; ?>">
                        <span class="input-group-btn">
                            <?php
                                if ($q <> '')
                                {
                                    ?>
                                    <a href="<?php echo site_url('denda'); ?>" class="btn btn-warning">Reset</a>
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
		<th>Jenis Denda</th>
		<th>Biaya Denda</th>
		<th style="text-align:center" width="200px">Baca | Ubah | Hapus</th>
            </tr><?php
            foreach ($denda_data as $denda)
            {
                ?>
                <tr>
			<td width="80px"><?php echo ++$start ?></td>
			<td><?php echo $denda->jenis_denda ?></td>
			<td><?php echo $denda->biaya_denda ?></td>
			<td style="text-align:center" width="200px">
				<?php
				echo anchor(site_url('denda/read/'.$denda->id_denda),'Baca',array('title'=>'detail','class'=>'btn btn-primary btn-sm'));
				echo '  ';
				echo anchor(site_url('denda/update/'.$denda->id_denda),'Ubah',array('title'=>'ubah','class'=>'btn btn-warning btn-sm'));
				echo '  ';
				echo anchor(site_url('denda/delete/'.$denda->id_denda),'Hapus','title="hapus" class="btn btn-danger btn-sm" onclick="javasciprt: return confirm(\'Yakin dihapus ?\')"');
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
		<?php echo anchor(site_url('denda/excel'), 'Excel', 'class="btn btn-warning"'); ?>
		<?php echo anchor(site_url('denda/word'), 'Word', 'class="btn btn-warning"'); ?>
	    </div>
            <div class="col-md-6 text-right">
                <?php echo $pagination ?>
            </div>
        </div>
    </body>
</html>
