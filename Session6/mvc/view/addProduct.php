<h3 class="center">Add product</h3>

<div class="form">
    <form method="POST" action="index.php?action=submitAddProduct">
        <div class="form-group">      
            <input type="text" name="title" class="form-control"  placeholder="Enter title">
        </div>

        <div class="form-group">       
            <input type="text" name="description" class="form-control"  placeholder="Enter description">
        </div>

        <div class="form-group">
            <input type="number" name="price" class="form-control"  placeholder="Enter price">
        </div>

        <button type="submit" name="submitAddProduct" class="btn btn-primary">Submit</button>
    </form>
</div>