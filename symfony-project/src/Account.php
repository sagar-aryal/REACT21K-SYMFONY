<?php


namespace App;


class Account
{
    private $balance;
    private $id;

    public function __construct($balance, $id){
        $this->balance = $balance;
        $this->id = $id;
    }


    public function getBalance()
    {
        return $this->balance;
    }
    public function getId()
    {
        return $this->id;
    }

    public function deposit(int $param)
    {
        if($amount >0){
            $newAmount = $this->getBalance() + $amount;
            $this->setBalance($newAmount);
        }

    }

    public function withdraw(int $amount): bool
    {
        if($amount > 0 && $amount < $this->getBalance()){
            $newAmount = $this->getBalance() - $amount;
            $this->setBalance($newAmount);
            return true;
         }

    }
}