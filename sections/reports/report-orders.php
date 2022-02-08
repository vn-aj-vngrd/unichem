<?php
session_start();
if (empty($_SESSION['userType'])) {
    header('Location: ../../index.php');
}

unset($_SESSION['orderActive']);
unset($_SESSION['repActive']);

include('../../style/import.php');
?>

<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Order Reports | Unichem</title>
</head>

<script type="text/javascript">
    google.charts.load('current', {
        'packages': ['bar', 'corechart']
    });
</script>

<body>
    <main>
        <div class="d-flex flex-column flex-shrink-0 p-3 bg-light nav-container shadow-md bg-body rounded" style="width: 280px;">
            <a href="../notifications.php" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto link-dark text-decoration-none">
                <div class="row justify-content-md-center">
                    <img class="unichem-logo-login" src="../../assets/images/Unichem-Logo-Text.svg">
                </div>
            </a>

            <hr>
            <ul class="nav nav-pills flex-column mb-auto">
                <li class="nav-item">
                    <a href="../notifications.php" class="nav-link link-dark " aria-current="page">
                        <svg class="bi me-2" width="16" height="16">
                            <use xlink:href="#notif" />
                        </svg>
                        Notifications
                    </a>
                </li>
                <li>
                    <a href="../suppliers.php" class="nav-link link-dark ">
                        <svg class="bi me-2" width="16" height="16">
                            <use xlink:href="#supplier" />
                        </svg>
                        Suppliers
                    </a>
                </li>
                <li>
                    <a href="../customers.php" class="nav-link link-dark ">
                        <svg class="bi me-2" width="16" height="16">
                            <use xlink:href="#customer" />
                        </svg>
                        Customers
                    </a>
                </li>
                <li>
                    <a href="../inventory.php" class="nav-link link-dark">
                        <svg class="bi me-2" width="16" height="16">
                            <use xlink:href="#inventory" />
                        </svg>
                        Inventory
                    </a>
                </li>
                <li>
                    <a href="../orders.php" class="nav-link link-dark">
                        <svg class="bi me-2" width="16" height="16">
                            <use xlink:href="#order" />
                        </svg>
                        Orders
                    </a>
                </li>
                <li>
                    <a href="../replenishments.php" class="nav-link link-dark">
                        <svg class="bi me-2" width="16" height="16">
                            <use xlink:href="#rep" />
                        </svg>
                        Replenishments
                    </a>
                </li>
                <?php if ($_SESSION['userType'] == "Manager") {
                    echo "
                    <li>
                        <a href='../employees.php' class='nav-link link-dark'>
                            <svg class='bi me-2' width='16' height='16'>
                                <use xlink:href='#employee' />
                            </svg>
                            Employees
                        </a>
                    </li>

                    <li>
                        <div class='dropdown'>
                            <a class='nav-link nav-reports active dropdown-toggle' type='button' id='dropdownMenu2' data-bs-toggle='dropdown' aria-expanded='false'>
                                <svg class='bi me-2' width='16' height='16'>
                                <use class='active-color' xlink:href='#sales' />
                                </svg>
                                &nbspReports". str_repeat('&nbsp;', 2) . "
                            </a>
                            
                            <ul class='dropdown-menu dropdown-menu-reports' aria-labelledby='dropdownMenu2'>
                                <li><a class='dropdown-item-reports' type='button' href='report-orders.php'>            Orders</a></li>
                                <li><a class='dropdown-item-reports' type='button' href='report-replenishments.php'>    Replenishments</a></li>
                                <li><a class='dropdown-item-reports' type='button' href='report-inventory.php'>         Inventory</a></li>
                            </ul>
                        </div>
                    </li>
                    ";
                } ?>
            </ul>
            <hr>

            <div class="container">
                <div class="row align-items-end">
                    <div class="col d-flex justify-content-center">
                        <a href="../../crud/logout.php" class="text-decoration-none btn btn-danger btn-logout btn-sm">
                            Log Out
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="father-container">
            <h4>Order Reports</h4>
                <br />
            <!--       
            =

            REPLENISHMENT

                Count of Replenishments (Month-Year) 
                    SELECT MONTH(repOrderDate) AS month, YEAR(repOrderDate) AS year, COUNT(*) AS repCount
                    FROM replenishment
                    GROUP BY MONTH(repOrderDate), YEAR(repOrderDate) 
                    ORDER BY repOrderDate ASC
                    LIMIT 18
                    
                Count of Products Replenished (Month-Year) 
                    SELECT MONTH(r.repOrderDate) AS month, YEAR(r.repOrderDate) AS year, SUM(rl.quantity) AS quantity
                    FROM replenishment r 
                    JOIN replenishment_line rl 
                    ON r.repOrderID=rl.repOrderID 
                    JOIN product p ON rl.productID=p.productID 
                    WHERE r.orderStatus='Completed'
                    GROUP BY MONTH(r.repOrderDate), YEAR(r.repOrderDate) 
                    ORDER BY r.repOrderDate ASC
                    LIMIT 18

                Cost of Replenishment (Month-Year)
                    SELECT MONTHNAME(r.repOrderDate) AS 'month', YEAR(r.repOrderDate) AS year, p.price * rl.quantity AS totalPrice 
                    FROM replenishment r
                    JOIN replenishment_line rl 
                    ON r.repOrderID=rl.repOrderID 
                    JOIN product p ON rl.productID=p.productID 
                    WHERE r.orderStatus='Completed'
                    GROUP BY month, YEAR(r.repOrderDate) 
                    ORDER BY r.repOrderDate ASC
                    LIMIT 18


            =

            ORDER

                Count of Orders (Month-Year)
                    SELECT MONTH(o.orderDate) AS month, YEAR(o.orderDate) AS year, COUNT(*) AS orderCount
                    FROM orders o
                    GROUP BY MONTH(o.orderDate), YEAR(o.orderDate) 
                    ORDER BY o.orderDate ASC
                    LIMIT 18
                    
                Count of Products Ordered (Month-Year) 
                    SELECT MONTH(o.orderDate) AS month, YEAR(o.orderDate) AS year, SUM(ol.quantity) AS quantity
                    FROM orders o 
                    JOIN order_line ol 
                    ON o.orderID=ol.orderID 
                    JOIN product p ON ol.productID=p.productID 
                    WHERE o.orderStatus='Completed'
                    GROUP BY MONTH(o.orderDate), YEAR(o.orderDate) 
                    ORDER BY o.orderDate ASC
                    LIMIT 18

                Cost of Orders (Month-Year)
                    SELECT MONTH(o.orderDate) AS month, YEAR(o.orderDate) AS year, p.price * ol.quantity AS totalPrice 
                    FROM orders o 
                    JOIN order_line ol 
                    ON o.orderID=ol.orderID 
                    JOIN product p ON ol.productID=p.productID 
                    WHERE o.orderStatus='Completed'
                    GROUP BY MONTH(o.orderDate), YEAR(o.orderDate) 
                    ORDER BY o.orderDate ASC
                    LIMIT 18

            =

            RATIO OF ORDER STATUS (DONE) 

                ratio of order statuses on orders (pie chart) 

                ratio of order statuses on replenishment (pie chart) 
                
            =

            INVENTORY (DONE) 
                
                products in stock graph (bar chart) -->


            <div class="scroll-list-3">
                <!-- order -->
                <?php
                include('../../components/report/order/order-cost.php');
                ?>

                <?php
                include('../../components/report/order/ordered-prod-count.php');
                ?>

                <?php
                include('../../components/report/order/order-count.php');
                ?>

                <?php
                include('../../components/report/order/ratio.php');
                ?>

            </div>

        </div>
    </main>

</body>

</html>