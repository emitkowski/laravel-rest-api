<?php

use NewProject\Services\Billing\BillingInterface as BillingInterface;

class BillingController extends BaseController {

    protected $billing_service;

    public function __construct(BillingInterface $b)
    {
        $this->billing_service = $b;
       // $this->billing_service = App::make('StripeBilling');
    }


    public function index()
    {
        echo $this->billing_service->display();
    }

}
