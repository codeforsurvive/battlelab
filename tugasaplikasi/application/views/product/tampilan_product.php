
<div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Data Product</h3>
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
                            <th >ID Product</th>
                            <th >Module yang tersedia</th>
                            <th >Nama Product</th>
                            <th width="30%">Gambar</th>
                            <th >Penjelasan</th>
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
                                <td><?php echo $row->id_product ?></td>
                                <td>
                                    <?php
                                    $module_data = $product_modules[$row->id_product];
                                    if (sizeof($module_data)) {
                                        foreach ($module_data as $prodModule):
                                            echo $prodModule['nama_module'] . '<br />';
                                        endforeach;
                                    }
                                    else
                                        echo 'Data tidak ditemukan';
                                    ?>
                                </td>
                                <td><?php echo $row->nama_product ?></td>
                                <td><a href="<?php echo $row->source ?>" target="_blank"><img src ="<?php echo $row->source ?>" width="200px" alt="<?php echo $row->source ?>" /></a></td>
                                <td><?php echo $row->penjelasanP ?></td>
                                <td><a href="<?php echo base_url(); ?>index.php/product/edit/<?php echo $row->id_product; ?>" class="label label-success"><i class="fa fa-pencil"></i> Edit</a>
                                    <a href="<?php echo base_url(); ?>index.php/product/delete/<?php echo $row->id_product; ?>" onclick="return confirm ('anda yakin akan menghapus data ini?')" class="label label-danger"><i class="fa fa-trash"></i> Delete</a>
                                </td>
                            </tr>
<?php } ?>
                    </tbody>
                </table>
            </div><!-- /.box-body -->
            <div class="box-footer text-left">
                <a href="<?php echo base_url(); ?>index.php/product/tambah" class="btn btn-primary"><i class="fa fa-link"></i> Tambah Data</a>
            </div>
        </div><!-- /.box -->
    </div>
</div>
