<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <meta name="description" content="">
        <meta name="author" content="">

        <title>Topic Listing Bootstrap 5 Template</title>

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
            

            <section class="hero-section d-flex justify-content-center align-items-center" style="height: 200px; padding: 20px 0;">
                
            </section>


            <section class="featured-section py-5">
    <div class="container">
        <div class="row justify-content-center g-4">
            
            <!-- Card Informasi Pribadi -->
            <div class="col-lg-5 col-md-6 col-12">
                <div class="custom-block bg-white shadow-lg p-4 h-100 rounded-4">
                    <h5 class="mb-2" style="font-family: Arial, sans-serif; font-weight: 600; font-size: 1.3rem;">
                        <?= $user['nama']; ?>
                    </h5>
                    <p style="font-family: Arial, sans-serif; font-size: 1rem;">
                       <?= $user['email']; ?>
                    </p>
                    <p style="font-family: Arial, sans-serif; font-size: 1rem;">
                        <?= $user['tempat_lahir']; ?>, <?= $user['tanggal_lahir']; ?>
                    </p>
                    <p style="font-family: Arial, sans-serif; font-size: 1rem;">
                       <?= $user['alamat']; ?>
                    </p>
                    <p style="font-family: Arial, sans-serif; font-size: 1rem;">
                        <?= $user['keterampilan']; ?>
                    </p>
                </div>
            </div>

            <!-- Card Foto & Sosial Media -->
            <div class="col-lg-5 col-md-6 col-12 d-flex justify-content-center">
                <div class="custom-block bg-white shadow-lg p-4 rounded-4 w-100 text-center">
                <img src="/uploads/profile_pictures/<?= $user['foto'] ?>" 
                alt="Foto Profil"
                class="img-fluid"
                style="width: 240px; height: 300px; object-fit: cover; object-position: top; border-radius: 12px; border: 4px solid #eee; background-color: #fff;">

                    <div class="social-share d-flex justify-content-center mt-3">
                        <ul class="social-icon d-flex gap-2 list-unstyled mb-0">
                            <li class="social-icon-item">
                                <a href="#" class="social-icon-link bi-instagram" target="_blank" rel="noopener noreferrer"></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Card Tentang Siswa -->
            <div class="col-lg-10 col-md-12 col-12 text-center">
                <div class="custom-block bg-white shadow-lg p-4 rounded-4 mt-3">
                    <h5 style="font-family: Arial, sans-serif; font-weight: 600; font-size: 1.3rem;">
                        Tentang Siswa
                    </h5>
                    <p style="font-family: Arial, sans-serif; font-size: 1rem;">
                    <p style="font-family: Arial, sans-serif; font-size: 1rem;">
                    <?= $user['tentang']; ?>
                    
<!-- Tombol Edit -->
<div class="mt-3">
                        <a href="<?= base_url('/EditProfile'); ?>" class="btn btn-warning px-4">Edit</a>
                    </div>

                </div>
            </div>

        </div>
    </div>
</section>



            <br>
            <section class="explore-section">
                <div class="container">
                    <div class="row">

                        <div class="col-12 text-center">
                            <h2 class="mb-4">Karya Ku</h1>
                        </div>

                    </div>
                </div>


                
<div class="row row-cols-1 row-cols-md-2 g-3 p-3">
    <?php if (!empty($karya)) : ?>
        <?php foreach ($karya as $item) : ?>
            <div class="col">
                <div class="custom-block custom-block-topics-listing bg-white shadow-lg p-3 rounded">
                    <div class="d-flex">
                        <img src="<?= base_url('uploads/karya/' . $item['foto']) ?>" class="custom-block-image img-fluid" alt="<?= esc($item['nama_karya']) ?>" style="width: 150px; height: 150px; object-fit: cover;">

                        <div class="custom-block-topics-listing-info d-flex flex-column ps-3">
                            <p class="mb-2"><strong>Oleh:</strong> <?= esc($item['nama_pembuat']) ?></p>
                            <h5 class="mb-2"><?= esc($item['nama_karya']) ?></h5>
                            <p class="mb-1"><strong>Dibuat:</strong> <?= esc($item['tanggal_dibuat']) ?></p>
                            <p class="mb-0"><?= (strlen($item['deskripsi']) > 50) ? esc(substr($item['deskripsi'], 0, 50)) . '...' : esc($item['deskripsi']) ?></p>
                            <a href="<?= base_url('DetailKarya/' . $item['id']) ?>" class="btn custom-btn mt-3">Lihat Detail</a>
                            <br>
                            <div class="row g-2">
    <div class="col-12 col-md-6">
        <a href="<?= base_url('EditKarya/' . $item['id']) ?>" class="btn btn-warning w-100">Edit</a>
    </div>
    <div class="col-12 col-md-6">
        <form action="<?= base_url('karya/delete/' . $item['id']) ?>" method="post" onsubmit="return confirm('Apakah Anda yakin ingin menghapus karya ini?');">
            <button type="submit" class="btn btn-danger w-100">Hapus</button>
        </form>
    </div>
</div>


                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    <?php else : ?>
        <p class="text-center">Belum ada karya yang ditambahkan.</p>
    <?php endif; ?>
</div>


            </section>        
        </main>



        <!-- MODAL LOGIN & REGISTER -->
        <div id="loginModal" class="modal">
    <div class="modal-content">
        <span class="close" onclick="closeLoginModal()">&times;</span>
        <h2 id="modalTitle">LOGIN</h2>
        <div id="loginForm">
            <label>Email</label>
            <input type="email" id="loginEmail" placeholder="Masukkan Email Anda">
            <label>Password</label>
            <input type="password" id="loginPassword" placeholder="Masukkan Password Anda">
            <button onclick="login()">Login</button>
            <p>Belum punya akun? <a onclick="showRegisterMenu()">Daftar</a></p>
        </div>
        <div id="registerForm" style="display: none;">
            <label>Nama Lengkap</label>
            <input type="text" id="registerNama" placeholder="Masukkan Nama Lengkap">
            <label>Email</label>
            <input type="email" id="registerEmail" placeholder="Masukkan Email Anda">
            <label>Password</label>
            <input type="password" id="registerPassword" placeholder="Masukkan Password Anda">
            <label>Konfirmasi Password</label>
            <input type="password" id="registerConfirmPassword" placeholder="Konfirmasi Password Anda">
            <div style="display: flex; gap: 10px;">
    <div style="flex: 1;">
        <label>Tempat Lahir</label>
        <input type="text" id="registerTempatLahir" placeholder="Tempat Lahir Anda" style="width: 100%; padding: 8px;">
    </div>
    <div style="flex: 1;">
        <label>Tanggal Lahir</label>
        <input type="date" id="registerTanggalLahir" style="width: 100%; padding: 8px;">
    </div>
</div>

            <button onclick="register()">Daftar</button>
        </div>
    </div>
</div>


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
    </script>

<script>
function login() {
    let email = document.getElementById("loginEmail").value;
    let password = document.getElementById("loginPassword").value;

    fetch("<?= base_url('/login') ?>", {
        method: "POST",
        headers: { "Content-Type": "application/json" },
        body: JSON.stringify({ email: email, password: password })
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            alert(data.success);
            window.location.reload();
        } else {
            alert(data.error);
        }
    });
}

function register() {
    let nama = document.getElementById("registerNama").value;
    let email = document.getElementById("registerEmail").value;
    let password = document.getElementById("registerPassword").value;
    let confirmPassword = document.getElementById("registerConfirmPassword").value;
    let tempatLahir = document.getElementById("registerTempatLahir").value;
    let tanggalLahir = document.getElementById("registerTanggalLahir").value;

    fetch("<?= base_url('/register') ?>", {
        method: "POST",
        headers: { "Content-Type": "application/json" },
        body: JSON.stringify({ nama: nama, email: email, password: password, confirm_password: confirmPassword, tempat_lahir: tempatLahir,tanggal_lahir:tanggalLahir })
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            alert(data.success);
            window.location.reload();
        } else {
            alert(Object.values(data.error).join("\n"));
        }
    });
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


        <!-- JAVASCRIPT FILES -->
        <script src="js/jquery.min.js"></script>
        <script src="js/bootstrap.bundle.min.js"></script>
        <script src="js/jquery.sticky.js"></script>
        <script src="js/click-scroll.js"></script>
        <script src="js/custom.js"></script>

    </body>
</html>
