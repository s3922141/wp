<?php

/* Call this function in the booking page like so:
   $postErrors = validateBooking();
   If the array is empty, then no errors were generated
*/
function validateBooking() {
  $errors = []; // new empty array to return multiple error messages
  $username = trim($_POST['user']['name']);
  if ( $username == '') {
    $errors['user']['name'] = "Name can't be blank";
  } else {
    // more advanced name checks here with better error message
  }
  $email = trim($_POST['user']['email']);
  if ($email == '') {
    $errors['user']['email'] = "Email can't be blank";
  } else {
    // more advanced email checks here with better error message
  }
  // ... repeat for all other form field checks

  return $errors; // empty array -> no errors; populated array -> errors.
}



?>
