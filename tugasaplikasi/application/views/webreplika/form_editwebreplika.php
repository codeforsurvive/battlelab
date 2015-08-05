
<form method="POST" action="<?php echo base_url(); ?>index.php/webreplika/simpan">
    <div class="row" >
        <div class="col-md-6">
            <div class="box box-primary">
                <div class="box-header">
                    <h3 class="box-title">Form Edit Webreplika</h3>
                </div>
                <form>
                    <div class="box-body">
                        <div class="form-group">
                            <input type="hidden" class="form-control" name="id_webreplika" id="id_webreplika" placeholder="ID Web Replika" value="<?php echo $id_webreplika; ?>" readonly required> <p></p>
                        </div>
                        <div class="form-group">
                            <label for="id_member">ID Member</label>
                            <input type="text" class="form-control" name="id_member" id="id_member" placeholder="ID Member" value="<?php echo $this->session->userdata('nama'); ?>" readonly required> <p></p>
                        </div>
                        <div class="form-group">
                            <label for="script">Script</label>
                            <input type="text" class="form-control" name="script" id="script" placeholder="Script" value="<?php echo $script; ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="nama_webreplika">Nama Web Replika</label>
                            <input type="text" class="form-control" name="nama_webreplika" id="nama_webreplika" placeholder="Nama webreplika" value="<?php echo $nama_webreplika; ?>" required>
                        </div>
                    </div>

                    <div class="box-footer">
                        <button type="submit" class="btn btn-default"><i class="fa fa-save"></i> Simpan</button>
                        <a href="<?php echo base_url(); ?>index.php/webreplika" class="btn btn-default">kembali</a>
                    </div>
            </div>
        </div>
    </div>
</form>