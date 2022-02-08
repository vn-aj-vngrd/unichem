<div class="container white-box-container-prod-info">

    <div class="row d-flex justify-content-between">
        <div class="col-md-auto">
            <img src="../assets/images/<?php echo $inventory["productImage"]; ?>" width="105.78" height="102.54" alt="..." style="border-radius: 10px 10px 10px 10px;">

        </div>
        <div class="col align-self-center">
            <h4><b>
                <div class="Trade-Name"><?php echo $inventory["tradeName"]; ?></div></b></h3>
        </div>

        <div class="col-md-auto">
            <button type='button' class='btn btn-primary' data-bs-toggle='modal' data-bs-target='#inventory-modal'>
                Update
            </button>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col">
            <?php echo $inventory["description"]; ?>
        </div>
    </div>
    <br>
    <div class="row d-flex justify-content-between">
        <div class="row">
            <div class="col">Date Contained</div>
            <div class="col"><b><?php echo $inventory["dateContained"]; ?></b></div><br>
        </div>
        <div class="row">
            <div class="col">Brand Name</div>
            <div class="col"><b><?php echo $inventory["brandName"]; ?></b></div><br>
        </div>
        <div class="row">
            <div class="col">Price</div>
            <div class="col"><b><?php echo $inventory["price"]; ?></b></div><br>
        </div>
        <div class="row">
            <div class="col">Application Type</div>
            <div class="col"><b><?php echo $inventory["applicationType"]; ?></b></div><br>
        </div>
        <div class="row">
            <div class="col">Cure Time</div>
            <div class="col"><b><?php echo $inventory["cureTime"]; ?></b></div><br>
        </div>
        <div class="row">
            <div class="col">Color</div>
            <div class="col"><b><?php echo $inventory["color"]; ?></b></div><br>
        </div>
        <div class="row">
            <div class="col">Form</div>
            <div class="col"><b><?php echo $inventory["form"]; ?></b></div><br>
        </div>
        <div class="row">
            <div class="col">Package Type</div>
            <div class="col"><b><?php echo $inventory["packageType"]; ?></b></div><br>
        </div>
        <div class="row">
            <div class="col">Package Size</div>
            <div class="col"><b><?php echo $inventory["packageSize"]; ?></b></div><br>
        </div>
        <div class="row">
            <div class="col">Min Operating Temp</div>
            <div class="col"><b><?php echo $inventory["minOperatingTemp"]; ?></b></div><br>
        </div>
        <div class="row">
            <div class="col">Max Operating Temp</div>
            <div class="col"><b><?php echo $inventory["maxOperatingTemp"]; ?></b></div><br>
        </div>
        <div class="row">
            <div class="col">Viscosity</div>
            <div class="col"><b><?php echo $inventory["viscosity"]; ?></b></div><br>
        </div>
        <div class="row">
            <div class="col">Chemical Composition</div>
            <div class="col"><b><?php echo $inventory["chemicalComposition"]; ?></b></div><br>
        </div>
        <div class="row">
            <div class="col">Operating Temp Range</div>
            <div class="col"><b><?php echo $inventory["operatingTempRange"]; ?></b></div><br>
        </div>
        <div class="row">
            <div class="col">In Stock</div>
            <div class="col"><b><?php echo $inventory["inStock"]; ?></b></div><br>
        </div>
        <div class="row">
            <div class="col">Minimum Stock</div>
            <div class="col"><b><?php echo $inventory["minimumStock"]; ?></b></div><br>
        </div>

    </div>
</div>

<div class="modal fade " id="inventory-modal" tabindex="-1" aria-labelledby="modal-title" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content ">
            <div class="modal-header">
                <h5 class="modal-title" id="modal-title">Product Information <?php echo $inventory["productID"]; ?> </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body ">
                <!-- insert body and info to be change -->
                <?php include('product-info-update.php'); ?>
            </div>

            <div class="modal-footer">
                <button type='submit' class='btn btn-primary' value='submit'>Update</button>
                </form>
            </div>
        </div>
    </div>
</div>