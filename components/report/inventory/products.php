<?php
include("../../crud/report/inventory/products.php");
?>

<script type="text/javascript">
  // google.charts.load('current', {'packages': ['bar']});
  google.charts.setOnLoadCallback(drawStuff);

  function drawStuff() {
    var data = new google.visualization.arrayToDataTable([
      ['Trade Name', 'In Stock'],
      <?php
      if ($exec->num_rows > 0) {
        while ($row = $exec->fetch_array()) {
          echo "['" . $row['tradeName'] . "'," . $row['inStock'] . "],";
        }
      }
      ?>
    ]);

    var options = {
      title: 'Products in Stock',
      width: 1435,
      legend: {
        position: 'none'
      },

      bars: 'horizontal', // Required for Material Bar Charts.
      axes: {
        x: {
          0: {
            side: 'top',
            label: 'Quantity'
          } // Top x-axis.
        }
      },
      bar: {
        groupWidth: "90%"
      }
    };

    var chart = new google.charts.Bar(document.getElementById('top_x_div_products'));
    chart.draw(data, options);
  };
</script>

<h6>Products In Stock</h6>
<p>Present quantity of each products in stock</p>
<div id="top_x_div_products" class="white-box-container round-edge long-chart"></div>