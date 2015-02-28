<?php
/**
 * @see Zend_Exception
 */
require_once 'Zend/Exception.php';

/**
 * @see Zend_Gdata_Query
 */
require_once('Zend/Gdata/Query.php');

class Zend_Gdata_Contacts_Query extends Zend_Gdata_Query
{
    const CONTACTS_FEED_URI = 'https://www.google.com/m8/feeds/contacts/default/full';

    protected $_defaultFeedUri = self::CONTACTS_FEED_URI;
    public function __construct($url = null)
    {
        parent::__construct($url);
    }
}
