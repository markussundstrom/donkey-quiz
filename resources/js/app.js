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

import { spline } from '@georgedoescode/spline';
import  { createNoise2D }  from 'simplex-noise';

const numQuestions = 35;
let points = [0, 0, 0, 0, 0, 0, 0];
let questions = [];
const categories = ['Film & TV', 'Geografi', 'Historia', 'Musik', 'Övrigt', 'Vetenskap', 'Sport'];
let qIndex;
let total;
let current = 'start';
const blobPoints = createBlobPoints();
const simplex = createNoise2D();
let noiseStep = 0.005;

btnnewgame.addEventListener("click", playGame);
btnseeanswer.addEventListener("click", seeAnswer);
btncorrect.addEventListener("click", function() {scoreAnswer(true);});
btnwrong.addEventListener("click", function() {scoreAnswer(false);});
btnrunback.addEventListener("click", playGame);

function playGame() {
    qIndex = 1;
    for (let i=0; i < points.length; i++) {
        points[i] = 0;
    }

    total = 0;
    questions = [];
    const xhttp = new XMLHttpRequest();
    xhttp.onload = function() {
        questions.push(...JSON.parse(this.responseText));
        console.log(questions);
        //document.getElementById('start').classList.add('hidden');
        //document.getElementById('result').classList.add('hidden');
        //transitionElementa('start', );
        //hideElement('result');
        askQuestion();
    }
    xhttp.open('GET', 'questions');
    //xhttp.open('GET', 'largest');
    xhttp.send();
}

function askQuestion() {
    document.getElementById('logotext').classList.add('hidden')
    document.getElementById('questioncategory').innerHTML = questions[qIndex -1].category;
    document.getElementById('questiontext').innerHTML = questions[qIndex -1].question;
    flipSVGs('lightblue');
    flipLogo('lightblue');
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
    //document.getElementById('question').classList.remove('hidden');
    transitionElements(current, 'question');
    current = 'question';
    document.getElementById('progress').classList.remove('hidden');
}

function seeAnswer() {
    //document.getElementById('question').classList.add('hidden');
    document.getElementById('answertext').innerHTML = questions[qIndex - 1].answer;
    flipSVGs('white');
    flipLogo('white');
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
    transitionElements(current, 'answer');
    current = 'answer';
    //document.getElementById('answer').classList.remove('hidden');
    document.getElementById('progress').classList.remove('hidden');
}

function scoreAnswer(answerValidity) {
    if (answerValidity) {
        points[categories.indexOf(questions[qIndex - 1].category)]++
    }
    if (qIndex < numQuestions) {
        qIndex++;
        //document.getElementById('answer').classList.add('hidden');
        askQuestion();
    } else {
        //document.getElementById('answer').classList.add('hidden');
        viewScore();
    }
}

function viewScore() {
    for (let i = 0; i < points.length; i++) {
        total += points[i];
        for (let j = 1; j <= points[i]; j++) {
            document.getElementById(i + '-' + j).classList.add('bg-green');
            document.getElementById(i + '-' + j).classList.remove('bg-lightgray');
        }
    }
    document.getElementById('totalscore').innerHTML = total + ' av ' + numQuestions + ' rätt';
    flipSVGs('lightblue');
    flipLogo('lightblue');
    document.getElementById('progress').classList.add('hidden');
    //document.getElementById('result').classList.remove('hidden');
    transitionElements(current, 'result');
    current = 'result';
}

function flipSVGs(color) {
    let fill = (color === 'white') ? '#FFFFFF' : '#7678ED';
    const blobs = document.getElementsByClassName('blob');
    for (let blob of blobs) {
        let svgtags = blob.getElementsByTagName('path');
        for (let tag of svgtags) {
            tag.setAttribute('fill', fill);
        }
    }
}

function flipLogo(color) {
    let logo = (color === 'white') ? 'images/Logo-inv.svg' : 'images/Logo.svg';
    document.getElementById('logoimage').setAttribute('data', logo);
}

function transitionElements(from, to) {
    document.getElementById(from).addEventListener('transitionend', function(e) {
        document.getElementById(from).classList.add('hidden');
        document.getElementById(to).classList.remove('transition-opacity');
        document.getElementById(to).style.opacity = 0;
        document.getElementById(to).classList.remove('hidden');
        document.getElementById(to).classList.add('transition-opacity');
        document.getElementById(to).style.opacity = 1;
        console.log('event');
    },  {
        capture: false,
        once: true,
        passive: false
    });
    document.getElementById(from).style.opacity = 0;
}

function createBlobPoints() {
    const blobPoints = [[], []];
    const numPoints = 6;
    const angleStep = (Math.PI * 2) / numPoints;
    const rad = 170;
    
    for (let bp of blobPoints) {
        for (let i = 1; i <= numPoints; i++) {
            const theta = i * angleStep;
            const x = 200 + Math.cos(theta) * rad;
            const y = 200 + Math.sin(theta) * rad;

            bp.push({
                x: x,
                y: y,
                originX: x,
                originY: y,
                noiseOffsetX: Math.random() * 1000,
                noiseOffsetY: Math.random() * 1000,
            });
        }
    }
    console.log(blobPoints);
    return blobPoints;
}

function map(n, start1, end1, start2, end2) {
  return ((n - start1) / (end1 - start1)) * (end2 - start2) + start2;
}

function noise(x, y) {
    return simplex(x, y);
}

(function animate() {
    //const blobs = document.getElementsByClassName('blob');
    let blobl = document.getElementById('blob-l');
    let blobr = document.getElementById('blob-r');
    //let svgl = blobl.setAttribut//for (let blob of blobs) {
    //    let svgtags = blob.getElementsByTagName('path');
    document.getElementById('blobl-path').setAttribute('d', spline(blobPoints[0], 1, true));
    document.getElementById('blobr-path').setAttribute('d', spline(blobPoints[1], 1, true));
    requestAnimationFrame(animate);
    for (let bp of blobPoints) {
        for (let i = 0; i < bp.length; i++) {
            const point = bp[i];

            const nX = noise(point.noiseOffsetX, point.noiseOffsetX);
            const nY = noise(point.noiseOffsetY, point.noiseOffsetY);
            const x = map(nX, -1, 1, point.originX - 30, point.originX + 30);
            const y = map(nY, -1, 1, point.originY - 30, point.originY + 30);

            point.x = x;
            point.y = y;

            point.noiseOffsetX += noiseStep;
            point.noiseOffsetY += noiseStep;
        }
    }
})();

