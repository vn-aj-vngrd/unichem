<div class="scroll-list-2">
    <div class="white-box-container rounded form-create-order">
        <h4>Create Replenishment Order</h4>
        <br>
        <form method="post" action="../crud/replenishment/create-repOrder.php" class="row g-3">

            <hr>
            <b>Product Information</b>
            <br><br>

            <?php include "../crud/get/get-products.php" ?>

            <div class="col-md-3">
                <label class="form-label">Product</label>
                <select class="form-select form-select-md mb-3" name="productID[]" required>
                    <option value="">Select Product</option>
                    <?php
                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                echo "<option value=" . $row['productID'] . ">" ."Name: ". $row['tradeName'] . str_repeat('&nbsp;', 5) . "  Stock: ". $row['inStock'] ."</option>";
                            }
                        } else {
                            echo "No items are found in the database.";
                        }
                    ?>
                </select>
            </div>

            <div class="col-md-3">
                <label class="form-label">Quantity</label>
                <input type="number" class="form-control" name="quantity[]" required>
            </div>

            <div class="col-md-3">
                <label class="form-label">Price Each</label>
                <input type="number" min="1" step="any" class="form-control" name="price[]" required>
            </div>

            <div class="paste-new-forms"></div>

            <div class="add-more col-12">
                <a href="javascript:void(0)" class="add-more-form btn btn-success btn-sm">Add More</a>
            </div>
            <hr>

            <b>Supplier Information</b>

            <?php include "../crud/get/get-suppliers.php" ?>
            <div class="col-md-4">
                <label class="form-label">Supplier</label>
                <select class="form-select form-select-md mb-3" name="supplierID" required>
                    <option value="">Select Supplier</option>
                    <?php
                        if ($result->num_rows > 0) {
                            while ($sup = $result->fetch_assoc()) {
                                echo "<option value=" . $sup['supplierID'] . ">". $sup['companyName']. "</option>";
                            }
                        } else {
                            echo "No suppliers were found in the database.";
                        }
                    ?>
                </select>
            </div>

            <div class="col-md-4">
                <label class="form-label">Ship Required Date</label>
                <input type="date" class="form-control" name="shippingDate" required>
            </div>

            <div class="col-12">
                <input type="submit" class="btn btn-primary" name="orderRep" value="Create Order" />
            </div>

        </form>
    </div>


</div>

<script>
    <?php include "../crud/get/get-products.php" ?>
    $(document).ready(function() {

        $(document).on('click', '.remove-btn', function() {
            $(this).closest('.new-form').remove();
        });

        $(document).on('click', '.add-more-form', function() {
            $('.paste-new-forms').append('<div class="new-form">\
                    <div class="row">\
                        <div class="col-md-3">\
                            <label class="form-label">Select Product</label>\
                            <select class="form-select form-select-md mb-3" name="productID[]" required>\
                                <option value="">Select Product</option>\
                                <?php if ($result->num_rows > 0) { while ($row = $result->fetch_assoc()) { echo "<option value=" . $row['productID'] . ">" ."Name: ". $row['tradeName'] . str_repeat('&nbsp;', 5) . " Stock: ". $row['inStock']. "</option>"; }} else { echo "bad";} ?>\
                            </select>\
                        </div>\
                        <div class="col-md-3">\
                            <label class="form-label">Quantity</label>\
                        <input type="number" class="form-control" name="quantity[]" required>\
                        </div>\
                        <div class="col-md-3">\
                            <label class="form-label">Price Each</label>\
                            <input type="number" min="1" step="any" class="form-control" name="price[]" required>\
                        </div>\
                        <div class="col-md-3">\
                            <div class="form-group mb-2">\
                                <br>\
                                <button type="button" class="remove-btn btn btn-danger btn-sm">Remove</button>\
                            </div>\
                        </div>\
                    </div>\
                </div>');
        });

    });
    
</script>