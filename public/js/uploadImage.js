// Ganti dengan nama bucket Anda
const bucketName = 'frutyripe.appspot.com';

// Ganti dengan API key Anda (pastikan untuk melindungi API key di produksi)
const apiKey = 'AIzaSyDSAGAWLe2PHN5csfrqNyYGmaMm6AzfCuE';

// Ganti dengan nama folder yang diinginkan
const folderName = 'images';

// Fungsi untuk mengunggah gambar dengan nama unik ke dalam folder 'images'
function uploadImage() {
    const fileInput = document.getElementById('fileInput');
    const file = fileInput.files[0];

    if (file) {
        // Mendapatkan username dari data di elemen HTML
        const username = document.getElementById('username').dataset.username;

        // Generate a unique identifier (e.g., timestamp)
        const timestamp = Date.now();

        // Append the unique identifier and username to the original file name
        const uniqueFileName = `${folderName}/${username}_${timestamp}`;

        const formData = new FormData();
        formData.append('file', file, uniqueFileName);

        fetch(`https://storage.googleapis.com/upload/storage/v1/b/${bucketName}/o?uploadType=media&name=${uniqueFileName}&key=${apiKey}`, {
            method: 'POST',
            body: formData,
        })
        .then(response => response.json())
        .then(data => {
            console.log('Gambar berhasil diunggah!');
            // Reload the page after successful upload
            location.reload();
        })
        .catch(error => {
            console.error('Error:', error);
        });
    } else {
        console.error('Pilih gambar terlebih dahulu');
    }
}
