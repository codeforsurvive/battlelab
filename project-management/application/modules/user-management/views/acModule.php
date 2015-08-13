<script type="text/javascript">
    function fillEditForm(id) {
        var name = document.getElementById('module_name_' + id).innerHTML;
        var code = document.getElementById('module_code_' + id).innerHTML;
        //alert($("#module_parent_" + id).val());
        $("#selector select").val($("#module_parent_" + id).val());
        document.getElementById('module_name').value = name;
        document.getElementById('module_id').value = id;
        document.getElementById('module_code').value = code;
    }

    function showDeleteModal(id) {
        var name = document.getElementById('module_name_' + id).innerHTML;
        document.getElementById('delete_form_id').value = id;
        $("#delete_form_name").text(name);
        $("#deleteModal").modal();
    }

    function confirmDelete() {
        $("#deleteModal").modal("hide");
        $("#delete_form").submit();
    }

</script>

<div class="col-md-12">
    <div class="widget wgreen">
        <div class="widget-head">
            <div class="pull-left">Module Management</div>
            <div class="widget-icons pull-right">
                <a href="#" class="wminimize">
                    <i class="fa fa-chevron-up">
                    </i>
                </a>
                <a href="#" class="wclose">
                    <i class="fa fa-times">
                    </i>
                </a>
            </div>
            <div class="clearfix"></div>
        </div>
        <div class="widget-content" style="padding: 10px">
            <div id="deleteModal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                            <h4 class="modal-title">Konfirmasi penghapusan modul</h4>
                        </div>
                        <div class="modal-body">
                            <h3>Anda yakin untuk menghapus modul <span id="delete_form_name"></span>?</h3>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary" onclick="confirmDelete();">Ya</button>
                            <button type="button" class="btn btn-default" data-dismiss="modal" aria-hidden="true">Tidak</button>
                        </div>
                    </div>
                </div>
            </div>
            <div>
                <form class="form-horizontal" role="form" action="<?= base_url() ?>user-management/module/save" method="post">
                    <div class="form-group">
                        <input type="hidden" id="module_id" name="<?= mModule::ID ?>" value="0" />
                        <label class="col-lg-2 control-label">Kode Modul</label>
                        <div class="col-lg-5">
                            <input type="text" class="form-control" id="module_code" name="<?= mModule::MNEMONIC ?>" placeholder="Kode Modul" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-2 control-label">Nama Modul</label>
                        <div class="col-lg-5">
                            <input type="text" class="form-control" id="module_name" name="<?= mModule::NAME ?>" placeholder="Nama Modul" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-2 control-label">Parent Module</label>
                        <div class="col-lg-5">
                            <select name="<?= mModule::PARENT_ID ?>" class="form-control" id="selector">
                                <option selected disabled> -- Pilih salah satu -- </option>
                                <option value="0_-1">[Top Level]</option>
                                <?php foreach ($parentList as $item): ?>
                                    <option value="<?= $item[mModule::ID] . "_" . $item[mModule::LEVEL] ?>"><?= $item[mModule::MNEMONIC] . " | " . $item[mModule::NAME] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-lg-2"></div>
                        <div class="col-lg-5">
                            <button type="submit" class="btn btn-sm btn-success"><i class="fa fa-save fa-fw"></i>Simpan</button>
                        </div>
                    </div>
                </form> 
            </div>
            <form action="<?= base_url() ?>user-management/module/delete" method="post" id="delete_form">
                <input type="hidden" id="delete_form_id" name="<?= mRole::ID ?>" value="0" />
            </form>

            <div class="page-tables">
                <div class="table-responsive">
                    <table cellpadding="0" cellspacing="0" border="0" id="data-table" width="100%">
                        <thead>
                            <tr>
                                <th style="width: 150px; text-align: center">&nbsp;</th>
                                <th style="width: 50px; text-align: center">#</th>
                                <th>Kode Modul</th>
                                <th>Nama Modul</th>
                                <th>Parent</th>
                                <th>Detail</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php
                            //print_r($departemenList);
                            foreach ($modules as $module) {
                                ?>
                                <tr>
                                    <td>
                                        <div class="btn-group">
                                            <button class="btn btn-default dropdown-toggle btn-info" data-toggle="dropdown">Pilihan<span class="caret"></span></button>   
                                            <ul class="dropdown-menu">
                                                <li><button class="btn btn-sm btn-info" style="width: 100%" onclick="fillEditForm(<?= $module[mModule::ID] ?>)"><i class="fa fa-refresh fa-fw"></i>Ubah</button></li>
                                                <li><button class="btn btn-sm btn-danger" style="width: 100%" onclick="showDeleteModal(<?= $module[mModule::ID] ?>)"><i class="fa fa-trash-o fa-fw"></i>Hapus</button></li>
                                            </ul>
                                        </div>
                                    </td>
                                    <td style="text-align: center" id="module_id_<?= $module[mModule::ID] ?>"><?= $module[mModule::ID] ?></td>
                                    <td id="module_code_<?= $module[mModule::ID] ?>"><?= $module[mModule::MNEMONIC] ?></td>
                                    <td id="module_name_<?= $module[mModule::ID] ?>"><?= $module[mModule::NAME] ?></td>
                                    <td>&nbsp;</td>
                                    <td>
                                        <div>
                                            <form action="<?= base_url() ?>user-management/module/manage" method="post">
                                                <input type="hidden" name="<?= mModule::ID ?>" value="<?= $module[mModule::ID] ?>" />
                                                <button class="btn btn-success" type="submit"><i class="fa fa-search"></i> Detail</button>
                                            </form>
                                        </div>
                                    </td>
                                    <td>
                                        <input type="hidden" id="module_parent_<?= $module[mModule::ID] ?>" value="<?= $module[mModule::ID] . "_" . $module[mModule::LEVEL] ?>" />
                                    </td>
                                </tr>
                                <?php
                            }
                            ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>&nbsp;</th>
                                <th>#</th>
                                <th>Kode Modul</th>
                                <th>Nama Modul</th>
                                <th>Parent</th>
                                <th>Detail</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
        <div style="width: 100%; height: 25px">&nbsp;</div>
    </div>
</div>



