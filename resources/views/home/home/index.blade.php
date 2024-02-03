<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Fofoto.Snap</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.6/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
  <style>
    /* CSS for pop-up card */
    .popup-card {
      background-color: rgba(255, 255, 255, 0.8);
      box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
      max-width: 400px;
      margin: 0 auto;
      padding: 20px;
      border-radius: 10px;
      position: fixed;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      z-index: 9999;
      display: none;
    }
    
    .popup-card.show {
      display: block;
    }

    .popup-card .close {
      position: absolute;
      top: 10px;
      right: 10px;
      font-size: 24px;
      opacity: 0.5;
      cursor: pointer;
    }
    
    /* CSS for container */
    .container {
      max-width: 960px;
      margin: 0 auto;
      padding: 0 15px;
    }
    
    /* Additional CSS for spacing */
    .py-5 {
      padding-top: 80px;
      padding-bottom: 80px;
    }
    
    /* CSS for video background */
    #video-background {
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      object-fit: cover;
      z-index: -1;
    }
    
    /* CSS for audio background */
    #audio-background {
      display: none;
    }
    
    /* CSS for page background */
    body {
      background-color: #000;
      font-family: 'Caligula', sans-serif;
    }

     /* CSS for pop-up card content */
     .popup-card h5.card-title {
      font-weight: bold;
     }

     #popupPrice {
      font-size: 24px;
      font-weight: bold;
      font-family: 'Caligula', sans-serif; /* Ganti dengan jenis font yang Anda inginkan */
      color: #ffca18; /* Ganti dengan warna yang Anda inginkan */
      margin-top: 10px;
      margin-bottom: 20px;
    }
  </style>
</head>
<body>
  <video id="video-background" autoplay muted loop>
    <source src="/bg/k.mp4" type="video/mp4">
  </video>
  <audio id="audio-background" autoplay loop>
    <source src="/bg/coba.mp3" type="audio/mp3">
  </audio>
  <main>
    <div class="album py-5">
      <div class="container">
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
          <?php foreach ($isikonten as $item): ?>
            <div class="col">
              <div class="card shadow-sm" onclick="showPopupCard('<?php echo $item->gambar; ?>', '<?php echo $item->judul; ?>', '<?php echo $item->harga; ?>', '<?php echo $item->deskripsi; ?>', '<?php echo $item->link; ?>')">
                <img src="<?php echo asset('img/' . $item->gambar); ?>" alt="Image">
              </div>
            </div>
          <?php endforeach; ?>
        </div>
      </div>
    </div>
    


    <div class="overlay"></div>
    <div class="popup-card">
      <button type="button" class="close btn btn-danger" aria-label="Close" onclick="hidePopupCard()">
        X
      </button>
      <h5 id="popupTitle" class="card-title"></h5>
      <p id="popupPrice" class="card-text"></p>
      <p id="popupDescription" class="card-text"></p>
      <div class="d-flex justify-content-between align-items-center">
        <div class="btn-group">
          <a id="popupLink" href="" class="w-100 btn btn-lg btn-primary"><i class="fas fa-shopping-cart"></i> Beli Sekarang</a>
        </div>
      </div>
    </div>
  </main>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.6/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/js/all.min.js"></script>
  <script>
    // Auto-play audio when the video is ready
    document.getElementById('video-background').addEventListener('canplay', function() {
      document.getElementById('audio-background').play();
    });

    // Show pop-up card with dynamic content
    function showPopupCard(image, title, price, description, link) {
      const overlay = document.querySelector('.overlay');
      const popupCard = document.querySelector('.popup-card');
      const popupTitle = document.getElementById('popupTitle');
      const popupPrice = document.getElementById('popupPrice');
      const popupDescription = document.getElementById('popupDescription');
      const popupLink = document.getElementById('popupLink');

      popupTitle.textContent = title;
      popupPrice.textContent = 'Rp ' + formatCurrency(parseInt(price));
      popupDescription.textContent = description;
      popupLink.href = link;

      overlay.classList.add('show');
      popupCard.classList.add('show');
    }

    // Hide pop-up card
    function hidePopupCard() {
      const overlay = document.querySelector('.overlay');
      const popupCard = document.querySelector('.popup-card');

      overlay.classList.remove('show');
      popupCard.classList.remove('show');
    }

    // Format currency by removing decimal places and adding thousand separators
    function formatCurrency(amount) {
      return amount.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
    }
  </script>
</body>
</html>
