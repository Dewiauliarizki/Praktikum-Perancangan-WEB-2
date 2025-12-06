<?php
include 'koneksi.php';

// --- Konfigurasi Pagination ---
$limit = 10; // jumlah data per halaman
$page  = isset($_GET['page']) ? $_GET['page'] : 1;
$start = ($page - 1) * $limit;

// Variabel pencarian
$keyword = "";
$where = "";

// Jika tombol cari ditekan
if (isset($_GET['cari'])) {
    $keyword = $_GET['keyword'];
    $where = "WHERE nama LIKE '%$keyword%'
              OR email LIKE '%$keyword%'
              OR telepon LIKE '%$keyword%'
              OR peran LIKE '%$keyword%'";
}

// Hitung total data
$total_data_query = mysqli_query($koneksi, "SELECT COUNT(*) AS total FROM pemakai $where");
$total_data = mysqli_fetch_assoc($total_data_query)['total'];

// Hitung total halaman
$total_page = ceil($total_data / $limit);

// Query data sesuai pagination (ASC → ID kecil dulu)
$query = mysqli_query($koneksi,
    "SELECT * FROM pemakai $where ORDER BY id_pengguna ASC LIMIT $start, $limit"
);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Kelola Pengguna</title>
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: #fafafa;
        }

        .sidebar {
            width: 230px;
            height: 100vh;
            background: #eeeeee;
            padding-top: 20px;
            float: left;
            box-shadow: 2px 0 5px rgba(0,0,0,0.1);
        }

        .sidebar a {
            display: block;
            padding: 12px 20px;
            text-decoration: none;
            color: #333;
            font-size: 16px;
            margin-bottom: 5px;
        }

        .navbar {
            height: 60px;
            background: #ffffff;
            padding: 10px 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-bottom: 2px solid #ddd;
        }

        .content {
            margin-left: 230px;
            padding: 20px;
        }

        .btn-tambah {
            margin-top: 15px;
            padding: 8px 12px;
            background: #4CAF50;
            border: none;
            color: white;
            border-radius: 5px;
            cursor: pointer;
        }

        table {
            width: 100%;
            margin-top: 20px;
            border-collapse: collapse;
            background: white;
        }

        table th, table td {
            padding: 10px;
            border-bottom: 1px solid #ddd;
            text-align: left;
        }

        .btn-edit {
            padding: 5px 10px;
            background: #2196F3;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .btn-delete {
            padding: 5px 10px;
            background: #f44336;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .search-box {
            margin-top: 20px;
            margin-bottom: 10px;
        }

        .search-box input {
            padding: 8px;
            width: 280px;
            border: 1px solid #aaa;
            border-radius: 5px;
        }

        .search-box button {
            padding: 8px 12px;
            background: #2196F3;
            border: none;
            color: white;
            border-radius: 5px;
            cursor: pointer;
        }
    </style>
</head>

<body>

    <div class="navbar">
        <div class="logo">🔷 Futsal Booking</div>
        <div class="user">Halo, Admin | Profil</div>
    </div>

    <div class="sidebar">
        <a href="#">Dashboard</a>
        <a href="#" style="font-weight:bold;">Kelola Pengguna</a>
        <a href="#">Kelola Lapangan</a>
        <a href="#">Kelola Jadwal</a>
        <a href="#">Kas Keuangan</a>
        <a href="#">Laporan</a>
    </div>

    <div class="content">
        <h2>Kelola Pengguna</h2>
        <p>Daftar Pengguna Terdaftar</p>

        <a href="tambah_pengguna.php">
            <button class="btn-tambah">Tambah Pengguna</button>
        </a>

        <!-- 🔍 Pencarian -->
        <form method="GET" class="search-box">
            <input type="text" name="keyword" placeholder="Cari nama, email, telepon, atau peran..." value="<?= $keyword ?>">
            <button type="submit" name="cari">Cari</button>
        </form>

        <table>
            <tr>
                <th>ID</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Telepon</th>
                <th>Peran</th>
                <th>Aksi</th>
            </tr>

            <?php while ($row = mysqli_fetch_array($query)) { ?>
            <tr>
                <td><?= $row['id_pengguna']; ?></td>
                <td><?= $row['nama']; ?></td>
                <td><?= $row['email']; ?></td>
                <td><?= $row['telepon']; ?></td>
                <td><?= $row['peran']; ?></td>
                <td>
                    <a href="edit_pengguna.php?id=<?= $row['id_pengguna']; ?>">
                        <button class="btn-edit">Edit</button>
                    </a>

                    <a href="hapus.php?id=<?= $row['id_pengguna']; ?>" onclick="return confirm('Yakin ingin menghapus?')">
                        <button class="btn-delete">Hapus</button>
                    </a>
                </td>
            </tr>
            <?php } ?>
        </table>

        <!-- PAGINATION BARU -->
        <div style="margin-top:20px; display:flex; align-items:center; gap:15px;">

            <!-- Tombol PREV -->
            <?php if($page > 1): ?>
                <a href="?page=<?= $page - 1 ?>&keyword=<?= $keyword ?>&cari=" 
                   style="padding:8px 14px; background:#2196F3; color:white; border-radius:6px; text-decoration:none;">
                   ‹ Prev
                </a>
            <?php else: ?>
                <span style="padding:8px 14px; background:#ccc; color:#666; border-radius:6px;">‹ Prev</span>
            <?php endif; ?>

            <!-- Informasi slide -->
            <span style="font-size:16px; font-weight:bold;">
                Halaman <?= $page ?> dari <?= $total_page ?>
            </span>

            <!-- Tombol NEXT -->
            <?php if($page < $total_page): ?>
                <a href="?page=<?= $page + 1 ?>&keyword=<?= $keyword ?>&cari=" 
                   style="padding:8px 14px; background:#2196F3; color:white; border-radius:6px; text-decoration:none;">
                   Next ›
                </a>
            <?php else: ?>
                <span style="padding:8px 14px; background:#ccc; color:#666; border-radius:6px;">Next ›</span>
            <?php endif; ?>

        </div>

    </div>

</body>
</html>
