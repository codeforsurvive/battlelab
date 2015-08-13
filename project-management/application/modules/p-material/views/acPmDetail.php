<!-- Page heading -->
<div class="page-head">
    <h2 class="pull-left"><i class="fa fa-building-o"></i> Pengembalian Material</h2>
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
            <div class="pull-left">Detail Pengembalian Material</div>
            <div class="widget-icons pull-right">
                <a href="#" class="wminimize">
                    <i class="fa fa-chevron-up"></i>
                </a>
            </div>
            <div class="clearfix"></div>
        </div>
        <div class="widget-content" style="padding: 10px">
            <div class="padd">
                <img onclick="exportModal('xls');" src="<?= base_url(); ?>assets/default/img/icons/excel.png" class="icons" title="Export to XLS" />
                <img onclick="exportModal('doc');" src="<?= base_url(); ?>assets/default/img/icons/word.png" class="icons" title="Export to DOC" />
                <a href="<?= base_url() . $this->uri->segment(1, 0) . '/' . $this->uri->segment(2, 0) ?>/printPDF?id=<?= $pm['KEMBALI_BARANG_ID'] ?>" target="_blank"><img src="<?= base_url(); ?>assets/default/img/icons/pdf.png" class="icons" title="Export to PDF" /></a>
            </div>
            <div class="page-tables">
                <div class="table-responsive">
                    <div id="formPB" class="form-horizontal" role="form">
                        <table class="table table-bordered centerTable">
                            <thead>
                                <tr class="label-info">
                                    <th colspan="6">Keterangan Pengembalian Barang</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="ket_po"><b>Kode PM</b></td>
                                    <td><?= $pm['KEMBALI_BARANG_KODE'] ?></td>
                                    <td class="ket_po"><b>Kode HM</b></td>
                                    <td><?= $pm['HUTANG_BARANG_KODE'] ?></td>
                                    <td class="ket_po"><b>Tanggal Mulai Hutang</b></td>
                                    <td><?= substr($pm['TANGGAL_MULAI_HUTANG'], 0, 10) ?></td>
                                </tr>
                                <tr>
                                    <td class="ket_po"><b>Tanggal Transaksi</b></td>
                                    <td><?= $pm['TANGGAL_TRANSAKSI'] ?></td>
                                    <td class="ket_po"><b>Tanggal Transaksi HM</b></td>
                                    <td><?= $pm['TANGGAL_TRANSAKSI_HM'] ?></td>
                                    <td class="ket_po"><b>Tanggal Prediksi Kembali</b></td>
                                    <td><?= substr($pm['TANGGAL_PREDIKSI_KEMBALI'], 0, 10) ?></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="page-tables">
                <div class="table-responsive">
                    <div class="clearfix">
                        <br />
                    </div>
                    <table class="table table-bordered centerTable">
                        <thead>
                            <tr class="label-info">
                                <th colspan="7">Detail Pengembalian Barang</th>
                            </tr>
                            <tr>
                                <th>No.</th>
                                <th>Kode Barang</th>
                                <th>Nama Barang</th>                                
                                <th>Jumlah Kembali</th>

                                <?php if ($pm['STATUS_ID'] != '3') { ?>
                                    <th>Sisa Jumlah Pinjam</th>
                                    <th>Sisa Jumlah Stok</th>
                                <?php } else {
                                    ?>
                                    <th>Jumlah Pinjam</th>
                                <?php }
                                ?>
                                <th>Satuan</th>
                            </tr>
                        </thead>
                        <tbody class="listBahan">
                            <?php
                            $counter = 0;
                            foreach ($detailPM as $dpm) {
                                $counter++;
                                ?>
                                <tr>
                                    <td><?= $counter ?></td>
                                    <td><?= $dpm['BARANG_KODE'] ?></td>
                                    <td><?= $dpm['BARANG_NAMA'] ?></td>
                                    <td><?= $dpm['VOLUME'] ?></td>
                                    <?php if ($pm['STATUS_ID'] != '3') { ?>
                                        <td><?= $dpm['volume_pinjam'] - $dpm['volume_lain_telah_kembali_unvalidated'] - $dpm['volume_lain_telah_kembali_validated'] ?></td>
                                        <td><?= $dpm ['stok_sisa'] - $dpm['volume_lain_telah_kembali_unvalidated'] ?></td>
                                    <?php } else {
                                        ?>
                                        <td><?= $dpm['volume_pinjam'] ?></td>
                                    <?php }
                                    ?>
                                    <td><?= $dpm ['SATUAN_NAMA'] ?></td>
                                </tr>
                                <?php
                            }
                            ?>
                            <tr class="item_po_detail">
                                <td colspan="7" style="background-color: #167CAC;">
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
                    <?php if ($pm['STATUS_ID'] == '1') { ?>
                        <div class="col-lg-5" ng-if="displayField(['<?= Pm::role_admin ?>'])"> 
                            <button type="button" class="pull-right btn btn-lg btn-danger saveForm" onclick="hapus()">Hapus</button>
                        </div>
                        <div class="col-lg-1" ng-if="displayField(['<?= Pm::role_admin ?>'])"> 
                            <button type="button" class=" btn btn-lg btn-primary saveForm" onclick="edit()">Ubah</button>
                        </div>
                        <div class="col-lg-5" ng-if="displayField(['<?= Pm::role_admin ?>'])"> 
                            <button type="button" class=" btn btn-lg btn-success saveForm" onclick="setujui()">Simpan Untuk Validasi</button>
                        </div>
                        <?php
                    } else if ($pm['STATUS_ID'] == '2' || $pm['STATUS_ID'] == '5') {
                        ?>
                        <div class="col-lg-6" ng-if="displayField(['<?= Pm::role_validator ?>'])">
                            <button type="button" class="pull-right btn btn-lg btn-success saveForm" onclick="validate()">Validasi</button>
                        </div>
                        <div class="col-lg-6" ng-if="displayField(['<?= Pm::role_validator ?>'])">
                            <button type="button" class="btn btn-lg btn-danger saveForm" onclick="reject()">Tolak</button>
                        </div>
                    <?php } else if ($pm['STATUS_ID'] == '4') {
                        ?>
                        <div class="col-lg-6" ng-if="displayField(['<?= Pm::role_admin ?>'])"> 
                            <button type="button" class="pull-right btn btn-lg btn-danger saveForm" onclick="hapus()">Hapus</button>
                        </div>
                        <div class="col-lg-6" ng-if="displayField(['<?= Pm::role_admin ?>'])"> 
                            <button type="button" class=" btn btn-lg btn-primary saveForm" onclick="edit()">Ubah</button>
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
                <h4 class="modal-title" id="judulModal">Konfirmasi Validasi BPM</h4>
            </div>
            <div class="modal-body">
                <h3 id="bodyModal" class="namaBarangHapus">Anda yakin akan memvalidasi BPM ini?</h3>                
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" onclick="submit_form()" id="buttonYesModal">Ya</button>
                <button type="button" class="btn btn-default" data-dismiss="modal" aria-hidden="true">Tidak</button>
            </div>
        </div>
    </div>
</div>

<script>
    var base_url1 = '<?= base_url() ?>';
    var uri = '<?= $this->uri->segment(1, 0) . '/' . $this->uri->segment(2, 0) ?>';
    var base_url = base_url1 + uri;
    var id_pm = '<?= $pm['KEMBALI_BARANG_ID'] ?>';
    $(document).ready(function () {
        //$('#tabel_list_detail').dataTable();
<?php
if ($pm['STATUS_ID'] == '3') {
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
            data: {id: id_pm},
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
        $('#formDetail').html('<input type="hidden" name="ID_PM" value="<?= $pm['KEMBALI_BARANG_ID'] ?>">');
        $('#konfirmasiModal').modal();
        $('#judulModal').html('Konfirmasi Validasi PM');
        $('#bodyModal').html('Apakah Anda yakin akan memvalidasi PM ini?');
        //$('#buttonYesModal').attr('onclick', 'do_validate()');
    }
    function submit_form() {
        $('#formDetail').submit();
    }
    function reject() {
        var url = "<?= base_url() . $this->uri->segment(1, 0) . '/' . $this->uri->segment(2, 0) ?>/reject";
        $('#formDetail').attr('action', url);
        $('#formDetail').html('<input type="hidden" name="ID_PM" value="<?= $pm['KEMBALI_BARANG_ID'] ?>">');
        $('#konfirmasiModal').modal();
        $('#judulModal').html('Konfirmasi Tolak PM');
        $('#bodyModal').html('Apakah Anda yakin akan menolak PM ini?');
        //$('#buttonYesModal').attr('onclick', 'do_reject()');
    }

    function hapus() {
        var url = "<?= base_url() . $this->uri->segment(1, 0) . '/' . $this->uri->segment(2, 0) ?>/delete";
        $('#formDetail').attr('action', url);
        $('#formDetail').html('<input type="hidden" name="ID_PM" value="<?= $pm['KEMBALI_BARANG_ID'] ?>">');
        $('#konfirmasiModal').modal();
        $('#judulModal').html('Konfirmasi Hapus PM');
        $('#bodyModal').html('Apakah Anda yakin akan menghapus PM ini?');
    }

    function edit() {
        var url = "<?= base_url() . $this->uri->segment(1, 0) . '/' . $this->uri->segment(2, 0) ?>/viewEdit";
        $('#formDetail').attr('action', url);
        $('#formDetail').html('<input type="hidden" name="ID_PM" value="<?= $pm['KEMBALI_BARANG_ID'] ?>">');
        $('#formDetail').submit();
    }
    function setujui() {
        var url = "<?= base_url() . $this->uri->segment(1, 0) . '/' . $this->uri->segment(2, 0) ?>/setujui";
        $('#formDetail').attr('action', url);
        $('#formDetail').html('<input type="hidden" name="ID_PM" value="<?= $pm['KEMBALI_BARANG_ID'] ?>">');
        $('#konfirmasiModal').modal();
        $('#judulModal').html('Konfirmasi Setujui PM');
        $('#bodyModal').html('Apakah Anda yakin akan menyutujui PM ini?');
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