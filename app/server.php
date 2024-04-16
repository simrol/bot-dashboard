<div id="overlay" class="cover blur-in">
  <div class="content">
    <header><meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
	</header>
	
	<div class="container">
		
		<div class="sidebar">
      <div class="nav-btn">Menu</div>
			<nav>
				<a href="#"><?php $hostname = gethostname();
echo " " . $hostname; ?></a>
				<ul>
          
					<li class="active"><a href="/dashboard.php">🔧 
 Kezelőfelület</a></li>
          <li><a href="/my/ticket/new">🎫 Új hiba bejelentés</a></li>
           <li><a href="/profilechange">⬅️ Fiókváltás</a></li>
          <li><a href="/my/totp">🔑 TOTP</a></li>
          <li><a href="/policy">📖 Adatvédelem</a></li>
          
          <li><a href="https://status.dunkelmann.hu"> 🟢 Státusz</a></li>
					
				</ul>
			</nav>
		</div>

		<div class="main-content">
			<h1>Beállítások a szerveren</h1>
			<p>Itt nézheted át az aktuális konfigurációt a szerverednek.</p>
			<div class="panel-wrapper">
				<div class="panel-head">
					Alap információk
				</div>
				<div class="panel-body">
					A neved <?php echo $_SESSION['username']; ?>.<button id="copyButton">Név kimásolása</button> <br><br><br>
            Automatikusan generált avatar:
       <center> 
        <a id="logo" href="#"><img src="https://eu.ui-avatars.com/api/?name=<?php echo $_SESSION['username']; ?>&size=125&background=random&rounded=true" onmouseover="this.title='Ez egy automatikusan generált avatar.'" alt="profil"></a> </center>
				</div>
			</div>
      <div class="panel-wrapper">
				<div class="panel-head">
					Tárolókapacitás
				</div>
				<div class="panel-body">
					
            <!DOCTYPE html>
<html>
<head>
  <title>Beállítások</title>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
 

 
</body>
</html>
            szia

  
            <style>
    /* Stílus a gombnak */
    .premium-button {
      padding: 10px 20px;
      background-color: #4CAF50;
      color: white;
      border: none;
      border-radius: 5px;
      cursor: pointer;
    }
              /* Stílus a gombnak */
    .premium-button2 {
      padding: 10px 20px;
      background-color: #33A8FF;
      color: white;
      border: none;
      border-radius: 5px;
      cursor: pointer;
    }
  </style>
<br>
            
				</div>
			</div>
			<div class="panel-wrapper">
				<div class="panel-head">
					Adatvédelem és biztonság
				</div>
				<div class="panel-body">
					A felhasználóneved nem publikus. Csak a rendszer látja,azonosítás céljából.Amennyiben DFilms+ előfizetést veszel,hozzájárúlsz a felhasználóneved fejlesztői betekintéshez. A jelszavad,mindenki számára beleértve a fejlesztőket is, privát.További információkat megtalálsz az <a href="/my/policy">Adatvédelmünk oldalán.</a>
          
				</div>
			</div>
			<div class="panel-wrapper">
				<div class="panel-head">
					Tartalmak korlátozása
				</div>
				<div class="panel-body">
					A tartalmak korlátozásához gyerekzár beállítását biztosítjuk mindenkinek.<br><br>
          <button class="premium-button2" onclick="setChildLockCode()">Gyerekzár beállítás</button><br>
		  A gyerekzár bekapcsolását átraktuk a főoldalra.
				</div>
			</div>
			<div class="panel-wrapper">
				<div class="panel-head">
					Műveletek a fiókkal
				</div>
				<div class="panel-body">
					<strong>Adatok eltávolításánál a felhasználói fiók megszűnik. Az adatok nem állíthatóak utána vissza,ha volt előfizetésed az is automatikusan törölve lesz. Amennyiben újból regisztrálsz azonos néven,az előfizetést meg kell venni újból. </strong><br>
           <button id="deleteButton" class="delete-button">Fiók törlése</button>
</form><button id="signoutButton" class="signout-button">Kijelentkezés</button>

</form>
				</div>
			</div>
		</div>
	</div>
	<script>
// Ellenőrzi, hogy a gyerekzár be van-e kapcsolva
function isChildLockEnabled() {
    return document.cookie.includes("childLock=true");
}

// Ellenőrzi a saját kódot
function checkCode() {
    var enteredCode = prompt("Kérlek, add meg a személyreszabott kódot:");

    // Az ellenőrzés logikája: itt a helyes kód
    var correctCode = getStoredChildLockCode();
    
    // Ellenőrizzük, hogy a beírt kód egyezik-e a helyes kóddal
    if (enteredCode === correctCode) {
        if (isChildLockEnabled()) {
            alert("Gyerekzár kikapcsolva!");
            // Gyerekzár kikapcsolása: Töröljük a sütiben tárolt értéket
            document.cookie = "childLock=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/";
            // Engedélyezzük az összes hivatkozást
            enableAllLinks();
        } else {
            alert("Gyerekzár bekapcsolva!");
            // Gyerekzár bekapcsolása: Tároljuk a sütiben, hogy be van kapcsolva
            document.cookie = "childLock=true; expires=Thu, 31 Dec 2037 12:00:00 UTC; path=/";
            // Letiltjuk az összes hivatkozást
            disableAllLinks();
        }
    } else {
        alert("Hibás kód. Gyerekzár marad bekapcsolva vagy bekapcsolva marad.");
    }
}

// Letiltja az összes hivatkozást
function disableAllLinks() {
    var links = document.getElementsByTagName("a");
    for (var i = 0; i < links.length; i++) {
        links[i].onclick = function(event) {
            event.preventDefault();
            alert("Gyerekzár bekapcsolva! Nem lehet átlépni egy másik oldalra.");
        };
    }
}

// Engedélyezi az összes hivatkozást
function enableAllLinks() {
    var links = document.getElementsByTagName("a");
    for (var i = 0; i < links.length; i++) {
        links[i].onclick = null;
    }
}

// Beállítja a gyerekzár kódját és elmenti a sütikben
function setChildLockCode() {
    if (isChildLockEnabled()) {
        var enteredCode = prompt("Kérlek, add meg a jelenlegi gyerekzár kódját a módosításhoz:");
        var correctCode = getStoredChildLockCode();

        // Ellenőrizzük, hogy a beírt kód egyezik-e a helyes kóddal
        if (enteredCode === correctCode) {
            var newCode = prompt("Kérlek, add meg az új gyerekzár kódot:");

            // Ellenőrizheted itt az új kód formátumát vagy bármilyen szabályt
            // Például: if (isValidCodeFormat(newCode)) { ... }

            // Elmentjük az új kódot a sütiben
            document.cookie = "childLockCode=" + newCode + "; expires=Thu, 31 Dec 2037 12:00:00 UTC; path=/";
            alert("Gyerekzár kód frissítve!");
        } else {
            alert("Hibás kód. Nem lehet módosítani a gyerekzár kódját. Ellenőrízd hogy valamit nem gépeltél el!");
        }
    } else {
        var newCode = prompt("Kérlek, add meg az új gyerekzár kódot:");

        // Ellenőrizheted itt az új kód formátumát vagy bármilyen szabályt
        // Például: if (isValidCodeFormat(newCode)) { ... }

        // Elmentjük az új kódot a sütiben
        document.cookie = "childLockCode=" + newCode + "; expires=Thu, 31 Dec 2037 12:00:00 UTC; path=/";
        alert("Gyerekzár kód frissítve!");
    }
}

// Visszaadja a sütiben tárolt gyerekzár kódot
function getStoredChildLockCode() {
    var decodedCookie = decodeURIComponent(document.cookie);
    var cookieArray = decodedCookie.split(';');
    for (var i = 0; i < cookieArray.length; i++) {
        var cookie = cookieArray[i].trim();
        if (cookie.indexOf("childLockCode=") == 0) {
            return cookie.substring("childLockCode=".length, cookie.length);
        }
    }
    return null;
}
// Példa a newCode változó HTML-be történő beillesztésére
var messageContainer = document.getElementById("message-container");
messageContainer.textContent = "Az új kód: " + encodeURIComponent(newCode);


</script>
<style>
  .delete-button {
    background-color: #dc3545;
    color: white;
    border: none;
    padding: 10px 20px;
    font-size: 16px;
    border-radius: 5px;
    cursor: pointer;
  }

  .delete-button:hover {
    background-color: #c82333;
  }

  .signout-button {
    background-color: #00a5f2;
    color: white;
    border: none;
    padding: 10px 20px;
    font-size: 16px;
    border-radius: 5px;
    cursor: pointer;
  }

  .signout-button:hover {
    background-color: #0282b5;
  }
</style>
      
<script>
  // Az oldal betöltődésekor történő eseménykezelő hozzáadása
  document.addEventListener('DOMContentLoaded', async () => {
    const premiumResultDiv = document.getElementById('premiumResult');

    try {
      // Lekérdezés küldése a szervernek
      const response = await fetch('/premium', {
        method: 'POST',
        headers: {
          'Content-Type': 'application/json'
        },
        body: JSON.stringify({ name: 'Roland' }) // Itt beállíthatod a felhasználó nevét
      });

      // A válasz JSON dekódolása
      const data = await response.json();

      // Prémium státusz megjelenítése
      if (data.hasOwnProperty('premium')) {
        premiumResultDiv.innerText = data.premium ? 'Prémium felhasználó' : 'Ingyenes felhasználó';
      } else {
        premiumResultDiv.innerText = 'Hiba történt a prémiumtagság lekérdezése közben.';
      }
    } catch (err) {
      console.error('Hiba a szerverrel való kommunikáció során:', err);
      premiumResultDiv.innerText = 'Hiba történt az előfizetés lekérdezése során. Amennyiben nem múlik el a hiba,keresd fel a https://film.dunkelmann.hu/support oldalon a discord szerverünket!';
    }
  });
</script>

<script>
  document.getElementById("signoutButton").addEventListener("click", function() {
    signoutAccount();
  });

  function signoutAccount() {
    var confirmation = confirm("Biztosan ki szeretnél lépni a fiókodból?");
    if (confirmation) {
       window.location.href = "/logout" ;
      // Itt lehet külön oldalra irányítani a kijelentkezés sikeres oldalra:
      // window.location.href = "/logout/success";
      // Vagy üzenetet jeleníthetsz meg a felhasználónak:
      alert("Sikeres kijelentkezés.");
    }
  }
</script>

<script>document.getElementById("deleteButton").addEventListener("click", function() {
  deleteAccount();
});
      function deleteAccount() {
  var confirmation = confirm("Biztosan törölni szeretnéd a fiókodat? A Fiókod törlése az összes adatot törölni fogja,kiléptet és regisztrálhatóvá válik a név.");
  if (confirmation) {
    window.location.href = "/delacc" ;
    // ...
    // Végrehajtás után lehetőleg irányítsd át a felhasználót egy másik oldalra vagy jelentsd vissza a törlés sikerességét.
    alert("Fiók sikeresen törölve.");
  }
}
     // JavaScript kód

document.getElementById("copyButton").addEventListener("click", function() {
  copyUsername();
});
        function copyUsername() {
  var username = "<%= username %>";
  var tempInput = document.createElement("input");
  tempInput.value = username;
  document.body.appendChild(tempInput);
  tempInput.select();
  document.execCommand("copy");
  document.body.removeChild(tempInput);
          alert("Kimásolva")
  
}
  
      </script>
    <style>@import 'https://fonts.googleapis.com/css?family=Lato:300,400';

* {
	margin: 0;
	padding: 0;
	box-sizing: border-box;
}
body, html {
	font-family: 'Lato', sans-serif;
	font-size: 20px;
	height: 100%;
	position: relative;
}

.clearfix:after {
	content: "";
	display: block;
	clear: both;
}

a {
	color: #16549A;
	text-decoration: none; 
}

.nav-btn {
	width: 100%;
	height: 35px;
	padding-top: 4px;
	color: #D5D3D3;
	background-color: #212121;			 ;
	text-align: center;
	cursor: pointer;
	display: none;
}
.nav-btn:active {
	background-color: #090909; 
}

header {
	height: 50px;
	width: 100%;
	background-color: #274C6B;
	display: none;
}

header .logo {
	opacity: 0.9;
	font-size: 120%;
	padding-top: 9px;
	padding-left: 8px;
	color: #fff;
}
header .logo span {
	font-weight: 300;
}

.container {
	width: 100%;
	height: 100%;
	position: relative;
}

.sidebar {
	width: 250px;
	background-color: #302F2F;
	position: fixed;
	top: 0px;
	left: 0;
	bottom: 0;
	box-shadow: 1px 0px 10px #777;
}

.sidebar nav > a {
	font-size: 150%;
	display: inline-block;
	padding: 30px 0px;
	padding-left: 30px;
	opacity: 0.7;
	transition: all 0.2s;
}
.sidebar nav > a:hover {
	opacity: 1;
}

.sidebar nav a span {
	font-weight: 300;
}

.sidebar nav ul {
	list-style: none;
}

.sidebar nav ul li {
	font-size: 70%;
	padding: 19px 0;	
	padding-left: 20px;
	border-bottom: 0.5px solid #111;
}

.sidebar nav ul li:nth-child(1):hover {
	background-color: #2980b9;
}

.sidebar nav ul li:nth-child(1).active {
	background-color: #2980b9;
}

.sidebar nav ul li:nth-child(2):hover {
	background-color: #2980b9;
}

.sidebar nav ul li:nth-child(2).active {
	background-color: #2980b9;
}

.sidebar nav ul li:nth-child(3):hover {
	background-color: #2980b9;
}

.sidebar nav ul li:nth-child(3).active {
	background-color: #2980b9;
}

.sidebar nav ul li:nth-child(4):hover {
	background-color: #2980b9;
}

.sidebar nav ul li:nth-child(4).active {
	background-color: #2980b9;
}

.sidebar nav ul li:nth-child(5):hover {
	background-color: #2980b9;
}

.sidebar nav ul li:nth-child(5).active {
	background-color: #2980b9;
}


.sidebar nav ul li a {
	color: #D7D5D5;
}

.sidebar nav ul li:hover a{
	color: #fff;
}

.main-content {
	background-color: #fafafa;
	width: calc(100% - 250px);
	height: 100%;
	margin-left: 250px;
	padding: 20px 30px;
}
.main-content .panel-wrapper {
	margin: 20px 0;
	box-shadow: 0px 1px 5px #777;
}

.main-content .panel-wrapper .panel-head {
	background-color: #00A5F2;
	color: #fff;
	padding: 10px 10px;
	border: 1px solid #00A5F2;
}
.main-content .panel-wrapper .panel-body {
	padding: 20px 10px;
	font-size: 80%;
}

@media only screen and (max-width: 420px){
	header {
		display: block;
	}
	.nav-btn {
		display: block;
	}
	.sidebar {
		position: relative;
		height: 378px;
		width: 100%;
		display: none;
		margin-bottom: 40px;
		z-index: 1000;
	}
	.main-content {
		width: 100%;
		margin-left: 0;
		z-index: -1;
		position: relative;
	}
}

@media only screen and (max-width: 768px){
	header {
		display: block;
	}
	.nav-btn {
		display: block;
	}
	.sidebar {
		position: relative;
		height: 378px;
		width: 100%;
		display: none;
		margin-bottom: 40px;
		z-index: 1000;
	}
	.main-content {
		width: 100%;
		margin-left: 0;
		z-index: -1;
		position: relative;
	}
}</style>
<script>$(document).ready(function() {
	$('.nav-btn').on('click', function(event) {
		event.preventDefault();
		/* Act on the event */
		$('.sidebar').slideToggle('fast');

		window.onresize = function(){
			if ($(window).width() >= 768) {
				$('.sidebar').show();
			} else {
				$('.sidebar').hide();
			}
		};
	});
});</script>
<script>
  window.<%= username %>location.href='/login';
  alert("A neved nem publikus az ellenőrző rendszer számára,így biztonsági okok miatt vissza irányítunk.")
</script>
<script>
    function checkPremium() {
      const username = document.getElementById('username').value;
      fetch(`/premium?username=${username}`)
        .then(response => response.text())
        .then(result => {
          document.getElementById('premiumStatus').innerText = result;
        })
        .catch(error => {
          console.error('Hiba az ellenőrzés során:', error);
          alert('Hiba történt az ellenőrzés során. Kérlek, próbáld újra később.');
        });
    }
  </script>
  <script src="https://uptime.betterstack.com/widgets/announcement.js" data-id="154458" async="async" type="text/javascript"></script>
  
  </div>
</div>

 
