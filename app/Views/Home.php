<?= $this->extend('layouts') ?>
<?= $this->section('content') ?>
<?php
$jumlahKasusTertinggi = max($kasus);
$jumlahKasusTerendah = min($kasus);
foreach ($tampil as $kec) {
    if ($kec->kecamatan === $kecamatanTertinggi) {
        $tampilTertinggi = '<span class="text-uppercase">' . $kec->kecamatan . '</span>';
    }
    if ($kec->kecamatan === $kecamatanTerendah) {
        $tampilTerendah = '<span class="text-uppercase">' . $kec->kecamatan . '</span>';
    }
}
?>
<div class="container row ">
    <div class="card1 col ">
        <div id="result-area" class="card mb-4">
            <div class="card-header mt-0 mb-0">
                <div class="alert bg-info" style="text-align: center; "> Kasus Penyakit Tertinggi </div>
                <div class="alert bg-danger"><b><?= $tampilTertinggi . ' : ' . $jumlahKasusTertinggi . ' Kasus'?></b></div>
            </div>
        </div>
    </div>
    <div class="card1 col">
        <div id="result-area" class="card mb-4">
            <div class="card-header mt-0 mb-0">
                <div class="alert bg-info" style="text-align: center;"> Kasus Penyakit Terendah</div>
                <div class="alert bg-success"><b><?= $tampilTerendah . ' : ' . $jumlahKasusTerendah . ' Kasus'?></b></div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>