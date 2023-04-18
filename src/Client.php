<?php

namespace CheapConnectSdk;

use Exception;

class Client
{

    private string $base_url = "https://account.cheapconnect.net/API/v1/";
    private readonly \GuzzleHttp\Client $client;
    private readonly string $apiKey;

    public function __construct(string $apiKey)
    {
        $this->client = new \GuzzleHttp\Client([
            'base_uri' => $this->base_url,
        ]);

        $this->apiKey = $apiKey;
    }

    /**
     * SendSmsMessage               Send an SMS message.
     *
     * @param  mixed $sender        Sender's phone number in E164 format
     * @param  mixed $recipient     Recipient's phone number in E164 format
     * @param  mixed $message       Message for recipient
     * @return void
     */
    public function SendSmsMessage(string $sender, string $recipient, string $message): void
    {
        $this->client->post('sms/SendSMS', [
            'form_params' => [
                'apikey' => $this->apiKey,
                'from' => str_replace('+', '', $sender),
                'to' => str_replace('+', '', $recipient),
                'msg' => $message
            ]
        ]);
    }

    /**
     * SendSmsMessage               Try to send an SMS message.
     *
     * @param  mixed $sender        Sender's phone number in E164 format
     * @param  mixed $recipient     Recipient's phone number in E164 format
     * @param  mixed $message       Message for recipient
     * @return bool                 `true` if the message was sent successful, `false` if not
     */
    public function TrySendSmsMessage(string $sender, string $recipient, string $message): bool
    {
        try {
            $this->SendSmsMessage($sender, $recipient, $message);
            return true;
        } catch (Exception) {
            return false;
        }
    }
}
