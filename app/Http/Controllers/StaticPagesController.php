<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use GuzzleHttp\Pool;
use GuzzleHttp\Exception\GuzzleException;

class StaticPagesController extends Controller
{
    public function about()
    {
        $data = [];

        $requestParams = [
                'timeout'  => 10000,
            ];
        $client = new Client($requestParams);

		$url = 'https://api.coinmarketcap.com/v1/ticker/?limit=0';
	    
        try {
            $response = $client->request('GET', $url);
            $body = $response->getBody();
            if ($response->getStatusCode() == 200) {
            	$data = json_decode($body, true);
            }
        } catch (\Exception $e) {
            throw $e;
        }
        
        foreach ($data as $item) {
        	echo $item['id'] . ':' . $item['symbol'];
        	echo "<br/>";
        }
    }

    public function contact()
    {

    }

    public function help()
    {

    }
}
