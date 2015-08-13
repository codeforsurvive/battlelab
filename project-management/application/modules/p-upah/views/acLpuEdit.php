<!-- Page heading -->
<script src="<?php echo site_url() ?>assets/default/js/accounting.min.js"></script>
<div class="page-head">
    <h2 class="pull-left"><i class="fa fa-building-o"></i> Laporan Pengeluaran Upah</h2>
    <!-- Breadcrumb -->
    <div class="bread-crumb pull-right">
        <a href="index.html"><i class="fa fa-home"></i> Home</a> 
        <!-- Divider -->
        <span class="divider">/</span> 
        <a href="<?= base_url() . $this->uri->segment(1, 0) . '/' . $this->uri->segment(2, 0) . '/index' ?>" class="bread-current">LPU</a>
        <span class="divider">/</span> 
        <a href="#" class="bread-current">Edit</a>
    </div>
    <div class="clearfix"></div>
</div>
<!-- Page heading ends -->
<div class="col-md-12">
    <div class="widget wgreen">
        <div class="widget-head">
            <div class="pull-left">Edit LPU</div>
            <div class="widget-icons pull-right">
                <a href="#" class="wminimize">
                    <i class="fa fa-chevron-up"></i>
                </a>
            </div>
            <div class="clearfix"></div>
        </div>
        <div class="widget-content" style="padding: 10px">
            <form id="formPP" action="<?= base_url() . $this->uri->segment(1, 0) . '/' . $this->uri->segment(2, 0) . '/edit' ?>" method="post">
                <input id="flag_save" type="hidden" name="flag" value="0" />
                <input id="id_lpu" type="hidden" name="id_lpu" value="<?= $lpu['LPU_ID']; ?>" />
                <div class="page-tables">
                    <div class="table-responsive">
                        <div class="form-horizontal" role="form">
                            <div class="form-group" id="main_project">
                                <label class="col-lg-2 control-label">Main Proyek</label>
                                <div class="col-lg-5">
                                    <select name="MAIN_PROJECT_ID" id="select_main_project" class="form-control">
                                        <option disabled selected value="0"> -- pilih main project -- </option>
                                        <?php
                                        foreach ($listMainProject as $mp) {
                                            echo '<option value="' . $mp['MAIN_PROJECT_ID'] . '"' . ($mp['MAIN_PROJECT_ID'] == $lpu['MAIN_PROJECT_ID'] ? ' selected=""' : '') . '>' . $mp['MAIN_PROJECT_KODE'] . ' ' . $mp['MAIN_PROJECT_NAMA'] . '</option>';
                                        }
                                        ?>
                                    </select>
                                    <input type="text" class="form-control" style="display:none" id="selected_main_project"/>
                                </div>
                            </div>
                            <div id="projects_" class="form-group">
                                <label class="col-lg-2 control-label">Proyek</label>
                                <div class="col-lg-5">
                                    <select name="PROJECT_ID" id="select_project" class="form-control">
                                        <option disabled selected value="0"> -- pilih sub project -- </option>
                                        <?php
                                        foreach ($list_project as $pro) {
                                            echo '<option value="' . $pro['PROJECT_ID'] . '"' . ($pro['PROJECT_ID'] == $lpu['PROJECT_ID'] ? ' selected=""' : '') . '>' . $pro['PROJECT_KODE'] . ' ' . $pro['PROJECT_NAMA'] . '</option>';
                                        }
                                        ?>
                                    </select>
                                    <input type="text" class="form-control" style="display:none" id="selected_project"/>
                                </div>
                            </div>
                            <div id="rab_" class="form-group">
                                <label class="col-lg-2 control-label">RAB</label>
                                <div class="col-lg-5">
                                    <select name="RAB_ID" id="select_rab" class="form-control">
                                        <option disabled selected value="0"> -- pilih rap -- </option>
                                        <?php
                                        foreach ($list_rab as $rab) {
                                            echo '<option value="' . $rab['RAB_ID'] . '"' . ($rab['RAB_ID'] == $lpu['RAB_ID'] ? ' selected=""' : '') . '>' . $rab['RAB_KODE'] . ' ' . $rab['RAB_NAMA'] . '</option>';
                                        }
                                        ?>
                                    </select>
                                    <input type="text" class="form-control" style="display:none" id="selected_rab"/>
                                </div>
                            </div>
                            <div class="form-group next">
                                <label class="col-lg-2 control-label"></label>
                                <div class="col-lg-5">
                                    <button id="button_pilih_opname" type="button" class="btn btn-sm btn-primary"><i class="fa fa-plus fa-fw"></i> Pilih Opname</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="page-tables">
                    <div class="table-responsive" style="overflow-x: scroll">
                        <div class="clearfix">
                            <br />
                        </div>
                        <table class="table table-striped table-bordered table-hover" id="tabel_list_detail_opname">
                            <thead>
                                <tr>
                                    <th>Kode Opname</th>
                                    <th>Kode Analisa</th>
                                    <th>Nama Analisa</th>
                                    <th >Volume LPU</th>
                                    <th>Volume Opname Tersedia</th>
                                    <th>Volume Opname</th>
                                    <th>Satuan</th>
<!--                                    <th>Prosentase Kerja</th>-->

                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody id="tabel_list_detail_opname_body">
                            </tbody>
                        </table>
                        <div class="clearfix">
                        </div>
                    </div>

                    <br/>
                    <div class="row">
                        <?php if($lpu['STATUS_ID']=='1'){ ?>
                        <div class="col-lg-6"> 
                            <button type="button" class="pull-right btn btn-lg btn-primary saveForm" onclick="save('0')"> Simpan Sebagai Draft</button>
                        </div>
                        <div class="col-lg-6">
                            <button type="button" class="pull-left btn btn-lg btn-success saveForm" onclick="save('1')"> Simpan untuk Disetujui</button>
                        </div>
                        <?php } else if($lpu['STATUS_ID']=='4'){
                            ?>
                        <div class="col-lg-6">
                            <button type="button" class="pull-right btn btn-lg btn-primary saveForm" onclick="save('1')"> Simpan Revisi</button>
                        </div>
                        <?php
                        }?>
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
                <h4 class="modal-title"><b>Daftar Opname <span id="modalTitle"></span></b></h4>
            </div>
            <div class="modal-body">
                <div class="widget-content">
                    <div class="form-horizontal">
                        <div class="form-group">
                            <div class="col-lg-6">
                                <select name="select_pk" id="select_opname" class="form-control">
                                    <option selected="" disabled="" value="x">Pilih Opname</option>
                                    <?php
                                    foreach ($list_opname as $op) {
                                        echo '<option value="' . $op['OPNAME_ID'] . '">' . $op['OPNAME_KODE'] . '</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="page-tables">
                        <div class="table-responsive" id="divTabelDetailPK">
                            <table cellpadding="5" cellspacing="0" border="0" id="tabel_detail_opname" width="100%" style="white-space: nowrap" class="display">
                                <thead id="head-bahan">
                                    <tr>
                                        <th>Kode Analisa</th>
                                        <th>Nama Analisa</th>
                                        <th>Volume Opname Tersedia</th>
                                        <th>Volume Opname</th>
                                        <th>Satuan</th>
                                        
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody id="tabel_detail_opname_body">
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

<script>
    var base_url1 = '<?= base_url() ?>';
    var uri = '<?= $this->uri->segment(1, 0) . '/' . $this->uri->segment(2, 0) ?>';
    var base_url = base_url1 + uri;
    var id_lpu = '<?= $lpu['LPU_ID'] ?>';
</script>
<script type="text/javascript" src="<?= base_url() . 'assets/default/js/' . $this->uri->segment(1, 0) . '/' . $this->uri->segment(2, 0) ?>/js1.js"></script>
<script type="text/javascript" src="<?= base_url() . 'assets/default/js/' . $this->uri->segment(1, 0) . '/' . $this->uri->segment(2, 0) ?>/jsedit.js"></script>