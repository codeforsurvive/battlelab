<!-- Page heading -->
<div class="page-head">
    <h2 class="pull-left"><i class="fa fa-building-o"></i> Payment</h2>
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
            <div class="pull-left">Detail Payment</div>
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
                <a href="<?= base_url() . $this->uri->segment(1, 0) . '/' . $this->uri->segment(2, 0) ?>/printPDF?id=<?= $pym['PAYMENT_ID'] ?>" target="_blank"><img src="<?= base_url(); ?>assets/default/img/icons/pdf.png" class="icons" title="Export to PDF" /></a>
            </div>
            <div class="page-tables">
                <div class="table-responsive">
                    <table class="table table-bordered centerTable">
                        <thead>
                            <tr class="label-info">
                                <th colspan="6">Keterangan Pembayaran <?php echo ( (int)$pym['INVOICE_ID'] > 0 ? 'Material' : 'Upah') ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="ket_po" width="100"><b>Kode Payment</b></td>
                                <td><?= $pym['PAYMENT_KODE'] ?></td>
                                <td class="ket_po"><b>Tanggal Transaksi</b></td>
                                <td><?= $pym['TANGGAL_TRANSAKSI'] ?></td>
                            </tr>
                            <tr>
                                <td class="ket_po"><b>Status</b></td>
                                <td><?= $pym['STATUS_NAMA'] ?></td>
                            </tr>
                            <tr>

                            </tr>
                        </tbody>
                    </table>
                    <table class="table table-striped table-bordered table-hover centerTable" style="margin-top: 20px">
                        <thead>
                            <tr class="label-info">
                                <th colspan="10">Detail Transaksi Pembayaran <?php echo ( (int)$pym['INVOICE_ID'] > 0 ? 'Material' : 'Upah') ?></th>
                            </tr>
                            <tr class="label-info">
                                <th>No.</th>
                                <th>Kode Barang </th>
                                <th>Nama Barang</th>
                                <th>Volume</th>
                                <th>Satuan</th>
                                <th>Harga Satuan</th>
                                <th >Diskon</th>
                                <th colspan="2">Pajak</th>
                                <th>Harga</th>
                            </tr>
                        </thead>
                        <tbody id="detail_">
                            <?php
                            $c = 0;
                            $harga_total = 0;
                            $kode_opname = "";
                            $kode_lpb='';
                            $jumlah_lpb = 0;
                            $subtotal = 0;
                            foreach ($detail as $key => $d) {
                                $c++;
                                if ((int) $pym['INVOICE_ID'] > 0) {
                                    
                                    if ($kode_lpb != $d['PENERIMAAN_BARANG_KODE']) {
                                        if (strlen($kode_lpb) > 0) {
                                            echo '<tr><td colspan="9" style="text-align:right;font-weight:bold">Sub Total</td><td>Rp. ' . number_format($subtotal, 2, ',', '.') . '</td></tr>';
                                        }
                                        $jumlah_lpb++;
                                        $kode_lpb = $d['PENERIMAAN_BARANG_KODE'];
                                        echo '<tr><td></td><td colspan="9"><a class="btn btn-primary btn-xs" target="_blank" href="' . base_url() . 'p-material/lpb/viewDetail/' . $d["PENERIMAAN_BARANG_ID"] . '"><i class="fa fa-search fa-fw"></i></a> ' . $kode_lpb . '</td></tr>';
                                        $subtotal = 0;
                                    }
                                    $harga = $d['BARANG_HARGA_SATUAN'] * $d['VOLUME_LPB'];
                                    $harga_awal = $harga;
                                    $diskon1 = $d['DISKON1'] * $harga / 100;
                                    $harga = $harga - $diskon1;
                                    $diskon2 = $d['DISKON2'] * $harga / 100;
                                    $harga = $harga - $diskon2;
                                    $diskon3 = $d['DISKON3'] * $harga / 100;
                                    $pajak = 0;
                                    $diskon = $diskon1 + $diskon2 + $diskon3;
                                    $nama_pajak = '';
                                    $harga = $harga - $diskon3;
                                    if ($d['KATEGORI_PAJAK_ID'] == 1) {
                                        $nama_pajak = 'inc';
                                        $pajak = $d['PAJAK_VALUE'] * $harga / (100 + $d['PAJAK_VALUE']);
                                    } else if ($d['KATEGORI_PAJAK_ID'] == 2) {
                                        $nama_pajak = 'exc';
                                        $pajak = $d['PAJAK_VALUE'] * $harga / (100);
                                        $harga = $harga + $pajak;
                                    } else if ($d['KATEGORI_PAJAK_ID'] == 3) {
                                        $nama_pajak = 'notax';
                                    }
                                    $harga_total+=$harga;
                                    $subtotal+=$harga;
                                    ?>
                                    <tr>
                                        <td><?= $c ?></td>
                                        <td><?= $d['KODE_MATERIAL'] ?></td>
                                        <td><?= $d['NAMA_MATERIAL'] ?></td>
                                        <td><?= $d['VOLUME_LPB'] ?></td>
                                        <td><?= $d['SATUAN_NAMA'] ?></td>
                                        <td>Rp. <?= number_format($d['BARANG_HARGA_SATUAN'], 2, ',', '.') ?></td>
                                        <td>Rp. <?= number_format($diskon, 2, ',', '.') ?></td>
                                        <td><?= $nama_pajak ?> <?= $d['PAJAK_VALUE'] ?>%</td>
                                        <td>Rp. <?= number_format($pajak, 2, ',', '.') ?></td>
                                        <td>Rp. <?= number_format($harga, 2, ',', '.') ?></td>
                                    </tr>
                                    <?php
                                } else if ((int) $pym['LPU_ID'] > 0) {
                                    //print_r($d);
                                    if ($kode_opname != $d['OPNAME_KODE']) {
                                        if (strlen($kode_opname) > 0) {
                                            echo '<tr><td colspan="9" style="text-align:right;font-weight:bold">Sub Total</td><td>Rp. ' . number_format($subtotal, 2, ',', '.') . '</td></tr>';
                                        }
                                        $jumlah_lpb++;
                                        $kode_opname = $d['OPNAME_KODE'];
                                        echo '<tr><td></td><td colspan="9"><a class="btn btn-primary btn-xs" target="_blank" href="' . base_url() . 'p-upah/op/viewDetail?id=' . $d["OPNAME_ID"] . '"><i class="fa fa-search fa-fw"></i></a> ' . $kode_opname . '</td></tr>';
                                        $subtotal = 0;
                                    }
                                    $harga = $d['HARGA_OPNAME'] * $d['VOLUME'];
                                    $pajak = 0;
                                    $diskon = 0;
                                    $nama_pajak = '';

                                    if ($d['KATEGORI_PAJAK_ID'] == 1) {
                                        $nama_pajak = 'inc';
                                        $pajak = $d['PAJAK_VALUE'] * $harga / (100 + $d['PAJAK_VALUE']);
                                    } else if ($d['KATEGORI_PAJAK_ID'] == 2) {
                                        $nama_pajak = 'exc';
                                        $pajak = $d['PAJAK_VALUE'] * $harga / (100);
                                        $harga = $harga + $pajak;
                                    } else if ($d['KATEGORI_PAJAK_ID'] == 3) {
                                        $nama_pajak = 'notax';
                                    }
                                    $harga_total+=$harga;
                                    $subtotal+=$harga;
                                    ?>
                                    <tr>
                                        <td><?= $c ?></td>
                                        <td><?php
//                                            if ((int) $d['ANALISA_ID'] > 0)
//                                                echo $d['ANALISA_KODE'];
//                                            else if ((int) $d['UPAH_ID'] > 0)
//                                                echo $d['UPAH_KODE'];
//                                            else if ((int) $d['PAKET_OVERHEAD_UPAH_ID'] > 0)
//                                                echo 'LSUOV';
                                        echo $d['KODE_PEKERJAAN'];
                                            ?></td>
                                        <td><?php
//                                            if ((int) $d['ANALISA_ID'] > 0)
//                                                echo $d['ANALISA_NAMA'];
//                                            else if ((int) $d['UPAH_ID'] > 0)
//                                                echo $d['UPAH_NAMA'];
//                                            else if ((int) $d['PAKET_OVERHEAD_UPAH_ID'] > 0)
//                                                echo $d['PAKET_OVERHEAD_UPAH_NAMA'];
                                        echo $d['NAMA_PEKERJAAN'];
                                            ?></td>
                                        <td><?= $d['VOLUME'] ?></td>
                                        <td><?php
//                                            if ((int) $d['ANALISA_ID'] > 0)
//                                                echo $d['SATUAN_NAMA'];
//                                            else if ((int) $d['UPAH_ID'] > 0)
//                                                echo $d['SATUAN_UPAH_NAMA'];
//                                            else if ((int) $d['PAKET_OVERHEAD_UPAH_ID'] > 0)
//                                                echo $d['SATUAN_UPAH_NAMA'];
                                        echo $d['SATUAN_PEKERJAAN'];
                                            ?></td>
                                        <td>Rp. <?= number_format($d['HARGA_OPNAME'], 2, ',', '.') ?></td>
                                        <td>Rp. <?= number_format($diskon, 2, ',', '.') ?></td>
                                        <td><?= $nama_pajak ?> <?= $d['PAJAK_VALUE'] ?>%</td>
                                        <td>Rp. <?= number_format($pajak, 2, ',', '.') ?></td>
                                        <td>Rp. <?= number_format($harga, 2, ',', '.') ?></td>
                                    </tr>
                                    <?php
                                }
                            }
                            if ($jumlah_lpb > 1) {
                                echo '<tr><td colspan="9" style="text-align:right;font-weight:bold">Sub Total</td><td >Rp. ' . number_format($subtotal, 2, ',', '.') . '</td></tr>';
                            }
                            ?>
                            <tr>
                                <td style="text-align:right;font-weight:bold;background-color: #167CAC;" colspan="9"><b style="color: #FFF">Total</b></td>
                                <td>Rp. <?= number_format($harga_total, 2) ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="page-tables">
                <div class="table-responsive">
                    <div class="clearfix">
                        <br />
                    </div>
                    <div class="clearfix">
                    </div>
                </div>
                <br/>
                <div class="row">
                    <input id="flag_save" type="hidden" name="flag" value="0" />
                    <?php if ($pym['STATUS_ID'] == '1') { ?>

                        <div class="col-lg-5" ng-if="displayField(['<?= Payment::role_admin ?>'])"> 
                            <button type="button" class="pull-right btn btn-lg btn-danger" onclick="hapus()">Hapus</button>
                        </div>
                        <div class="col-lg-1" ng-if="displayField(['<?= Payment::role_admin ?>'])"> 
                            <button type="button" class=" btn btn-lg btn-primary " onclick="edit()">Ubah</button>
                        </div>
                        <div class="col-lg-5" ng-if="displayField(['<?= Payment::role_admin ?>'])"> 
                            <button type="button" class=" btn btn-lg btn-success " onclick="setujui()">Simpan Untuk Validasi</button>
                        </div>
                        <?php
                    } else if ($pym['STATUS_ID'] == '2' || $pym['STATUS_ID'] == '5') {
                        ?>
                        <div class="col-lg-6" ng-if="displayField(['<?= Payment::role_validator ?>'])">
                            <button type="button" class="pull-right btn btn-lg btn-success " onclick="validate()">Validasi</button>
                        </div>
                        <div class="col-lg-6" ng-if="displayField(['<?= Payment::role_validator ?>'])">
                            <button type="button" class="btn btn-lg btn-danger " onclick="reject()">Tolak</button>
                        </div>
                    <?php } else if ($pym['STATUS_ID'] == '4') {
                        ?>
                        <div class="col-lg-5" ng-if="displayField(['<?= Payment::role_admin ?>'])"> 
                            <button type="button" class="pull-right btn btn-lg btn-danger" onclick="hapus()">Hapus</button>
                        </div>
                        <div class="col-lg-6" ng-if="displayField(['<?= Payment::role_admin ?>'])"> 
                            <button type="button" class=" btn btn-lg btn-primary " onclick="edit()">Ubah</button>
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
                <h4 class="modal-title" id="judulModal">Konfirmasi Validasi Payment</h4>
            </div>
            <div class="modal-body">
                <h3 id="bodyModal" class="namaBarangHapus">Anda yakin akan memvalidasi Payment ini?</h3>                
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
    var PAYMENT_ID = '<?= $pym['PAYMENT_ID'] ?>';
    $(document).ready(function () {
<?php
if ($pym['STATUS_ID'] == '3') {
    ?>
            get_keterangan_validasi();
    <?php
}
?>
    });
    function get_keterangan_validasi() {
        $.ajax({
            type: "get",
            url: base_url + '/get_keterangan_validasi',
            data: {id: PAYMENT_ID},
            success: function (data) {
                $('#keterangan_validasi').html(data);
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
        $('#formDetail').html('<input type="hidden" name="payment_id" value="<?= $pym['PAYMENT_ID'] ?>">');
        $('#konfirmasiModal').modal();
        $('#judulModal').html('Konfirmasi Validasi Payment');
        $('#bodyModal').html('Apakah Anda yakin akan memvalidasi Payment ini?');
        //$('#buttonYesModal').attr('onclick', 'do_validate()');
    }
    function do_validate() {
        $('#formDetail').submit();
    }
    function reject() {
        var url = "<?= base_url() . $this->uri->segment(1, 0) . '/' . $this->uri->segment(2, 0) ?>/reject";
        $('#formDetail').attr('action', url);
        $('#formDetail').html('<input type="hidden" name="payment_id" value="<?= $pym['PAYMENT_ID'] ?>">');
        $('#konfirmasiModal').modal();
        $('#judulModal').html('Konfirmasi Tolak Payment');
        $('#bodyModal').html('Apakah Anda yakin akan menolak Payment ini?');
        //$('#buttonYesModal').attr('onclick', 'do_reject()');
    }
    function do_reject() {
        $('#formDetail').submit();
    }
    function hapus() {
        var url = "<?= base_url() . $this->uri->segment(1, 0) . '/' . $this->uri->segment(2, 0) ?>/delete";
        $('#formDetail').attr('action', url);
        $('#formDetail').html('<input type="hidden" name="payment_id" value="<?= $pym['PAYMENT_ID'] ?>">');
        $('#konfirmasiModal').modal();
        $('#judulModal').html('Konfirmasi Hapus Payment');
        $('#bodyModal').html('Apakah Anda yakin akan menghapus Payment ini?');
        //$('#buttonYesModal').attr('onclick', 'do_hapus()');
    }
    function do_hapus() {
        $('#formDetail').submit();
    }
    function edit() {
        var url = "<?= base_url() . $this->uri->segment(1, 0) . '/' . $this->uri->segment(2, 0) ?>/viewEdit";
        $('#formDetail').attr('action', url);
        $('#formDetail').html('<input type="hidden" name="payment_id" value="<?= $pym['PAYMENT_ID'] ?>">');
        $('#formDetail').submit();
    }
    function setujui() {
        var url = "<?= base_url() . $this->uri->segment(1, 0) . '/' . $this->uri->segment(2, 0) ?>/setujui";
        $('#formDetail').attr('action', url);
        $('#formDetail').html('<input type="hidden" name="payment_id" value="<?= $pym['PAYMENT_ID'] ?>">');
        $('#konfirmasiModal').modal();
        $('#judulModal').html('Konfirmasi Setujui Payment');
        $('#bodyModal').html('Apakah Anda yakin akan menyutujui Payment ini?');
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