 // Checkbox activation: enable/disable the delete button
 const checkbox = document.getElementById('toggleCheckbox');
 const button = document.getElementById('myButton');

 checkbox.addEventListener('change', function() {
     if (this.checked) {
         button.classList.add('enabled');
         button.disabled = false;
     } else {
         button.classList.remove('enabled');
         button.disabled = true;
     }
 });

 // Dropdown toggle functionality (if needed)
 document.addEventListener("DOMContentLoaded", function() {
     const dropdownToggle = document.querySelector(".dropdown-toggle");
     const dropdownMenu = document.querySelector(".dropdown");

     if (dropdownToggle && dropdownMenu) {
         dropdownToggle.addEventListener("click", function() {
             if (dropdownMenu.style.display === "block") {
                 dropdownMenu.style.display = "none";
             } else {
                 dropdownMenu.style.display = "block";
             }
         });

         document.addEventListener("click", function(event) {
             if (!dropdownToggle.contains(event.target) && !dropdownMenu.contains(event.target)) {
                 dropdownMenu.style.display = "none";
             }
         });
     }
 });

 // Side navigation functions
 function openNav() {
     document.getElementById("sideNav").style.display = "block";
 }

 function closeNav() {
     document.getElementById("sideNav").style.display = "none";
 }



  document.getElementById('profile_photo').addEventListener('change', function () {
    document.getElementById('uploadForm').submit();
  });

