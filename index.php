<?php
session_start(); // Start the session


if (!isset($_SESSION['authenticated']) || $_SESSION['authenticated'] !== true) {
    // If the user is not authenticated, redirect to the login page
    header('Location: login.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Admin</title>
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Open+Sans&family=Rubik:wght@700&display=swap"
      rel="stylesheet"
    />
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
      crossorigin="anonymous"
    />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
      integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    />
    <style>
      * {
        font-family: "Open Sans", sans-serif;
      }
      .title-font {
        font-family: 'Rubik', sans-serif;
      }
      .active{
        background-color: #A5C9CA!important;
        color: #000 !important;
      }
      .bg-menu-hover:hover{
        background-color: #393646 !important;
      }
      .bg-main{
        background-color: #395B64;
      }
      .bg-nav{
        background-color: #333;
      }
      .bg-increase{
        background-color: lightgreen;
      }
      .bg-decrease{
        background-color: #FF8989;
      }
    </style>
  </head>
  <body class="bg-dark">
    <div class="container-fluid p-0">
      <div class="row g-0">
        <nav class="col-2 bg-dark">
          
          <!-- title -->

          <h1 class="h4 py-3 text-center text-light">
            <i class="fa-brands fa-pagelines me-2"></i>
            <span class="d-none d-lg-inline title-font">Nature</span>
          </h1>

          <!-- menu item -->

          <div class="list-group text-lg-start text-center p-auto">
            <span class="list-group-item disabled text-lg-start bg-dark text-secondary border-0">
              <i class="fa-solid fa-bars fa-xs me-1"></i>
              <small class="d-none d-lg-inline">Main Menu</small>
            </span>
            <a href="#" class="list-group-item list-group-item-action active border-0">
              <i class="fa-solid fa-table-cells-large ps-lg-2 me-1"></i>
              <span class="d-none d-lg-inline">Dashboard</span>
            </a>
            <a href="#" class="list-group-item list-group-item-action bg-dark bg-menu-hover text-light border-0">
              <i class="fa-regular fa-chart-bar ps-lg-2 me-1"></i>
              <span class="d-none d-lg-inline">Statistics</span>
            </a>
            <a href="#" class="list-group-item list-group-item-action bg-dark bg-menu-hover text-light border-0">
              <i class="fa-regular fa-newspaper ps-lg-2 me-1"></i>
              <span class="d-none d-lg-inline">Articles</span>
            </a>
            <a href="#" class="list-group-item list-group-item-action bg-dark bg-menu-hover text-light border-0">
              <i class="fa-solid fa-users ps-lg-2 me-1"></i>
              <span class="d-none d-lg-inline">Users</span>
            </a>
            <a href="#" class="list-group-item list-group-item-action bg-dark bg-menu-hover text-light border-0">
              <i class="fa-regular fa-clipboard ps-lg-2 me-1"></i>
              <span class="d-none d-lg-inline">Report</span>
            </a>
            <a href="#" class="list-group-item list-group-item-action bg-dark bg-menu-hover text-light border-0">
              <i class="fa-solid fa-question ps-lg-2 me-1"></i>
              <span class="d-none d-lg-inline">Help</span>
            </a>
            <span class="list-group-item list-group-item-action disabled text-lg-start bg-dark text-secondary border-0">
              <i class="fas fa-cog fa-xs me-1"></i>
              <small class="d-none d-lg-inline">Setting</small>
            </span>
            <a class="list-group-item list-group-item-action bg-dark bg-menu-hover text-light border-0 rounded-0 btn text-lg-start" data-bs-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
              <i class="fa-regular fa-pen-to-square ps-lg-2 me-1"></i>
              <span class="d-none d-lg-inline">Edit</span>
              <i class="fa-solid fa-caret-down"></i>
            </a>
            <div class="collapse" id="collapseExample">
              <a href="#" class="card card-body bg-dark bg-menu-hover text-light border-0 rounded-0 text-decoration-none d-block py-1 ps-lg-5">
                <i class="fa-regular fa-user me-1"></i>
                <small class="d-none d-lg-inline">Profile</small>
              </a>
              <a href="#" class="card card-body bg-dark bg-menu-hover text-light border-0 rounded-0 text-decoration-none d-block py-1 ps-lg-5">
                <i class="fa-solid fa-lock me-1"></i>
                <small class="d-none d-lg-inline">Password</small>
              </a>
            </div>
            <a href="logout.php" class="list-group-item list-group-item-action bg-dark bg-menu-hover text-light border-0 rounded-0">
              <i class="fa-solid fa-arrow-right-from-bracket ps-lg-2 me-1"></i>
              <span class="d-none d-lg-inline">Logout</span>
            </a>
          </div>
        </nav>
        <main class="col-10 bg-main">

          <!-- navbar -->

          <nav class="navbar navbar-expand-lg navbar-dark bg-nav">
            <form class="d-none d-sm-flex" role="search">
              <button class="btn btn-outline-none text-secondary" type="submit">
                <i class="fa-solid fa-magnifying-glass"></i>
              </button>
              <input class="form-control border-0 rounded-pill focus-ring focus-ring-dark" type="search" placeholder="Search" aria-label="Search">
            </form>
            <div class="flex-fill"></div>
            <div class="navbar nav">
              <li class="nav-item">
                <a href="#" class="nav-link text-light">
                  <i class="fa-regular fa-envelope"></i>
                </a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link text-light">
                  <i class="fa-regular fa-bell"></i>
                </a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link text-light">
                  <span class="pe-3"><?php echo $_SESSION['username']; ?></span>
                  <i class="fas fa-user-circle fa-xl"></i>
                </a>
              </li>
            </div>
          </nav>

          <!-- status block -->
          
          <div class="row mx-2 mt-4">
            <h2 class="h6 text-white">Status</h2>
            <div class="col-lg-3 col-md-6 col-12">
              <div class="card mb-3 bg-dark">
                <div class="card-body text-light">
                  <h3 class="card-title title-font">60,331</h3>
                  <span>
                    <i class="fa-regular fa-eye fa-sm me-2"></i>
                    <small>Article Views</small>
                  </span>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-12">
              <div class="card mb-3 bg-info">
                <div class="card-body">
                  <h3 class="card-title title-font">33,284</h3>
                  <span>
                    <i class="fa-regular fa-thumbs-up fa-sm me-2"></i>
                    <small>Likes</small>
                  </span>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-12">
              <div class="card mb-3 bg-secondary">
                <div class="card-body text-light">
                  <h3 class="card-title title-font">20,352</h3>
                  <span>
                    <i class="fa-regular fa-comments fa-sm me-2"></i>
                    <small>Comments</small>
                  </span>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-12">
              <div class="card mb-3 bg-primary">
                <div class="card-body">
                  <h3 class="card-title title-font">12,648</h3>
                  <span>
                    <i class="fa-regular fa-share-from-square fa-sm me-2"></i>
                    <small>Shares</small>
                  </span>
                </div>
              </div>
            </div>
          </div>

            <!-- data blocks -->

            <div class="row mt-4 mx-2 flex-column flex-lg-row">
              <div class="col">
                <h2 class="h6 text-light">Data</h2>
                <div class="card mb-3 p-2">
                  <div class="card-body">
                    <table class="table">
                      <tr>
                        <th> </th>
                        <th>Visits</th>
                        <th>Likes</th>
                        <th>Comments</th>
                        <th>Shares</th>
                      </tr>
                      <tr>
                        <th>Today</th>
                        <td>23</td>
                        <td>10</td>
                        <td>5</td>
                        <td>3</td>
                      </tr>
                      <tr>
                        <th>This Week</th>
                        <td>124</td>
                        <td>59</td>
                        <td>30</td>
                        <td>24</td>
                      </tr>
                      <tr>
                        <th>This Month</th>
                        <td>904</td>
                        <td>498</td>
                        <td>335</td>
                        <td>247</td>
                      </tr>
                      <tr>
                        <th>This Year</th>
                        <td>15420</td>
                        <td>8423</td>
                        <td>3977</td>
                        <td>3002</td>
                      </tr>
                    </table>
                  </div>
                </div>
              </div>
              <div class="col">
                <h2 class="h6 text-light">Annual Data</h2>
                <div class="card mb-3 p-2">
                  <div class="card-body">
                    <table class="table">
                      <tr>
                        <th>Year</th>
                        <th>Visits</th>
                        <th>Likes</th>
                        <th>Comments</th>
                        <th>Shares</th>
                      </tr>
                      <tr>
                        <th>2020</th>
                        <td>10562</td>
                        <td>6335</td>
                        <td>4553</td>
                        <td>1747</td>
                      </tr>
                      <tr>
                        <th>2021</th>
                        <td>13304</td>
                        <td>7569</td>
                        <td>5827</td>
                        <td>3509</td>
                      </tr>
                      <tr>
                        <th>2022</th>
                        <td>21045</td>
                        <td>10957</td>
                        <td>5995</td>
                        <td>4390</td>
                      </tr>
                      <tr>
                        <th>2023</th>
                        <td>15420</td>
                        <td>8423</td>
                        <td>3977</td>
                        <td>3002</td>
                      </tr>
                    </table>
                  </div>
                </div>
              </div>
            </div>

            <!-- rate data blocks -->

            <div class="row mx-2 mt-4">
              <h2 class="h6 text-white ">Visitor Rates</h2>
              <div class="col-md-4 col-sm-6 col-12">
                <div class="card mb-3 bg-increase">
                  <div class="card-body">
                    <span>2021</span>
                    <h3 class="card-title title-font pt-3 text-success">
                      <i class="fa-solid fa-arrow-up"></i> 25.96%
                    </h3>
                  </div>
                </div>
              </div>
              <div class="col-md-4 col-sm-6 col-12">
                <div class="card mb-3 bg-increase">
                  <div class="card-body">
                    <span>2022</span>
                    <h3 class="card-title title-font pt-3 text-success">
                      <i class="fa-solid fa-arrow-up"></i> 58.18%
                    </h3>
                  </div>
                </div>
              </div>
              <div class="col-md-4 col-12">
                <div class="card mb-3 bg-decrease">
                  <div class="card-body">
                    <span>2023</span>
                    <h3 class="card-title title-font pt-3 text-danger">
                      <i class="fa-solid fa-arrow-down"></i> 36.48%
                    </h3>
                  </div>
                </div>
              </div>
            </div>

          <!-- footer section -->

          <footer class="text-center py-4 text-white-50">&copy; Copyright 2023</footer>
        </main>
      </div>
    </div>
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/js/all.min.js"
      integrity="sha512-uKQ39gEGiyUJl4AI6L+ekBdGKpGw4xJ55+xyJG7YFlJokPNYegn9KwQ3P8A7aFQAUtUsAQHep+d/lrGqrbPIDQ=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    ></script>
  </body>
</html>