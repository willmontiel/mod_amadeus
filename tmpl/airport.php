<?php
defined('_JEXEC') or die;

$name = $_GET['name'];

$service = new AirportService();
echo $service->getAirportsByName($name);

class AirportService {
    private $db;
    private $query;

    public function _construct() {
        // Get a db connection.
        $this->db = JFactory::getDbo();
        // Create a new query object.
        $this->query = $db->getQuery(true);
    }
    
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