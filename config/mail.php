<?php

return [

'driver' => 'smtp',
'host' => env('MAIL_HOST', 'smtp.gmail.com'),
'port' => env('MAIL_PORT', '587'),
'from' => ['address' => 'dmorton2297@gmail.com', 'name' => 'Dan Morton'],
'encryption' => env('MAIL_ENCRYPTION','tls'),
'username' => env('MAIL_USERNAME', 'username@gmail.com'),
'password' => env('MAIL_PASSWORD', 'password'),
'sendmail' => '/usr/sbin/sendmail -bs',

'pretend' => false,

];
