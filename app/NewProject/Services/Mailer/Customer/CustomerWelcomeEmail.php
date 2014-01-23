<?php namespace NewProject\Services\Mailer\Customer;

use NewProject\Services\Mailer\SwiftMailerAbstract;

class CustomerWelcomeEmail extends SwiftMailerAbstract {

    protected $template = 'emails.customer.welcome';

    protected $subject = 'Welcome New Customer';

}