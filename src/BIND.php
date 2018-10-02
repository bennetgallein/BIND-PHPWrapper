<?php
/**
 * Created by PhpStorm.
 * User: bennet
 * Date: 02.10.18
 * Time: 13:00
 */

namespace BIND;


use BIND\classes\Zone;

class BIND {

    private $host;
    private $port;
    private $https;
    private $path;

    /**
     * BIND constructor.
     * @param String $host The Host of the API
     * @param int $port The Port of the API
     */
    public function __construct(String $host, int $port = 5000, $https = false) {
        $this->host = $host;
        $this->port = $port;
        $this->https = $https;
    }

    /**
     * Get the Port that is set
     * @return int
     */
    public function getPort(): int {
        return $this->port;
    }

    /**
     * Get the Host that is set
     * @return String
     */
    public function getHost(): String {
        return $this->host;
    }

    /**
     * @return bool
     */
    public function isHttps(): bool {
        return $this->https;
    }

    /**
     * @param string $method
     * @return mixed Response from the API
     */
    public function request($method = 'GET') {
        $ch = curl_init();
        $requestpath = ($this->isHttps() == true ? "https://" : "http://") . $this->getHost() . ":" . $this->getPort() . "/dns/" . $this->path;
        curl_setopt($ch, CURLOPT_URL, $requestpath);
        if ($method == "POST") {
            curl_setopt($ch, CURLOPT_POST, 1);
        }
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $output = curl_exec($ch);
        curl_close($ch);
        return json_decode($output);
    }

    /**
     * Get A Zone based on the Name
     * @param String $zone The Zone to be searched
     * @return Zone the Zone Object
     */
    public function getZone(String $zone) {
        $this->path = "zone/"  . $zone;
        $response = $this->request();

        return new Zone($response);
    }

    /** PUT OR POST
     * @param String $domain
     * @param int $ttl
     * @param String $recordType
     * @param String $value
     * @return bool
     */
    public function addRecord(String $domain, int $ttl, String $recordType, String $value) {
        return $this->manage($domain, $ttl, $recordType, $value);
    }

    /** DELETE METHOD
     * @param String $domain
     * @param int $ttl
     * @param String $recordType
     * @param String $value
     * @return bool
     */
    public function deleteRecord(String $domain, int $ttl, String $recordType, String $value) {
        return $this->manage($domain, $ttl, $recordType, $value, "DELETE");
    }

    /**
     * @param String $domain
     * @param int $ttl
     * @param String $recordType
     * @param String $value
     * @param String $method
     * @return bool if the reqest was a success
     */
    private function manage(String $domain, int $ttl, String $recordType, String $value, String $method = 'POST') {
        $this->path = "record/" . $domain . "/" . $ttl . "/" . $recordType . "/" . $value;
        $response = $this->request($method);
        if ($response->$domain == "DNS request successful") {
            return true;
        } else {
            return false;
        }
    }
}