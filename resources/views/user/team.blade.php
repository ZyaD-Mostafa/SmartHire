<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SmartHire</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css">
    <link rel="stylesheet" href="assets/CSS/team.css">



</head>
<body>
    {{-- nav bar --}}
            @include('partials.white_nav')
            @include('partials.chat_bot')



   <section class="team-slider">
    <div class="swiper mySwiper">
        <div class="swiper-wrapper">
            <div class="swiper-slide"><img src="assets/IMG/zyad.jpg" alt="Team Member 1">
                <p >Zyad Mostafa</p>
                <p >Backend Programmer</p></div>
            <div class="swiper-slide"><img src="assets/IMG/Basmalaaa.jpeg" alt="Team Member 2">
                <p >Basmala Atef</p>
                <p >Frontend Programmer</p></div>
            <div class="swiper-slide"><img src="assets/IMG/adham.jpg" alt="Team Member 3">
                <p >Adham Emad</p>
                <p >Frontend Programmer</p></div>
            <div class="swiper-slide"><img src="assets/IMG/mariamm.jpg" alt="Team Member 4">
                <p >Mariam Ibrahim</p>
                <p >Frontend Programmer</p></div>
            <div class="swiper-slide"><img src="assets/IMG/toqa.jpg" alt="Team Member 5">
                <p >Toqa Mohmed</p>
                <p >Desginer</p></div>
            <div class="swiper-slide"><img src="assets/IMG/ahmed.jpg" alt="Team Member 6">
                <p >Ahmed Massed</p>
                <p >Desginer</p></div>
            <div class="swiper-slide"><img src="assets/IMG/shahd.jpg" alt="Team Member 7">
                <p >Shahd Yassin</p>
                <p >Desginer</p></div>
            <div class="swiper-slide"><img src="assets/IMG/basmala mostafa.jpg" alt="Team Member 9">
                <p >Basmala Mostafa</p>
                <p >Frontend Programmer</p></div>
                <div class="swiper-slide"><img src="assets/IMG//hussin.jpg" alt="Team Member 8">
                <p >Hussain Abdelhakim</p>
                <p >Backend Programmer</p></div>

        </div>
        <!-- Navigation Arrows -->
        <div class="swiper-button-prev"></div>
        <div class="swiper-button-next"></div>
    </div>
</section>



            <!-- Footer Section -->
    @include('partials.footer')






    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script src="assets/JS/team.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
