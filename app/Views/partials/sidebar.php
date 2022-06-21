<!-- ========== Left Sidebar Start ========== -->
<div class="vertical-menu">

    <!-- LOGO -->
    <div class="navbar-brand-box">
        <a href="/" class="logo logo-dark">
            <span class="logo-sm">
                <img src="assets/images/logo-sm.png" alt="" height="22">
            </span>
            <span class="logo-lg">
                <img src="assets/images/logo-dark.png" alt="" height="45">
            </span>
        </a>

        <a href="/" class="logo logo-light">
            <span class="logo-sm">
                <img src="assets/images/logo-sm.png" alt="" height="22">
            </span>
            <span class="logo-lg">
                <img src="assets/images/logo-light.png" alt="" height="45">
            </span>
        </a>
    </div>

    <button type="button" class="btn btn-sm px-3 font-size-16 header-item waves-effect vertical-menu-btn">
        <i class="fa fa-fw fa-bars"></i>
    </button>

    <div data-simplebar class="sidebar-menu-scroll">

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <?php if (in_groups('superadmin')) : ?>
                <li class="menu-title"><?= lang('Files.Users') ?></li>
                <li>
                    <a href="data-users">
                        <i class="uil-users-alt"></i><span class="badge rounded-pill bg-primary float-end"></span>
                        <span><?= lang('Files.Data Users') ?></span>
                    </a>
                </li>

                <li class="menu-title"><?= lang('Files.Menu') ?></li>
                <?php elseif (in_groups('santri')) : ?>
                <li>
                    <a href="/">
                        <i class="uil-database-alt"></i><span class="badge rounded-pill bg-primary float-end">01</span>
                        <span><?= lang('Files.Data Santri') ?></span>
                    </a>
                </li>

                <li>
                    <a href="pembayaran-santri" class="waves-effect">
                        <i class="uil-money-bill"></i>
                        <span><?= lang('Files.Pembayaran') ?></span>
                    </a>
                </li>

                <li>
                    <a href="tagihan-santri" class="waves-effect">
                        <i class="uil-bag"></i>
                        <span><?= lang('Files.Tagihan') ?></span>
                    </a>
                </li>
                <li>
                    <a href="invoice-santri" class="waves-effect">
                        <i class="uil-invoice"></i>
                        <span><?= lang('Files.Invoices') ?></span>
                    </a>
                </li>
                <?php endif; ?>
                <?php if (in_groups('admin') or in_groups('superadmin')) : ?>
                <li>
                    <a href="data-santri">
                        <i class="uil-database-alt"></i><span class="badge rounded-pill bg-primary float-end">01</span>
                        <span><?= lang('Files.Data Santri') ?></span>
                    </a>
                </li>

                <li>
                    <a href="data-pembayaran" class="waves-effect">
                        <i class="uil-money-bill"></i>
                        <span><?= lang('Files.Data Pembayaran') ?></span>
                    </a>
                </li>
                <li class="menu-title"><?= lang('Files.Lain-lain') ?></li>
                <li>
                    <a href="laporan-data-santri" class="waves-effect">
                        <i class="uil-document-layout-left"></i>
                        <span><?= lang('Files.Laporan Data Santri') ?></span>
                    </a>
                </li>
                <li>
                    <a href="pesan-masuk" class="waves-effect">
                        <i class="uil-envelope-download"></i>
                        <span><?= lang('Files.Pesan Masuk') ?></span>
                    </a>
                </li>
                <li>
                    <a href="log-aktifitas" class="waves-effect">
                        <i class="uil-parcel"></i>
                        <span><?= lang('Files.Log Aktifitas') ?></span>
                    </a>
                </li>
                <?php endif; ?>

            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>
<!-- Left Sidebar End -->