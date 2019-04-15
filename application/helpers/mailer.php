<?php
/**
 * Email sender helper class file
 *
 * This file is responsible for abstracting the email sending capability of PHP, into a reusable object that can be used to send emails through out this application.
 *
 * PHP Version PHP 7.2.1.
 *
 * @category Application_Helper
 * @package  Helper
 *
 * @author  Adedayo Adedapo <ade.adedapo9@gmail.com>
 * @license DeewanstudiosLTD deewanstudios.com
 *
 * @link http://url.com
 */

/**
 * Mailer class
 */
class Mailer
{
    private $_mail_to;
    private $_mail_from;
    private $_mail_subject;
    private $_mail_message;
    private $_mail_headers;

    /**
     * __construct
     *
     * @param mixed $to_address
     * @param mixed $from_address
     * @param mixed $_message
     *
     * @return void
     */
    public function __construct($to_address, $mail_subject, $mail_message, $mail_headers)
    {
        $this->_mail_to      = $to_address;
        $this->_mail_subject = $mail_subject;
        $this->_mail_message = $mail_message;
        $this->_mail_headers = $mail_headers;
    }

    /**
     * Get the value of _mail_to
     */
    public function getMailTo()
    {
        return $this->_mail_to;
    }

    /**
     * Set the value of _mail_to
     *
     * @return _mail_to
     */
    public function setMailTo($_mail_to)
    {
        $this->_mail_to = $_mail_to;

        return $this->_mail_to;
    }

    /**
     * Get the value of from_address
     */
    public function getFromAddress()
    {
        return $this->from_address;
    }

    /**
     * Set the value of from_address
     *
     * @return _from_address
     */
    public function setFromAddress($from_address)
    {
        $this->_from_address = $from_address;

        return $this->_from_address;
    }

    /**
     * Get the value of _mail_message
     */
    public function getMailMessage()
    {
        return $this->_mail_message;
    }

    /**
     * Get the value of _mail_subject
     */
    public function getMailSubject()
    {
        return $this->_mail_subject;
    }

    /**
     * Set the value of _mail_subject
     *
     * @return _mail_subject
     */
    public function setMailSubject($_mail_subject)
    {
        $this->_mail_subject = $_mail_subject;

        return $this->_mail_subject;
    }

    /**
     * Get the value of _mail_headers
     */
    public function getMailHeaders()
    {
        return $this->_mail_headers;
    }

    /**
     * Set the value of _mail_headers
     *
     * @return _mail_headers
     */
    public function setMailHeaders($_mail_headers)
    {
        $this->_mail_headers = $_mail_headers;

        return $this->_mail_headers;
    }

    /**
     * Set the value of _mail_message
     *
     * @return _mail_message
     */
    public function setMailMessage($_mail_message)
    {
        $this->_mail_message = $_mail_message;

        return $this->_mail_message;
    }

    /**
     * SendMessage
     *
     * @return void
     */
    public function sendMessage()
    {

        mail($this->_mail_to, $this->_mail_subject, $this->_mail_message, $this->_mail_headers);
    }

}
