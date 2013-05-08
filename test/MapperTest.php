<?php

require_once(dirname(__FILE__) . '/mock/MapperConfig.php');
require_once(realpath(dirname(__FILE__) . '/../') . '/lib/Mapper.php');

class MapperTest extends PHPUnit_Framework_TestCase
{
    /**
     * @dataProvider provider
     */
    public function testStrip($content, $verbs, $expect)
    {
        $mapper = new Mapper();

        $mapper->textAnalysis = $this->getMock('YahooTextAnalysis', array('extract_verbs'));
        $mapper->textAnalysis->staticExpects($this->once())
            ->method('extract_verbs')
            ->with($content)
            ->will($this->returnValue($verbs));

        $this->assertEquals($expect, $mapper->strip($content));
    }

    public function provider()
    {
        return array(
            array('ブログを始めてください !', array('始め'), 'ブログを全裸で始めてください !'),
            array('先週は夏物の洋服を買いにUNIQLOに行きました。', array('行き'), '先週は夏物の洋服を買いにUNIQLOに全裸で行きました。'),
        );
    }
}

