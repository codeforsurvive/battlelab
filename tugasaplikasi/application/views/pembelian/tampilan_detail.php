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
<form method="POST" action="<?php echo base_url(); ?>index.php/pembelian/detail" enctype="multipart/form-data" runat="server">
    <div class="row" >
        <div class="col-md-6">
            <div class="box box-primary">
                <div class="box-header">
                    <h3 class="box-title">Form Edit Template</h3>
                </div>
                <form>
                    <table>
                        <div class="box-body">
                            <div class="form-group">
                                <label for="id_pembelian">ID Pembelian</label>
                                <input type="" value="<?php echo $id_pembelian; ?>" name="id_pembelian"/>
                            </div>
                             <div class="form-group">
                                <label for="id_pembelian">Nama Pembeli</label>
                                <input type="" value="<?php echo $nama_pembeli; ?>" name="nama_pembeli"/>
                            </div>
                            <div class="form-group">
                                <input type="hidden" value="<?php echo $id_product; ?>" name="id_product"/>
                            </div>
                            <div class="form-group">
                                <input type="hidden" value="<?php echo $id_member; ?>" name="id_member"/>
                            </div>
                            <div class="form-group">
                                <input type="hidden" value="<?php echo $id_template; ?>" name="id_template"/>
                            </div>
                            <div class="form-group">
                                <label for="id_module">Module yang Dipilih</label>
                                <br/>
                                <?php foreach ($module as $m): ?>
                                    <input type="checkbox" class="form-control" name="id_module[]" id="id_module"  value="<?php echo $m ['id_module']; ?>" <?php echo $checked[$m['id_module']] ?> readonly/> <?php echo $m ['nama_module']; ?><br/> 
                                <?php endforeach; ?>
                            </div>
                            <div class="form-group">
                                <label for="source">Source</label>
                                <p></p>
                                <img src ="<?php echo $source ?>" width="200px" id="source" src="#" alt="" width="200px"><p></p>
                                <input type="file" accept="image/*" name="source" id="source" ><p></p> 
                                <input type="hidden" value="<?php echo $source; ?>" name="source_path"/>
                            </div>
                        </div>
                    </table>

                    <div class="box-footer">
                        <a href="<?php echo base_url(); ?>index.php/pembelian" class="btn btn-default">kembali</a>
                    </div>
            </div>
        </div>
    </div>
</form>