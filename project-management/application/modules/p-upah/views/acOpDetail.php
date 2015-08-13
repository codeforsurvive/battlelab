<!-- Page heading -->
<script src="<?php echo site_url() ?>assets/default/js/accounting.min.js"></script>
<div class="page-head">
    <h2 class="pull-left"><i class="fa fa-building-o"></i>Opname Pekerjaan</h2>
    <!-- Breadcrumb -->
    <div class="bread-crumb pull-right">
        <a href="index.html"><i class="fa fa-home"></i> Home</a> 
        <!-- Divider -->
        <span class="divider">/</span> 
        <a href="<?= base_url() . $this->uri->segment(1, 0) . '/' . $this->uri->segment(2, 0) . '/index' ?>" class="bread-current">Opname</a>
        <span class="divider">/</span> 
        <a href="#" class="bread-current">Detail</a>
    </div>
    <div class="clearfix"></div>
</div>
<!-- Page heading ends -->

<div class="col-md-12">
    <div class="widget wgreen">
        <div class="widget-head">
            <div class="pull-left">Detail Opname</div>
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
                <a href="<?= base_url() . $this->uri->segment(1, 0) . '/' . $this->uri->segment(2, 0) ?>/printPDF?id=<?= $opname['OPNAME_ID'] ?>" target="_blank"><img src="<?= base_url(); ?>assets/default/img/icons/pdf.png" class="icons" title="Export to PDF" /></a>
            </div>
            <div class="page-tables">
                <div class="table-responsive">
                    <div id="formPP" class="form-horizontal" role="form">
                        <table class="table table-bordered centerTable">
                            <thead>
                                <tr class="label-info">
                                    <th colspan="6" style="text-align: center">Keterangan Opname</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td  class="ket_po"><b>Kode Opname</b></td>
                                    <td><?= $opname['OPNAME_KODE'] ?></td>
                                    <td class="ket_po"><b>RAB</b></td>
                                    <td><?= $opname['RAB_KODE'] ?></td>
                                    <td class="ket_po"><b>Total Harga</b></td>
                                    <td><?= 'Rp. ' . number_format($opname['OPNAME_TOTAL_HARGA'], 2, ',', '.') ?></td>
                                    
                                </tr>
                                <tr>
                                    <td class="ket_po"><b>Nama Mandor</b></td>
                                    <td><?= $opname['NAMA_MANDOR'] ?></td>
                                    <td class="ket_po"><b>Alamat Mandor</b></td>
                                    <td><?= $opname['ALAMAT_MANDOR'] ?></td>
                                    <td class="ket_po"><b>Telpon Mandor</b></td>
                                    <td><?= $opname['TELPON_MANDOR'] ?></td>
                                </tr>
                                <tr>
                                    <td class="ket_po"><b>Kategori Pajak</b></td>
                                    <td><?= $opname['KATEGORI_PAJAK_NAMA'] ?></td>
                                    <td class="ket_po"><b>Nama Pajak</b></td>
                                    <td><?= $opname['PAJAK_NAMA'] ?></td>
                                    <td class="ket_po"><b>Nilai Pajak</b></td>
                                    <td><?= $opname['PAJAK_VALUE'] ?>%</td>
                                    
                                </tr>
                                <tr>
                                    <td class="ket_po"><b>Drafter</b></td>
                                    <td><?= $opname['DRAFTER_NAMA'] ?></td>
                                    <td class="ket_po"><b>Tanggal</b></td>
                                    <td><?= $opname['OPNAME_TANGGAL'] ?></td>
                                    <td class="ket_po"><b>Kategori Opname</b></td>
                                    <td><?= $opname['KATEGORI_PK_NAMA'] ?></td>    
                                </tr>
                                <tr>
                                    <td class="ket_po"><b>Validator</b></td>
                                    <td><?= $opname['VALIDATOR_NAMA'] ?></td>
                                    <td class="ket_po"><b>Tanggal Validasi</b></td>
                                    <td><?= $opname['TANGGAL_VALIDASI'] ?></td>
                                    <td class="ket_po"><b>Status Validasi</b></td>
                                    <td><?= $opname['STATUS_NAMA'] ?></td>
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
                                <th colspan="<?= ($opname['STATUS_OP_ID'] == 3 ? 7 : 8) ?>" style="text-align: center">Detail Opname</th>
                            </tr>
                            <tr class="label-info">
                                <th>Kode Analisa</th>
                                <th>Nama Pekerjaan</th>
                                <th>Volume Opname</th>
                                <th>Volume PK</th>
                                <?php if ($opname['STATUS_OP_ID'] != '3') { ?>
                                    <th>Volume PK Tersedia</th>
                                <?php } ?>
                                <th>Satuan</th>
                                <th>Harga Satuan</th>
                                <th>Subtotal</th>
                            </tr>
                        </thead>
                        <tbody class="listBahan">
                            <?php
                            $grandTotal = 0;
                            $value_pajak = 0;
                            if ($opname['KATEGORI_PAJAK_ID'] == 2) {
                                $value_pajak = $opname['PAJAK_VALUE'];
                            }
                            foreach ($detailOpname as $dop) {
                                //print_r($dop);
                                $total = $dop['VOLUME_OPNAME'] * $dop['HARGA_OPNAME'];
                                if ($value_pajak > 0)
                                    $total = $total + ($value_pajak * $total / 100);
                                $grandTotal+=$total;
                                $kode = $dop['KODE_PEKERJAAN'];
                                $nama = $dop['NAMA_PEKERJAAN'];
                                $satuan = $dop['SATUAN_PEKERJAAN'];
//                                if ($opname['KATEGORI_OP_ID'] == '1') {
//                                    $satuan = $dop['SATUAN_UPAH_NAMA'];
//                                    if ($dop['UPAH_ID'] != '') {
//                                        $kode = $dop['UPAH_KODE']; //.'upah';
//                                        $nama = $dop['UPAH_NAMA'];
//                                    } else if ($dop['PAKET_OVERHEAD_UPAH_ID'] != '') {
//                                        $kode = 'LSUOV'; //.'ov';
//                                        $nama = $dop['PAKET_OVERHEAD_UPAH_NAMA'];
//                                    }
//                                } else if ($opname['KATEGORI_OP_ID'] == '2') {
//                                    $kode = $dop['ANALISA_KODE'];
//                                    $nama = $dop['ANALISA_NAMA'];
//                                    $satuan = $dop['SATUAN_NAMA'];
//                                }
                                ?>
                                <tr>
                                    <td><?= $kode ?></td>
                                    <td><?= $nama ?></td>
                                    <td><?= $dop['VOLUME_OPNAME'] ?></td>
                                    <td><?= $dop['VOLUME_PK'] ?></td>
                                    <?php
                                    if ($opname['STATUS_OP_ID'] != '3') {
                                        
                                            echo '<td>' . ($dop['VOLUME_PK'] - $dop['VOLUME_TERPAKAI']) . '</td>';
                                        
                                    }
                                    ?>
                                    <td><?= $satuan ?></td>
                                    <td><?= 'Rp. ' . number_format($dop['HARGA_OPNAME'], 2, ',', '.') ?></td>
                                    <td><?= 'Rp. ' . number_format($total, 2, ',', '.') ?></td>
                                </tr>
                                <?php
                            }
                            ?>
                            <tr>
                                <td colspan="<?= ($opname['STATUS_OP_ID'] == 3 ? 6 : 7) ?>"><span class="pull-right"><b>Grand Total</b></span></td>
                                <td id="grandTotal"><?= "Rp. " . number_format($grandTotal, 2, ",", ".") ?></td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="clearfix">
                    </div>
                </div>
                <br/>
                <div class="row">
<?php if ($opname['STATUS_OP_ID'] == '1') { ?>
                        <div class="col-lg-5" ng-if="displayField(['<?= Op::role_admin ?>'])"> 
                            <button type="button" class="pull-right btn btn-lg btn-danger saveForm" onclick="hapus()">Hapus</button>
                        </div>
                        <div class="col-lg-1" ng-if="displayField(['<?= Op::role_admin ?>'])"> 
                            <button type="button" class=" btn btn-lg btn-primary saveForm" onclick="edit()">Ubah</button>
                        </div>
                        <div class="col-lg-5" ng-if="displayField(['<?= Op::role_admin ?>'])"> 
                            <button type="button" class="pull-left btn btn-lg btn-success saveForm" onclick="setujui()">Simpan untuk Disetujui</button>
                        </div>
                        <?php
                    } else if ($opname['STATUS_OP_ID'] == '5' || $opname['STATUS_OP_ID'] == '2') {
                        ?>
                        <div class="col-lg-6" ng-if="displayField(['<?= Op::role_validator ?>'])">
                            <button type="button" class="pull-right btn btn-lg btn-success saveForm" onclick="validate()">Validasi</button>
                        </div>
                        <div class="col-lg-6" ng-if="displayField(['<?= Op::role_validator ?>'])">
                            <button type="button" class="pull-left btn btn-lg btn-danger saveForm" onclick="reject()">Tolak</button>
                        </div>
                        <?php
                    } else if ($opname['STATUS_OP_ID'] == '4') {
                        ?>
                        <div class="col-lg-6" ng-if="displayField(['<?= Op::role_admin ?>'])"> 
                            <button type="button" class="pull-right btn btn-lg btn-danger saveForm" onclick="hapus()">Hapus</button>
                        </div>
                        <div class="col-lg-5" ng-if="displayField(['<?= Op::role_admin ?>'])"> 
                            <button type="button" class="pull-left btn btn-lg btn-primary saveForm" onclick="edit()">Ubah</button>
                        </div>
                        <?php
                    }
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
                <button type="button" class="btn btn-primary" onclick="submitForm()" id="buttonYesModal">Ya</button>
                <button type="button" class="btn btn-default" data-dismiss="modal" aria-hidden="true">Tidak</button>
            </div>
        </div>
    </div>
</div>

<script>
    var base_url1 = '<?= base_url() ?>';
    var uri = '<?= $this->uri->segment(1, 0) . '/' . $this->uri->segment(2, 0) ?>';
    var base_url = base_url1 + uri;
    var opname_id = '<?= $opname['OPNAME_ID'] ?>';
    $(document).ready(function () {
        document.getElementsByClassName('has_sub')[1].setAttribute('class', 'has_sub open');
<?php
if ($opname['STATUS_OP_ID'] == '3') {
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
            data: {id: opname_id},
            success: function (data) {
                $('#div_keterangan_validasi').html(data);
            }
            , error: function (xhr, ajaxOptions, thrownError) {
                //$("#detailPO2").html(xhr.responseText);
                console.log(xhr.responseText);
            }
        });
    }
    function hapus() {
        var url = "<?= base_url() . $this->uri->segment(1, 0) . '/' . $this->uri->segment(2, 0) ?>/delete";
        $('#formDetail').attr('action', url);
        $('#formDetail').html('<input type="hidden" name="ID_OPNAME" value="<?= $opname['OPNAME_ID'] ?>">');
        $('#konfirmasiModal').modal();
        $('#judulModal').html('Konfirmasi Hapus Opname');
        $('#bodyModal').html('Apakah Anda yakin akan Menghapus Opname ini?');
    }
    function edit() {
        var url = "<?= base_url() . $this->uri->segment(1, 0) . '/' . $this->uri->segment(2, 0) ?>/viewEdit";
        $('#formDetail').attr('action', url);
        $('#formDetail').html('<input type="hidden" name="ID_OPNAME" value="<?= $opname['OPNAME_ID'] ?>">');
        submitForm();
    }
    function setujui() {
        var url = "<?= base_url() . $this->uri->segment(1, 0) . '/' . $this->uri->segment(2, 0) ?>/setujui";
        $('#formDetail').attr('action', url);
        $('#formDetail').html('<input type="hidden" name="ID_OPNAME" value="<?= $opname['OPNAME_ID'] ?>">');
        $('#konfirmasiModal').modal();
        $('#judulModal').html('Konfirmasi Setujui Opname');
        $('#bodyModal').html('Apakah Anda yakin akan Menyetujui Opname ini?');
    }
    function validate() {
        var url = "<?= base_url() . $this->uri->segment(1, 0) . '/' . $this->uri->segment(2, 0) ?>/validate";
        $('#formDetail').attr('action', url);
        $('#formDetail').html('<input type="hidden" name="ID_OPNAME" value="<?= $opname['OPNAME_ID'] ?>">');
        $('#konfirmasiModal').modal();
        $('#judulModal').html('Konfirmasi Validasi Opname');
        $('#bodyModal').html('Apakah Anda yakin akan Memvalidasi Opname ini?');
    }
    function reject() {
        var url = "<?= base_url() . $this->uri->segment(1, 0) . '/' . $this->uri->segment(2, 0) ?>/reject";
        $('#formDetail').attr('action', url);
        $('#formDetail').html('<input type="hidden" name="ID_OPNAME" value="<?= $opname['OPNAME_ID'] ?>">');
        $('#konfirmasiModal').modal();
        $('#judulModal').html('Konfirmasi Tolak Opname');
        $('#bodyModal').html('Apakah Anda yakin akan Menolak Opname ini?');
    }
    function submitForm() {
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