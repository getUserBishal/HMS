<html>

<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Butwal MC </title>
    <meta name="keywords" content="Butwal MC">
    <meta name="description" content="Butwal Medical Centre">
    <style text="text/css">
        .aa {
            margin: 0;
            margin-top: 30px;
            height: 70%;
            background-color: rgba(0, 0, 0, 0.5);

        }

        .aa h1 {
            color: orange;
            font-size: 50px;
        }

        .aa p {
            text-decoration: none;
            display: block;
            color: #f2f2f2;
            font-size: 15px;
            font-family: sans-serif;
            border-radius=10px;
        }

        .div2 {
            margin-top: 30px;
            padding-left: 30px;
        }

        .aa input[type=text],
        input[type=date] {
            width: 200px;
            height: 30px;
        }

        .aa select {
            width: 200px;
            height: 30px;
            border: 0;
            border-radius: 5px;
        }

        .container {
            margin-bottom: 30px;
        }
    </style>
    <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
    <script>
      $(document).ready(function () {
        $("#nav-placeholder").load("nav.html");
      });
    </script>
</head>

<body>
    <?php
session_start();
require "conn.php";
?>
    <div id="nav-placeholder"></div>
    <?php
if (!isset($_SESSION["name"])) {
    echo "<script>window.location='login/login as patient.html'</script>";
}?>
    <div class="container-fluid" style="padding: 30px 20px 0px 40px;">
        <div class="row">
            <div class="col-md-10">
                <?php
                    echo "<h3>Welcome  ";
                    echo $_SESSION["name"];
                ?>
            </div>
            <div class="col-md-2">

                <form method="POST"><button value="Log Out" name="logout" class="btn">Log Out</button></form>
                <?php
                    if (isset($_POST['logout'])) {
                        session_destroy();
                        echo "<script>window.location='index.html'</script>";
                    }
                    ?>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="aa col-md-8">
                <h1  align="center">Book  Appointment!</h1>
                <form action="appointment 2.php" method="post">
                    <h5>
                        <input type="text" name="date" placeholder="DD/MM/YYYY"
                            onfocus="(this.type='date')" onblur="(this.type='text')" required>| Select Date
                        <br><br>
                    </h5>

                    <h5>
                        <input type="text" placeholder="Enter Username" 
                        value="<?php $username = $_SESSION["name"];echo $username;?>" 
                        name="username" required>| Patient<br><br>
                    </h5>

                    <h5> 
                        <select name="doctor_name" class="doctor_list" required>
                            <?php
                                $sql = "select * from doctors";
                                $doc = mysqli_query($conn, $sql);
                                while ($row = mysqli_fetch_assoc($doc)) {
                            ?>

                            <option
                                value="<?php echo $row["name"]; ?>">
                                <?php echo $row["name"]; ?>
                            </option><br><br>
                            <?php
                            }
                            ?>
                        </select>| Doctor
                    </h5><br>

                    <h5> Time:</h5><br>
                    <p><input type="radio" name="time" value="9-11">09-11 a.m &nbsp;
                        <input type="radio" name="time" value="11-1">11-01 p.m &nbsp;
                        <input type="radio" name="time" value="6-8">06-08 p.m &nbsp;
                        <input type="radio" name="time" value="8-10">08-10 p.m<br>

                    <h5>Condition / Checkup:</h5><br>
                    <p><input type="radio" name="disease" value="mild">General &nbsp;
                        <input type="radio" name="disease" value="serious">Serious &nbsp;
                        <input type="radio" name="disease" value="emergency">Emergency <br><br>


                        <input type="submit" value="submit" name="submit" style="background-color:skyblue;">
                    </p>
                </form>
            </div>
            <div class="col-md-4 div2">
                <div class="row">
                    <div class="col-md-6">
                        <span>
                            <h1 style="color:red;font-size:x-large;">Visits:<br></h1>
                            <?php

                            $username = $_SESSION["name"];
                            $sql = "SELECT * FROM prescription WHERE name= '$username'";
                            $result = $conn->query($sql);
                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                    echo "<p>DATE  :  " . $row["date"] . "</p>";
                                }
                            } else {
                                echo "<h2>0</h2>";
                            }

                        ?>
                    </div>
                    <div class="col-md-6">
                        <h1 style="color:red;display: inline;font-size:x-large;">Appointments:<br></h1>
                        <?php
                            $username = $_SESSION["name"];
                            $date = date('Y-m-d');
                            $sql = "select * from appointment where username= '$username' and date >= '$date' ";
                            $result = $conn->query($sql);
                            if ($result->num_rows > 0) {
                                echo "<ul>";
                                while ($row = $result->fetch_assoc()) {
                                    echo "<li>DATE  :  " . $row["date"] . "<br>TIME Slot  :  " . $row["time"] . "</li>";
                                }
                                echo "</ul>";
                            } else {
                                echo "<h2>0</h2>";
                            }

                        ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <?php
$s = "SELECT * FROM prescription where name='$username'";
$res = $conn->query($s);
$r = $res->fetch_assoc();
?>
                        <a
                            href="prescription upload/<?php echo $r['filename'] ?>"><img
                                src="assets/Images/prescription copy.jpg" height="280px" width="200px"></a>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>

</html>