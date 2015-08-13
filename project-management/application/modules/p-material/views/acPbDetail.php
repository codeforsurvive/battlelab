<style>
    th, td {
        white-space: nowrap; 
    }
</style>
<!-- Page heading -->
<div class="page-head">
    <h2 class="pull-left"><i class="fa fa-building-o"></i> Laporan Penerimaan Barang</h2>
    <!-- Breadcrumb -->
    <div class="bread-crumb pull-right">
        <a href="index.html"><i class="fa fa-home"></i> Home</a> 
        <!-- Divider -->
        <span class="divider">/</span> 
        <a href="<?= base_url() . $this->uri->segment(1, 0) . '/' . $this->uri->segment(2, 0) . '/index' ?>" class="bread-current">PB</a>
        <span class="divider">/</span> 
        <a href="#" class="bread-current">Detail</a>
    </div>
    <div class="clearfix"></div>
</div>
<!-- Page heading ends -->

<div class="col-md-12">
    <div class="widget wgreen">
        <div class="widget-head">
            <div class="pull-left">Detail LPB</div>
            <div class="widget-icons pull-right">
                <a href="#" class="wminimize">
                    <i class="fa fa-chevron-up"></i>
                </a>
                <!--                <a href="#" class="wclose">
                                    <i class="fa fa-times"></i>
                                </a>-->
            </div>
            <div class="clearfix"></div>
        </div>
        <div class="widget-content" style="padding: 10px">
            <div class="padd">
                <img onclick="exportModal('xls');" src="<?= base_url(); ?>assets/default/img/icons/excel.png" class="icons" title="Export to XLS" />
                <img onclick="exportModal('doc');" src="<?= base_url(); ?>assets/default/img/icons/word.png" class="icons" title="Export to DOC" />
                <a href="<?= base_url() . $this->uri->segment(1, 0) . '/' . $this->uri->segment(2, 0) ?>/printPDF?id=<?= $lpb['PENERIMAAN_BARANG_ID'] ?>" target="_blank"><img src="<?= base_url(); ?>assets/default/img/icons/pdf.png" class="icons" title="Export to PDF" /></a>
            </div>
            <div class="page-tables">
                <div class="table-responsive" style="overflow-x: auto">
                    <div id="formPB"  class="form-horizontal" role="form">
                        <table class="table table-bordered centerTable">
                            <thead>
                                <tr class="label-info">
                                    <th colspan="6">Keterangan Penerimaan Barang</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td width="100" class="ket_po"><b>Kode LPB</b></td>
                                    <td><?= $lpb['PENERIMAAN_BARANG_KODE'] ?></td>
                                    <td class="ket_po"><b>Tanggal Transaksi</b></td>
                                    <td><?= $lpb['PENERIMAAN_BARANG_TANGGAL'] ?></td>
                                    <td class="ket_po"><b>Status Validasi</b></td>
                                    <td><?= $lpb['STATUS_LPB_NAMA'] ?></td>
                                </tr>
                                <tr>
                                    <td width="100" class="ket_po"><b>Surat Jalan</b></td>
                                    <td><?= $lpb['LPB_SURAT_JALAN'] ?></td>
                                    <td class="ket_po"><b>Gudang</b></td>
                                    <td><?= $lpb['GUDANG_NAMA'] . ' ' . $lpb['GUDANG_LOKASI'] ?></td>
                                    <td class="ket_po"><b>Tanggal Validasi</b></td>
                                    <td><?= $lpb['PENERIMAAN_BARANG_TANGGAL_VALIDASI'] ?></td>
                                </tr>
                                <tr>
                                    <td width="100" class="ket_po"><b>No Kendaraan</b></td>
                                    <td><?= $lpb['LPB_KENDARAAN'] ?></td>
                                    <td class="ket_po"><b>Supplier</b></td>
                                    <td><?= $lpb['SUPPLIER_NAMA'] . ' ' . $lpb['SUPPLIER_ALAMAT'] ?></td>

                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="page-tables">
                <div class="clearfix">
                    <br />
                </div>
                <div class="table-responsive" style="overflow-x: scroll">

                    <table class="table table-striped table-bordered table-hover centerTable" style="margin-top: 20px">
                        <thead>
                            <tr class="label-info">
                                <th colspan="<?= ($lpb['STATUS_LPB_ID'] == '3' ? 7 : 8) ?>">Detail Transaksi Penerimaan Barang</th>
                            </tr>
                            <tr class="label-info">
                                <th>No.</th>
                                <th>Kode Barang</th>
                                <th>Nama Barang</th>
                                <th>Kode PO</th>
                                <th>Kode PP</th>
                                <th>Volume LPB</th>
                                <?php if ($lpb['STATUS_LPB_ID'] != '3') { ?>
                                    <th>Volume PO Tersedia</th>
                                <?php } ?>
                                <th>Satuan</th>
                            </tr>
                        </thead>
                        <tbody id="detail_po">
                            <?php
                            $last_kode_po = '';
                            $total = 0;
                            $counter = 0;
                            foreach ($list_detail_lpb as $dlpb) {
                                $counter++;
                                ?>
                                <tr>
                                    <td><?= $counter ?></td>
                                    <td><?= $dlpb['KODE_MATERIAL'] ?></td>
                                    <td><?= $dlpb['NAMA_MATERIAL'] ?></td>
                                    <td><?= $dlpb['PURCHASE_ORDER_KODE'] ?></td>
                                    <td><?= $dlpb['PERMINTAAN_PEMBELIAN_KODE'] ?></td>
                                    <td><?= $dlpb['VOLUME_LPB'] ?></td>
                                    <?php if ($lpb['STATUS_LPB_ID'] != '3') { ?>
                                        <td><?= $dlpb['VOLUME_PO'] - $dlpb['VOLUME_PO_IN_LPB'] ?></td>
                                    <?php } ?>
                                    <td><?= $dlpb['SATUAN_MATERIAL'] ?></td>
                                </tr>
                            <?php }
                            ?>
                            <tr class="item_po_detail">
                                <td colspan="<?= ($lpb['STATUS_LPB_ID'] == '3' ? 7 : 8) ?>" style="background-color: #167CAC;">
                                    <b style="color: #FFF"></b></td>
                            </tr>
                        </tbody>
                    </table>

                    <div class="clearfix">
                    </div>
                </div>
                <br/>
                <div class="row">
                    <input id="flag_save" type="hidden" name="flag" value="0" />
                    <?php if ($lpb['STATUS_LPB_ID'] == '1') { ?>

                        <div class="col-lg-5" ng-if="displayField(['<?= lpb::role_admin ?>'])"> 
                            <button type="button" class="pull-right btn btn-lg btn-danger saveForm" onclick="hapus()">Hapus</button>
                        </div>
                        <div class="col-lg-1" ng-if="displayField(['<?= lpb::role_admin ?>'])"> 
                            <button type="button" class=" btn btn-lg btn-primary saveForm" onclick="edit()">Ubah</button>
                        </div>
                        <div class="col-lg-5" ng-if="displayField(['<?= lpb::role_admin ?>'])"> 
                            <button type="button" class=" btn btn-lg btn-success saveForm" onclick="setujui()">Simpan untuk Disetujui</button>
                        </div>
                        <?php
                    } else if ($lpb['STATUS_LPB_ID'] == '2' || $lpb['STATUS_LPB_ID'] == '5') {
                        ?>
                        <div class="col-lg-6" ng-if="displayField(['<?= lpb::role_validator ?>'])">
                            <button type="button" class="pull-right btn btn-lg btn-success saveForm" onclick="validate()">Validasi</button>
                        </div>
                        <div class="col-lg-6" ng-if="displayField(['<?= lpb::role_validator ?>'])">
                            <button type="button" class="btn btn-lg btn-danger saveForm" onclick="reject()">Tolak</button>
                        </div>
                    <?php } else if ($lpb['STATUS_LPB_ID'] == '4') {
                        ?>
                        <div class="col-lg-6" ng-if="displayField(['<?= lpb::role_admin ?>'])"> 
                            <button type="button" class="pull-right btn btn-lg btn-danger saveForm" onclick="hapus()">Hapus</button>
                        </div>
                        <div class="col-lg-6" ng-if="displayField(['<?= lpb::role_admin ?>'])"> 
                            <button type="button" class="btn btn-lg btn-primary saveForm" onclick="edit()">Ubah</button>
                        </div>
                    <?php }
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>
<form id="formDetail" method="get"></form>
<div id="konfirmasiModal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title" id="judulModal">Konfirmasi Validasi LPB</h4>
            </div>
            <div class="modal-body">
                <h3 id="bodyModal" class="namaBarangHapus">Anda yakin akan memvalidasi LPB ini?</h3>                
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" onclick="do_validate()" id="buttonYesModal">Ya</button>
                <button type="button" class="btn btn-default" data-dismiss="modal" aria-hidden="true">Tidak</button>
            </div>
        </div>
    </div>
</div>

<script>
    var base_url1 = '<?= base_url() ?>';
    var uri = '<?= $this->uri->segment(1, 0) . '/' . $this->uri->segment(2, 0) ?>';
    var base_url = base_url1 + uri;
    var penerimaan_barang_id = '<?= $lpb['PENERIMAAN_BARANG_ID'] ?>';
    $(document).ready(function () {
<?php
if ($lpb['STATUS_LPB_ID'] == '3') {
    ?>
            //get_keterangan_validasi();
    <?php
}
?>
    });
    function get_keterangan_validasi() {
        $.ajax({
            type: "get",
            url: base_url + '/get_keterangan_validasi',
            data: {id: penerimaan_barang_id},
            success: function (data) {
                $('#div_keterangan_validasi').html(data);
            }
            , error: function (xhr, ajaxOptions, thrownError) {
                //$("#detailPO2").html(xhr.responseText);
                console.log(xhr.responseText);
            }
        });
    }
    function validate() {
        var url = "<?= base_url() . $this->uri->segment(1, 0) . '/' . $this->uri->segment(2, 0) ?>/validate";
        $('#formDetail').attr('action', url);
        $('#formDetail').html('<input type="hidden" name="ID_LPB" value="<?= $idLPB ?>">');
        $('#konfirmasiModal').modal();
        $('#judulModal').html('Konfirmasi Validasi LPB');
        $('#bodyModal').html('Apakah Anda yakin akan memvalidasi LPB ini?');
        //$('#buttonYesModal').attr('onclick', 'do_validate()');
    }
    function do_validate() {
        $('#formDetail').submit();
    }
    function reject() {
        var url = "<?= base_url() . $this->uri->segment(1, 0) . '/' . $this->uri->segment(2, 0) ?>/reject";
        $('#formDetail').attr('action', url);
        $('#formDetail').html('<input type="hidden" name="ID_LPB" value="<?= $idLPB ?>">');
        $('#konfirmasiModal').modal();
        $('#judulModal').html('Konfirmasi Tolak LPB');
        $('#bodyModal').html('Apakah Anda yakin akan menolak LPB ini?');
        //$('#buttonYesModal').attr('onclick', 'do_reject()');
    }
    function do_reject() {
        $('#formDetail').submit();
    }
    function hapus() {
        var url = "<?= base_url() . $this->uri->segment(1, 0) . '/' . $this->uri->segment(2, 0) ?>/delete";
        $('#formDetail').attr('action', url);
        $('#formDetail').html('<input type="hidden" name="ID_LPB" value="<?= $idLPB ?>">');
        $('#konfirmasiModal').modal();
        $('#judulModal').html('Konfirmasi Hapus LPB');
        $('#bodyModal').html('Apakah Anda yakin akan menghapus LPB ini?');
        //$('#buttonYesModal').attr('onclick', 'do_hapus()');
    }
    function do_hapus() {
        $('#formDetail').submit();
    }
    function edit() {
        var url = "<?= base_url() . $this->uri->segment(1, 0) . '/' . $this->uri->segment(2, 0) ?>/viewEdit";
        $('#formDetail').attr('action', url);
        $('#formDetail').html('<input type="hidden" name="ID_LPB" value="<?= $idLPB ?>">');
        $('#formDetail').submit();
    }
    function setujui() {
        var url = "<?= base_url() . $this->uri->segment(1, 0) . '/' . $this->uri->segment(2, 0) ?>/setujui";
        $('#formDetail').attr('action', url);
        $('#formDetail').html('<input type="hidden" name="ID_LPB" value="<?= $idLPB ?>">');
        $('#konfirmasiModal').modal();
        $('#judulModal').html('Konfirmasi Setujui LPB');
        $('#bodyModal').html('Apakah Anda yakin akan menyutujui LPB ini?');
        //$('#buttonYesModal').attr('onclick', 'do_setujui()');
    }
    function do_setujui() {
        $('#formDetail').submit();
    }
</script>
<style type="text/css">
    .centerTable th{
        text-align: center;
        background-color: #0993D3;
        color: #FFFFFF;
        height: 30px;
        font-size: 12px;
    }
    .ket_po{
        background-color: #EEEEEE;
    }
</style>