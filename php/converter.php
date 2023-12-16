<?php

class Converter{

	private $rateValue;

	//I have base these rates on USD :)
	private $rates = [
		'USD' => 1.0,
	];

    private $rates1 = [
        'Bs' => 25.34,
	];

	public function setConvert($amount, $currency_from){
		$this->rateValue = $amount/$this->rates[$currency_from];
	}

	public function getConvert($currency_to){
        return round($this->rates1[$currency_to] * $this->rateValue, 2);
	}

	public function getRates(){
		return $this->rates;
	}

    public function getRates1(){
		return $this->rates1;
	}
}

?>