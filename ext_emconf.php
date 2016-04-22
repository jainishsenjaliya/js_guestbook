<?php

/***************************************************************
 * Extension Manager/Repository config file for ext: "js_guestbook"
 *
 * Auto generated by Extension Builder 2016-04-22
 *
 * Manual updates:
 * Only the data in the array - anything else is removed by next write.
 * "version" and "dependencies" must not be touched!
 ***************************************************************/

$EM_CONF[$_EXTKEY] = array(
	'title' => 'Guest Book',
	'description' => 'Simple and smart Guestbook with name, email, phone, www, title, message. Everything will be manage through typoscript',
	'category' => 'plugin',
	'author' => 'Jainish Senjaliya',
	'author_email' => 'jainishsenjaliya@gmail.com',
	'state' => 'stable',
	'internal' => '',
	'uploadfolder' => '0',
	'createDirs' => '',
	'clearCacheOnLoad' => 0,
	'version' => '1.0.3',
	'constraints' => array(
		'depends' => array(
			'typo3' => '6.0.0 - 7.6.99',
			'js_paginate' => '1.0.3 - 2.0.3',
		),
		'conflicts' => array(
		),
		'suggests' => array(
		),
	),
);