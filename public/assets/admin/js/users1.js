document.addEventListener("DOMContentLoaded", function (event) {

    const showNavbar = (toggleId, navId, bodyId, headerId) => {
        const toggle = document.getElementById(toggleId),
            nav = document.getElementById(navId),
            bodypd = document.getElementById(bodyId),
            headerpd = document.getElementById(headerId)

        // Validate that all variables exist
        if (toggle && nav && bodypd && headerpd) {
            // Open the navbar by default on desktop view
            if (window.innerWidth > 768) {
                nav.classList.add('show');
                // Change the icon to the close icon
                toggle.classList.add('bx-x');
                // Add padding to body and header
                bodypd.classList.add('body-pd');
                headerpd.classList.add('body-pd');
            }

            // Add the click event listener for toggling the navbar on mobile view
            toggle.addEventListener('click', () => {
                if (window.innerWidth <= 768) {
                    // Show or hide navbar
                    nav.classList.toggle('show');
                    // Change icon
                    toggle.classList.toggle('bx-x');
                    // Add or remove padding to body and header
                    bodypd.classList.toggle('body-pd');
                    headerpd.classList.toggle('body-pd');
                }
            });
        }
    }

    showNavbar('header-toggle', 'nav-bar', 'body-pd', 'header')

    /*===== LINK ACTIVE =====*/
    const linkColor = document.querySelectorAll('.nav_link')

    function colorLink() {
        if (linkColor) {
            linkColor.forEach(l => l.classList.remove('active'))
            this.classList.add('active')
        }
    }
    linkColor.forEach(l => l.addEventListener('click', colorLink))

    // Your code to run since DOM is loaded and ready
});










//                                for add new employee in table


function addEmployee() {
    // Get the reference to the table body
    var tableBody = document.querySelector('.table tbody');

    // Create a new table row
    var newRow = tableBody.insertRow();

    // Array to store column names
    var columnNames = ['ID', 'Name', 'Department', 'Zone', 'Age', 'Salary'];

    // Add cells to the new row
    for (var i = 0; i < columnNames.length; i++) {
        // Prompt the user for the name of the column
        var columnName = columnNames[i];

        // Create a new cell in the row
        var cell = newRow.insertCell(i);

        // Set the cell content to the entered column name
        cell.textContent = columnName;

        // Prompt the user for the corresponding data for the cell
        var cellData = prompt(`Enter data for ${columnName}`);

        // Check if the user clicked cancel, and if so, don't add a new row
        if (cellData === null) {
            tableBody.deleteRow(newRow.rowIndex); // Remove the newly added row
            return; // Exit the function
        }

        // Set the cell content to the entered data
        cell.textContent = cellData;
    }
}








//                               for delete employee in table


$(document).ready(function() {
    $('.fa-trash').on('click', function() {
        // Confirm deletion
        if (confirm("Are you sure you want to delete this row?")) {
            // If confirmed, remove the closest table row
            $(this).closest('tr').remove();
        }
    });
});










//                              for edit employee in table




document.addEventListener('DOMContentLoaded', function () {
    // Add click event listener to the pencil icon
    document.querySelectorAll('.icon.fa-pencil-alt').forEach(function (pencilIcon) {
        pencilIcon.addEventListener('click', function () {
            // Get the parent <tr> element
            var row = this.closest('tr');

            // Toggle edit mode for each <td> except the first one (index 0)
            for (var i = 1; i < row.cells.length - 1; i++) {
                var cell = row.cells[i];
                cell.classList.toggle('edit-mode');
                toggleContent(cell);
            }
        });
    });

    function toggleContent(cell) {
        // Toggle between text and input field
        if (cell.classList.contains('edit-mode')) {
            var textContent = cell.textContent;
            var input = document.createElement('input');
            input.type = 'text';
            input.value = textContent.trim();
            cell.textContent = '';
            cell.appendChild(input);
            input.focus();
        } else {
            var input = cell.querySelector('input');
            cell.textContent = input.value;
        }
    }
});
