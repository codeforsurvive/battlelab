<!-- Page heading -->
<?php
//print_r($listPp);
setlocale(LC_TIME, 'id_ID');
$cssEmbedd = "<link href=\"" . site_url() . "assets/default/css/bootstrap.min.css\" rel=\"stylesheet\" media=\"print\">";
$cssEmbedd .= "<link href=\"" . site_url() . "assets/default/css/style.css\" rel=\"stylesheet\" media=\"print\">";
$header_pp = "style='background-color: #EEEEEE; width: 80px; word-wrap:break-word;'";
$content_pp = "style='width: 100px; word-wrap:break-word;'";
$header_keterangan = "style='text-align: center; background-color: #0993D3; color: #FFFFFF; height: 20px; font-size: 12px;'";
$htmlBody = "<style>
    .currency{
        margin-right: 10px;
        display: inline-block;
    }
    .number{
        display: inline-block;  
        text-align: right;
    }
    th, td {
        white-space: nowrap; 
    }
    .headerDetail {
       text-align: center;
        background-color: #0993D3;
        color: #FFFFFF;
	height: 30px;
	font-size: 12px;

    }
    
    .labelPP
    {
    background-color: #EEEEEE;
    }
</style>
<div style='width: 100%'; align='center'><h2><b>PERMINTAAN PEMBELIAN</b></h2></div>
    <table class='table table-bordered centerTable'>
        <thead>
            <tr class='label-info'>
                <th colspan='6' {$header_keterangan}>Keterangan Permintaan Pembelian</th>
            </tr>
        </thead>
        <tbody>
            <tr>
              <td {$header_pp}><b>Kode</b></td>
              <td {$content_pp} >{$listPp[0]['PERMINTAAN_PEMBELIAN_KODE']}</td>
              <td {$header_pp}><b>RAB Kode</b></td>
              <td {$content_pp}><a class='btn btn-primary btn-xs' target='_blank' href='".base_url()."rab/rabs/viewDetail/{$listPp[0]['RAB_ID']}'><i class='fa fa-search fa-fw'></i></a> {$listPp[0]['RAB_KODE']}</td>
              <td {$header_pp}><b>RAB Nama</b></td>
              <td {$content_pp}>{$listPp[0]['RAB_NAMA']}</td>
            </tr>
            <tr>
              <td {$header_pp}><b>Status PP</b></td>
              <td>{$listPp[0]['STATUS_PP_NAMA']}</td>
              <td {$header_pp}><b>Kategori PP</b></td>
              <td>{$listPp[0]['KATEGORI_PP_NAMA']}</td>
              <td {$header_pp}><b>Gudang</b></td>
              <td>{$listPp[0]['GUDANG_NAMA']}</td>
            </tr>
            <tr>
                <td {$header_pp}><b>Tanggal Buat</b></td>
                <td>{$listPp[0]['PERMINTAAN_PEMBELIAN_TANGGAL']}</td>
                <td {$header_pp}><b>Tanggal Validasi</b></td>
                <td>{$listPp[0]['PERMINTAAN_PEMBELIAN_VALIDATED']}</td>
                <td {$header_pp}><b>Divalidasi oleh</b></td>
                <td>{$listPp[0]['VALIDATOR_NAMA']}</td>
            </tr>
        </tbody>
    </table>";
$htmlBody .=
        "<table class='table table-striped table-bordered table-hover centerTable' style='margin-top: 20px'>
        <thead>
              <tr class='label-info'>
                <th colspan='5' {$header_keterangan}>Detail Transaksi Permintaan Pembelian</th>
              </tr>
              <tr class='labelPP'>
              <th> No </th>
                      <th>Nama</th>
                      <th>Kode</th>
                      <th>Volume PP</th>
                      <th>Satuan</th>
              </tr>
        </thead>
        <tbody id='detail_pp'>";
      $jumlah = 0;
      $i = 1;
      foreach ($listPp as $item) {
          $htmlBody .= "<tr class='item_pp_detail'>
                      <td>{$i}</td>
                                      <td>{$item["BARANG_NAMA"]}</td>
                                      <td>{$item["BARANG_KODE"]}</td>
                                      <td>{$item["VOLUME_PP"]}</td>
                                      <td>{$item["SATUAN_NAMA"]}</td>

                              </tr>";
          $i++;
      }

$htmlBody .= "</tbody>
</table>";
?>
<script type="text/javascript">
    function printPage() {
        var restorepage = document.body.innerHTML;
        var printcontent = document.getElementById("print").innerHTML;
        document.body.innerHTML = printcontent;
        window.print();
        document.body.innerHTML = restorepage;
    }

    function exportDoc(doctype) {
        var content = $("#htmlContent").html();
        var encodedContent = encodeURIComponent(content);
        var fileName = encodeURIComponent($("#filename").val());


        $("#htmlContent").html(encodedContent);
        $("#filename").val(fileName + ".xls");
        $("#type").val(doctype);
        $("#exportForm").submit();

    }
</script>
<div class="page-head">
    <h2 class="pull-left"><i class="fa fa-building-o"></i> Permintaan Pembelian</h2>
    <!-- Breadcrumb -->
    <div class="bread-crumb pull-right">
        <a href="index.html"><i class="fa fa-home"></i> Home</a> 
        <!-- Divider -->
        <span class="divider">/</span> 
        <a href="<?= base_url() . $this->uri->segment(1, 0) . '/' . $this->uri->segment(2, 0) . '/index' ?>" class="bread-current">PP</a>
        <span class="divider">/</span> 
        <a href="#" class="bread-current">Detail</a>
    </div>
    <div class="clearfix"></div>
</div>
<!-- Page heading ends -->

<div class="col-md-12">
    <div class="widget wgreen">
        <div class="widget-head">
            <div class="pull-left">Detail PP</div>
            <div class="widget-icons pull-right">
                <a href="#" class="wminimize">
                    <i class="fa fa-chevron-up"></i>
                </a>
                <a href="#" class="wclose">
                    <i class="fa fa-times"></i>
                </a>
            </div>
            <div class="clearfix"></div>
        </div>
        <div class="widget-content" style="padding: 10px">
            <div style="width: 49%; display: inline-block;" align="left">
                <div ng-if="displayField(['pp_admin'])">
                    <img onclick="printPage()" src="<?= base_url(); ?>assets/default/img/icons/printer.png" class="icons" title="Cetak" />
                    <img onclick="exportDoc('excel')" src="<?= base_url(); ?>assets/default/img/icons/excel.png" class="icons" title="Export to Excel Document" />
                    <img onclick="exportDoc('word')" src="<?= base_url(); ?>assets/default/img/icons/word.png" class="icons" title="Export to Word Document" />
                    <a href="<?= base_url() ?>p-material/pp/printPDF/<?= $listPp[0]['PERMINTAAN_PEMBELIAN_ID'] ?>"><img src="<?= base_url(); ?>assets/default/img/icons/pdf.png" class="icons" title="Export to PDF Document" /></a>
                </div>
            </div>

            <div class="page-tables" id="print"><?= $cssEmbedd . $htmlBody ?></div>

            <form  id="exportForm" style="display: none" action="<?= base_url() . $this->uri->segment(1, 0) . '/' . $this->uri->segment(2, 0) . '/export' ?>" method="post">
                <input type="hidden" name="FILENAME" id="filename" value="<?= date('d M Y') . " " . str_replace("/", "-", $listPp[0]['PERMINTAAN_PEMBELIAN_KODE']) ?>" />
                <input type="hidden" name="TYPE" id="type" value="" />
                <textarea id="htmlContent" name="CONTENT"><?= $htmlBody ?></textarea>
            </form>
        </div>

    </div>
</div>

