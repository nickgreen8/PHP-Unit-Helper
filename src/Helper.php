<?php
namespace N8G\PHPUnitHelper;

/**
 * This class holds a number of functions that can be utilised by any unit tests.
 *
 * @author Nick Green <nick@nick8green.co.uk>
 */
trait Helper
{
    /**
     * This function is used to call protected/private method of a class.
     *
     * @param  object &$object Instantiated object that we will run method on.
     * @param  string $method  Method name to call.
     * @param  array  $params  Array of parameters to pass into method.
     * @return mixed           Method return.
     */
    public static function invokeMethod(&$object, $method, array $params = array())
    {
        $reflection = new \ReflectionClass(get_class($object));
        $method     = $reflection->getMethod($method);
        $method->setAccessible(true);

        return $method->invokeArgs($object, $params);
    }

    /**
     * This function is used to get the value of a protected/private property of a class.
     *
     * @param  object &$object  Instantiated object that we will get the property value from.
     * @param  string $property Name of the property to be queried.
     * @return mixed            The value of the specified property.
     */
    public static function getValue(&$object, $property)
    {
        $reflection = new \ReflectionClass(get_class($object));
        $property   = $reflection->getProperty($property);
        $property->setAccessible(true);

        return $property->getValue($object);
    }

    /**
     * This function is used to set the value of a private/protected property of a class.
     *
     * @param  object &$object  Instantiated object that we will set the property value in.
     * @param  string $property The name of the property to interact with.
     * @param  mixed  $value    The value that is to be set in the property.
     * @return void
     */
    public static function setValue(&$object, $property, $value)
    {
        $reflection = new \ReflectionClass($object);
        $property   = $reflection->getProperty($property);
        $property->setAccessible(true);

        return $property->setValue($object, $value);
    }
}