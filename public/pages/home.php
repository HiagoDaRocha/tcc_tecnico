<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Document</title>
  <link rel="stylesheet" href="../assets/css/home.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
  <header>
    <div class="topnav" id="myTopnav">
      <h2>DevMatrix Innovations</h2>
      <a class="active" href="#"><i class="fa fa-fw fa-home"></i> Home</a>
      <a href="#"><i class="fa fa-fw fa-search"></i> Search</a>
      <a href="#"><i class="fa fa-fw fa-envelope"></i> Contact</a>
      <a href="#"><i class="fa fa-fw fa-user"></i> Login</a>
      <a href="javascript:void(0);" class="icon" onclick="toggleMenu()">
        <div class="container">
          <div class="bar1"></div>
          <div class="bar2"></div>
          <div class="bar3"></div>
        </div>
      </a>
    </div>
  </header>

  <div style="padding-left: 16px">
    <h3>Responsive Topnav Example</h3>
    <p>Resize the browser window to see how it works.</p>
  </div>

  <script>
    function toggleMenu() {
      var x = document.getElementById("myTopnav");
      x.classList.toggle("responsive");
    }
  </script>
</body>

</html>
