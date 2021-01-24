
        <!-- Main content -->
        <div class='animated fadeIn'>
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
                                    <th>Tujuan</th>
                                    <th>Tanggal Berangkat & Kembali</th>
                                    <th>Uang Saku</th>
                                    <th>Warna Bus</th>
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
                            <td><?php echo $surat_tugas->nama_lengkap ?></td>
                            <td><?php echo $surat_tugas->kernet ?></td>
                            <td><?php echo $surat_tugas->jenis_paket ?></td>
                            <td><?php echo $surat_tugas->tanggal_keberangkatan.' - '.$surat_tugas->tanggal_kembali ?></td>
                            <td><?php echo number_format($surat_tugas->uang_saku) ?></td>
                            <td><?php echo $surat_tugas->warna_bus ?></td>
                            <td style="text-align:center" width="140px">
                            <?php 
                            echo anchor(site_url('supir/surat_tugas/read/'.$surat_tugas->id_surat_tugas),'<i class="fa fa-eye"></i>',array('title'=>'detail')); 
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