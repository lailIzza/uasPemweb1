const products = [
    {
        name: "Sepatu Wanita",
        image: "c:\Users\LENOVO\Downloads\Gambar Sepatu Cewek.jpg/100" // Gambar placeholder
    },
    {
        name: "Tas Pria",
        image: "https://via.placeholder.com/100" // Gambar placeholder
    },
    {
        name: "Kemeja Lengan Panjang",
        image: "https://via.placeholder.com/100" // Gambar placeholder
    },
    {
        name: "Jam Tangan Pria",
        image: "https://via.placeholder.com/100" // Gambar placeholder
    },
    {
        name: "Kacamata Hitam",
        image: "https://via.placeholder.com/100" // Gambar placeholder
    },
    {
        name: "Baju Tidur Wanita",
        image: "https://via.placeholder.com/100" // Gambar placeholder
    },
    {
        name: "Sepatu Cowok",
        image: "https://via.placeholder.com/100" // Gambar placeholder
    },
    {
        name: "Koper Perjalanan",
        image: "https://via.placeholder.com/100" // Gambar placeholder
    }
];

document.getElementById('searchButton').addEventListener('click', function() {
    const input = document.getElementById('searchInput').value.toLowerCase();
    const results = products.filter(product => product.name.toLowerCase().includes(input));
    displayResults(results);
});

function displayResults(results) {
    const resultsContainer = document.getElementById('searchResults');
    resultsContainer.innerHTML = ''; // Clear previous results

    if (results.length === 0) {
        resultsContainer.innerHTML = '<li>Tidak ada produk ditemukan.</li>';
        return;
    }

    results.forEach(product => {
        const li = document.createElement('li');
        
        // Buat elemen gambar
        const img = document.createElement('img');
        img.src = product.image; // Set URL gambar
        img.alt = product.name; // Set teks alternatif untuk gambar
        img.style.width = '100px'; // Set lebar gambar
        img.style.height = 'auto'; // Pertahankan rasio aspek

        // Tambahkan gambar dan nama produk ke dalam item daftar
        li.appendChild(img);
        li.appendChild(document.createTextNode(product.name));
        resultsContainer.appendChild(li);
    });
}