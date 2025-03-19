<!DOCTYPE html> 
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portofolio SMK DKV</title>
    <link href="https://fonts.googleapis.com/css2?family=Hanuman:wght@400;700&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Hanuman', serif;
        }
        body {
            display: flex;
            flex-direction: column;
            min-height: 100vh;
            align-items: center;
            justify-content: center;
        }
        .header {
            width: 100%;
            background-color: #220000;
            color: white;
            padding: 15px 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .container {
            width: 90%;
            max-width: 900px;
            background-color: #0096A6;
            padding: 20px;
            border-radius: 10px;
            text-align: center;
        }
        h2 {
            margin-bottom: 20px;
        }
        .form-group {
            margin-bottom: 15px;
            text-align: left;
        }
        label {
            font-weight: bold;
            display: block;
        }
        input {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: #d0e0e3;
        }
        .social-media input {
            width: calc(100% - 10px);
            margin-bottom: 5px;
        }
        .image-placeholder {
            width: 200px;
            height: 150px;
            background-color: lightgray;
            margin: 0 auto 20px;
        }
        .footer {
            background-color: black;
            color: white;
            text-align: center;
            padding: 10px;
            font-size: 12px;
            margin-top: auto;
            width: 100%;
        }
        .gallery {
            display: flex;
            gap: 10px;
            justify-content: center;
            margin-top: 15px;
        }
        .gallery div {
            width: 100px;
            height: 100px;
            background-color: lightgray;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 24px;
            cursor: pointer;
        }
        .edit-buttons {
            display: flex;
            justify-content: center;
            gap: 10px;
            margin-top: 20px;
        }
        .edit-buttons button {
            padding: 10px 15px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }
        .edit-btn {
            background-color: #ffcc00;
        }
        .save-btn {
            background-color: #00cc66;
            display: none;
        }
    </style>
</head>
<body>
    <div class="header">
        <h2>Portofolio SMK DKV</h2>
    </div>
    <div class="container">
        <h2>Data Diri</h2>
        <div class="image-placeholder"></div>
        <div class="form-group">
            <label>Nama Lengkap</label>
            <input type="text" id="nama" placeholder="Masukkan Nama Lengkap" disabled>
        </div>
        <div class="form-group">
            <label>Tempat, Tanggal Lahir</label>
            <input type="text" id="ttl" placeholder="Masukkan Tempat, Tanggal Lahir" disabled>
        </div>
        <div class="form-group">
            <label>Keterampilan</label>
            <input type="text" id="keterampilan" placeholder="Masukkan Keterampilan" disabled>
        </div>
        <div class="form-group">
            <label>Tentang</label>
            <input type="text" id="tentang" placeholder="Masukkan Tentang Anda" disabled>
        </div>
        <div class="form-group social-media">
            <label>Akun Sosial Media</label>
            <input type="text" id="instagram" placeholder="Masukkan Link Instagram Anda" disabled>
            <input type="text" id="facebook" placeholder="Masukkan Link Facebook Anda" disabled>
        </div>
        <div class="form-group">
            <label>Karya Anda</label>
            <div class="gallery">
                <div>+</div>
                <div></div>
            </div>
        </div>
        <div class="edit-buttons">
            <button class="edit-btn" onclick="editMode()">✏️ Edit</button>
            <button class="save-btn" onclick="saveMode()">✅ Selesai</button>
        </div>
    </div>
    <div class="footer">&copy; 2025 Portofolio SMK DKV | Semua Hak Dilindungi</div>

    <script>
        function editMode() {
            let inputs = document.querySelectorAll('input');
            inputs.forEach(input => input.disabled = false);
            document.querySelector('.edit-btn').style.display = 'none';
            document.querySelector('.save-btn').style.display = 'inline-block';
        }

        function saveMode() {
            let inputs = document.querySelectorAll('input');
            inputs.forEach(input => input.disabled = true);
            document.querySelector('.edit-btn').style.display = 'inline-block';
            document.querySelector('.save-btn').style.display = 'none';
        }
    </script>
</body>
</html>
