<?php
require_once 'data/proses_tambah.php';

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