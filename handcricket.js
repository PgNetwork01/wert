document.addEventListener("DOMContentLoaded", function() {
    var elements = document.querySelectorAll("*");
    elements.forEach(function(el) {
        el.innerHTML = el.innerHTML.replace(/&nbsp;/g, ' ');
    });
});

let userRole;
let userScore;
let computerRole;
let computerScore;
let innings;
let tossWon;
let gameEnded;
const tossForm = document.getElementById('toss-form');
const choiceForm = document.getElementById('choice-form');
const handCricketForm = document.getElementById('hand-cricket');

function start() {
    document.getElementById('toss').style.display = 'flex';
    document.getElementById('game-area').style.display = 'none';
    document.getElementById('choice').style.display = 'none';
    document.getElementById('result').style.display = 'none';
    document.getElementById('computer-hand').innerHTML = '';
    innings = 1;
    tossWon = '';
    userRole = '';
    userScore = 0;
    computerRole = '';
    computerScore = 0;
    gameEnded = false;
}

function toss() {

    if (Math.floor(Math.random() * 2) == 1)
        tossWon = 'User';
    else
        tossWon = 'Computer';
    if (tossWon == 'User') {
        document.getElementById('toss').style.display = 'none';
        document.getElementById('choice').style.display = 'flex';

    } else {
        if (Math.floor(Math.random() * 2) == 1) {
            userRole = 'Batting';
            computerRole = 'Bowling';
        } else {
            userRole = 'Bowling';
            computerRole = 'Batting';
        }
        document.getElementById('game-area').style.display = 'flex';
        document.getElementById('toss').style.display = 'none';
        document.getElementById('choice').style.display = 'none';
        document.getElementById('role').innerHTML = userRole;
    }


}
function choice() {

    const choices = document.querySelectorAll('input[name="choice"]');
    for (const choice of choices) {
        if (choice.checked) {
            userRole = choice.value;
            break;
        }
    }
    if (userRole == 'Batting')
        computerRole = 'Bowling';
    else
        computerRole = 'Batting';
        userRole = 'Bowling';
    document.getElementById('game-area').style.display = 'flex';
    document.getElementById('toss').style.display = 'none';
    document.getElementById('choice').style.display = 'none';
    document.getElementById('role').innerHTML = userRole;
}


handCricketForm.addEventListener('submit', e => {
    e.preventDefault();
    if (!gameEnded) {
        let userInput = Number(handCricketForm.userinput.value);
        calculateScore(userInput);
    }
});

function calculateScore(userInput) {
    let computerScoreTemp = Math.floor(Math.random() * 11);
    let userScoreTemp = userInput;

    document.getElementById('computer-hand').innerHTML = computerScoreTemp;

    if (userRole == 'Batting') {
        if (computerScoreTemp == userScoreTemp) {
            if (innings == 1) {
                userRole = 'Bowling';
                computerRole = 'Batting';
                alert("You are out");
                innings = 2;
            } else
                gameOver();
        } else if (userScoreTemp == 0) {
            userScore += computerScoreTemp;
            if (innings == 2 && userScore > computerScore)
                gameOver();
        } else {
            userScore += userScoreTemp;
            if (innings == 2 && userScore > computerScore)
                gameOver();
        }
    } else {
        if (computerScoreTemp == userScoreTemp) {
            if (innings == 1) {
                userRole = 'Batting';
                computerRole = 'Bowling';
                alert("You took a wicket");
                innings = 2;
            } else
                gameOver();
        } else if (computerScoreTemp == 0) {
            computerScore += userScoreTemp;
            if (innings == 2 && computerScore > userScore) {
                gameOver();
            }
        } else {
            computerScore += computerScoreTemp;
            if (innings == 2 && computerScore > userScore)
                gameOver();
        }
    }
}

function gameOver() {
    console.log("Game over");
    document.getElementById('result').style.display = 'inline';
    if (userScore > computerScore)
        document.getElementById('result').innerHTML = "You won";
    else if (computerScore > userScore)
        document.getElementById('result').innerHTML = "You lost";
    else
        document.getElementById('result').innerHTML = "Match Tied";
    gameEnded = true;
}

function updateScoreView() {
    document.getElementById('user-score').innerHTML = 'Your Score: ' + userScore;
    document.getElementById('computer-score').innerHTML = "Computer's Score: " + computerScore;
    document.getElementById('role').innerHTML = userRole;
    setTimeout(updateScoreView, 100);
}
start();
updateScoreView();

function openNav() {
    document.getElementById("mySidenav").style.width = "270px";
  }
  
  /* Set the width of the side navigation to 0 */
  function closeNav() {
    document.getElementById("mySidenav").style.width = "0";
  }
  
  function myFunction() {
    document.getElementById("myDropdown").classList.toggle("show");
  }
  
  function myFunction1() {
    document.getElementById("myDropdown1").classList.toggle("show1");
  }
  
  // Close the dropdown if the user clicks outside of it
  window.onclick = function(e) {
    if (!e.target.matches('.dropbtn')) {
      var myDropdown = document.getElementById("myDropdown");
      if (myDropdown.classList.contains('show')) {
        myDropdown.classList.remove('show');
      }
    }
  }

  function openNav1() {
    document.getElementById("mySidenav1").style.width = "270px";
  }
  
  /* Set the width of the side navigation to 0 */
  function closeNav1() {
    document.getElementById("mySidenav1").style.width = "0";
  }
  
  function myFunction2() {
    document.getElementById("myDropdown2").classList.toggle("show2");
  }
  
  function myFunction3() {
    document.getElementById("myDropdown3").classList.toggle("show3");
  }
  
  function search() {
    // Get the input value
    var searchTerm = document.getElementById("searchInput").value;
  
    // Construct the Google search URL
    var googleSearchUrl = "https://www.google.com/search?q=" + encodeURIComponent(searchTerm);
  
    // Open the URL in a new tab
    window.open(googleSearchUrl, '_blank');
  }
  
  function handleKeyDown(event) {
    // Check if the Enter key is pressed (key code 13)
    if (event.key === "Enter") {
      // Prevent the default form submission behavior
      event.preventDefault();
      
      // Trigger the search function
      search();
    }
  }
  
  window.addEventListener('beforeinstallprompt', (event) => {
    // Prevent Chrome 76 and earlier from automatically showing the prompt
    event.preventDefault();
    // Stash the event so it can be triggered later
    deferredPrompt = event;
    // Update UI notify the user they can add to home screen
    showInstallPromotion();
  });