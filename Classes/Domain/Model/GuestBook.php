<?php
namespace JS\JsGuestbook\Domain\Model;

/***************************************************************
 *
 *  Copyright notice
 *
 *  (c) 2016 Jainish Senjaliya <jainishsenjaliya@gmail.com>
 *           Jainish Senjaliya <jainishsenjaliya@gmail.com>
 *
 *  All rights reserved
 *
 *  This script is part of the TYPO3 project. The TYPO3 project is
 *  free software; you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation; either version 3 of the License, or
 *  (at your option) any later version.
 *
 *  The GNU General Public License can be found at
 *  http://www.gnu.org/copyleft/gpl.html.
 *
 *  This script is distributed in the hope that it will be useful,
 *  but WITHOUT ANY WARRANTY; without even the implied warranty of
 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *  GNU General Public License for more details.
 *
 *  This copyright notice MUST APPEAR in all copies of the script!
 ***************************************************************/

/**
 * GuestBook
 */
class GuestBook extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity
{

    /**
     * firstName
     *
     * @var string
     */
    protected $firstName = '';
    
    /**
     * lastName
     *
     * @var string
     */
    protected $lastName = '';
    
    /**
     * title
     *
     * @var string
     */
    protected $title = '';
    
    /**
     * email
     *
     * @var string
     */
    protected $email = '';
    
    /**
     * phone
     *
     * @var string
     */
    protected $phone = '';
    
    /**
     * www
     *
     * @var string
     */
    protected $www = '';
    
    /**
     * message
     *
     * @var string
     */
    protected $message = '';
    
    /**
     * comment
     *
     * @var string
     */
    protected $comment = '';
    
    /**
     * creationDate
     *
     * @var \DateTime
     */
    protected $creationDate = NULL;
    
    /**
     * receiverEmailSubject
     *
     * @var string
     */
    protected $receiverEmailSubject = '';
    
    /**
     * userEmailSubject
     *
     * @var string
     */
    protected $userEmailSubject = '';
    
    /**
     * ip
     *
     * @var string
     */
    protected $ip = '';
    
    /**
     * useragent
     *
     * @var string
     */
    protected $useragent = '';
    
    /**
     * websiteLanguage
     *
     * @var string
     */
    protected $websiteLanguage = '';
    
    /**
     * websiteLanguageId
     *
     * @var string
     */
    protected $websiteLanguageId = '';
    
    /**
     * name
     *
     * @var string
     */
    protected $name = '';
    
    /**
     * Returns the firstName
     *
     * @return string $firstName
     */
    public function getFirstName()
    {
        return $this->firstName;
    }
    
    /**
     * Sets the firstName
     *
     * @param string $firstName
     * @return void
     */
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;
    }
    
    /**
     * Returns the lastName
     *
     * @return string $lastName
     */
    public function getLastName()
    {
        return $this->lastName;
    }
    
    /**
     * Sets the lastName
     *
     * @param string $lastName
     * @return void
     */
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;
    }
    
    /**
     * Returns the title
     *
     * @return string $title
     */
    public function getTitle()
    {
        return $this->title;
    }
    
    /**
     * Sets the title
     *
     * @param string $title
     * @return void
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }
    
    /**
     * Returns the email
     *
     * @return string $email
     */
    public function getEmail()
    {
        return $this->email;
    }
    
    /**
     * Sets the email
     *
     * @param string $email
     * @return void
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }
    
    /**
     * Returns the phone
     *
     * @return string $phone
     */
    public function getPhone()
    {
        return $this->phone;
    }
    
    /**
     * Sets the phone
     *
     * @param string $phone
     * @return void
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;
    }
    
    /**
     * Returns the www
     *
     * @return string $www
     */
    public function getWww()
    {
        return $this->www;
    }
    
    /**
     * Sets the www
     *
     * @param string $www
     * @return void
     */
    public function setWww($www)
    {
        $this->www = $www;
    }
    
    /**
     * Returns the message
     *
     * @return string $message
     */
    public function getMessage()
    {
        return $this->message;
    }
    
    /**
     * Sets the message
     *
     * @param string $message
     * @return void
     */
    public function setMessage($message)
    {
        $this->message = $message;
    }
    
    /**
     * Returns the comment
     *
     * @return string $comment
     */
    public function getComment()
    {
        return $this->comment;
    }
    
    /**
     * Sets the comment
     *
     * @param string $comment
     * @return void
     */
    public function setComment($comment)
    {
        $this->comment = $comment;
    }
    
    /**
     * Returns the creationDate
     *
     * @return \DateTime $creationDate
     */
    public function getCreationDate()
    {
        return $this->creationDate;
    }
    
    /**
     * Sets the creationDate
     *
     * @param \DateTime $creationDate
     * @return void
     */
    public function setCreationDate(\DateTime $creationDate)
    {
        $this->creationDate = $creationDate;
    }
    
    /**
     * Returns the ip
     *
     * @return string $ip
     */
    public function getIp()
    {
        return $this->ip;
    }
    
    /**
     * Sets the ip
     *
     * @param string $ip
     * @return void
     */
    public function setIp($ip)
    {
        $this->ip = $ip;
    }
    
    /**
     * Returns the useragent
     *
     * @return string $useragent
     */
    public function getUseragent()
    {
        return $this->useragent;
    }
    
    /**
     * Sets the useragent
     *
     * @param string $useragent
     * @return void
     */
    public function setUseragent($useragent)
    {
        $this->useragent = $useragent;
    }
    
    /**
     * Returns the websiteLanguage
     *
     * @return string $websiteLanguage
     */
    public function getWebsiteLanguage()
    {
        return $this->websiteLanguage;
    }
    
    /**
     * Sets the websiteLanguage
     *
     * @param string $websiteLanguage
     * @return void
     */
    public function setWebsiteLanguage($websiteLanguage)
    {
        $this->websiteLanguage = $websiteLanguage;
    }
    
    /**
     * Returns the websiteLanguageId
     *
     * @return string $websiteLanguageId
     */
    public function getWebsiteLanguageId()
    {
        return $this->websiteLanguageId;
    }
    
    /**
     * Sets the websiteLanguageId
     *
     * @param string $websiteLanguageId
     * @return void
     */
    public function setWebsiteLanguageId($websiteLanguageId)
    {
        $this->websiteLanguageId = $websiteLanguageId;
    }
    
    /**
     * Returns the receiverEmailSubject
     *
     * @return string $receiverEmailSubject
     */
    public function getReceiverEmailSubject()
    {
        return $this->receiverEmailSubject;
    }
    
    /**
     * Sets the receiverEmailSubject
     *
     * @param string $receiverEmailSubject
     * @return void
     */
    public function setReceiverEmailSubject($receiverEmailSubject)
    {
        $this->receiverEmailSubject = $receiverEmailSubject;
    }
    
    /**
     * Returns the userEmailSubject
     *
     * @return string $userEmailSubject
     */
    public function getUserEmailSubject()
    {
        return $this->userEmailSubject;
    }
    
    /**
     * Sets the userEmailSubject
     *
     * @param string $userEmailSubject
     * @return void
     */
    public function setUserEmailSubject($userEmailSubject)
    {
        $this->userEmailSubject = $userEmailSubject;
    }
    
    /**
     * Returns the name
     *
     * @return string $name
     */
    public function getName()
    {
        return $this->name;
    }
    
    /**
     * Sets the name
     *
     * @param string $name
     * @return void
     */
    public function setName($name)
    {
        $this->name = $name;
    }

}