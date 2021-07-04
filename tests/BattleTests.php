<?php

namespace BattleSystem\Tests;

use Exception;
use PHPUnit\Framework\TestCase;
use ReflectionClass;
use ReflectionException;

class BattleTests extends TestCase
{
    /**
     * @param $object
     * @param string $method
     * @param array $parameters
     * @return mixed
     * @throws Exception
     */
    protected function callMethod($object, string $method , array $parameters = [])
    {
        try {
            $className = get_class($object);
            $reflection = new ReflectionClass($className);
        } catch (ReflectionException $e) {
            throw new Exception($e->getMessage());
        }

        $method = $reflection->getMethod($method);
        $method->setAccessible(true);

        return $method->invokeArgs($object, $parameters);
    }
}