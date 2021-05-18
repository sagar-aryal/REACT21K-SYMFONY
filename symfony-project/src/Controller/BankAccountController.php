<?php

namespace App\Controller;

use App\Account;
use App\Bank;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class BankAccountController extends AbstractController
{

    /**
     * @Route("/bank/account", name="bank_account",methods={"GET"})
     */
    public function index(): Response
    {
        $bank = new Bank();
        $firstAccount = new Account(1000, 12345);
        $secondAccount = new Account(5000, 123);
        $thirdAccount = new Account(10000, 9999);

        $bank->addAccount($firstAccount);
        $bank->addAccount($secondAccount);
        $bank->addAccount($thirdAccount);

        $bank->getAccountById(9999)->deposit(-1000); // illegal
        $bank->getAccountById(9999)->deposit(1000);

        $bank->getAccountById(123)->withdraw(-10000); // illegal
        $bank->getAccountById(123)->withdraw(10000); // legal, not possible
        $bank->getAccountById(123)->withdraw(1000); // legal, should deduct 1000

        $mortgagePayment = new \MortgagePayment($firstAccount);
        $mortgagePayment->makePayment(500);

        return $this->json([
            'bank_id' => 12345,
            'balance' => $bank->getAccountById(9999)->getBalance(),
        ]);
    }
}
