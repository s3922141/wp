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
    | <a href="#About Us">About Us</a> |
    <a href="#Seats and Prices">Seats and Prices</a> |
    <a href="#Now Showing">Now Showing</a> |
    <a href="http://titan.csit.rmit.edu.au/~s3922141/wp/a2/booking.php">Bookings</a> |
    </nav>

    <main>
      <section id='About Us'>
          <h2> About Us</h2>
          <p> The cinema has reopened after extensive improvements and renovations. </p>
          <p> There are new seats: standard seats and reclinable first class seats</p>
          <p> The projection and sound systems are upgraded with 3D Dolby Vision projection and Dolby Atmos sound.</p>
      </section>

      <section id='Seats and Prices'>
          <h2> Seats and Prices</h2>
      </section>
      
      <section id='Now Showing'>
        <h2> Now Showing</h2>
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
