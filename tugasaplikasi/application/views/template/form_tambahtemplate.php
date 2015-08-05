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
<form method="POST" action="<?php echo base_url(); ?>index.php/template/simpan" enctype="multipart/form-data" runat="server">
    <div class="row" >
        <div class="col-md-6">
            <div class="box box-primary">
                <div class="box-header">
                    <h3 class="box-title">Form Tambah Banner </h3>
                </div>
                <form>
                    <div class="box-body">
                        <div class="form-group">
                            <label for="nama_template">Nama Template</label>
                            <input type="text" class="form-control" name="nama_template" id="nama_template" placeholder="Nama Template" required>
                        </div>
                         <div class="form-group">
                            <label for="penjelasan">Penjelasan</label>
                            <textarea type="text" class="form-control" name="penjelasan" id="penjelasan" placeholder="Penjelasan"  required></textarea>
                        </div>
                        <div class="form-group">
                            <label for="source">Source</label>
                            <input type="file" accept="image/*" name="source" id="source" placeholder="" ><p></p>
                        </div>
                        <div class="form-group">
                            <img id="gambar" src="#" alt="" width="200px">
                        </div>
                    </div>
            </div>
            <div class="box-footer">
                <button type="submit" class="btn btn-default"><i class="fa fa-save"></i> Simpan</button>
                <a href="<?php echo base_url(); ?>index.php/banner" class="btn btn-default">kembali</a>
            </div>
        </div>
    </div>

</form>