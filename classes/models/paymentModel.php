<?php

    // namespace models;

    class Payment{

        private $apiUrl;
        private $apiKey;
        private $endpoint;
        private $build;
        private $callback;

        public function __construct(){
            $this->apiUrl = 'https://api.stripe.com';
            $this->apiKey = 'sk_test_51JeQDGAJ0kxryLFBhrv1ZgPsSW6zv2dol4cPU8LACdtOIzHOdWcV7iZl4Oa9iDexC83TLN2eBmzGtEvCATdVkMhl002gYj5WJf';
        }

        public function customers($id, $email, $user){
            $this->endoint = '/v1/customers';
            $this->build = [
                "id"                => $id,
                'email'             => $email,
                'source'            => 'src_1JmjvSHUgQFXPmU5xs7JZ1pO',
                "object"            => "customer",
                "address"           => null,
                "balance"           => 0,
                "created"           => 1634748956,
                "currency"          => "brl",
                "default_source"    => null,
                "delinquent"        => false,
                "description"       => "description",
                "discount"          => null,
                "invoice_prefix"    => "A3179464",
                "invoice_settings"  => [
                  "custom_fields"           => null,
                  "default_payment_method"  => null,
                  "footer"                  => null
                ],
                "livemode"          => false,
                "metadata"          => [],
                "name"              => $user,
                "phone"             => null,
                "preferred_locales" => [],
                "shipping"          => null,
                "tax_exempt"        => "none"
            ];

            $this->post();
            return $this;
        }

        public function withCard(){
            $foodsCart = $_SESSION['carrinho'];
            $total = 0;
            $delivery = 20.00;
            foreach($foodsCart as $key => $value){
            $idFood = $key;
            $items = \MySql::connect()->prepare("SELECT * FROM `foods` WHERE id = '$value'");
            $items->execute();
            $items = $items->fetch();
            $valor = $value * $items['price'];
            $total+=$valor;
            }
            $this->endpoint = '/v1/charges';
            $this->build = [
                "id"                                =>  $product_id,
                "object"                            => "charge",
                "amount"                            => $total,
                "amount_captured"                   => 0,
                "amount_refunded"                   => 0,
                "application"                       => null,
                "application_fee"                   => null,
                "application_fee_amount"            => null,
                "balance_transaction"               => "txn_3JcedzHUgQFXPmU51q9TgI1o",
                "billing_details"                   => [
                  "address"                         => [
                    "city"                          => null,
                    "country"                       => null,
                    "line1"                         => null,
                    "line2"                         => null,
                    "postal_code"                   => null,
                    "state"                         => null
                ],
                  "email"                           => null,
                  "name"                            => null,
                  "phone"                           => null
                ],
                "calculated_statement_descriptor"   => null,
                "captured"                          => false,
                "created"                           => 1632350127,
                "currency"                          => "brl",
                "customer"                          => null,
                "description"                       => "My First Test Charge (created for API docs)",
                "disputed"                          => false,
                "failure_code"                      => null,
                "failure_message"                   => null,
                "fraud_details"                     => [],
                "invoice"                           => null,
                "livemode"                          => false,
                "metadata"                          => [],
                "on_behalf_of"                      => null,
                "order"                             => null,
                "outcome"                           => null,
                "paid"                              => true,
                "payment_intent"                    => null,
                "payment_method"                    => "card_1Jce2FHUgQFXPmU5XoP2ucVT",
                "payment_method_details"            => [
                  "card"                                => [
                    "brand"                                 => "visa",
                    "checks"                                => [
                      "address_line1_check"                     => null,
                      "address_postal_code_check"               => null,
                      "cvc_check"                               => "pass"
                                                            ],
                    "country"                       => "US",
                    "exp_month"                     => 8,
                    "exp_year"                      => 2022,
                    "fingerprint"                   => "BAIEtm8pPCmLZj6w",
                    "funding"                       => "credit",
                    "installments"                  => null,
                    "last4"                         => "4242",
                    "network"                       => "visa",
                    "three_d_secure"                => null,
                    "wallet"                        => null
                ],
                  "type"                        => "card"
            ],
                "receipt_email"             => null,
                "receipt_number"            => null,
                "receipt_url"               => "https://pay.stripe.com/receipts/acct_1Jcdy2HUgQFXPmU5/ch_3Jce2FHUgQFXPmU51MRaowL6/rcpt_KHCRa8mwcqk1cO3VH3dfpRQ3NCVv6Yw",
                "refunded"                  => false,
                "refunds"               => [
                  "object"                  => "list",
                  "data"                    => [],
                  "has_more"                => false,
                  "url"                     => "/v1/charges/ch_3Jce2FHUgQFXPmU51MRaowL6/refunds"
                ],
                "review"                     => null,
                "shipping"                   => null,
                "source_transfer"            => null,
                "statement_descriptor"       => null,
                "statement_descriptor_suffix"=> null,
                "status"                     => "succeeded",
                "transfer_data"              => null,
                "transfer_group"             => null
            ];

            $this->post();
            return $this;
        }

        public function callback(){
            return $this->callback();
        }

        public function post(){
            $url = $this->apiUrl . $this->endpoint;
            $api = ['api_key' => $this->apiKey];

            $ch = curl_init($url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($this->build));
            curl_setopt($ch, CURLOPT_HTTPHEADER, ["Authorization: Bearer sk_test_51Jcdy2HUgQFXPmU5PD2UU9FYazEDyZUrSyoX9yCf0AO02hEel5OOEi0UlfZ8lrOB7WuNJCsyV5HaU8rGWSkHkmzv00b1EBQawD"]);
            
            $this->callback = json_decode(curl_exec($ch)); 
            curl_close($ch);
        }

        public static function checkPayment(){
            $event = null;
            if ($event->type == "payment_intent.succeeded") {
                $intent = $event->data->object;
                printf("Succeeded: %s", $intent->id);
                http_response_code(200);
                exit();
            } elseif ($event->type == "payment_intent.payment_failed") {
                $intent = $event->data->object;
                $error_message = $intent->last_payment_error ? $intent->last_payment_error->message : "";
                printf("Failed: %s, %s", $intent->id, $error_message);
                http_response_code(200);
                exit();
            }
        }

    }


?>