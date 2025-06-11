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