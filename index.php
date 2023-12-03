<?php
    include 'includes/autoloader.php'
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/mobile.css">
    <link rel="stylesheet" media="only screen and (min-width: 720px)" href="css/desktop.css">
    <title>Home</title>
</head>

<body>
    <div id="container" class="container">
        <header id="header" class="header">
            <!-- something for the drop down menu -->
            <div id="logo" class="logo">
                <a href="includes/signOut.php"><img src="" alt="ModernFit Logo"></a>
            </div>
            <nav id="header-nav">
                <ul>
                    <li><a href="registration.php">Register</a></li>
                    <li><a href="signIn.php">Sign In</a></li>
                </ul>
            </nav>
        </header>
        <div id="main">
            <div id="opening-times-container" class="opening-times-container">
                <ul>
                    <li>Monday 9.00 - 21.00</li>
                    <li>Tuesday 9.00 - 21.00</li>
                    <li>Wednesday 9.00 - 21.00</li>
                    <li>Thursday 9.00 - 21.00</li>
                    <li>Friday 9.00 - 21.00</li>
                    <li>Saturday 9.00 - 21.00</li>
                    <li>Sunday 9.00 - 21.00</li>
                </ul>
            </div>
            <div id="services-container" class="services-container">
                <h1>Services</h1>
                <ul>
                    <li>Tailored programs</li>
                    <li>Nutritioanl guidance</li>
                    <li>Progress monitoring</li>
                </ul>
            </div>
            <div id="facilities-container" class="facilities-container">
                <h1>Facilities</h1>
                <ul>
                    <li>Gym facilities</li>
                    <li>Specialised staff</li>
                </ul>
            </div>

        </div>
        <footer></footer>
    </div>
</body>

</html>