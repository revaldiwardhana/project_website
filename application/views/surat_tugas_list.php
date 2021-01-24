
        <!-- Main content -->
        <div class='animated fadeIn'>
            <div class='row'>
                <div class='col-md-12'>
                    <a class='btn btn-outline-primary' href='#' role='button'><i class='fa fa-pencil-square-o'></i> Add SURAT_TUGAS</a>
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
		    <th>Id Bus</th>
		    <th>Id Paket</th>
		    <th>Id Order</th>
		    <th>Id Supir</th>
		    <th>Aksi</th>
                </tr>
            </thead>
	    <tbody>
            <?php
            $start = 0;
            foreach ($surat_tugas_data as $surat_tugas)
            {
                ?>
                <tr>
		    <td><?php echo ++$start ?></td>
		    <td><?php echo $surat_tugas->id_bus ?></td>
		    <td><?php echo $surat_tugas->id_paket ?></td>
		    <td><?php echo $surat_tugas->id_order ?></td>
		    <td><?php echo $surat_tugas->id_supir ?></td>
		    <td style="text-align:center" width="140px">
			<?php 
			echo anchor(site_url('surat_tugas/read/'.$surat_tugas->id_surat_tugas),'<i class="fa fa-eye"></i>',array('title'=>'detail')); 
			echo '  '; 
			echo anchor(site_url('surat_tugas/update/'.$surat_tugas->id_surat_tugas),'<i class="fa fa-pencil-square-o"></i>',array('title'=>'edit')); 
			echo '  '; 
			echo anchor(site_url('surat_tugas/delete/'.$surat_tugas->id_surat_tugas),'<i class="fa fa-trash-o"></i>','title="delete" onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
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