<h3>Add product</h3>
<div>
    <form method="POST" action="index.php?action=submitAddProduct">
        <div>
            <label>Title :</label>
            <input type="text" name="title" placeholder="Enter title">
        </div>

        <div>
            <label>Description :</label>
            <input type="text" name="description" placeholder="Enter description">
        </div>

        <div>
            <label>Price :</label>
            <input type="number" name="price" placeholder="Enter price">
        </div>

        <button type="submit" name="submitAddProduct">Submit</button>
    </form>
</div>