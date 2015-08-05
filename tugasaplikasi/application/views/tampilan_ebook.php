<div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Data E-Book</h3>
            </div><!-- /.box-header -->
            <div class="box-body table-responsive">
                <?php
                $info = $this->session->flashdata('info');
                if (!empty($info)) {
                    echo $info;
                }
                ?>
                <p></p>
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th >No</th>
                           <!-- <th >ID Ebook</th>-->
                            <th >Member</th>
                            <th >Nama Ebook</th>
                            <th >Source</th>
                            <th >URL</th>
                            <th >aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($data->result() as $row) {
                            ?>
                            <tr>
                                <td><?php echo $no++; ?></td>
                                <!--<td><?php echo $row->id_ebook ?></td>-->
                                <td><?php echo $this->session->userdata('nama'); ?></td>
                                <td><?php echo $row->nama_ebook ?></td>
                                <td><a href="<?php echo $row->source ?>" title="<?php echo $row->source ?>"><?php echo $row->source ?></a></td>
                                <td><?php echo $row->url ?></td>
                                <td><a href="<?php echo base_url(); ?>index.php/ebook/edit/<?php echo $row->id_ebook; ?>" class="label label-success"><i class="fa fa-pencil"></i> Edit</a>
                                    <a href="<?php echo base_url(); ?>index.php/ebook/delete/<?php echo $row->id_ebook; ?>" onclick="return confirm ('anda yakin akan menghapus data ini?')" class="label label-danger"><i class="fa fa-trash"></i> Delete</a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div><!-- /.box-body -->
            <div class="box-footer text-left">
                <a href="<?php echo base_url(); ?>index.php/ebook/tambah" class="btn btn-primary"><i class="fa fa-link"></i> Tambah Data</a>
            </div>
        </div><!-- /.box -->
    </div>
</div>
