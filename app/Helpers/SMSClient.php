<?php

namespace App\Helpers;

class SMSClient
{
    /**
     * @var
     */
    private $client;

    /**
     * @var
     */
    private $result;

    /**
     * SMSClient constructor.
     */
    public function __construct()
    {
        $this->client = new \SoapClient(config('sms.server'));

        $this->client->Auth([
            'login' => config('sms.login'),
            'password' => config('sms.password'),
        ]);
    }

    /**
     * @param string $phone
     * @param string $message
     */
    public function sendMessage(string $phone, string $message)
    {
        $this->result = $this->client->SendSMS([
            'sender' => config('sms.sender'),
            'destination' => $phone,
            'text' => $message,
        ]);
    }

    /**
     * @return mixed
     */
    public function getResult()
    {
        return $this->result->SendSMSResult->ResultArray[0];
    }
}