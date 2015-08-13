<script type="text/javascript">
    function save() {
        var pwd_old = $("#old_pwd").val();
        var pwd_old_input = md5($("#pwd").val());
        var pwd_new = $("#pwd2").val();
        var confirm = $("#pwd3").val();

        if (pwd_old_input === "" || pwd_new === "" || confirm === "") {
            alert("Password harus diisi!");
        } else if (pwd_old !== pwd_old_input) {
            alert("Password validasi lama salah!");
        } else if (pwd_new !== confirm) {
            alert("Password validasi baru tidak cocok!");
        } else {
            //alert("ok!");
            var id = $("#usr_id").val();
            $.ajax({
                "type": "post",
                "url": "<?= base_url() ?>user-management/role/updatePasswordValidasi",
                "data": {<?= mUser::ID ?>: id, <?= mUser::PASSWORD_VALIDATION ?>: pwd_new},
                "success": function(response) {
                    var json = JSON.parse(response);
                    if (json.status) {
                        alert("Perubahan password validasi berhasil!");
                    } else {
                        alert("Perubahan password validasi gagal!");
                    }
                    $("#passwordValModal").modal("hide");
                },
                "error": function(err) {
                    alert(err);
                    $("#passwordValModal").modal("hide");
                }
            });
        }
    }

    function _hide() {
        $('#alertMessage').hide();
    }

</script>
<div class="col-md-12">
    <div class="widget wgreen">
        <div class="widget-head">
            <div class="pull-left">Detail Pengguna</div>
            <div class="widget-icons pull-right">
                <a href="#" class="wminimize">
                    <i class="fa fa-chevron-up"></i>
                </a>
                <a href="#" class="wclose">
                    <i class="fa fa-times"></i>
                </a>
            </div>
            <div class="clearfix"></div>
        </div>

        <div class="widget-content" style="padding: 10px">
            <button class="btn btn-info" data-toggle="modal" data-target="#passwordValModal"><i class="fa fa-pencil fa-lg"></i>  Ubah Password Validasi</button>
            <br />
            <div class="clearfix"></div>

            <div class="modal fade" id="passwordValModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title">Ubah Password</h4>
                        </div>
                        <div class="modal-body">
                            <div class="form-horizontal">
                                <input type="hidden" id="usr_id" value="<?= $userDetail[mUser::ID] ?>" name="<?= mUser::ID ?>" />
                                <input type="hidden" id="old_pwd" value="<?= $userDetail[mUser::PASSWORD_VALIDATION] ?>" />
                                <div class="form-group">
                                    <label class="col-md-5">Password Validasi Lama</label>
                                    <div class="col-md-7">
                                        <input type="password" class="form-control" name="" id="pwd" required/>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-5">Password Validasi Baru</label>
                                    <div class="col-md-7">
                                        <input type="password" class="form-control" name="<?= mUser::PASSWORD_VALIDATION ?>" id="pwd2" required />
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-5">Confirm Password Validasi Baru</label>
                                    <div class="col-md-7">
                                        <input type="password" class="form-control" name="" id="pwd3" required />
                                    </div>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-fw fa-lg fa-times"></i> Close</button>
                            <button type="button" class="btn btn-primary" onclick="save()"><i class="fa fa-fw fa-lg fa-save"></i> Simpan</button>
                        </div>
                    </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
            </div><!-- /.modal -->

            <div class="clearfix"></div>
            <div class="col-md-3">
                <h4>Nama Pengguna</h4>
            </div>
            <div class="col-md-3">
                <h4><?= $userDetail[mUser::NAME] ?></h4>
            </div>
            <div class="clearfix"></div>
            <div class="col-md-3">
                <h4>Username</h4>
            </div>
            <div class="col-md-3">
                <h4><?= $userDetail[mUser::USERNAME] ?></h4>
            </div>
            <div class="clearfix"></div>
            <div class="col-md-3">
                <h4>Email Pengguna</h4>
            </div>
            <div class="col-md-3">
                <h4><?= $userDetail[mUser::EMAIL] ?></h4>
            </div>
            <div class="clearfix"></div>
            <div class="col-md-3">
                <h4>Hak Akses</h4>
            </div>
            <div class="col-md-6">
                <?php
                foreach ($mappedRoles as $mr) {
                    ?>
                    <div>
                        <div class="col-md-5">
                            <?= $rolesDictionary[$mr[mUserRole::ROLE]] ?>
                        </div>
                        <div class="col-md-2">
                            <form action="<?= base_url() ?>user-management/role/deleteRole" method="post">
                                <input name="<?= mUserRole::USER ?>" value="<?= $userDetail[mUser::ID] ?>" type="hidden" />
                                <input name="<?= mUserRole::ROLE ?>" value="<?= $mr[mUserRole::ROLE] ?>" type="hidden" />
                                <button type="submit" class="btn btn-sm btn-danger"><i class="fa fa-times"></i> Hapus</button>
                            </form>
                        </div>
                        <div class="clearfix"></div>
                        <div style="width: 100%; height: 10px"></div>
                    </div>
                    <div class="clearfix"></div>
                <?php } ?>
                <div class="clearfix"></div>
                <div class="form-horizontal" ng-if="displayField(['role_admin'])">

                    <form action="<?= base_url() ?>user-management/role/addRole" method="post">
                        <div class="col-md-3">
                            <input name="<?= mUserRole::USER ?>" value="<?= $userDetail[mUser::ID] ?>" type="hidden" />
                            <select name="<?= mUserRole::ROLE ?>" class="form-control">
                                <?php foreach ($unmappedRoles as $r) { ?>
                                    <option value="<?= $r[mRole::ID] ?>"><?= $r[mRole::NAME] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="col-md-2">
                            <button type="submit" class="btn btn-sm btn-success"><i class="fa fa-plus"></i> Tambah</button>
                        </div>
                    </form>


                </div>
            </div>
            <div class="clearfix"></div>
        </div>

    </div>
</div>