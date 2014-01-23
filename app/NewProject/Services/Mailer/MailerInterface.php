<?php namespace NewProject\Services\Mailer;

interface MailerInterface {


    /**
    * Sends mail
    *
    * @return boolean
    */
    public function send();


    /**
     * Set Email Layout
     *
     * @param $view
     * @return object
     */
    public function setLayout($view);


    /**
     * Set Email Template
     *
     * @param $view
     * @return object
     */
    public function setTemplate($view);

    /**
     * Set Email Layout
     *
     * @param $subject
     * @return object
     */
    public function subject($subject);

    /**
     * Adds a Carbon Copy(CC) address
     *
     * @param $address
     * @return object
     */
    public function cc($address);

    /**
     * Adds a Blind Carbon Copy(BCC) address
     *
     * @param $address
     * @return object
     */
    public function bcc($address);

    /**
     * Attaches file to mail
     *
     * @param $pathToFile
     * @return object
     */
    public function attach($pathToFile);

}