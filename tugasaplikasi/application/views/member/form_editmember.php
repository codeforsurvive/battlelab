
<form method="POST" action="<?php echo base_url(); ?>index.php/member/simpan">
    <div class="row" >
        <div class="col-md-6">
            <div class="box box-primary">
                <div class="box-header">
                    <h3 class="box-title">Form Edit Member</h3>
                </div>
                <form>
                    <div class="box-body">
                        <div class="form-group">
                            <label for="id_member">ID Member</label>
                            <input type="text" class="form-control" name="id_member" id="id_member" placeholder="ID Member" value="<?php echo $id_member; ?>" readonly required>
                        </div>
                        <div class="form-group">
                            <label for="nama">Nama Member</label>
                            <input type="text" class="form-control" name="nama" id="nama" placeholder="Nama" value="<?php echo $nama; ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="telp">Telepon</label>
                            <input type="text" class="form-control" name="telp" id="telp" placeholder="Telepon" data-inputmask='"mask": "(999) 999-9999"' data-mask value="<?php echo $telp; ?>"required>
                        </div>
                         <div class="form-group">
                            <label for="email">E-Mail</label>
                            <input type="email" class="form-control" name="email" id="email" placeholder="E-Mail"  value="<?php echo $email; ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" name="password" id="password" placeholder="Password" value="<?php echo $password; ?>" required><p></p>
                            <input type="passwor" class="form-control" name="password2" id="password2" placeholder="Password Confirmation" value="<?php echo $password; ?>" required>
                        </div>
                    </div>

                    <div class="box-footer">
                        <button type="submit" class="btn btn-default"><i class="fa fa-save"></i> Simpan</button>
                        <a href="<?php echo base_url(); ?>index.php/member" class="btn btn-default">kembali</a>
                    </div>
            </div>
        </div>
    </div>
</form>
