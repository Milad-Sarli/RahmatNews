<?php

use function Livewire\Volt\{state};

//

?>

<div>
    <!-- Swiper -->
    <div class="swiper mySwiper">
        <div class="swiper-wrapper">
            <div class="swiper-slide">
                <img class="md:h-[600px] h-[400px]" src="images/1.jpg" alt="">
            </div>
            <div class="swiper-slide">
                <img class="md:h-[600px] h-[400px]" src="images/2.png" alt="">
            </div>
            <div class="swiper-slide">
                <img class="md:h-[600px] h-[400px]" src="images/3.png" alt="">
            </div>
        </div>
        <div class="invisible swiper-button-next md:visible "></div>
        <div class="invisible swiper-button-prev md:visible "></div>
        <div class="text-white autoplay-progress">
            <svg viewBox="0 0 48 48">
                <circle cx="24" cy="24" r="20"></circle>
            </svg>
            <span></span>
        </div>
    </div>
    <style>

    </style>

    <script>
        const progressCircle = document.querySelector(".autoplay-progress svg");
    const progressContent = document.querySelector(".autoplay-progress span");
        var swiper = new Swiper(".mySwiper", {
            loop: true,
            autoplay: {
        delay: 10000,
        disableOnInteraction: false
      },navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev"
      },
      on: {
        autoplayTimeLeft(s, time, progress) {
          progressCircle.style.setProperty("--progress", 1 - progress);
          progressContent.textContent = `${Math.ceil(time / 1000)}s`;
        }
      }});
    </script>
</div>