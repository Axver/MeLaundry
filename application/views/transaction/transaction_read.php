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
        <h2 style="margin-top:0px">Transaction Read</h2>
        <table class="table">
	    <tr><td>Id Lokasi</td><td><?php echo $id_lokasi; ?></td></tr>
	    <tr><td>Tgl Antar</td><td><?php echo $tgl_antar; ?></td></tr>
	    <tr><td>Weight</td><td><?php echo $weight; ?></td></tr>
	    <tr><td>Tgl Jemput</td><td><?php echo $tgl_jemput; ?></td></tr>
	    <tr><td>Total Bayar</td><td><?php echo $total_bayar; ?></td></tr>
	    <tr><td>Status</td><td><?php echo $status; ?></td></tr>
	    <tr><td>Lat</td><td><?php echo $lat; ?></td></tr>
	    <tr><td>Lon</td><td><?php echo $lon; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('transaction') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>