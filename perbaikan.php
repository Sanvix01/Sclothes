<?php
$sql_query = "SELECT * FROM kategori"; // Inisialisasi query

if (!empty($query)) {
    $sql_query .= " WHERE nm_kategori LIKE '%$query%'";
}

$sql = mysqli_query($koneksi, $sql_query);

// Cek apakah query berhasil
if ($sql === false) {
    echo "Query error: " . mysqli_error($koneksi);
} else {
    if (mysqli_num_rows($sql) > 0) {
        while ($hasil = mysqli_fetch_array($sql)) {
            ?>
            <tr>
                <td><?php echo $no++; ?></td>
                <td><?php echo $hasil['nm_kategori']; ?></td>
                <td>
                    <a href="e_kategori.php?id=<?php echo $hasil["id_kategori"]; ?>" class="btn btn-warning">
                        <i class="bi bi-pencil-square"> </i>
                    </a>
                    <a href="h_kategori.php?id=<?php echo $hasil["id_kategori"]; ?>" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                        <i class="bi bi-trash"></i>
                    </a>
                </td>
            </tr>
            <?php
        }
    } else {
        ?>
        <tr>
            <td colspan="3" class="text-center">Belum Ada Data</td>
        </tr>
        <?php
    }
}
?>
