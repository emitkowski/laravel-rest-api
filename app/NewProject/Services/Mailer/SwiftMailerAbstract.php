<?php namespace NewProject\Services\Mailer;

/*
 * This class defines abstract Mailer methods
 */

abstract class SwiftMailerAbstract implements MailerInterface {

    protected $layout = 'emails.layouts.default';

    protected $template;

    protected $subject;

    protected $to_data;

    protected $body_data;

    protected $cc = array();

    protected $bcc = array();

    protected $attachments = array();

    protected $pretend = false;


    /**
    * @params array $input
    *
    */
    public function __construct($to_data, $body_data)
    {
        $this->to_data = $to_data;
        $this->body_data = $body_data;
        $this->body_data['_template'] = $this->template;
    }

    /**
    * Send Mail
    *
    * @return boolean
    */
    public function send()
    {

        // Set pretend value
        \Mail::pretend($this->pretend);

        \Mail::send($this->layout, $this->body_data, function($message)
        {
            // Set To and Subject
            $message->to($this->to_data)->subject($this->subject);

            // Set all CC
            foreach($this->cc as $cc) {
                $message->cc($cc);
            }

            // Set all BCC
            foreach($this->bcc as $bcc) {
                $message->bcc($bcc);
            }

            // Set all attachments
            foreach($this->attachments as $a) {
                $message->attach($a['path'], $a['options']);
            }
        });

        // Turn pretend back to global config after send
        \Mail::pretend(\Config::get('mail.pretend'));

        return true;
    }


    /**
     * Set Email Layout
     *
     * @param $view
     * @return \NewProject\Services\Mailer\SwiftMailerAbstract
     */
    public function setLayout($view)
    {
        $this->layout = $view;

        return $this;
    }


    /**
     * Set Email Template
     *
     * @param $view
     * @return \NewProject\Services\Mailer\SwiftMailerAbstract
     */
    public function setTemplate($view)
    {
        $this->body_data['_template'] = $view;

        return $this;
    }


    /**
     * Set Subject
     *
     * @param $subject
     * @return \NewProject\Services\Mailer\SwiftMailerAbstract
     */
    public function subject($subject)
    {
        $this->subject = $subject;

        return $this;
    }

    /**
     * Adds a Carbon Copy(CC) address
     *
     * @param $address
     * @return \NewProject\Services\Mailer\SwiftMailerAbstract
     */
    public function cc($address)
    {
         array_push($this->cc, $address);

         return $this;
    }

    /**
     * Adds a Blind Carbon Copy(BCC) address
     *
     * @param $address
     * @return \NewProject\Services\Mailer\SwiftMailerAbstract
     */
    public function bcc($address)
    {
       array_push($this->bcc, $address);

       return $this;
    }

    /**
     * Attaches file to mail
     *
     * @param $pathToFile
     * @param array $options
     * @return \NewProject\Services\Mailer\SwiftMailerAbstract
     */
    public function attach($pathToFile, $options = array())
    {
       $attachment['path'] = base_path().$pathToFile;
       $attachment['options'] = $options;

       array_push($this->attachments, $attachment);

       return $this;
    }

    /**
     * Use Laravel pretend method and send mail to log file instead
     *
     * @param bool $value
     * @return \NewProject\Services\Mailer\SwiftMailerAbstract
     */
    public function pretend($value = true)
    {
       $this->pretend = $value;

       return $this;
    }

}