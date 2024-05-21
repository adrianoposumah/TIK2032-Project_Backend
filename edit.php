<?php
require 'koneksi.php';

$userprofile = query("SELECT * FROM `profile`"); 
$blogdata = query("SELECT * FROM blog");
$gallerydata = query("SELECT * FROM gallery");
$total_images = count($gallerydata);
$rows = 3;
$items_per_row = ceil($total_images / $rows);
$photo_rows = array_chunk($gallerydata, $items_per_row);

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>TIK2032-Project Adriano Posumah</title>
    <link rel="shortcut icon" type="x-icon" href="image/icon.png" />
    <!-- Font Style -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet" />
    <!-- Style -->
    <link rel="stylesheet" href="style.css" />
    <link rel="stylesheet" href="style2.css" />

    <!-- Icon -->
    <script src="https://kit.fontawesome.com/bfff52efaa.js" crossorigin="anonymous"></script>
    <style>
      .edit-button {
          text-align: center;
          margin: 10px 0;
      }
      .edit-button button {
          background-color: var(--primary);
          padding: 5px 10px;
          border-radius: 3px;
          color: #ffffff;
          cursor: pointer;
          border: none;
      }
      .modal {
          position: fixed;
          left: 0;
          top: 0;
          width: 100%;
          height: 100%;
          overflow: auto;
          background: rgba(0, 0, 0, 0.4);
          z-index: 3000;
          display: none;
      }
      .modal.show {
          opacity: 1;
          display: block;
      }
      .modal-content {
          border-radius: 10px;
          position: relative;
          background-color: #ffebb7;
          margin: 100px auto;
          padding: 0;
          width: 700px;
          max-width: 85%;
          animation: open 0.5s ease;
      }
      @keyframes open {
          from {
              transform: scale(0);
              opacity: 0;
          }
          to {
              transform: scale(1);
              opacity: 1;
          }
      }
      .modal-header {
          padding: 2px 16px;
          background-color: #eeb777;
          color: #fff;
          display: flex;
          border-top-left-radius: 8px;
          border-top-right-radius: 8px;
          justify-content: space-between;
          align-items: center;
      }
      .modal-header h2 {
          font-size: 25px;
          margin: 10px 0;
      }
      .modal-cls-btn {
          color: #fff;
          font-size: 30px;
          font-weight: bold;
          cursor: pointer;
      }
      .modal-body {
          padding: 2px 16px;
      }
      .modal-body form {
          margin: 2% 0;
          display: grid;
      }
      .modal-body textarea {
          resize: none;
          height: 300px;
          font-family: "Poppins", sans-serif;
          padding: 10px;
          border-radius: 5px;
          border: 1px solid #ccc;
      }

      .modal-body input {
        padding: 5px;
        border-radius: 3px;
        font-size: 15px;
        font-family: "Poppins", sans-serif;
      }
      .modal-sve-btn {
          color: #fff;
          font-weight: bold;
          background-color: #eeb777;
          padding: 8px 16px;
          border-radius: 5px;
          cursor: pointer;
          margin: 10px auto;
          display: block;
          border: none;
      }
      </style>

  </head>
  <body>
    <div class="head-nav">
      <div class="logo">Adriano <span>Posumah</span></div>
      <div class="header-button">
        <div onclick="toggleColor()" class="theme">
          <div class="darkmode theme-non-active">
            <i class="fa-solid fa-moon"></i>
          </div>
          <div class="lightmode">
            <i class="fa-solid fa-sun"></i>
          </div>
        </div>
        <div onclick="toggleNav()" class="nav-bars">
          <i class="fa-solid fa-bars"></i>
        </div>
      </div>
    </div>
    <div class="container">
      <!-- Profile Section -->
      <div class="profile">
        <div class="profile-wrap">
            <div class="profile-photo">
                <img src="image/avatar.jpg" alt="avatar" width="240" height="240" />
            </div>  
                <h4 class="profile-name">
                    <a href="#"><?= $userprofile[0]["profile_name"] ?></a>
                </h4>
                <span class="profile-title"><?= $userprofile[0]["title"] ?></span>
            <ul class="profile-social">
                <li>
                    <a href="https://www.facebook.com" style="color: #347bff">
                        <i class="fa-brands fa-facebook-f"></i>
                    </a>
                </li>
                <li>
                    <a href="https://www.instagram.com" style="color: #ff7575">
                        <i class="fa-brands fa-instagram"></i>
                    </a>
                </li>
                <li>
                    <a href="https://www.instagram.com" style="color: #0d1117">
                        <i class="fa-brands fa-github"></i>
                    </a>
                </li>
            <!-- <li>
              <a href="#">
                <i class="fa-brands fa-linkedin"></i>
              </a>
            </li> -->
          </ul>
          <div class="profile-contact">
            <div class="profile-contact-item">
              <div class="icon" style="color: #ff8d8d; font-size: 22px">
                <i class="fa-solid fa-mobile-screen"></i>
              </div>
              <div class="text">
                <span>Phone</span>
                <p><?= $userprofile[0]["phone"] ?></p>
              </div>
            </div>
            <div class="profile-contact-item">
              <div class="icon" style="color: #ffc48d; font-size: 22px">
                <i class="fa-regular fa-envelope"></i>
              </div>
              <div class="text">
                <span>Email</span>
                <p><?= $userprofile[0]["email"] ?></p>
              </div>
            </div>
            <div class="profile-contact-item">
              <div class="icon" style="color: #8db5ff; font-size: 22px">
                <i class="fa-solid fa-location-dot"></i>
              </div>
              <div class="text">
                <span>Location</span>
                <p><?= $userprofile[0]["location"] ?></p>
              </div>
            </div>
          </div>
          <div class="edit-button">
              <button id="modal-btn-profile">Edit</button>
          </div>
        </div>
      </div>
      <div id="modal-profile" class="modal">
        <div class="modal-content">
            <div class="modal-header">
                <h2>Edit Profile</h2>
                <span class="modal-cls-btn">&times;</span>
            </div>
            <div class="modal-body">
                <form action="update_profile.php" method="POST">
                    <label for="profile-name">Nama :</label>
                    <input type="text" name="profile_name" id="profile-name" value="<?= $userprofile[0]["profile_name"] ?>">
                    <label for="title">Title :</label>
                    <input type="text" name="title" id="title" value="<?= $userprofile[0]["title"] ?>">
                    <label for="phone">Phone :</label>
                    <input type="text" name="phone" id="phone" value="<?= $userprofile[0]["phone"] ?>">
                    <label for="email">Email :</label>
                    <input type="email" name="email" id="email" value="<?= $userprofile[0]["email"] ?>">
                    <label for="location">Location :</label>
                    <input type="text" name="location" id="location" value="<?= $userprofile[0]["location"] ?>">
                    <button type="submit" class="modal-sve-btn">SAVE</button>
                </form>
            </div>
        </div>
      </div>
      <!-- Page Content -->
      <div class="page-content">
        <!-- Home Section -->
        <div class="page-content-item home" id="home">
          <div class="content">
            <div class="page-title-wrap">
              <h2 class="page-title">Home</h2>
            </div>
            <div class="Description">
              <h3>Halo, Selamat Datang</h3>
             <?php
              $description = nl2br($userprofile[0]["description"]); // Mengubah newline menjadi <br>
              $description = str_replace('<br><br>', '</p><p>', $description); // Mengubah dua <br> menjadi </p><p>
              echo '<p>' . $description . '</p>';
              ?>
              <!-- <h3 style="margin-top: 15px">Keahlian Saya</h3> -->
            </div>
            <!-- Carousel -->
            <div class="edit-button">
              <button id="modal-btn-description">Edit</button>
            </div>
          </div>       
        </div>
        <div id="modal-description" class="modal">
          <div class="modal-content">
            <div class="modal-header">
              <h2>Edit Description</h2>
              <span class="modal-cls-btn">&times;</span>
            </div>
            <div class="modal-body">
              <form action="update.php" method="POST">
                <label for="description">Description:</label>
                <textarea name="description" id="description"><?= $userprofile[0]["description"] ?></textarea>
                <button type="submit" class="modal-sve-btn">SAVE</button>
              </form>
            </div>
          </div>
        </div>
        <!-- Gallery Section -->
        <div class="page-content-item gallery" id="gallery">
          <div class="content">
            <div class="page-title-wrap">
              <h2 class="page-title">Gallery</h2>
            </div>
            <div class="photo-grid">
              <?php foreach ($photo_rows as $row) : ?>
                  <div class="photo-row">
                      <?php foreach ($row as $photo) : ?>
                          <div class="gallery-item">
                              <img class="gallery-photo" src="image/<?= $photo["photo_name"] ?>" alt="" />
                          </div>
                      <?php endforeach; ?>
                  </div>
              <?php endforeach; ?>
          </div>
          <div class="edit-button">
              <button id="modal-btn-gallery">Edit</button>
          </div>
          </div>
        </div>
        <div id="modal-gallery" class="modal">
            <div class="modal-content">
                <div class="modal-header">
                    <h2>Edit Gallery</h2>
                    <span class="modal-cls-btn">&times;</span>
                </div>
                <div class="modal-body">
                    <table>
                      <tr>
                        <th>No.</th>
                        <th>Gambar</th>
                        <th>Nama File</th>
                        <th>Aksi</th>
                      </tr>
                      <?php $i = 1 ?>
                      <?php foreach( $gallerydata as $gallery) : ?>
                      <tr>
                        <td><?= $i; ?></td>
                        <td><img src="image/<?= $gallery["photo_name"] ?>" alt="" height="100px"></td>
                        <td><?= $gallery["photo_name"] ?></td>
                        <td>Hapus</td>
                      </tr>
                      <?php $i++; ?>
                      <?php endforeach; ?>
                    </table>
                </div>
            </div>
        </div>
        <!-- Blog Section -->
        <div class="page-content-item blog" id="blog">
          <div class="content">
            <div class="page-title-wrap">
              <h2 class="page-title">Blog</h2>
            </div>
            <div class="blog-content">
              <?php foreach( $blogdata as $blog ) : ?>
              <div class="blog-post">
                <div class="blog-img">
                  <img src="image/<?= $blog["blog_img"] ?>" alt="" />
                </div>
                <div class="blog-text">
                  <span><?= $blog["blog_date"] ?> · <?= $blog["blog_category"] ?></span>
                  <a href="<?= $blog["blog_link"] ?>" class="blog-title"><?= $blog["blog_title"] ?></a>
                  <p>
                  <?= $blog["blog_description"] ?>    
                </p>
                  <span>Sumber : <?= $blog["blog_source"] ?></span>
                </div>
              </div>
              <?php endforeach; ?>
            </div>
            <div class="edit-button">
                <button id="modal-btn-blog">Edit</button>
            </div>
          </div>
        </div>
        <div id="modal-blog" class="modal">
              <div class="modal-content">
                  <div class="modal-header">
                      <h2>Edit Blog</h2>
                      <span class="modal-cls-btn">&times;</span>
                  </div>
                  <div class="modal-body">
                      <form action="update_blog.php" method="POST">
                          <!-- Tambahkan field form untuk blog di sini -->
                          <button type="submit" class="modal-sve-btn">SAVE</button>
                      </form>
                  </div>
              </div>
          </div>
        <!-- Contact Section -->
        <div class="page-content-item contact" id="contact">
          <div class="content">
            <div class="page-title-wrap">
              <h2 class="page-title">Contact</h2>
            </div>
            <div class="contact-area">
              <h4 class="contact-text">Hubungi Saya</h4>
              <form action="" class="contact-form">
                <div class="form-input-item">
                  <label for="" class="input-label">name *</label>
                  <input type="text" required class="input-box" />
                </div>
                <div class="form-input-item">
                  <label for="" class="input-label">Email *</label>
                  <input type="email" required class="input-box" />
                </div>
                <div class="form-input-item">
                  <label for="" class="input-label">Message *</label>
                  <textarea name="" class="input-box" id="" cols="30" rows="10"></textarea>
                </div>
                <div class="form-btn-wrap">
                  <button type="submit" class="form-btn">submit</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>

      <!-- Navbar Section -->
      <div class="navbar-wrap">
        <nav class="navbar nav-active">
          <div class="navbar-nav">
            <div class="navlist">
              <a href="#home" class="homebutton navbutton">
                <div class="nav-icon">
                  <i class="fa-solid fa-house"></i>
                </div>
                <h4>HOME</h4>
              </a>
              <a href="#gallery" class="gallerybutton navbutton">
                <div class="nav-icon">
                  <i class="fa-regular fa-image"></i>
                </div>
                <h4>GALLERY</h4>
              </a>
              <a href="#blog" class="blogbutton navbutton">
                <div class="nav-icon"><i class="fa-brands fa-blogger"></i></div>
                <h4>BLOG</h4>
              </a>
              <a href="#contact" class="contactbutton navbutton">
                <div class="nav-icon"><i class="fa-regular fa-address-card"></i></div>
                <h4>CONTACT</h4>
              </a>
            </div>
          </div>
        </nav>
      </div>
    </div>
    <!-- Footer Section -->
    <footer>© 2024 by Adriano Posumah || TIK-2032 Project || Personal Portofolio 
      <a href="index.php" class="edit-page-link">Leave Edit Page</a>
    </footer>
  </body>
  <!-- Script -->
  <script src="script.js"></script>
  <script>
document.addEventListener('DOMContentLoaded', function() {
    const modals = {
        profile: document.getElementById('modal-profile'),
        description: document.getElementById('modal-description'),
        gallery: document.getElementById('modal-gallery'),
        blog: document.getElementById('modal-blog')
    };
    
    const buttons = {
        profile: document.getElementById('modal-btn-profile'),
        description: document.getElementById('modal-btn-description'),
        gallery: document.getElementById('modal-btn-gallery'),
        blog: document.getElementById('modal-btn-blog')
    };

    const closeButtons = document.querySelectorAll('.modal-cls-btn');

    for (let key in buttons) {
        buttons[key].onclick = function() {
            modals[key].classList.add('show');
        };
    }

    closeButtons.forEach(button => {
        button.onclick = function() {
            this.closest('.modal').classList.remove('show');
        };
    });

    window.onclick = function(event) {
        for (let key in modals) {
            if (event.target == modals[key]) {
                modals[key].classList.remove('show');
            }
        }
    };
});
</script>


</html>
