<form method="POST" action="<?php echo base_url(); ?>index.php/module/simpan">
    <div class="row" >
        <div class="col-md-6">
            <div class="box box-primary">
                <div class="box-header">
                    <h3 class="box-title">Form Tambah Module</h3>
                </div>
                <form>
                    <div class="box-body">
                        <div class="form-group">
                            <label for="nama_product">Nama Product</label>
                            <select class="form-control" name="nama_product" id="nama_product">
                                <option selected disabled >Pilih Product</option>
                                <?php foreach ($nama_product-> result_array () as $p):?>
                                <option value="<?php echo $p['id_product']; ?>"><?php echo $p ['nama_product']; ?></option>
                                <?php endforeach ;?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="nama_module">Nama Module</label>
                            <input type="text" class="form-control" name="nama_module" id="nama_module" placeholder="nama_module" required>
                        </div>
                        <div class="form-group">
                            <label for="harga_module">Harga Module</label>
                            <input type="text" class="form-control" name="harga_module" id="harga_module" placeholder="harga_module" required>
                        </div>
                        <div class="form-group">
                            <label for="penjelasan">Penjelasan</label>
                            <textarea type="text" class="form-control" name="penjelasan" id="penjelasan" placeholder="Penjelasan" required></textarea>
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