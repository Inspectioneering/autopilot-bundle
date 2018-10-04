<?php

namespace Inspectioneering\AutopilotBundle\Service;

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
}