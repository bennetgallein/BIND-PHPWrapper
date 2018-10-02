<?php
/**
 * Created by PhpStorm.
 * User: bennet
 * Date: 02.10.18
 * Time: 13:33
 */

namespace BIND\classes;


class Zone {

    private $domain;
    private $records = array();

    private $rawdata;

    public function __construct(\stdClass $input) {
        $this->rawdata = $input;
        foreach($input as $domain => $records) {
            $this->domain = $domain;
            foreach ($records as $name => $details) {
                $this->records[$name] = new Record($details);
            }
        }
    }

    /**
     * @return int|string
     */
    public function getDomain(): string {
        return $this->domain;
    }

    /**
     * @return mixed
     */
    public function getRecords(): array {
        return $this->records;
    }
}