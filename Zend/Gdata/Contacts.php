<?php

/**
 * https://github.com/prasad83/Zend-Gdata-Contacts
 * @author prasad
 * 
 * LICENSE
 *
 * This source file is subject to the new BSD license that is bundled
 * with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://framework.zend.com/license/new-bsd
 * If you did not receive a copy of the license and are unable to
 * obtain it through the world-wide-web, please send an email
 * to license@zend.com so we can send you a copy immediately.
 *
 * @category   Zend
 * @package    Zend_Gdata
 * @subpackage Contacts
 */
require_once 'Zend/Gdata.php';
require_once 'Zend/Gdata/Contacts/ListFeed.php';
require_once 'Zend/Gdata/Contacts/ListEntry.php';
require_once 'Zend/Gdata/Contacts/Query.php';

class Zend_Gdata_Contacts extends Zend_Gdata {

	const CONTACTS_MAJOR_PROTOCOL_VERSION = 3;
	const CONTACTS_MINOR_PROTOCOL_VERSION = 0;
	
	const CONTACTS_FEED_URI = 'https://www.google.com/m8/feeds/contacts';
	const CONTACTS_POST_URI = 'https://www.google.com/m8/feeds/contacts/default/private/full';
    const AUTH_SERVICE_NAME = 'cp';
	
	protected $_projection = 'full';
	protected $_visibility = 'private';

	protected $_defaultPostUri = self::CONTACTS_FEED_URI;

	public static $namespaces = array(
		array('gd', 'http://schemas.google.com/g/2005', self::CONTACTS_MAJOR_PROTOCOL_VERSION, self::CONTACTS_MINOR_PROTOCOL_VERSION)
	);

	public function __construct($client = null, $applicationId = 'MyCompany-MyApp-1.0') {
		$this->registerPackage('Zend_Gdata_Contacts');
		parent::__construct($client, $applicationId);
		
		$this->setMajorProtocolVersion(self::CONTACTS_MAJOR_PROTOCOL_VERSION);
		$this->setMinorProtocolVersion(self::CONTACTS_MINOR_PROTOCOL_VERSION);
		
		$this->_httpClient->setParameterPost('service', self::AUTH_SERVICE_NAME);
	}

	public function newContactQuery() {
		return new Zend_Gdata_Contacts_Query();
	}

	public function setProjection($value) {
		$this->_projection = $value;
		return $this;
	}
	
	public function getProjection() {
		return $this->_projection;
	}
	
	
	public function getContactListFeed() {
		$uri = self::CONTACTS_FEED_URI . '/default/full';
		return parent::getFeed($uri, 'Zend_Gdata_Contacts_ListFeed');
	}
	
	/*public function getContactListEntry($location = NULL) {
		if ($location == null) {
            $uri = self::CONTACTS_FEED_URI;
        } else if ($location instanceof Zend_Gdata_Query) {
            $uri = $location->getQueryUrl();
        } else {
            $uri = $location;
        }
        return parent::getFeed($uri, 'Zend_Gdata_Contacts_ListFeed');
	}*/
	 
}