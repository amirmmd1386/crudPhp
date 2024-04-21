<?php
 $link = mysqli_connect("localhost","root","","grades");
 $id = $_GET['id'];
 $firstname = $_GET['firstname'];
 $lastname = $_GET['lastname'];
 $avg = $_GET['avg'];
 $query ="UPDATE students SET FirstName = '$firstname', LastAName= '$lastname', Average = '$avg' WHERE StudentId = $id;";
 $resualt = mysqli_query($link,$query);
 echo "<script>window.location.replace('index.php')</script>";
?>