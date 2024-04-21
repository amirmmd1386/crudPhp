<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Delete</title>
  <link rel="stylesheet" href="main.css">
  <style>
    .gfg-div {
      height: auto;
    }

    .neumorphic p {
      background: #ecf0f3;
      border-radius: 10px;
      box-shadow: -6px -6px 6px rgba(255, 255, 255, 0.8),
        6px 6px 6px rgba(0, 0, 0, 0.2);
      padding: 10px;
      color: gray;
    }
  </style>
</head>

<body>
  <?php
  $id = $_GET['id'];
  ?>
  <form action="del.php?" method="GET" class="gfg-div">
    <div class="gfg-title">Delete</div>
    <?php
    if (isset($_GET['id'])) {
      $id = $_GET['id'];
      $link = mysqli_connect("localhost", "root", "", "grades");
      $query = "select * from students where StudentId = $id";
      $resualt = mysqli_query($link, $query);
      $row = mysqli_fetch_array($resualt);
      if ($row) {
        echo "
      <div class='neumorphic'> <p>$id</p> <p>$row[LastAName]</p> <p>$row[FirstName]</p> <p>$row[Average]</p> </div>
       
        ";
      } else {
        echo "<script>window.location.replace('index.php')</script>";
      }
    }
    ?>
    <input type="submit" value="Delete" class="gfg-button">
    <div class="gfg-link">
      <a href="index.php">BACK</a>
    </div>
  </form>
</body>

</html>