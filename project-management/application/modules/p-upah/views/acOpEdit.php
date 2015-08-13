<!-- Page heading -->
<script src="<?php echo site_url() ?>assets/default/js/accounting.min.js"></script>
<div class="page-head">
    <h2 class="pull-left"><i class="fa fa-building-o"></i> Opname</h2>
    <!-- Breadcrumb -->
    <div class="bread-crumb pull-right">
        <a href="index.html"><i class="fa fa-home"></i> Home</a> 
        <!-- Divider -->
        <span class="divider">/</span> 
        <a href="<?= base_url() . $this->uri->segment(1, 0) . '/' . $this->uri->segment(2, 0) . '/index' ?>" class="bread-current">Opname</a>
        <span class="divider">/</span> 
        <a href="#" class="bread-current">Edit</a>
    </div>
    <div class="clearfix"></div>
</div>
<!-- Page heading ends -->

<div class="col-md-12">
    <div class="widget wgreen">
        <div class="widget-head">
            <div class="pull-left">Edit Opname</div>
            <div class="widget-icons pull-right">
                <a href="#" class="wminimize">
                    <i class="fa fa-chevron-up"></i>
                </a>

            </div>
            <div class="clearfix"></div>
        </div>
        <div class="widget-content" style="padding: 10px">

            <form id="formPP" action="<?= base_url() . $this->uri->segment(1, 0) . '/' . $this->uri->segment(2, 0) . '/edit' ?>" method="post" >
                <input type="hidden" id="id_opname" name="OPNAME_ID" value="<?= $op['OPNAME_ID'] ?>"/>
                <input type="hidden" name="flag" id="flag_save" value="1"/>

                <div class="page-tables">
                    <div class="table-responsive">
                        <div class="form-horizontal" role="form">

                            <?php
                            //print_r($op);
                            ?>
                            <div class="form-group" id="main_project">
                                <label class="col-lg-2 control-label">Main Proyek</label>
                                <div class="col-lg-5">
                                    <select name="MAIN_PROJECT_ID" id="MAIN_PROJECT_ID" class="form-control" onchange="">

                                        <?php
                                        foreach ($listMainProject as $mp) {
                                            echo '<option value="' . $mp['MAIN_PROJECT_ID'] . '"' . ($mp['MAIN_PROJECT_ID'] == $op['MAIN_PROJECT_ID'] ? ' selected=""' : '') . '>' . $mp['MAIN_PROJECT_KODE'] . ' ' . $mp['MAIN_PROJECT_NAMA'] . '</option>';
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div id="projects_" class="form-group">
                                <label class="col-lg-2 control-label">Proyek</label>
                                <div class="col-lg-5">
                                    <select name="PROJECT_ID" id="PROJECT_ID" class="form-control" onchange="">

                                        <?php
                                        foreach ($list_project as $project) {
                                            echo '<option' . ($project['PROJECT_ID'] == $op['PROJECT_ID'] ? ' selected=""' : '') . ' value="' . $project['PROJECT_ID'] . '">' . $project['PROJECT_KODE'] . ' | ' . $project['PROJECT_NAMA'] . '</option>';
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div id="rab_" class="form-group">
                                <label class="col-lg-2 control-label">RAB</label>
                                <div class="col-lg-5">
                                    <select name="RAB_ID" id="RAB_ID" class="form-control" onchange="">

                                        <?php
                                        foreach ($list_rab as $rab) {
                                            echo '<option' . ($rab['RAB_ID'] == $op['RAB_ID'] ? ' selected=""' : '') . ' value="' . $rab['RAB_ID'] . '">' . $rab['RAB_KODE'] . ' | ' . $rab['RAB_NAMA'] . '</option>';
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div id="rab_" class="form-group">
                                <label class="col-lg-2 control-label">TOP</label>
                                <div class="col-lg-5">
                                    <select name="top" id="select_top" class="form-control" onchange="">
                                        <?php
                                        foreach ($list_top as $top) {
                                            echo '<option' . ($top['TOP_ID'] == $op['TOP_ID'] ? ' selected=""' : '') . ' value="' . $top['TOP_ID'] . '">' . $top['TOP_KODE'] . ' | ' . $top['TOP_DESCRIPTION'] . '</option>';
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div id="rab_" class="form-group">
                                <label class="col-lg-2 control-label">Pajak</label>
                                <div class="col-lg-3">
                                    <select name="kategori_pajak" id="select_kategori_pajak" class="form-control" onchange="">
                                        <?php
                                        foreach ($list_kategori_pajak as $kategori_pajak) {
                                            echo '<option' . ($kategori_pajak['KATEGORI_PAJAK_ID'] == $op['KATEGORI_PAJAK_ID'] ? ' selected=""' : '') . ' value="' . $kategori_pajak['KATEGORI_PAJAK_ID'] . '">' . $kategori_pajak['KATEGORI_PAJAK_NAMA'] . '</option>';
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="col-lg-2">
                                    <select name="pajak" id="select_pajak" class="form-control" onchange="">
                                        <?php
                                        foreach ($list_pajak as $pajak) {
                                            echo '<option' . ($pajak['PAJAK_ID'] == $op['PAJAK_ID'] ? ' selected=""' : '') . ' value="' . $pajak['PAJAK_ID'] . '">' . $pajak['PAJAK_NAMA'] . ' | ' . $pajak['PAJAK_VALUE'] . '%</option>';
                                        }
                                        ?>
                                    </select>
                                    <?php
                                    foreach ($list_pajak as $pajak) {
                                        echo '<input type="hidden" id="id_pajak_' . $pajak['PAJAK_ID'] . '" value="' . $pajak['PAJAK_VALUE'] . '"/>';
                                    }
                                    ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-2 control-label">Jenis Opname</label>
                                <div class="col-lg-5">
                                    <select name="KATEGORI_OP_ID" id="KATEGORI_OP_ID" class="form-control" onchange="">
                                        <?php
                                        foreach ($listKategoriPk as $kategori_pk) {
                                            echo '<option' . ($kategori_pk['KATEGORI_PK_ID'] == $op['KATEGORI_OP_ID'] ? ' selected=""' : '') . ' value="' . $kategori_pk['KATEGORI_PK_ID'] . '">' . $kategori_pk['KATEGORI_PK_NAMA'] . '</option>';
                                        }
                                        ?>    
                                    </select>
                                </div>
                            </div>
                            <div id="projects_" class="form-group">
                                <label class="col-lg-2 control-label">Nama Mandor</label>
                                <div class="col-lg-5">
                                    <input type="text" name="nama_mandor" id="nama_mandor" class="form-control" placeholder="Nama Mandor" value="<?= $op['NAMA_MANDOR'] ?>"/>
                                </div>
                            </div>
                            <div id="projects_" class="form-group">
                                <label class="col-lg-2 control-label">Alamat</label>
                                <div class="col-lg-5">
                                    <input type="text" name="alamat_mandor" id="alamat_mandor" class="form-control" placeholder="Alamat Mandor" value="<?= $op['ALAMAT_MANDOR'] ?>"/>
                                </div>
                            </div>
                            <div id="projects_" class="form-group">
                                <label class="col-lg-2 control-label">No Telpon/HP</label>
                                <div class="col-lg-5">
                                    <input type="text" name="telpon_mandor" id="telpon_mandor" class="form-control" placeholder="Nomor telpon/HP Mandor" value="<?= $op['TELPON_MANDOR'] ?>"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-lg-2"></div>
                                <div class="col-lg-10">
                                    <button type="button" class="btn btn-sm btn-primary addBtn" onclick="tambahPK(true)"><i class="fa fa-plus fa-fw"></i>Tambah PK</button>
                                </div>
                            </div>
                            <div class="barangBaru">
                                <input type="hidden" name="totalHarga" value="0" id="total_harga">
                            </div>

                        </div>
                    </div>
                </div>
                <div class="page-tables">
                    <div class="table-responsive" style="overflow-x:scroll">
                        <div class="clearfix">
                            <br />
                        </div>
                        <table class="table table-striped table-bordered table-hover" id="tabel_list_pekerjaan_opname">
                            <thead>
                                <tr>
                                    <th>Kode Analisa</th>
                                    <th>Nama Pekerjaan</th>
                                    <th>Volume Opname</th>
                                    <th>Volume PK</th>
                                    <th>Volume PK Tersedia</th>
                                    <th>Satuan</th>
                                    <!--<th>Volume PK</th>-->
                                    <th>Harga Satuan</th>
                                    <th>Subtotal</th>
<!--                                    <th>Subtotal</th>-->
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody id="tabel_list_pekerjaan_opname_body">
                            </tbody>
                        </table>
                        <div class="clearfix">
                        </div>
                    </div>

                    <br/>
                    <div class="row" ng-if="displayField(['<?= Op::role_admin ?>'])">
                        <?php if ($op['STATUS_OP_ID'] == '1') {
                            ?>
                            <div class="col-lg-6"> 
                                <button type="button" class="pull-right btn btn-lg btn-primary saveForm" onclick="save('1');
                                        return false;">Simpan Sebagai Draft</button>
                            </div>
                            <div class="col-lg-6">
                                <button type="button" class="pull-left btn btn-lg btn-success saveForm" onclick="save('2');
                                        return false;">Simpan untuk Disetujui</button>
                            </div>
                            <?php
                        } else if ($op['STATUS_OP_ID'] == '4') {
                            ?>
                            <div class="col-lg-6">
                                <button type="button" class="pull-right btn btn-lg btn-primary saveForm" onclick="save('1');                                        return false;">Simpan Revisi</button>
                            </div>
                        <?php }
                        ?>

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
                <h4 class="modal-title"><b>Pilih Permintaan Pekerjaan<span id="modalTitle"></span></b></h4>
            </div>
            <div class="modal-body">
                <div class="widget-content">
                    <div class="form-horizontal">
                        <div class="form-group">
                            <!--<div class="col-lg-6">
                                <select name="RAB_ID" id="RAB_ID" class="form-control" onchange="RABChanged()">
                                    <option disabled selected value="0"> -- pilih rap -- </option>
                                </select>
                            </div>-->
                            <!-- <div class="col-lg-6">
                                <select name="KATEGORI_OP_ID" id="KATEGORI_OP_ID" class="form-control" onchange="$('#divTabelDetailPK').hide();
                                        RABChanged()">
                                    <option disabled selected value="0"> -- pilih kategori PK -- </option>
                            <?php for ($j = 0; $j < sizeof($listKategoriPk); $j++): ?>
                                                        <option value="<?= $listKategoriPk[$j]['KATEGORI_PK_ID'] ?>"><?= $listKategoriPk[$j]['KATEGORI_PK_NAMA'] ?></option>
                            <?php endfor; ?>    
                                </select>
                            </div> -->
                            <div class="col-lg-6">
                                <select name="select_pk" id="select_pk" class="form-control" onchange="changePK()">
                                    <option selected="" disabled="" value="x">Pilih PK</option>
                                </select>
                            </div>
                        </div>
                        <!-- <div class="form-group">
                            <div class="col-lg-6">
                                <select name="select_pk" id="select_pk" class="form-control" onchange="changePK()">
                                    <option selected="" disabled="" value="x">Pilih PK</option>
                                </select>
                            </div>
                        </div> -->
                    </div>
                    <div class="page-tables" style="overflow-x:scroll">
                        <div class="table-responsive" id="divTabelDetailPK">
                            <table cellpadding="5" cellspacing="0" border="0" id="tabel_detail_pk" width="100%" style="white-space: nowrap" class="display">
                                <thead id="head-bahan">
                                    <tr>
                                        <th>Kode</th>
                                        <th>Nama</th>
                                        <th>Volume PK</th>
                                        <th>Volume PK Tersedia</th>
                                        <th>Satuan</th>
                                        <th>Harga Satuan</th>
                                        <th>Subtotal</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody class="bodyBahan">

                                </tbody>
                            </table>
                            <div class="clearfix">
                            </div>
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
                <h4 class="modal-title"><b>Detail Pekerjaan</b></h4>
            </div>
            <div class="modal-body">
                <div class="form-horizontal">
                    <div class="form-group">
                        <label class="col-lg-4 control-label">Kode PK</label>
                        <div class="col-lg-5">
                            <input type="text" id="modal_edit_kode_pk" class="form-control" name="BARANG_NAMA" readonly="true">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-4 control-label">Kode Analisa</label>
                        <div class="col-lg-5">
                            <input type="text" id="modal_edit_kode_analisa" class="form-control" name="BARANG_KODE" readonly="true">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-4 control-label">Nama Pekerjaan</label>
                        <div class="col-lg-5">
                            <input type="text" id="modal_edit_nama_pekerjaan" class="form-control" name="BARANG_NAMA" readonly="true">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-4 control-label">Volume Opname</label>
                        <div class="col-lg-5">
                            <input type="text" id="modal_edit_volume_opname" class="form-control" name="VOLUME_PP" onkeyup="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-4 control-label">Volume PK</label>
                        <div class="col-lg-5">
                            <input type="text" id="modal_edit_volume_pk" class="form-control" name="VOLUME_PO" readonly="true">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-4 control-label">Volume Tersedia</label>
                        <div class="col-lg-5">
                            <input type="text" id="modal_edit_volume_tersedia" class="form-control" name="VOLUME_SISA" readonly="true">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-4 control-label">Satuan</label>
                        <div class="col-lg-5">
                            <input type="text" id="modal_edit_satuan_pekerjaan" class="form-control" name="VOLUME_SISA" readonly="true">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-4 control-label">Harga Satuan</label>
                        <div class="col-lg-5">
                            <div class="input-group">
                                <div class="input-group-addon">Rp</div>
                                <input type="text" id="modal_edit_harga_satuan_baru" class="form-control" name="HARGA_SATUAN" onkeyup="">

                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-4 control-label">Harga Satuan Awal</label>
                        <div class="col-lg-5">
                            <div class="input-group">
                                <div class="input-group-addon">Rp</div>
                                <input type="text" id="modal_edit_harga_satuan_asli" class="form-control" name="HARGA_AWAL" readonly="true">

                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-4 control-label">Pajak</label>
                        <div class="col-lg-5">
                            <div class="input-group">
                                <div class="input-group-addon">Rp</div>
                                <input type="text" id="modal_edit_pajak_rupiah" class="form-control" name="HARGA_PAJAK" readonly="true">

                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-4 control-label">Harga Net</label>
                        <div class="col-lg-5">
                            <div class="input-group">
                                <div class="input-group-addon">Rp</div>
                                <input type="text" id="modal_edit_harga_net" class="form-control" name="HARGA_NET" readonly="true">

                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-4 control-label">Harga Dibayar</label>
                        <div class="col-lg-5">
                            <div class="input-group">
                                <div class="input-group-addon">Rp</div>
                                <input type="text" id="modal_edit_harga_final" class="form-control" name="HARGA_FINAL" readonly="true">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal" aria-hidden="true">Batal</button>
                <button type="button" class="btn btn-primary" data-dismiss="modal" onclick="simpan_perubahan_detail_opname()">Simpan</button>
            </div>
            <input type="hidden" id="row_id_detail_opname" value=""/>
        </div>
    </div>
</div>

<div id="deleteModal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title">Konfirmasi penghapusan <span id="materialType"></span></h4>
            </div>
            <div class="modal-body">
                <h3 class="namaBarangHapus">Anda yakin untuk menghapus item ini?</h3>
                <input type="hidden" value="" name="tobe_deleted_id" id="tobe_deleted_id" />
                <input type="hidden" value="" id="subconItem" />
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" onclick="" id="deleteModalYesButton">Ya</button>
                <button type="button" class="btn btn-default" data-dismiss="modal" aria-hidden="true">Tidak</button>
            </div>
        </div>
    </div>
</div>

<script>
    var base_url1 = '<?= base_url() ?>';
    var uri = '<?= $this->uri->segment(1, 0) . '/' . $this->uri->segment(2, 0) ?>';
    var base_url = base_url1 + uri;
    var halaman_edit = true;
    $(document).ready(function () {
        //document.getElementsByClassName('has_sub')[1].setAttribute('class','has_sub open');
        //getListRAB();
        getDetailOp();
        tambahPK(false);
    });
    function getDetailOp() {
        console.log('get detail opname');
        $.ajax({
            type: "POST",
            url: "<?php echo base_url() . $this->uri->segment(1, 0) . '/' . $this->uri->segment(2, 0) . '/getDetailOp'; ?>",
            data: {
                id_op: '<?= $op['OPNAME_ID'] ?>'
            },
            success: function (data) {
                //alert(data);
                var val = JSON.parse(data);
                if (val.length > 0) {
                    for (var i = 0; i < val.length; i++) {
                        var dop = val[i];
                        console.log(dop);
//                        var d = {
//                            kode_analisa: (parseInt(dop['KATEGORI_OP_ID']) == 2 ? dop['ANALISA_KODE'] : (dop['UPAH_ID'] == null ? 'LSUOV' : dop['UPAH_KODE'])),
//                            nama_pekerjaan: (parseInt(dop['KATEGORI_OP_ID']) == 2 ? dop['ANALISA_NAMA'] : (dop['UPAH_ID'] == null ? dop['PAKET_OVERHEAD_UPAH_NAMA'] : dop['UPAH_NAMA'])),
//                            volume_pk: dop['VOLUME_PK'],
//                            volume_pk_terpakai: (parseInt(dop['KATEGORI_OP_ID']) == 2 ? dop['VOLUME_ANALISA_TERPAKAI'] : dop['VOLUME_OV_TERPAKAI']),
//                            satuan_nama: (parseInt(dop['KATEGORI_OP_ID']) == 2 ? dop['SATUAN_NAMA'] : dop['SATUAN_UPAH_NAMA']),
//                            harga_satuan: (parseInt(dop['KATEGORI_OP_ID']) == 2 ? dop['HARGA_ANALISA'] : (dop['UPAH_ID'] == null ? dop['PAKET_OVERHEAD_UPAH_HARGA'] : dop['UPAH_HARGA'])),
//                            harga_satuan_opname: dop['HARGA_OPNAME'],
//                            id_pk: parseInt(dop['PERMINTAAN_PEKERJAAN_ID']),
//                            id_analisa: parseInt(dop['ANALISA_ID']),
//                            id_ov: parseInt((dop['UPAH_ID'] == null ? dop['PAKET_OVERHEAD_UPAH_ID'] : dop['UPAH_ID'])),
//                            volume_opname: dop['VOLUME_OPNAME']
//                        };
                        var d = {
                            kode_analisa: dop['KODE_PEKERJAAN'],
                            nama_pekerjaan: dop['NAMA_PEKERJAAN'],
                            volume_pk: dop['VOLUME_PK'],
                            volume_pk_terpakai: dop['VOLUME_TERPAKAI'],
                            satuan_nama: dop['SATUAN_PEKERJAAN'],
                            harga_satuan: dop['HARGA_PEKERJAAN'],
                            harga_satuan_opname: dop['HARGA_OPNAME'],
                            id_pk: dop['PERMINTAAN_PEKERJAAN_ID'],
                            id_analisa: dop['ANALISA_ID'],
                            id_subcon: dop['SUBCON_ID'],
                            id_upah: dop['UPAH_ID'],
                            id_paket: dop['PAKET_OVERHEAD_UPAH_ID'],
                            volume_opname: dop['VOLUME_OPNAME']
                        };
                        tambahPekerjaanOpname(d);
                    }
                }
                else {
                }
            },
            error: function (xhr, ajaxOptions, thrownError) {
            }
        });
    }
</script>
<script type="text/javascript" src="<?= base_url() ?>assets/default/js/<?= $this->uri->segment(1, 0) . '/' . $this->uri->segment(2, 0) ?>/js1.js"></script>