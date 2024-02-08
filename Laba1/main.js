var seconds = 120;
var intervalId = setInterval(function () {
  document.getElementById("seconds").innerHTML = --seconds;
  if (seconds<=0){
    clearInterval(intervalId);
    }
  }, 1000);
clearTimeout(seconds);