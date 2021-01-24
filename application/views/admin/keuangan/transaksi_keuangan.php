<div class="animated fadeIn">

    <div class="row">
        <div class="mx-auto col-offet-2 col-md-8">
            <div class="card">
                <div class="card-header">
                    <strong class="card-title">FORM</strong> TRANSAKSI
                </div>
                <div class="card-body">
                    <form action="<?=$action?>" method="post">
                        <div class="row">
                            <div class="col-md-12 form-group">
                                <label for="nf-jenis_laporan" class=" form-control-label">Tanggal</label>
                                <input value="<?=$tanggal?>" type="text" id="tanggal" name="tanggal" class="form-control">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 form-group">
                                <label for="nf-jenis_laporan" class=" form-control-label">Jenis Pengeluaran</label>
                                <textarea autofocus value="<?=$jenis_pengeluaran?>" name="jenis_pengeluaran" id="jenis_pengeluaran" class="form-control" cols="30" rows="3"></textarea>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 form-group">
                                <label for="nf-jenis_laporan" class=" form-control-label">Jumlah Biaya</label>
                                <input value="<?=$jumlah_biaya_pengeluaran?>" type="text" id="jumlah_biaya_pengeluaran" name="jumlah_biaya_pengeluaran" class="form-control">
                            </div>
                        </div>
                        <div class="row mt-4">
                            <div class="col-md-12 form-group">
                                <button type="submit" class="btn btn-outline-success">SIMPAN</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div><!-- .animated -->
