
<p>A feladatott <b>PHP 7</b>-ben írtam</p>
<p>Ezen a linken érhető el az adatbázis SQL fájlja <b>database.sql</b> néven. Az oldal megfelelő működéséhez ezt importálni kell egy MYSQL szerverre</p>


<p>Adatbázs beállítások a <b>config.php</b> fájlba érhetőek el</p>
<ul>
    <li>DB_HOST -> Szerver címe</li>
    <li>DB_NAME -> Adatbázis neve</li>
    <li>DB_USER -> Adatbázis felhasználója</li>
    <li>DB_PASS -> Adatbzis jelszava</li>
</ul>

<p>A weboldal megfelelő működéséhez a config fájlba a <b>URL</b>-el definiált linket át kell írni a projekt nevére valamint a <b>.htaccess</b> fájlba is a RewriteBase mappát is megkell változtatni ugyan úgy a projekt nevére