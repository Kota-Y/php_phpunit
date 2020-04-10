<?php
namespace Tddbc;

class ClosedInterval
{
    private int $lower;
    private int $upper;

    function __construct(int $_lower, int $_upper){
        $this->lower = $_lower;
        $this->upper = $_upper;
	}

    public function create(int $_lower, int $_upper): bool
    {
        if ($_lower > $_upper) return False;

        $this->lower = $_lower;
        $this->upper = $_upper;

        return True;
    }

    public function getLower(): int
    {
        return $this->lower;
    }

    public function getUpper(): int
    {
        return $this->upper;
    }

    public function getLowerAndUpperToString(): string
    {
        return '[' . $this->lower . ','  . $this->upper . ']';
    }

    public function include(int $_num): bool
    {
        if ($_num < $this->lower) return False;
        if ($_num > $this->upper) return False;
        return True;
    }

    public function equalComparison(int $_comparedLower, int $_comparedUpper): bool
    {
        if ($_comparedLower != $this->lower) return False;
        if ($_comparedUpper != $this->upper) return False;
        return True;
    }

    public function containComparison(int $_comparedLower, int $_comparedUpper): bool
    {
        if (!$this->include($_comparedLower)) return False;
        if (!$this->include($_comparedUpper)) return False;
        return True;
    }
}
