  <!DOCTYPE html>
  <html lang="en">

  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../css/desktop.css">
    <style>
      a.none {
        text-decoration: none;
      }

      #logo img {
        width: 250px;
      }
    </style>
  </head>

  <body>
    <nav class="navbar sticky-top navbar-dark navbar-expand-lg bg-black">
      <div class="container-fluid">
        <a href="homepage" class="navbar-brand ms-xl-5" id="logo">
          <img class="logo ms-sm-3 ms-xl-4" src="../img/Logo/Modernfit_Logo.png" draggable="false">
        </a>

        <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarCollapseAdmin">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse ps-sm-3 ps-lg-0" id="navbarCollapseAdmin">
          <div class="navbar-nav me-auto">
            <a class="nav-link" href="sendEmail">Send Email</a>

          </div>

          <a class="none btn btn-outline-warning me-lg-3 me-xl-5" href="signOut">Sign Out</a>
        </div>
      </div>
    </nav>
  </body>

  </html>