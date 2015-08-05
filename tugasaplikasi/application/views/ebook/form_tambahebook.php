<form method="POST" action="<?php echo base_url(); ?>index.php/ebook/simpan" enctype="multipart/form-data">
    <div class="row" >
        <div class="col-md-6">
            <div class="box box-primary">
                <div class="box-header">
                    <h3 class="box-title">Form Tambah E-Book</h3>
                </div>
                <form>
                    <div class="box-body">
                        <div class="form-group">
                            <label for="id_member">Member</label>
                            <input type="text" class="form-control" name="id_member" id="id_member" placeholder="ID Member"  value="<?php echo $this->session->userdata('nama'); ?>" readonly required>
                        </div>
                        <div class="form-group">
                            <label for="nama_ebook">Nama Ebook</label>
                            <input type="text" class="form-control" name="nama_ebook" id="nama_ebook" placeholder="Nama Ebook"  required>
                        </div>
                        <div class="form-group">
                            <label for="source">Source</label>
                            <input type="file" accept="pdf/*" name="source" id="source" placeholder="" ><p></p>
                        </div>
                    </div>
            </div>
            <div class="box-footer">
                <button type="submit" class="btn btn-default"><i class="fa fa-save"></i>Simpan</button>
                <a href="<?php echo base_url(); ?>index.php/ebook" class="btn btn-default">Kembali</a>
            </div>
        </div>
    </div>

</form>