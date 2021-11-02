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
      $this->key = 'sk_test_51Jcdy2HUgQFXPmU5PD2UU9FYazEDyZUrSyoX9yCf0AO02hEel5OOEi0UlfZ8lrOB7WuNJCsyV5HaU8rGWSkHkmzv00b1EBQawD';
    }

    public function payIntent($user_id,$product_id,$payment_id,$card_number,$date_valid,$cvv,$amount){
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
      echo $this->url;
      $url_format = $this->url.$this->endpoint;
      $key_format = ['api_key' => $this->key];

      $ch = curl_init($url_format);
      curl_setopt($ch, CURLOPT_POST, true);
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
      curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($this->data)
    );
      curl_setopt($ch, CURLOPT_HTTPHEADER, ["Authorization: Bearer sk_test_51Jcdy2HUgQFXPmU5PD2UU9FYazEDyZUrSyoX9yCf0AO02hEel5OOEi0UlfZ8lrOB7WuNJCsyV5HaU8rGWSkHkmzv00b1EBQawD"]);
      $this->callback = json_decode(curl_exec($ch));
      curl_close($ch);
      $idReference = $this->callback->id;

      if($this->endpoint == '/v1/payment_intents'){
        $paymentInsert = \MySql::connect()->prepare("INSERT INTO `payments` VALUES (null,?,?,?,?,?,?,?,?)");
        $paymentInsert->execute(array($_POST['user_id'], $_POST['product_id'], $idReference, $_POST['card_number'], $_POST['date_valid'], $_POST['cvv'], $_POST['amount'],date("Y-m-d")));  
        echo "<script> alert('Pagamento efetuado com sucesso!') </script>";
        echo '<script> location.href = "'.BASE.'" </script>';
        unset($_SESSION['carrinho']);
      }

    }

  }

?>
