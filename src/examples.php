<?php

class Container implements ArrayAccess
{
    /**
     * @var array
     */
    private array $values;

    /**
     * Container constructor.
     */
    public function __construct()
    {
        var_dump(__METHOD__);

        $this->values = [
            'one' => 1,
            'two' => 2,
            'three' => 3,
        ];
    }

    /**
     * @param mixed $offset
     * @return bool
     */
    public function offsetExists(mixed $offset): bool
    {
        var_dump(__METHOD__);

        return isset($this->values[$offset]);
    }

    /**
     * @param mixed $offset
     * @return mixed
     */
    public function offsetGet(mixed $offset): mixed
    {
        var_dump(__METHOD__);

        return $this->values[$offset] ?? null;
    }

    /**
     * @param mixed $offset
     * @param mixed $value
     * @return void
     */
    public function offsetSet(mixed $offset, mixed $value): void
    {
        var_dump(__METHOD__);

        if (is_null($offset)) {
            $this->values[] = $value;
        } else {
            $this->values[$offset] = $value;
        }
    }

    /**
     * @param mixed $offset
     * @return void
     */
    public function offsetUnset(mixed $offset): void
    {
        var_dump(__METHOD__);

        unset($this->values[$offset]);
    }
}

// Creating object

$obj = new Container;
echo PHP_EOL;

// Isset

var_dump(isset($obj['two']));
echo PHP_EOL;

// Array access

var_dump($obj['two']);
echo PHP_EOL;

// Unset

unset($obj['two']);
var_dump(isset($obj['two']));
echo PHP_EOL;

// Assigning value

$obj['two'] = 'New value';
var_dump($obj['two']);
echo PHP_EOL;

// Appending new values

$obj[] = 'Append 1';
$obj[] = 'Append 2';
$obj[] = 'Append 3';
echo PHP_EOL;

var_dump($obj);
echo PHP_EOL;
