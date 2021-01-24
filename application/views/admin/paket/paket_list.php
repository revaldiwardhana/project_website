
        <!-- Main content -->
        <div class='animated fadeIn'>
            <div class='row mb-3'>
                <div class='col-md-12'>
                    <a class='btn btn-primary' href='<?=base_url('admin/paket/create')?>' role='button'><i class='fa fa-pencil-square-o'></i> Add PAKET</a>
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
		    <th>Jenis Paket</th>
		    <th>Jumlah Hari</th>
		    <th>Harga Paket</th>
		    <th>Rute</th>
		    <th>Gambar1</th>
		    <!-- <th>Gambar2</th>
		    <th>Gambar3</th> -->
		    <th>Aksi</th>
                </tr>
            </thead>
	    <tbody>
            <?php
            $start = 0;
            foreach ($paket_data as $paket)
            {
                ?>
                <tr>
		    <td><?php echo ++$start ?></td>
		    <td><?php echo $paket->jenis_paket ?></td>
		    <td><?php echo $paket->jumlah_hari ?></td>
		    <td><?php echo 'Rp. '.number_format($paket->harga_paket) ?></td>
		    <td><?php echo $paket->rute1 ?></td>
		    <td><a target="_blank" href="<?=base_url('upload/paket/'.$paket->gambar1)?>"> <?php echo $paket->gambar1 ?></a></td>
		    <!-- <td><a target="_blank" href="<?=base_url('upload/paket/'.$paket->gambar2)?>"> <?php echo $paket->gambar2 ?></a></td>
		    <td><a target="_blank" href="<?=base_url('upload/paket/'.$paket->gambar3)?>"> <?php echo $paket->gambar3 ?></a></td> -->
		    <td style="text-align:center" width="140px">
			<?php 
			echo '  '; 
			echo anchor(site_url('admin/paket/update/'.$paket->id_paket),'<i class="fa fa-pencil-square-o"></i>',array('title'=>'edit')); 
			echo '  '; 
			echo anchor(site_url('admin/paket/delete/'.$paket->id_paket),'<i class="fa fa-trash-o"></i>','title="delete" onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
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