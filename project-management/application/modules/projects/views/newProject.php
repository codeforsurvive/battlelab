<!-- Page heading -->
<div class="page-head">
    <h2 class="pull-left"><i class="fa fa-building-o"></i> Project</h2>
    <!-- Breadcrumb -->
    <div class="bread-crumb pull-right">
        <a href="index.html"><i class="fa fa-home"></i> Home</a> 
        <!-- Divider -->
        <span class="divider">/</span> 
        <a href="<?= base_url().'projects/project' ?>" class="bread-current">Project</a>
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
                        <div class="pull-left">Data Project</div>
                        <div class="widget-icons pull-right">
                            <a href="#" class="wminimize"><i class="fa fa-chevron-up"></i></a> 
                            <a href="#" class="wclose"><i class="fa fa-times"></i></a>
                        </div>  
                        <div class="clearfix"></div>
                    </div>
                    <div class="widget-content">
                        <div class="padd">
                            <form action="<?= base_url().'projects/project/addNew' ?>" method="post" class="form-horizontal" role="form">
								<div class="form-group">
                                    
                                </div>
                                <div class="form-group">
                                    <label class="col-lg-2 control-label">Nama Proyek</label>
                                    <div class="col-lg-5">
                                        <input type="text" class="form-control" name="<?= mProject::NAMA ?>" placeholder="Nama Proyek">
                                    </div>
                                </div>
								<div class="form-group">
                                    <label class="col-lg-2 control-label">Main Project</label>
                                    <div class="col-lg-5">
                                        <select class="form-control" name="<?= mProject::MAIN_PROJECT_ID ?>" id="main_project_id">
                                            <?php foreach($listMainProject as $item){ ?>
                                            <option value="<?= $item["MAIN_PROJECT_ID"]; ?>"><?= $item["MAIN_PROJECT_NAMA"]; ?></option>
											<?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-lg-2 control-label">Deskripsi</label>
                                    <div class="col-lg-5">
                                        <textarea class="form-control" rows="5" name="<?= mProject::DESCRIPTION ?>" placeholder="Deskripsi"></textarea>
                                    </div>
                                </div>
								<div class="form-group">
                                    <label class="col-lg-2 control-label">PM</label>
                                    <div class="col-lg-5">
										<input type="hidden" name="PM" id="PM">
                                        <select multiple name="PM_temp[]" id="selectDynamic1" style="width:100%" class="populate">
                                            <?php 
                                            for($i=0; $i<sizeof($listDepartement); $i++): 
                                            ?>
                                            <optgroup label="<?= $listDepartement[$i]['DEPARTEMEN_NAMA'] ?>">
                                            <?php
                                                for($j=0; $j<sizeof($listPengguna); $j++):
                                                    if($listPengguna[$j]['DEPARTEMEN_ID']==$listDepartement[$i]['DEPARTEMEN_ID']){
                                            ?>
                                                <option value="<?= $listPengguna[$j]['PENGGUNA_ID'] ?>"><?= $listPengguna[$j]['PENGGUNA_NAMA'] ?></option>
                                            <?php 
                                                    }
                                                endfor;
                                            ?>
                                            </optgroup>
                                            <?php
                                            endfor;
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-lg-2 control-label">Estimator</label>
                                    <div class="col-lg-5">
										<input type="hidden" name="ESTIMATOR" id="ESTIMATOR">
                                        <select multiple name="ESTIMATOR_temp[]" id="selectDynamic2" style="width:100%" class="populate">
                                            <?php 
                                            for($i=0; $i<sizeof($listDepartement); $i++): 
                                            ?>
                                            <optgroup label="<?= $listDepartement[$i]['DEPARTEMEN_NAMA'] ?>">
                                            <?php
                                                for($j=0; $j<sizeof($listPengguna); $j++):
                                                    if($listPengguna[$j]['DEPARTEMEN_ID']==$listDepartement[$i]['DEPARTEMEN_ID']){
                                            ?>
                                                <option value="<?= $listPengguna[$j]['PENGGUNA_ID'] ?>"><?= $listPengguna[$j]['PENGGUNA_NAMA'] ?></option>
                                            <?php 
                                                    }
                                                endfor;
                                            ?>
                                            </optgroup>
                                            <?php
                                            endfor;
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-lg-2 control-label">Validator</label>
                                    <div class="col-lg-5">
										<input type="hidden" name="VALIDATOR" id="VALIDATOR" >
                                        <select multiple name="VALIDATOR_temp[]" id="selectDynamic3" style="width:100%" class="populate">
                                            <?php 
                                            for($i=0; $i<sizeof($listDepartement); $i++): 
                                            ?>
                                            <optgroup label="<?= $listDepartement[$i]['DEPARTEMEN_NAMA'] ?>">
                                            <?php
                                                for($j=0; $j<sizeof($listPengguna); $j++):
                                                    if($listPengguna[$j]['DEPARTEMEN_ID']==$listDepartement[$i]['DEPARTEMEN_ID']){
                                            ?>
                                                <option value="<?= $listPengguna[$j]['PENGGUNA_ID'] ?>"><?= $listPengguna[$j]['PENGGUNA_NAMA'] ?></option>
                                            <?php 
                                                    }
                                                endfor;
                                            ?>
                                            </optgroup>
                                            <?php
                                            endfor;
                                            ?>
                                        </select>
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

