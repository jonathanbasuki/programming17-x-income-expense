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