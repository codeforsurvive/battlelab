

<form method="POST" action="<?php echo base_url(); ?>index.php/member/simpan">
    <div class="row" >
        <div class="col-md-6">
            <div class="box box-primary">
                <div class="box-header">
                    <h3 class="box-title">Form Tambah Member</h3>
                </div>
                <form>
                    <div class="box-body">
                        <div class="form-group">
                            <label for="nama">Nama</label>
                            <input type="text" class="form-control" name="nama" id="nama" placeholder="Nama" placehol required>
                        </div>
                         <div class="form-group">
                            <label for="telp">Telepon</label>
                            <input type="text" class="form-control" name="telp" id="nama" placeholder="Telepon" data-inputmask='"mask": "(9999) 9999-9999"' data-mask placehol required >
                        </div>
                        <div class="form-group">
                            <label for="email">E-Mail</label>
                            <input type="email" class="form-control" name="email" id="kode_lamarizk" placeholder="E-mail"  placehol required>
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" name="password" id="password" placeholder="Password" placehol required><p></p>
                            <input type="password" class="form-control" name="password2" id="password2" placeholder="Password Confirmation" placehol required>
                        </div>
                    </div>

            </div>

            <div class="box-footer">
                <button type="submit" class="btn btn-default"><i class="fa fa-save"></i> Simpan</button>
                <a href="<?php echo base_url(); ?>index.php/member" class="btn btn-default">kembali</a>
            </div>
        </div>
    </div>
</form>