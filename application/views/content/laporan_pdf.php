<!DOCTYPE html>
<html>

<head>
    <title>laporan pdf</title>
</head>

<body>




    <table border="1">
        <thead>
            <tr>
                <th scope="col">NO</th>
                <th scope="col">Nama Makanan</th>
                <th scope="col">Harga</th>
                <th scope="col">Status makanan</th>
                <th scope="col">gambar</th>
                <th colspan="2">Action</th>
                <!-- <th >Status</th> -->
            </tr>


        </thead>
        <tbody>

            <?php
			if ($data_admin > 0) {
				foreach ($admin as $dapor) {
			?>
            <tr>
                <td> <?php echo $dapor->id_makanan; ?></td>
                <td> <?php echo $dapor->nama_makanan; ?></td>
                <td> <?php echo $dapor->harga_makanan; ?></td>
                <td> <?php echo $dapor->status_makanan; ?></td>
                <td> <img src="<?php echo base_url(); ?>assets/foto/<?php echo $dapor->foto ?>" width="100"
                        height="100">
                </td>




            </tr>
            <?php }
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







</body>
