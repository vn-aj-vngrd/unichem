<div class="container white-box-container round-edge">
    <div class="scroll-list-2">
                <form enctype="multipart/form-data" method="post" action="../crud/create.php" class="row g-3">
                    <input type="hidden" name="create" value="product">
                        <input type="hidden" name="productID" value="<?php echo $inventory['productID']; ?>" required>
                        <div class="mb-3">
                            <label for="inputProdName" class="form-label">Product Name</label>
                            <input type="text" class="form-control" id="inputProdName" name="tradeName" required>
                        </div>
                        
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Description</label>
                            <input type="temxt" class="form-control" id="" placeholder="" name="description" required>
                        </div>
                        


                        <div class="col-md-4">
                            <label for="inputDate" class="form-label">Date Contained</label>
                            <input type="date" class="form-control" id="inputDate" name="dateContained" required>
                        </div>

                        <div class="col-md-4">
                            <label for="inputBrand" class="form-label">Brand Name</label>
                            <input type="text" class="form-control" id="inputBrand" name="brandName" required>
                        </div>

                        <div class="col-md-4">
                            <label for="inputEmail4" class="form-label">Price</label>
                            <input type="text" class="form-control" id="inputEmail4" name="price" required>
                        </div>
                        <div class="col-md-4">
                            <label for="inputEmail4" class="form-label">Application Type</label>
                            <input type="text" class="form-control" id="inputEmail4" name="applicationType" required>
                        </div>
                        <div class="col-md-4">
                            <label for="inputEmail4" class="form-label">Cure Time</label>
                            <input type="time" class="form-control" id="inputEmail4" name="cureTime" required>
                        </div>
                        <div class="col-md-4">
                            <label for="inputEmail4" class="form-label">Color</label>
                            <input type="text" class="form-control" id="inputEmail4" name="color" required>
                        </div>
                        <div class="col-md-4">
                            <label for="inputEmail4" class="form-label">Form</label>
                            <input type="text" class="form-control" id="inputEmail4" name="form" required>
                        </div>
                        <div class="col-md-4">
                            <label for="inputEmail4" class="form-label">Package Type</label>
                            <input type="text" class="form-control" id="inputEmail4" name="packageType" required>
                        </div>
                        <div class="col-md-4">
                            <label for="inputEmail4" class="form-label">Package Size</label>
                            <input type="text" class="form-control" id="inputEmail4" name="packageSize" required>
                        </div>
                        <div class="col-md-4">
                            <label for="inputEmail4" class="form-label">Min Operating Temp</label>
                            <input type="text" class="form-control" id="inputEmail4" name="minOperatingTemp" required>
                        </div>
                        <div class="col-md-4">
                            <label for="inputEmail4" class="form-label">Max Operating Temp</label>
                            <input type="text" class="form-control" id="inputEmail4" name="maxOperatingTemp" required>
                        </div>
                        <div class="col-md-4">
                            <label for="inputEmail4" class="form-label">Viscosity</label>
                            <input type="text" class="form-control" id="inputEmail4" name="viscosity" required>
                        </div>
                        
                        <div class="col-md-4">
                            <label for="inputEmail4" class="form-label">Temp Range</label>
                            <input type="text" class="form-control" id="inputEmail4" name="operatingTempRange" required>
                        </div>
                        <div class="col-md-4">
                            <label for="inputEmail4" class="form-label">Chemical Composition</label>
                            <input type="text" class="form-control" id="inputEmail4" name="chemicalComposition" required>
                        </div>
                        <div class="col-md-4">
                            <label for="inputEmail4" class="form-label">In Stock</label>
                            <input type="text" class="form-control" id="inputEmail4" name="inStock" required>
                        </div>
                        <div class="col-md-4">
                            <label for="inputEmail4" class="form-label">Minimum Stock</label>
                            <input type="text" class="form-control" id="inputEmail4" name="minimumStock" required>
                        </div>
                        <div class="mb-3">
                            <label for="formFile" class="form-label">Product Image</label>
                            <input class="form-control" type="file" id="formFile" name="productImage"  required>
                        </div>

                        <div class="col-md-6"><br>
                            <button type="submit" class="btn btn-primary" value="submit">Create</button>
                        </div>
                        

                    </form>
    </div>
</div>