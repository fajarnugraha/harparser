<?php 

namespace HarParser;
use JsonPath\JsonObject;

class Har {
	public $json = null;
	public $requests = [];
	public const HAR_FILE = 1;
	public const HAR_STRING = 2;

    public function __construct($string = "", $type = self::HAR_FILE) {
    	if ($string) $this->load($string, $type);
    }

    public function load($string = "", $type = self::HAR_FILE) {
    	if ($type === self::HAR_FILE) {
    		$this->json = new JsonObject(file_get_contents($string));
    	}
    	return $this->json;
	}

}