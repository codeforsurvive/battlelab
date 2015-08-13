<div class="sidebar">
    <div class="sidebar-dropdown"><a href="#">Navigation</a></div>

    <!--- Sidebar navigation -->
    <!-- If the main navigation has sub navigation, then add the class "has_sub" to "li" of main navigation. -->
    <ul id="nav">
        <!-- Main menu with font awesome icon -->

        <li class="has_sub <?php if ($this->uri->segment(2) == "barang" || $this->uri->segment(2) == "satuanbarang" || $this->uri->segment(2) == "kategoribarang") echo "open" ?>">
            <a><i class="fa fa-table"></i>Barang <span class="pull-right"><i class="fa fa-chevron-right"></i></span></a>
            <ul>
                <li><a href="<?= base_url() . 'master/satuanbarang' ?>"><i class="fa fa-table"></i> Satuan Barang</a></li>
            </ul>
            <ul>
                <li><a href="<?= base_url() . 'master/kategoribarang' ?>"><i class="fa fa-table"></i> Kategori Barang</a></li>
            </ul>
            <ul>
                <li><a href="<?php echo base_url() . 'master/barang'; ?>"><i class="fa fa-list-alt"></i> Master Barang</a></li>
            </ul>
        </li>
        <li class="has_sub <?php if ($this->uri->segment(2) == "upah" || $this->uri->segment(2) == "lokasiupah" || $this->uri->segment(2) == "satuanupah") echo "open" ?>">
            <a><i class="fa fa-table"></i>Upah <span class="pull-right"><i class="fa fa-chevron-right"></i></span></a>
            <ul>
                <li><a href="<?= base_url() . 'master/satuanupah' ?>"><i class="fa fa-table"></i> Satuan Upah</a></li>
            </ul>
            <ul>
                <li><a href="<?= base_url() . 'master/lokasiupah' ?>"><i class="fa fa-table"></i> Lokasi Upah</a></li>
            </ul>
            <ul>
                <li><a href="<?php echo base_url() . 'master/upah'; ?>"><i class="fa fa-list-alt"></i> Master Upah</a></li>
            </ul>
        </li>
        <li class="has_sub <?php if ($this->uri->segment(2) == "analisa" || $this->uri->segment(2) == "kategorianalisa") echo "open" ?>">
            <a><i class="fa fa-table"></i>Analisa <span class="pull-right"><i class="fa fa-chevron-right"></i></span></a>
            <ul>
                <li><a href="<?= base_url() . 'master/kategorianalisa' ?>"><i class="fa fa-table"></i> Kategori Analisa</a></li>
            </ul>
            <ul>
                <li><a href="<?= base_url() . 'rab/analisa' ?>"><i class="fa fa-table"></i> Master Analisa</a></li>
            </ul>
        </li>
		<li class="<?php if ($this->uri->segment(2) == "rab") echo "open" ?>">
            <a href="<?php echo base_url() . 'rab/rabs'; ?>"><i class="fa fa-building-o"></i> RAB</a>
        </li>
        <li class="<?php if ($this->uri->segment(2) == "project") echo "open" ?>">
            <a href="<?php echo base_url() . 'projects/project'; ?>"><i class="fa fa-building-o"></i> Project</a>
        </li>		  
        <li class="<?php if ($this->uri->segment(2) == "Estimasi") echo "open" ?>">
            <a href="<?php echo base_url() . 'estimasi/Estimasi'; ?>"><i class="fa fa-table"></i> Estimasi</a>
        </li>
    </ul>
</div>
