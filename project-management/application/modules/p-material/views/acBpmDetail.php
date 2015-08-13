<!-- Page heading -->
<div class="page-head">
    <h2 class="pull-left"><i class="fa fa-building-o"></i> Detail BPM</h2>
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
            <div class="pull-left">Detail BPM</div>
            <div class="widget-icons pull-right">
                <a href="#" class="wminimize">
                    <i class="fa fa-chevron-up"></i>
                </a>
            </div>
            <div class="clearfix"></div>
        </div>
        <div class="widget-content" style="padding: 10px">
<!--            <button type="button" class="btn btn-sm btn-primary" onclick="window.location.href = '<?= base_url() . $this->uri->segment(1, 0) . '/' . $this->uri->segment(2, 0) . '/viewNewBPM' ?>'"><i class="fa fa-plus fa-fw"></i> Tambah BPM</button>-->
            <div class="padd">
                <img onclick="exportModal('xls');" src="<?= base_url(); ?>assets/default/img/icons/excel.png" class="icons" title="Export to XLS" />
                <img onclick="exportModal('doc');" src="<?= base_url(); ?>assets/default/img/icons/word.png" class="icons" title="Export to DOC" />
                <a href="<?= base_url() . $this->uri->segment(1, 0) . '/' . $this->uri->segment(2, 0) ?>/printPDF?id=<?= $bpm['BPM_ID'] ?>" target="_blank"><img src="<?= base_url(); ?>assets/default/img/icons/pdf.png" class="icons" title="Export to PDF" /></a>
            </div>
            <div class="page-tables">
                <div class="table-responsive">
                    <table class="table table-bordered centerTable">
                        <thead>
                            <tr class="label-info">
                                <th colspan="6" style="text-align: center">Keterangan Pemakaian Barang</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td width="100" class="ket_po"><b>Kode LPB</b></td>
                                <td><?= $bpm['BPM_KODE'] ?></td>
                                <td width="100" class="ket_po"><b>Main Project</b></td>
                                <td><?= $bpm['MAIN_PROJECT_KODE'] . ' ' . $bpm['MAIN_PROJECT_NAMA'] ?></td>
                                <td class="ket_po"><b>Status Validasi</b></td>
                                <td><?= $bpm['STATUS_LPB_NAMA'] ?></td>
                            </tr>
                            <tr>
                                <td class="ket_po"><b>Tanggal Transaksi</b></td>
                                <td><?= $bpm['BPM_TANGGAL'] ?></td>
                                <td class="ket_po"><b>Project</b></td>
                                <td><?= $bpm['PROJECT_KODE'] . ' ' . $bpm['PROJECT_NAMA'] ?></td>
                                <td class="ket_po"><b>Gudang</b></td>
                                <td><?= $bpm['GUDANG_KODE'] . ' ' . $bpm['GUDANG_NAMA'] . ' ' . $bpm['GUDANG_LOKASI'] ?></td>
                            </tr>
                            <tr>
                                <td class="ket_po"><b>Peminta Barang</b></td>
                                <td><?= $bpm['PEMINTA_BARANG'] ?></td>
                                <td class="ket_po"><b>Keterangan</b></td>
                                <td colspan="3"><?= $bpm['BPM_KETERANGAN'] ?></td>

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
                    <table class="table table-striped table-bordered table-hover centerTable" id="tabel_list_detail_bpm">
                        <thead>
                            <tr class="label-info">
                                <th colspan="<?= ($bpm['STATUS_BPM_ID'] == '3' ? '5' : '6') ?>" style="text-align: center">Detail Transaksi Pemakaian Barang</th>
                            </tr>
                            <tr class="label-info">
                                <th>No.</th>
                                <th>Kode Barang</th>
                                <th>Nama Barang</th>                                
                                <th>Jumlah BPM</th>
                                <?php if ($bpm['STATUS_BPM_ID'] != '3') { ?>
                                    <th>Jumlah Stok Tersedia</th>
                                <?php } ?>
                                <th>Satuan</th>
                            </tr>
                        </thead>
                        <tbody class="listBahan">
                            <?php
                            $counter = 0;
                            foreach ($detailBPM as $dbpm) {
                                $counter++;
                                $kode = 'LSMOV';
                                $nama = '';
                                $satuan = '';
                                $sisa = 0; //$dbpm ['VOLUME'];
                                if ($dbpm['BARANG_ID'] > 0) {
                                    $kode = $dbpm['BARANG_KODE'];
                                    $nama = $dbpm['BARANG_NAMA'];
                                    $satuan = $dbpm['BARANG_SATUAN_NAMA'];
                                    $sisa+=$dbpm['STOK_BARANG'] - $dbpm['V_BARANG_IN_BPM'];
                                } else if ($dbpm['SUBCON_ID'] > 0) {
                                    $kode = $dbpm['SUBCON_TIPE_KODE'];
                                    $nama = $dbpm['SUBCON_NAMA'];
                                    $satuan = $dbpm['SUBCON_SATUAN_NAMA'];
                                    $sisa+=$dbpm['STOK_SUBCON'] - $dbpm['V_SUBCON_IN_BPM'];
                                } else if ($dbpm['PAKET_OVERHEAD_MATERIAL_ID'] > 0) {
                                    $nama = $dbpm['PAKET_OVERHEAD_MATERIAL_NAMA'];
                                    $satuan = $dbpm['OVERHEAD_SATUAN_NAMA'];
                                    $sisa+=$dbpm['STOK_OVERHEAD'] - $dbpm['V_OVERHEAD_IN_BPM'];
                                }
                                ?>
                                <tr>
                                    <td><?= $counter ?></td>
                                    <td><?= $kode ?></td>
                                    <td><?= $nama ?></td>
                                    <td><?= $dbpm ['VOLUME'] ?></td>
                                    <?php if ($bpm['STATUS_BPM_ID'] != '3') { ?>
                                        <td><?= $sisa ?></td>
                                    <?php } ?>
                                    <td><?= $satuan ?></td>
                                </tr>
                                <?php
                            }
                            ?>
                            <tr>
                                <td colspan="<?= ($bpm['STATUS_BPM_ID'] == '3' ? '5' : '6') ?>" style="background-color: #167CAC;"><b style="color: #FFF"></b></td>
                            </tr>
                        </tbody>

                    </table>
                    <div class="clearfix">
                    </div>
                </div>
                <br/>
                <div class="row">
                    <input id="flag_save" type="hidden" name="flag" value="0" />
                    <?php if ($bpm['STATUS_BPM_ID'] == '1') { ?>
                        <div class="col-lg-5" ng-if="displayField(['<?= Bpm::role_admin ?>'])"> 
                            <button type="button" class="pull-right btn btn-lg btn-danger saveForm" onclick="hapus()">Hapus</button>
                        </div>
                        <div class="col-lg-1" ng-if="displayField(['<?= Bpm::role_admin ?>'])"> 
                            <button type="button" class=" btn btn-lg btn-primary saveForm" onclick="edit()">Ubah</button>
                        </div>
                        <div class="col-lg-5" ng-if="displayField(['<?= Bpm::role_admin ?>'])"> 
                            <button type="button" class=" btn btn-lg btn-success saveForm" onclick="setujui()">Simpan untuk Setujui</button>
                        </div>
                        <?php
                    } else if ($bpm['STATUS_BPM_ID'] == '2' || $bpm['STATUS_BPM_ID'] == '5') {
                        ?>
                        <div class="col-lg-6" ng-if="displayField(['<?= Bpm::role_validator ?>'])">
                            <button type="button" class="pull-right btn btn-lg btn-success saveForm" onclick="validate()">Validasi</button>
                        </div>
                        <div class="col-lg-6" ng-if="displayField(['<?= Bpm::role_validator ?>'])">
                            <button type="button" class="btn btn-lg btn-danger saveForm" onclick="reject()">Tolak</button>
                        </div>
                    <?php } else if ($bpm['STATUS_BPM_ID'] == '4') {
                        ?>
                        <div class="col-lg-6" ng-if="displayField(['<?= Bpm::role_admin ?>'])"> 
                            <button type="button" class="pull-right btn btn-lg btn-danger saveForm" onclick="hapus()">Hapus</button>
                        </div>
                        <div class="col-lg-6" ng-if="displayField(['<?= Bpm::role_admin ?>'])"> 
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
    var id_bpm = '<?= $bpm['BPM_ID'] ?>';
    $(document).ready(function () {
        //$('#tabel_list_detail_bpm').dataTable();
<?php
if ($bpm['STATUS_BPM_ID'] == '3') {
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
            data: {id: id_bpm},
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
        $('#formDetail').html('<input type="hidden" name="ID_BPM" value="<?= $idBPM ?>">');
        $('#konfirmasiModal').modal();
        $('#judulModal').html('Konfirmasi Validasi BPM');
        $('#bodyModal').html('Apakah Anda yakin akan memvalidasi BPM ini?');
        //$('#buttonYesModal').attr('onclick', 'do_validate()');
    }
    function submit_form() {
        $('#formDetail').submit();
    }
    function reject() {
        var url = "<?= base_url() . $this->uri->segment(1, 0) . '/' . $this->uri->segment(2, 0) ?>/reject";
        $('#formDetail').attr('action', url);
        $('#formDetail').html('<input type="hidden" name="ID_BPM" value="<?= $idBPM ?>">');
        $('#konfirmasiModal').modal();
        $('#judulModal').html('Konfirmasi Reject  BPM');
        $('#bodyModal').html('Apakah Anda yakin akan menolak BPM ini?');
        //$('#buttonYesModal').attr('onclick', 'do_reject()');
    }

    function hapus() {
        var url = "<?= base_url() . $this->uri->segment(1, 0) . '/' . $this->uri->segment(2, 0) ?>/delete";
        $('#formDetail').attr('action', url);
        $('#formDetail').html('<input type="hidden" name="id_bpm" value="<?= $idBPM ?>">');
        $('#konfirmasiModal').modal();
        $('#judulModal').html('Konfirmasi Hapus BPM');
        $('#bodyModal').html('Apakah Anda yakin akan menghapus BPM ini?');
    }

    function edit() {
        var url = "<?= base_url() . $this->uri->segment(1, 0) . '/' . $this->uri->segment(2, 0) ?>/viewEdit";
        $('#formDetail').attr('action', url);
        $('#formDetail').html('<input type="hidden" name="ID_BPM" value="<?= $idBPM ?>">');
        $('#formDetail').submit();
    }
    function setujui() {
        var url = "<?= base_url() . $this->uri->segment(1, 0) . '/' . $this->uri->segment(2, 0) ?>/setujui";
        $('#formDetail').attr('action', url);
        $('#formDetail').html('<input type="hidden" name="ID_BPM" value="<?= $idBPM ?>">');
        $('#konfirmasiModal').modal();
        $('#judulModal').html('Konfirmasi Setujui BPM');
        $('#bodyModal').html('Apakah Anda yakin akan menyutujui BPM ini?');
    }

</script>
<style>
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