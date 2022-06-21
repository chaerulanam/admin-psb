<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

/**
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

/**
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Home::index', ['filter' => 'role:santri']);
$routes->post('profil/add', 'Home::add', ['filter' => 'role:santri']);
$routes->get('pembayaran-santri', 'Pembayaran::index', ['filter' => 'role:santri']);
$routes->post('pembayaran', 'Pembayaran::add', ['filter' => 'role:santri']);
$routes->post('pembayaran/bukti', 'Pembayaran::edit', ['filter' => 'role:santri']);
$routes->post('pembayaran/invoice', 'Pembayaran::add_invoice', ['filter' => 'role:santri']);
$routes->get('tagihan-santri', 'TagihanSantri::index', ['filter' => 'role:santri']);
$routes->post('tagihan-santri/datatable', 'TagihanSantri::datatable', ['filter' => 'role:santri']);
$routes->post('tagihan-santri/invoice', 'TagihanSantri::invoice', ['filter' => 'role:santri']);
$routes->post('tagihan-santri/invoice-add', 'TagihanSantri::invoice_add', ['filter' => 'role:santri']);
$routes->get('invoice-santri', 'InvoiceSantri::index', ['filter' => 'role:santri']);
$routes->post('invoice-santri/datatable', 'InvoiceSantri::datatable', ['filter' => 'role:santri']);
$routes->post('invoice-santri/invoice-detail', 'InvoiceSantri::getdetail', ['filter' => 'role:santri']);

$routes->get('admin', 'Dashboard::index', ['filter' => 'role:superadmin,admin']);
$routes->get('data-santri', 'DataSantri::index', ['filter' => 'role:superadmin,admin']);
$routes->get('data-santri-detail', 'DataSantri::get_detail', ['filter' => 'role:superadmin']);
$routes->post('data-santri/add', 'DataSantri::add', ['filter' => 'role:superadmin,admin']);
$routes->post('data-santri/edit', 'DataSantri::edit', ['filter' => 'role:superadmin,admin']);
$routes->post('data-santri/hapus', 'DataSantri::hapus', ['filter' => 'role:superadmin,admin']);
$routes->post('data-santri/datatable', 'DataSantri::datatable', ['filter' => 'role:superadmin,admin']);
$routes->post('data-santri/datatable-tagihan', 'DataSantri::datatable_tagihan', ['filter' => 'role:superadmin,admin']);
$routes->post('data-santri/invoice', 'DataSantri::invoice', ['filter' => 'role:superadmin,admin']);
$routes->post('data-santri/invoice-add', 'DataSantri::invoice_add', ['filter' => 'role:superadmin,admin']);

$routes->get('data-pembayaran', 'PembayaranAdmin::index', ['filter' => 'role:superadmin,admin']);
$routes->post('pembayaran-pendaftaran', 'PembayaranAdmin::datatable_pendaftaran', ['filter' => 'role:superadmin,admin']);
$routes->post('konfirmasi', 'PembayaranAdmin::konfirmasi', ['filter' => 'role:superadmin,admin']);
$routes->post('tolak', 'PembayaranAdmin::tolak', ['filter' => 'role:superadmin,admin']);
$routes->post('pembayaran-tagihan', 'PembayaranAdmin::datatable_tagihan', ['filter' => 'role:superadmin,admin']);
$routes->post('konfirmasi-tagihan', 'PembayaranAdmin::konfirmasi_tagihan', ['filter' => 'role:superadmin,admin']);
$routes->get('laporan-data-santri', 'LaporanDataSantri::index', ['filter' => 'role:superadmin,admin']);
$routes->post('laporan-data-santri/datatable', 'LaporanDataSantri::datatable', ['filter' => 'role:superadmin,admin']);

$routes->get('data-users', 'Users::index', ['filter' => 'role:superadmin']);
$routes->post('users-datatable', 'Users::Datatable', ['filter' => 'role:superadmin']);
$routes->post('users-import', 'Users::import', ['filter' => 'role:superadmin']);
$routes->post('users-entri', 'Users::attemptRegister', ['filter' => 'role:superadmin']);
$routes->post('users-detail', 'Users::get_detail', ['filter' => 'role:superadmin']);
$routes->post('users-ubah', 'Users::ubah', ['filter' => 'role:superadmin']);
$routes->post('users-hapus', 'Users::hapus', ['filter' => 'role:superadmin']);
$routes->post('users-reset-password', 'Users::attemptReset', ['filter' => 'role:superadmin']);
$routes->get('/lang/{locale}', 'Language::index');

$routes->get('pesan-masuk', 'PesanMasuk::index', ['filter' => 'role:superadmin,admin']);
$routes->post('pesan-masuk/datatable', 'PesanMasuk::datatable', ['filter' => 'role:superadmin,admin']);

$routes->get('log-aktifitas', 'Log::index', ['filter' => 'role:superadmin,admin']);
$routes->post('log-aktifitas/datatable', 'Log::datatable', ['filter' => 'role:superadmin,admin']);

/**
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}