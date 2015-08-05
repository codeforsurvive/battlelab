
<div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Data Banner</h3>
            </div><!-- /.box-header -->

            <div class="box-body table-responsive">
                <?php
                $info = $this->session->flashdata('info');
                if (!empty($info)) {
                    echo $info;
                }
                ?>
                <p></p>
                <table id="example1"class="table table-bordered table-striped" >
                    <thead>
                        <tr>
                            <th >No</th>
                            <th >ID Template</th>
                            <th >Nama Template</th>
                            <th >Penjelasan</th>
                            <th >Gambar</th>
                            <th >URL</th>
                            <th >aksi</th>
                        </tr>

                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($data->result() as $row) {
                            ?>
                            <tr >
                                <td><?php echo $no++; ?></td>
                                <td><?php echo $row->id_template ?></td>
                                <td><?php echo $row->nama_template ?></td>
                                <td><?php echo substr($row->penjelasan, 0, 200); ?></td>
                                <td><a href="<?php echo $row->url ?>" target="_blank"><img src ="<?php echo $row->source ?>" width="200px" alt="<?php echo $row->source ?>" /></a></td>
                                <td >
                                    <?php echo htmlentities('<a href="' . $row->url . '" target="_blank"><img src ="' . $row->source . '" /></a>'); ?>
                                </td>
                                <td><a href="<?php echo base_url(); ?>index.php/template/edit/<?php echo $row->id_template; ?>" class="label label-success"><i class="fa fa-pencil"></i> Edit</a>
                                    <a href="<?php echo base_url(); ?>index.php/template/delete/<?php echo $row->id_template; ?>" onclick="return confirm ('anda yakin akan menghapus data ini?')" class="label label-danger"><i class="fa fa-trash"></i> Delete</a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div><!-- /.box-body -->
            <div class="box-footer text-left">
                <a href="<?php echo base_url(); ?>index.php/template/tambah" class="btn btn-primary"><i class="fa fa-link"></i> Tambah Data</a>
            </div>
        </div><!-- /.box -->
    </div>
</div>
