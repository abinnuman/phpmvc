<!DOCTYPE html>
<html>
<head>
    <title>Xspeed: <?php echo ucfirst( $_SERVER['QUERY_STRING'] ) ?></title>

    <!-- BOOTSTRAP CSS-->
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">

    <!-- TAGS-INPUT CSS -->
    <link rel="stylesheet" href="assets/jquery-tagsinput/jquery.tagsinput.css">

    <!-- JQUERY CONFIRM CSS -->
    <link rel="stylesheet" href="assets/jquery-confirm/jquery-confirm.min.css">

    <!-- DATA TABLE CSS -->
    <link rel="stylesheet" type="text/css" href="assets/datatables/datatables.min.css"/>

    <!-- JQUERY JS-->
    <script src="assets/jquery/jquery-3.5.1.min.js"></script>

    <style>
        .error{
            color: red;
        }
    </style>
</head>

<body>
    <!-- NAV BAR START -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="index.php?add">Add New</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="index.php?report">Report</a>
                </li>
            </ul>
        </div>
    </nav>
    <!-- NAV BAR END -->

    <!-- CONTENT START -->
    <div class="container-fluid">
        <!-- FORM START -->