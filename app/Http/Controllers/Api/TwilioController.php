<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Twilio\Rest\Client;

class TwilioController extends Controller
{
    private $accountId,$token,$fromNumber, $client;


    public  function __construct()
    {
        $this->accountId = getenv("TWILIO_SID")|| 'ACf6513b2d66de891b4380e7aab827332b';
        $this->token = getenv("TWILIO_AUTH_TOKEN") || '6a3539c86ac2bbe32db0a16673f700f7';
        $this->fromNumber = getenv("TWILIO_NUMBER") || '+19183471872';
        $this->client = new Client($this->accountId, $this->token);       

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
     

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function sendMessage(Request $request)
    {
     
        $phone = request('phone');
        $message  = request('message');

       

        $this->client->messages->create($phone, ['from' => $this->fromNumber, 'body' => $message]);


        return 'message sent';
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function sendCall(Request $request)
    {
        $phone = request('phone');
        
        // Initiate call and record call
        $call = $this->client->account->calls->create(
        
        $phone, // Destination phone number
        
        $this->fromNumber, // Valid Twilio phone number
        
        array(
          "record" => True,
          "url" => "http://demo.twilio.com/docs/voice.xml")
        );

        if($call) {
            echo 'Call initiated successfully';
        } else {
            echo 'Call failed!';
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
