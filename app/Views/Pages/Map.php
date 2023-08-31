<?= $this->extend('layouts') ?>
<?= $this->section('content') ?>
<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="<?= base_url() ?>/assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="<?= base_url() ?>/assets/img/favicon.png">
  <title>Abdul Yamin | NBC</title>
  <!--     Fonts and icons     -->
  <!-- <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" /> -->
  <!-- Nucleo Icons -->
  <link href="<?= base_url() ?>/assets/css/nucleo-icons.css" rel="stylesheet" />
  <link href="<?= base_url() ?>/assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" type="text/css" href="<?= base_url() ?>/assets/font-awesome/css/all.min.css">
  <link href="<?= base_url() ?>/assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- CSS Files -->
  <link id="pagestyle" href="<?= base_url() ?>/assets/css/argon-dashboard.css?v=2.0.2" rel="stylesheet" />
  <!-- tostr  -->
  <link href="<?= base_url() ?>/assets/toastr/toastr.min.css" rel="stylesheet">
  <!-- ootstrap CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <link rel="stylesheet" href="<?= base_url('style.css'); ?>">
  <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />
  <title>PETA SEBARAN</title>
  <script src="<?= base_url() ?>/assets/js/jquery-3.6.3.min.js"></script>
  <script src="<?= base_url() ?>/assets/font-awesome/fontawesome.js" crossorigin="anonymous"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
  <script src="https://code.highcharts.com/highcharts.js"></script>
  <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>
  <script src="raw.githubusercontent.com_calvinmetcalf_leaflet-ajax_gh-pages_dist_leaflet.ajax.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.3/dist/sweetalert2.min.js"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.3/dist/sweetalert2.min.css">
  <style>
    #maps {
      height: 570px;
    }
  </style>
</head>

<body>
  <div class="container">
    <div id="maps"></div>
  </div>
</body>
<script>
  var map = L.map('maps').setView([-7.612430131926203, 108.47971536919238], 11);
  L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
    maxZoom: 19,

  }).addTo(map);

  function getColor(d) {
    return d > 1000 ? '#800026' :
      d > 500 ? '#BD0026' :
      d > 200 ? '#E31A1C' :
      d > 100 ? '#FC4E2A' :
      d > 50 ? '#FD8D3C' :
      d > 20 ? '#FEB24C' :
      d > 10 ? '#FED976' :
      '#FFEDA0';
  }

  var vk = {
    'color': 'red'
  }

  var vb = {
    'color': 'green',
    'opacity': 1,
    'weight': 2,
    'fillcolor': 'white',
    'fillopacity': 0.5
  }

  L.geoJSON({
    "type": "FeatureCollection",
    "features": [<?= $vb; ?>]
  }, {
    style : vb
  }).addTo(map);

  <?php foreach ($kecamatan as $kec) {
    $popupContentKec = ''; // Inisialisasi konten popup khusus untuk kecamatan ini

    $keyword = $kec->kecamatan;
    if (isset($totalDiagnosis[$keyword])) {
      $count = $totalDiagnosis[$keyword];
      $popupContentKec = '<span class="text-uppercase">' . 'jumlah kasus penyakit : ' . $count . '</span><br>';
    }
  ?>
    L.geoJSON({
      "type": "FeatureCollection",
      "features": [<?= $kec->koordinat; ?>]
    }, {
      style: vk
    }).addTo(map).on('click', function() {
      Swal.fire({
        title: '<span class="text-uppercase"><?= $kec->kecamatan; ?></span>',
        html: '<?= $popupContentKec; ?>',
      })
    });
  <?php } ?>
</script>

</html>
<?= $this->endSection() ?>