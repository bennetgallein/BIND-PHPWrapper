<?php
/**
 * Created by PhpStorm.
 * User: bennet
 * Date: 02.10.18
 * Time: 13:34
 */

namespace BIND\classes;


class Record {

    private $rawinput;

    private $answer;
    private $recordType;
    private $ttl;


    public function __construct(array $input) {
        $this->rawinput = $input;

        if (sizeof($input) > 1) {
            foreach ($input as $rec => $value) {
                $this->answer[$rec] = $value->Answer;
                $this->recordType[$rec] = new RecordTypes($value->RecordType); $this->recordType[$rec] = $this->recordType[$rec]->getKey();
                $this->ttl[$rec] = $value->TTL;
            }
        } else {
            $this->answer = $input[0]->Answer;
            $this->recordType = new RecordTypes($input[0]->RecordType); $this->recordType = $this->recordType->getKey();
            $this->ttl = $input[0]->TTL;
        }
    }

    /**
     * @return mixed
     */
    public function getAnswer() {
        return $this->answer;
    }

    /**
     * @return mixed
     */
    public function getRecordType() {
        return $this->recordType;
    }

    /**
     * @return mixed
     */
    public function getTTL() {
        return $this->ttl;
    }
}