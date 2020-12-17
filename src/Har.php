<?php 

namespace HarParser;
use JsonPath\JsonObject;

class Har {
	private $json = null;
	private $requests = [];
    private $path = ["request" => '$.log.entries[*].request'];
	public const HAR_FILE = 1;
	public const HAR_STRING = 2;

    public function __construct($string = "", $type = self::HAR_FILE) {
    	if ($string) $this->load($string, $type);
    }

    public function load($string = "", $type = self::HAR_FILE) {
    	if ($type === self::HAR_FILE) {
    		$this->json = new JsonObject(file_get_contents($string));
    	}
    	return $this->getJson();
	}

    public function findRequests() {
        $this->requests = $this->json->get($this->path["request"]);
        return $this->requests;
    }

    public function getJson() {
        return $this->json;
    }

    public function getRequests() {
        return $this->requests;
    }

}