<form method="POST" action="<?php echo base_url(); ?>index.php/paket/simpan">
    <div class="row" >
        <div class="col-md-6">
            <div class="box box-primary">
                <div class="box-header">
                    <h3 class="box-title">Form Edit Paket</h3>
                </div>
                <form>
                    <div class="box-body">
                        

                        <div class="form-group">
                            <input type="hidden" name="id_paket" value="<?php echo $id_paket; ?>">
                            <label for="nama_paket">Nama Paket</label>
                            <input type="nama_paket" class="form-control" name="nama_paket" id="nama_paket" placeholder="Nama Paket" value="<?php echo $nama_paket; ?>" readonly required>
                        </div>
                         <div class="form-group">
                             <input type="hidden" name="id_product" value="<?php echo $id_paket; ?>">
                            <label for="nama_product">Nama Product</label>
                            <input type="text" class="form-control" name="nama_product" id="nama_product" placeholder="Nama Product" value="<?php echo $nama_product; ?>" readonly require>
                        </div>
                        <div class="form-group">
                            <label for="id_module">Module yang tersedia</label>
                            <br/>
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th></th>
                                        <th >Nama Module</th>
                                        <th >Harga</th>

                                    </tr>


                                </thead>
                                <tbody>
                                    <tr>
                                        <?php
                                        $no = 1;
                                        foreach ($module as $m): ?>
                                            <td>
                                                <?php $no++;?>
                                                <input type="checkbox" class="form-group" name="id_module[]" id="id_module"  value="<?php echo $m ['id_module']; ?>" <?php echo $selected_module[$m ['id_module']] ;?> /> 
                                            </td>
                                            <td>
                                                <?php echo $m['nama_module'] ?>
                                            </td>
                                            <td style="text-align: right">
                                                <?php echo 'Rp. ' . number_format($m['harga_module'], 2, ',', '.')  ?>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?> 


                                </tbody>

                            </table>

                        </div>
                    </div>

                    <div class="box-footer">
                        <button type="submit" class="btn btn-default"><i class="fa fa-save"></i> Simpan</button>
                        <a href="<?php echo base_url(); ?>index.php/paket" class="btn btn-default">kembali</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</form>