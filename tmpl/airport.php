<?php
define('_JEXEC', 1);
define('JPATH_BASE', realpath(dirname(__FILE__) . '/../../../'));  
require_once JPATH_BASE . '/includes/defines.php';
require_once JPATH_BASE . '/includes/framework.php';

$mainframe = JFactory::getApplication('site');

$name = $_GET['name'];

$service = new AirportService();
echo $service->getAirportsByName($name);

class AirportService {
    private $db;
    private $query;

    public function __construct() {
        // Get a db connection.
        $this->db = JFactory::getDbo();
        // Create a new query object.
        $this->query = $this->db->getQuery(true);
    }

    public function getAirportsByName($name) {
        $name = '%' . $this->db->escape($name, true) . '%';

        $this->query->select($this->db->quoteName(array('id', 'airport_name', 'city_name', 'country_name', 'airport_code')));
        $this->query->from($this->db->quoteName('#__amadeus'));
        $this->query->where($this->db->quoteName('city_name') . ' LIKE ' . $this->db->quote($name, false) . ' OR ' . $this->db->quoteName('airport_name') . ' LIKE ' . $this->db->quote($name, false));
        $this->query->order('airport_name ASC');

        // Reset the query using our newly populated query object.
        $this->db->setQuery($this->query);

        // Load the results as a list of stdClass objects (see later for more options on retrieving data).
        $results = $this->db->loadObjectList();

        // Output the JSON data.
        return json_encode($results);
    }
}