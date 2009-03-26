<?php

require_once dirname(__FILE__) . '/Discovery/LRDD/ParseTest.php';
require_once dirname(__FILE__) . '/Discovery/LRDD/LinkPatternTest.php';
require_once dirname(__FILE__) . '/Discovery/LRDD/FetchTest.php';

require_once dirname(__FILE__) . '/XRD/TemplateURITest.php';
require_once dirname(__FILE__) . '/XRD/ParserTest.php';

require_once dirname(__FILE__) . '/Discovery/HTTPTest.php';

class AllTests extends PHPUnit_Framework_TestSuite
{
    public static function suite()
    {
        $suite = new AllTests('Discovery');

		$suite->addTestSuite('Discovery_LRDD_ParseTest');
		$suite->addTestSuite('Discovery_LRDD_LinkPatternTest');
		$suite->addTestSuite('Discovery_LRDD_FetchTest');

		$suite->addTestSuite('XRD_TemplateURITest');
		$suite->addTestSuite('XRD_ParserTest');

		$suite->addTestSuite('Discovery_HTTPTest');

		return $suite;
    }
 
}
?>
