<?php
  session_start();

  $moviesObject = [
    'ACT' => [
      'title' => 'Indiana Jones and the Dial of Destiny',
      'rating' => 'PG-13',
      'genre' => 'Action, Adventure',
      'summary' => 'Experience the return of legendary hero, Indiana Jones, in the fifth installment of this beloved swashbuckling series of films.',
      'plot' => 'Finding himself in a new era, approaching retirement, Indy wrestles with fitting into a world that seems to have outgrown him. But as the tentacles of an all-too-familiar evil return in the form of an old rival, Indy must don his hat and pick up his whip once more to make sure an ancient and powerful artifact doesn&apos;t fall into the wrong hands.',
      'imdb' => 'tt1462764',
      'screening-summary' => 'Monday - Tuesday: 9pm, Wednesday - Friday: 9pm, Saturday - Sunday: 6pm',
      'screenings' => [
        'MON' => [
          'time' => '9pm',
          'rate' => 'discount'
        ],
        'TUE' => [
          'time' => '9pm',
          'rate' => 'regular'
        ],
        'WED' => [
          'time' => '9pm',
          'rate' => 'regular'
        ],
        'THU' => [
          'time' => '9pm',
          'rate' => 'regular'
        ],
        'FRI' => [
          'time' => '9pm',
          'rate' => 'regular'
        ],
        'SAT' => [
          'time' => '6pm',
          'rate' => 'regular'
        ],
        'SUN' => [
          'time' => '6pm',
          'rate' => 'regular'
        ]
      ]
    ],
    'RMC' => [/* Put structured Rom-Com movie details here */],
    'ANM' => [/* Put structured Animation movie details here */],
    'DRM' => [/* Put structured Drama movie details here */],
  ];

/* Put your PHP variables, functions and modules here.
   Many will be provided in the teaching materials,
   keep a look out for them!
*/

?>