
        <!-- Main content -->
        <div class='animated fadeIn'>
            <div class='row'>
                <div class='col-md-12 text-right'>
                    <a class='btn btn-primary btn-sm' href='<?=base_url('admin/surat_tugas/create')?>' role='button'><i class='fa fa-pencil-square-o'></i> Tambah Surat Tugas Baru</a>
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
                                    <th>Nama Supir</th>
                                    <th>Kernet</th>
                                    <th>Jenis Bus</th>
                                    <th>Tujuan</th>
                                    <th>Tanggal Berangkat & Kembali</th>
                                    <th>Uang Saku</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                        <tbody>
                            <?php
                            $start = 0;
                            foreach ($surat as $surat_tugas)
                            {
                                ?>
                                <tr>
                            <td><?php echo ++$start ?></td>
                            <td><?php echo $surat_tugas->nama_lengkap ?></td>
                            <td><?php echo $surat_tugas->kernet ?></td>
                            <td><?php echo $surat_tugas->jenis_bus ?></td>
                            <td><?php echo $surat_tugas->jenis_paket ?></td>
                            <td><?php echo $surat_tugas->tanggal_keberangkatan.' - '.$surat_tugas->tanggal_kembali ?></td>
                            <td><?php echo number_format($surat_tugas->uang_saku) ?></td>
                            <td style="text-align:center" width="140px">
                            <?php 
                            echo anchor(site_url('admin/surat_tugas/read/'.$surat_tugas->id_surat_tugas),'<i class="fa fa-eye"></i>',array('title'=>'detail')); 
                            echo '  '; 
                            echo anchor(site_url('admin/surat_tugas/update/'.$surat_tugas->id_surat_tugas),'<i class="fa fa-pencil-square-o"></i>',array('title'=>'edit')); 
                            echo '  '; 
                            echo anchor(site_url('admin/surat_tugas/delete/'.$surat_tugas->id_surat_tugas),'<i class="fa fa-trash-o"></i>','title="delete" onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
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