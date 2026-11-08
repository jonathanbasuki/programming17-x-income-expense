# Expense Tracker: Template Kode

## Struktur Folder

```
programming17-x-income-expense/
├── index.php
├── tambah.php
├── classes/
│   └── Transaksi.php
├── includes/
│   ├── header.php
│   ├── footer.php
│   └── data.php
├── data/
│   ├── proses-tambah.php
│   └── proses-filter.php
├── db/
│   └── transaksi.json
└── assets/
    └── style.css
```

## Jalankan Server (dari folder `programming17-x-income-expense`)

```bash
php -S localhost:8000
```

---

## 1. `db/transaksi.json`

```json
[]
```

## 2. `assets/style.css`

```css
body {
  font-family: Arial, sans-serif;
  max-width: 700px;
  margin: 20px auto;
  padding: 0 15px;
  line-height: 1.5;
}

nav a { margin-right: 12px; }

label { display: block; margin-top: 10px; }

input, select {
  padding: 6px;
  width: 100%;
  box-sizing: border-box;
}

button { margin-top: 15px; padding: 8px 16px; }

table { width: 100%; border-collapse: collapse; margin-top: 10px; }
th, td { border: 1px solid #ccc; padding: 6px; text-align: left; }

.ringkasan { display: flex; gap: 10px; margin: 15px 0; }
.ringkasan div { flex: 1; border: 1px solid #ccc; padding: 10px; }

.masuk { color: green; }
.keluar { color: red; }
.sukses { color: green; }
```

## 3. `includes/header.php`

```php
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $judul ?? 'Expense Tracker' ?></title>
    <link rel="stylesheet" href="/assets/style.css">
</head>
<body>
    <h2>💰 Expense Tracker</h2>
    <nav>
        <a href="/index.php">Beranda</a>
        <a href="/tambah.php">Tambah Transaksi</a>
    </nav>
    <hr>
```

## 4. `includes/footer.php`

```php
    <hr>
    <p><small>&copy; <?= date('Y') ?> Expense Tracker</small></p>
</body>
</html>
```

## 5. `classes/Transaksi.php`

```php
<?php
class Transaksi
{
    public string $tanggal;
    public string $jenis;      // 'pemasukan' atau 'pengeluaran'
    public string $kategori;
    public string $keterangan;
    public int $jumlah;

    public function __construct(
        string $tanggal,
        string $jenis,
        string $kategori,
        string $keterangan,
        int $jumlah
    ) {
        $this->tanggal    = $tanggal;
        $this->jenis      = $jenis;
        $this->kategori   = $kategori;
        $this->keterangan = $keterangan;
        $this->jumlah     = $jumlah;
    }

    public function jumlahRupiah(): string
    {
        return 'Rp ' . number_format($this->jumlah, 0, ',', '.');
    }

    public function toArray(): array
    {
        return [
            'tanggal'    => $this->tanggal,
            'jenis'      => $this->jenis,
            'kategori'   => $this->kategori,
            'keterangan' => $this->keterangan,
            'jumlah'     => $this->jumlah,
        ];
    }
}
```

## 6. `includes/data.php`

```php
<?php
require_once __DIR__ . '/../classes/Transaksi.php';

define('FILE_DATA', __DIR__ . '/../db/transaksi.json');

// Mengambil semua transaksi dari file JSON
// Hasil: array berisi objek Transaksi
function ambilSemuaTransaksi(): array
{
    $isi  = file_get_contents(FILE_DATA);
    $data = json_decode($isi, true) ?? [];

    $hasil = [];
    foreach ($data as $row) {
        $hasil[] = new Transaksi(
            $row['tanggal'],
            $row['jenis'],
            $row['kategori'],
            $row['keterangan'],
            $row['jumlah']
        );
    }
    return $hasil;
}

// Menyimpan 1 objek Transaksi ke file JSON
function simpanTransaksi(Transaksi $transaksi): void
{
    $semua   = ambilSemuaTransaksi();
    $semua[] = $transaksi;

    $data = [];
    foreach ($semua as $t) {
        $data[] = $t->toArray();
    }

    file_put_contents(FILE_DATA, json_encode($data, JSON_PRETTY_PRINT));
}

// Mengubah angka jadi format Rupiah
function rupiah(int $angka): string
{
    return 'Rp ' . number_format($angka, 0, ',', '.');
}
```

---

## 7. `index.php` (tahap 1: kerangka)

```php
<?php
$judul = 'Beranda';

// TODO 2.1:
//   a) panggil includes/header.php
//   b) panggil includes/data.php
//   c) isi $semua dengan hasil ambilSemuaTransaksi()
//   Gunakan require_once untuk a dan b.

// (tulis kodemu di sini)

?>

<h1>Beranda</h1>
<p>Jumlah transaksi tersimpan: <?= count($semua) ?></p>

<?php
// TODO 2.1 (d): panggil includes/footer.php
?>
```

---

## 8. `data/proses-tambah.php`

```php
<?php
require_once __DIR__ . '/../includes/data.php';

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
    // TODO 3.1: Ambil data dari $_POST
    // Isi: $tanggal, $jenis, $kategori, $keterangan, $jumlah
    //   - pakai operator ?? '' agar tidak error kalau key tidak ada
    //   - pakai trim() untuk $tanggal, $keterangan, $jumlah
    // Contoh: $tanggal = trim($_POST['tanggal'] ?? '');
    // ============================================================

    // (tulis kodemu di sini)


    // ============================================================
    // TODO 3.2: Simpan data
    //   a) buat objek: new Transaksi($tanggal, $jenis, $kategori, $keterangan, (int) $jumlah)
    //   b) simpan dengan simpanTransaksi($objek)
    //   c) $sukses = true
    //   d) kosongkan $keterangan dan $jumlah
    // ============================================================

    // (tulis kodemu di sini)

}
```

## 9. `tambah.php`

```php
<?php
require_once 'data/proses-tambah.php';

$judul = 'Tambah Transaksi';
require_once 'includes/header.php';
?>

<h1>Tambah Transaksi</h1>

<?php if ($sukses): ?>
    <p class="sukses">✅ Transaksi berhasil disimpan! <a href="/index.php">Lihat daftar</a></p>
<?php endif; ?>

<form action="" method="POST">
    <label for="tanggal">Tanggal:</label>
    <input type="date" id="tanggal" name="tanggal" value="<?= htmlspecialchars($tanggal) ?>">

    <label for="jenis">Jenis:</label>
    <select id="jenis" name="jenis">
        <?php foreach ($daftar_jenis as $j): ?>
            <option value="<?= $j ?>" <?= $jenis === $j ? 'selected' : '' ?>>
                <?= ucfirst($j) ?>
            </option>
        <?php endforeach; ?>
    </select>

    <label for="kategori">Kategori:</label>
    <select id="kategori" name="kategori">
        <?php foreach ($daftar_kategori as $k): ?>
            <option value="<?= $k ?>" <?= $kategori === $k ? 'selected' : '' ?>>
                <?= $k ?>
            </option>
        <?php endforeach; ?>
    </select>

    <label for="keterangan">Keterangan:</label>
    <input type="text" id="keterangan" name="keterangan" value="<?= htmlspecialchars($keterangan) ?>">

    <label for="jumlah">Jumlah (Rp):</label>
    <input type="text" id="jumlah" name="jumlah" value="<?= htmlspecialchars($jumlah) ?>">

    <button type="submit">Simpan</button>
</form>

<?php require_once 'includes/footer.php'; ?>
```

---

## 10. `data/proses-filter.php`

```php
<?php
require_once __DIR__ . '/../includes/data.php';

$semua = ambilSemuaTransaksi();

// ============================================================
// TODO 4.1: Hitung total pemasukan dan pengeluaran
// Gunakan foreach untuk menjelajahi $semua. Di dalam loop:
//   - kalau $t->jenis === 'pemasukan' -> tambahkan $t->jumlah ke $total_masuk
//   - selain itu                      -> tambahkan $t->jumlah ke $total_keluar
// ============================================================
$total_masuk  = 0;
$total_keluar = 0;

// (tulis kodemu di sini)

$saldo = $total_masuk - $total_keluar;


// ============================================================
// TODO 4.2: Filter berdasarkan jenis (GET)
//   a) ambil $_GET['jenis'], default 'semua' (pakai ??)
//   b) buat array $tampil berisi transaksi sesuai filter:
//      - kalau $filter === 'semua' -> masukkan semua
//      - kalau tidak -> masukkan yang $t->jenis === $filter
//   Petunjuk: $tampil = []; lalu foreach dan $tampil[] = $t;
// ============================================================
$filter = 'semua';   // <- ganti dengan nilai dari $_GET
$tampil = $semua;    // <- ganti dengan hasil filter
```

## 11. `index.php` (tahap 2: ganti seluruh isi)

```php
<?php
require_once 'data/proses-filter.php';

$judul = 'Beranda';
require_once 'includes/header.php';
?>

<h1>Beranda</h1>

<div class="ringkasan">
    <div>
        <small>Pemasukan</small><br>
        <strong class="masuk"><?= rupiah($total_masuk) ?></strong>
    </div>
    <div>
        <small>Pengeluaran</small><br>
        <strong class="keluar"><?= rupiah($total_keluar) ?></strong>
    </div>
    <div>
        <small>Saldo</small><br>
        <strong><?= rupiah($saldo) ?></strong>
    </div>
</div>

<h2>Daftar Transaksi</h2>

<form action="" method="GET">
    <label for="jenis">Filter jenis:</label>
    <select id="jenis" name="jenis">
        <option value="semua" <?= $filter === 'semua' ? 'selected' : '' ?>>Semua</option>
        <option value="pemasukan" <?= $filter === 'pemasukan' ? 'selected' : '' ?>>Pemasukan</option>
        <option value="pengeluaran" <?= $filter === 'pengeluaran' ? 'selected' : '' ?>>Pengeluaran</option>
    </select>
    <button type="submit">Terapkan</button>
</form>

<?php if (count($tampil) === 0): ?>
    <p>Tidak ada transaksi. <a href="/tambah.php">Tambah sekarang</a></p>
<?php else: ?>
    <table>
        <tr>
            <th>Tanggal</th>
            <th>Jenis</th>
            <th>Kategori</th>
            <th>Keterangan</th>
            <th>Jumlah</th>
        </tr>
        <?php foreach ($tampil as $t): ?>
            <tr>
                <!-- ====================================================
                     TODO 4.3: Amankan output dengan htmlspecialchars()
                     Bungkus keempat data di bawah ini.
                     ==================================================== -->
                <td><?= $t->tanggal ?></td>
                <td><?= $t->jenis ?></td>
                <td><?= $t->kategori ?></td>
                <td><?= $t->keterangan ?></td>
                <td class="<?= $t->jenis === 'pemasukan' ? 'masuk' : 'keluar' ?>">
                    <?= $t->jumlahRupiah() ?>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
<?php endif; ?>

<?php require_once 'includes/footer.php'; ?>
```