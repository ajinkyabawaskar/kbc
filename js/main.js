function myFunction() {
    var element = document.getElementById("check");

    var ele = document.getElementsByName('option'); 
    for(i = 0; i < ele.length; i++) {     
        if(ele[i].type="radio") { 
            if(ele[i].checked)  {
                var submittedAnswerObj = ele[i];
                var submittedAnswer = ele[i].value;
            }
        } 
    }
    var correct = document.getElementsByClassName("options"); 
    var correctAnswerObj = correct[0]; 
    var correctAnswer = correct[0].id; 

    // correct answer
    if(submittedAnswer == correctAnswer) {
        submittedAnswerObj.parentElement.style.background = "#28a745";
    } else {
        // wrong answer
        submittedAnswerObj.parentElement.style.background = "#dc3545";
        document.getElementById("div" + correctAnswer).style.background ="#28a745";
    }
}


var timeLeft = 30;
var elem = document.getElementById('timer');
var timerId = setInterval(countdown, 1000);

function countdown() {
    if (timeLeft == -1) {
        clearTimeout(timerId);
    } else {
        elem.innerHTML = timeLeft;
        timeLeft--;
    }
}
