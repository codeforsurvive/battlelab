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
        <a href="#" class="bread-current">Edit</a>
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
                            <form action="<?= base_url().'projects/project/update' ?>" method="post" class="form-horizontal" role="form">
-                                <div class="form-group">
<!--                                    <label class="col-lg-2 control-label">Kode</label>-->
                                    <div class="col-lg-5">
                                        <!--<input type="text" class="form-control" name="PROJECT_KODE" placeholder="Kode Proyek" value="<?= $detailProject[0]['PROJECT_KODE'] ?>" readonly="true">-->
                                        <input type="hidden" class="form-control" name="PROJECT_ID" value="<?= $detailProject[0]['PROJECT_ID'] ?>" readonly="true">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-lg-2 control-label">Nama Proyek</label>
                                    <div class="col-lg-5">
                                        <input type="text" class="form-control" name="PROJECT_NAMA" placeholder="Nama Proyek" value="<?= $detailProject[0]['PROJECT_NAMA'] ?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-lg-2 control-label">Deskripsi</label>
                                    <div class="col-lg-5">
                                        <textarea class="form-control" rows="5" name="PROJECT_DESCRIPTION" placeholder="Deskripsi"><?= $detailProject[0]['PROJECT_DESCRIPTION'] ?></textarea>
                                    </div>
                                </div>
								<div class="form-group" style="margin-bottom: 0px; margin-top: 10px;">
                                    <div class="col-lg-1"></div>
                                    <div class="col-lg-6">
                                        <div class="alert" style="background-color: #167CAC"><b style="color: #FFF;">PEMBAGIAN TUGAS</b></div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-lg-2 control-label">Estimator</label>
                                    <div class="col-lg-5">
                                      <input type="hidden" name="ESTIMATOR" id="ESTIMATOR">
                                        <select multiple name="ESTIMATOR_temp[]" id="selectDynamic2" style="width:100%" class="populate">
                                            <?php
                                            $flag= array();
                                            for ($x = 0; $x < sizeof($enrollProject); $x++) {
                                                if ($enrollProject[$x]['PENUGASAN_ID'] == 2) {
                                                    $flag[$enrollProject[$x]['PENGGUNA_ID']]=1;
                                                }
                                            }
                                            
                                            for($i=0; $i<sizeof($listDepartement); $i++): 
                                            ?>
                                            <optgroup label="<?= $listDepartement[$i]['DEPARTEMEN_NAMA'] ?>">
                                            <?php
                                                for($j=0; $j<sizeof($listPengguna); $j++):
                                                    if($listPengguna[$j]['DEPARTEMEN_ID']==$listDepartement[$i]['DEPARTEMEN_ID']){
                                                        if($flag[$listPengguna[$j]['PENGGUNA_ID']]==1){ ?>
                                                    <option value="<?= $listPengguna[$j]['PENGGUNA_ID'] ?>" selected="true"><?= $listPengguna[$j]['PENGGUNA_NAMA'] ?></option>
                                                <?php } else { ?>
                                                    <option value="<?= $listPengguna[$j]['PENGGUNA_ID'] ?>"><?= $listPengguna[$j]['PENGGUNA_NAMA'] ?></option>
                                                <?php 
                                                        }
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
                                    <label class="col-lg-2 control-label">PM</label>
                                    <div class="col-lg-5">
                                      <input type="hidden" name="PM" id="PM">
                                        <select multiple name="PM_temp[]" id="selectDynamic1" style="width:100%" class="populate">
                                            <?php
                                            $flag= array();
                                            for ($x = 0; $x < sizeof($enrollProject); $x++) {
                                                if ($enrollProject[$x]['PENUGASAN_ID'] == 3) {
                                                    $flag[$enrollProject[$x]['PENGGUNA_ID']]=1;
                                                }
                                            }
                                            
                                            for($i=0; $i<sizeof($listDepartement); $i++): 
                                            ?>
                                            <optgroup label="<?= $listDepartement[$i]['DEPARTEMEN_NAMA'] ?>">
                                            <?php
                                                for($j=0; $j<sizeof($listPengguna); $j++):
                                                    if($listPengguna[$j]['DEPARTEMEN_ID']==$listDepartement[$i]['DEPARTEMEN_ID']){
                                                        if($flag[$listPengguna[$j]['PENGGUNA_ID']]==1){ ?>
                                                    <option value="<?= $listPengguna[$j]['PENGGUNA_ID'] ?>" selected="true"><?= $listPengguna[$j]['PENGGUNA_NAMA'] ?></option>
                                                <?php } else { ?>
                                                    <option value="<?= $listPengguna[$j]['PENGGUNA_ID'] ?>"><?= $listPengguna[$j]['PENGGUNA_NAMA'] ?></option>
                                                <?php 
                                                        }
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
                                            $flag= array();
                                            for ($x = 0; $x < sizeof($enrollProject); $x++) {
                                                if ($enrollProject[$x]['PENUGASAN_ID'] == 4) {
                                                    $flag[$enrollProject[$x]['PENGGUNA_ID']]=1;
                                                }
                                            }
                                            
                                            for($i=0; $i<sizeof($listDepartement); $i++): 
                                            ?>
                                            <optgroup label="<?= $listDepartement[$i]['DEPARTEMEN_NAMA'] ?>">
                                            <?php
                                                for($j=0; $j<sizeof($listPengguna); $j++):
                                                    if($listPengguna[$j]['DEPARTEMEN_ID']==$listDepartement[$i]['DEPARTEMEN_ID']){
                                                        if($flag[$listPengguna[$j]['PENGGUNA_ID']]==1){ ?>
                                                    <option value="<?= $listPengguna[$j]['PENGGUNA_ID'] ?>" selected="true"><?= $listPengguna[$j]['PENGGUNA_NAMA'] ?></option>
                                                <?php } else { ?>
                                                    <option value="<?= $listPengguna[$j]['PENGGUNA_ID'] ?>"><?= $listPengguna[$j]['PENGGUNA_NAMA'] ?></option>
                                                <?php 
                                                        }
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

