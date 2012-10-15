<?php

class Object {

    public function __construct() {
        
    }

    /**
     * Object-to-string conversion.
     * Each class can override this method as necessary.
     *
     * @return string The name of this class
     */
    public function toString() {
        $class = get_class($this);
        return $class;
    }

    
    public function dispatchMethod($method, $params = array()) {
        switch (count($params)) {
            case 0:
                return $this->{$method}();
            case 1:
                return $this->{$method}($params[0]);
            case 2:
                return $this->{$method}($params[0], $params[1]);
            case 3:
                return $this->{$method}($params[0], $params[1], $params[2]);
            case 4:
                return $this->{$method}($params[0], $params[1], $params[2], $params[3]);
            case 5:
                return $this->{$method}($params[0], $params[1], $params[2], $params[3], $params[4]);
            default:
                return call_user_func_array(array(&$this, $method), $params);
        }
    }

    protected function _set($properties = array()) {
        if (is_array($properties) && !empty($properties)) {
            $vars = get_object_vars($this);
            foreach ($properties as $key => $val) {
                if (array_key_exists($key, $vars)) {
                    $this->{$key} = $val;
                }
            }
        }
    }

    /**
     * Merges this objects $property with the property in $class' definition.
     * This classes value for the property will be merged on top of $class'
     *
     * This provides some of the DRY magic CakePHP provides.  If you want to shut it off, redefine
     * this method as an empty function.
     *
     * @param array $properties The name of the properties to merge.
     * @param string $class The class to merge the property with.
     * @param boolean $normalize Set to true to run the properties through Hash::normalize() before merging.
     * @return void
     */
    protected function _mergeVars($properties, $class, $normalize = true) {
        $classProperties = get_class_vars($class);
        foreach ($properties as $var) {
            if (
                    isset($classProperties[$var]) &&
                    !empty($classProperties[$var]) &&
                    is_array($this->{$var}) &&
                    $this->{$var} != $classProperties[$var]
            ) {
                if ($normalize) {
                    $classProperties[$var] = Hash::normalize($classProperties[$var]);
                    $this->{$var} = Hash::normalize($this->{$var});
                }
                $this->{$var} = Hash::merge($classProperties[$var], $this->{$var});
            }
        }
    }

}
