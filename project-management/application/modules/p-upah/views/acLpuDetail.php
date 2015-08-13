<!-- Page heading -->
<script src="<?php echo site_url() ?>assets/default/js/accounting.min.js"></script>
<div class="page-head">
    <h2 class="pull-left"><i class="fa fa-building-o"></i>Laporan Pengeluaran Upah</h2>
    <!-- Breadcrumb -->
    <div class="bread-crumb pull-right">
        <a href="index.html"><i class="fa fa-home"></i> Home</a> 
        <!-- Divider -->
        <span class="divider">/</span> 
        <a href="<?= base_url() . $this->uri->segment(1, 0) . '/' . $this->uri->segment(2, 0) . '/index' ?>" class="bread-current">LPU</a>
        <span class="divider">/</span> 
        <a href="#" class="bread-current">Detail</a>
    </div>
    <div class="clearfix"></div>
</div>
<!-- Page heading ends -->

<div class="col-md-12">
    <div class="widget wgreen">
        <div class="widget-head">
            <div class="pull-left">Detail LPU</div>
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
                <a href="<?= base_url() . $this->uri->segment(1, 0) . '/' . $this->uri->segment(2, 0) ?>/printPDF?id=<?= $lpu['LPU_ID'] ?>" target="_blank"><img src="<?= base_url(); ?>assets/default/img/icons/pdf.png" class="icons" title="Export to PDF" /></a>
            </div>
            <div class="page-tables">
                <div class="table-responsive">
                    <div id="formPP" class="form-horizontal" role="form">
                        <table class="table table-bordered centerTable">
                            <thead>
                                <tr class="label-info">
                                    <th colspan="6" style="text-align: center">Keterangan LPU</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td  class="ket_po"><b>Kode LPU</b></td>
                                    <td><?= $lpu['LPU_KODE'] ?></td>
                                    <td class="ket_po"><b>RAB</b></td>
                                    <td><?= $lpu['RAB_KODE'] ?></td>
                                    <td class="ket_po"><b>Nama RAB</b></td>
                                    <td><?= $lpu['RAB_NAMA'] ?></td>
                                </tr>
                                <tr>
                                    <td class="ket_po"><b>Drafter</b></td>
                                    <td><?= $lpu['DRAFTER_NAMA'] ?></td>
                                    <td class="ket_po"><b>Tanggal Transaksi</b></td>
                                    <td><?= $lpu['TANGGAL_TRANSAKSI'] ?></td>
                                    <td class="ket_po"><b></b></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td class="ket_po"><b>Validator</b></td>
                                    <td><?= $lpu['VALIDATOR_NAMA'] ?></td>
                                    <td class="ket_po"><b>Tanggal Validasi</b></td>
                                    <td><?= $lpu['TANGGAL_VALIDASI'] ?></td>
                                    <td class="ket_po"><b>Status Validasi</b></td>
                                    <td><?= $lpu['STATUS_NAMA'] ?></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="page-tables">
                <div class="table-responsive" style="overflow-x: scroll">
                    <div class="clearfix">
                        <br />
                    </div>
                    <table class="table table-bordered centerTable">
                        <thead>
                            <tr class="label-info">
                                <th colspan="<?= (($lpu['STATUS_ID'] == '3') ? '9' : '10') ?>" style="text-align: center">Detail LPU</th>
                            </tr>
                            <tr class="label-info">
                                <!--<th>Kode Opname</th>-->
                                <th>Kode Analisa</th>
                                <th >Nama Pekerjaan</th>
                                <th>Volume LPU</th>
                                <th>Volume Opname</th>
                                <?php if ($lpu['STATUS_ID'] != '3' && false) { ?>
                                    <th>Sisa Volume Opname</th>
                                <?php } ?>
<!--                                <th>Prosentase Kerja</th>-->
                                <th>Satuan</th>
                                <!--<th style="width: 120px">Harga Satuan</th>
                                <th style="width: 150px">Subtotal</th>-->
                            </tr>
                        </thead>
                        <tbody class="listBahan">
                            <?php
                            $last_opname = '';
                            foreach ($detail_lpu as $dlpu) {
                                $kode = $dlpu['KODE_PEKERJAAN'];
                                $nama = $dlpu['NAMA_PEKERJAAN'];
                                $satuan = $dlpu['SATUAN_PEKERJAAN'];
//                                if ((int) $dlpu['ANALISA_ID'] > 0) {
//                                    $kode = $dlpu['ANALISA_KODE'];
//                                    $nama = $dlpu['ANALISA_NAMA'];
//                                    $satuan = $dlpu['SATUAN_NAMA'];
//                                } else if ((int) $dlpu['UPAH_ID']) {
//                                    $kode = $dlpu['UPAH_KODE'];
//                                    $nama = $dlpu['UPAH_NAMA'];
//                                    $satuan = $dlpu['SATUAN_UPAH_NAMA'];
//                                } else if ((int) $dlpu['PAKET_ID']) {
//                                    $kode = 'LSUOV';
//                                    $nama = $dlpu['PAKET_OVERHEAD_UPAH_NAMA'];
//                                    $satuan = $dlpu['SATUAN_UPAH_NAMA'];
//                                }
//
                                if ($last_opname != $dlpu['OPNAME_KODE']) {
                                    $last_opname = $dlpu['OPNAME_KODE'];
                                    echo '<tr>'
                                    . '<td colspan="7" style="padding-left:50px"><a class="btn btn-primary btn-xs" target="_blank" href="' . base_url() . 'p-upah/op/viewDetail?id=' . $dlpu['OPNAME_ID'] . '"><i class="fa fa-search fa-fw"></i></a><b>' . $dlpu['OPNAME_KODE'] . '</b></td>'
                                    . '</tr>';
                                }
                                ?>
                                <tr>

                                    <td><?= $kode ?></td>
                                    <td><?= $nama ?></td>
                                    <td><?= $dlpu['VOLUME'] ?></td>
                                    <td><?= $dlpu['VOLUME_OPNAME'] ?></td>
                                    <?php if ($lpu['STATUS_ID'] != '3' && false) { ?>
                                        <td><?= $dlpu['VOLUME_OPNAME'] - $dlpu['VOLUME_OPNAME_TERPAKAI'] ?></td>
                                    <?php } ?>

                                    <td><?= $satuan ?></td>
                                </tr>
                                <?php
                            }
                            ?>
                            <tr>
                                <td style="background-color: #167CAC;" colspan="<?= (($lpu['STATUS_ID'] == '3') ? '9' : '10') ?>"><span class="pull-right"><b style="color: white"></b></span></td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="clearfix">
                    </div>
                </div>
                <br/>
                <div class="row">
                    <?php if ($lpu['STATUS_ID'] == '1') { ?>
                        <div class="col-lg-5" ng-if="displayField(['<?= Lpu::role_admin ?>'])"> 
                            <button type="button" class="pull-right btn btn-lg btn-danger saveForm" onclick="hapus()">Hapus</button>
                        </div>
                        <div class="col-lg-1" ng-if="displayField(['<?= Lpu::role_admin ?>'])"> 
                            <button type="button" class=" btn btn-lg btn-primary saveForm" onclick="edit()">Ubah</button>
                        </div>
                        <div class="col-lg-5" ng-if="displayField(['<?= Lpu::role_admin ?>'])"> 
                            <button type="button" class="pull-left btn btn-lg btn-success saveForm" onclick="setujui()">Simpan untuk Disetujui</button>
                        </div>
                        <?php
                    } else if ($lpu['STATUS_ID'] == '5' || $lpu['STATUS_ID'] == '2') {
                        ?>
                        <div class="col-lg-6" ng-if="displayField(['<?= Lpu::role_validator ?>'])">
                            <button type="button" class="pull-right btn btn-lg btn-success saveForm" onclick="validate()">Validasi</button>
                        </div>
                        <div class="col-lg-6" ng-if="displayField(['<?= Lpu::role_validator ?>'])">
                            <button type="button" class="pull-left btn btn-lg btn-danger saveForm" onclick="reject()">Tolak</button>
                        </div>
                        <?php
                    } else if ($lpu['STATUS_ID'] == '4') {
                        ?>
                        <div class="col-lg-6" ng-if="displayField(['<?= Lpu::role_admin ?>'])"> 
                            <button type="button" class="pull-right btn btn-lg btn-danger saveForm" onclick="hapus()">Hapus</button>
                        </div>
                        <div class="col-lg-5" ng-if="displayField(['<?= Lpu::role_admin ?>'])"> 
                            <button type="button" class="btn btn-lg btn-primary saveForm" onclick="edit()">Ubah</button>
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
    var id_lpu = '<?= $lpu['LPU_ID'] ?>';
    $(document).ready(function () {
        document.getElementsByClassName('has_sub')[1].setAttribute('class', 'has_sub open');
<?php
if ($lpu['STATUS_ID'] == '3') {
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
        $('#formDetail').html('<input type="hidden" name="id" value="<?= $lpu['LPU_ID'] ?>">');
        $('#konfirmasiModal').modal();
        $('#judulModal').html('Konfirmasi Hapus LPU');
        $('#bodyModal').html('Apakah Anda yakin akan Menghapus LPU ini?');
    }
    function edit() {
        var url = "<?= base_url() . $this->uri->segment(1, 0) . '/' . $this->uri->segment(2, 0) ?>/viewEdit";
        $('#formDetail').attr('action', url);
        $('#formDetail').html('<input type="hidden" name="id" value="<?= $lpu['LPU_ID'] ?>">');
        submitForm();
    }
    function setujui() {
        var url = "<?= base_url() . $this->uri->segment(1, 0) . '/' . $this->uri->segment(2, 0) ?>/setujui";
        $('#formDetail').attr('action', url);
        $('#formDetail').html('<input type="hidden" name="id" value="<?= $lpu['LPU_ID'] ?>">');
        $('#konfirmasiModal').modal();
        $('#judulModal').html('Konfirmasi Setujui LPU');
        $('#bodyModal').html('Apakah Anda yakin akan Menyetujui LPU ini?');
    }
    function validate() {
        var url = "<?= base_url() . $this->uri->segment(1, 0) . '/' . $this->uri->segment(2, 0) ?>/validate";
        $('#formDetail').attr('action', url);
        $('#formDetail').html('<input type="hidden" name="id" value="<?= $lpu['LPU_ID'] ?>">');
        $('#konfirmasiModal').modal();
        $('#judulModal').html('Konfirmasi Validasi LPU');
        $('#bodyModal').html('Apakah Anda yakin akan Memvalidasi LPU ini?');
    }
    function reject() {
        var url = "<?= base_url() . $this->uri->segment(1, 0) . '/' . $this->uri->segment(2, 0) ?>/reject";
        $('#formDetail').attr('action', url);
        $('#formDetail').html('<input type="hidden" name="id" value="<?= $lpu['LPU_ID'] ?>">');
        $('#konfirmasiModal').modal();
        $('#judulModal').html('Konfirmasi Reject LPU');
        $('#bodyModal').html('Apakah Anda yakin akan Me-reject LPU ini?');
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