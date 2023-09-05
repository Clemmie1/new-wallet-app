<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Faker\Factory as Faker;
use Nette\Utils\Random;

class CreditCardController extends Controller
{
    static public function gen() : array
    {
        $faker = Faker::create();
        $types = ['Visa', 'MasterCard'];
        $creditCardNumber = $faker->creditCardNumber;
        $creditCardExpirationDate = $faker->creditCardExpirationDate;
        $creditCardExpirationDateString = $creditCardExpirationDate->format('m/y');

        $randomNumber1 = rand(0, 9);
        $randomNumber2 = rand(0, 9);
        $randomNumber3 = rand(0, 9);
        $cvv = $randomNumber1.$randomNumber2.$randomNumber3;

        return [
          'creditCardNumber' => $creditCardNumber,
          'creditCardType' => $types[rand(0, count($types) - 1)],
          'creditCardExpirationDate' => $creditCardExpirationDateString,
          'creditCardCVV' => $cvv,
        ];
    }
}
