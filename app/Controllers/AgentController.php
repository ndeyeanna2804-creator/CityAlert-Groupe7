<?php

class AgentController
{
    public function dashboard()
    {
        require_once __DIR__ .
        '/../Views/agent/dashboard.php';
    }

    public function signalements()
    {
        require_once __DIR__ .
        '/../Views/agent/signalements.php';
    }
}