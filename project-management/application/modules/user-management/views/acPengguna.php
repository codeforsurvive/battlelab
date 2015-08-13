<script type="text/javascript">
    var current_id = -1;

    function clearEditForm() {
        $('#edit_row').remove();
        current_id = -1;
    }

    function fillEditForm(id) {
        if (current_id !== id) {
            current_id = id;
            $('#edit_row').remove();
            $("<tr id='edit_row'><td colspan='7' class='alert-info'><div style='margin-top:10px' id='edit_form'></div></td></tr>").insertAfter("#user_" + current_id);
            var template = $("#edit_form_template").clone();
            template.appendTo("#edit_form");
            $("#edit_form #user_id_edit").val(id);
            $("#edit_form #user_name_edit").val($("#user_name_" + id).text());
            $("#edit_form #user_email_edit").val($("#user_email_" + id).text());
            $("#edit_form #user_phone_edit").val($("#user_phone_" + id).text());
            $("#edit_form #user_departement_edit").text($("#user_departemen_" + id).text());
            $("#edit_form #departemen_selector").val($("#user_departemen_" + id).text());
            $("#edit_form #user_uname_edit").val($("#user_uname_" + id).text());
            //$("#edit_form #departemen_" + id).prop('selected', 'selected');
            template.slideDown();
        }
    }

    function checkDepartmentChange(cb) {
        var isSelected = cb.checked;
        $("#edit_form #departemen_selector").prop('disabled', !isSelected);
    }

    function checkLoginDetailEdit(cb) {
        var isSelected = cb.checked;
        $("#edit_form #user_uname_edit").prop('disabled', !isSelected);
        $("#edit_form #user_password_old").prop('disabled', !isSelected);
        $("#edit_form #user_password_edit").prop('disabled', !isSelected);
        $("#edit_form #user_confirm_edit").prop('disabled', !isSelected);
    }

    function showDeleteModal(id) {
        //alert('Modal!');
        var name = document.getElementById('user_name_' + id).innerHTML;
        document.getElementById('delete_user_form_id').value = id;
        $("#delete_user_form_name").text(name);
        $("#deleteModal").modal();
    }

    var div_tabel_log_aktivitas = null;

    function showLogModal(id, elmn) {
        console.log("show log user " + id);
        $('#logmodal_title').html('Log Aktivitas ' + elmn.parentNode.parentNode.parentNode.parentNode.parentNode.children[4].innerHTML);
        $("#logModal").modal();
        if (div_tabel_log_aktivitas != null) {
            //div_tabel_log_aktivitas = $('#div_tabel_log_aktivitas');
            //console.log(div_tabel_log_aktivitas);
            div_tabel_log_aktivitas.fnDestroy();
            $('#tabel_log_aktivitas_body').html('');
        }
        //$('#logModalBody').html(div_tabel_log_aktivitas);
        div_tabel_log_aktivitas = $('#tabel_log_aktivitas').dataTable({
            processing: true,
            serverSide: true,
            order: [[0, 'desc']],
            aoColumnDefs: [
                {'bSortable': false, 'aTargets': [5, 6]}
            ],
            ajax: {
                url: "<?php echo base_url(); ?>user-management/pengguna/getLogAktivitas",
                method: 'post',
                data: {
                    user_id: id
                },
                dataSrc: function (json) {
                    jsonData = json.data;
                    return json.data;
                }
            },
            createdRow: function (row, data, index) {
                var id = data[0];
                //$('td', row).eq(0).html('<div class="btn-group"><button class="btn btn-default btn-xs dropdown-toggle btn-info" data-toggle="dropdown">Aksi <span class="caret"></span></button><ul class="dropdown-menu"><li><a href="javascript:fillUpdate(' + id + ',' + index + ')"><i class="fa fa-refresh fa-fw"></i> Ubah</a></li><li><a href="javascript:confirmDelete(' + id + ')"><i class="fa fa-trash-o fa-fw"></i> Hapus</a></li></ul></div>');
                $('td', row).eq(1).html(data[4]);
                $('td', row).eq(2).html(data[3]);
                $('td', row).eq(3).html(data[5]);
                $('td', row).eq(4).html(data[8]);
                var detail = '';
                var jdetail = JSON.parse(data[6]);
                if (jdetail != null) {
                    console.log(jdetail);
                    var keys = Object.keys(jdetail);
                    var sep = '';
                    for (var i = 0, i2 = keys.length; i < i2; i++) {
                        detail += sep + keys[i] + ' = ' + jdetail[keys[i]];
                        sep = '<br/>';
                    }
                    console.log(detail);
                }
                $('td', row).eq(5).html(detail);
                detail = '';
                jdetail = JSON.parse(data[7]);
                if (jdetail != null) {
                    console.log(jdetail);
                    var keys = Object.keys(jdetail);
                    var sep = '';
                    for (var i = 0, i2 = keys.length; i < i2; i++) {
                        detail += sep + keys[i] + ' = ' + jdetail[keys[i]];
                        sep = '<br/>';
                    }
                    console.log(detail);
                }
                $('td', row).eq(6).html(detail);
                $(row).attr('id', 'item_' + id);
            }
        });
    }

    function confirmDelete() {
        $("#deleteModal").modal("hide");
        $("#delete_user_form").submit();
    }
    $(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();   
});
</script>

<div class="col-md-12">
    <div class="widget wgreen">
        <div class="widget-head">
            <div class="pull-left">Master Pengguna</div>
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
            <div id="logModal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog" style="width:1100px">
                    <div class="modal-content" style="">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                            <h4 class="modal-title" id="logmodal_title">Log Aktivitas Pengguna</h4>
                        </div>
                        <div class="modal-body" id="logModalBody">
                            <div class="page-tables">
                                <div class="widget-content">
                                    <div class="table-responsive" align="right" id="div_tabel_log_aktivitas">
                                        <table id="tabel_log_aktivitas" class="display" cellspacing="0" width="100%"  style="margin-bottom: 10px">
                                            <thead>
                                                <tr>
                                                    <th>ID Log</th>
                                                    <th>Aksi</th>
                                                    <th>Modul</th>
                                                    <th>Tabel</th>
                                                    <th>Tanggal</th>
                                                    <th>Detail</th>
                                                    <th>Kata Kunci</th>
                                                </tr>
                                            </thead>
                                            <tbody id="tabel_log_aktivitas_body"></tbody>
                                        </table>
                                        <div class="clearfix" >
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <!--                            <button type="button" class="btn btn-primary" onclick="">Ya</button>-->
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
                            <h4 class="modal-title">Konfirmasi penghapusan pengguna</h4>
                        </div>
                        <div class="modal-body">
                            <h3>Anda yakin untuk menghapus pengguna <span id="delete_user_form_name"></span>?</h3>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary" onclick="confirmDelete()">Ya</button>
                            <button type="button" class="btn btn-default" data-dismiss="modal" aria-hidden="true">Tidak</button>
                        </div>
                    </div>
                </div>
            </div>

            <button type="button" class="btn btn-sm btn-primary" onclick="$('#insert_form').slideToggle();" ng-if="displayField(['pengguna_admin'])"><i class="fa fa-plus fa-fw"></i> Tambahkan pengguna</button>
            <div class="clearfix">
                <br />
            </div>
            <div class="form-horizontal" id="insert_form" style="display: none" ng-if="displayField(['pengguna_admin'])">
                <form role="form" action="<?= base_url() ?>user-management/pengguna/save" method="post">
                    <div class="form-group">
                        <input type="hidden" id="user_id" name="<?= mUser::ID ?>" value="0" />
                        <label class="col-lg-2 control-label">Nama </label>
                        <div class="col-lg-5">
                            <input type="text" class="form-control" id="user_name" name="<?= mUser::NAME ?>" placeholder="Nama Pengguna" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-2 control-label">Username </label>
                        <div class="col-lg-5">
                            <input type="text" class="form-control" id="user_username" name="<?= mUser::USERNAME ?>" placeholder="Username Pengguna" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-2 control-label">Password </label>
                        <div class="col-lg-5">
                            <input type="password" class="form-control" id="user_password" name="<?= mUser::PASSWORD ?>" placeholder="Password Pengguna" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-2 control-label">Ulang Password </label>
                        <div class="col-lg-5">
                            <input type="password" class="form-control" id="user_password_confirm" placeholder="Konfirmasi Password" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-2 control-label">Email</label>
                        <div class="col-lg-5">
                            <input type="email" class="form-control" id="user_email" name="<?= mUser::EMAIL ?>" placeholder="Email Pengguna" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-2 control-label">Telepon</label>
                        <div class="col-lg-5">
                            <input type="text" class="form-control" id="user_phone" name="<?= mUser::HP ?>" placeholder="Telepon Pengguna" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-2 control-label">Departemen</label>
                        <div class="col-lg-5">
                            <select name="<?= mUser::DEPARTEMEN ?>" class="form-control">
                                <?php
                                foreach ($departementList as $departemen) {
                                    ?>
                                    <option value="<?= $departemen[mDepartemen::ID] ?>"><?= $departemen[mDepartemen::NAME] ?></option>
                                    <?php
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-lg-offset-2 col-lg-6">
                            <button type="submit" class="btn btn-sm btn-success"><i class="fa fa-save fa-fw"></i>Simpan</button>
                            <button type="button" class="btn btn-sm btn-danger" onclick="$('#insert_form').slideToggle();"><i class="fa fa-ban fa-fw"></i> Batal</button>
                        </div>
                    </div>
                </form>
            </div>
            <form action="<?= base_url() ?>user-management/pengguna/delete" method="post" id="delete_user_form">
                <input type="hidden" id="delete_user_form_id" name="<?= mUser::ID ?>" value="0" />
            </form>
            <div id="edit_form_template" style="display: none; padding-top: 20px" class="alert-info">
                <form method="post" action="<?= base_url() ?>user-management/pengguna/save">
                    <input type="hidden" id="user_id_edit" name="<?= mUser::ID ?>" value="0" />
                    <div class="col-lg-6 col-lg-offset-0 alert-info">
                        <div class="form-horizontal" role="form">
                            <div class="form-group">
                                <label class="col-lg-2 control-label">Nama</label>
                                <div class="col-lg-9">
                                    <input type="text" class="form-control" id="user_name_edit" name="<?= mUser::NAME ?>" placeholder="Nama Pengguna" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-2 control-label">Email</label>
                                <div class="col-lg-9">
                                    <input type="text" class="form-control" id="user_email_edit" name="<?= mUser::EMAIL ?>" placeholder="Email Pengguna" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-2 control-label">Handphone</label>
                                <div class="col-lg-9">
                                    <input type="text" class="form-control" id="user_phone_edit" name="<?= mUser::HP ?>" placeholder="Telepon Pengguna" />
                                </div>
                            </div> 

                            <div class="form-group">
                                <label class="col-lg-2 control-label">Departemen</label>
                                <div class="col-lg-9">
                                    <span id="user_departement_edit" class="form-control disabled"></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-2 control-label">Mutasi</label>
                                <div class="col-lg-9">
                                    <input type="checkbox" value="checked" onclick="checkDepartmentChange(this)" name="<?= mUser::MUTASI ?>"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-2 control-label">Departemen Baru</label>
                                <div class="col-lg-9">
                                    <select class="form-control" name="<?= mUser::DEPARTEMEN ?>" id="departemen_selector" disabled="true">
                                        <?php
                                        foreach ($departementList as $departemen) {
                                            ?>
                                            <option value="<?= $departemen[mDepartemen::ID] ?>" id="departemen_<?= $departemen[mDepartemen::ID] ?>"><?= $departemen[mDepartemen::NAME] ?></option>
                                            <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-5 col-lg-offset-0 alert-info">
                        <div class="form-horizontal">
                            <div class="form-group">
                                <label class="col-lg-4 control-label">Ubah Login Info</label>
                                <div class="col-lg-7">
                                    <input type="checkbox" value="checked" onclick="checkLoginDetailEdit(this)" name="<?= mUser::EDIT_LOGON_INFO ?>"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-4 control-label">Username</label>
                                <div class="col-lg-7">
                                    <input type="text" class="form-control" id="user_uname_edit" name="<?= mUser::USERNAME ?>" placeholder="Username Pengguna" disabled="true" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-4 control-label">Password</label>
                                <div class="col-lg-7">
                                    <input type="password" class="form-control" id="user_password_old" placeholder="Password Pengguna" disabled="true"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-4 control-label">Password Baru</label>
                                <div class="col-lg-7">
                                    <input type="password" class="form-control" id="user_password_edit" name="<?= mUser::PASSWORD ?>" placeholder="Password Pengguna" disabled="true"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-4 control-label">Konfirmasi Password</label>
                                <div class="col-lg-7">
                                    <input type="password" class="form-control" id="user_confirm_edit" placeholder="Password Pengguna" disabled="true"/>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div style="width: 100%" class="alert-info">
                        <div class="form-horizontal" role="form">
                            <div class="form-group">
                                <button type="submit" class="btn btn-sm btn-success" data-toggle="tooltip" title="Simpan"><i class="fa fa-save fa-fw"></i></button>
                                <button type="button" class="btn btn-sm btn-danger" data-toggle="tooltip" title="Batal" onclick="$('#edit_form').slideUp('slow', clearEditForm())"><i class="fa fa-ban fa-fw"></i></button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="page-tables" ng-if="displayField(['pengguna_admin', 'pengguna_viewer'])">
            <div class="table-responsive">
                <table cellpadding="0" cellspacing="0" border="0" id="data-table" width="100%">
                    <thead>
                        <tr>
                            <th style="width: 150px; text-align: center">&nbsp;</th>
                            <th style="width: 50px; text-align: center">#</th>
                            <th>Username</th>
                            <th>&nbsp;</th>
                            <th>Nama Pengguna</th>
                            <th>Email</th>
                            <th>HP</th>
                            <th>Departemen</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        //print_r($departemenList);
                        foreach ($userList as $user) {
                            ?>
                            <tr id="user_<?= $user[mUser::ID] ?>">
                                <td>
                                    <div class="btn-group" ng-if="displayField(['pengguna_admin'])">
                                        <button class="btn btn-default dropdown-toggle btn-info" data-toggle="dropdown">Pilihan<span class="caret"></span></button>   
                                        <ul class="dropdown-menu">
                                            <li><button class="btn btn-sm btn-info" style="width: 100%" onclick="fillEditForm(<?= $user[mUser::ID] ?>)"><i class="fa fa-refresh fa-fw"></i>Ubah</button></li>
                                            <li><button class="btn btn-sm btn-danger" style="width: 100%" onclick="showDeleteModal(<?= $user[mUser::ID] ?>)"><i class="fa fa-trash-o fa-fw"></i>Hapus</button></li>
                                            <li>
                                                <form action="<?= base_url() ?>user-management/role/detail" method="post">
                                                    <input type="hidden" value="<?= $user[mUser::ID] ?>" name="<?= mUser::ID ?>"/>
                                                    <button class="btn btn-sm btn-success" style="width: 100%"><i class="fa fa-search"></i> Detail</button>
                                                </form>
                                            </li>
                                            <li><button class="btn btn-sm btn-default" style="width: 100%" onclick="showLogModal(<?= $user[mUser::ID] ?>, this)"><i class="fa fa-calendar fa-fw"></i>Log Aktivitas</button></li>
                                        </ul>
                                    </div>
                                </td>
                                <td style="text-align: center" id="user_id_<?= $user[mUser::ID] ?>"><?= $user[mUser::ID] ?></td>
                                <td id="user_uname_<?= $user[mUser::ID] ?>"><?= $user[mUser::USERNAME] ?></td>
                                <td>&nbsp;<div id="user_password_<?= $user[mUser::ID] ?>" style="display: none"><?= $user[mUser::PASSWORD] ?></div></td>
                                <td id="user_name_<?= $user[mUser::ID] ?>"><?= $user[mUser::NAME] ?></td>
                                <td id="user_email_<?= $user[mUser::ID] ?>"><?= $user[mUser::EMAIL] ?></td>
                                <td id="user_phone_<?= $user[mUser::ID] ?>"><?= $user[mUser::HP] ?></td>
                                <td id="user_departemen_<?= $user[mUser::ID] ?>"><?= $userDepartementMap[$user[mUser::DEPARTEMEN]] ?></td>

                            </tr>
                            <?php
                        }
                        ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th style="width: 150px; text-align: center">&nbsp;</th>
                            <th style="width: 50px; text-align: center">#</th>
                            <th>Username</th>
                            <th>&nbsp;</th>
                            <th>Nama Pengguna</th>
                            <th>Email</th>
                            <th>HP</th>
                            <th>Departemen</th>

                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
    <div style="width: 100%; height: 25px">&nbsp;</div>
</div>
</div>
