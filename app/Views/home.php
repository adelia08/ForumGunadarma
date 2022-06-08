<?= $this->extend('layout') ?>
<?= $this->section('content') ?>

<div class="wrapper">
    <section id="home">
        <div class="box">
            <img src="https://www.linkpicture.com/q/sammy-diwali-festival.png">
        </div>
        <div class="kolom">
            <h1>Selamat Datang di Forum Gunadarma</h1>
            <p class="deskripsi">Website forum ini digunakan untuk melakukan aktivitas diskusi antar jurusan dari mahasiswa Universitas Gunadarma dengan topik bahasan yang relevan</p>
        </div>
        <div class="button-home"><a href="<?= base_url('thread/create') ?>" class="button">Mulai Posting Thread ..</a>
        </div>
    </section>
</div>

<!-- Slideshow container -->
<div class="slideshow-container">
    <!-- Full-width images with number and caption text -->
    <div class="mySlides fade">
        <div class="numbertext">1 / 3</div>
        <img src="<?= base_url('gambar/gambar1.png') ?>" style="width:100%">
        <div class="text"></div>
    </div>

    <div class="mySlides fade">
        <div class="numbertext">2 / 3</div>
        <img src="<?= base_url('gambar/gambar2.png') ?>" style="width:100%">
        <div class="text"></div>
    </div>

    <div class="mySlides fade">
        <div class="numbertext">3 / 3</div>
        <img src="<?= base_url('gambar/gambar3.png') ?>" style="width:100%">
        <div class="text"></div>
    </div>

    <!-- Next and previous buttons -->
    <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
    <a class="next" onclick="plusSlides(1)">&#10095;</a>
</div>
<br>

<!-- The dots/circles -->
<div style="text-align:center">
    <span class="dot" onclick="currentSlide(1)"></span>
    <span class="dot" onclick="currentSlide(2)"></span>
    <span class="dot" onclick="currentSlide(3)"></span>
</div>


<h3>Top Threads</h3>
<table>
    <tbody>
        <?php foreach ($top_thread->getResult() as $thread) : ?>
            <tr>
                <td><a href="<?= base_url('thread/view/' . $thread->id_thread) ?> "><?= $thread->judul ?></a></td>
                <td>
                    <?php
                    for ($i = 0; $i < 5; $i++) {
                        if (($i + 1) <= $thread->rating) {
                            echo '<span class="fa fa-star checked"></span>';
                        } else {
                            echo '<span class="fa fa-star"></span>';
                        }
                    }
                    ?>
                </td>
            </tr>
        <?php endforeach ?>
    </tbody>
</table>
<?= $this->endSection() ?>
<?= $this->section('script') ?>
<script>
    var slideIndex = 1;
    showSlides(slideIndex);

    // Next/previous controls
    function plusSlides(n) {
        showSlides(slideIndex += n);
    }

    // Thumbnail image controls
    function currentSlide(n) {
        showSlides(slideIndex = n);
    }

    function showSlides(n) {
        var i;
        var slides = document.getElementsByClassName("mySlides");
        var dots = document.getElementsByClassName("dot");
        if (n > slides.length) {
            slideIndex = 1
        }
        if (n < 1) {
            slideIndex = slides.length
        }
        for (i = 0; i < slides.length; i++) {
            slides[i].style.display = "none";
        }
        for (i = 0; i < dots.length; i++) {
            dots[i].className = dots[i].className.replace(" active", "");
        }
        slides[slideIndex - 1].style.display = "block";
        dots[slideIndex - 1].className += " active";
    }
</script>
<?= $this->endSection() ?>