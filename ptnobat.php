<?php
require 'conection.php';
require 'ceklogin.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Daftar PTN OBAT</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
    <link href="css/styles.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous">
    </script>
</head>

<body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
        <!-- Navbar Brand-->
        <a class="navbar-brand ps-3" href="index.html">PT. PERTIWI AGUNG</a>
        <!-- Sidebar Toggle-->
        <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i
                class="fas fa-bars"></i></button>
        <!-- Navbar Search-->
        <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
            <div class="input-group">
                <input class="form-control" type="text" placeholder="Search for..." aria-label="Search for..."
                    aria-describedby="btnNavbarSearch" />
                <button class="btn btn-primary" id="btnNavbarSearch" type="button"><i
                        class="fas fa-search"></i></button>
            </div>
        </form>
        <!-- Navbar-->
        <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown"
                    aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" href="#!">Settings</a></li>
                    <li><a class="dropdown-item" href="#!">Activity Log</a></li>
                    <li>
                        <hr class="dropdown-divider" />
                    </li>
                    <li><a class="dropdown-item" href="logout.php">Logout</a></li>
                </ul>
            </li>
        </ul>
    </nav>
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav">

                        <a class="nav-link" href="index.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                            Total PTN
                        </a>
                        <a class="nav-link" href="ptnobat.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                            PTN Obat
                        </a>
                        <a class="nav-link" href="ptnpassion.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                            PTN Passion
                        </a>
                        <a class="nav-link" href="logout.php">
                            logout
                        </a>

                    </div>
                </div>
                <div class="sb-sidenav-footer">
                    <div class="small">Logged in as:</div>
                    Start Bootstrap
                </div>
            </nav>
        </div>
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">

                    <!-- Pesan error -->
                    <?php 
                    if($error){
                        ?>
                    <div class="alert alert-danger" role="alert">
                        <?php echo $error ?>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <?php
                    }
                ?>
                    <!-- Pesan success -->
                    <?php 
                    if($sukses){
                        ?>
                    <div class="alert alert-success" role="alert">
                        <?php echo $sukses ?>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <?php
                    }
                ?>

                    <h1 class="mt-4">PTN OBAT</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item active">Departement PPIC Plant || PT. Pertiwi Agung (Landson)</li>
                    </ol>


                    <div class="card mb-4">
                        <div class="card-header">
                            <!-- Button to Open the Modal -->
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
                                Tambah PTN
                            </button>

                        </div>
                        <div class="card-body">
                            <table id="datatablesSimple">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Item Code</th>
                                        <th>Item description</th>
                                        <th>Batch No</th>
                                        <th>Expired Date</th>
                                        <th>No PTN</th>
                                        <th>Quantity</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>

                                <!-- Menampilkan Data dari database -->
                                <?php
                                    include"conection.php";
                                    $data= mysqli_query($Conn, "SELECT * FROM obat");                                    
                                    while ($hasil = mysqli_fetch_array($data)) {
                                        $idptn  = $hasil['idptn'];
                                ?>
                                <tr>
                                    <td><?php echo $hasil['idptn']?></td>
                                    <td><?php echo $hasil['itemcode'] ?></td>
                                    <td><?php echo $hasil['description'] ?></td>
                                    <td><?php echo $hasil['batch'] ?></td>
                                    <td><?php echo $hasil['expired'] ?></td>
                                    <td><?php echo $hasil['numberptn'] ?></td>
                                    <td><?php echo $hasil['qty'] ?></td>
                                    <td><?php echo $hasil['status'] ?></td>
                                    <td>
                                        <button class="badge btn btn-warning" data-toggle="modal"
                                            data-target="#edit<?=$idptn;?>">Edit</button>
                                        <!-- <input type="hidden" name="idptndelete" value="<?=$idptn; ?>"> -->

                                        <button class="badge btn btn-danger" data-toggle="modal"
                                            data-target="#delete<?=$idptn;?>">Hapus</button>
                                    </td>
                                </tr>

                                <!-- The Modal edit -->
                                <div class="modal fade" id="edit<?=$idptn;?>">
                                    <div class="modal-dialog">
                                        <div class="modal-content">

                                            <!-- Modal Header -->
                                            <div class="modal-header">
                                                <h4 class="modal-title">Edit PTN Obat</h4>
                                                <button type="button" class="close"
                                                    data-dismiss="modal">&times;</button>
                                            </div>

                                            <!-- Modal body -->
                                            <form method="post">
                                                <div class="modal-body">
                                                    <H6>Item Code</H6>
                                                    <input type="text" name="itemcode"
                                                        value="<?php echo $hasil['itemcode']?>" id="itemcode"
                                                        class="form-control" required>

                                                    <H6>Item Description</H6>
                                                    <input type="text" name="description"
                                                        value="<?php echo $hasil['description']?>" id="description"
                                                        class="form-control" requared>

                                                    <H6>Batch No</H6>
                                                    <input type="text" name="batch" value="<?php echo $hasil['batch']?>"
                                                        class="form-control" requared>

                                                    <h6>Expired Date</h6>
                                                    <input type="date" name="expired"
                                                        value="<?php echo $hasil['expired']?>" class="form-control"
                                                        requared>

                                                    <h6>No PTN</h6>
                                                    <input type="text" name="numberptn"
                                                        value="<?php echo $hasil['numberptn']?>" class="form-control"
                                                        requared>

                                                    <h6>Quantity</h6>
                                                    <input type="text" name="qty" value="<?php echo $hasil['qty']?>"
                                                        class="form-control" requared>

                                                    <h6>Status</h6>
                                                    <input type="text" name="status"
                                                        value="<?php echo $hasil['status']?>" class="form-control"
                                                        requared>

                                                    <input type="hidden" name="idptn"
                                                        value="<?php echo $hasil['idptn'] ?>">
                                                    <button type="submit" class="btn btn-primary"
                                                        name="updateptnobat">Submit</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>

                                <!-- The Modal delete -->
                                <div class="modal fade" id="delete<?=$idptn;?>">
                                    <div class="modal-dialog">
                                        <div class="modal-content">

                                            <!-- Modal Header -->
                                            <div class="modal-header">
                                                <h4 class="modal-title">Hapus?</h4>
                                                <button type="button" class="close"
                                                    data-dismiss="modal">&times;</button>
                                            </div>

                                            <!-- Modal body -->
                                            <form method="post">
                                                <div class="modal-body">
                                                    Yakin ingin menghapus <?php echo $hasil['itemcode']?>?
                                                    <input type="hidden" name="idptn"
                                                        value="<?php echo $hasil['idptn'] ?>">
                                                    <br>
                                                    </br>
                                                    <button type="submit" class="btn btn-danger"
                                                        name="hapusptnobat">Hapus</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>

                                <?php 
                                    }
                                    ?>

                            </table>
                        </div>
                    </div>
                </div>
            </main>
            <footer class="py-4 bg-light mt-auto">
                <div class="container-fluid px-4">
                    <div class="d-flex align-items-center justify-content-between small">
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous">
    </script>
    <script src="js/scripts.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <script src="assets/demo/chart-area-demo.js"></script>
    <script src="assets/demo/chart-bar-demo.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
    <script src="js/datatables-simple-demo.js"></script>


</body>
<!-- The Modal -->
<div class="modal fade" id="myModal">
    <div class="modal-dialog">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Tambah PTN Obat</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <form method="post">
                <div class="modal-body">
                    <H6>Item Code</H6>
                    <input type="text" name="itemcode" id="itemcode" class="form-control" required>

                    <H6>Item Description</H6>
                    <input type="text" name="description" id="description" class="form-control" requared>

                    <H6>Batch No</H6>
                    <input type="text" name="batch" class="form-control" requared>

                    <h6>Expired Date</h6>
                    <input type="date" name="expired" class="form-control" requared>

                    <h6>No PTN</h6>
                    <input type="text" name="numberptn" class="form-control" requared>

                    <h6>Quantity</h6>
                    <input type="text" name="qty" class="form-control" requared>

                    <h6>Status</h6>
                    <input type="text" name="status" class="form-control" requared>

                    <button type="submit" class="btn btn-primary" name="addptnobat">Submit</button>
                </div>
            </form>


        </div>
    </div>
</div>

</html>