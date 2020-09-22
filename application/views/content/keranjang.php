<div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

        <!-- Sidebar - Brand -->
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
            <div class="sidebar-brand-icon rotate-n-10">
                <i class="fas fa-user-secret"></i>
            </div>
            <div class="sidebar-brand-text mx-3">USER</div>
        </a>

        <!-- Divider -->
        <hr class="sidebar-divider">
        <div class="sidebar-heading">
            petugas
        </div>
        <li class="nav-item">
            <a class="nav-link" href="<?php echo site_url('canteen/admin') ?>">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Admin</span></a>
        </li>


        <hr class="sidebar-divider">




        <!-- Heading -->
        <div class="sidebar-heading">
            User
        </div>


        <!-- Nav Item - User -->
        <li class="nav-item">
            <a class="nav-link" href="<?php echo site_url('canteen/data_user') ?>">
                <i class="fas fa-user"></i>
                <span>Menu</span></a>
        </li>




        <hr class="sidebar-divider">

        <!-- Nav Item - Validasi -->
        <li class="nav-item">
            <a class="nav-link" href="<?php echo site_url('canteen/keranjang1') ?>">
                <i class="fas fa-table"></i>
                <span>Keranjang</span></a>
        </li>

        <hr class="sidebar-divider">

        <!-- Nav Item - Validasi -->
        <li class="nav-item">
            <a class="nav-link" href="<?php echo site_url('canteen/order') ?>">
                <i class="fas fa-table"></i>
                <span>Order</span></a>
        </li>

        <hr class="sidebar-divider">

        <!-- Nav Item - Validasi -->
        <li class="nav-item">
            <a class="nav-link" href="<?php echo site_url('canteen/transaksi') ?>">
                <i class="fas fa-table"></i>
                <span>Data transaksi</span></a>
        </li>





        <!-- Divider -->
        <hr class="sidebar-divider d-none d-md-block">

        <!-- Logout -->
        <li class="nav-item">
            <a class="nav-link" href="<?php echo site_url('canteen') ?>">
                <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                <span>Logout</span></a>
        </li>
        <hr class="sidebar-divider d-none d-md-block">



        <!-- Sidebar Toggler (Sidebar) -->
        <div class="text-center d-none d-md-inline">
            <button class="rounded-circle border-0" id="sidebarToggle"></button>
        </div>

    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

        <!-- Main Content -->
        <div id="content">

            <!-- Topbar -->
            <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                <!-- Sidebar Toggle (Topbar) -->
                <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                    <i class="fa fa-bars"></i>
                </button>


                <!-- Topbar Navbar -->
                <ul class="navbar-nav ml-auto">




                    <div class="topbar-divider d-none d-sm-block"></div>

                    <!-- Nav Item - User Information -->
                    <li class="nav-item dropdown no-arrow">
                        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="mr-2 d-none d-lg-inline text-gray-600 small">
                                <? echo $user['name']; ?>
                            </span>
                            <img class="img-profile rounded-circle"
                                src="<?php echo base_url('assets/img/avatar5.png'); ?>">
                        </a>
                        <!-- Dropdown - User Information -->
                        <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                            aria-labelledby="userDropdown">

                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="<?php echo site_url('canteen') ?>" data-toggle="modal"
                                data-target="#logoutModal">
                                <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                Logout
                            </a>


                        </div>
                    </li>

                </ul>


            </nav>
            <div class="card shadow mb-4">
                <div class="card-header py-3">

                    <h3 class="m-0 font-weight-bold text-primary">Data Keranjang User</h3>

                </div>

                <!-- // pdf -->
                <div class="card-header py-1">
                    <a class="btn btn-warning" href="<?php echo base_url('canteen/pdf') ?>">
                        <i class="fa fa-file"></i>Export Pdf </a>

                    <!-- excel -->

                    <a class="btn btn-success" href="<?php echo base_url('canteen/excel') ?>">
                        <i class="fa fa-file"></i>Export excel </a>
                </div>



                <div class="table-responsive">
                    <table class="table table-bordered" id="" width="100%" cellspacing="0">
                        <thead>
                            <tr>

                                <th scope="col">No</th>
                                <th scope="col">Nama Makanan</th>
                                <th scope="col">Harga</th>
                                <th scope="col">status makanan</th>
                                <th scope="col">Jumlah Beli</th>
                                <th scope="col">Total harga</th>
                                <th colspan="2">Action</th>
                                <!-- <th scope="col">Status</th> -->
                            </tr>


                        </thead>
                        <tbody>

                            <?php
							$total = 0;
							$no = 1;
							if ($data_user1 > 0) {
								foreach ($user1 as $dapor) {
									$harga_makanan[] = $dapor->harga_makanan;
									$total = array_sum($harga_makanan);
									$jumlah_beli[]   = $dapor->jumlah_beli;
									$total1 = array_sum($jumlah_beli);
							?>
                            <tr>
                                <td> <?php echo $no++; ?></td>
                                <td> <?php echo $dapor->nama_makanan; ?></td>
                                <td> <?php echo $dapor->harga_makanan; ?></td>
                                <td> <?php echo $dapor->status_makanan; ?></td>
                                <td> <?php echo $dapor->jumlah_beli; ?></td>
                                <td> <?php echo $dapor->harga_makanan * $dapor->jumlah_beli; ?></td>
                                <td
                                    onclick="javascript: return confirm('apakah anda yakin mau menghapus data keranjang  ini?')">
                                    <?php echo anchor(
												'canteen/hapuskeranjang/' . $dapor->id_makanan,
												'<button type="button" class="btn btn-danger">Delete</button>'
											); ?>
                                </td>


                </div>
                </td>




                </tr>
                <?php } ?>
                <tr>

                    <td>Total semua harga</td>
                    <td></td>
                    <td><?php echo $total; ?></td>
                    <td></td>
                    <td><?php echo $total1; ?></td>
                    <td><?php echo $total * $total1; ?></td>


                    <td>

                        <!-- //Button trigger modal -->
                        <button type="submit" class="btn btn-success" data-toggle="modal" data-target="#exampleModal">
                            beli
                        </button>

                    </td>



                </tr>

                <?php



							} else {
		?>



                <tr>
                    <td colspan="8">
                        <center> NO Data Entry</center>
                    </td>
                </tr>
                <?php
							}

		?>


                </tbody>


                </table>
                </form>
            </div>
        </div>




        </form>


    </div>

</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Order User Makanan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">


                <form action="<?php echo site_url('canteen/simpan_data'); ?>" method="post">

                    <div class="form-group">
                        <label>No Meja</label>
                        <input type="hidden" name="id_order" class="form-control">
                        <input type="text" name="no_meja" class="form-control">
                    </div>


                    <div class="form-group">
                        <label>Tanggal Order</label>
                        <input type="date" name="tanggal" class="form-control">
                    </div>



                    <div class="form-group">
                        <label>Keterangan</label>
                        <input type="text" name="keterangan" class="form-control">
                    </div>

                    <div class="form-group">
                        <label>Status Order</label>
                        <input type="text" name="status_order" class="form-control">
                    </div>






            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">bayar</button>
            </div>
            </form>
        </div>
    </div>
</div>





<!-- End of Footer -->

</div>
<!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->


<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    < class="modal-dialog" role="document">

        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>


                <button class="close" type="button" data-dismiss="modal" aria-label="Close">



                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Select "Logout" below if you are ready to end your
                current session.


            </div>


            <div class="modal-footer">







                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <a class="btn btn-primary" href="<?php echo site_url('canteen') ?>">Logout</a>
            </div>






























































        </div>
</div>
</div>
</div>
</div>