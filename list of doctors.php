<html>

<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Butwal MC </title>
    <meta name="keywords" content="Butwal MC ">
    <meta name="description" content="Butwal MC">
    <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
    <script>
      $(document).ready(function () {
        $("#nav-placeholder").load("nav.html");
      });
    </script>
</head>

<body>
    <div id="nav-placeholder"></div>
    <h1 style="color:black;font-size: 45px;text-align:center;margin:30px;">Butwal MC Doctors!</h1>
    <div class="container">
        <div class="table-responsive">
            <table class="table table-hover striped">
                <thead class="thead-dark">
                    <tr>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Address</th>
                        <th>Number</th>
                        <th>Edu</th>
                        <th>Depart</th>
                    </tr>
                </thead>
                <tbody style="color:white">
                    <?php
                        require "conn.php";
                        $sql="select * from doctors";
                        $result=$conn->query($sql);
                        if ($result->num_rows>0) {
                            while ($row=$result->fetch_assoc()) {
                                echo"
                                <tr>
                                        <td>
                                        ".$row["docid"]."
                                        </td>
                                        <td>
                                        ".$row["name"]."
                                        </td>
                                        <td>
                                        ".$row["address"]."
                                        </td>
                                        <td>
                                        ".$row["phno"]."
                                        </td>
                                        <td>
                                        ".$row["qualification"]."
                                        </td>
                                        <td>
                                        ".$row["department"]."
                                        </td>
                                </tr>";
                            }
                            echo"</table>";
                        } else {
                            echo"0 result";
                        }
                    ?>
                </tbody>
            </table>
        </div>
    </div>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

</body>

</html>