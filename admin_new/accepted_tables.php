<?php
    session_start();
    require_once '../includes/dbh.inc.php';
    require_once '../includes/emptySession.php';

 if (!isset($_SESSION['admin_branchName'])){
  header("Location: ../admin/login-admin.php");
  die();
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>

    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />
    <meta name="description" content="" />
    <meta name="author" content="" />
     <!-- Favicons -->
  <link href="../assets/img/favicon.png" rel="icon">
  <link href="../assets/img/apple-touch-icon.png" rel="apple-touch-icon">
    <title>Accepted - Admin</title>
    <?php
        include 'includes/style-links.php';
    ?>

<!-- JS FOR DISABLE PAST DATE -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
  <script>

    $(document).ready(function(){
      $(function(){
        var dtToday = new Date();

        var month = dtToday.getMonth() + 1;
        var day = dtToday.getDate();
        var year = dtToday.getFullYear();
    if(month < 10)
        month = '0' + month.toString();
    if(day < 10)
        day = '0' + day.toString();

        var maxDate= year + '-' + month + '-' + day;
        $('#dateControl').attr('min', maxDate);
      });
    })

  </script>
  </head>
  <body class="sb-nav-fixed">

    <?php include "includes/navbar.php"; ?> <!--==== NAV BAR ====-->


      <div id="layoutSidenav_content">
        <main>
          <div class="container-fluid px-4">
            <h1 class="mt-4">Accepted Schedule</h1>
            <ol class="breadcrumb mb-4">
              <li class="breadcrumb-item">
                <a href="index.php">Dashboard</a>
              </li>
              <li class="breadcrumb-item active">Accepted Schedule</li>
            </ol>
            <?php
           if (isset($_GET["error"])){
          if ($_GET["error"] == "successful") {
                            echo '<div class="alert alert-success alert-dismissible">
                            The system has successfully updated the information. 
                          </div>';
           }else if($_GET["error"] == "unsuccessful") {
            echo '<div class="alert alert-danger alert-dismissible">
              Updating data error occured, please try again.
          </div>';
}
          }
              ?>
              
            <div class="card mb-4">
              <div class="card-header">
                <i class="far fa-calendar-check me-1"></i>
                Accepted
              </div>
              <div class="card-body">
               

              <table id="datatablesSimple">
                  <thead>
                    <tr>
                      <th>Name</th>
                      <th>Gender</th>
                      <th>Email</th>
                      <th>Date</th>
                      <th>Time</th>
                      <th>Consultation</th>
                      <th>Branch</th>                     
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>Name</th>
                      <th>Gender</th>
                      <th>Email</th>
                      <th>Date</th>
                      <th>Time</th>
                      <th>Consultation</th>
                      <th>Branch</th>                     
                      <th>Action</th>
                    </tr>
                  </tfoot>
                  <tbody>
                    

                    <?php
                            $sql = "SELECT * FROM booking;";
                            $result = mysqli_query($conn, $sql);
                            $resultChecked = mysqli_num_rows($result);

                            if($resultChecked > 0){  
                                while($row = mysqli_fetch_assoc($result)){
                                    if("Accepted" === $row['bookingStatus']){ 
                                      if($_SESSION['admin_branchName'] === $row['bookingBranch']){ 
                                             include 'includes/tables/accepted_tables.inc.php';
                                } 
                                if($_SESSION['admin_branchName'] === "mainAdmin"){
                                 
                                  include 'includes/tables/accepted_tables.inc.php';
                         
                          } } } } ?>

                  </tbody>
                </table>
              </div>
            </div>
          </div>
                        </main>
          <?php 
          include 'modalAddpatient.php';

          ?>


        <footer class="py-4 bg-light mt-auto">
          <div class="container-fluid px-4">
            <div
              class="d-flex align-items-center justify-content-between small"
            >
              <div class="text-muted">Copyright &copy; MCY Dental Clinic 2021</div>
              <div>
                <a href="#">Privacy Policy</a>
                &middot;
                <a href="#">Terms &amp; Conditions</a>
              </div>
            </div>
          </div>
        </footer>
      </div>
    </div>
    
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"
      crossorigin="anonymous"
    ></script>
    <script src="js/scripts.js"></script>
    <script
      src="https://cdn.jsdelivr.net/npm/simple-datatables@latest"
      crossorigin="anonymous"
    ></script>
    <script src="js/datatables-simple-demo.js"></script>

    <script>
      function ConfirmDelete(){

  var x = confirm("Are you sure you want to delete?");
  if (x)
      return true;
  else
    return false;
    }
    </script>
    
  </body>
</html>
