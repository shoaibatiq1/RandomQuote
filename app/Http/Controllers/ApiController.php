<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function Quotes(Request $request){
       
        $client = new \GuzzleHttp\Client();
        $authToken = [
            'auth' => [
                $request->_token,
                ''
            ]
        ];
        $quotes=[]; 
        for($i=0;$i<=4;$i++){
            $response = $client->request('get','https://api.kanye.rest/', $authToken);
            $data = $response->getBody()->getContents();
            $result = json_decode($data, true);

             foreach($result as $key=>$value)
             {
                $quotes[]=$value;
             } 
             
            }
            return response()->json(['quotes'=>$quotes],200);
     }

}
