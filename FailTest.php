<?php
class FailTest extends PHPUnit_Framework_TestCase
{

    public function testPass()
    {
        $this->assertEquals(true, true);
    }

    public function testFail()
    {
	$this->assertEquals(true, false);
    }
}
?>
