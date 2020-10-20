<?php

/*
 * Send a Telegram messsage by Curl using the Telegram API
 */

define('API_URL'    , 'https://api.telegram.org');
define('USER_AGENT' , 'Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.8.1.6) Gecko/20070725 Firefox/2.0.0.6');
define('TOKEN'      , '');
define('CHAT_ID'    , '');
define('MESSAGE'    , '');

$curl = curl_init();

curl_setopt($curl, CURLOPT_USERAGENT      , USER_AGENT);
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER , false);
curl_setopt($curl, CURLOPT_RETURNTRANSFER , true);
curl_setopt($curl, CURLOPT_URL, API_URL
	. '/bot'      . urlencode(TOKEN) . '/sendMessage'
	. '?chat_id=' . urlencode(CHAT_ID)
	. '&text='    . urlencode(MESSAGE));

$output = curl_exec($curl);
curl_close($curl);

echo $output;
