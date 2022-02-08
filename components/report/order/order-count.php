<?php
include("../../crud/report/order/order-count.php");
?>

<script type="text/javascript">
  google.charts.setOnLoadCallback(drawChart);

  function drawChart() {
    var data = google.visualization.arrayToDataTable([
      ['Date', 'Orders'],
      <?php
      if ($result->num_rows > 0) {
        while ($row = $result->fetch_array()) {
          echo "['" . $row['month'] . '-' . $row['year'] . "', " . $row['orderCount'] . "], ";
        }
      }
      ?>
    ]);

    var options = {
      legend: {
        position: 'right'
      },

      enableInteractivity: true,
      fontSize: 13,
      chartArea: {
        left: 88,
        top: 20,
        width: '87%',
        height: 400,
      }
    };

    var chart = new google.visualization.LineChart(document.getElementById('curve_chart_three'));

    chart.draw(data, options);
  }
</script>

<br>
<h6>Count of Orders</h6>
<p>Total count of all orders created</p>
<div id="curve_chart_three" class="white-box-container round-edge long-chart"></div>
<br>