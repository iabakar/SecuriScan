<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Eyebal</title>
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />
    <!-- MDB -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.2.0/mdb.min.css" rel="stylesheet" />
    <link href="includes/style.css" rel="stylesheet" />

</head>

<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-md navbar-dark bg-primary">
        <!-- Container wrapper -->
        <div class="container-fluid">
            <!-- Navbar brand -->
            <a class="navbar-brand mt-2 mt-lg-0" href="/">
                <h5 class="pt-1">SecuriScan</h5>
            </a>
            <!-- Toggle button -->
            <button class="navbar-toggler" type="button" data-mdb-toggle="collapse" data-mdb-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fas fa-bars"></i>
            </button>

            <!-- Collapsible wrapper -->
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left links -->
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="#">Host Lookup</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Vulnerability Scanner</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="scan.html">Nmap Scan</a>
                    </li>
                </ul>
                <!-- Left links -->

                <!-- Right elements -->
                <div class="d-flex align-items-center justify-content-start">
                    <!-- Icon -->
                    <!-- <a class="text-reset me-3" href="#">
                        <i class="fas fa-shopping-cart text-white"></i>
                    </a> -->

                    <!-- Notifications -->
                    <div class="dropdown">
                        <a class="text-reset me-3 dropdown-toggle hidden-arrow" href="#" id="navbarDropdownMenuLink" role="button" data-mdb-toggle="dropdown" aria-expanded="false">
                            <i class="fas fa-bell text-white"></i>
                            <span class="badge rounded-pill badge-notification bg-danger">3</span>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownMenuLink">
                            <li>
                                <a class="dropdown-item" href="#">Some update here</a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="#">loool</a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="#">hahah</a>
                            </li>
                        </ul>
                    </div>
                    <!-- Avatar -->
                    <div class="dropdown">
                        <a class="dropdown-toggle d-flex align-items-center hidden-arrow" href="#" id="navbarDropdownMenuAvatar" role="button" data-mdb-toggle="dropdown" aria-expanded="false">
                            <img src="user.png" class="rounded-circle" height="25" alt="Black and White Portrait of a Man" loading="lazy" />
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownMenuAvatar">
                            <li>
                                <a class="dropdown-item" href="#">My profile</a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="#">Settings</a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="#">Logout</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <!-- Right elements -->
            </div>
            <!-- Collapsible wrapper -->
        </div>
        <!-- Container wrapper -->
    </nav>
    <!-- Navbar -->

    <div style="height: 300px;"></div>




    <style>

    </style>



    <div class="container" style="margin-top: -230px;">
        <div class="row" id="search">
            <form id="search-form" action="search.php" method="get" enctype="multipart/form-data">
                <div class="form-group col-xs-4 ">
                    <input class="form-control" name="search" id="search" type="text" placeholder="Search" />
                </div>

                <div class="row" id="filter">

                    <div class="form-group col-sm-3 col-xs-3">
                        <select id="date" name="date" class="form-control">
                            <option value="">Select Date Range</option>
                            <option value="today">Today</option>
                            <option value="this_week">This Week</option>
                            <option value="this_month">This Month</option>
                            <option value="this_year">This Year</option>
                        </select>
                    </div>

                    <div class="form-group col-xs-2">
                        <button type="submit" class="btn btn-block btn-primary">Search</button>
                    </div>
            </form>
        </div>
    </div>
   
</div>


<!-- php code goes here  -->

    <!-- Footer -->
    <footer class="bg-primary text-center text-white fixed-bottom">
        <!-- Grid container -->
        <div class="container p-4 pb-0">

        </div>
        <!-- Grid container -->
        <!-- Copyright -->
        <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
            © 2023 Copyright:
            <a class="text-white" href="/">SecuriScan</a>
        </div>
        <!-- Copyright -->
    </footer>
    <!-- Footer -->
    <!-- MDB -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.2.0/mdb.min.js"></script>
</body>

</html>