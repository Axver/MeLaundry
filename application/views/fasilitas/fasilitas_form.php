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
        <h2 style="margin-top:0px">Fasilitas <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="varchar">Nama Fasilitas <?php echo form_error('nama_fasilitas') ?></label>
            <input type="text" class="form-control" name="nama_fasilitas" id="nama_fasilitas" placeholder="Nama Fasilitas" value="<?php echo $nama_fasilitas; ?>" />
        </div>
	    <input type="hidden" name="id_fasilitas" value="<?php echo $id_fasilitas; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('fasilitas') ?>" class="btn btn-default">Cancel</a>
	</form>
    </body>
</html>