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
    private $name;

    public function __construct(array $input, string $name) {
        $this->rawinput = $input;
        $this->name = $name;

        $this->answer = $input[0]->Answer;
        $this->recordType = new RecordTypes($input[0]->RecordType);
        $this->recordType = $this->recordType->getKey();
        $this->ttl = $input[0]->TTL;

    }

    /**
     * @return string
     */
    public function getName() {
        return $this->name;
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