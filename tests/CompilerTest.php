<?php
/**
 * Generated by build/gen_test
 */
use LightnCandy\LightnCandy;
use LightnCandy\Runtime;

require_once(__DIR__ . '/test_util.php');

class CompilerTest extends PHPUnit_Framework_TestCase
{
    /**
     * @covers LightnCandy\Compiler::getFuncName
     */
    public function testOn_getFuncName() {
        $method = new \ReflectionMethod('LightnCandy\Compiler', 'getFuncName');
        $method->setAccessible(true);
        $this->assertEquals('LR::test(', $method->invokeArgs(null, array_by_ref(array(
            array('flags' => array('standalone' => 0, 'debug' => 0), 'runtime' => 'Runtime'), 'test', ''
        ))));
        $this->assertEquals('LR::test2(', $method->invokeArgs(null, array_by_ref(array(
            array('flags' => array('standalone' => 0, 'debug' => 0), 'runtime' => 'Runtime'), 'test2', ''
        ))));
        $this->assertEquals("\$cx['funcs']['test3'](", $method->invokeArgs(null, array_by_ref(array(
            array('flags' => array('standalone' => 1, 'debug' => 0), 'runtime' => 'Runtime'), 'test3', ''
        ))));
        $this->assertEquals('LR::debug(\'abc\', \'test\', ', $method->invokeArgs(null, array_by_ref(array(
            array('flags' => array('standalone' => 0, 'debug' => 1), 'runtime' => 'Runtime'), 'test', 'abc'
        ))));
    }
    /**
     * @covers LightnCandy\Compiler::getVariableNames
     */
    public function testOn_getVariableNames() {
        $method = new \ReflectionMethod('LightnCandy\Compiler', 'getVariableNames');
        $method->setAccessible(true);
        $this->assertEquals(array('array(array($in),array())', array('this')), $method->invokeArgs(null, array_by_ref(array(
            array('flags'=>array('spvar'=>true)), array(null)
        ))));
        $this->assertEquals(array('array(array($in,$in),array())', array('this', 'this')), $method->invokeArgs(null, array_by_ref(array(
            array('flags'=>array('spvar'=>true)), array(null, null)
        ))));
        $this->assertEquals(array('array(array(),array(\'a\'=>$in))', array('this')), $method->invokeArgs(null, array_by_ref(array(
            array('flags'=>array('spvar'=>true)), array('a' => null)
        ))));
    }
    /**
     * @covers LightnCandy\Compiler::getVariableName
     */
    public function testOn_getVariableName() {
        $method = new \ReflectionMethod('LightnCandy\Compiler', 'getVariableName');
        $method->setAccessible(true);
        $this->assertEquals(array('$in', 'this'), $method->invokeArgs(null, array_by_ref(array(
            array(null), array('flags'=>array('spvar'=>true,'debug'=>0))
        ))));
        $this->assertEquals(array('((isset($in[\'true\']) && is_array($in)) ? $in[\'true\'] : null)', '[true]'), $method->invokeArgs(null, array_by_ref(array(
            array('true'), array('flags'=>array('spvar'=>true,'debug'=>0,'prop'=>0,'method'=>0,'mustlok'=>0,'mustlam'=>0, 'lambda'=>0))
        ))));
        $this->assertEquals(array('((isset($in[\'false\']) && is_array($in)) ? $in[\'false\'] : null)', '[false]'), $method->invokeArgs(null, array_by_ref(array(
            array('false'), array('flags'=>array('spvar'=>true,'debug'=>0,'prop'=>0,'method'=>0,'mustlok'=>0,'mustlam'=>0, 'lambda'=>0))
        ))));
        $this->assertEquals(array('true', 'true'), $method->invokeArgs(null, array_by_ref(array(
            array(0, 'true'), array('flags'=>array('spvar'=>true,'debug'=>0))
        ))));
        $this->assertEquals(array('false', 'false'), $method->invokeArgs(null, array_by_ref(array(
            array(0, 'false'), array('flags'=>array('spvar'=>true,'debug'=>0))
        ))));
        $this->assertEquals(array('((isset($in[\'2\']) && is_array($in)) ? $in[\'2\'] : null)', '[2]'), $method->invokeArgs(null, array_by_ref(array(
            array('2'), array('flags'=>array('spvar'=>true,'debug'=>0,'prop'=>0,'method'=>0,'mustlok'=>0,'mustlam'=>0, 'lambda'=>0))
        ))));
        $this->assertEquals(array('2', '2'), $method->invokeArgs(null, array_by_ref(array(
            array(0, '2'), array('flags'=>array('spvar'=>true,'debug'=>0,'prop'=>0,'method'=>0))
        ))));
        $this->assertEquals(array('((isset($in[\'@index\']) && is_array($in)) ? $in[\'@index\'] : null)', '[@index]'), $method->invokeArgs(null, array_by_ref(array(
            array('@index'), array('flags'=>array('spvar'=>false,'debug'=>0,'prop'=>0,'method'=>0,'mustlok'=>0,'mustlam'=>0, 'lambda'=>0))
        ))));
        $this->assertEquals(array("((isset(\$cx['sp_vars']['index']) && is_array(\$cx['sp_vars'])) ? \$cx['sp_vars']['index'] : null)", '@[index]'), $method->invokeArgs(null, array_by_ref(array(
            array('@index'), array('flags'=>array('spvar'=>true,'debug'=>0,'prop'=>0,'method'=>0,'mustlok'=>0,'mustlam'=>0, 'lambda'=>0))
        ))));
        $this->assertEquals(array("((isset(\$cx['sp_vars']['key']) && is_array(\$cx['sp_vars'])) ? \$cx['sp_vars']['key'] : null)", '@[key]'), $method->invokeArgs(null, array_by_ref(array(
            array('@key'), array('flags'=>array('spvar'=>true,'debug'=>0,'prop'=>0,'method'=>0,'mustlok'=>0,'mustlam'=>0, 'lambda'=>0))
        ))));
        $this->assertEquals(array("((isset(\$cx['sp_vars']['first']) && is_array(\$cx['sp_vars'])) ? \$cx['sp_vars']['first'] : null)", '@[first]'), $method->invokeArgs(null, array_by_ref(array(
            array('@first'), array('flags'=>array('spvar'=>true,'debug'=>0,'prop'=>0,'method'=>0,'mustlok'=>0,'mustlam'=>0, 'lambda'=>0))
        ))));
        $this->assertEquals(array("((isset(\$cx['sp_vars']['last']) && is_array(\$cx['sp_vars'])) ? \$cx['sp_vars']['last'] : null)", '@[last]'), $method->invokeArgs(null, array_by_ref(array(
            array('@last'), array('flags'=>array('spvar'=>true,'debug'=>0,'prop'=>0,'method'=>0,'mustlok'=>0,'mustlam'=>0, 'lambda'=>0))
        ))));
        $this->assertEquals(array('((isset($in[\'"a"\']) && is_array($in)) ? $in[\'"a"\'] : null)', '["a"]'), $method->invokeArgs(null, array_by_ref(array(
            array('"a"'), array('flags'=>array('spvar'=>true,'debug'=>0,'prop'=>0,'method'=>0,'mustlok'=>0,'mustlam'=>0, 'lambda'=>0))
        ))));
        $this->assertEquals(array('"a"', '"a"'), $method->invokeArgs(null, array_by_ref(array(
            array(0, '"a"'), array('flags'=>array('spvar'=>true,'debug'=>0))
        ))));
        $this->assertEquals(array('((isset($in[\'a\']) && is_array($in)) ? $in[\'a\'] : null)', '[a]'), $method->invokeArgs(null, array_by_ref(array(
            array('a'), array('flags'=>array('spvar'=>true,'debug'=>0,'prop'=>0,'method'=>0,'mustlok'=>0,'mustlam'=>0, 'lambda'=>0))
        ))));
        $this->assertEquals(array('((isset($cx[\'scopes\'][count($cx[\'scopes\'])-1][\'a\']) && is_array($cx[\'scopes\'][count($cx[\'scopes\'])-1])) ? $cx[\'scopes\'][count($cx[\'scopes\'])-1][\'a\'] : null)', '../[a]'), $method->invokeArgs(null, array_by_ref(array(
            array(1,'a'), array('flags'=>array('spvar'=>true,'debug'=>0,'prop'=>0,'method'=>0,'mustlok'=>0,'mustlam'=>0, 'lambda'=>0))
        ))));
        $this->assertEquals(array('((isset($cx[\'scopes\'][count($cx[\'scopes\'])-3][\'a\']) && is_array($cx[\'scopes\'][count($cx[\'scopes\'])-3])) ? $cx[\'scopes\'][count($cx[\'scopes\'])-3][\'a\'] : null)', '../../../[a]'), $method->invokeArgs(null, array_by_ref(array(
            array(3,'a'), array('flags'=>array('spvar'=>true,'debug'=>0,'prop'=>0,'method'=>0,'mustlok'=>0,'mustlam'=>0, 'lambda'=>0))
        ))));
        $this->assertEquals(array('((isset($in[\'id\']) && is_array($in)) ? $in[\'id\'] : null)', 'this.[id]'), $method->invokeArgs(null, array_by_ref(array(
            array(null, 'id'), array('flags'=>array('spvar'=>true,'debug'=>0,'prop'=>0,'method'=>0,'mustlok'=>0,'mustlam'=>0, 'lambda'=>0))
        ))));
        $this->assertEquals(array('LR::v($cx, isset($in) ? $in : null, array(\'id\'))', 'this.[id]'), $method->invokeArgs(null, array_by_ref(array(
            array(null, 'id'), array('flags'=>array('prop'=>true,'spvar'=>true,'debug'=>0,'method'=>0,'mustlok'=>0,'mustlam'=>0, 'lambda'=>0,'standalone'=>0), 'runtime' => 'Runtime')
        ))));
    }
    /**
     * @covers LightnCandy\Compiler::addUsageCount
     */
    public function testOn_addUsageCount() {
        $method = new \ReflectionMethod('LightnCandy\Compiler', 'addUsageCount');
        $method->setAccessible(true);
        $this->assertEquals(1, $method->invokeArgs(null, array_by_ref(array(
            array('usedCount' => array('test' => array())), 'test', 'testname'
        ))));
        $this->assertEquals(3, $method->invokeArgs(null, array_by_ref(array(
            array('usedCount' => array('test' => array('testname' => 2))), 'test', 'testname'
        ))));
        $this->assertEquals(5, $method->invokeArgs(null, array_by_ref(array(
            array('usedCount' => array('test' => array('testname' => 2))), 'test', 'testname', 3
        ))));
    }
}
?>