<!doctype html>
<html>
    <head>
        <title>harviacode.com - codeigniter crud generator</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
        <style>
            body{
                padding: 15px;
            }
        </style>
    </head>
    <body>
        <h2 style="margin-top:0px">Lokasi_laundry Read</h2>
        <table class="table">
	    <tr><td>Id User</td><td><?php echo $id_user; ?></td></tr>
	    <tr><td>Geom</td><td><?php echo $geom; ?></td></tr>
	    <tr><td>Jam Buka</td><td><?php echo $jam_buka; ?></td></tr>
	    <tr><td>Jam Tutup</td><td><?php echo $jam_tutup; ?></td></tr>
	    <tr><td>Foto</td><td><?php echo $foto; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('lokasi_laundry') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>