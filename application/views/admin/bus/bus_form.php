<!-- Main content -->
<div class="animated fadeIn">

  <form id="form-id" action="<?php echo $action; ?>" method="post" enctype="multipart/form-data">
  <div class='row'>

    <div class="mx-auto col-md-8">
        <div class='card'>
          <div class='card-header'>
            <strong class="card-title">INFO</strong> BUS
          </div>
                
          <div class='card-body'>
	    
        <div class="row">
          <div class="col-md-12 form-group">
          Jenis Bus <?php echo form_error('jenis_bus') ?>
          <input type="text" class="form-control" name="jenis_bus" id="jenis_bus" value="<?php echo $jenis_bus; ?>" />
          </div>
          </div>
	    
        <div class="row">
          <div class="col-md-12 form-group">
          Fasilitas Bus <?php echo form_error('fasilitas_bus') ?>
          <input type="text" class="form-control" name="fasilitas_bus" id="fasilitas_bus" value="<?php echo $fasilitas_bus; ?>" />
          </div>
          </div>

        <div class="row">
          <div class="col-md-12 form-group">
          Jumlah Tempat Duduk <?php echo form_error('jumlah_tempatduduk') ?>
          <input type="text" class="form-control" name="jumlah_tempatduduk" id="jumlah_tempatduduk" value="<?php echo $jumlah_tempatduduk; ?>" />
          </div>
          </div>

          <div class="row">
          <div class="col-md-12 form-group">
          Jumlah Bus <?php echo form_error('jumlah_bus') ?>
          <input type="text" class="form-control" name="jumlah_bus" id="jumlah_bus" value="<?php echo $jumlah_bus; ?>" />
          </div>
          </div>
          

	    <input type="hidden" name="id_bus" value="<?php echo $id_bus; ?>" /> 
	    <div class="row mt-4">
                      <div class="col-md-12 form-group"><button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('bus') ?>" class="btn btn-default">Cancel</a>
                      </div>
                    </div>
	
        </div>
      </div>
    </div>

    <div class="mx-auto col-md-4">
        <div class='card'>
          <div class='card-header'>
            <strong class="card-title">FOTO</strong> BUS
          </div>      
          <div class='card-body'>
	    
            <div class="row">
              
                <div class="col-md-12 form-group">
                    Foto Bus 1
                    <input type="file" name="bus1" id="bus1">
                    <?=$button == "Update"? "<a href=".base_url('upload/bus/'.$foto_bus->gambar1)."><img width='100%' src=".base_url('upload/bus/'.$foto_bus->gambar1)." alt=''></a>" : ""?>
                    
                </div>
                <div class="col-md-12 form-group">
                    Foto Bus 2
                    <input type="file" name="bus2" id="bus2">
                    <?=$button == "Update"? "<a href=".base_url('upload/bus/'.$foto_bus->gambar2)."><img width='100%' src=".base_url('upload/bus/'.$foto_bus->gambar2)." alt=''></a>" : ""?>
                </div>
                <div class="col-md-12 form-group">
                    Foto Bus 3
                    <input type="file" name="bus3" id="bus3">
                    <?=$button == "Update"? "<a href=".base_url('upload/bus/'.$foto_bus->gambar3)."><img width='100%' src=".base_url('upload/bus/'.$foto_bus->gambar3)." alt=''></a>" : ""?>
                </div>
                <div class="col-md-12 form-group">
                    Foto Bus 4
                    <input type="file" name="bus4" id="bus4">
                    <?=$button == "Update"? "<a href=".base_url('upload/bus/'.$foto_bus->gambar4)."><img width='100%' src=".base_url('upload/bus/'.$foto_bus->gambar4)." alt=''></a>" : ""?>
                </div>
                <div class="col-md-12 form-group">
                    Foto Bus 5
                    <input type="file" name="bus5" id="bus5">
                    <?=$button == "Update"? "<a href=".base_url('upload/bus/'.$foto_bus->gambar5)."><img width='100%' src=".base_url('upload/bus/'.$foto_bus->gambar5)." alt=''></a>" : ""?>
                </div>
                <div class="col-md-12 form-group">
                    Foto Bus 6
                    <input type="file" name="bus7" id="bus7">
                    <?=$button == "Update"? "<a href=".base_url('upload/bus/'.$foto_bus->gambar7)."><img width='100%' src=".base_url('upload/bus/'.$foto_bus->gambar7)." alt=''></a>" : ""?>
                </div>
               
            </div>
          </div>
        </div>
    </div>

  </div>
  </form>
</div><!-- .animated -->