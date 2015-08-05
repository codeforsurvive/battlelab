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
<form method="POST" action="<?php echo base_url(); ?>index.php/template/simpanedit" enctype="multipart/form-data" runat="server">
    <div class="row" >
        <div class="col-md-6">
            <div class="box box-primary">
                <div class="box-header">
                    <h3 class="box-title">Form Edit Template</h3>
                </div>
                <form>
                    <div class="box-body">
                        <div class="form-group">
                            <input type="hidden" value="<?php echo $id_template; ?>" name="id_template"/>
                        </div>
                        <div class="form-group">
                            <label for="nama_template">Nama Template</label>
                            <input type="text" class="form-control" name="nama_template" id="nama_template" placeholder="Nama Template" value="<?php echo $nama_template; ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="penjelasan">Penjelasan</label>
                            <textarea type="text" class="form-control" name="penjelasan" id="penjelasan" placeholder="Pejelasan" value="" require><?php echo $penjelasan; ?></textarea>
                        </div>
                        <div class="form-group">
                            <label for="source">Source</label>
                            <p></p>
                            <img src ="<?php echo $source ?>" width="200px" id="gambar" src="#" alt="" width="200px"><p></p>
                            <input type="file" accept="image/*" name="source" id="source" ><p></p> 
                            <input type="hidden" value="<?php echo $source; ?>" name="source_path"/>
                        </div>

                        <div class="form-group">
                            <label for="url">URL</label>
                            <input type="text" class="form-control" name="url" id="url" placeholder="url" value="<?php echo $url; ?>" required>
                        </div>
                    </div>

                    <div class="box-footer">
                        <button type="submit" class="btn btn-default"><i class="fa fa-save"></i> Simpan</button>
                        <a href="<?php echo base_url(); ?>index.php/template" class="btn btn-default">kembali</a>
                    </div>
            </div>
        </div>
    </div>
</form>