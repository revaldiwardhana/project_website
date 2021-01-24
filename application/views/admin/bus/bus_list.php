
        <!-- Main content -->
        <div class='animated fadeIn'>
            <div class='row mb-3'>
                <!-- <div class='col-md-12 text-right'>
                    <a class='btn btn-primary' href='<?=base_url('admin/bus/create')?>' role='button'><i class='fa fa-pencil-square-o'></i> Tambah Bus Baru</a>
                </div> -->
            </div>
            <div class='row'>
                <div class='col-md-12'>
                    <div class='card'>
                        <div class='card-body'>
                        <table id="bootstrap-data-table" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th width="80px">No</th>
		    
		    <th>Jenis Bus</th>
		    <th>Fasilitas Bus</th>
		    <th>Jumlah Tempat Duduk</th>
            <th>Jumlah Bus</th>
		    <th>Aksi</th>
                </tr>
            </thead>
	    <tbody>
            <?php
            $start = 0;
            foreach ($bus_data as $bus)
            {
                ?>
                <tr>
		    <td><?php echo ++$start ?></td>
		    
		    <td><?php echo $bus->jenis_bus ?></td>
		    <td><?php echo $bus->fasilitas_bus ?></td>
		    <!-- <td><?php echo 'Rp '.number_format($bus->harga_sewa) ?></td> -->
		    <td><?php echo $bus->jumlah_tempatduduk ?></td>
            <td><?php echo $bus->jumlah_bus ?></td>
		    <td style="text-align:center" width="140px">
			<?php 
			echo anchor(site_url('admin/bus/read/'.$bus->id_bus),'<i class="fa fa-eye"></i>',array('title'=>'detail')); 
			echo '  '; 
			echo anchor(site_url('admin/bus/update/'.$bus->id_bus),'<i class="fa fa-pencil-square-o"></i>',array('title'=>'edit')); 
			echo '  '; 
			echo anchor(site_url('admin/bus/delete/'.$bus->id_bus),'<i class="fa fa-trash-o"></i>','title="delete" onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
			?>
		    </td>
	        </tr>
                <?php
            }
            ?>
            </tbody>
        </table>
        
                    </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.content -->