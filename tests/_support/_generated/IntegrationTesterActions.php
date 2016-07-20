<?php  //[STAMP] cb87c6fb5f3aec784346830e9d518d0a
namespace Plugin_Storify_Embed\_generated;

// This class was automatically generated by build task
// You should not change it manually as it will be overwritten on next build
// @codingStandardsIgnoreFile

use Codeception\Module\IntegrationHelper;

trait IntegrationTesterActions
{
    /**
     * @return \Codeception\Scenario
     */
    abstract protected function getScenario();

    
    /**
     * [!] Method is generated. Documentation taken from corresponding module.
     *
     * Test that the filter definitions passed in have been added where specified.
	 * Example usage:
	 * $my_filters = array(
	 *	'init' => array(
	 *		array( 'BDC_Plugin_Class', 'plugin_function' ),
	 *	),
	 *	'admin_head' => array(
	 *		'standalone_function',
	 *	),
	 * );
	 * \Codeception\Module\UnitHelper::test_filters( $my_filters );
	 * @param array $my_filters The definition of filters to test, as specified
	 * above
     * @see \Codeception\Module\IntegrationHelper::test_filters()
     */
    public function test_filters($my_filters) {
        return $this->getScenario()->runStep(new \Codeception\Step\Action('test_filters', func_get_args()));
    }
}
