<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="main.css">
    <title>Document</title>
</head>

<body>
    <form action="new.php" method="GET" class="gfg-div">
    <div class="gfg-title">Insert</div>
        <div class="gfg-input-fields">
            <div class="gfg-email">
                <input type="text" name="fname" id="fname" placeholder="firstname" required>
            </div>
        </div>
        <div class="gfg-input-fields">
            <div class="gfg-email">
                <input type="text" name="lname" id="lname" placeholder="lastname" required>
            </div>
        </div>
        <div class="gfg-input-fields">
            <div class="gfg-email">
                <input type="text" name="score" id="score" placeholder="score" required>
            </div>
        </div>
        <?php
        if (isset($_GET['fname'])) {
            $fname = $_GET['fname'];
            $lname = $_GET['lname'];
            $score = $_GET['score'];
            $link = mysqli_connect("localhost", "root", "", "grades");
            $query = "insert into students (FirstName,LastAName,Average) values('$fname','$lname','$score')";
            $reaualt = mysqli_query($link, $query);
            echo "<script>window.location.replace('index.php')</script>";
        }
        ?>
        <input type="submit" value="insert" class="gfg-button">
        <div class="gfg-link">
            <a href="index.php">BACK</a>
        </div>
    </form>
</body>

</html>