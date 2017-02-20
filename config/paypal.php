<?php
return array(
// set your paypal credential
// Below credentials are different for sandbox mode and live mode.
'client_id' => 'AQWgRsKgbBEJRz4FC5PYJ6q3Yd7VXG9XOKZGOLQZpK3OrtiLGZrkJ5uey8_FlNznlv35MtbYvqP-nDT_',
'secret' => 'ED6wpxcJLqFU8zIRPmZdWaY3q92c4K5Y_fNqNkOrdLnavoIpb2PlFeE-9xjE08SMsbrBeUueyLlC3uou',

/**
* SDK configuration
*/
'settings' => array(
/**
* Available option 'sandbox' or 'live'
* Remember sandbox id and secret will be different than live
*/
'mode' => 'sandbox',

/**
* Specify the max request time in seconds
*/
'http.ConnectionTimeOut' => 30,

/**
* Whether want to log to a file
*/
'log.LogEnabled' => true,

/**
* Specify the file that want to write on
*/
'log.FileName' => storage_path() . '/logs/paypal.log',

/**
* Available option 'FINE', 'INFO', 'WARN' or 'ERROR'
*
* Logging is most verbose in the 'FINE' level and decreases as you
* proceed towards ERROR
*/
'log.LogLevel' => 'FINE'
),
);