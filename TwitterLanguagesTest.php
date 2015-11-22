<?php
require_once 'vendor/autoload.php';

/*
This TestCase checks that Twitter supports French as a language, and not Klingon.
*/

class TwitterLanguagesTest extends PHPUnit_Extensions_Selenium2TestCase
{
    protected function setUp()
    {
        $this->setBrowser('firefox');
        $this->setBrowserUrl('https://twitter.com/');
    }

    protected function screenshot($file) 
    {
        $filedata = $this->currentScreenshot();
        file_put_contents($file, $filedata);
    }

    protected function findLanguage($language)
    {
	$this->url('https://twitter.com/');
	$element = $this->byCssSelector('b.caret');
	$element->click();
	try {
		$element = $this->byLinkText("$language");
		$element->click();
		return true;
	} catch(exception $e) {
		return false;
	} finally {
		$this->screenshot( __DIR__.'/'.$this->getName().'-'.time(). '.png');
    	}
    }

    public function testFrench()
    {
	$this->assertTrue($this->findLanguage("Français"));
    }

    public function testKlingon()
    {
	$this->assertFalse($this->findLanguage("Klingon"));
    }

}
?>

