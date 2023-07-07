<!DOCTYPE html>
<html lang='en'>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Lunardo Home Page</title>

    <!-- Keep wireframe.css for debugging, add your css to style.css -->
    <link id='wireframecss' type="text/css" rel="stylesheet" href="../wireframe.css" disabled>
    <link id='stylecss' type="text/css" rel="stylesheet" href="style.css?t=<?= filemtime("style.css"); ?>">
    <script src='../wireframe.js'></script>
  </head>

  <body>

    <header>
      <h1>Lunardo</h1>
    </header>

    <nav>
    | <a href="#About-Us">About Us</a> |
    <a href="#Seats-and-Prices">Seats and Prices</a> |
    <a href="#Now-Showing">Now Showing</a> |
    <a href="http://titan.csit.rmit.edu.au/~s3922141/wp/a2/booking.php">Bookings</a> |
    </nav>

    <main>
      <section id='About-Us'>
          <h2> About Us</h2>
          <p> The cinema has reopened after extensive improvements and renovations. </p>
          <p> There are new seats: standard seats and reclinable first class seats</p>
          <p> The projection and sound systems are upgraded with 3D Dolby Vision projection and Dolby Atmos sound.</p>
      </section>

      <section id='Seats-and-Prices'>
          <h2> Seats and Prices</h2>
          <article id="First-Class-Seats">
            <img src="../../media/Profern-Verona-Twin.png" alt="Profern Verona Twin" id = "Profern-Verona-Twin">
            <div id = "First-Class-Prices">
              <h3> First Class Seats</h3>
              <p> Adult $25 </p>
              <p> Concession $23.50</p>
              <p> Child $22.00</p>
            </div>
          </article> 
          <article id="Standard-Seats">
            <img src="../../media/Profern-Standard-Twin.png" alt="Profern Standard Twin" id = "Profern-Standard-Twin">
            <div id = "Standard-Prices">
              <h3> Standard Seats</h3>
              <p> Adult $21.50 </p>
              <p> Concession $19</p>
              <p> Child $17.50</p>
            </div>
            
          </article>
          <article id="Discounted-Seats">
            <h3> Discounts</h3>
            <p> Available weekday afternoons and all day Mondays </p>
            <table>
              <tr>
                <th>Seat Type</th>
                <th> Regular Price</th>
                <th> Discounted Price!</th>
                <th> Savings!</th>
              </tr>
              <tr>
                <th>Standard Adult</th>
                <th>$21.50</th>
                <th>$16</th>
                <th>$5.50</th>
              </tr>
              <tr>
                <th>Standard Concession</th>
                <th>$19</th>
                <th>$14.50</th>
                <th>$4.50</th>
              </tr>
              <tr>
                <th>Standard Child</th>
                <th>$17.50</th>
                <th>$13</th>
                <th>$4.50</th>
              </tr>
              <tr>
                <th>First Class Adult</th>
                <th>$31</th>
                <th>$25</th>
                <th>$6</th>
              </tr>
              <tr>
                <th>First Class Concession</th>
                <th>$28</th>
                <th>$23.50</th>
                <th>$4.50</th>
              </tr>
              <tr>
                <th>First Class Child</th>
                <th>$25</th>
                <th>$22</th>
                <th>$3</th>
              </tr>
            </table>
          </article>
      </section>
      
      <section id='Now-Showing'>
        <h2> Now Showing</h2>
        <div id ="Movies1and2">
          <div id ="Movie1">
            <div class="flip-box-movie1">
              <div class="flip-box-inner-movie1">
                <div class ="movie1front">
                  <img src="../../media/Oppenheimer.png" alt="Oppenheimer" id = "Oppenheimer">
                </div>
                <div class ="movie1back">
                  <h3>Oppenheimer</h3>
                  <p>info about Oppenheimer</p>
                </div>
              </div>
          </div>
          <p> Oppenheimer, R </p>
        </div>
          <div id ="Movie2">
            <img src="../../media/Barbie.png" alt="Barbie" id = "Barbie">
            <p> Barbie, PG-13 </p>
          </div>
        </div>
        <div id ="Movies3and4">
          <div id ="Movie3">
            <img src="../../media/IndianaJones.png" alt="Indiana Jones and the Dial of Destiny " id = "IndianaJones">
            <p> Indiana Jones and the Dial of Destiny, PG-13</p>
          </div>
          <div id ="Movie4">
            <img src="../../media/TMNT.png" alt="Teenage Mutant Ninja Turtles: Mutant Mayhem" id = "TMNT">
            <p> Teenage Mutant Ninja Turtles: Mutant Mayhem, PG-13</p>
          </div>
        </div>
        
      </section>
    </main>

    <footer>
      <div>| Lunardo@emailplace.com.au | 035967876 | 23 Main street, Springfield |</div>
      <div>&copy;<script>
        document.write(new Date().getFullYear());
      </script>, Benjamin Finn, S3922141, <a href="https://github.com/s3922141/wp">Github</a>, Last modified <?= date ("Y F d  H:i", filemtime($_SERVER['SCRIPT_FILENAME'])); ?>.</div>
      <div>Disclaimer: This website is not a real website and is being developed as part of a School of Science Web Programming course at RMIT University in Melbourne, Australia.</div>
      <div><button id='toggleWireframeCSS' onclick='toggleWireframe()'>Toggle Wireframe CSS</button></div>
    </footer>

  </body>
</html>
