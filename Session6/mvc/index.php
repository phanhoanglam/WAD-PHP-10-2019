<?php include 'controller/controller.php'; ?>
<h1>My website!</h1>
<a href="index.php?action=home">Home</a>
 | <a href="index.php?action=news">News</a>
 | <a href="index.php?action=products">Products</a>
 | <a href="index.php?action=contact">Contact</a>
 <?php 
 	$controller = new Controller();
 	$controller->handleRequest();
 ?>