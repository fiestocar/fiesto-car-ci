<!doctype html>
<html>
    <head>
        <title>Fiesto Car</title>
        <link rel="stylesheet" href="<?php echo base_url('<?php echo base_url(); ?>assets/bootstrap/css/bootstrap.min.css') ?>"/>
        <style>
            .word-table {
                border:1px solid black !important;
                border-collapse: collapse !important;
                width: 100%;
            }
            .word-table tr th, .word-table tr td{
                border:1px solid black !important;
                padding: 5px 10px;
            }
        </style>
    </head>
    <body>
        <h2>Kategori Anggota</h2>
        <hr>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>Kategori</th>

            </tr><?php
            foreach ($kategori_anggota_data as $kategori_anggota)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $kategori_anggota->kategori ?></td>
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>
