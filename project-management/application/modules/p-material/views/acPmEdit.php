<div class="page-head">
    <h2 class="pull-left"><i class="fa fa-building-o"></i> Pengembalian Material</h2>
    <!-- Breadcrumb -->
    <div class="bread-crumb pull-right">
        <a href="index.html"><i class="fa fa-home"></i> Home</a> 
        <!-- Divider -->
        <span class="divider">/</span> 
        <a href="<?= base_url() . $this->uri->segment(1, 0) . '/' . $this->uri->segment(2, 0) . '/index' ?>" class="bread-current">PP</a>
        <span class="divider">/</span> 
        <a href="#" class="bread-current">Tambah</a>
    </div>
    <div class="clearfix"></div>
</div>
<!-- Page heading ends -->

<div class="col-md-12">
    <div class="widget wgreen">
        <div class="widget-head">
            <div class="pull-left">Tambah HM</div>
            <div class="widget-icons pull-right">
                <a href="#" class="wminimize">
                    <i class="fa fa-chevron-up"></i>
                </a>
            </div>
            <div class="clearfix"></div>
        </div>
        <div class="widget-content" style="padding: 10px">
            <div class="page-tables">
                <div class="table-responsive">
                    <form id="formBPM" action="<?= base_url() . $this->uri->segment(1, 0) . '/' . $this->uri->segment(2, 0) ?>/edit" method="post" class="form-horizontal" role="form">
                        <input type="hidden" name="flag" id="flag_save" value="0"/>
                        <input type="hidden" name="ID_PM" id="kembali_material_id" value="<?= $pm['KEMBALI_BARANG_ID'] ?>"/>
                        <input type="hidden" name="ID_HM" id="hutang_material_id" value="<?= $pm['HM_ID'] ?>"/>

                        <div class="form-group">
                            <label class="col-lg-2 control-label">Kode PM</label>
                            <div class="col-lg-9">
                                <input class="form-control" value="<?= $pm['KEMBALI_BARANG_KODE'] ?>" placeholder="KODE disabled=""" readonly="true"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-2 control-label">Tanggal Transaksi</label>
                            <div class="col-lg-9">
                                <input id="" class="form-control" value="<?= $pm['TANGGAL_TRANSAKSI'] ?>" placeholder="Tanggal BPM" readonly="true"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-2 control-label">Kode HM</label>
                            <div class="col-lg-9">
                                <input id="" class="form-control" value="<?= $pm['HUTANG_BARANG_KODE'] ?>" placeholder="KODE BPM" readonly="true"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-2 control-label">Tanggal Transaksi HM</label>
                            <div class="col-lg-9">
                                <input id="" class="form-control" value="<?= $pm['TANGGAL_TRANSAKSI_HM'] ?>" placeholder="KODE BPM" readonly="true"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-2 control-label">Tanggal Mulai Hutang</label>
                            <div class="col-lg-9">
                                <input id="" class="form-control" value="<?= substr($pm['TANGGAL_MULAI_HUTANG'], 0, 10) ?>" placeholder="KODE BPM" readonly="true"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-2 control-label">Tanggal Prediksi Kembali</label>
                            <div class="col-lg-9">
                                <input id="" class="form-control" value="<?= substr($pm['TANGGAL_PREDIKSI_KEMBALI'], 0, 10) ?>" placeholder="KODE BPM" readonly="true"/>
                            </div>
                        </div>
                        <div class="form-group pemberi">
                            <div class="col-lg-2"></div>

                            <div class="col-lg-2">
                                <button type="button" class="pull-left btn btn-sm btn-success saveForm" onclick="" id="button_show_stok_barang" style="">Pilih Barang</button>
                            </div>
                        </div>

                        <table class="table table-striped table-bordered table-hover" id="tabel_stok_barang_terpilih">
                            <thead>
                                <tr>
                                    <th>Kode</th>
                                    <th>Nama</th>
                                    <th>Jumlah Kembali</th>
                                    <th>Sisa Jumlah Pinjam</th>
                                    <th>Sisa Jumlah Stok</th>
                                    <th>Satuan</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="" id="tabel_stok_barang_terpilih_body">
                            </tbody>
                        </table>
                        <div id="data_tambahan"></div>
                    </form>
                </div>
            </div>
            <div id="global_processing" class="dataTables_processing" style="display: none;"></div>
            <div class="page-tables">
                <br/>
                <div class="row">
                    <?php if ($pm['STATUS_ID'] == '1') {
                        ?>
                        <div class="col-lg-6"> 
                            <button type="button" class="pull-right btn btn-lg btn-primary saveForm" onclick="save('1')"> Simpan Sebagai Draft</button>
                        </div>
                        <div class="col-lg-6">
                            <button type="button" class="pull-left btn btn-lg btn-success saveForm" onclick="save('2')"> Setujui</button>
                        </div>
                        <?php
                    } else if ($pm['STATUS_ID'] == '4') {
                        ?>
                        <div class="col-lg-6"> 
                            <button type="button" class="pull-right btn btn-lg btn-primary saveForm" onclick="save('0')">Simpan Revisi</button>
                        </div>
                    <?php }
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="stokRABModal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" style="width: 1100px">
        <div class="modal-content" style="">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title">Pilih Barang</h4>
            </div>
            <div class="modal-body">
                <div class="page-tables">
                    <div class="table-responsive">
                        <div class="clearfix">
                            <br />
                        </div>
                        <table class="table table-striped table-bordered table-hover" id="tabel_stok_barang">
                            <thead>
                                <tr>
                                    <th>Kode Barang</th>
                                    <th>Nama Barang</th>
                                    <th style="width:130px">Jumlah Pinjam</th>
                                    <th style="width:130px">Jumlah Stok</th>
                                    <th style="width:100px">Satuan</th>
                                    <th style="width:100px">Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="" id="tabel_stok_barang_body">
                                <tr>
                                    <td colspan="5" style="text-align: center">-</td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="clearfix">
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal" aria-hidden="true">Tutup</button>
            </div>
        </div>
    </div>
</div>
<script>
    var base_url1 = '<?= base_url() ?>';
    var uri = '<?= $this->uri->segment(1, 0) . '/' . $this->uri->segment(2, 0) ?>';
    var base_url = base_url1 + uri;
    var id_pm = '<?= $pm['KEMBALI_BARANG_ID'] ?>';
</script>
<script type="text/javascript" src="<?= base_url() ?>assets/default/js/p-material/pm/js1.js"></script>
<script type="text/javascript" src="<?= base_url() ?>assets/default/js/p-material/pm/jsedit.js"></script>