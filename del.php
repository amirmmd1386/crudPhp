<?php
 $link = mysqli_connect("localhost","root","","grades");
 $id = $_GET['id'];
 $query ="delete from grades.students where students.StudentId = $id";
 $resualt = mysqli_query($link,$query);
 echo "<script>window.location.replace('index.php')</script>";
?>