// Our main CSS
import '../css/app.css'

/**
 * We'll load the axios HTTP library which allows us to easily issue requests
 * to our Laravel back-end. This library automatically handles sending the
 * CSRF token as a header based on the value of the "XSRF" token cookie.
 */

 import axios from 'axios';
 window.axios = axios;

 window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';


const numQuestions = 5;
const points = [];
const questions = [];
let qIndex;

btnnewgame.addEventListener("click", playGame);
btnseeanswer.addEventListener("click", seeAnswer);
btncorrect.addEventListener("click", function() {scoreAnswer(true);});
btnwrong.addEventListener("click", function() {scoreAnswer(false);});
btnrunback.addEventListener("click", playGame);

function playGame() {
    qIndex = 1;
    for (p of points) {
        p = 0;
    }
    //FIXME fetch questions
    console.log('new');
    document.getElementById('start').classList.add('hidden');
    document.getElementById('result').classList.add('hidden');
    askQuestion();
}

function askQuestion() {
    //FIXME qIndex from questions[] to HTML
    //FIXME progressbar
    document.getElementById('progresstext').innerHTML = "Fråga " + qIndex + " av " + numQuestions;
    document.getElementById('progresstext').classList.remove('bg-white');
    document.getElementById('progresstext').classList.add('bg-darkblue');
    document.getElementById('progressbase').classList.remove('bg-white');
    document.getElementById('progressbase').classList.add('bg-lightblue');
    document.getElementById('progressbar').classList.remove('bg-white');
    document.getElementById('progressbar').classList.add('bg-darkblue');
    document.getElementById('progressbar').classList.remove('border-white');
    document.getElementById('progressbar').classList.add('border-darkblue');
    document.getElementById('progressbar').style.width = ((qIndex - 0.5) / numQuestions) * 100 + "%";
    document.getElementById('question').classList.remove('hidden');
    document.getElementById('progress').classList.remove('hidden');
}

function seeAnswer() {
    document.getElementById('question').classList.add('hidden');
    //FIXME answer from questions[qindex-1]
    //FIXME color of logo and blob
    document.getElementById('progresstext').innerHTML = "Fråga " + qIndex + " av " + numQuestions;
    document.getElementById('progresstext').classList.remove('bg-darkblue');
    document.getElementById('progresstext').classList.add('bg-white');
    document.getElementById('progressbase').classList.remove('bg-lightblue');
    document.getElementById('progressbase').classList.add('bg-white');
    document.getElementById('progressbar').classList.remove('bg-darkblue');
    document.getElementById('progressbar').classList.add('bg-white');
    document.getElementById('progressbar').classList.remove('border-darkblue');
    document.getElementById('progressbar').classList.add('border-white');
    document.getElementById('progressbar').style.width = (qIndex / numQuestions) * 100 + "%";
    document.getElementById('answer').classList.remove('hidden');
    document.getElementById('progress').classList.remove('hidden');
}

function scoreAnswer(answerValidity) {
    if (answerValidity) {
        //FIXME update score
    }
    if (qIndex < numQuestions) {
        qIndex++;
        document.getElementById('answer').classList.add('hidden');
        askQuestion();
    } else {
        document.getElementById('answer').classList.add('hidden');
        viewScore();
    }
}

function viewScore() {
    //FIXME update scores and indicators
    document.getElementById('progress').classList.add('hidden');
    document.getElementById('result').classList.remove('hidden');
}


