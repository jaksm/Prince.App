// User
App\User::create(['name' => 'Jaksa Malisic', 'email' => 'jaksa.malisic@gmail.com', 'password' => bcrypt('thalionQWER')])

// Admin
App\Admin::create(['name' => 'Jaksa Malisic', 'email' => 'jaksa.malisic@gmail.com', 'password' => bcrypt('thalionQWER')])

// Destination
Destination::create(['naziv' => 'Beograd', 'ICAO' => 'LYBE'])
Destination::create(['naziv' => 'Pariz', 'ICAO' => 'CSBN'])
Destination::create(['naziv' => 'Cikago', 'ICAO' => 'CHY'])
Destination::create(['naziv' => 'Peking', 'ICAO' => 'PAT'])
Destination::create(['naziv' => 'Moskva', 'ICAO' => 'MOW'])


FlightStaff::create(['flight_id' => ['1', '3'], 'staffs_id' => ['1', '1']])

foreach ([1, 3] as $update) FlightStaff::create(['flight_id' => 1, 'staffs_id' => $update])

Client::create(['naziv' => 'RRStud']);
