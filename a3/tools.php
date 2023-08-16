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
    'RMC' => [
    'title' => 'Barbie',
    'rating' => 'PG-13',
    'genre' => 'Adventure, Comedy, Fantasy',
    'summary' => 'Barbie suffers a crisis that leads her to question her world and her existence.',
    'plot' => '',
    'imdb' => 'tt1517268',
    'screening-summary' => 'Wednesday - Friday: 12pm, Saturday - Sunday: 3pm',
    'screenings' => [
      'WED' => [
        'time' => '12pm',
        'rate' => 'discount'
      ],
      'THU' => [
        'time' => '12pm',
        'rate' => 'discount'
      ],
      'FRI' => [
        'time' => '12pm',
        'rate' => 'discount'
      ],
      'SAT' => [
        'time' => '3pm',
        'rate' => 'regular'
      ],
      'SUN' => [
        'time' => '3pm',
        'rate' => 'regular'
        ]
      ]
    ],
    'ANM' => [
      'title' => 'Teenage Mutant Ninja Turtles: Mutant Mayhem',
      'rating' => 'PG-13',
      'genre' => 'Action, Adventure',
      'summary' => 'The Turtle brothers as they work to earn the love of New York City while facing down an army of mutants.',
      'plot' => '',
      'imdb' => 'tt8589698',
      'screening-summary' => 'Monday - Tuesday: 12pm, Wednesday - Friday: 6pm, Saturday - Sunday: 12pm',
      'screenings' => [
        'MON' => [
          'time' => '12pm',
          'rate' => 'discount'
        ],
        'TUE' => [
          'time' => '12pm',
          'rate' => 'discount'
        ],
        'WED' => [
          'time' => '6pm',
          'rate' => 'regular'
        ],
        'THU' => [
          'time' => '6pm',
          'rate' => 'regular'
        ],
        'FRI' => [
          'time' => '6pm',
          'rate' => 'regular'
        ],
        'SAT' => [
          'time' => '12pm',
          'rate' => 'regular'
        ],
        'SUN' => [
          'time' => '12pm',
          'rate' => 'regular'
        ]
      ]
    ],
    'DRM' => [
      'title' => 'Oppenheimer',
      'rating' => 'R',
      'genre' => 'Action, Adventure',
      'summary' => 'The story of American scientist J. Robert Oppenheimer and his role in the development of the atomic bomb.',
      'plot' => '',
      'imdb' => 'tt15398776',
      'screening-summary' => 'Monday - Tuesday: 6pm, Saturday - Sunday: 9pm',
      'screenings' => [
        'MON' => [
          'time' => '6pm',
          'rate' => 'discount'
        ],
        'TUE' => [
          'time' => '6pm',
          'rate' => 'regular'
        ],
        'SAT' => [
          'time' => '9pm',
          'rate' => 'regular'
        ],
        'SUN' => [
          'time' => '9pm',
          'rate' => 'regular'
        ]
      ]
    ],
  ];

// Set the response header to indicate JSON content
header('Content-Type: application/json');

// Check if the 'movie' parameter is set and corresponds to a valid movie
if (isset($_GET['movie']) && array_key_exists($_GET['movie'], $moviesObject)) {
    $selectedMovie = $moviesObject[$_GET['movie']];
    echo json_encode($selectedMovie);
} else {
    // If movie is not valid or not provided, return an error response
    echo json_encode(['error' => 'Invalid movie selection']);
}

$ratesObject = [
  'regular' => [
      'FCA' => 31.00, // First Class Adult regular price
      'FCP' => 28.00, // First Class Concession regular price
      'FCC' => 25.00, // First Class Child regular price
      'STA' => 21.50, // Standard Adult regular price
      'STP' => 19.00, // Standard Concession regular price
      'STC' => 17.50, // Standard Child regular price
  ],
  'discount' => [
      'FCA' => 25.00, // First Class Adult discount price
      'FCP' => 23.50, // First Class Concession discount price
      'FCC' => 22.00, // First Class Child discount price
      'STA' => 16.00, // Standard Adult discount price
      'STP' => 14.50, // Standard Concession discount price
      'STC' => 13.00, // Standard Child discount price
  ]
];
?>