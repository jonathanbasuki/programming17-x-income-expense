<?php
require_once __DIR__ . '/../data/data.php';

// Pilihan untuk dropdown
$daftar_jenis    = ['pemasukan', 'pengeluaran'];
$daftar_kategori = ['Uang Saku', 'Makanan', 'Transportasi', 'Hiburan', 'Lainnya'];

// Nilai awal form
$tanggal    = date('Y-m-d');
$jenis      = 'pengeluaran';
$kategori   = 'Uang Saku';
$keterangan = '';
$jumlah     = '';
$sukses     = false;

// Hanya diproses kalau form dikirim (method POST)
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // ============================================================
    // TODO 2.1: Ambil data dari $_POST
    // Isi: $tanggal, $jenis, $kategori, $keterangan, $jumlah
    //   - pakai operator ?? '' agar tidak error kalau key tidak ada
    //   - pakai trim() untuk $tanggal, $keterangan, $jumlah
    // Contoh: $tanggal = trim($_POST['tanggal'] ?? '');
    // ============================================================

    // (tulis kodemu di sini)


    // ============================================================
    // TODO 2.2: Simpan data
    //   a) buat objek: new Transaksi($tanggal, $jenis, $kategori, $keterangan, (int) $jumlah)
    //   b) simpan dengan simpanTransaksi($objek)
    //   c) $sukses = true
    //   d) kosongkan $keterangan dan $jumlah
    // ============================================================

    // (tulis kodemu di sini)

}