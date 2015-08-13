<!-- Page heading -->
<div class="page-head">
    <h2 class="pull-left"><i class="fa fa-building-o"></i> Penerimaan Barang Baru</h2>
    <!-- Breadcrumb -->
    <div class="bread-crumb pull-right">
        <a href="index.html"><i class="fa fa-home"></i> Home</a> 
        <!-- Divider -->
        <span class="divider">/</span> 
        <a href="<?= base_url() . $this->uri->segment(1, 0) . '/' . $this->uri->segment(2, 0) . '/index' ?>" class="bread-current">PB</a>
        <span class="divider">/</span> 
        <a href="#" class="bread-current">Tambah</a>
    </div>
    <div class="clearfix"></div>
</div>
<!-- Page heading ends -->

<div class="col-md-12">
    <div class="widget wgreen">
        <div class="widget-head">
            <div class="pull-left">Tambah LPB Baru</div>
            <div class="widget-icons pull-right">
                <a href="#" class="wminimize">
                    <i class="fa fa-chevron-up"></i>
                </a>
            </div>
            <div class="clearfix"></div>
        </div>
        <div class="widget-content" style="padding: 10px">
            <form id="formPB" action="<?= base_url() . $this->uri->segment(1, 0) . '/' . $this->uri->segment(2, 0) . '/newLPB' ?>" method="post" class="form-horizontal" role="form">
                <div class="page-tables">
                    <div class="table-responsive">
                        <div  class="form-horizontal" role="form">
                            <div class="form-group">
                                <label class="col-lg-2 control-label">No Surat Jalan</label>
                                <div class="col-lg-5">
                                    <input name="LPB_SURAT_JALAN" id="LPB_SURAT_JALAN" class="form-control" placeholder="Nomor Surat Jalan" value=""/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-2 control-label">No Kendaraan</label>
                                <div class="col-lg-5">
                                    <input name="LPB_KENDARAAN" id="LPB_KENDARAAN" class="form-control" placeholder="Nomor Kendaraan"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-2 control-label">Gudang</label>
                                <div class="col-lg-5">
                                    <select name="id_gudang" id="select_gudang" class="form-control">
                                        <option value="0" disabled="" selected="">Pilih Gudang</option>

                                        <?php
                                        foreach ($list_gudang as $gudang) {
                                            echo '<option value="' . $gudang['GUDANG_ID'] . '">' . $gudang['GUDANG_KODE'] . ' ' . $gudang['GUDANG_NAMA'] . ' ' . $gudang['GUDANG_LOKASI'] . '</option>';
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-2 control-label">Supplier</label>
                                <div class="col-lg-5">
                                    <select name="id_supplier" id="select_supplier" class="form-control">
                                        <option value="0" disabled="" selected="">Pilih Supplier</option>
                                        <?php
                                        foreach ($list_supplier as $supplier) {
                                            echo '<option value="' . $supplier['SUPPLIER_ID'] . '">' . $supplier['SUPPLIER_KODE'] . ' ' . $supplier['SUPPLIER_NAMA'] . ' ' . $supplier['SUPPLIER_ALAMAT'] . '</option>';
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-2 control-label"></label>
                                <div class="col-lg-5">
                                    <button type="button" class="btn btn-sm btn-primary nextBtn" onclick="pilihPO()"><i class="fa fa-expand fa-fw"></i> Pilih PO</button>
                                </div>
                            </div>
                            <div class="barangBaru"></div>
                            <div class="form-group next">
                                <label class="col-lg-2 control-label"></label>
                                <div class="col-lg-10">
                                    <input id="flag_save" type="hidden" name="flag" value="0" />
    <!--                                <button type="button" class="btn btn-sm btn-primary nextBtn" onclick="next()"><i class="fa fa-plus fa-fw"></i> Next</button>-->
    <!--                                <button type="button" class="pull-right btn btn-sm btn-primary addBtn" onclick="modalAddRap()"><i class="fa fa-plus fa-fw"></i> Tambah</button>-->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="clearfix">
                    <br />
                </div>
                <div class="page-tables">
                    <div class="table-responsive" style="overflow-x: scroll">
                        <table class="table table-striped table-bordered table-hover" id="tabel_lpb">
                            <thead>
                                <tr>
                                    <th>Kode PO</th>
                                    <th>Kode Barang</th>
                                    <th>Nama Barang</th>
                                    <th>Volume LPB</th>
                                    <th>Volume PO</th>
                                    <th>Satuan</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="listBahan" id="tabel_lpb_body">
                            </tbody>
                        </table>
                        <div class="clearfix">
                        </div>
                    </div>
                    <br/>
                    <div class="row" ng-if="displayField(['<?= lpb::role_admin ?>'])">
                        <div class="col-lg-6"> 
                            <button type="button" class="pull-right btn btn-lg btn-primary saveForm" onclick="save('0')"> Simpan Sebagai Draft</button>
                        </div>
                        <div class="col-lg-6">
                            <button type="button" class="pull-left btn btn-lg btn-success saveForm" onclick="save('1')"> Simpan untuk validasi</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>

    </div>
</div>

<div id="modalPilihan" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog page-tables" style="width: 80%">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title"><b>Daftar Bahan</b></h4>
            </div>
            <div class="modal-body">
                <div class="widget-content">
                    <div class="table-responsive" >
                        <table cellpadding="0" cellspacing="0" border="0" id="data-table" width="100%" style="white-space: nowrap">
                            <thead>
                                <tr>
                                    <th>Nama Barang</th>
                                    <th>Kategori</th>
                                    <th>Kode</th>
                                    <th>Satuan</th>
                                    <th>Harga</th>
                                    <th>Pilih</th>
                                </tr>
                            </thead>
                            <tbody class="bodyBahan">
                                <tr>
                                    <td> </td>
                                    <td> </td>
                                    <td> </td>
                                    <td> </td>
                                    <td> </td>
                                    <td> </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="clearfix">
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal" aria-hidden="true">Close</button>
                <!--<button type="button" class="btn btn-primary">Save changes</button>-->
            </div>
        </div>
    </div>
</div>

<div id="modalEdit" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog page-tables">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title"><b>Detail Barang</b></h4>
            </div>
            <div class="modal-body">
                <div class="form-horizontal">
                    <div class="form-group">
                        <label class="col-lg-3 control-label">Nama Barang</label>
                        <div class="col-lg-5">
                            <input type="hidden" id="BARANG_ID" class="form-control" name="BARANG_ID">
                            <input type="text" id="BARANG_NAMA" class="form-control" name="BARANG_NAMA" readonly="true">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-3 control-label">Satuan</label>
                        <div class="col-lg-5">
                            <input type="text" id="SATUAN_NAMA" class="form-control" name="SATUAN_NAMA" readonly="true">
                        </div>
                    </div>
                    <!--                    <div class="form-group">
                                            <label class="col-lg-3 control-label">Harga</label>
                                            <div class="col-lg-5">
                                                <input type="text" id="BARANG_HARGA" class="form-control" name="BARANG_HARGA" readonly="true">
                                            </div>
                                        </div>-->
                    <div class="form-group">
                        <label class="col-lg-3 control-label">Volume</label>
                        <div class="col-lg-5">
                            <input type="text" id="VOLUME" class="form-control" name="VOLUME" placeholder="Volume" onkeyup="calculate($('#BARANG_HARGA').val(), $('#VOLUME').val())">
                        </div>
                    </div>
                    <!--                    <div class="form-group">
                                            <label class="col-lg-3 control-label">Sub Total</label>
                                            <div class="col-lg-5">
                                                <input type="text" id="SUBTOTAL" class="form-control" name="SUBTOTAL" placeholder="Sub Total" readonly="true">
                                            </div>
                                        </div>-->
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal" aria-hidden="true">Close</button>
                <button type="button" class="btn btn-primary" data-dismiss="modal" onclick="saveBarang($('#BARANG_ID').val(), $('#VOLUME').val(), $('#SUBTOTAL').val())">Save changes</button>
            </div>
        </div>
    </div>
</div>
<div id="pilihPOModal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" style="width: 1100px">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title">Pilih PO</h4>
            </div>
            <div class="modal-body">
                <div class="widget-content">
                    <div class="form-horizontal">
                        <div class="form-group">
                            <div class="col-lg-6">
                                <select name="PURCHASE_ORDER_ID" id="select_main_project" class="form-control" onchange="">
                                    <option value="x">Pilih Main Project</option>
                                </select>
                            </div>
                            <div class="col-lg-6">
                                <select name="PURCHASE_ORDER_ID" id="select_rab" class="form-control" onchange="">
                                    <option value="x">Pilih RAB</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-lg-6">
                                <select name="PURCHASE_ORDER_ID" id="select_project" class="form-control" onchange="">
                                    <option value="x">Pilih SubProject</option>
                                </select>
                            </div>
                            <div class="col-lg-6">
                                <select name="PURCHASE_ORDER_ID" id="select_po" class="form-control" onchange="">
                                    <option value="x">Pilih PO</option>
                                </select>
                            </div>
                        </div>
                        <div id="detailPO2" style="display:none">
                            <table class="table table-bordered centerTable">
                                <thead>
                                    <tr class="label-info">
                                        <th colspan="6">Keterangan Purchase Order</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td width="100" class="ket_po"><b>PO Kode</b></td>
                                        <td id="td_po_kode"></td>
                                        <td class="ket_po"><b>Kategori</b></td>
                                        <td id="td_kategori_po"></td>
                                        <td class="ket_po"><b>Supplier</b></td>
                                        <td id="td_supplier"></td>
                                    </tr>
                                    <tr>
                                        <td width="100" class="ket_po"><b>RAB Kode</b></td>
                                        <td id="td_rab_kode"></td>
                                        <td class="ket_po"><b>TOP</b></td>
                                        <td id="td_top"></td>
                                        <td class="ket_po"><b>Gudang</b></td>
                                        <td id="td_gudang"></td>
                                    </tr>
                                    <tr>
                                        <td width="100" class="ket_po"><b>RAB Nama</b></td>
                                        <td id="td_rab_nama"></td>
                                        <td width="100" class="ket_po"><b>Tanggal PO</b></td>
                                        <td id="td_po_tanggal"></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div id="global_processing" class="dataTables_processing" style="display: none;z-index: 2000"></div>
                        <div class="page-tables">
                            <div class="table-responsive" id="div_tabel_detail_po" style="display: none; margin-top: 20px;">
                                <table cellpadding="0" cellspacing="0" border="0" width="100%" style="white-space: nowrap" id="tabel_detail_po">
                                    <thead>
                                        <tr>
                                            <th>Kode</th>
                                            <th>Nama Barang</th>
                                            <th>Kategori</th>
                                            <th>Volume PO</th>
                                            <th>Sisa Volume PO</th>
                                            <th>Satuan</th>
                                            <th>Pilih</th>
                                        </tr>
                                    </thead>
                                    <tbody class="" id="tabel_detail_po_body">
                                    </tbody>
                                </table>
                                <div class="clearfix">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <!--                <button type="button" class="btn btn-primary" aria-hidden="true" onclick="tambahkanPO()">Pilih</button>-->
                <button type="button" class="btn btn-default" data-dismiss="modal" aria-hidden="true">Tutup</button>
            </div>
        </div>
    </div>
</div>
<div id="deleteModal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title">Konfirmasi penghapusan barang</h4>
            </div>
            <div class="modal-body">
                <h3 class="namaBarangHapus">Anda yakin untuk menghapus item ini?</h3>
                <input type="hidden" value="" name="tobe_deleted_id" id="tobe_deleted_id" />
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" onclick="deleteBarang($('#tobe_deleted_id').val());">Ya</button>
                <button type="button" class="btn btn-default" data-dismiss="modal" aria-hidden="true">Tidak</button>
            </div>
        </div>
    </div>
</div>
<script>
    var base_url1 = '<?= base_url() ?>';
    var uri = '<?= $this->uri->segment(1, 0) . '/' . $this->uri->segment(2, 0) ?>';
    var base_url = base_url1 + uri;
</script>
<script type="text/javascript" src="<?= base_url() ?>assets/default/js/p-material/lpb/js1.js"></script>