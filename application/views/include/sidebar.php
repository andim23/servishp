<div class="sidebar-wrapper scrollbar scrollbar-inner">
    <div class="sidebar-content">
        <ul class="nav nav-primary">
            <li class="nav-item">
                <a href="<?php echo base_url('') ?>" aria-expanded="false">
                    <i class="fas fa-home"></i>
                    <p>Dashboard</p>
                </a>
            </li>
            <li class="nav-item">
                <a data-toggle="collapse" href="#users">
                    <i class="fas fa-user"></i>
                    <p>Users</p>
                    <span class="caret"></span>
                </a>
                <div class="collapse" id="users">
                    <ul class="nav nav-collapse">
                        <li>
                            <a href="<?php echo base_url('users') ?>">
                                <span class="sub-item">Data</span>
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo base_url('users/level') ?>">
                                <span class="sub-item">Level</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="nav-item">
                <a data-toggle="collapse" href="#maps">
                    <i class="fas fa-map-marker-alt"></i>
                    <p>Maps</p>
                    <span class="caret"></span>
                </a>
                <div class="collapse" id="maps">
                    <ul class="nav nav-collapse">
                        <li>
                            <a href="maps/jqvmap.html">
                                <span class="sub-item">JQVMap</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
        </ul>
    </div>
</div>