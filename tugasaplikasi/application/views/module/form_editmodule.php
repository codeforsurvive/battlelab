<form method="POST" action="<?php echo base_url(); ?>index.php/module/simpan">
    <div class="row" >
        <div class="col-md-6">
            <div class="box box-primary">
                <div class="box-header">
                    <h3 class="box-title">Form Edit Module</h3>
                </div>
                <form>
                    <div class="box-body">
                        <div class="form-group">
                            <input type="hidden" class="form-control" name="id_module" id="id_moduule" placeholder="ID Module" value="<?php echo $id_module; ?>" readonly required>
                        </div>

                        <div class="form-group">
                            <label for="nama_module">Nama Module</label>
                            <input type="nama_module" class="form-control" name="nama_module" id="nama_module" placeholder="Nama Module" value="<?php echo $nama_module; ?>" required>
                        </div>
                         <div class="form-group">
                            <label for="harga_module">Harga Module</label>
                            <input type="harga_module" class="form-control" name="harga_module" id="nama_module" placeholder="Hara Module" value="<?php echo $harga_module; ?>" required>
                        </div>
                         <div class="form-group">
                            <label for="penjelasan">Penjelasan</label>
                            <textarea type="text" class="form-control" name="penjelasan" id="penjelasan" placeholder="Penjelasan" value="" require><?php echo $penjelasan; ?></textarea>
                        </div>
                    </div>

                    <div class="box-footer">
                        <button type="submit" class="btn btn-default"><i class="fa fa-save"></i> Simpan</button>
                        <a href="<?php echo base_url(); ?>index.php/module" class="btn btn-default">kembali</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</form>