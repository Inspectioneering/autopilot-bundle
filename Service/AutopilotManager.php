<?php

namespace Inspectioneering\AutopilotBundle\Service;

use Autopilot\AutopilotContact;
use Autopilot\AutopilotException;

class AutopilotManager extends \Autopilot\AutopilotManager
{
    /**
     * AutopilotManager constructor.
     *
     * @param string $apiKey
     */
    public function __construct($apiKey)
    {
        parent::__construct($apiKey);
    }

    /**
     * Convenience function that finds or creates a contact based on an email address and updates one or more additional
     * Autopilot Custom Fields.
     *
     * @param string $email
     * @param array $params
     * @return AutopilotContact
     * @throws AutopilotException
     */
    public function setContact($email, array $params = array())
    {
        if (!$contact = $this->getContactOrNull($email)) {
            $contact = new AutopilotContact();
            $contact->setFieldValue('email', $email);
        }

        $contact->fill($params);

        return $this->saveContact($contact);
    }

    /**
     * Convenience function that adds an AutopilotContact to a list by name.
     *
     * @param AutopilotContact $contact
     * @param string $list
     * @return bool
     * @throws AutopilotException
     */
    public function addToList(AutopilotContact $contact, $list)
    {
        if ($listId = $this->getListByName($list)) {
            return $this->addContactToList($listId, $contact->getFieldValue('contact_id'));
        }

        return false;
    }

    /**
     * Try to get a contact from Autopilot. If not found, return null instead of throwing an exception.
     *
     * @param string $email
     * @return AutopilotContact|null
     */
    private function getContactOrNull($email)
    {
        try {
            return $this->getContact($email);
        } catch (AutopilotException $e) {
            return null;
        }
    }
}