<h2>Products page</h2>
<a href="index.php?action=addProduct">Add product</a>
<br>
<table>
  <thead>
    <tr>
      <th>Title</th>
      <th>Description</th>
      <th>Price</th>
      <th>Create</th>
      <th>#</th>
    </tr>
  </thead>
  <tbody>
    <?php
    while ($row = mysqli_fetch_array($productList)) {
      ?>
      <tr>
        <td><?php echo $row['Title']; ?></td>
        <td><?php echo $row['Description']; ?></td>
        <td><?php echo $row['Price']; ?></td>
        <td><?php echo $row['Created']; ?></td>
        <td>
          <a href="index.php?action=EditProduct&id=<?php echo $row['Id']; ?>">Edit</a>
          |
          <a onclick="return confirm('Are you sure you want to delete this item?');" href="index.php?action=DeleteProduct&id=<?php echo $row['Id']; ?>">Delete</a>
        </td>
      </tr>
    <?php
    }
    ?>
  </tbody>
</table>