<html lang="en">
 <head>
  <meta charset="utf-8"/>
  <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
  <title>
   Akun Anda
  </title>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
  <style>
   body {
            margin: 0;
            font-family: Arial, sans-serif;
            background-color: #1a1a1a;
            color: #fff;
        }
        .container {
            display: flex;
            height: 100vh;
        }
        .sidebar {
            width: 250px;
            background-color: #2c2c2c;
            padding: 20px;
            box-sizing: border-box;
        }
        .sidebar img {
            width: 50px;
            height: 50px;
            border-radius: 50%;
        }
        .sidebar h2 {
            font-size: 18px;
            margin: 10px 0;
        }
        .sidebar p {
            font-size: 14px;
            color: #ccc;
        }
        .sidebar ul {
            list-style: none;
            padding: 0;
        }
        .sidebar ul li {
            margin: 20px 0;
        }
        .sidebar ul li a {
            text-decoration: none;
            color: #ccc;
            display: flex;
            align-items: center;
        }
        .sidebar ul li a i {
            margin-right: 10px;
        }
        .sidebar ul li a.active {
            color: #9b59b6;
        }
        .content {
            flex: 1;
            padding: 20px;
            box-sizing: border-box;
            overflow-y: auto;
        }
        .content h1 {
            font-size: 24px;
            margin-bottom: 20px;
        }
        .profile-section {
            background-color: #2c2c2c;
            padding: 20px;
            border-radius: 10px;
            margin-bottom: 20px;
        }
        .profile-section img {
            width: 100px;
            height: 100px;
            border-radius: 50%;
        }
        .profile-section h2 {
            font-size: 18px;
            margin: 10px 0;
        }
        .profile-section p {
            font-size: 14px;
            color: #ccc;
        }
        .profile-section button {
            background-color: #444;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
        }
        .profile-section button:hover {
            background-color: #555;
        }
        .form-group {
            margin-bottom: 20px;
        }
        .form-group label {
            display: block;
            margin-bottom: 5px;
        }
        .form-group input, .form-group select {
            width: 100%;
            padding: 10px;
            border: 1px solid #444;
            border-radius: 5px;
            background-color: #333;
            color: #fff;
        }
        .form-group input:focus, .form-group select:focus {
            outline: none;
            border-color: #555;
        }
  </style>
 </head>
 <body>
  <div class="container">
   <div class="sidebar">
    <img alt="Profile picture" height="50" src="https://storage.googleapis.com/a1aa/image/E2l35ly4ISoWCRmU8aI8tT6ObfetyZNZHQh0RVMekGfPTMsPB.jpg" width="50"/>
    <h2>
     Laila
    </h2>
    <p>
     laila.izzah03@gmail.com
    </p>
    <ul>
     <li>
      <a class="active" href="#">
       <i class="fas fa-user">
       </i>
       Akun Anda
      </a>
     </li>
     <li>
      <a href="#">
       <i class="fas fa-lock">
       </i>
       Masuk &amp; keamanan
      </a>
     </li>
     <li>
      <a href="#">
       <i class="fas fa-envelope">
       </i>
       Preferensi pesan
      </a>
     </li>
     <li>
      <a href="#">
       <i class="fas fa-shield-alt">
       </i>
       Pengaturan privasi
      </a>
     </li>
     <li>
      <a href="#">
       <i class="fas fa-users">
       </i>
       Anggota
      </a>
     </li>
     <li>
      <a href="#">
       <i class="fas fa-credit-card">
       </i>
       Penagihan &amp; paket
      </a>
     </li>
     <li>
      <a href="#">
       <i class="fas fa-history">
       </i>
       Riwayat pembelian
      </a>
     </li>
     <li>
      <a href="#">
       <i class="fas fa-globe">
       </i>
       Domain
      </a>
     </li>
    </ul>
   </div>
   <div class="content">
    <h1>
     Akun Anda
    </h1>
    <div class="profile-section">
     <img alt="Profile picture" height="100" src="https://storage.googleapis.com/a1aa/image/E2l35ly4ISoWCRmU8aI8tT6ObfetyZNZHQh0RVMekGfPTMsPB.jpg" width="100"/>
     <h2>
      Foto profil
     </h2>
     <button>
      Hapus foto
     </button>
     <button>
      Ubah foto
     </button>
    </div>
    <div class="profile-section">
     <h2>
      Nama
     </h2>
     <p>
      Laila
     </p>
     <button>
      Edit
     </button>
    </div>
    <div class="profile-section">
     <h2>
      Alamat email
     </h2>
     <p>
      laila.izzah03@gmail.com
     </p>
     <button>
      Edit
     </button>
    </div>
    <div class="profile-section">
     <h2>
      Apa tujuan Anda menggunakan Canva?
     </h2>
     <div class="form-group">
      <select>
       <option>
        Pelajar
       </option>
      </select>
     </div>
     <p>
      Kami menyesuaikan pengalaman Anda agar sesuai
     </p>
    </div>
   </div>
  </div>
 </body>
</html>
