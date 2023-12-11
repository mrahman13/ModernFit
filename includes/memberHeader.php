<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <style>
    .header {
      background-color: #000;
    }
    #logo img{
      width: 250px;
    }
  </style>
  <title>Member Header</title>
</head>

<body id="header">
  
    <nav class="navbar navbar-expand-lg header">
      <div class="container-fluid" id="logo">
        <a href="home" class="navbar-brand ms-xl-5"><img class="logo ms-sm-3 ms-xl-4" src="../img/Modernfit_Logo.png"></a>
      </div>
      <!-- <div id="logo" class="logo">
        <a href="home"><img src="" alt="ModernFit Logo"></a>
      </div> -->

      <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarCollapseMember">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarCollapseMember">
        <div class="navbar-nav">
          <a class="nav-link" href=""></a>
          <a class="nav-link" href=""></a>
          <a class="nav-link" href=""></a>
        </div>
        
        <nav id="header-nav">
          <ul>
            <li><a href="includes/signOut.php">Sign Out</a></li>
          </ul>
        </nav>
      </div>
    </nav>
</body>
</html>

<!-- js
  const navs = document.querySelectorAll('[data-nav-target]')           'nav-link'
const navContents = document.querySelectorAll('[data-nav-content]')     remove

navs.forEach(nav => {
    nav.addEventListener('click', () => {
        const target = document.querySelector(nav.dataset.navTarget)    remove
        navs.forEach(navContent => {
            navContent.classList.remove('active')
        })
        navContents.forEach(navContent => {                             remove
            navContent.classList.remove('active')
        })
        nav.classList.add('active')
        target.classList.add('active')                                  remove
    })
})
 -->