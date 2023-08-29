<?php

/* Call this function in the booking page like so:
   $postErrors = validateBooking();
   If the array is empty, then no errors were generated
*/
function validateBooking() {
  $errors = []; // new empty array to return multiple error messages
  $username = trim($_POST['customer']['name']);
  if ( $username == '') {
    $errors['honest']['name'] = "Name can't be blank";
  } else {
    // more advanced name checks here with better error message
  }
  $email = trim($_POST['customer']['email']);
  if ($email == '') {
    $errors['honest']['email'] = "Email can't be blank";
  } else {
    // more advanced email checks here with better error message
  }
  
  //is movie code not one of the valid options
  $movie = trim($_POST['movie']);
  if ($movie != 'ACT' && $movie != 'RMC' && $movie != 'ANM' && $movie != 'DRM') {
    $errors['dishonest']['movie'] = "Invalid or missing movie code";
  } else {
    // more advanced email checks here with better error message
  }
  // ... repeat for all other form field checks

  return $errors; // empty array -> no errors; populated array -> errors.
}



?>
