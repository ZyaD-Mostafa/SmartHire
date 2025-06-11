function showMessage(button) {
    var cardBody = button.parentElement;
    var message = cardBody.querySelector(".job-message");

    if (message) {
        message.remove();
    } else {
        var newMessage = document.createElement("p");
        newMessage.innerText = "No available job now. Available soon!";
        newMessage.style.color = "red";
        newMessage.style.fontWeight = "bold";
        newMessage.style.marginTop = "10px";
        newMessage.classList.add("job-message");
        cardBody.appendChild(newMessage);
    }
}
function toggleProfileCard() {
    const card = document.getElementById('profileCard');
    card.classList.toggle('d-none');
}

document.addEventListener('click', function(event) {
    const profileCard = document.getElementById('profileCard');
    const profileImg = document.querySelector('.profile');

    if (!profileCard.contains(event.target) && !profileImg.contains(event.target)) {
        profileCard.classList.add('d-none');
    }
});

