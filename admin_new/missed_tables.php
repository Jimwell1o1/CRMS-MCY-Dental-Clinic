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
    <title>Tables - SB Admin</title>
    <?php
        include 'includes/style-links.php';
    ?>
  </head>
  <body class="sb-nav-fixed">
    
  <?php include "includes/navbar.php"; ?> <!--==== NAV BAR ====-->

    
      <div id="layoutSidenav_content">
        <main>
          <div class="container-fluid px-4">
            <h1 class="mt-4">Missed Schedule</h1>
            <ol class="breadcrumb mb-4">
              <li class="breadcrumb-item">&nbsp;&nbsp;
                <a href="index.php">Dashboard</a>
              </li>
              <li class="breadcrumb-item active">Missed Schedules</li>
            </ol>

            <div class="card mb-4">
              <div class="card-header">
                <i class="fas fa-table me-1"></i>
                Missed
              </div>
              <div class="card-body">
                <table id="datatablesSimple">
                  <thead>
                    <tr>
                      <th>Name</th>
                      <th>Gender</th>
                      <th>Date</th>
                      <th>Time</th>
                      <th>Branch</th>
                      <th>Consultation</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>Name</th>
                      <th>Gender</th>
                      <th>Date</th>
                      <th>Time</th>
                      <th>Branch</th>
                      <th>Consultation</th>
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
                                    if("Missed" === $row['bookingStatus']){ 
                                      if($_SESSION['admin_branchName'] === $row['bookingBranch']){ ?>
<tr>
                                              <th scope="row"> <?php echo $row['bookingName'] ?> </th>
                                              <td> <?php echo $row['bookingGender'] ?> </td>
                                                <td> <?php echo $row['bookingDate'] ?> </td>
                                                <td> <?php echo $row['bookingTime'] ?> </td>
                                                <td> <?php echo $row['bookingBranch'] ?> </td>
                                                <td> <?php echo $row['bookingConsultation'] ?> </td>
                                                <td>
                                              <form action="../includes/updatePendingData.php?bookingId=<?php echo htmlspecialchars($row['bookingId'])?>" method="POST">
                                              <button type="button" class="btn btn-primary"  data-bs-toggle="modal" data-bs-target="#exampleModal">
                                                  <i class="fas fa-edit"></i>
                                                </button>
                                                    </form>

                                          
                                              </td>
                                            </tr>
                                            <?php } 
                                if($_SESSION['admin_branchName'] === "mainAdmin"){
                                  ?>
                                  <tr>
                                              <th scope="row"> <?php echo $row['bookingName'] ?> </th>
                                              <td> <?php echo $row['bookingGender'] ?> </td>
                                                <td> <?php echo $row['bookingDate'] ?> </td>
                                                <td> <?php echo $row['bookingTime'] ?> </td>
                                                <td> <?php echo $row['bookingBranch'] ?> </td>
                                                <td> <?php echo $row['bookingConsultation'] ?> </td>
                                                <td>
                                              <form action="../includes/updatePendingData.php?bookingId=<?php echo htmlspecialchars($row['bookingId'])?>" method="POST">
                                              <button type="button" class="btn btn-primary"  data-bs-toggle="modal" data-bs-target="#exampleModal">
                                                  <i class="fas fa-edit"></i>
                                                </button>
                                                    </form>

                                          
                                              </td>
                                            </tr>
                          <?php
                          } } } } ?>


                 
                  </tbody>
                </table>
              </div>
            </div>
          </div>


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
        </main>
        <footer class="py-4 bg-light mt-auto">
          <div class="container-fluid px-4">
            <div
              class="d-flex align-items-center justify-content-between small"
            >
              <div class="text-muted">Copyright &copy; Your Website 2021</div>
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

  </body>
</html>