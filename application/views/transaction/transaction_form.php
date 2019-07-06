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
        <h2 style="margin-top:0px">Transaction <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="int">Id Lokasi <?php echo form_error('id_lokasi') ?></label>
            <input type="text" class="form-control" name="id_lokasi" id="id_lokasi" placeholder="Id Lokasi" value="<?php echo $id_lokasi; ?>" />
        </div>
	    <div class="form-group">
            <label for="timestamp">Tgl Antar <?php echo form_error('tgl_antar') ?></label>
            <input type="text" class="form-control" name="tgl_antar" id="tgl_antar" placeholder="Tgl Antar" value="<?php echo $tgl_antar; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Weight <?php echo form_error('weight') ?></label>
            <input type="text" class="form-control" name="weight" id="weight" placeholder="Weight" value="<?php echo $weight; ?>" />
        </div>
	    <div class="form-group">
            <label for="timestamp">Tgl Jemput <?php echo form_error('tgl_jemput') ?></label>
            <input type="text" class="form-control" name="tgl_jemput" id="tgl_jemput" placeholder="Tgl Jemput" value="<?php echo $tgl_jemput; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Total Bayar <?php echo form_error('total_bayar') ?></label>
            <input type="text" class="form-control" name="total_bayar" id="total_bayar" placeholder="Total Bayar" value="<?php echo $total_bayar; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Status <?php echo form_error('status') ?></label>
            <input type="text" class="form-control" name="status" id="status" placeholder="Status" value="<?php echo $status; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Lat <?php echo form_error('lat') ?></label>
            <input type="text" class="form-control" name="lat" id="lat" placeholder="Lat" value="<?php echo $lat; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Lon <?php echo form_error('lon') ?></label>
            <input type="text" class="form-control" name="lon" id="lon" placeholder="Lon" value="<?php echo $lon; ?>" />
        </div>
	    <input type="hidden" name="id_user" value="<?php echo $id_user; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('transaction') ?>" class="btn btn-default">Cancel</a>
	</form>
    </body>
</html>