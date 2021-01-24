
        <!-- Main content -->
        <div class='animated fadeIn'>
            <div class='row'>
                <div class='col-md-12 text-right'>
                    <a class='btn btn-primary' href='<?=base_url('admin/perawatan/create')?>' role='button'><i class='fa fa-pencil-square-o'></i> Tambah Perawatan Baru</a>
                </div>
            </div>
            <div class='row'>
                <div class='col-md-12'>
                    <div class='card'>
                        <div class='card-body'>
                        <table id="bootstrap-data-table" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th width="80px">No</th>
		    <th>Bus</th>
            <th>Warna Bus</th>
		    <th>Jenis Perawatan</th>
		    <th>Tanggal Perawatan Bus</th>
		    <th>Harga</th>
		    <th>Aksi</th>
                </tr>
            </thead>
	    <tbody>
            <?php
            $start = 0;
            foreach ($perawatan_bus_data as $perawatan_bus)
            {
                ?>
                <tr>
		    <td><?php echo ++$start ?></td>
		    <td><?php echo $perawatan_bus->jenis_bus?></td>
            <td><?php echo $perawatan_bus->warna_bus ?></td>
		    <td><?php echo $perawatan_bus->jenis_perawatan ?></td>
		    <td><?php echo date('d-m-Y',strtotime($perawatan_bus->tanggal_perawatan_bus)) ?></td>
		    <td><?php echo number_format($perawatan_bus->harga) ?></td>
		    <td style="text-align:center" width="140px">
			<?php 
			echo anchor(site_url('admin/perawatan/read/'.$perawatan_bus->id_perawatan_bus),'<i class="fa fa-eye"></i>',array('title'=>'detail')); 
			echo '  '; 
			echo anchor(site_url('admin/perawatan/update/'.$perawatan_bus->id_perawatan_bus),'<i class="fa fa-pencil-square-o"></i>',array('title'=>'edit')); 
			echo '  '; 
			echo anchor(site_url('admin/perawatan/delete/'.$perawatan_bus->id_perawatan_bus),'<i class="fa fa-trash-o"></i>','title="delete" onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
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