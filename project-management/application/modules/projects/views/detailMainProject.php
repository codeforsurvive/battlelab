<style>
    table{

    }
    .centerTable th{
        text-align: center;
        background-color: #0993D3;
        color: #FFFFFF;
        height: 30px;
        font-size: 15px;
    }
</style>

<!-- Page heading -->
<div class="page-head">
    <h2 class="pull-left"><i class="fa fa-building-o"></i> Detail Project</h2>
    <!-- Breadcrumb -->
    <div class="bread-crumb pull-right">
        <a href="index.html"><i class="fa fa-home"></i> Home</a> 
        <!-- Divider -->
        <span class="divider">/</span> 
        <a href="<?= base_url() . 'projects/project' ?>" class="bread-current">Project</a>
        <span class="divider">/</span> 
        <a href="#" class="bread-current">Detail</a>
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
                        <div class="pull-left">Detail Project</div>
                        <div class="widget-icons pull-right">
                            <a href="#" class="wminimize"><i class="fa fa-chevron-up"></i></a> 
                            <a href="#" class="wclose"><i class="fa fa-times"></i></a>
                        </div>  
                        <div class="clearfix"></div>
                    </div>
                    <div class="widget-content">
                        <div class="padd">
                            <table class="table table-striped table-bordered table-hover centerTable">
								<tbody>
									<tr>
										<td width="200"><b>Kode Proyek</b></td>
										<td><?= $detailMainProject[0][mMainProject::KODE] ?></td>
									</tr>
									<tr>
										<td width="200"><b>Nama Proyek</b></td>
										<td><?= $detailMainProject[0][mMainProject::NAMA] ?></td>
									</tr>
									<tr>
										<td><b>Perusahaan</b></td>
										<td><?= $detailMainProject[0][mPerusahaan::NAMA] ?></td>
									</tr>
									<tr>
										<td><b>Deskripsi</b></td>
										<td><?= $detailMainProject[0][mMainProject::DESCRIPTION] ?></td>
									</tr>
								</tbody>
							</table>
                        </div>
                    </div>
                </div>
                <br/><br/>
            </div>
        </div>
    </div>
</div>
