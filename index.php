<!DOCTYPE html>
<html lang="en">
    <head>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <meta charset="utf-8">
        <link rel="stylesheet" href="style_gallery.css">
        <meta name="viewport" content="width=device-width, initial-scale=1">
    </head>
    <body>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <nav class="navbar navbar-light bg-light" style="width:100%">
            <div class="container-fluid" >
                <div class="navbar-brand navbar-left" style="max-width:100px">
                    <img src="Seamlogo.svg" alt="Seamless logo" style="height:75px;width:75px;">
                </div>
                <div class="navbar-brand me-auto" style="max-width:20%">
                    <h1>Seamless</h1>
                </div>
                <div class="btn-group">
                    <a class="navbar-brand" href="/Seamless/index.php">Home</a>
                    <a class="navbar-brand" href="/Seamless/about.php">About</a>
                    <?PHP
                    session_start();
                    if (!(isset($_SESSION['login']) && $_SESSION['login'] != '')) {
                        echo "<a class='navbar-brand' href=/Seamless/login.php>Login</a>";
                    }
                    else{
                        echo "<a class='navbar-brand' href=/Seamless/design_upload.php>Upload Design</a><a class='navbar-brand' href=/Seamless/logout.php>Logout</a>";
                    }

                    ?>
                </div>
            </div>
        </nav>
        <h3 style="padding: 1rem 0 0 2rem; color:rgb(0, 0, 94)">Popular designs</h3>
        <div style="padding: 2rem">
            <section class="gallery">
                <?php
                error_reporting(0);      
                include('connection.php');
                $db1 = mysqli_connect("localhost", "root", "","seamless");
                $query = mysqli_query($db1,"select * from image");
                while($row = mysqli_fetch_array($query)) {
                $Username=$row['Username'];
                $sql = "select *from login_details where username = '$Username'";
                $res2 = mysqli_query($con, $sql);  
                $row2 = mysqli_fetch_array($res2, MYSQLI_ASSOC);
                echo "<div class='item'>
                    <img src='image/{$row['filename']}'>
                    <div class='item__overlay'>
                        <div style='margin: 2rem; text-align: center;'>
                            <h4 style='color:blue;'>Designer: {$row2['Name']}</h4>
                            <h4 style='color:blue;'>Contact: {$row2['Email_address']}</h4>
                            <h4 style='color:blue;'>{$row['apparel']}</h4>
                            <h6>Material: {$row['material']} Color: {$row['colour']}</h6>
                            <h6>Size: {$row['size']}</h6>
                            <h6>Gender: {$row['gender']} Age group: {$row['age']}</h6>
                            <p>{$row['description']}</p>
                            <div><h5 style='color:blue;'>{$row['price']}</h5></div>
                        </div>
                    </div>
                </div>" ;
                }
                mysqli_close($db1);
                ?>
            </section>
        </div>
    </body>
</html>