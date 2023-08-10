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
      <img src="../../media/LunardoLogo.png" alt="Lunardo Logo" id = "LunardoLogo">
    </header>

    <nav>
    | <a href="#About-Us">About Us</a> |
    <a href="#Seats-and-Prices">Seats and Prices</a> |
    <a href="#Now-Showing">Now Showing</a> |
    <a href="http://titan.csit.rmit.edu.au/~s3922141/wp/a3/booking.php">Bookings</a> |
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
              <tr id ="TableHeadings">
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
        <div id ="Allmovies">
          <div id ="Movies1and2">
            <div id ="Movie1">
              <div class="flip-box-movie1" tabindex="0">
                <div class="flip-box-inner-movie1">
                  <div class ="movie1front">
                    <img src="../../media/Oppenheimer.png" alt="Oppenheimer" id = "Oppenheimer">
                  </div>
                  <div class ="movie1back">
                    <h3>Oppenheimer</h3>
                    <p>The story of American scientist J. Robert Oppenheimer and his role in the development of the atomic bomb. </p>
                    <h4>Session Times</h4>
                    <table>
                      <tr>
                        <th> Mon-Tue </th>
                        <th>   6pm </th>
                      </tr>
                      <tr>
                        <th> Wed-Fri </th>
                        <th>   - </th>
                      </tr>
                      <tr>
                        <th> Sat-Sun </th>
                        <th>   9pm </th>
                      </tr>
                    </table>
                    <a href="http://titan.csit.rmit.edu.au/~s3922141/wp/a3/booking.php" id="Book-Oppenheimer">Book Now</a>
                  </div>
                </div>
            </div>
            <p> Oppenheimer, R </p>
            <div id ="Movie2">
              <div class="flip-box-movie2" tabindex="0">
                <div class="flip-box-inner-movie2">
                  <div class ="movie2front">
                    <img src="../../media/Barbie.png" alt="Barbie" id = "Barbie">
                  </div>
                  <div class ="movie2back">
                    <h3>Barbie</h3>
                    <p>Barbie suffers a crisis that leads her to question her world and her existence. </p>
                    <h4>Session Times</h4>
                    <table>
                      <tr>
                        <th> Mon-Tue </th>
                        <th>   - </th>
                      </tr>
                      <tr>
                        <th> Wed-Fri </th>
                        <th>   12pm </th>
                      </tr>
                      <tr>
                        <th> Sat-Sun </th>
                        <th>   3pm </th>
                      </tr>
                    </table>
                    <a href="http://titan.csit.rmit.edu.au/~s3922141/wp/a3/booking.php" id="Book-Barbie">Book Now</a>
                  </div>
                </div>
              </div>
              <p> Barbie, PG-13 </p>
            </div>
          </div>
          <div id ="Movies3and4">
            <div id ="Movie3">
              <div class="flip-box-movie3" tabindex="0">
                <div class="flip-box-inner-movie3">
                  <div class ="movie3front">
                    <img src="../../media/IndianaJones.png" alt="IndianaJones" id = "IndianaJones">
                  </div>
                  <div class ="movie3back">
                    <h3>IndianaJones</h3>
                    <p>Archaeologist Indiana Jones races against time to retrieve a legendary artifact that can change the course of history. </p>
                    <h4>Session Times</h4>
                    <table>
                      <tr>
                        <th> Mon-Tue </th>
                        <th>   9pm </th>
                      </tr>
                      <tr>
                        <th> Wed-Fri </th>
                        <th>   9pm </th>
                      </tr>
                      <tr>
                        <th> Sat-Sun </th>
                        <th>   6pm </th>
                      </tr>
                    </table>
                    <a href="http://titan.csit.rmit.edu.au/~s3922141/wp/a3/booking.php" id="Book-IndianaJones">Book Now</a>
                  </div>
                </div>
            </div>
            <p> IndianaJones, PG-13 </p>
            <div id ="Movie4">
              <div class="flip-box-movie4" tabindex="0">
                <div class="flip-box-inner-movie4">
                  <div class ="movie4front">
                    <img src="../../media/TMNT.png" alt="TMNT" id = "TMNT">
                  </div>
                  <div class ="movie4back">
                    <h3>TMNT</h3>
                    <p>The Turtle brothers as they work to earn the love of New York City while facing down an army of mutants. </p>
                    <h4>Session Times</h4>
                    <table>
                      <tr>
                        <th> Mon-Tue </th>
                        <th>   12pm </th>
                      </tr>
                      <tr>
                        <th> Wed-Fri </th>
                        <th>   6pm </th>
                      </tr>
                      <tr>
                        <th> Sat-Sun </th>
                        <th>   12pm </th>
                      </tr>
                    </table>
                    <a href="http://titan.csit.rmit.edu.au/~s3922141/wp/a3/booking.php" id="Book-TMNT">Book Now</a>
                  </div>
                </div>
              </div>
              <p> TMNT, PG-13 </p>
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
