<!DOCTYPE HTML>
<html>

<head>
    <Title>Daftar Anggota</Title>
    <link rel="stylesheet" href="css/dashboard.css">

<body>
    <div class="label-page">
        <h3>Tampil Data Anggota</h3>
    </div>
    <div class="content">
        <p id="tombol-tambah-container"><a href="index.php?p=anggota-input" class="tombol">Tambah anggota</a>
            <a target="-blank" href="pages/cetak.php"><img src="images/print.png" alt="images" height="50px"
                    height="50px"></a>
        <form class="form-inline" method="POST">
            <div align="right">
                <form method="post"><input type="text" name="pencarian">
                    <input type="submit" name="search" value="search" class="tombol">
                </form>
            </div>
        </form>
        </p>
        <table id="tabel-tampil">
            <tr>
                <th id="label-tampil-no">No</th>
                <th>ID Anggota</th>
                <th>Nama</th>
                <th>Foto</th>
                <th>Jenis Kelamin</th>
                <th>alamat</th>
                <th id="label-opsi">Opsi</th>
            </tr>
            <?php

            $batas = 5;
            extract($_GET);
            if (empty($hal)) {
                $posisi = 0;
                $hal = 1;
                $nomor = 1;
            } else {
                $posisi = ($hal - 1) * $batas;
                $nomor = $posisi + 1;
            }

            if ($_SERVER['REQUEST_METHOD'] == "POST") {
                $pencarian = trim(mysqli_real_escape_string($conn, $_POST['pencarian']));
                if ($pencarian != "") {
                    $sql = "SELECT * FROM tbanggota WHERE nama LIKE '%$pencarian'
                        OR idanggota LIKE '%$pencarian'
                        OR jeniskelamin LIKE '%$pencarian'
                        OR alamat LIKE '%$pencarian'";

                    $query = $sql;
                    $queryJml = $sql;
                } else {
                    $query = "SELECT * FROM tbanggota LIMIT $posisi, $batas";
                    $queryJml = "SELECT * FROM tbanggota";
                    $no = $posisi * 1;
                }


                // $sql = "SELECT * FROM tbanggota ORDER BY idanggota DESC";

                $q_tampil_anggota = mysqli_query($db, $query);
                if (mysqli_num_rows($q_tampil_anggota) > 0) {
                    while ($r_tampil_anggota = mysqli_fetch_array($q_tampil_anggota)) {
                        if (empty($r_tampil_anggota['foto']) or ($r_tampil_anggota['foto'] == '-'))
                            $foto = "Admin-Profile.png";

                        else
                            $foto = $r_tampil_anggota['foto'];
            ?>
            <tr>
                <td><?php echo $nomor; ?></td>
                <td><?php echo $r_tampil_anggota['idanggota']; ?></td>
                <td><?php echo $r_tampil_anggota['nama']; ?></td>
                <td><img src="images/<?php echo $foto; ?>" width=70px height=70px></td>
                <td><?php echo $r_tampil_anggota['jenis kelamin']; ?></td>
                <td><?php echo $r_tampil_anggota['alamat']; ?></td>
                <td>
                    <div class="tombol-opsi-container">
                        <a target="_blank" href="pages/cetak_kartu.php?id=<?php echo $r_tampil_anggota['idanggota']; ?>"
                            class="tombol">Cetak kartu</a>
                    </div>

                    <div class="tombol-opsi-container">
                        <a href="index.php?p=anggota-edit&id = <?php echo $r_tampil_anggota['idanggota']; ?>"
                            class="tombol">Edit</a>
                    </div>
                    <div class="tombol-opsi-container">
                        <a href="proses/anggota-hapus.php?id=<?php echo $r_tampil_anggota['idanggota']; ?>"
                            onclick="return_confirmation('Apakah anda yakin akan menghapus Data ini>')"
                            class="tombol">Hapus</a>
                    </div>
                </td>
            </tr>
            <?php
                        $nomor++;
                    }
                } else {
                    echo "<tr><td colspan=6>Data tidak ditemukan</td></tr>";
                } ?>
        </table>

        <?php
                if (isset($_POST['pencarian'])) {
                    if ($_POST['pencarian'] != '') {
                        echo "<div style=\"float:left;\">";
                        $jml = mysqli_num_rows(mysqli_query($db, $queryJml));
                        echo "Data Hasil Pencarian: <b>$jml</b>";
                        echo "</div>";
                    }
                } else   ?>
        <div style="float: left;">

            <?php
                $jml = mysqli_num_rows(mysqli_query($db, $queryJml));
                echo "jumlah Data : <b>$jml</b>";
            ?>
        </div>

        <div class="pagination">
            <?php
                $jml_hal = ceil($jml / $batas);
                for ($i = 1; $i <= $jml_hal; $i++) {
                    if ($i != $hal) {
                        echo "<a href=\?p=anggota&hal=$i\">$i</a>";
                    } else {
                        echo "<a class=\"active\">$i</a>";
                    }
                }
            ?>
        </div>

        <?php

            }

    ?>
    </div>

</body>
</head>

</html>