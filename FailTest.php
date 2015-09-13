<?php
class FailTest extends PHPUnit_Extensions_Selenium2TestCase
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
