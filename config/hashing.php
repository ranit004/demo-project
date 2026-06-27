<?php

/*
|--------------------------------------------------------------------------
| config/hashing.php — Password hashing
|--------------------------------------------------------------------------
| Bcrypt is the default driver used to hash user passwords.
*/

return [

    'driver' => 'bcrypt',

    'bcrypt' => [
        'rounds' => env('BCRYPT_ROUNDS', 12),
    ],

    'argon' => [
        'memory' => 65536,
        'threads' => 1,
        'time' => 4,
    ],

    'rehash_on_login' => true,

];
