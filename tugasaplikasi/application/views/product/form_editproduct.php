<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
<script>
    function readURL(input){
        if (input.files && input.files[0]){
            var reader = new FileReader();
    
            reader.onload = function(e){
                $('#gambar').attr('src',e.target.result);
                $('#gambar').attr('alt',e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
    $(document).ready(function(){
        $("#source").change(function(){
            readURL(this);
        });
    });
    
</script>
<form method="POST" action="<?php echo base_url(); ?>index.php/product/simpanedit" enctype="multipart/form-data" runat="server">
    <div class="row" >
        <div class="col-md-6">
            <div class="box box-primary">
                <div class="box-header">
                    <h3 class="box-title">Form Edit Product</h3>
                </div>
                <form>
                    <div class="box-body">
                        <div class="form-group">
                            <input type="hidden" value="<?php echo $id_product; ?>" name="id_product"/>
                        </div>
                        <div class="form-group">
                            <label for="nama_product">Nama Product</label>
                            <input type="text" class="form-control" name="nama_product" id="nama_template" placeholder="Nama Product" value="<?php echo $nama_product; ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="id_module">Module yang tersedia</label>
                            <br/>
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th >Nama Module</th>
                                        <th >Harga</th>

                                    </tr>


                                </thead>
                                <tbody>
                                    <tr>
                                        <?php
                                        $no = 1;
                                        foreach ($module as $m):
                                            ?>
                                            <td>
                                                <?php echo $no++; ?>
                                                <input type="hidden" class="" name="id_module[]" id="id_module"  value="<?php echo $m ['id_module']; ?>" /> 
                                            </td>
                                            <td>
                                                <?php echo $m['nama_module'] ?>
                                            </td>
                                            <td style="text-align: right">
                                                <?php echo 'Rp. ' . $m['harga_module'] . ',00' ?>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?> 


                                </tbody>

                            </table>

                        </div>
                        <div class="form-group">
                            <label for="source">Source</label>
                            <p></p>
                            <img src ="<?php echo $source ?>" width="200px" id="gambar" src="#" alt="" width="200px"><p></p>
                            <input type="file" accept="image/*" name="source" id="source" ><p></p> 
                            <input type="hidden" value="<?php echo $source; ?>" name="source_path"/>
                        </div>
                        <div class="form-group">
                            <label for="penjelasanP">Penjelasan</label>
                            <textarea type="text" class="form-control" name="penjelasanP" id="penjelasanP" placeholder="Penjelasan" required><?php echo $penjelasanP; ?></textarea>
                        </div>
                    </div>

                    <div class="box-footer">
                        <button type="submit" class="btn btn-default"><i class="fa fa-save"></i> Simpan</button>
                        <a href="<?php echo base_url(); ?>index.php/product" class="btn btn-default">kembali</a>
                    </div>
            </div>
        </div>
    </div>
</form>