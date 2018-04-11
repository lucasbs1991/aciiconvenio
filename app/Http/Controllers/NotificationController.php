<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use sngrl\PhpFirebaseCloudMessaging\Client;
use sngrl\PhpFirebaseCloudMessaging\Message;
use sngrl\PhpFirebaseCloudMessaging\Recipient\Topic;
use sngrl\PhpFirebaseCloudMessaging\Notification;

class NotificationController extends Controller
{
	public function index()
    {
    	$server_key = 'AIzaSyB-3LhCn-Ao-6BVrMAOze7Fd6uQk-y0PI0';
		$client = new Client();
		$client->setApiKey($server_key);
		$client->injectGuzzleHttpClient(new \GuzzleHttp\Client());

		$message = new Message();
		$message->setPriority('high');
		$message->addRecipient(new Topic('aciinotifications'));
		$message
		    ->setNotification(new Notification('Nova Promoção', 'A Flex Viagens tem um nova promoção. Não perca!'))
		    ->setData(['key' => 'value'])
		;

		$response = $client->send($message);
    }
}
