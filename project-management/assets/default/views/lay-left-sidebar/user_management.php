<div class="sidebar">
    <div class="sidebar-dropdown"><a href="#">Navigation</a></div>

    <!--- Sidebar navigation -->
    <!-- If the main navigation has sub navigation, then add the class "has_sub" to "li" of main navigation. -->
    <ul id="nav">
        <!-- Main menu with font awesome icon -->
        
        <li class="<?php if($this->uri->segment(2) == "pengguna") echo "open" ?>">
            <a href="<?php echo base_url(); ?>user-management/pengguna"><i class="fa fa-user"></i> Pengguna</a>
        </li>
        <li class="<?php if($this->uri->segment(2) == "departemen") echo "open" ?>">
            <a href="<?php echo base_url(); ?>user-management/departemen"><i class="fa fa-users"></i> Departemen</a>
        </li>
		<li class="<?php if($this->uri->segment(2) == "perusahaan") echo "open" ?>">
            <a href="<?php echo base_url(); ?>user-management/perusahaan"><i class="fa fa-users"></i> Perusahaan</a>
        </li>
        <li class="<?php if($this->uri->segment(2) == "role") echo "open" ?>">
            <a href="<?php echo base_url(); ?>user-management/role"><i class="fa fa-key"></i> Role</a>
        </li>
    </ul>
</div>
