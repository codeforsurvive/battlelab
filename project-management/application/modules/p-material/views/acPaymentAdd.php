<div class="page-head">
    <h2 class="pull-left"><i class="fa fa-building-o"></i> Payment</h2>
    <!-- Breadcrumb -->
    <div class="bread-crumb pull-right">
        <a href="index.html"><i class="fa fa-home"></i> Home</a> 
        <!-- Divider -->
        <span class="divider">/</span> 
        <a href="<?= base_url() . $this->uri->segment(1, 0) . '/' . $this->uri->segment(2, 0) . '/index' ?>" class="bread-current">Payment</a>
        <span class="divider">/</span> 
        <a href="#" class="bread-current">Tambah</a>
    </div>
    <div class="clearfix"></div>
</div>
<!-- Page heading ends -->

<div class="col-md-12">
    <div class="widget wgreen">
        <div class="widget-head">
            <div class="pull-left">Tambah Payment</div>
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
                    <form id="formBPM" action="<?= base_url() . $this->uri->segment(1, 0) . '/' . $this->uri->segment(2, 0) ?>/createNew" method="post" class="form-horizontal" role="form">
                        <input type="hidden" name="flag" id="flag_save" value="0"/>
                        <input type="hidden" name="id_payment" id="id_payment" value="0"/>
                        <input type="hidden" name="id_invoice" id="id_invoice" value="0"/>
						<input type="hidden" name="id_lpu" id="id_lpu" value="0"/>
                        <div class="form-group">
                            <label class="col-lg-2 control-label">Main Project</label>
                            <div class="col-lg-5">
                                <select name="main_project" id="select_main_project" class="form-control" onchange="">
                                    <option value="0" disabled=""  selected="">Pilih Main Project</option>
                                    <?php foreach ($listMainProject as $MainProject) { ?>
                                        <option value="<?= $MainProject['MAIN_PROJECT_ID'] ?>"><?= $MainProject['MAIN_PROJECT_KODE'] . ' ' . $MainProject['MAIN_PROJECT_NAMA'] ?></option>
                                    <?php } ?>    
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-2 control-label">Project</label>
                            <div class="col-lg-5">
                                <select  id="select_project" class="form-control" onchange="">
                                    <option value="x">Pilih Project</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-2 control-label">RAB</label>
                            <div class="col-lg-5">
                                <select name="rab" id="select_rab" class="form-control" onchange="">
                                    <option value="x">Pilih RAB</option>
                                </select>
                            </div>
                        </div>
						<div class="form-group">
                            <label class="col-lg-2 control-label">Jenis Payment</label>
                            <div class="col-lg-5">
                                <select name="jenis_payment" id="select_jenis_payment" class="form-control" onchange="">
                                    <option value="material">Material</option>
									<option value="upah">Upah</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group" id="div_select_supplier">
                            <label class="col-lg-2 control-label">Supplier</label>
                            <div class="col-lg-5">
                                <select name="supplier" id="select_supplier" class="form-control" onchange="">
                                    <option value="0">Pilih Supplier</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group" id="div_invoice_terpilih" style="display: none">
                            <label class="col-lg-2 control-label">Invoice</label>
                            <div class="col-lg-5">
                                <input type="text" id="text_invoice_terpilih" readonly="" class="form-control"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-lg-2"></div>
                            <div class="col-lg-2">
                                <button type="button" class="pull-left btn btn-sm btn-success saveForm" onclick="" id="button_show_stok_barang" style="display: none">Pilih Invoice</button>
                            </div>
                        </div>
                        <table class="table table-striped table-bordered table-hover" id="tabel_detail_invoice">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Kode </th>
                                    <th>Nama </th>
                                    <th>Volume</th>
                                    <th>Harga Satuan</th>
                                    <th colspan="1">Diskon</th>
                                    <th colspan="2">Pajak</th>
                                    <th>Harga</th>
                                </tr>
                            </thead>
                            <tbody class="" id="tabel_detail_invoice_body">
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
                        <button type="button" class="pull-left btn btn-lg btn-success saveForm" onclick="save('2')"> Simpan Untuk Validasi</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="invoiceModal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" style="width: 1100px">
        <div class="modal-content" style="">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title">Daftar Invoice</h4>
            </div>
            <div class="modal-body">
                <div class="page-tables">
                    <div class="table-responsive">
                        <div class="clearfix">
                            <br />
                        </div>
                        <table class="table table-striped table-bordered table-hover" id="tabel_list_invoice">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Kode Invoice</th>
                                    <th>Tanggal Invoice</th>
                                    <th>RAB</th>
                                    <th>Supplier</th>
                                    <th>Total Harga</th>
                                    <th style="width:100px">Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="" id="tabel_list_invoice_body">
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
<div id="lpu_modal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" style="width: 1100px">
        <div class="modal-content" style="">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title">Daftar LPU</h4>
            </div>
            <div class="modal-body">
                <div class="page-tables">
                    <div class="table-responsive">
                        <div class="clearfix">
                            <br />
                        </div>
                        <table class="table table-striped table-bordered table-hover" id="tabel_list_lpu">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Kode LPU</th>
                                    <th>Tanggal Transaksi</th>
                                    <th>RAB</th>
                                    <th>Total Harga</th>
                                    <th style="width:100px">Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="" id="tabel_list_lpu_body">
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
<script type="text/javascript" src="<?= base_url() ?>assets/default/js/p-material/payment/js1.js"></script>
