<?php namespace RestApiSample\Services\Mailer\Customer;

use RestApiSample\Services\Mailer\SwiftMailerAbstract;

class CustomerWelcomeEmail extends SwiftMailerAbstract {

    protected $template = 'emails.customer.welcome';

    protected $subject = 'Welcome New Customer';

}