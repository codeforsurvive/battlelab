<div class="sidebar">
    <div class="sidebar-dropdown"><a href="#">Navigation</a></div>

    <!--- Sidebar navigation -->
    <!-- If the main navigation has sub navigation, then add the class "has_sub" to "li" of main navigation. -->
    <ul id="nav">
        <!-- Main menu with font awesome icon -->

        <li class="has_sub <?php if ($this->uri->segment(2) == "pp" || $this->uri->segment(2) == "po" || $this->uri->segment(2) == "overhead") echo "open" ?>">
            <a><i class="fa fa-table"></i>Material <span class="pull-right"><i class="fa fa-chevron-right"></i></span></a>
            <ul>
                <li><a href="<?= site_url() ?>master/overhead?tipe=material"><i class="fa fa-table"></i> Overhead Material</a></li>
            </ul>
            <ul>
                <li><a href="<?= site_url() ?>p-material/pp"><i class="fa fa-table"></i> PP</a></li>
            </ul>
            <ul>
                <li><a href="<?= site_url() ?>p-material/po"><i class="fa fa-table"></i> PO</a></li>
            </ul>
        </li>
        <li class="has_sub">
            <a><i class="fa fa-table"></i>Tenaga Kerja <span class="pull-right"><i class="fa fa-chevron-right"></i></span></a>
            <ul>
                <li><a href="<?= site_url() ?>master/overhead?tipe=upah"><i class="fa fa-table"></i> Overhead Upah</a></li>
            </ul>
            <ul>
                <li><a href="<?= site_url() ?>p-upah/pk"><i class="fa fa-table"></i> Permintaan Pekerjaan</a></li>
            </ul>
            <ul>
                <li><a href="<?= site_url() ?>p-upah/op"><i class="fa fa-table"></i> Opname</a></li>
            </ul>
            <ul>
                <li><a href="<?= site_url() ?>p-upah/lpu"><i class="fa fa-table"></i> LPU</a></li>
            </ul>
        </li>
        <li class="has_sub <?php if ($this->uri->segment(2) == "gudang" || $this->uri->segment(2) == "lpb" || $this->uri->segment(2) == "bpm" || $this->uri->segment(2) == "hm" || $this->uri->segment(2) == "pm") echo "open" ?>">
            <a><i class="fa fa-table"></i>Gudang <span class="pull-right"><i class="fa fa-chevron-right"></i></span></a>
            <ul>
                <li><a href="<?= site_url() ?>master/gudang">Master Gudang</a></li>
            </ul>
            <ul>
                <li><a href="<?= site_url() ?>p-material/stok">Stok</a></li>
            </ul>
            <ul>
                <li><a href="<?= site_url() ?>p-material/lpb">LPB</a></li>
            </ul>
            <ul>
                <li><a href="<?= site_url() ?>p-material/bpm">BPM</a></li>
            </ul>
            <ul>
                <li><a href="<?= site_url() ?>p-material/hm">HM</a></li>
            </ul>
            <ul>
                <li><a href="<?= site_url() ?>p-material/pm">PM</a></li>
            </ul>
        </li>
        <li class="has_sub <?php if ($this->uri->segment(2) == "supplier" || $this->uri->segment(2) == "kategorisupplier" || $this->uri->segment(2) == "pajaksupplier") echo "open" ?>">
            <a><i class="fa fa-table"></i>Supplier <span class="pull-right"><i class="fa fa-chevron-right"></i></span></a>
            <ul>
                <li><a href="<?= site_url() ?>master/supplier">Master Supplier</a></li>
            </ul>
            <ul>
                <li><a href="<?= site_url() ?>master/kategorisupplier">Kategori Supplier</a></li>
            </ul>
        </li>
        <li class="has_sub <?php if ($this->uri->segment(2) == "invoice" || $this->uri->segment(2) == "payment") echo "open" ?>">
            <a><i class="fa fa-table"></i>Keuangan <span class="pull-right"><i class="fa fa-chevron-right"></i></span></a>
            <ul>
                <li><a href="<?= site_url() ?>p-material/invoice">Invoice Material</a></li>
            </ul>
            <ul>
                <li><a href="<?= site_url() ?>p-material/payment">Payment</a></li>
            </ul>
			<ul>
                <li><a href="<?= site_url() ?>p-upah/laporan">Laporan</a></li>
            </ul>
        </li>
        <li class="has_sub <?php if ($this->uri->segment(2) == "top" || $this->uri->segment(2) == "pajak" || $this->uri->segment(2) == "pajaksupplier") echo "open" ?>">
            <a><i class="fa fa-table"></i>Master <span class="pull-right"><i class="fa fa-chevron-right"></i></span></a>
            <ul>
                <li><a href="<?= site_url() ?>master/top">Master TOP</a></li>
            </ul>
            <ul>
                <li><a href="<?= site_url() ?>master/pajak">Master Pajak</a></li>
            </ul>
        </li>
    </ul>
</div>
