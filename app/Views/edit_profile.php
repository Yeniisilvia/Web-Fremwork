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
        
        <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

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


<!-- menu icon -->
<style>
    .menu {
            display: none;
            flex-direction: column;
            gap: 10px;
            position: absolute;
            top: 60px;
            right: 20px;
            background-color: #220000;
            padding: 10px;
            border-radius: 5px;
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.2);
        }
        .menu a {
            color: white;
            text-decoration: none;
            font-size: 16px;
            display: block;
            padding: 5px;
            cursor: pointer;
        }
        .menu a:hover {
            background-color: #444;
            border-radius: 3px;
        }

        /* MODAL STYLE */
        .modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            justify-content: center;
            align-items: center;
        }

        .modal-content {
            background-color: white;
            padding: 20px;
            border-radius: 10px;
            width: 350px;
            text-align: center;
        }

        .modal-content input {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: #d0e0e3;
        }

        .modal-content button {
            background-color: #1e50a2;
            color: white;
            padding: 10px;
            border: none;
            width: 100%;
            border-radius: 5px;
            cursor: pointer;
        }

        .modal-content button:hover {
            background-color: #0044cc;
        }

        .close {
            color: red;
            float: right;
            font-size: 24px;
            cursor: pointer;
        }

        .modal-content p {
            margin-top: 10px;
        }

        .modal-content a {
            color: blue;
            text-decoration: none;
            cursor: pointer;
        }
</style>
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
                        <div class="d-none d-lg-block">
                            <div class="user-container" style="display: flex; align-items: center;">
                                <span class="user-name"><?= session()->get('user_nama'); ?></span>
                                <a class="bi-person" 
                                onclick="toggleUser()" 
                                style="padding-left: 20px; font-size: 30px; transition: transform 0.3s, color 0.3s;" 
                                onmouseover="this.style.color='#007bff'; this.style.transform='scale(1.2)'" 
                                onmouseout="this.style.color='black'; this.style.transform='scale(1)'">
                                </a>
                            </div>
                        </div>


                        <!-- ini menu umum-->
                            <div class="menu" id="menu">
               
                            <a href="<?= base_url('/'); ?>">Beranda</a>
                            <a href="<?= base_url('/KaryaSiswa'); ?>">Karya Siswa</a>
                            <a href="<?= base_url('/JelajahKarya'); ?>">Jelajah Karya</a>
                            <!-- <a onclick="openLoginModal()" style="color: white;">Login</a> -->
                           
                        </div>   
                        

                        <!-- ini menu user -->
                        <div class="menu" id="user">
                            <?php if (session()->get('isLoggedIn')): ?>
                                <a href="<?= base_url('/DetailProfile'); ?>">Profile</a>
                                <a href="<?= base_url('/TambahKarya'); ?>">Tambah Karya</a>
                            <?php endif; ?>
                            
                            <!-- <a onclick="openLoginModal()" style="color: white;">Login</a> -->
                            <?php if (session()->get('isLoggedIn')): ?>
                                <a onclick="logout()" style="color: white;">Logout</a>
                            <?php else: ?>
                                <a onclick="openLoginModal()" style="color: white;">Login</a>
                            <?php endif; ?>
                        </div>       


                        </div>
                    </div>
                    <a class="bi-list" 
                    onclick="toggleMenu()" 
                    style="padding-left: 20px; font-size: 30px; transition: transform 0.3s, color 0.3s;" 
                    onmouseover="this.style.color='#007bff'; this.style.transform='scale(1.2)'" 
                    onmouseout="this.style.color='black'; this.style.transform='scale(1)'">
                    </a>

                </div>
            </nav>
            
            
            <header class="site-header d-flex flex-column justify-content-center align-items-center" style="height: 80px; padding: 20px 0;">
            
        
        </header>

<div class="container mt-5">
    <!-- Tambahkan ini di bawah container dan di atas form -->
    <?php if (session()->getFlashdata('success')) : ?>
        <div class="alert alert-success">
            <?= session()->getFlashdata('success') ?>
        </div>
    <?php endif; ?>

    <?php if (session()->getFlashdata('error')) : ?>
        <div class="alert alert-danger">
            <?= session()->getFlashdata('error') ?>
        </div>
    <?php endif; ?>

    <h2 class="text-center">Edit Profil</h2>
    <div class="row justify-content-center">
        <div class="col-md-6">
            <form id="updateProfileForm" action="<?= base_url('/Profile/update') ?>" method="post" enctype="multipart/form-data">
                <?= csrf_field(); ?>
                
                <!-- Foto -->
                <div class="mb-3">
                    <label for="foto" class="form-label">Foto Profile</label>
                    <input type="file" class="form-control" id="foto" name="foto">
                    <img src="<?= base_url('uploads/users/' . esc($user['user_foto'])) ?>" alt="Foto Profil" class="img-fluid rounded-circle mt-2" width="150">
                </div>

                <!-- Nama -->
                <div class="mb-3">
                    <label for="nama" class="form-label">Nama</label>
                    <input type="text" class="form-control" id="nama" name="nama" value="<?= esc($user['user_nama']) ?>" required>
                </div>

                <!-- Email -->
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email" value="<?= esc($user['user_email']) ?>" required>
                </div>

                <!-- Tempat Lahir -->
                <div class="mb-3">
                    <label for="tempat_lahir" class="form-label">Tempat Lahir</label>
                    <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir" value="<?= esc($user['user_tempat_lahir']) ?>" required>
                </div>

                <!-- Tanggal Lahir -->
                <div class="mb-3">
                    <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
                    <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" value="<?= esc($user['user_tanggal_lahir']) ?>" required>
                </div>

                <!-- Instagram -->
                <div class="mb-3">
                    <label for="instagram" class="form-label">Instagram</label>
                    <input type="text" class="form-control" id="instagram" name="instagram" value="<?= esc($user['user_instagram']) ?>">
                </div>

                <!-- Alamat -->
                <div class="mb-3">
                    <label for="alamat" class="form-label">Alamat</label>
                    <textarea class="form-control" id="alamat" name="alamat"><?= esc($user['user_alamat']) ?></textarea>
                </div>

                <!-- Keterampilan -->
                <div class="mb-3">
                    <label for="keterampilan" class="form-label">Keterampilan</label>
                    <textarea class="form-control" id="keterampilan" name="keterampilan"><?= esc($user['user_keterampilan']) ?></textarea>
                </div>

                <!-- Tentang -->
                <div class="mb-3">
                    <label for="tentang" class="form-label">Tentang</label>
                    <textarea class="form-control" id="tentang" name="tentang"><?= esc($user['user_tentang']) ?></textarea>
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


    
<script>
        function toggleMenu() {
            var menu = document.getElementById("menu");
            menu.style.display = (menu.style.display === "flex") ? "none" : "flex";
        }

        function toggleUser() {
            var menu = document.getElementById("user");
            menu.style.display = (menu.style.display === "flex") ? "none" : "flex";
        }

        function openLoginModal() {
            document.getElementById("loginModal").style.display = "flex";
            document.getElementById("loginForm").style.display = "block";
            document.getElementById("registerForm").style.display = "none";
            document.getElementById("modalTitle").innerText = "LOGIN";
        }

        function closeLoginModal() {
            document.getElementById("loginModal").style.display = "none";
        }

        function showRegisterMenu() {
            document.getElementById("loginForm").style.display = "none";
            document.getElementById("registerForm").style.display = "block";
            document.getElementById("modalTitle").innerText = "DAFTAR";
        }


        function logout() {
    fetch("<?= base_url('/logout') ?>")
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            alert(data.success);
            window.location.href = "<?= base_url('/') ?>";
        }
    });
}
    </script>

<script>
document.getElementById('updateProfileForm').addEventListener('submit', function(e) {
    e.preventDefault();
    
    let formData = new FormData(this);
    
    fetch('<?= base_url('Profile/update') ?>', {
        method: 'POST',
        body: formData,
        headers: {
            'X-Requested-With': 'XMLHttpRequest'
        }
    })
    .then(response => response.json())
    .then(data => {
        if(data.status === 'success') {
            Swal.fire({
                icon: 'success',
                title: 'Berhasil!',
                text: data.message,
                showConfirmButton: false,
                timer: 1500
            }).then(() => {
                window.location.href = '<?= base_url('/DetailProfile') ?>';
            });
        } else {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: data.message || 'Terjadi kesalahan saat memperbarui profil'
            });
        }
    })
    .catch(error => {
        console.error('Error:', error);
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Terjadi kesalahan pada server'
        });
    });
});
</script>

</html>
