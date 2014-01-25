<?php

use RestApiSample\Services\Mailer\Customer\CustomerWelcomeEmail;

class MailerController extends BaseController {

    public function index()
    {
        $data['first_name'] = 'John';
        $data['last_name'] = 'Doe';

        $mailer = new CustomerWelcomeEmail('sample@email.com', $data);
               $mailer->subject('New Subject')
               ->setTemplate('emails.customer.alert')
               ->cc('sample1@email.com')
               ->bcc('sample2@email.com')
               ->attach('/public/images/pdf-test.pdf')
               ->send();


        echo 'Mail Sent';
    }

}