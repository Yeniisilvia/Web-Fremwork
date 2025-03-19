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

            <section class="topics-detail-section" id="topics-detail">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-8 col-12 m-auto">
                            <h2 class="text-center">Edit Karya</h2>

                            <!-- Form Edit Karya -->
                            <form action="<?= base_url('karya/update/'.$karya['id']) ?>" method="post" enctype="multipart/form-data">
                                <div class="mb-3">
                                    <label for="foto" class="form-label">Foto Karya</label>
                                    <input type="file" class="form-control" id="foto" name="foto">
                                    <img src="<?= base_url('uploads/karya/' . $karya['foto']) ?>" class="img-fluid mt-2" style="max-width: 200px;">
                                </div>
                                <div class="mb-3">
                                    <label for="nama_karya" class="form-label">Judul Karya</label>
                                    <input type="text" class="form-control" id="nama_karya" name="nama_karya" value="<?= esc($karya['nama_karya']) ?>" required>
                                </div>
                                <div class="mb-3">
                                    <label for="nama_pembuat" class="form-label">Nama Pembuat</label>
                                    <input type="text" class="form-control" id="nama_pembuat" name="nama_pembuat" value="<?= esc($karya['nama_pembuat']) ?>" required>
                                </div>
                                <div class="mb-3">
                                    <label for="tanggal_dibuat" class="form-label">Tanggal Dibuat</label>
                                    <input type="date" class="form-control" id="tanggal_dibuat" name="tanggal_dibuat" value="<?= esc($karya['tanggal_dibuat']) ?>" required>
                                </div>
                                <div class="mb-3">
                                    <label for="deskripsi" class="form-label">Deskripsi</label>
                                    <textarea class="form-control" id="deskripsi" name="deskripsi" rows="4" required><?= esc($karya['deskripsi']) ?></textarea>
                                </div>
                                
                                <button type="submit" class="btn btn-primary w-100">Simpan Perubahan</button>
                            </form>
                        </div>
                    </div>
                </div>
            </section>
        </main>
        <br><br>

        <!-- JAVASCRIPT FILES -->
        <script src="js/jquery.min.js"></script>
        <script src="js/bootstrap.bundle.min.js"></script>
        <script src="js/jquery.sticky.js"></script>
        <script src="js/custom.js"></script>
    </body>
</html>
