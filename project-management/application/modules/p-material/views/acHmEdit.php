<div class="page-head">
    <h2 class="pull-left"><i class="fa fa-building-o"></i> Hutang Material</h2>
    <!-- Breadcrumb -->
    <div class="bread-crumb pull-right">
        <a href="index.html"><i class="fa fa-home"></i> Home</a> 
        <!-- Divider -->
        <span class="divider">/</span> 
        <a href="<?= base_url() . $this->uri->segment(1, 0) . '/' . $this->uri->segment(2, 0) . '/index' ?>" class="bread-current">HM</a>
        <span class="divider">/</span> 
        <a href="#" class="bread-current">Edit</a>
    </div>
    <div class="clearfix"></div>	
</div>
<!-- Page heading ends -->

<div class="col-md-12">
    <div class="widget wgreen">
        <div class="widget-head">
            <div class="pull-left">Edit HM</div>
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
                        <input type="hidden" name="ID_HM" id="id_hm" value="<?= $hm['HUTANG_BARANG_ID'] ?>"/>
                        <input type="hidden" name="main_project_pemberi" id="main_project_pemberi" value="<?= $hm['MPRO_ID_PEMBERI'] ?>"/>
                        <input type="hidden" name="project_pemberi" id="project_pemberi" value="<?= $hm['PROJECT_ID_PEMBERI'] ?>"/>
                        <input type="hidden" name="rab_pemberi" id="rab_pemberi" value="<?= $hm['RAB_PEMBERI'] ?>"/>
                        <input type="hidden" name="gudang_pemberi" id="gudang_pemberi" value="<?= $hm['GUDANG_PEMBERI'] ?>"/>
                        <input type="hidden" name="main_project_penerima" id="main_project_penerima" value="<?= $hm['MPRO_ID_PENERIMA'] ?>"/>
                        <input type="hidden" name="project_penerima" id="project_penerima" value="<?= $hm['PROJECT_ID_PENERIMA'] ?>"/>
                        <input type="hidden" name="rab_penerima" id="rab_penerima" value="<?= $hm['RAB_PENERIMA'] ?>"/>
                        <input type="hidden" name="gudang_penerima" id="gudang_penerima" value="<?= $hm['GUDANG_PENERIMA'] ?>"/>
                        <div class="form-group penerima">
                            <label class="col-lg-2 control-label">Main Project Penerima</label>
                            <div class="col-lg-5">
                                <input type="text" class="form-control" value="<?= $hm['MPRO_KODE_PENERIMA'] . ' ' . $hm['MPRO_NAMA_PENERIMA'] ?>" readonly=""/>
                            </div>
                        </div>
                        <div class="form-group penerima">
                            <label class="col-lg-2 control-label">Project Penerima</label>
                            <div class="col-lg-5">
                                <input readonly="" type="text" class="form-control" value="<?= $hm['PROJECT_KODE_PENERIMA'] . ' ' . $hm['PROJECT_NAMA_PENERIMA'] ?>"/>
                            </div>
                        </div>
                        <div class="form-group penerima">
                            <label class="col-lg-2 control-label">RAB Penerima</label>
                            <div class="col-lg-5">
                                <input type="text" readonly="" class="form-control" value="<?= $hm['RAB_KODE_PENERIMA'] ?>"/>
                            </div>
                        </div>
                        <div class="form-group penerima">
                            <label class="col-lg-2 control-label">Gudang Penerima</label>
                            <div class="col-lg-5">
                                <input type="text"  readonly="" class="form-control" value="<?= $hm['GUDANG_KODE_PENERIMA'] . ' ' . $hm['GUDANG_NAMA_PENERIMA'] ?>"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-2 control-label">Tanggal Mulai Berhutang</label>
                            <div class="col-lg-5">
                                <input type="text" name="tanggal_mulai_hutang" id="tanggal_mulai_hutang" class="form-control" value="<?= substr($hm['TANGGAL_MULAI_HUTANG'],0,10) ?>"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-2 control-label">Tanggal Prediksi Kembali</label>
                            <div class="col-lg-5">
                                <input type="text" name="tanggal_prediksi_kembali" id="tanggal_prediksi_kembali" class="form-control" value="<?= substr( $hm['TANGGAL_PREDIKSI_KEMBALI'],0,10) ?>"/>
                            </div>
                        </div>
                        <div class="form-group pemberi">
                            <label class="col-lg-2 control-label">Main Project Pemberi</label>
                            <div class="col-lg-5">
                                <input type="text" class="form-control"  readonly="" value="<?= $hm['MPRO_KODE_PEMBERI'] . ' ' . $hm['MPRO_NAMA_PEMBERI'] ?>"/>
                            </div>
                        </div>
                        <div class="form-group pemberi">
                            <label class="col-lg-2 control-label">Project Pemberi</label>
                            <div class="col-lg-5">
                                <input type="text" class="form-control" readonly="" value="<?= $hm['PROJECT_KODE_PEMBERI'] . ' ' . $hm['PROJECT_NAMA_PEMBERI'] ?>"/>
                            </div>
                        </div>
                        <div class="form-group pemberi">
                            <label class="col-lg-2 control-label">RAB Pemberi</label>
                            <div class="col-lg-5">
                                <input type="text" class="form-control" value="<?= $hm['RAB_KODE_PEMBERI'] ?>" readonly=""/>
                            </div>
                        </div>
                        <div class="form-group pemberi">
                            <label class="col-lg-2 control-label">Gudang Pemberi</label>
                            <div class="col-lg-5">
                                <input type="text" class="form-control" value="<?= $hm['GUDANG_KODE_PEMBERI'] . ' ' . $hm['GUDANG_NAMA_PEMBERI'] ?>" readonly=""/>
                            </div>
                            
                        </div>
                        <div class="form-group pemberi">
                            <label class="col-lg-2 control-label">PJ</label>
                            <div class="col-lg-5">
                                <input type="text" class="form-control" value="<?= $hm['PJ'] ?>" placeholder="Penanggung Jawab"/>
                            </div>
                            
                        </div>
                        <div class="form-group pemberi">
                            <label class="col-lg-2 control-label"></label>
                            
                            <div class="col-lg-2">
                                <button type="button" class="pull-left btn btn-sm btn-success saveForm" onclick="" id="button_show_stok_barang" style="">Pilih Barang</button>
                            </div>
                        </div>

                        <table class="table table-striped table-bordered table-hover" id="tabel_stok_barang_terpilih">
                            <thead>
                                <tr>
                                    <th>Kode</th>
                                    <th>Nama</th>
                                    <th>Jumlah Pinjam</th>
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
                    <?php if ($hm['STATUS_ID'] == '1') {
                        ?>
                        <div class="col-lg-6"> 
                            <button type="button" class="pull-right btn btn-lg btn-primary saveForm" onclick="save('1')"> Simpan Sebagai Draft</button>
                        </div>
                        <div class="col-lg-6">
                            <button type="button" class="pull-left btn btn-lg btn-success saveForm" onclick="save('2')"> Setujui</button>
                        </div>
                        <?php
                    } else if ($hm['STATUS_ID'] == '4') {
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
    var id_hm = '<?= $hm['HUTANG_BARANG_ID'] ?>';
</script>
<script type="text/javascript" src="<?= base_url() ?>assets/default/js/p-material/hm/js1.js"></script>
<script type="text/javascript" src="<?= base_url() ?>assets/default/js/p-material/hm/jsedit.js"></script>