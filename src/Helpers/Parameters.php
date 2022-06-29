<?php

namespace Helpers;

class Parameters
{
    private $data = [];

    public function __construct($read = []) {
        $this->data = json_decode(json_encode($read), true);
    }

    public function setData($data)
    {
        $this->data = $data;
    }

    public function get($element, $filter = null, $default = null) {
        if(!isset($this->data[$element]) || !array_key_exists($element, $this->data) || !$this->data[$element]) {
            return $default;
        }

        if(is_scalar($this->data[$element])) {
            if(!$filter) {
                return $this->data[$element];
            }

            return filter_var($this->data[$element], $filter);
        }

        // if already Parameters instance, just return at this point
        if(get_class($this->data[$element]) === self::class) {
            return $this->data[$element];
        }

        // otherwise autoload into Parameters and hope for the best
        return new Parameters($this->data[$element]);
    }

    public function getRaw($element) {
        return $this->data[$element];
    }

    public function getString($element, $default = '') {
        return (string)$this->get($element, FILTER_SANITIZE_STRING, $default);
    }

    public function getInt($element, $default = 0)
    {
        return (int)$this->get($element, FILTER_SANITIZE_NUMBER_INT, $default);
    }

    public function getFloat($element, $default = 0.0)
    {
        return (float)$this->get($element, FILTER_SANITIZE_NUMBER_FLOAT, $default);
    }

    public function getNested($element)
    {
        return (array)$this->get($element, null, new Parameters());
    }

    public function getBool($element)
    {
        return (bool)$this->get($element, null, '');
    }

    public function getEmail($element, $default)
    {
        return (string)$this->get($element, FILTER_SANITIZE_EMAIL, $default);
    }
}
