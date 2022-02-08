<form enctype="multipart/form-data" method="post" action="../crud/update.php" class=" row g-3">
                        <input type="hidden" name="update" value="product">
                        <input type="hidden" name="productID" value="<?php echo $inventory['productID']; ?>" required>
                        <div class="mb-3">
                            <label for="inputProdName" class="form-label">Product Name</label>
                            <input type="text" class="form-control" id="inputProdName" name="tradeName" value="<?php echo $inventory['tradeName']; ?>" required>
                        </div>
                        
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Description</label>
                            <input type="temxt" class="form-control" id="" placeholder="" value="<?php echo $inventory['description']; ?>" name="description" required>
                        </div>
                        


                        <div class="col-md-4">
                            <label for="inputDate" class="form-label">Date Contained</label>
                            <input type="date" class="form-control" id="inputDate" name="dateContained" value="<?php echo $inventory['dateContained']; ?>" required>
                        </div>

                        <div class="col-md-4">
                            <label for="inputBrand" class="form-label">Brand Name</label>
                            <input type="text" class="form-control" id="inputBrand" name="brandName" value="<?php echo $inventory['brandName']; ?>" required>
                        </div>

                        <div class="col-md-4">
                            <label for="inputEmail4" class="form-label">Price</label>
                            <input type="text" class="form-control" id="inputEmail4" name="price" value="<?php echo $inventory['price']; ?>" required>
                        </div>
                        <div class="col-md-4">
                            <label for="inputEmail4" class="form-label">Application Type</label>
                            <input type="text" class="form-control" id="inputEmail4" name="applicationType" value="<?php echo $inventory['applicationType']; ?>" required>
                        </div>
                        <div class="col-md-4">
                            <label for="inputEmail4" class="form-label">Cure Time</label>
                            <input type="time" class="form-control" id="inputEmail4" name="cureTime" value="<?php echo $inventory['cureTime']; ?>" required>
                        </div>
                        <div class="col-md-4">
                            <label for="inputEmail4" class="form-label">Color</label>
                            <input type="text" class="form-control" id="inputEmail4" name="color" value="<?php echo $inventory['color']; ?>" required>
                        </div>
                        <div class="col-md-4">
                            <label for="inputEmail4" class="form-label">Form</label>
                            <input type="text" class="form-control" id="inputEmail4" name="form" value="<?php echo $inventory['form']; ?>" required>
                        </div>
                        <div class="col-md-4">
                            <label for="inputEmail4" class="form-label">Package Type</label>
                            <input type="text" class="form-control" id="inputEmail4" name="packageType" value="<?php echo $inventory['packageType']; ?>" required>
                        </div>
                        <div class="col-md-4">
                            <label for="inputEmail4" class="form-label">Package Size</label>
                            <input type="text" class="form-control" id="inputEmail4" name="packageSize" value="<?php echo $inventory['packageSize']; ?>" required>
                        </div>
                        <div class="col-md-4">
                            <label for="inputEmail4" class="form-label">Min Operating Temp</label>
                            <input type="text" class="form-control" id="inputEmail4" name="minOperatingTemp" value="<?php echo $inventory['minOperatingTemp']; ?>" required>
                        </div>
                        <div class="col-md-4">
                            <label for="inputEmail4" class="form-label">Max Operating Temp</label>
                            <input type="text" class="form-control" id="inputEmail4" name="maxOperatingTemp" value="<?php echo $inventory['maxOperatingTemp']; ?>" required>
                        </div>
                        <div class="col-md-4">
                            <label for="inputEmail4" class="form-label">Viscosity</label>
                            <input type="text" class="form-control" id="inputEmail4" name="viscosity" value="<?php echo $inventory['viscosity']; ?>" required>
                        </div>
                        
                        <div class="col-md-4">
                            <label for="inputEmail4" class="form-label">Temp Range</label>
                            <input type="text" class="form-control" id="inputEmail4" name="operatingTempRange" value="<?php echo $inventory['operatingTempRange']; ?>" required>
                        </div>
                        <div class="col-md-4">
                            <label for="inputEmail4" class="form-label">Chemical Composition</label>
                            <input type="text" class="form-control" id="inputEmail4" name="chemicalComposition" value="<?php echo $inventory['chemicalComposition']; ?>" required>
                        </div>

                        <div class="col-md-4">
                            <label for="inputEmail4" class="form-label">In Stock</label>
                            <input type="text" class="form-control" id="inputEmail4" name="inStock" value="<?php echo $inventory['inStock']; ?>" required>
                        </div>
                        <div class="col-md-4">
                            <label for="inputEmail4" class="form-label">Minimum Stock</label>
                            <input type="text" class="form-control" id="inputEmail4" name="minimumStock" value="<?php echo $inventory['minimumStock']; ?>" required>
                        </div>
                        <div class="mb-3">
                            <label for="formFile" class="form-label">Product Image</label>
                            <input class="form-control" type="file" id="formFile" name="productImage" >
                        </div>
