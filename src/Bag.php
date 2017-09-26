<?php

namespace Railken;

/**
 * Bag is a container for key/value pairs.
 */
class Bag implements \IteratorAggregate, \Countable
{
    /**
     * Parameter storage.
     *
     * @var array
     */
    protected $parameters;
    
    /**
     * New instance
     *
     * @return $this
     */
    public static function factory($parameters)
    {
        return new static($parameters);
    }

    /**
     * Constructor.
     *
     * @param array $parameters An array of parameters
     */
    public function __construct($parameters = [])
    {
        if ($parameters instanceof self) {
            $this->parameters = $parameters->all();
        } else {
            $this->parameters = $parameters;
        }
    }

    /**
     * Dynamically access a parameter
     *
     * @param string $key
     *
     * @return mixed
     */
    public function __get($key)
    {
        return $this->get($key);
    }

    /**
     * Dynamically set a value for a a parameter
     *
     * @param string $key
     *
     * @return mixed
     */
    public function __set($key, $value)
    {
        return $this->set($key, $value);
    }

    /**
     * Returns the parameters.
     *
     * @return array An array of parameters
     */
    public function all()
    {
        return $this->parameters;
    }

    /**
     * Returns the parameter keys.
     *
     * @return array An array of parameter keys
     */
    public function keys()
    {
        return array_keys($this->parameters);
    }

    /**
     * Replaces the current parameters by a new set.
     *
     * @param array $parameters An array of parameters
     */
    public function replace(array $parameters = [])
    {
        $this->parameters = $parameters;
    }

    /**
     * Adds parameters.
     *
     * @param array $parameters An array of parameters
     */
    public function add(array $parameters = array())
    {
        $this->parameters = array_replace($this->parameters, $parameters);
    }

    /**
     * Returns a parameter by name.
     *
     * @param string $key     The key
     * @param mixed  $default The default value if the parameter key does not exist
     *
     * @return mixed
     */
    public function get($key, $default = null)
    {
        return array_key_exists($key, $this->parameters) ? $this->parameters[$key] : $default;
    }

    /**
     * Sets a parameter by name.
     *
     * @param string $key   The key
     * @param mixed  $value The value
     *
     * @return $this
     */
    public function set($key, $value)
    {
        $this->parameters[$key] = $value;

        return $this;
    }

    /**
     * Returns true if the parameter is defined.
     *
     * @param string $key The key
     *
     * @return bool true if the parameter exists, false otherwise
     */
    public function has($key)
    {
        return array_key_exists($key, $this->parameters);
    }

    /**
     * Alias @has
     *
     * @param string $key The key
     *
     * @return bool true if the parameter exists, false otherwise
     */
    public function exists($key)
    {
        return $this->has($key);
    }

    /**
     * Removes a parameter.
     *
     * @param string $key The key
     *
     * @return $this
     */
    public function remove($key)
    {
        unset($this->parameters[$key]);

        return $this;
    }

    /**
     * Returns an iterator for parameters.
     *
     * @return \ArrayIterator An \ArrayIterator instance
     */
    public function getIterator()
    {
        return new \ArrayIterator($this->parameters);
    }

    /**
     * Returns the number of parameters.
     *
     * @return int The number of parameters
     */
    public function count()
    {
        return count($this->parameters);
    }

    /**
     * Get only specific parameters by keys
     *
     * @param array $keys
     *
     * @return this
    */
    public function only(array $keys)
    {
        return new static(array_intersect_key($this->parameters, array_flip($keys)));
    }

    /**
     * Filter current bag with specific parameters by keys
     *
     * @param array $keys
     *
     * @return this
    */
    public function filter(array $keys)
    {
        $this->parameters = array_intersect_key($this->parameters, array_flip($keys));

        return $this;
    }
}
