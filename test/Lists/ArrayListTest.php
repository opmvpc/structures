<?php

namespace Opmvpc\Constructs\Test\Lists;

use OutOfBoundsException;
use Opmvpc\Constructs\Lists\ArrayList;
use Opmvpc\Constructs\Test\BaseTestCase;

class ArrayListTest extends BaseTestCase
{
    const TEST_ARRAY = [3, 6, 9, 3];

    private function createList()
    {
        return new ArrayList();
    }

    public function testConstruct()
    {
        $list = $this->createList();
        $this->assertObjectHasAttribute('elements', $list);
        $this->assertIsArray($list->toArray());
    }

    public function testSizeEmptyList()
    {
        $list = $this->createList();

        $this->assertEquals(count($list->toArray()), 0);
        $this->assertEquals($list->size(), 0);
    }

    public function testSizeFilledList()
    {
        $list = $this->createList();

        $list->add(3);

        $this->assertEquals(count($list->toArray()), $list->size());
        $this->assertEquals($list->size(), 1);
    }
    
    public function testAddItems()
    {
        $list = $this->createList();
    
        $list->add(3);
        $list->add(6);
        $list->add(9);
        $list->add(3);
    
        $this->assertEquals(count($list->toArray()), 4);
        $this->assertEquals($list->toArray(), self::TEST_ARRAY);
    }

    public function testListContainsItem()
    {
        $list = $this->createList();
        $list->add(3);

        $this->assertTrue($list->contains(3));
    }

    public function testListDoesntContainsItem()
    {
        $list = $this->createList();
        $list->add(2);

        $this->assertFalse($list->contains(3));
    }

    public function testListRemove()
    {
        $list = $this->createList();
        $list->add(2);
        $list->remove(2);

        $this->assertEquals(count($list->toArray()), 0);
    }
    
    public function testListRemoveFail()
    {
        $list = $this->createList();
        $this->expectException(OutOfBoundsException::class);
        $list->remove(2);
    }

    public function testGetItem()
    {
        $list = $this->createList();
        $list->add(2);

        $this->assertEquals($list->get(0), 2);
    }

    public function testGetItemFail()
    {
        $list = $this->createList();
        $this->expectException(OutOfBoundsException::class);
        $list->get(0);
    }

}
