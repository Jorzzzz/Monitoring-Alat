<!doctype html>
<html>
<head>
    <title>Kelola Data - Alat BMKG</title>
</head>
<body>
<style type="text/css">
	body{
		font-family: sans-serif;
	}
	table{
		margin: 20px auto;
		border-collapse: collapse;
	}
	table th,
	table td{
		border: 1px solid #3c3c3c;
		padding: 3px 8px;

	}
	a{
		background: blue;
		color: #fff;
		padding: 8px 10px;
		text-decoration: none;
		border-radius: 2px;
	}
	</style>

    <?php
	header("Content-type: application/vnd-ms-excel");
	header("Content-Disposition: attachment; filename=Data Alat.xls");
	?>
                                <table border="1">
                                    <tr>
                                        <th>No.</th>
                                        <th>Nama</th>
                                        <th>Nama Alat</th>
                                        <th>Kondisi</th>
                                        <th>Bagian</th>
                                        <th>Deskripsi</th>
                                        <th>Tanggal & Waktu</th>
                                    </tr>
                                    <?php 
                                            // isi nama host, username mysql, dan password mysql anda
                                            $conn = mysqli_connect("localhost","root","","monitoring");
											$brgs=mysqli_query($conn,"SELECT * from kategori k, alat p where k.idkategori=p.idkategori order by idalat ASC");
											$no=1;
											while($p=mysqli_fetch_array($brgs)){
											?>

                                    <tr>
                                        <td><?php echo $no++ ?></td>
                                        <td><?php echo $p['nama'] ?></td>
                                        <td><?php echo $p['namaalat'] ?></td>
                                        <td><?php echo $p['kondisi'] ?></td>
                                        <td><?php echo $p['namakategori'] ?></td>
                                        <td><?php echo $p['deskripsi'] ?></td>
                                        <td><?php echo $p['tgldibuat'] ?></td>
                                    </tr>

                                    <?php 
									}
                                    ?>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
<html>