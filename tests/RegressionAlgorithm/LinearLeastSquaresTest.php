<?php

use mcordingley\Regression\RegressionAlgorithm\LinearLeastSquares;

class LinearLeastSquaresTest extends PHPUnit_Framework_TestCase
{
    
    protected $strategy;

    public function __construct($name = null, array $data = array(), $dataName = '')
    {
        parent::__construct($name, $data, $dataName);
        
        $this->strategy = new LinearLeastSquares;
    }
    
    public function testFatMatrix()
    {
        // TODO
    }
    
    public function testSkinnyMatrix()
    {
        $coefficients = $this->strategy->regress([1, 2, 3, 4, 5], [
            [1, 1],
            [1, 2],
            [1, 1.3],
            [1, 3.75],
            [1, 2.25],
        ]);
        
        $this->assertEquals(1.095497063, round($coefficients[0], 9));
        $this->assertEquals(0.924515989, round($coefficients[1], 9));
    }
    
    public function testSquareMatrix()
    {
        $coefficients = $this->strategy->regress([2, 4, 6, 8, 10], [
            [1, 3, 5, 7, 2],
            [1, 3, 2, 1, 5],
            [1, 1, 2, 3, 4],
            [1, 1, 3, 4, 7],
            [1, 19, 17, 15, 14],
        ]);
        
        $this->assertEquals(-2.667, round($coefficients[0], 3));
        $this->assertEquals(3.333, round($coefficients[1], 3));
        $this->assertEquals(-9.333, round($coefficients[2], 3));
        $this->assertEquals(5.333, round($coefficients[3], 3));
        $this->assertEquals(2, round($coefficients[4], 3));
    }
}