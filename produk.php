<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.tailwindcss.com">
    </script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/></body>
</head>
<body>
    <!-- navbar -->
    <?php include('navbar.php'); ?>

  <!-- Header -->
  <header class="bg-white shadow">
   <div class="container mx-auto px-4 py-4 flex justify-between items-center">
    <div class="flex items-center">
     <img alt="Bekas.id logo" class="h-10" height="50" src="https://storage.googleapis.com/a1aa/image/8m0nuBsdBd6aMdZGbvfZWEE5GptKzrNQv3QkhlDRg3SFXzfTA.jpg" width="150"/>
    </div>
    <div class="flex items-center space-x-4">
     <input class="border rounded px-4 py-2" placeholder="Search" type="text"/>
     <nav class="space-x-4">
      <a class="text-gray-700" href="#">
       Home
      </a>
      <a class="text-gray-700" href="#">
       Produk
      </a>
      <a class="text-gray-700" href="#">
       Promo
      </a>
      <a class="text-gray-700" href="#">
       Tentang Kami
      </a>
     </nav>
    </div>
   </div>
  </header>
  <!-- Banner -->
  <div class="container mx-auto px-4 py-4">
   <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
    <img alt="Banner 1" class="w-full h-auto" height="200" src="https://storage.googleapis.com/a1aa/image/cqQ3SD8yeWX3M6tjUfKDjtvDf2pdN6q6oyFjjBIaDnzYcNfPB.jpg" width="600"/>
    <img alt="Banner 2" class="w-full h-auto" height="200" src="https://storage.googleapis.com/a1aa/image/XxswKktthbJaBlOpsttEEba0PHM2FPaFm6TPfshTm8EIXzfTA.jpg" width="600"/>
   </div>
  </div>
  <!-- Main Content -->
  <div class="container mx-auto px-4 py-4 flex">
   <!-- Sidebar -->
   <aside class="w-1/4 bg-white p-4 shadow rounded">
    <h2 class="text-lg font-semibold mb-4">
     Filter
    </h2>
    <div class="mb-4">
     <h3 class="text-md font-semibold mb-2">
      Kategori
     </h3>
     <ul>
      <li>
       <input class="mr-2" id="pakaian" type="checkbox"/>
       <label for="pakaian">
        Pakaian
       </label>
      </li>
      <li>
       <input class="mr-2" id="tas" type="checkbox"/>
       <label for="tas">
        Tas
       </label>
      </li>
      <li>
       <input class="mr-2" id="sepatu" type="checkbox"/>
       <label for="sepatu">
        Sepatu
       </label>
      </li>
      <li>
       <input class="mr-2" id="aksesoris" type="checkbox"/>
       <label for="aksesoris">
        Aksesoris
       </label>
      </li>
      <li>
       <input class="mr-2" id="elektronik" type="checkbox"/>
       <label for="elektronik">
        Elektronik
       </label>
      </li>
     </ul>
    </div>
    <div>
     <h3 class="text-md font-semibold mb-2">
      Lokasi
     </h3>
     <ul>
      <li>
       <input class="mr-2" id="jakarta" type="checkbox"/>
       <label for="jakarta">
        Jakarta
       </label>
      </li>
      <li>
       <input class="mr-2" id="surabaya" type="checkbox"/>
       <label for="surabaya">
        Surabaya
       </label>
      </li>
      <li>
       <input class="mr-2" id="bandung" type="checkbox"/>
       <label for="bandung">
        Bandung
       </label>
      </li>
      <li>
       <input class="mr-2" id="yogyakarta" type="checkbox"/>
       <label for="yogyakarta">
        Yogyakarta
       </label>
      </li>
      <li>
       <input class="mr-2" id="denpasar" type="checkbox"/>
       <label for="denpasar">
        Denpasar
       </label>
      </li>
     </ul>
    </div>
   </aside>
   <!-- Products -->
   <main class="w-3/4 bg-white p-4 shadow rounded ml-4">
    <h2 class="text-lg font-semibold mb-4">
     Home/Produk
    </h2>
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
     <!-- Product Item -->
     <div class="border rounded p-4">
      <img alt="Product Image" class="w-full h-auto mb-4" height="150" src="https://storage.googleapis.com/a1aa/image/y55frtol1ISScSSABY9pfTfvhkpCIIlfML1ymBTh0eH3x18fE.jpg" width="150"/>
      <h3 class="text-md font-semibold mb-2">
       Product Name
      </h3>
      <p class="text-gray-600 mb-2">
       Rp 100.000
      </p>
      <button class="bg-blue-500 text-white px-4 py-2 rounded">
       Add to Cart
      </button>
     </div>
     <!-- Repeat Product Item -->
     <div class="border rounded p-4">
      <img alt="Product Image" class="w-full h-auto mb-4" height="150" src="https://storage.googleapis.com/a1aa/image/y55frtol1ISScSSABY9pfTfvhkpCIIlfML1ymBTh0eH3x18fE.jpg" width="150"/>
      <h3 class="text-md font-semibold mb-2">
       Product Name
      </h3>
      <p class="text-gray-600 mb-2">
       Rp 100.000
      </p>
      <button class="bg-blue-500 text-white px-4 py-2 rounded">
       Add to Cart
      </button>
     </div>
     <div class="border rounded p-4">
      <img alt="Product Image" class="w-full h-auto mb-4" height="150" src="https://storage.googleapis.com/a1aa/image/y55frtol1ISScSSABY9pfTfvhkpCIIlfML1ymBTh0eH3x18fE.jpg" width="150"/>
      <h3 class="text-md font-semibold mb-2">
       Product Name
      </h3>
      <p class="text-gray-600 mb-2">
       Rp 100.000
      </p>
      <button class="bg-blue-500 text-white px-4 py-2 rounded">
       Add to Cart
      </button>
     </div>
     <div class="border rounded p-4">
      <img alt="Product Image" class="w-full h-auto mb-4" height="150" src="https://storage.googleapis.com/a1aa/image/y55frtol1ISScSSABY9pfTfvhkpCIIlfML1ymBTh0eH3x18fE.jpg" width="150"/>
      <h3 class="text-md font-semibold mb-2">
       Product Name
      </h3>
      <p class="text-gray-600 mb-2">
       Rp 100.000
      </p>
      <button class="bg-blue-500 text-white px-4 py-2 rounded">
       Add to Cart
      </button>
     </div>
     <div class="border rounded p-4">
      <img alt="Product Image" class="w-full h-auto mb-4" height="150" src="https://storage.googleapis.com/a1aa/image/y55frtol1ISScSSABY9pfTfvhkpCIIlfML1ymBTh0eH3x18fE.jpg" width="150"/>
      <h3 class="text-md font-semibold mb-2">
       Product Name
      </h3>
      <p class="text-gray-600 mb-2">
       Rp 100.000
      </p>
      <button class="bg-blue-500 text-white px-4 py-2 rounded">
       Add to Cart
      </button>
     </div>
     <div class="border rounded p-4">
      <img alt="Product Image" class="w-full h-auto mb-4" height="150" src="https://storage.googleapis.com/a1aa/image/y55frtol1ISScSSABY9pfTfvhkpCIIlfML1ymBTh0eH3x18fE.jpg" width="150"/>
      <h3 class="text-md font-semibold mb-2">
       Product Name
      </h3>
      <p class="text-gray-600 mb-2">
       Rp 100.000
      </p>
      <button class="bg-blue-500 text-white px-4 py-2 rounded">
       Add to Cart
      </button>
     </div>
     <div class="border rounded p-4">
      <img alt="Product Image" class="w-full h-auto mb-4" height="150" src="https://storage.googleapis.com/a1aa/image/y55frtol1ISScSSABY9pfTfvhkpCIIlfML1ymBTh0eH3x18fE.jpg" width="150"/>
      <h3 class="text-md font-semibold mb-2">
       Product Name
      </h3>
      <p class="text-gray-600 mb-2">
       Rp 100.000
      </p>
      <button class="bg-blue-500 text-white px-4 py-2 rounded">
       Add to Cart
      </button>
     </div>
     <div class="border rounded p-4">
      <img alt="Product Image" class="w-full h-auto mb-4" height="150" src="https://storage.googleapis.com/a1aa/image/y55frtol1ISScSSABY9pfTfvhkpCIIlfML1ymBTh0eH3x18fE.jpg" width="150"/>
      <h3 class="text-md font-semibold mb-2">
       Product Name
      </h3>
      <p class="text-gray-600 mb-2">
       Rp 100.000
      </p>
      <button class="bg-blue-500 text-white px-4 py-2 rounded">
       Add to Cart
      </button>
     </div>
     <div class="border rounded p-4">
      <img alt="Product Image" class="w-full h-auto mb-4" height="150" src="https://storage.googleapis.com/a1aa/image/y55frtol1ISScSSABY9pfTfvhkpCIIlfML1ymBTh0eH3x18fE.jpg" width="150"/>
      <h3 class="text-md font-semibold mb-2">
       Product Name
      </h3>
      <p class="text-gray-600 mb-2">
       Rp 100.000
      </p>
      <button class="bg-blue-500 text-white px-4 py-2 rounded">
       Add to Cart
      </button>
     </div>
     <div class="border rounded p-4">
      <img alt="Product Image" class="w-full h-auto mb-4" height="150" src="https://storage.googleapis.com/a1aa/image/y55frtol1ISScSSABY9pfTfvhkpCIIlfML1ymBTh0eH3x18fE.jpg" width="150"/>
      <h3 class="text-md font-semibold mb-2">
       Product Name
      </h3>
      <p class="text-gray-600 mb-2">
       Rp 100.000
      </p>
      <button class="bg-blue-500 text-white px-4 py-2 rounded">
       Add to Cart
      </button>
     </div>
     <div class="border rounded p-4">
      <img alt="Product Image" class="w-full h-auto mb-4" height="150" src="https://storage.googleapis.com/a1aa/image/y55frtol1ISScSSABY9pfTfvhkpCIIlfML1ymBTh0eH3x18fE.jpg" width="150"/>
      <h3 class="text-md font-semibold mb-2">
       Product Name
      </h3>
      <p class="text-gray-600 mb-2">
       Rp 100.000
      </p>
      <button class="bg-blue-500 text-white px-4 py-2 rounded">
       Add to Cart
      </button>
     </div>
     <div class="border rounded p-4">
      <img alt="Product Image" class="w-full h-auto mb-4" height="150" src="https://storage.googleapis.com/a1aa/image/y55frtol1ISScSSABY9pfTfvhkpCIIlfML1ymBTh0eH3x18fE.jpg" width="150"/>
      <h3 class="text-md font-semibold mb-2">
       Product Name
      </h3>
      <p class="text-gray-600 mb-2">
       Rp 100.000
      </p>
      <button class="bg-blue-500 text-white px-4 py-2 rounded">
       Add to Cart
      </button>
     </div>
     <div class="border rounded p-4">
      <img alt="Product Image" class="w-full h-auto mb-4" height="150" src="https://storage.googleapis.com/a1aa/image/y55frtol1ISScSSABY9pfTfvhkpCIIlfML1ymBTh0eH3x18fE.jpg" width="150"/>
      <h3 class="text-md font-semibold mb-2">
       Product Name
      </h3>
      <p class="text-gray-600 mb-2">
       Rp 100.000
      </p>
      <button class="bg-blue-500 text-white px-4 py-2 rounded">
       Add to Cart
      </button>
     </div>
     <div class="border rounded p-4">
      <img alt="Product Image" class="w-full h-auto mb-4" height="150" src="https://storage.googleapis.com/a1aa/image/y55frtol1ISScSSABY9pfTfvhkpCIIlfML1ymBTh0eH3x18fE.jpg" width="150"/>
      <h3 class="text-md font-semibold mb-2">
       Product Name
      </h3>
      <p class="text-gray-600 mb-2">
       Rp 100.000
      </p>
      <button class="bg-blue-500 text-white px-4 py-2 rounded">
       Add to Cart
      </button>
     </div>
     <div class="border rounded p-4">
      <img alt="Product Image" class="w-full h-auto mb-4" height="150" src="https://storage.googleapis.com/a1aa/image/y55frtol1ISScSSABY9pfTfvhkpCIIlfML1ymBTh0eH3x18fE.jpg" width="150"/>
      <h3 class="text-md font-semibold mb-2">
       Product Name
      </h3>
      <p class="text-gray-600 mb-2">
       Rp 100.000
      </p>
      <button class="bg-blue-500 text-white px-4 py-2 rounded">
       Add to Cart
      </button>
     </div>
    </div>
   </main>
  </div>
  <!-- Footer -->
  <footer class="bg-gray-800 text-white py-4">
   <div class="container mx-auto px-4">
    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
     <div>
      <h3 class="text-lg font-semibold mb-2">
       Quick Links
      </h3>
      <ul>
       <li>
        <a class="text-gray-400" href="#">
         Home
        </a>
       </li>
       <li>
        <a class="text-gray-400" href="#">
         Produk
        </a>
       </li>
       <li>
        <a class="text-gray-400" href="#">
         Promo
        </a>
       </li>
       <li>
        <a class="text-gray-400" href="#">
         Tentang Kami
        </a>
       </li>
      </ul>
     </div>
     <div>
      <h3 class="text-lg font-semibold mb-2">
       Support
      </h3>
      <ul>
       <li>
        <a class="text-gray-400" href="#">
         Contact Us
        </a>
       </li>
       <li>
        <a class="text-gray-400" href="#">
         FAQ
        </a>
       </li>
       <li>
        <a class="text-gray-400" href="#">
         Terms &amp; Conditions
        </a>
       </li>
       <li>
        <a class="text-gray-400" href="#">
         Privacy Policy
        </a>
       </li>
      </ul>
     </div>
     <div>
      <h3 class="text-lg font-semibold mb-2">
       Contact Us
      </h3>
      <p class="text-gray-400">
       Email: support@bekas.id
      </p>
      <p class="text-gray-400">
       Phone: +62 123 4567 890
      </p>
      <p class="text-gray-400">
       Address: Jl. Example No. 123, Jakarta, Indonesia
      </p>
     </div>
    </div>
   </div>
  </footer>
</body>
</html>