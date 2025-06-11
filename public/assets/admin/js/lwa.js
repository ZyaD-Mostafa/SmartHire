document.addEventListener("DOMContentLoaded", function (event) {
    const showNavbar = (toggleId, navId, bodyId, headerId) => {
        const toggle = document.getElementById(toggleId);
        const nav = document.getElementById(navId);
        const bodypd = document.getElementById(bodyId);
        const headerpd = document.getElementById(headerId);

        let isNavOpen = false; // Track the state of the navigation bar

        if (toggle && nav && bodypd && headerpd) {
            toggle.addEventListener('click', () => {
                if (isNavOpen) {
                    // Close the navigation bar
                    nav.classList.remove('show');
                    toggle.classList.remove('bx-x');
                    bodypd.classList.remove('body-pd');
                    headerpd.classList.remove('body-pd');
                } else {
                    // Open the navigation bar
                    nav.classList.add('show');
                    toggle.classList.add('bx-x');
                    bodypd.classList.add('body-pd');
                    headerpd.classList.add('body-pd');
                }

                // Toggle the state
                isNavOpen = !isNavOpen;
            });
        }
    };

    // for display in mobile view
    showNavbar('header-toggle', 'nav-bar', 'body-pd', 'header');


    const linkColor = document.querySelectorAll('.nav_link');
    function colorLink() {
        if (linkColor) {
            linkColor.forEach((l) => l.classList.remove('active'));
            this.classList.add('active');
        }
    }
    linkColor.forEach((l) => l.addEventListener('click', colorLink));
    });


    const toggleButton = document.getElementById('ls-move');
    const tableHead = document.getElementById('table-head');
    const tableBody = document.getElementById('table-body');

    let isTableShown = true; // Initially, the table is shown

    toggleButton.addEventListener('click', function() {
        if (isTableShown) {
            tableHead.style.display = 'none';
            tableBody.style.display = 'none';
            isTableShown = false;
        } else {
            tableHead.style.display = 'table-header-group';
            tableBody.style.display = 'table-row-group';
            isTableShown = true;
        }
    });

















    // const historyButton = document.getElementById('history');
    // const tableResponsive = document.getElementById('table-responsive');

    // let isTableDisplayed = false;

    // historyButton.addEventListener('click', function() {
    //     if (isTableDisplayed) {
    //         tableResponsive.style.display = 'none';
    //         isTableDisplayed = false;
    //     } else {
    //         tableResponsive.style.display = 'block';
    //         isTableDisplayed = true;
    //     }
    // });



    // document.addEventListener('DOMContentLoaded', function () {
    //     const hoverData = document.getElementById('hoverData');
    //     const borderBar = document.getElementById('borderBar');

    //     borderBar.addEventListener('mousemove', function (e) {
    //         hoverData.style.display = 'block';
    //         hoverData.style.left = `${e.clientX}px`;
    //         hoverData.style.top = `${e.clientY}px`;
    //     });

    //     borderBar.addEventListener('mouseleave', function () {
    //         hoverData.style.display = 'none';
    //     });
    // });
