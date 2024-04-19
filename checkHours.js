function displayTime() {
    var userInput = document.getElementById("dateInput").value;
    var userDate = new Date(userInput);
    var dayOfWeek = userDate.getDay(); // 0 for Sunday, 1 for Monday, ..., 6 for Saturday

    var displayElement = document.getElementById("displayTime");

    if (dayOfWeek === 0 || dayOfWeek === 6) { // Saturday or Sunday
        displayElement.textContent = "Open from 8:00 AM to 1:00 AM";
    } else {
        displayElement.textContent = "Open from 8:00 AM to 9:00 PM";
    }
}