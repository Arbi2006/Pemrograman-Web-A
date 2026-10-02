<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Data Mahasiswa</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css"
        rel="stylesheet">
</head>

<body class="bg-light">

    <div class="container mt-5">

        <div class="row justify-content-center">

            <div class="col-md-5">

                <!-- Bootstrap Card -->
                <div class="card shadow">

                    <!-- Gambar -->
                    <img src="foto.jpeg"
                         class="card-img-top"
                         alt="Foto Mahasiswa">

                    <div class="card-body">

                        <h3 class="card-title text-center mb-4">
                            Data Mahasiswa
                        </h3>

                        <?php
                        $nama = "Arbi Muhammad Baihaqi";
                        $prodi = "Teknik Informatika";
                        $nim = "2441007";
                        ?>

                        <p class="card-text">
                            <strong>Nama:</strong>
                            <?php echo $nama; ?>
                        </p>

                        <p class="card-text">
                            <strong>Prodi:</strong>
                            <?php echo $prodi; ?>
                        </p>

                        <p class="card-text">
                            <strong>NIM:</strong>
                            <?php echo $nim; ?>
                        </p>

                        <div class="text-center mt-4">
                            <button class="btn btn-primary">
                                Mahasiswa Aktif
                            </button>
                        </div>

                    </div>
                </div>

            </div>

        </div>

    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js">
    </script>

</body>

</html>