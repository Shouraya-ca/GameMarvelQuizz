let minutes = 0;
let seconds = 0;
let timerInterval;

function startTimer() {
    clearInterval(timerInterval);
    minutes = 0;
    seconds = 0;
    updateTimerDisplay();
    timerInterval = setInterval(updateTimer, 1000);
}

function updateTimer() {
    seconds++;
    if (seconds == 60) {
        seconds = 0;
        minutes++;
    }
    updateTimerDisplay();
}

function updateTimerDisplay() {
    document.getElementById("minutes").textContent = formatTime(minutes);
    document.getElementById("seconds").textContent = formatTime(seconds);
}

function formatTime(time) {
    return time < 10 ? `0${time}` : time;
}






