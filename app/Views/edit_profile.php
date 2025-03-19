<!doctype html>
<html lang="id">
<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <meta name="description" content="">
        <meta name="author" content="">

        <title>Topic Detail Page</title>

        <!-- CSS FILES -->        
        <link rel="preconnect" href="https://fonts.googleapis.com">
        
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

        <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500;600;700&family=Open+Sans&display=swap" rel="stylesheet">
                        
        <link rel="preconnect" href="https://fonts.googleapis.com">
        
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

        <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500;600;700&family=Open+Sans&display=swap" rel="stylesheet">
                        
        <link  rel="stylesheet" href="<?= base_url('assets/css/bootstrap.min.css') ?>">

        <link  rel="stylesheet" href="<?= base_url('assets/css/bootstrap-icons.css') ?>">

        <link  rel="stylesheet" href="<?= base_url('assets/css/templatemo-topic-listing.css') ?>">      
        

        <script>
    document.addEventListener("DOMContentLoaded", function () {
        let navbar = document.querySelector(".navbar");

        if (!navbar) {
            console.error("Navbar element not found!");
            return;
        }

        window.addEventListener("scroll", function () {
            console.log("Scroll position:", window.scrollY); // Debugging
            if (window.scrollY > 50) {
                navbar.classList.add("scrolled");
            } else {
                navbar.classList.remove("scrolled");
            }
        });
    });
</script>
<!--

TemplateMo 590 topic listing

https://templatemo.com/tm-590-topic-listing

-->
    </head>
    
    <body id="top">

        <main>

            <nav class="navbar navbar-expand-lg">
                <div class="container">
                    <a class="navbar-brand" href="index.html">
                        <i class="bi-back"></i>
                        <span>Topic</span>
                    </a>

                    <div class="d-lg-none ms-auto me-4">
                        <a href="#top" class="navbar-icon bi-person smoothscroll"></a>
                    </div>
    
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
    
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav ms-lg-5 me-lg-auto">
                            <li class="nav-item">
                                <a class="nav-link click-scroll" href="javascript:history.back()">Kembali</a>
                            </li>
                        </ul>

                        <div class="d-none d-lg-block">
                            <a href="#top" class="navbar-icon bi-person smoothscroll"></a>
                        </div>
                    </div>
                </div>
            </nav>
            
            <header class="site-header d-flex flex-column justify-content-center align-items-center" style="height: 80px; padding: 20px 0;">
            
        
        </header>

<div class="container mt-5">
    <h2 class="text-center">Edit Profil</h2>
    <div class="row justify-content-center">
        <div class="col-md-6">
            <form action="<?= base_url('/Profile/update') ?>" method="post">
                <?= csrf_field(); ?>
                
                 <!-- Foto -->
                <div class="mb-3">
                                    <label for="foto" class="form-label">Foto Profile</label>
                                    <input type="file" class="form-control" id="foto" name="foto">
                                    <img src="<?= base_url('uploads/users/' . esc(session()->get('user_foto'))) ?>" alt="Foto Profil" class="img-fluid rounded-circle" width="150">
                                </div>

                <!-- Nama -->
                <div class="mb-3">
                    <label for="nama" class="form-label">Nama</label>
                    <input type="text" class="form-control" id="nama" name="nama" value="<?= session()->get('user_nama'); ?>" required>
                </div>
                

                <!-- Email -->
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email" value="<?= session()->get('user_email'); ?>" required>
                </div>

                <!-- Tempat Lahir -->
                <div class="mb-3">
                    <label for="tempat_lahir" class="form-label">Tempat Lahir</label>
                    <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir" value="<?= session()->get('user_tempat_lahir'); ?>" required>
                </div>

                <!-- Tanggal Lahir -->
                <div class="mb-3">
                    <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
                    <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" value="<?= session()->get('user_tanggal_lahir'); ?>" required>
                </div>

                <!-- Instagram -->
                <div class="mb-3">
                    <label for="instagram" class="form-label">Instagram</label>
                    <input type="text" class="form-control" id="instagram" name="instagram" value="<?= session()->get('user_instagram'); ?>">
                </div>

                <!-- Alamat -->
                <div class="mb-3">
                    <label for="alamat" class="form-label">Alamat</label>
                    <textarea class="form-control" id="alamat" name="alamat"><?= session()->get('user_alamat'); ?></textarea>
                </div>

                <!-- Keterampilan -->
                <div class="mb-3">
                    <label for="keterampilan" class="form-label">Keterampilan</label>
                    <textarea class="form-control" id="keterampilan" name="keterampilan"><?= session()->get('user_keterampilan'); ?></textarea>
                </div>

                <!-- Tentang -->
                <div class="mb-3">
                    <label for="tentang" class="form-label">Tentang</label>
                    <textarea class="form-control" id="tentang" name="tentang"><?= session()->get('user_tentang'); ?></textarea>
                </div>

                <!-- Tombol Submit -->
                <div class="text-center">
                    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                </div>
            </form>
        </div>
    </div>
</div>


        </main>
        <br><br>

        <!-- JAVASCRIPT FILES -->
        <script src="js/jquery.min.js"></script>
        <script src="js/bootstrap.bundle.min.js"></script>
        <script src="js/jquery.sticky.js"></script>
        <script src="js/custom.js"></script>
    </body>
</html>
