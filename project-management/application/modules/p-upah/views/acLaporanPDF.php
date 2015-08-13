<script type="text/php">

if (isset($pdf)) {

    // Open the object: all drawing commands will
    // go to the object instead of the current page
    $footer = $pdf->open_object();

    $w = $pdf->get_width();
    $h = $pdf->get_height();

    // Draw a line along the bottom
    $y = $h - 2 * $text_height - 24;
    $pdf->line(36, $y, $w - 36, $y, $color, 1);

    $pdf->page_text($w - 140, $y + 5, "Halaman {PAGE_NUM} dari {PAGE_COUNT}", $font, 12, array(0, 0, 0));
    $pdf->page_text($w - 220, 18, date("H:i:s d/m/Y") . " dari AddPro", $font, 12, array(0, 0, 0));
    $img_w = 996; // 2 inches, in points
    $img_h = 573; // 1 inch, in points -- change these as required
    $pdf->image(base_url() . "/assets/default/addprologotrans.png", "png", 20, $w, $img_h, $img_w);

    // Close the object (stop capture)
    $pdf->close_object();

    // Add the object to every page. You can
    // also specify "odd" or "even"
    $pdf->add_object($footer, "all");
}

</script>
<?php

function toMoney($num) {
    return 'Rp ' . number_format(floatval($num), 0, '', '.') . ',00';
}

// defined style
$header_po = "style='background-color: #EEEEEE; width: 80px; word-wrap:break-word;'";
$content_po = "style='width: 100px; word-wrap:break-word;'";
$header_keterangan = "style='text-align: center; background-color: #0993D3; color: #FFFFFF; height: 20px; font-size: 18px;'";
?>
<style>
    @page { margin: 70px 50px; }
    body,h2,h3 {
        font-family: 'dotmatri';
    }
	body {
		font-size: 15px;
	}
    table.equalDevide tr td { width: 50%; }
</style>
<div style="width: 100%" align="center"><h2><b>LAPORAN </b></h2></div>
<table class="table table-bordered centerTable">
    <thead>
        <tr class="label-info">
            <th colspan="2">Keterangan Laporan</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td class="ket_po" width="100"><b>Main Project</b></td>
            <td><?= $main_project['MAIN_PROJECT_KODE'] . ' ' . $main_project['MAIN_PROJECT_NAMA'] ?></td>
        </tr>
        <tr>
            <td class="ket_po"><b>Project</b></td>
            <td><?= $project['PROJECT_KODE'] . ' ' . $project['PROJECT_NAMA'] ?></td>
        </tr>
        <tr>
            <td class="ket_po"><b>RAB</b></td>
            <td><?= $rab['RAB_KODE'] . ' ' . $rab['RAB_NAMA'] ?></td>
        </tr>
    </tbody>

</table>
<table class="table table-striped table-bordered table-hover centerTable" style="margin-top: 20px;" id="tabel_list_payment">
    <thead>
        <tr class="label-info">
            <th colspan="5">Detail Laporan</th>
        </tr>
        <tr class="label-info">
            <th>No.</th>
            <th>Kode Payment</th>
            <th>Kode Invoice/LPU</th>
            <th>Tanggal</th>
            <th>Total</th>
        </tr>
    </thead>
    <tbody id="tabel_list_payment_body">
    </tbody>
    <?php
    $counter = 0;
    $total = 0;
    foreach ($laporan as $lap) {
        $counter++;
        echo '<tr>';
        echo '<td>' . $counter . '</td>';
        echo '<td>' . $lap['PAYMENT_KODE'] . '</td>';
        echo '<td>' . $lap['KODE_X'] . '</td>';
        echo '<td>' . $lap['TANGGAL_TRANSAKSI'] . '</td>';
        echo '<td>Rp ' . number_format($lap['HARGA'], 2, ',', '.') . '</td>';
        echo '</tr>';
        $total+=$lap['HARGA'];
    }
    echo '<tr>';
    echo '<td colspan="4" style="text-align:right;font-weight:bold;background-color: #167CAC;"><b style="color: #FFF">Total</b></td>';
    echo '<td>Rp ' . number_format($total, 2, ',', '.') . '</td>';
    echo '</tr>';
    echo '<tr>';
    echo '<td colspan="4" style="text-align:right;font-weight:bold;background-color: #167CAC;"><b style="color: #FFF">RAB</b></td>';
    echo '<td>Rp ' . number_format($rab['RAB_AFTER_OVERHEAD'], 2, ',', '.') . '</td>';
    echo '</tr>';
    echo '<tr>';
    echo '<td colspan="4" style="text-align:right;font-weight:bold;background-color: #167CAC;"><b style="color: #FFF">Persentase</b></td>';
    echo '<td><b>' . number_format(($total * 100 / $rab['RAB_AFTER_OVERHEAD']),2) . '%</b></td>';
    echo '</tr>';
    ?>
</table>
<style type="text/css">
    .centerTable th{
        text-align: center;
        background-color: #0993D3;
        color: #FFFFFF;
        height: 30px;
        font-size: 12px;
    }
    .ket_po{
        background-color: #EEEEEE;
    }
</style>