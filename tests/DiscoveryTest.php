<?php

require_once dirname(__FILE__) . '/TestCase.php';
require_once 'Discovery/HostMeta.php';
 
class DiscoveryTest extends Discovery_TestCase {

	public function testHostMeta() {
		// test 1
		$content = file_get_contents($this->data_dir . 'host-meta-1');
		$links = Discovery_Host_Meta::parse($content);

		$this->assertEquals(1, sizeof($links));
		$this->assertEquals('http://openxrd.org/xrd.xml', $links[0]->uri);
		$this->assertEquals('application/xrd+xml', $links[0]->type);
		$this->assertEquals(1, sizeof($links[0]->rel));
		$this->assertEquals('describedby', $links[0]->rel[0]);

		// test 2
		$content = file_get_contents($this->data_dir . 'host-meta-2');
		$links = Discovery_Host_Meta::parse($content);

		$this->assertEquals(2, sizeof($links));

		$this->assertEquals('http://openxrd.org/sitemap.xml', $links[0]->uri);
		$this->assertEquals(1, sizeof($links[0]->rel));
		$this->assertEquals('index', $links[0]->rel[0]);

		$this->assertEquals('http://openxrd.org/xrd.xml', $links[1]->uri);
		$this->assertEquals('application/xrd+xml', $links[1]->type);
		$this->assertEquals(3, sizeof($links[1]->rel));
		$this->assertTrue(in_array('describedby', $links[1]->rel));
		$this->assertTrue(in_array('alternate', $links[1]->rel));
		$this->assertTrue(in_array('http://example.com/custom/rel', $links[1]->rel));
	}

}


?>
