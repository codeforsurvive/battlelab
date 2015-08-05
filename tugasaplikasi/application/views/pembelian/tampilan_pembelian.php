
<div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Data Pembelian</h3>
            </div><!-- /.box-header -->

            <div class="box-body table-responsive">
                <?php
                $info = $this->session->flashdata('info');
                if (!empty($info)) {
                    echo $info;
                }
                ?>
                <p></p>
                <table id="example1"class="table table-bordered table-striped" style=" ">
                    <thead>
                        <tr>
                            <th >No</th>
                           <!-- <th >ID Pembelian</th> -->
                            <th >Nama Pembeli</th>
                            <th >E - Mail</th>
                            <!--<th >No_Telp</th>-->
                            <th >Nama Product</th>
                            <th >Nama Paket</th>
                            <th >Module</th>
                            <th >Nama Template</th>
                            <th >Gambar</th>
                            <th >Tanggal Pembelian</th>
                            <!--<th >Harga Aplikasi</th>-->
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
                                <!--<td><?php echo $row->id_pembelian ?></td>-->
                                <td><?php echo $row->nama ?></td>
                                <td><?php echo $row->email ?></td>
                                <!--<td><?php echo $row->telp ?></td>-->
                                <td><?php echo $row->nama_product ?></td>
                                <td><?php echo $row->nama_paket ?></td>
                                <td><?php
                        $module_data = $product_modules[$row->id_pembelian . "_" . $row->id_product . "_" . $row->id_paket];
                        if (sizeof($module_data)) {
                            echo '<ul>';
                            foreach ($module_data as $prodModule):
                                //print_r($prodModule);
                                echo '<li>' . $prodModule['nama_module'] . '</li>';
                            endforeach;
                            echo '</ul>';
                        }
                        else
                            echo 'Data tidak ditemukan';
                            ?>
                                </td>
                                <td><?php echo $row->nama_template ?></td>
                                <td><img src ="<?php echo $row->source ?>" width="200px" alt="<?php echo $row->source ?>" /></td>
                                <td><?php echo $row->tanggal_pemesanan ?></td>
                                <!--<td>Rp.<?php echo $row->harga_aplikasi ?></td>-->
                                <td><!--<a href="<?php echo base_url(); ?>index.php/pembelian/edit/<?php echo $row->id_pembelian; ?>" class="label label-success"><i class="fa fa-pencil"></i> Edit</a>-->
                                    <a href="<?php echo base_url(); ?>index.php/pembelian/delete/<?php echo $row->id_pembelian; ?>" onclick="return confirm ('anda yakin akan menghapus data ini?')" class="label label-danger"><i class="fa fa-trash"></i> Delete</a><br/>
                                    <a href="<?php echo base_url(); ?>index.php/pembelian/detail/<?php echo $row->id_pembelian; ?>" class="btn btn-primary btn-xs"> Detail</a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div><!-- /.box-body -->
            <div class="box-footer text-left">
                <a href="<?php echo base_url(); ?>index.php/pembelian/tambah" class="btn btn-primary"><i class="fa fa-link"></i> Tambah Data</a>
            </div>
        </div><!-- /.box -->
    </div>
</div>
