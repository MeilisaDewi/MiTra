<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.5.3/jspdf.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.min.js"></script>

<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.5.3/jspdf.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
<!-- <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script> -->

<main>
  <div class="container-fluid px-4">
    <h1 class="mt-4 text-primary text-center  ">Mita Transport Jogja</h1>


    <html>

    <body>
      <div class="container">

        <div class="spinner-grow text-primary"></div>
        <div class="spinner-grow text-light"></div>
        <div class="spinner-grow text-warning"></div>
        <div class="spinner-grow text-light"></div>
        <div class="spinner-grow text-success"></div>
        <div class="spinner-grow text-light"></div>
        <div class="spinner-grow text-primary"></div>
        <div class="spinner-grow text-light"></div>
        <div class="spinner-grow text-warning"></div>
        <div class="spinner-grow text-light"></div>
        <div class="spinner-grow text-success"></div>
        <div class="spinner-grow text-light"></div>
        <div class="spinner-grow text-primary"></div>
        <div class="spinner-grow text-light"></div>
        <div class="spinner-grow text-warning"></div>
        <div class="spinner-grow text-light"></div>
        <div class="spinner-grow text-success"></div>
        <div class="spinner-grow text-light"></div>
        <div class="spinner-grow text-primary"></div>
        <div class="spinner-grow text-light"></div>
        <div class="spinner-grow text-warning"></div>
        <div class="spinner-grow text-light"></div>
        <div class="spinner-grow text-success"></div>
        <div class="spinner-grow text-light"></div>
        <div class="spinner-grow text-primary"></div>
        <div class="spinner-grow text-light"></div>
        <div class="spinner-grow text-warning"></div>
        <div class="spinner-grow text-light"></div>
        <div class="spinner-grow text-success"></div>
        <div class="spinner-grow text-light"></div>

      </div>


    </body>



    </html>

    <div class="container-fluid px-4">

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4"></div>
<!-- Content Row -->
<div class="row">

    <div class="col-lg-12 mb-4 md-4">
        <div class="card shadow mb-4">
            <style>
                .carousel-item {
                    height: 40rem;
                    background: #000;
                    color: white;
                    position: relative;
                }

                .container {
                    position: absolute;
                    bottom: 0;
                    left: 0;
                    right: 0.5;
                    padding-bottom: 50px;
                }

                .overlay-image {
                    position: absolute;
                    bottom: 0;
                    left: 0;
                    right: 0;
                    top: 0;
                    background-image: center;
                    background-size: 1000;
                    opacity: 20;
                }
            </style>

            <div id="myCarousel" class="carousel slide carousel-fade" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                    <li data-target="#myCarousel" data-slide-to="1"></li>
                    <li data-target="#myCarousel" data-slide-to="2"></li>
                    <li data-target="#myCarousel" data-slide-to="3"></li>
              
                </ol>
                <div class="carousel-inner">
                    <div class="carousel-item active" data-interval="8000">
                        <div class="overlay-image" style="background-image:url(img/mobil7.jpg);"></div>
                        <div class="container text-light">
                            <h1>New Toyota Supra</h1>
                            <p>Mita Transport Jogja</p>
                        </div>
                    </div>
                    <div class="carousel-item" data-interval="8000">
                        <div class="overlay-image" style="background-image:url(img/mobil5.jpg);"></div>
                        <div class="container">
                            <h1>New Bugatti Chiron</h1>
                            <p>Mita Transport Jogja</p>
                        </div>
                    </div>
                    <div class="carousel-item" data-interval="8000">
                        <div class="overlay-image" style="background-image:url(img/mobil6.jpg);"></div>
                        <div class="container">
                            <h1>New Expander</h1>
                            <p>Mita Transport Jogja</p>
                        </div>
                    </div>
                </div>
                <div class="carousel-item" data-interval="8000">
                    <div class="overlay-image" style="background-image:url(img/mobil7.jpg);"></div>
                    <div class="container">
                        <h1>New Lexus</h1>
                        <p>Mita Transport Jogja</p>
                    </div>
                </div>
                <div class="carousel-item" data-interval="8000">
                    <div class="overlay-image" style="background-image:url(img/mobil2.jpg);"></div>
                    <div class="container">
                        <h1>New Brio</h1>
                        <p>Mita Transport Jogja</p>
                    </div>
                </div>
                <div class="carousel-item" data-interval="8000">
                    <div class="overlay-image" style="background-image:url(img/mobil1.jpg);"></div>
                    <div class="container">
                        <h1>New Mazda</h1>
                        <p>Mita Transport Jogja</p>
                    </div>
                </div>
                <div class="carousel-item" data-interval="8000">
                    <div class="overlay-image" style="background-image:url(img/mobil3.jpg);"></div>
                    <div class="container">
                        <h1>New Avanza</h1>
                        <p>Mita Transport Jogja</p>
                    </div>
                </div>
            </div>
            <a href="#myCarousel" class="carousel-control-prev" role="button" data-slide="prev">
                <span class="sr-only">Previous</span>
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            </a>
            <a href="#myCarousel" class="carousel-control-next" role="button" data-slide="next">
                <span class="sr-only">Next</span>
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
            </a>
        </div>
    </div>



    
      <div class="col-xl-4 mt-5">
      <div class="card mb-4">
        <div class="card-header">
          <i class="fas fa-chart-area me-1"></i>
          Grafik Transaksi Penyewaan
          <div class="col">
            <input type="number" id="tahun-trans" class="form-control" value="<?= date('Y') ?>" onchange="chartTransaksi()">
          </div>
        </div>
        <div class="card-body"><canvas id="chartTransaksi" width="100%" height="40"></canvas></div>
        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
          <button class="btn btn-outline-primary btn-sm" onclick="downloadChartTransaksi('PDF')">Unduh
            PDF</button>
          <a id="download-trans" download="chart-transaksi.png">
            <button class="btn btn-outline-secondary btn-sm" onclick="downloadChartTransaksi('PNG')">Unduh PNG</button>
          </a>
        </div>
        </a>
      </div>
      
    </main>
      <a href="/kendaraan"><button type="button" class="btn btn-primary btn-sm btn-block w-100  ">Find Ur Car</button>
      
        <script>
          $(document).ready(function() {
            chartTransaksi()
            // chartPembelian()
            // chartCustomer()
            // chartSupplier()
          });

          // ========================== TRANSAKSI =========================//
          function setLineChart(dataset) {
            // Area Chart Example
            var ctx = document.getElementById("chartTransaksi");
            var myLineChart = new Chart(ctx, {
              type: 'line',
              data: {
                labels: ["Jan", "Feb", "Mar", "Apr", "Mei", "Jun", "Jul", "Ags", "Sep", "Okt", "Nov", "Des"],
                datasets: [{
                  label: "Total ",
                  lineTension: 0.3,
                  backgroundColor: "rgba(2,117,216,0.2)",
                  borderColor: "rgba(2,117,216,1)",
                  pointRadius: 5,
                  pointBackgroundColor: "rgba(2,117,216,1)",
                  pointBorderColor: "rgba(255,255,255,0.8)",
                  pointHoverRadius: 5,
                  pointHoverBackgroundColor: "rgba(2,117,216,1)",
                  pointHitRadius: 50,
                  pointBorderWidth: 2,
                  data: dataset,
                }],
              },
              options: {
                scales: {
                  xAxes: [{
                    time: {
                      unit: 'date'
                    },
                    gridLines: {
                      display: false
                    },
                    ticks: {
                      maxTicksLimit: 7
                    }
                  }],
                  yAxes: [{
                    ticks: {
                      maxTicksLimit: 5
                    },
                    gridLines: {
                      color: "rgba(0, 0, 0, .125)",
                    }
                  }],
                },
                legend: {
                  display: false
                }
              }

            });
          }
          function downloadChartImg(download, chart) {
        var img = chart.toDataURL("image/jpg", 1.0).replace("image/jpg", "image/octet-stream")
        download.setAttribute("href", img)
    }

    function downloadChartPDF(chart, name) {
        html2canvas(chart, {
            onrendered: function (canvas) {
                var img = canvas.toDataURL("image/jpg", 1.0)
                var doc = new jsPDF('p', 'pt', 'A4')
                var lebarKonten = canvas.width
                var tinggiKonten = canvas.height
                var tinggiPage = lebarKonten / 592.28 * 841.89
                var leftHeight = tinggiKonten
                var position = 0
                var imgWidth = 595.28
                var imgHeight = 592.28 / lebarKonten * tinggiKonten
                if (leftHeight < tinggiPage) {
                    doc.addImage(img, 'PNG', 0, 0, imgWidth, imgHeight)
                } else {
                    while (leftHeight > 0) {
                        doc.addImage(img, 'PNG', 0, position, imgWidth, imgHeight)
                        leftHeight -= tinggiPage
                        position -= 841.89
                        if (leftHeight > 0) {
                            pdf.addPage()
                        }
                    }
                }
                doc.save(name)
            }
        });
    }

    function downloadChartTransaksi(type) {
        var download = document.getElementById('download-trans')
        var chart = document.getElementById('chartTransaksi')

        if (type == "PNG") {
            downloadChartImg(download, chart)
        } else {
            downloadChartPDF(chart, "Chart-Transaksi.pdf")

        }
    }
          function chartTransaksi() {
            var tahun = $('#tahun-trans').val();
            $.ajax({
              url: "/chart-transaksi",
              method: "POST",
              data: {
                'tahun': tahun,
              },
              success: function(response) {
                var result = JSON.parse(response)
                console.log(result)
                dataset = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0]
                $.each(result.data, function(i, val) {
                  dataset[val.month - 1] = val.total
                });
                setLineChart(dataset)
              }
            })
          }
        </script>



        </html>



        <?= $this->endSection() ?>