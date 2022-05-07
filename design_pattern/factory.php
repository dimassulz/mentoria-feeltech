<?php

interface Transport {
    public function ready() : void;
    public function dispatch() : void;
    public function deliver() : void;
}

class PlaneTransport implements Transport {
    public function ready(): void
    {
        echo "Envio pronto para usar o avião \n";
    }

    public function dispatch(): void
    {
        echo "Envio despachado no avião \n";
    }

    public function deliver(): void
    {
        echo "Envio entregue usando o avião \n";
    }
}

class TruckTransport implements Transport {
    public function ready(): void
    {
        echo "Envio pronto para usar o caminhão \n";
    }

    public function dispatch(): void
    {
        echo "Envio despachado no caminhão \n";
    }

    public function deliver(): void
    {
        echo "Envio entregue usando o caminhão \n";
    }
}

class BoatTransport implements Transport {
    public function ready(): void
    {
        echo "Envio pronto para usar o barco \n";
    }

    public function dispatch(): void
    {
        echo "Envio despachado no barco \n";
    }

    public function deliver(): void
    {
        echo "Envio entregue usando o barco \n";
    }
}

abstract class Delivery {
    abstract function getDeliveryTransport() : Transport;

    public function send() {
        $transport = $this->getDeliveryTransport(); // truck, plane, boat
        $transport->ready();
        $transport->dispatch();
        $transport->deliver();
    }
}

class AirDelivery extends Delivery {
    public function getDeliveryTransport(): Transport
    {
        return new PlaneTransport();
    }
}

class GroundDelivery extends Delivery {
    public function getDeliveryTransport(): Transport
    {
        return new TruckTransport();
    }
}

class WaterDelivery extends Delivery {
    public function getDeliveryTransport(): Transport
    {
        return new BoatTransport();
    }
}

function deliverWith(Delivery $delivery){
    $delivery->send();
}

echo "#######";
echo "Teste Envio Air \n";
deliverWith(new AirDelivery());

echo "#######";

echo "Teste Envio Ground \n";
deliverWith(new GroundDelivery());

echo "#######";

echo "Teste Envio Water \n";
deliverWith(new WaterDelivery());