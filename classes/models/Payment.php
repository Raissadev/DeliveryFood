<?php

  // namespace models;

  class Payment{

    private $key;
    private $url;
    private $data;
    private $endpoint;
    private $callback;

    public function __construct(){
      $this->url = 'https://api.stripe.com';
      $this->key = 'sk_test_suaApiKey';
    }

    public function payIntent($amount){
      $this->endpoint = '/v1/payment_intents';
      $this->data = [
          "amount"               => $amount,
          "currency"             => "brl",
          "payment_method_types" => ["card"],
        ];

      $this->post();
      return $this;
    }

    public function callback(){
      return $this->callback();
    }


    public function post(){
      $url_format = $this->url.$this->endpoint;
      $key_format = ['api_key' => $this->key];

      $ch = curl_init($url_format);
      curl_setopt($ch, CURLOPT_POST, true);
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
      curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($this->data)
    );
      curl_setopt($ch, CURLOPT_HTTPHEADER, ["Authorization: Bearer sk_test_**"]);
      $this->callback = json_decode(curl_exec($ch));
      curl_close($ch);

    }

  }

?>
