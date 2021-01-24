
        <!-- Main content -->
        <div class='animated fadeIn'>
            <div class='row'>
                <div class='col-md-4'>
                    <div class='card'>
                        <div class="card-header">
                            <h4 class="card-title">Data Pembayaran</h4>
                        </div>
                        <div class='card-body'>
                            <table id="bootstrap-data-table" class="table table-striped table-bordered">
                                
                                <tbody>
                                    <tr>
                                        <td width="30%">Nama Penyewa</td>
                                        <td><?=$pembayaran->nama_lengkap ?></td>
                                    </tr>
                                    <tr>
                                        <td>Alamat</td>
                                        <td><?=$pembayaran->alamat ?></td>
                                    </tr>
                                    <tr>
                                        <td>No Telp</td>
                                        <td><?=$pembayaran->no_telp ?></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div><!-- /.box-body -->
                    </div><!-- /.box -->
                </div><!-- /.col -->
                <div class='col-md-8'>
                    <div class='card'>
                        <div class="card-header">
                            <h4 class="card-title">Data Pembayaran</h4>
                        </div>
                        <div class='card-body'>
                            <table id="bootstrap-data-table" class="table table-striped table-bordered">
                                
                                <tbody>
                                    <tr>
                                        <td>Tanggal Pemesanan</td>
                                        <td><?=date('d M Y h:i:s',strtotime($pembayaran->tanggal_pesan)) ?></td>
                                    </tr>
                                    <tr>
                                        <td>Tanggal Keberangkatan</td>
                                        <td><?=date('d M Y',strtotime($pembayaran->tanggal_keberangkatan)) ?></td>
                                    </tr>
                                    <tr>
                                        <td width="30%">Paket</td>
                                        <td><?=$pembayaran->jenis_paket ?></td>
                                    </tr>
                                    <tr>
                                        <td>Harga Sewa</td>
                                        <td><?=number_format($pembayaran->total_harga) ?></td>
                                    </tr>
                                    <tr>
                                        <td>Tanggal Bayar</td>
                                        <td><?=date('d M Y',strtotime($pembayaran->tanggal_bayar)) ?></td>
                                    </tr>
                                    <tr>
                                        <td>Nominal Pembayaran</td>
                                        <td><?=number_format($pembayaran->nominal_pembayaran) ?></td>
                                    </tr>
                                    <tr>
                                        <td>Bukti Transfer</td>
                                        <td><?='<a target="_blank" href="'.base_url('upload/bukti_bayar/'.$pembayaran->bukti_transfer).'">
                                        <img width="400" height="auto" src="'.base_url('upload/bukti_bayar/'.$pembayaran->bukti_transfer).'">
                                        </a>' ?></td>
                                    </tr>
                                </tbody>
                            </table>
                            <a href="<?=base_url('admin/pembayaran')?>"class="btn btn-primary">Kembali</a>
                        </div><!-- /.box-body -->
                    </div><!-- /.box -->
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.content -->