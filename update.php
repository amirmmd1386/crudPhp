<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="main.css">
  <title>Update</title>
  <style>
    .gfg-div {
      max-width: 850px;
      height: auto;
    }
  </style>
</head>

<body>
  <?php
  $id = $_GET['id'];
  ?>
  <form action="up.php?" method="GET" class="gfg-div">
    <div class="gfg-title">Update</div>
    <?php
    if (isset($_GET['id'])) {
      $id = $_GET['id'];
      $link = mysqli_connect("localhost", "root", "", "grades");
      $query = "select * from students where StudentId = $id";
      $resualt = mysqli_query($link, $query);
      $row = mysqli_fetch_array($resualt);
      if ($row) {
        echo "
      <div class='gfg-input-fields'>
            <div class='gfg-email'>
        <input type='text' name='id' id='id' value='$id'>
        </div>
        </div>
       
        <div class='gfg-input-fields'>
            <div class='gfg-email'>
        <input type='text' name='lastname' id='lastname' value='$row[LastAName]'>
        </div>
        </div>
       
        
        <div class='gfg-input-fields'>
            <div class='gfg-email'>
          <input type='text' name='firstname' id='firstname' value='$row[FirstName]'>
          </div>
          </div>
      
          <div class='gfg-input-fields'>
          <div class='gfg-email'>
          <input type='text' name='avg' id='avg' value='$row[Average]'>
       </div>
       </div>
          ";
      }
      else{
        echo "<script>window.location.replace('index.php')</script>";
      }
    }
    ?>
    <input type="submit" value="update" class="gfg-button">
    <div class="gfg-link">
      <a href="index.php">BACK</a>
    </div>
  </form>
</body>

</html /*/-*/+