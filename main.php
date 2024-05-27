<?php
session_start();
header("Access-Control-Allow-Credentials: true");
// if (!isset($_SESSION['username'])) {
//     header("Location: index.html");
//     exit();
// }
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="import.css">
  <link rel="stylesheet" href="media.css">
  <title>Wert</title>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- <link rel="manifest" href="manifest.json"> -->
  <link rel="icon" type="image/x-icon" href="img/logo_bulb_black_circle.png">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
  <style>
    .hidden {
      display: none;
    }
  </style>
</head>

<body>
  <!-- Loading screen -->
  <div class="preloader"> 
    <img class="img-loader" src="img/pg-loader-2.gif">
    <br>
    <div class="spinner"></div>
  </div>
  <!-- /loading screen -->

  <!-- all content -->
  <div class="content">

    <!-- navigation bar -->
    <header>
      <nav>
        <ul>
          <div class="container">
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
              <li class="a n"><span class="material-symbols-outlined">home</span></li>
              <li onclick="togglePopup1()" class="a n"><span class="material-symbols-outlined">sports_esports</span></li>
              <li style="border:none;" onclick="togglePopup()">
                                <?php if (isset($_SESSION['user_logo'])): ?>
                                    <img src="<?php echo htmlspecialchars($_SESSION['user_logo']); ?>" alt="User Logo" style="padding: 10px;s width: 25px; height: 25px; border-radius: 50%;">
                                <?php else: ?>
                                    <span class="material-symbols-outlined" onclick="gotosignup()">account_circle</span>
                                <?php endif; ?>
                            </li>              <li class="b" style="border:none;">
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

    <div id="userPopup" class="popup">
      <p class="email"><?php echo htmlspecialchars($_SESSION['email']); ?></p>
      <img src="<?php echo htmlspecialchars($_SESSION['user_logo']); ?>" alt="userlogo" class="user-logo">
      <p class="username">Hi, <?php echo htmlspecialchars($_SESSION['username']); ?></p>
      <a onclick="profile()" class="manage-acc"><span class="material-symbols-outlined">manage_accounts</span> Manage your Account</a>
      <a onclick="signout()" class="signout"><span class="material-symbols-outlined">logout</span> Log out</a>
    </div>
    <div id="userPopup1" class="popup1">
            <a href="handcricket.php">Hand Cricket</a>
            <a href="rps/frontend/index.html">Rock Papper Sissor</a>
        </div>

    <!-- menu bar 2 -->
    <div id="mySidenav1" class="sidenavmenu1">
      <div class="closehover1"><a href="javascript:void(0)" class="closebtn1" onclick="closeNav1()"><img src="<?php echo htmlspecialchars($_SESSION['user_logo']); ?>" alt="User Logo" style=" padding: 10px; width: 35px; height: 35px; border-radius: 50%;">
</a></div>
      <a href="profile.php">Profile</a>
      <a href="hand-cricket/public/index.html">Hand Cricket</a>
      <a href="#">Account</a>
      <a href="#">Account</a>
      <a href="logout.php">Logout</a>
    </div>
    <!-- /menu bar 2 -->

    <!-- heading -->
    <div>
      <h1 class="wert">Wert.ED</h1>
    </div>
    <!-- /heading -->

    <!-- main content -->
    <div class="spacer layer1"></div>
    <section class="blue styler">
      <h1>Welcome!</h1>
      <p>🌟 Welcome to Wert.ed, where endless possibilities await you on the journey of knowledge and discovery! 🚀 Embrace a world where learning meets innovation, and where every click opens a door to a realm of exciting opportunities. As a new member of our vibrant community, you're not just joining a website; you're becoming a part of a dynamic ecosystem dedicated to nurturing intellect and fostering creativity. Navigate through our user-friendly interface, explore diverse content, and engage with like-minded individuals who share your passion for growth. Wert.ed is not just a destination; it's a launchpad for your curiosity. Let the adventure begin, and let your quest for knowledge soar to new heights! 🌈✨</p>
    </section>
    <div class="spacer layer2"></div>
    <section class="red styler">
      <h1>PG Bots!</h1>
      <p>🤖 Elevate your Discord server experience with the power of PG Bots! Introducing PG Economy, a dynamic economy game bot that injects excitement into your community. Engage in thrilling economic activities, build your virtual empire, and compete with friends for the ultimate financial supremacy. But that's not all! Introduce PG Moderation to ensure a harmonious server environment. With robust moderation features, enjoy peace of mind as PG Moderation efficiently handles tasks such as content filtering, user management, and maintaining order. Inviting our bots is a breeze – simply click the links below, grant the necessary permissions, and watch as your server transforms into a hub of entertainment and order! <br><br>

      🌐 <b>PG Economy Invite Link:</b> <a href="pg-economy/index.html">Pg Economy</a> <br><br>

        🌐 <b>PG Moderation Invite Link:</b> <a href="#">Pg Moderation</a> <br><br>

      Welcome to a new era of Discord interaction, where fun and order seamlessly coexist! 🚀✨</p>
    </section>
    <div class="spacer layer3"></div>
    <section class="green styler">
      <h1>Welcome!</h1>
      <p>Welcome to Wert.ED, a website where you can find all the information you need about our company</p>
    </section>
    <div class="spacer layer4"></div>
    <section class="purple styler">
      <h1>Welcome!</h1>
      <p>Welcome to Wert.ED, a website where you can find all the information you need about our company</p>
    </section>
    <div class="spacer layer5"></div>
    <!-- /main content -->

    <div id="searchResults"></div>

    <!-- footer -->
    <div class="footer">
      <div class="fc1">
        <ul class="footer-content1">
          <li>
            <h1>Wert.ED</h1>
          </li>
          <li>
            <p>Welcome to the server! Dive into the fun and connect with the community. Feel free to explore, chat, and make yourself at home. Enjoy your stay!</p>
          </li>
          <li>
            <a href="mailto:wert.ed00@gmail.com">wert.ed00@gmail.com</a>
          </li>
        </ul>
      </div>
      <div class="fc2">
        <h2>Social Links</h2>
        <ul>
          <li><a href="https://discord.gg/t5adGsvjZZ">Discord</a></li>
          <li><a>Youtube</a></li>
          <li><a>Twitter</a></li>
          <li><a>Instagram</a></li>
          <li><a>Telegram</a></li>
        </ul>
      </div>
    </div>
    <div>
      <footer>
      &copy; 2023 Wert.ED. All rights reserved.
      </footer>
  </div>
  <!-- /all content -->
  
  <script src="index.js"></script>

<script>
    // Basic search functionality
    const data = [
      { id: 1, title: 'Hand Cricket', url: 'hand-cricket/public/index.html' },
      { id: 2, title: 'RPS', url: 'rps/frontend/index.html' },
      { id: 3, title: 'PG Economy', url: 'pg-economy/index.html' },
      { id: 4, title: 'Contact', url: 'contact.html' }
    ];

    function performSearch() {
      const query = document.getElementById('searchInput').value.toLowerCase();
      const resultsContainer = document.getElementById('searchResults');
      resultsContainer.innerHTML = '';

      const filteredData = data.filter(item => item.title.toLowerCase().includes(query));

      if (filteredData.length > 0) {
        filteredData.forEach(item => {
          const resultElement = document.createElement('div');
          resultElement.innerHTML = `<a href="${item.url}">${item.title}</a>`;
          resultsContainer.appendChild(resultElement);
        });
      } else {
        resultsContainer.innerHTML = '<p>No results found</p>';
      }
    }

    // Navigation functions
    function goToHandCricket() {
        window.location.href = 'handcricket.php';
    }
    function goTorps() {
        window.location.href = 'rps/frontend/index.html';
    }
    function gotosignup() {
        window.location.href = 'index.html';
    }
    function signout() {
        window.location.href = 'logout.php';
    }
    function profile() {
        window.location.href = 'profile.php';
    }
    function openNav() {
        document.getElementById('mySidenav').style.width = '250px';
    }
    function closeNav() {
        document.getElementById('mySidenav').style.width = '0';
    }
    function openNav1() {
        document.getElementById('mySidenav1').style.width = '250px';
    }
    function closeNav1() {
        document.getElementById('mySidenav1').style.width = '0';
    }


    // pop ups
    function togglePopup() {
        const popup = document.getElementById('userPopup');
        popup.style.display = (popup.style.display === 'flex') ? 'none' : 'flex';
    }

    window.onclick = function(event) {
        const popup = document.getElementById('userPopup');
        if (!event.target.matches('img') && !popup.contains(event.target)) {
            popup.style.display = 'none';
        }
    }
    function togglePopup1() {
        const popup1 = document.getElementById('userPopup1');
        popup1.style.display = (popup1.style.display === 'block') ? 'none' : 'block';
    }

    // window.onclick = function(event) {
    //     const popup1 = document.getElementById('userPopup1');
    //     if (!event.target.matches('img') && !popup1.contains(event.target)) {
    //         popup1.style.display = 'none';
    //     }
    // }
</script>

</body>

</html>
