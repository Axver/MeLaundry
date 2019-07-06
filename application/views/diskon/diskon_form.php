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
        <h2 style="margin-top:0px">Diskon <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="int">Jumlah Diskon <?php echo form_error('jumlah_diskon') ?></label>
            <input type="text" class="form-control" name="jumlah_diskon" id="jumlah_diskon" placeholder="Jumlah Diskon" value="<?php echo $jumlah_diskon; ?>" />
        </div>
	    <input type="hidden" name="id" value="<?php echo $id; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('diskon') ?>" class="btn btn-default">Cancel</a>
	</form>
    </body>
</html>