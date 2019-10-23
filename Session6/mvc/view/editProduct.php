<h3>Update product</h3>
<div>
    <form method="POST" action="index.php?action=submitEditProduct">
        <input type="hidden" name="id" value="<?php echo $id; ?>">
        <div>
            <label>Title :</label>
            <input type="text" name="title" value="<?php echo $title ?>" placeholder="Enter title">
        </div>

        <div>
            <label>Description :</label>
            <input type="text" name="description" value="<?php echo $description ?>" placeholder="Enter description">
        </div>

        <div>
            <label>Price :</label>
            <input type="number" name="price" value="<?php echo $price ?>" placeholder="Enter price">
        </div>

        <button type="submit" name="submitEditProduct">Update</button>
    </form>
</div>