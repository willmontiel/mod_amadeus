<?php

$name = $_GET['name'];

$service = new AirportService();
echo $service->getAirportsByName($name);

class AirportService {
    public function getAirportsByName($name) {
        $obj = new stdClass();
        $obj->id = 'CLO';
        $obj->name = 'Cali, Colombia (CLO)';
        $obj->description = 'Alfonso B. Aragon';
        $res = array($obj);

        // Output the JSON data.
        return json_encode($res);
    }
}