document.addEventListener("DOMContentLoaded", function() {
    const dropdownToggle = document.querySelector(".dropdown-toggle");
    const dropdownMenu = document.querySelector(".dropdown");

    dropdownToggle.addEventListener("click", function() {
        // Toggle the display of the dropdown menu
        if (dropdownMenu.style.display === "block") {
            dropdownMenu.style.display = "none";
        } else {
            dropdownMenu.style.display = "block";
        }
    });

    // to Hide the dropdown menu if clicked outside of it 
    document.addEventListener("click", function(event) {
        if (!dropdownToggle.contains(event.target) && !dropdownMenu.contains(event.target)) {
            dropdownMenu.style.display = "none";
        }
        });
    });




            
    function openNav() {
        document.getElementById("sideNav").style.display = "block";
    }

    function closeNav() {
        document.getElementById("sideNav").style.display = "none";
    }

              

              document.addEventListener("DOMContentLoaded", function() {
            var swiper = new Swiper(".mySwiper", {
                loop: true,
                centeredSlides: true,
                navigation: {
                    nextEl: ".swiper-button-next",
                    prevEl: ".swiper-button-prev",
                },
                breakpoints: {
            320: {  // For small screens like phones
                slidesPerView: 3,
                spaceBetween: 80,   // Space between images
            },
            1024: {  // For larger screens like laptops
                slidesPerView: 5,
                spaceBetween: 5,   // Space between images
            }
        }
            });
        });
