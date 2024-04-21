<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>index</title>
    <style>
        .search {
            box-shadow: -6px -6px 6px rgba(255, 255, 255, 0.8),
                6px 6px 6px rgba(0, 0, 0, 0.2);
            outline: none;
            border: none;
            border-radius: 3px;
            background: #f0f0f0;
            margin-left: 5px;
            font-size: 20px;
        }
    </style>
</head>

<body dir="rtl">
    <?php
    $link = mysqli_connect("localhost", "root", "", "grades");
    ?>
    <div class="d-flex justify-content-start gap-2 align-items-center  m-3 ">
        <div>
            <a href="new.php" class='btn btn-light'>+</a>
        </div>
        <div>
            <form action="index.php" method="get">
                <input type="text" name="search" class="search" placeholder="جستجو">
                <input type="submit" class="btn btn-secondary " value="جستجو">
            </form>
        </div>
    </div>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">شناسه هنرجو</th>
                <th scope="col">نام</th>
                <th scope="col">نام خانوادگی</th>
                <th scope="col">نمره</th>
                <th scope="col" colspan='2'>مدیریت</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $avg = 0;
            $num = 0;
            if (isset($_GET['search']) && strlen($_GET['search'])) {
                $s = $_GET['search'];
                $query = "select * from students where Average = $s";
            } else {
                $query = "select * from students";
            }
            $resualt = mysqli_query($link, $query);
            $row = mysqli_fetch_array($resualt);
            if ($row) {
                while ($row) {
                    echo "<tr scope='row'>";
                    echo "<td>$row[StudentId]</td>";
                    echo "<td>$row[FirstName]</td>";
                    echo "<td>$row[LastAName]</td>";
                    echo "<td>$row[Average]</td>";
                    echo "<td><a href='delete.php?id=$row[StudentId]' class='btn btn-danger'>حذف</a></td>";
                    echo "<td><a href='update.php?id=$row[StudentId]' class='btn btn-success'>ویرایش</a></td>";
                    echo "</tr>";
                    $avg += $row['Average'];
                    $num++;
                    $row = mysqli_fetch_array($resualt);
                }
                $main = $avg / $num;
                echo "<tr scope='row'>";
                echo "<th colspan='3'>میانگین کلاس</th>";
                echo "<td colspan='3'>$main</td>";
                echo "</tr>";
            } else {
                echo "<tr scope='row'>";
                echo "<th colspan='5'>";
                echo "هیچ رکوردی درج نشده است";
                echo "</th>";
                echo "</tr>";
            }
            // } else {
            //     $query = "select * from students";
            //     $resualt = mysqli_query($link, $query);
            //     $row = mysqli_fetch_array($resualt);
            //     if ($row) {
            //         while ($row) {
            //             echo "<tr scope='row'>";
            //             echo "<td>$row[StudentId]</td>";
            //             echo "<td>$row[FirstName]</td>";
            //             echo "<td>$row[LastAName]</td>";
            //             echo "<td>$row[Average]</td>";
            //             echo "<td><a href='delete.php?id=$row[StudentId] ' class='btn btn-danger'>حذف</a></td>";
            //             echo "<td><a href='update.php?id=$row[StudentId] '  class='btn btn-success'>ویرایش</a></td>";
            //             echo "</tr>";
            //             $avg += $row['Average'];
            //             $num++;
            //             $row = mysqli_fetch_array($resualt);
            //         }
            //         $main = $avg / $num;
            //         echo "<tr scope='row'>";
            //         echo "<td colspan='3'>میانگین کلاس</td>";
            //         echo "<td colspan='3'>$main</td>";
            //         echo "</tr>";
            //     } else {
            //         echo "<tr scope='row'>";
            //         echo "<th colspan='5'>";
            //         echo "هیچ رکوردی درج نشده است";
            //         echo "</th>";
            //         echo "</tr>";
            //     }
            // }
            ?>
        </tbody>
    </table>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
</body>

</html>