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
     * @param $email
     * @param array $params
     * @return AutopilotContact
     * @throws AutopilotException
     */
    public function setContact($email, array $params = array())
    {
        if (!$contact = $this->getContact($email)) {
            $contact = new AutopilotContact();
            $contact->setFieldValue('email', $email);
        }

        $contact->fill($params);

        return $this->saveContact($contact);
    }
}