<?php
$this->db->select('nama, jumlah');
$dataVaksinChart = $this->db->get('vaksin')->result();
foreach ($dataVaksinChart as $dhc => $v) {
    $arrMhs[] = ['label' => $v->nama, 'y' => $v->jumlah];
}

?>

<html>
<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800" style="font-family:'Poppins'">Chart Data From Table Vaksin</h1>

    <head>
        <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
        <script type="text/javascript">
            window.onload = function() {
                var chart = new CanvasJS.Chart("chartContainer", {
                    title: {
                        text: "Vaksin Data Charts"
                    },
                    data: [{
                        // Change type to "doughnut", "line", "splineArea", etc.
                        type: "column",
                        dataPoints: <?= json_encode($arrMhs, JSON_NUMERIC_CHECK); ?>

                    }]

                });
                chart.render();
            }
        </script>
    </head>

    <body>
        <div id="chartContainer" style="height: 300px; width: 100%;"></div>
    </body>

</div>
<!-- /.container-fluid -->

</html>

<!-- End of Main Content -->
</div>