<?php
require_once __DIR__ . '/../data/data.php';

$semua = ambilSemuaTransaksi();

// ============================================================
// TODO 3.1: Hitung total pemasukan dan pengeluaran
// Gunakan foreach untuk menjelajahi $semua. Di dalam loop:
//   - kalau $t->jenis === 'pemasukan' -> tambahkan $t->jumlah ke $total_masuk
//   - selain itu                      -> tambahkan $t->jumlah ke $total_keluar
// ============================================================
$total_masuk  = 0;
$total_keluar = 0;

// (tulis kodemu di sini)

$saldo = $total_masuk - $total_keluar;


// ============================================================
// TODO 3.2: Filter berdasarkan jenis (GET)
//   a) ambil $_GET['jenis'], default 'semua' (pakai ??)
//   b) buat array $tampil berisi transaksi sesuai filter:
//      - kalau $filter === 'semua' -> masukkan semua
//      - kalau tidak -> masukkan yang $t->jenis === $filter
//   Petunjuk: $tampil = []; lalu foreach dan $tampil[] = $t;
// ============================================================
$filter = 'semua';   // <- ganti dengan nilai dari $_GET
$tampil = $semua;    // <- ganti dengan hasil filter