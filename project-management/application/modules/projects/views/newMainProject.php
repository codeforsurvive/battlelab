<!-- Page heading -->
<div class="page-head">
    <h2 class="pull-left"><i class="fa fa-building-o"></i> Main Project</h2>
    <!-- Breadcrumb -->
    <div class="bread-crumb pull-right">
        <a href="index.html"><i class="fa fa-home"></i> Home</a> 
        <!-- Divider -->
        <span class="divider">/</span> 
        <a href="<?= base_url().'projects/mainproject' ?>" class="bread-current">MainProject</a>
        <span class="divider">/</span> 
        <a href="#" class="bread-current">Tambah</a>
    </div>
    <div class="clearfix"></div>
</div>
<!-- Page heading ends -->

<div class="matter">
    <div class="container">
        <div class="row">
            <div class="col-md-12"> 
                <!-- edit here -->
                <div class="widget">
                    <div class="widget-head">
                        <div class="pull-left">Data Main Project</div>
                        <div class="widget-icons pull-right">
                            <a href="#" class="wminimize"><i class="fa fa-chevron-up"></i></a> 
                            <a href="#" class="wclose"><i class="fa fa-times"></i></a>
                        </div>  
                        <div class="clearfix"></div>
                    </div>
                    <div class="widget-content">
                        <div class="padd">
                            <form action="<?= base_url().'projects/mainproject/addNew' ?>" method="post" class="form-horizontal" role="form">
								<div class="form-group">
                                    
                                </div>
                                <div class="form-group">
                                    <label class="col-lg-2 control-label">Nama</label>
                                    <div class="col-lg-5">
                                        <input type="text" class="form-control" name="<?= mMainProject::NAMA ?>" placeholder="Nama Proyek">
                                    </div>
                                </div>
								<div class="form-group">
                                    <label class="col-lg-2 control-label">Perusahaan</label>
                                    <div class="col-lg-5">
                                        <select class="form-control" id="<?= mMainProject::PERUSAHAAN_ID ?>" name="<?= mMainProject::PERUSAHAAN_ID ?>">
											<?php foreach($listPerusahaan as $item){ ?>
												<option value="<?= $item["PERUSAHAAN_ID"]; ?>"><?= $item["PERUSAHAAN_NAMA"]; ?></option>
											<?php } ?>
										</select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-lg-2 control-label">Deskripsi</label>
                                    <div class="col-lg-5">
                                        <textarea class="form-control" rows="5" name="<?= mMainProject::DESCRIPTION ?>" placeholder="Deskripsi"></textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                  <div class="col-lg-offset-2 col-lg-5">
                                    <input type="submit" class="pull-right btn btn-sm btn-primary" value="Simpan" name="submit" />
                                  </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <br/><br/>
            </div>
        </div>
    </div>
</div>

