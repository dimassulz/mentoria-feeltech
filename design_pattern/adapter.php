<?php

// Target/client
interface Share {

    // Request
    public function shareData();
}

// Adaptee/Service
class WhatsAppShare {

    // Special Request
    public function wappShare(String $string) {
        echo "Share data via WhatsApp: ' $string ' \n";
    }
}

// Adapter
class WhatsAppShareAdapter implements Share {

    private $whatsapp;
    private $data;

    //Injeta a dependencia da classe WhatsAppShare
    //$data o texto que ele vai compartilhar
    public function __construct(WhatsAppShare $whatsapp, String $data) {
        $this->whatsapp = $whatsapp; //setar a class WhatsAppShare
        $this->data = $data; // setar o nosso dado
    }

    public function shareData() {
        //invocar a classe WhatsAppShare e chamar o método wappShare
        //XML to JSON
        $this->whatsapp->wappShare($this->data);
    }
}


function clientCode(Share $share) {
    $share->shareData();
}

$wa = new WhatsAppShare();
$waShare = new WhatsAppShareAdapter($wa, "Hello Whatsapp - Teste");
clientCode($waShare);