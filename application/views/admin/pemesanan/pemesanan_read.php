
        <!-- Main content -->
        <div class='animated fadeIn'>
            <div class='row'>
                <div class='col-md-4'>
                    <div class='card'>
                        <div class="card-header">
                            <h4 class="card-title">Data Penyewa</h4>
                        </div>
                        <div class='card-body'>
                            <table id="bootstrap-data-table" class="table table-striped table-bordered">
                                
                                <tbody>
                                    <tr>
                                        <td width="30%">Nama Penyewa</td>
                                        <td><?=$pemesanan->nama_lengkap ?></td>
                                    </tr>
                                    <tr>
                                        <td>Alamat</td>
                                        <td><?=$pemesanan->alamat ?></td>
                                    </tr>
                                    <tr>
                                        <td>No Telp</td>
                                        <td><?=$pemesanan->no_telp ?></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div><!-- /.box-body -->
                    </div><!-- /.box -->
                </div><!-- /.col -->
                <div class='col-md-8'>
                    <div class='card'>
                        <div class="card-header">
                            <h4 class="card-title">Data Pemesanan</h4>
                        </div>
                        <div class='card-body'>
                            <table id="bootstrap-data-table" class="table table-striped table-bordered">
                                
                                <tbody>
                                    <tr>
                                        <td>Tanggal Pemesanan</td>
                                        <td><?=date('d M Y h:i:s',strtotime($pemesanan->tanggal_pesan)) ?></td>
                                    </tr>
                                    <tr>
                                        <td>Tanggal Keberangkatan</td>
                                        <td><?=date('d M Y',strtotime($pemesanan->tanggal_keberangkatan)) ?></td>
                                    </tr>

                                    <tr>
                                        <td width="30%">Tujuan</td>
                                        <td><?=$pemesanan->jenis_paket ?></td>
                                    </tr>

                                    <tr>
                                        <td>Rute</td>
                                        <td><?=$pemesanan->rute1 ?></td>
                                    </tr>

                                    <tr>
                                        <td width="30%">Bus</td>
                                        <td><?=$pemesanan->jenis_bus ?></td>
                                    </tr>
                                    <tr>
                                        <td width="30%">Lokasi Penjemputan</td>
                                        <td><?=$pemesanan->lokasi_jemput ?></td>
                                    </tr>
                                    <tr>
                                        <td>Harga Sewa</td>
                                        <td><input form="update_harga" type="number" class="form-control" name="harga_sewa" id="harga_sewa" value="<?=$pemesanan->total_harga ?>"></td>
                                    </tr>
                                </tbody>
                            </table>
                            <a href="<?=base_url('admin/pemesanan')?>"class="btn btn-primary">Kembali</a>
                            <form action="<?=base_url("admin/pemesanan/update_hrg_sewa")?>" method="post" id="update_harga">
                                <input type="hidden" name="id_pemesanan" id="id_pemesanan" value="<?=$pemesanan->id_pemesanan?>">
                                <button type="submit" name="update" id="update" class="btn btn-warning">Update</button>
                            </form>
                        </div><!-- /.box-body -->
                    </div><!-- /.box -->
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.content -->