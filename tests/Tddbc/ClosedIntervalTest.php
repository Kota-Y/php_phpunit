<?php
namespace Tddbc;

use PHPUnit\Framework\TestCase;
use Tddbc\ClosedInterval;

class ClosedIntervalTest extends TestCase
{
    /**
     * @var ClosedInterval
     */
    protected $closedinterval;

    /**
     * {@inheritdoc}
     */
    protected function setUp() : void
    {
        $this->closedinterval = new ClosedInterval(3, 8);
    }

    /**
     * 整数閉区間クラス作成関連
     */

    /**
     * @test
     */
    public function 下端点3、上端点8を与えるとインスタンスを作成する()
    {
        $createResult = $this->closedinterval->create(3, 8);

        $this->assertEquals(True, $createResult);
    }

    /**
     * @test
     */
    public function 下端点6、上端点6を与えるとインスタンスを作成する()
    {
        $createResult = $this->closedinterval->create(6, 6);

        $this->assertEquals(True, $createResult);
    }

    /**
     * @test
     */
    public function 下端点5、上端点4を与えるとインスタンスを作成できない()
    {
        $createResult = $this->closedinterval->create(5, 4);

        $this->assertEquals(False, $createResult);
    }

    /**
     * 整数閉区間クラス動作関連
     */

    /**
     * 返り値関連
     */

    /**
     * @test
     */
    public function 下端点を返す()
    {
        $getLowerResult = $this->closedinterval->getLower();

        $this->assertEquals(3, $getLowerResult);
    }

    /**
     * @test
     */
    public function 上端点を返す()
    {
        $getUpperResult = $this->closedinterval->getUpper();

        $this->assertEquals(8, $getUpperResult);
    }

    /**
     * @test
     */
    public function 文字列表記で返す()
    {
        $getLowerAndUpperToStringResult = $this->closedinterval->getLowerAndUpperToString();

        $this->assertEquals('[3,8]', $getLowerAndUpperToStringResult);
    }

    /**
     * 指定した整数を含むかを判定
     */

    /**
     * @test
     */
    public function 閉区間には含まれている()
    {
        $isIncluding = $this->closedinterval->include(3);

        $this->assertEquals(True, $isIncluding);
    }

    /**
     * @test
     */
    public function 閉区間には含まれていない()
    {
        $isIncluding = $this->closedinterval->include(2);

        $this->assertEquals(False, $isIncluding);
    }

    /**
     * 別の閉区間と比較
     */

    /**
     * 等価判定
     */

    /**
     * @test
     */
    public function 閉区間3・8と3・8は等しい()
    {
        $comparedclosedinterval = new ClosedInterval(3,8);
        $comparedlower = $comparedclosedinterval->getLower();
        $comparedUpper = $comparedclosedinterval->getUpper();

        $isEqual = $this->closedinterval->equalComparison($comparedlower, $comparedUpper);

        $this->assertEquals(True, $isEqual);
    }

    /**
     * @test
     */
    public function 閉区間3・7と3・8は等しくない()
    {
        $comparedclosedinterval = new ClosedInterval(3,7);
        $comparedlower = $comparedclosedinterval->getLower();
        $comparedUpper = $comparedclosedinterval->getUpper();

        $isEqual = $this->closedinterval->equalComparison($comparedlower, $comparedUpper);

        $this->assertEquals(False, $isEqual);
    }

    /**
     * 包含判定
     */

    /**
     * @test
     */
    public function 閉区間3・8に4・6は含まれている()
    {
        $comparedclosedinterval = new ClosedInterval(4,6);
        $comparedlower = $comparedclosedinterval->getLower();
        $comparedUpper = $comparedclosedinterval->getUpper();

        $isContain = $this->closedinterval->containComparison($comparedlower, $comparedUpper);

        $this->assertEquals(True, $isContain);
    }

    /**
     * @test
     */
    public function 閉区間3・8に3・9は含まれていない()
    {
        $comparedclosedinterval = new ClosedInterval(3,9);
        $comparedlower = $comparedclosedinterval->getLower();
        $comparedUpper = $comparedclosedinterval->getUpper();

        $isContain = $this->closedinterval->containComparison($comparedlower, $comparedUpper);

        $this->assertEquals(False, $isContain);
    }
}
