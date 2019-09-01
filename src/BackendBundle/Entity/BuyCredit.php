<?php


namespace BackendBundle\Entity;


class BuyCredit
{

private $planA;
private $planB;
private $planC;

    public function getPlanA()
    {
        return $this->planA;
    }

    public function setPlanA(\BackendBundle\Entity\BuyCredit $planA = null)
    {
        $this->planA = $planA;

        return $this;
    }

    public function getPlanB()
    {
        return $this->planB;
    }

    public function setPlanB(\BackendBundle\Entity\BuyCredit $planB = null)
    {
        $this->planB = $planB;

        return $this;
    }

    public function getPlanC()
    {
        return $this->planC;
    }

    public function setPlanC(\BackendBundle\Entity\BuyCredit $planC = null)
    {
        $this->planA = $planC;

        return $this;
    }

}