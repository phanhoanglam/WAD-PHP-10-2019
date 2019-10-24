<h3 class="center">Update product</h3>

<div class="form">
    <form method="POST" action="index.php?action=submitEditProduct">
        <input type="hidden" name="id" value="<?php echo $product['Id'] ?>">
        <div class="form-group">      
        <input type="text" name="title" class="form-control" value="<?php echo $product['Title'] ?>" placeholder="Enter title">
        </div>

        <div class="form-group">       
        <input type="text" name="description" class="form-control" value="<?php echo $product['Description'] ?>" placeholder="Enter description">
        </div>

        <div class="form-group">
        <input type="number" name="price" class="form-control" value="<?php echo $product['Price'] ?>" placeholder="Enter price">
        </div>

        <button type="submit" name="submitEditProduct" class="btn btn-primary">Update</button>
    </form>
</div>