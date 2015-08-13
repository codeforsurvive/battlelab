<div class="page-head">
    <h2 class="pull-left"><i class="fa fa-building-o"></i> Bon Pemakaian Barang</h2>
    <!-- Breadcrumb -->
    <div class="bread-crumb pull-right">
        <a href="index.html"><i class="fa fa-home"></i> Home</a> 
        <!-- Divider -->
        <span class="divider">/</span> 
        <a href="<?= base_url() . $this->uri->segment(1, 0) . '/' . $this->uri->segment(2, 0) . '/index' ?>" class="bread-current">BPM</a>
        <span class="divider">/</span> 
        <a href="#" class="bread-current">Tambah</a>
    </div>
    <div class="clearfix"></div>
</div>
<!-- Page heading ends -->

<div class="col-md-12">
    <div class="widget wgreen">
        <div class="widget-head">
            <div class="pull-left">Tambah BPM</div>
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
                    <form id="formBPM" action="<?= base_url() ?>p-material/bpm/BPMAdd" method="post" class="form-horizontal" role="form">
                        <input type="hidden" name="flag" id="flag_save" value="0"/>
                        <div class="form-group">
                            <label class="col-lg-2 control-label">Gudang</label>
                            <div class="col-lg-5">
                                <select name="id_gudang" id="select_gudang" class="form-control" onchange="">
                                    <option value="0" disabled="" selected="">Pilih Gudang</option>
                                    <?php
                                    foreach ($list_gudang as $gudang) {
                                        echo '<option value="' . $gudang['GUDANG_ID'] . '">' . $gudang['GUDANG_KODE'] . ' | ' . $gudang['GUDANG_NAMA'] . ' ' . $gudang['GUDANG_LOKASI'] . '</option>';
                                    }
                                    ?>
                                </select>
                            </div>

                        </div>
                        <div class="form-group">
                            <label class="col-lg-2 control-label">Main Project</label>
                            <div class="col-lg-5">
                                <select name="" id="select_main_project" class="form-control" onchange="">
                                    <option value="x">Pilih Main Project</option>
                                    <?php
                                    foreach ($list_main_project as $mpro) {
                                        echo '<option value="' . $mpro['MAIN_PROJECT_ID'] . '">' . $mpro['MAIN_PROJECT_KODE'] . ' ' . $mpro['MAIN_PROJECT_NAMA'] . '</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-2 control-label">Project</label>
                            <div class="col-lg-5">
                                <select id="select_sub_project" name="id_project" class="form-control" onchange="">
                                    <option value="x">Pilih Project</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-2 control-label">RAB</label>
                            <div class="col-lg-5">
                                <select name="" id="select_rab" class="form-control" onchange="">
                                    <option value="x">Pilih RAB</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-2 control-label">Peminta Barang</label>
                            <div class="col-lg-5">
                                <input name="peminta_barang" id="peminta_barang" class="form-control" placeholder="Peminta Barang" type="text"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-2 control-label">Keterangan</label>
                            <div class="col-lg-5">
                                <textarea name="keterangan" id="bpm_keterangan" class="form-control" placeholder="Keterangan BPM"></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-2 control-label"></label>
                            <div class="col-lg-2">
                                <button type="button" class="pull-left btn btn-sm btn-success saveForm" onclick="" id="button_show_stok_barang" style="display: none">Pilih Barang</button>
                            </div>
                        </div>
                        <table class="table table-striped table-bordered table-hover" id="tabel_stok_barang_terpilih">
                            <thead>
                                <tr>
                                    <th>Kode</th>
                                    <th>Nama</th>
                                    <th>Jumlah BPM</th>
                                    <th>Jumlah Stok</th>
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
                    <div class="col-lg-6"> 
                        <button type="button" class="pull-right btn btn-lg btn-primary saveForm" onclick="save('1')"> Simpan Sebagai Draft</button>
                    </div>
                    <div class="col-lg-6">
                        <button type="button" class="pull-left btn btn-lg btn-success saveForm" onclick="save('2')"> Simpan untuk Disetujui</button>
                    </div>
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
                                    <th>Kode</th>
                                    <th>Nama</th>
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
</script>
<script type="text/javascript" src="<?= base_url() ?>assets/default/js/p-material/bpm/js1.js"></script>