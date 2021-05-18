<?php


namespace App;


class Bank
{
    private array $accounts;

    public function __construct()
    {

        $this->accounts=[];
    }

    public function addAccount(Account $account)
    {
        //$this->accounts[]=$account;
        array_push($this->accounts, $account);
    }
// are these slash starss otterly entirely useless?


    public function getAccountById(int $accountId)
    {
        foreach($this->accounts as &$value){
          if($value->getId()==$accountId) {
              return $value;
          }
        }
    }
}