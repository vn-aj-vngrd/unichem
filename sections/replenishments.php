<?php
session_start();
if (empty($_SESSION['userType'])) {
    header('Location: ../index.php');
}

unset($_SESSION['orderActive']);

if (empty($_SESSION['repActive'])) {
    $_SESSION['repActive'] = '#Awaiting-Approval';
} else if (isset($_GET['repActive'])) {
    $_SESSION['repActive'] = "#" . $_GET['repActive'];
}

include('../style/import.php');
include('../crud/replenishment/check-default.php');
include('../components/popup-msg.php');
?>


<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Replenishments | Unichem</title>
</head>

<body>
    <main>
        <div class="d-flex flex-column flex-shrink-0 p-3 bg-light nav-container shadow-md bg-body rounded" style="width: 280px;">
            <a href="notifications.php" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto link-dark text-decoration-none">
                <div class="row justify-content-md-center">
                    <img class="unichem-logo-login" src="../assets/images/Unichem-Logo-Text.svg">
                </div>
            </a>

            <hr>
            <ul class="nav nav-pills flex-column mb-auto">
                <li class="nav-item">
                    <a href="notifications.php" class="nav-link link-dark " aria-current="page">
                        <svg class="bi me-2" width="16" height="16">
                            <use xlink:href="#notif" />
                        </svg>
                        Notifications
                    </a>
                </li>
                <li>
                    <a href="suppliers.php" class="nav-link link-dark">
                        <svg class="bi me-2" width="16" height="16">
                            <use xlink:href="#supplier" />
                        </svg>
                        Suppliers
                    </a>
                </li>
                <li>
                    <a href="customers.php" class="nav-link link-dark">
                        <svg class="bi me-2" width="16" height="16">
                            <use xlink:href="#customer" />
                        </svg>
                        Customers
                    </a>
                </li>
                <li>
                    <a href="inventory.php" class="nav-link link-dark">
                        <svg class="bi me-2" width="16" height="16">
                            <use xlink:href="#inventory" />
                        </svg>
                        Inventory
                    </a>
                </li>
                <li>
                    <a href="orders.php" class="nav-link link-dark ">
                        <svg class="bi me-2" width="16" height="16">
                            <use xlink:href="#order" />
                        </svg>
                        Orders
                    </a>
                </li>
                <li>
                    <a href="replenishments.php" class="nav-link link-dark active">
                        <svg class="bi me-2" width="16" height="16">
                            <use class="active-color" xlink:href="#rep" />
                        </svg>
                        Replenishments
                    </a>
                </li>
                <?php if($_SESSION['userType']=="Manager"){
                    echo "
                    <li>
                        <a href='employees.php' class='nav-link link-dark'>
                            <svg class='bi me-2' width='16' height='16'>
                                <use xlink:href='#employee' />
                            </svg>
                            Employees
                        </a>
                    </li>

                    <li>
                        <div class='dropdown'>
                            <button class='nav-reports dropdown-toggle' type='button' id='dropdownMenu2' data-bs-toggle='dropdown' aria-expanded='false'>
                                <svg class='bi me-2' width='16' height='16'>
                                <use class='' xlink:href='#sales' />
                                </svg>
                                &nbspReports". str_repeat('&nbsp;', 2) . "
                            </button>
                            
                            <ul class='dropdown-menu dropdown-menu-reports' aria-labelledby='dropdownMenu2'>
                                <li><a class='dropdown-item-reports' type='button' href='reports/report-orders.php'>            Orders</a></li>
                                <li><a class='dropdown-item-reports' type='button' href='reports/report-replenishments.php'>    Replenishments</a></li>
                                <li><a class='dropdown-item-reports' type='button' href='reports/report-inventory.php'>         Inventory</a></li>
                            </ul>
                        </div>
                    </li>
                    ";
                }?>
            </ul>
            <hr>

            <div class="container">
                <div class="row align-items-end">
                    <div class="col d-flex justify-content-center">
                        <a href="../crud/logout.php" class="text-decoration-none btn btn-danger btn-logout btn-sm">
                            Log Out
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="father-container">
            <h4>Replenishments</h4>
            <br>
            <div class="d-flex">
                <div class="layout-column">

                    <ul class="nav nav-pills nav-justified mb-3 custom-nav-pills" id="pills-tab" role="tablist">

                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="Awaiting-Approval" data-bs-toggle="pill" data-bs-target="#div1" type="button" role="tab">Awaiting Approval</button>
                        </li>

                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="Awaiting-Payment" data-bs-toggle="pill" data-bs-target="#div2" type="button" role="tab">Awaiting Payment</button>
                        </li>

                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="Processing-Order" data-bs-toggle="pill" data-bs-target="#div3" type="button" role="tab">Processing Order</button>
                        </li>

                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="Awaiting-Shipment" data-bs-toggle="pill" data-bs-target="#div4" type="button" role="tab">Awaiting Shipment</button>
                        </li>

                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="Awaiting-Pickup" data-bs-toggle="pill" data-bs-target="#div5" type="button" role="tab">Awaiting Pickup</button>
                        </li>

                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="Completed" data-bs-toggle="pill" data-bs-target="#div6" type="button" role="tab">Completed Order</button>
                        </li>

                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="Cancelled" data-bs-toggle="pill" data-bs-target="#div7" type="button" role="tab">Cancelled Order</button>
                        </li>

                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="Refunded" data-bs-toggle="pill" data-bs-target="#div8" type="button" role="tab">Refunded Order</button>
                        </li>

                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="Manual-Verification-Required" data-bs-toggle="pill" data-bs-target="#div9" type="button" role="tab">Manual Verification</button>
                        </li>

                        <li class="nav-item create-new-button" role="presentation">
                            <button class="nav-link" id="Create-replenishment" data-bs-toggle="pill" data-bs-target="#div10" type="button" role="tab">Create Order</button>
                        </li>
                    </ul>

                    <div class="tab-content mt-4">

                        <div class="tab-pane fade show active" id="div1" role="tabpanel" aria-labelledby="pills-to-approve-tab">
                            <?php
                            include('../components/replenishment/rep-header.php');
                            include('../crud/replenishment/replenishment-list/awaiting-approval.php');
                            ?>
                        </div>

                        <div class="tab-pane fade" id="div2" role="tabpanel" aria-labelledby="pills-to-cofirm-tab">
                            <?php
                            include('../components/replenishment/rep-header.php');
                            include('../crud/replenishment/replenishment-list/awaiting-payment.php');
                            ?>
                        </div>

                        <div class="tab-pane fade" id="div3" role="tabpanel" aria-labelledby="pills-to-receive-tab">
                            <?php
                            include('../components/replenishment/rep-header.php');
                            include('../crud/replenishment/replenishment-list/processing-order.php');
                            ?>
                        </div>

                        <div class="tab-pane fade" id="div4" role="tabpanel" aria-labelledby="pills-complete-tab">
                            <?php
                            include('../components/replenishment/rep-header.php');
                            include('../crud/replenishment/replenishment-list/awaiting-shipment.php');
                            ?>
                        </div>

                        <div class="tab-pane fade" id="div5" role="tabpanel" aria-labelledby="pills-to-approve-tab">
                            <?php
                            include('../components/replenishment/rep-header.php');
                            include('../crud/replenishment/replenishment-list/awaiting-pickup.php');
                            ?>
                        </div>

                        <div class="tab-pane fade" id="div6" role="tabpanel" aria-labelledby="pills-to-cofirm-tab">
                            <?php
                            include('../components/replenishment/rep-header.php');
                            include('../crud/replenishment/replenishment-list/completed.php');
                            ?>
                        </div>

                        <div class="tab-pane fade" id="div7" role="tabpanel" aria-labelledby="pills-to-receive-tab">
                            <?php
                            include('../components/replenishment/rep-header.php');
                            include('../crud/replenishment/replenishment-list/cancelled.php');
                            ?>
                        </div>

                        <div class="tab-pane fade" id="div8" role="tabpanel" aria-labelledby="pills-complete-tab">
                            <?php
                            include('../components/replenishment/rep-header.php');
                            include('../crud/replenishment/replenishment-list/refunded.php');
                            ?>
                        </div>

                        <div class="tab-pane fade" id="div9" role="tabpanel" aria-labelledby="pills-complete-tab">
                            <?php
                            include('../components/replenishment/rep-header.php');
                            include('../crud/replenishment/replenishment-list/manual-verification.php');
                            ?>
                        </div>

                        <div class="tab-pane fade" id="div10" role="tabpanel" aria-labelledby="pills-create-tab">
                            <?php
                            include('../components/replenishment/create-repOrder.php');
                            ?>
                        </div>

                    </div>

                </div>

                <div class="layout-column">
                <br><br><br><br>
                    <h6>Replenishment Information</h6>
                        <br>
                    <?php include('../crud/replenishment/rep-information.php') ?>
                </div>

            </div>

        </div>

    </main>
    <script type="text/javascript">
        var selectedTab = document.querySelector('<?php echo $_SESSION['repActive'] ?>')
        var showTab = new bootstrap.Tab(selectedTab)
        showTab.show()
    </script>
</body>

</html>