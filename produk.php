<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produk</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
</head>
<body>
    <!-- Navbar -->
    <?php include('navbar.php'); ?>

    <!-- Banner -->
    <div class="container mx-auto px-4 py-4">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <img alt="Banner 1" class="w-full h-auto" src="https://storage.googleapis.com/a1aa/image/cqQ3SD8yeWX3M6tjUfKDjtvDf2pdN6q6oyFjjBIaDnzYcNfPB.jpg"/>
            <img alt="Banner 2" class="w-full h-auto" src="https://storage.googleapis.com/a1aa/image/XxswKktthbJaBlOpsttEEba0PHM2FPaFm6TPfshTm8EIXzfTA.jpg"/>
        </div>
    </div>

    <!-- Main Content -->
    <div class="container mx-auto px-4 py-4 flex">

    <!-- Sidebar -->
    <aside class="w-1/4 bg-white p-4 shadow rounded">
    <h2 class="text-lg font-semibold mb-4">Filter</h2>
    
    <!-- Kategori -->
    <div class="mb-4">
        <h3 class="text-md font-semibold mb-2">Kategori</h3>
        <ul>
            <li><input class="mr-2" id="pakaian" type="checkbox"/><label for="pakaian">Pakaian</label></li>
            <li><input class="mr-2" id="tas" type="checkbox"/><label for="tas">Tas</label></li>
            <li><input class="mr-2" id="sepatu" type="checkbox"/><label for="sepatu">Sepatu</label></li>
            <li><input class="mr-2" id="aksesoris" type="checkbox"/><label for="aksesoris">Aksesoris</label></li>
            <li><input class="mr-2" id="elektronik" type="checkbox"/><label for="elektronik">Elektronik</label></li>
        </ul>
    </div>
    
    <!-- Lokasi -->
    <div class="mb-4">
        <h3 class="text-md font-semibold mb-2">Lokasi</h3>
        <ul>
            <li><input class="mr-2" id="jakarta" type="checkbox"/><label for="jakarta">Jakarta</label></li>
            <li><input class="mr-2" id="surabaya" type="checkbox"/><label for="surabaya">Surabaya</label></li>
            <li><input class="mr-2" id="bandung" type="checkbox"/><label for="bandung">Bandung</label></li>
            <li><input class="mr-2" id="yogyakarta" type="checkbox"/><label for="yogyakarta">Yogyakarta</label></li>
            <li><input class="mr-2" id="denpasar" type="checkbox"/><label for="denpasar">Denpasar</label></li>
        </ul>
    </div>
    </aside>


    <!-- Products -->
    <main class="w-3/4 bg-white p-4 shadow rounded ml-4">
        <h2 class="text-lg font-semibold mb-4">Home/Produk</h2>
          <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
              <div class="max-w-xs bg-white rounded-lg shadow-md overflow-hidden">
                  <img 
                       alt="Black t-shirt with Valkyrie design in pink" 
                        class="w-full h-40 object-cover" 
                        src="https://storage.googleapis.com/a1aa/image/rddgfo8aqrQRGS7qphCWFmPLV3D94Sre4oaWkYvuWtteBOfPB.jpg"
                      />
                  <div class="p-4">
                      <h2 class="text-gray-700 text-sm font-semibold">Ellipsesinc - Kaos Oversize Pria Wanita</h2>
                      <p class="text-gray-900 text-base font-bold mt-2">Rp. 120.000</p>
                      <div class="flex items-center mt-2 text-xs">
                          <span class="text-yellow-400"><i class="fas fa-star"></i></span>
                          <span class="text-gray-600 ml-1">5.2</span>
                          <span class="text-gray-500 ml-2">| Sisa 1</span>
                      </div>
                      <button class="mt-4 w-full bg-blue-600 text-white text-sm py-2 rounded-lg hover:bg-blue-700">Lihat Barang</button>
                  </div>
               </div>
          </div>
    </main>
    </div>

  <!-- Footer -->
  <?php include('footer.php'); ?>

</body>
</html>