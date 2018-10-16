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

    public function __construct($input) {
        if ($input == null) {
            throw new \Exception("No Data returned");
        }
        $this->rawdata = $input;
        $i = 0;
        foreach ($input as $domain => $records) {
            $this->domain = $domain;
            if ($domain != "error") {
                foreach ($records as $name => $details) {
                    if (sizeof($details) > 1) {
                        foreach ($details as $detail) {
                            $this->records[$i] = new Record(array($detail), $name);
                            $i++;
                        }
                    } else {
                        $this->records[$i] = new Record($details, $name);
                        $i++;
                    }
                }
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