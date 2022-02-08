<?php
include("../../crud/report/general/order-rep-count.php");
?>

<script type="text/javascript">
  // google.charts.load('current', {'packages':['bar']});
  google.charts.setOnLoadCallback(drawChart);

  function drawChart() {
    var data = google.visualization.arrayToDataTable([
      ['Orders & Replenishment', 'Replenishment', 'Order'],
      <?php
      if ($result->num_rows > 0) {
        while ($row = $result->fetch_array()) {
          echo "['" . $row['repOrderDate'] . '||' . $row['orderDate'] .
            "', 
                                '" . $row['repOrderCount'] .
            "', 
                                '" . $row['orderCount'] . "'
                                ],";
        }
      }
      ?>
    ]);

    var options = {
      chart: {
        title: 'Order | Replenishment Summary'
      },
      legend: {
        position: 'right'
      },
      curveType: 'function',
      enableInteractivity: true,
      fontSize: 13,
      chartArea: {
        left: 88,
        top: 30,
        width: '87%',
        height: 400,
      }
    };

    var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

    chart.draw(data, google.charts.Bar.convertOptions(options));
  }
</script>

<div id="columnchart_material" class="white-box-container round-edge long-chart"></div>