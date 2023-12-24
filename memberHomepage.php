<?php
    session_start();
    include 'includes/autoloader.php';
    $_SESSION['user_check'] = "member";
    include 'includes/checkLogin.php';
    include 'includes/memberHeader.php';
    $user_id = $_SESSION['user_id'];

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Homepage</title>
  <style>

body {
  margin: 0;
  padding: 0;
}

.container {
  width: 100%;
  max-width: 100%;
  margin: 0;
  padding: 0;
  min-height: 120vh;
}

.gym-image {
  width: 100%;
  height: 50vh;
  display: block;
}

.title-img {
  position: absolute;
  top: 20%;
  left: 50%;
  transform: translate(-50%, -50%);
  color: white;
  font-size: 100px;
  text-align: center;
  font-family: 'Roboto', sans-serif;
  background: rgba(0, 0, 0, 0.5);
  padding: 20px;
  width: 40%;
}

.info-img {
  position: absolute;
  top: 15%;
  left: 10%;
  transform: translate(-50%, -50%);
  color: white;
  font-size: 20px;
  font-family: 'Roboto', sans-serif;
}

.about-img {
  position: absolute;
  top: 40%;
  left: 50%;
  transform: translate(-50%, -50%);
  color: white;
  font-size: 20px;
  text-align: center;
  font-family: 'Roboto', sans-serif;
  background: rgba(0, 0, 0, 0.5);
  padding: 10px;
}

h1 {
  text-decoration: underline;
  text-align: center;
  margin-top: 5px;
}

.facilities,
.services {
  position: absolute;
  transform: translate(-50%, -50%);
  color: white;
  font-size: 15px;
  font-family: 'Roboto', sans-serif;
  background: rgba(0, 0, 0, 0.5);
  width: 40%;
  height: 40%;
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;
}

.facilities {
  top: 85%;
  left: 25%;
}

.services {
  top: 85%;
  left: 75%;
}

.facilities h2,
.services h2 {
  font-size: 20px;
  font-weight: bold;
}

.footer {
  width: 100%;
  background: black;
  text-align: center;
  margin-top: 30%;
  color: white;
  padding: 20px 15%;
}

.contactUs,
.copyright {
  display: inline-block;
  text-align: center;
}

.contactUs p,
.copyright p {
  margin: 5px 0;
}

    
  </style>
</head>

<body>

  <div class="container">

    <img src="../img/Homepage/Gym.png" class="gym-image">
    <div class="title-img">
    <p>ModernFit</p>
    </div>
    <div class="info-img">
    <p>Mon-Sat: 9:00-21:00</p>
    <p>Tel: +44 9182 238491</p>
    </div>
    <div class="about-img">
    <p>Here at ModernFit, we provide first-rate facilities, qualified trainers and a welcoming community in order to support you in your fitness objectives. Whether you're just beginning or an experienced fitness lover, we have the resources and programmes to help you succeed on your journey.</p>
    </div>

    <div class="facilities">
    <h1>Facilities</h1>
    <br>
    <ul>
  <h2>Sauna Room</h2>
  <p>Unwind and heal your muscles after a workout in our spacious sauna.</p>
  <h2>Gym Equipment</h2>
  <p>High-quality gym equipment, including treadmills, barbells, stationary bikes, are available to increase your fitness.</p>
  <h2>Personal Trainer</h2>
  <p>Our personal trainers are committed to tailoring workouts to your individual goals and objectives in order to support you in your fitness journey.</p>
    </ul>
    </div>

    <div class="services">
    <h1>Services</h1>
    <br>
    <ul>
      <h2>Nutrional Information</h2>
  <p>View nutritional information on your favourite foods, which includes vital information such as calories, proteins, carbs, and fats.</p>
  <h2>Tailored Programs</h2>
  <p>We offer tailored programs catered to each members individual needs, these programs are made by our team of personal trainers.</p>
    </ul>
    </div>

    <footer>
  <div class="footer">
    <div class="contactUs">
      <h3>Contact Us</h3>
      <p>Address: 123 Exeter Road, Sheffield</p>
      <p>Phone: +44 9182 238491</p>
      <p>Email: modernfit09@gmail.com</p>
    </div>
    <div class="copyright">
      <p>Copyright &copy; 2009-2023 ModernFit Limited</p>
    </div>
  </div>
</footer>

</html>
<!-- https://www.youtube.com/watch?v=lLdzlLL33G8 -->
<!-- Reference I used to help me implement a footer -->

<!-- https://www.w3schools.com/html/html_symbols.asp -->
<!-- Reference I used to implement copyright symbol -->
