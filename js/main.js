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
        submittedAnswerObj.parentElement.style.background = "#39f775";
        submittedAnswerObj.parentElement.style.color = "#ffffff";
        var audio = document.getElementById("audioR");
        audio.play();
    } else {
        // wrong answer
        submittedAnswerObj.parentElement.style.background = "#FB385C";
        document.getElementById("div" + correctAnswer).style.background ="#38fb59";
        document.getElementById("div" + correctAnswer).style.color ="#ffffff";
        submittedAnswerObj.parentElement.style.color = "#ffffff";
        var audio = document.getElementById("audioW");
        audio.play();
    }
}

//timer
var timeLeft = 120;
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

//lifeline vanish
function vanish1(){
    document.getElementById("exp").style.display = "none";
}
function vanish2(){
    document.getElementById("50").style.display = "none";
}
function vanish3(){
    document.getElementById("int").style.display = "none";
}

//music
// function play() {
//     var audio = document.getElementById("next");
//     audio.play();
// }
// playn();