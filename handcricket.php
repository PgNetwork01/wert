<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
       
    <meta charset="UTF-8">
       
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Hand Cricket</title>
       
    <link rel="stylesheet" href="handcricket.css">
       
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
</head>

<body>

<header>
      <nav>
        <ul>
          <div class="container-nav">
            <div class="left">
              <li style="border:none;"><span class="material-symbols-outlined c1" onclick="openNav()">menu</span>
              </li>
            </div>
            <div class="right">
              <div class="search-container">
                <div class="search-wrapper">
                  <li style="border:none;"><input type="text" id="searchInput" placeholder="Search..." onkeydown="performSearch()"></li>
                  <li style="border:none;"><span onclick="search()" class="material-symbols-outlined search-event c1" style="border:none;">search</span></li>
                </div>
              </div>
              <li class="a n">Home</li>
              <li onclick="goToHandCricket()" class="a n">Hand Cricket</li>
              <li onclick="goTorps()" class="a n">Rps</li>
              <li style="border:none;" onclick="openNav1()"><?php if (isset($_SESSION['user_logo'])): ?>
                  <img src="<?php echo htmlspecialchars($_SESSION['user_logo']); ?>" alt="User Logo" style="width: 35px; height: 35px; border-radius: 50%;">
                <?php else: ?><li class="a n" onclick="gotosignup()">Account</li><?php endif; ?></li>
              <li class="b" style="border:none;">
                  <span class="material-symbols-outlined b c1" onclick="openNav1()">view_cozy</span>
              </li>
            </div>
          </div>
        </ul>
      </nav>
    </header>
    <!-- /navigation bar -->

    <!-- menu bar 1 -->
    <div id="mySidenav" class="sidenavmenu">
      <div class="closehover"><a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a></div>
      <a href="#">About</a>
      <div class="dropdown">
        <a class="dropbtn" onclick="myFunction()">Github Repo ▼
          <i class="fa fa-caret-down"></i>
        </a>
        <div class="dropdown-content" id="myDropdown">
          <a href="https://github.com/PgNetwork01/Calculator">Calculator</a>
        </div>
      </div>
      <div class="dropdown1">
        <a class="dropbtn1" onclick="myFunction1()">Discord Bots
          <i class="fa fa-caret-down"></i>
        </a>
        <div class="dropdown-content1" id="myDropdown1">
          <a href="pg-economy/index.html">Pg Economy</a>
        </div>
      </div>
      <a href="#">Clients</a>
      <a href="contact.html">Contact</a>
    </div>
    <!-- /menu bar 1 -->

    <!-- menu bar 2 -->
    <div id="mySidenav1" class="sidenavmenu1">
      <div class="closehover1"><a href="javascript:void(0)" class="closebtn1" onclick="closeNav1()">&times;</a></div>
      <a href="index.html">Home</a>
      <a href="hand-cricket/public/index.html">Hand Cricket</a>
      <a href="#">Account</a>
      <a href="#">Account</a>
      <a href="logout.php">Logout</a>
    </div>
    <!-- /menu bar 2 -->

        <h1 class="name">Hand Cricket</h1>
        <p class="credit">Made By - Pg Network</p>
        <div class="main">
            <span class="material-symbols-outlined refresh" onclick="start()">refresh</span>
            <div id="toss">
            <h3>Choose Heads or Tails to toss the coin and decide who bats first</h3>
        <div class="btn">
                        <button id="Heads" class="head" onclick="toss()">Heads</button>
                        <button id="Tails" class="tail" onclick="toss()">Tails</button>
        </div>
                </div>
            <div id='choice'>
                    <h3>You won the toss</h3>
            <div class="btn">
                        <button id="Batting" class="head" onclick="choice()">Batting</button>
                        <button id="Bowling" class="tail" onclick="choice()">Bowling</button>
        </div>
                </div>
            <div id='game-area'>
                    <h3>You are <span id='role'></span></h3>
            <br>
                    <div style="display: flex;flex-direction: row; flex-wrap: wrap;justify-content: space-between;">
                            <form id='hand-cricket'>
                                    <h4 style='margin-top: 0; font-size: x-large;'>You</h4>
                                    <input id='userinput' type='number' min='0' max='10' placeholder="Number" required />
                                </form>
                                <h4 style='margin-top: 0; font-size: x-large;'>Computer <span id='computer-hand'></span></h4>
                        </div>
                    <div id="score-area">
                            <h3 id='user-score'></h3>
                            <h3 id='computer-score'></h3>
                        </div>
                </div>
           
            <h2 id='result'></h2>
    </div>

       
    <script src="handcricket.js">
    </script>
</body>

</html>