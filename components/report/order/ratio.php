<?php
include("../../crud/report/order/ratio.php");
?>

<!-- ratio of order statuses on orders (pie chart)  -->

<script type="text/javascript">
    // Load Charts and the corechart and barchart packages.
    // google.charts.load('current', {'packages':['corechart']});

    // Draw the pie chart and bar chart when Charts is loaded.
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {

        var data = new google.visualization.DataTable();
        data.addColumn('string', 'OrderStatus');
        data.addColumn('number', 'Quantity');
        data.addRows([
            <?php
            if ($exec->num_rows > 0) {
                while ($row = $exec->fetch_array()) {
                    echo "['" . $row['orderStatus'] . "'," . $row['Quantity'] . "],";
                }
            }
            ?>
        ]);

        var piechart_options = {
            title: 'Orders: Composition of Order Status',
            width: 695,
            height: 400
        };
        var piechart = new google.visualization.PieChart(document.getElementById('piechart_div_ratio_order'));
        piechart.draw(data, piechart_options);

        var barchart_options = {
            title: 'Orders: Composition of Order Status',
            width: 695,
            height: 400,
            legend: 'none'
        };
        var barchart = new google.visualization.BarChart(document.getElementById('barchart_div_ratio_order'));
        barchart.draw(data, barchart_options);
    }
</script>

<!--Table and divs that hold the pie charts-->
<br>
<h6>Composition of status</h6>
<p>Total count of each orders status</p>
<table class="columns">
    <tr>
        <td>
            <div id="piechart_div_ratio_order" class="white-box-container round-edge" style="margin-right: 20px;"></div>
        </td>
        <td>
            <div id="barchart_div_ratio_order" class="white-box-container round-edge"></div>
        </td>
    </tr>
</table>
<br>