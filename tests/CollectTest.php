<?php

use PHPUnit\Framework\TestCase;

class CollectTest extends TestCase
{
    public function testCount()
    {
        $collect = new Collect\Collect([13,17]);
        $this->assertSame(2, $collect->count());
    }

    public function testKeys()
    {
        $myClass = new Collect\Collect(['key1' => 'value1', 'key2' => 'value2', 'key3' => 'value3']);
        $expectedKeys = ['key1', 'key2', 'key3'];
        $this->assertEquals($expectedKeys, $myClass->keys()->toArray());
    }

    public function testValues()
    {
        $myClass = new Collect\Collect(['key23' => 'value1', 'key24' => 'value2', 'key25' => 'value3']);
        $expectedValues = ['value1', 'value2', 'value3'];
        $this->assertEquals($expectedValues, $myClass->values()->toArray());
    }

    public function testGet()
    {
        $myClass = new Collect\Collect(['key11' => 'value11', 'key12' => 'value12', 'key13' => 'value13']);
        $this->assertEquals('value11', $myClass->get('key11'));
    }

    public function testExcept()
    {
        $myClass = new Collect\Collect(['key1' => 'value1', 'key2' => 'value2', 'key3' => 'value3']);
        $result = $myClass->except('key2');
        $this->assertEquals(['key1' => 'value1', 'key3' => 'value3'], $result->toArray());
    }

    public function testOnly()
    {
        $myClass = new Collect\Collect(['key17' => 'value17', 'key18' => 'value18', 'key19' => 'value19']);
        $result = $myClass->only('key18');
        $this->assertEquals(['key18' => 'value18'], $result->toArray());
    }

    public function testFirst()
    {
        $myClass = new Collect\Collect(['key11' => 'value11', 'key12' => 'value12', 'key13' => 'value13']);
        $result = $myClass->first();
        $this->assertEquals('value11', $result);
    }

    public function testToArray()
    {
        $myClass = new Collect\Collect(['key1' => 'value1', 'key2' => 'value2', 'key3' => 'value3']);
        $result = $myClass->toArray();
        $this->assertEquals(['key1' => 'value1', 'key2' => 'value2', 'key3' => 'value3'], $result);
    }

    public function testPush()
    {
        $collect = new Collect\Collect(['a' => 0]);
        $collect->push(1, 'b');
        $this->assertSame(['a' => 0, 'b' => 1], $collect->toArray());
    }

    public function testUnshift()
    {
        $myClass = new Collect\Collect(['key11' => 'value11', 'key12' => 'value12']);
        $myClass->unshift('newValue');
        $result = $myClass->toArray();
        $this->assertEquals(['newValue', 'key11' => 'value11', 'key12' => 'value12'], $result);
    }

    public function testShift()
    {
        $collect = new Collect\Collect(['a' => 1, 'b' => 2]);
        $collect->shift();
        $this->assertSame(['b' => 2], $collect->toArray());
    }

    public function testPop()
    {
        $collect = new Collect\Collect(['a' => 1, 'b' => 2]);
        $collect->pop();
        $this->assertSame(['a' => 1], $collect->toArray());
    }

    public function testSplice()
    {
        $collect = new Collect(['a' => 1, 'b' => 2, 'c' => 3]);
        $collect->splice('b');
        $this->assertSame(['a' => 1, 'c' => 3], $collect->toArray());
    }

}





