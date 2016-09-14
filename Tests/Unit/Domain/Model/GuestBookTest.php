<?php

namespace JS\JsGuestbook\Tests\Unit\Domain\Model;

/***************************************************************
 *  Copyright notice
 *
 *  (c) 2016 Jainish Senjaliya <jainishsenjaliya@gmail.com>
 *
 *  All rights reserved
 *
 *  This script is part of the TYPO3 project. The TYPO3 project is
 *  free software; you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation; either version 2 of the License, or
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
 * Test case for class \JS\JsGuestbook\Domain\Model\GuestBook.
 *
 * @copyright Copyright belongs to the respective authors
 * @license http://www.gnu.org/licenses/gpl.html GNU General Public License, version 3 or later
 *
 * @author Jainish Senjaliya <jainishsenjaliya@gmail.com>
 */
class GuestBookTest extends \TYPO3\CMS\Core\Tests\UnitTestCase
{
	/**
	 * @var \JS\JsGuestbook\Domain\Model\GuestBook
	 */
	protected $subject = NULL;

	public function setUp()
	{
		$this->subject = new \JS\JsGuestbook\Domain\Model\GuestBook();
	}

	public function tearDown()
	{
		unset($this->subject);
	}

	/**
	 * @test
	 */
	public function getNameReturnsInitialValueForString()
	{
		$this->assertSame(
			'',
			$this->subject->getName()
		);
	}

	/**
	 * @test
	 */
	public function setNameForStringSetsName()
	{
		$this->subject->setName('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'name',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getFirstNameReturnsInitialValueForString()
	{
		$this->assertSame(
			'',
			$this->subject->getFirstName()
		);
	}

	/**
	 * @test
	 */
	public function setFirstNameForStringSetsFirstName()
	{
		$this->subject->setFirstName('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'firstName',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getLastNameReturnsInitialValueForString()
	{
		$this->assertSame(
			'',
			$this->subject->getLastName()
		);
	}

	/**
	 * @test
	 */
	public function setLastNameForStringSetsLastName()
	{
		$this->subject->setLastName('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'lastName',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getTitleReturnsInitialValueForString()
	{
		$this->assertSame(
			'',
			$this->subject->getTitle()
		);
	}

	/**
	 * @test
	 */
	public function setTitleForStringSetsTitle()
	{
		$this->subject->setTitle('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'title',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getEmailReturnsInitialValueForString()
	{
		$this->assertSame(
			'',
			$this->subject->getEmail()
		);
	}

	/**
	 * @test
	 */
	public function setEmailForStringSetsEmail()
	{
		$this->subject->setEmail('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'email',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getPhoneReturnsInitialValueForString()
	{
		$this->assertSame(
			'',
			$this->subject->getPhone()
		);
	}

	/**
	 * @test
	 */
	public function setPhoneForStringSetsPhone()
	{
		$this->subject->setPhone('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'phone',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getWwwReturnsInitialValueForString()
	{
		$this->assertSame(
			'',
			$this->subject->getWww()
		);
	}

	/**
	 * @test
	 */
	public function setWwwForStringSetsWww()
	{
		$this->subject->setWww('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'www',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getMessageReturnsInitialValueForString()
	{
		$this->assertSame(
			'',
			$this->subject->getMessage()
		);
	}

	/**
	 * @test
	 */
	public function setMessageForStringSetsMessage()
	{
		$this->subject->setMessage('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'message',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getCommentReturnsInitialValueForString()
	{
		$this->assertSame(
			'',
			$this->subject->getComment()
		);
	}

	/**
	 * @test
	 */
	public function setCommentForStringSetsComment()
	{
		$this->subject->setComment('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'comment',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getCreationDateReturnsInitialValueForDateTime()
	{
		$this->assertEquals(
			NULL,
			$this->subject->getCreationDate()
		);
	}

	/**
	 * @test
	 */
	public function setCreationDateForDateTimeSetsCreationDate()
	{
		$dateTimeFixture = new \DateTime();
		$this->subject->setCreationDate($dateTimeFixture);

		$this->assertAttributeEquals(
			$dateTimeFixture,
			'creationDate',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getReceiverEmailSubjectReturnsInitialValueForString()
	{
		$this->assertSame(
			'',
			$this->subject->getReceiverEmailSubject()
		);
	}

	/**
	 * @test
	 */
	public function setReceiverEmailSubjectForStringSetsReceiverEmailSubject()
	{
		$this->subject->setReceiverEmailSubject('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'receiverEmailSubject',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getUserEmailSubjectReturnsInitialValueForString()
	{
		$this->assertSame(
			'',
			$this->subject->getUserEmailSubject()
		);
	}

	/**
	 * @test
	 */
	public function setUserEmailSubjectForStringSetsUserEmailSubject()
	{
		$this->subject->setUserEmailSubject('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'userEmailSubject',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getIpReturnsInitialValueForString()
	{
		$this->assertSame(
			'',
			$this->subject->getIp()
		);
	}

	/**
	 * @test
	 */
	public function setIpForStringSetsIp()
	{
		$this->subject->setIp('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'ip',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getUseragentReturnsInitialValueForString()
	{
		$this->assertSame(
			'',
			$this->subject->getUseragent()
		);
	}

	/**
	 * @test
	 */
	public function setUseragentForStringSetsUseragent()
	{
		$this->subject->setUseragent('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'useragent',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getWebsiteLanguageReturnsInitialValueForString()
	{
		$this->assertSame(
			'',
			$this->subject->getWebsiteLanguage()
		);
	}

	/**
	 * @test
	 */
	public function setWebsiteLanguageForStringSetsWebsiteLanguage()
	{
		$this->subject->setWebsiteLanguage('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'websiteLanguage',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getWebsiteLanguageIdReturnsInitialValueForString()
	{
		$this->assertSame(
			'',
			$this->subject->getWebsiteLanguageId()
		);
	}

	/**
	 * @test
	 */
	public function setWebsiteLanguageIdForStringSetsWebsiteLanguageId()
	{
		$this->subject->setWebsiteLanguageId('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'websiteLanguageId',
			$this->subject
		);
	}
}
