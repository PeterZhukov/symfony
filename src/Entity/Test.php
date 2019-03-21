<?php
namespace App\Entity;

class Test
{
    protected $servicesList;
    protected $templates;

    /**
     * @return mixed
     */
    public function getTemplates()
    {
        return $this->templates;
    }

    /**
     * @param mixed $templates
     */
    public function setTemplates($templates): void
    {
        $this->templates = $templates;
    }

    /**
     * @return mixed
     */
    public function getServicesList()
    {
        return $this->servicesList;
    }

    /**
     * @param mixed $servicesList
     */
    public function setServicesList($servicesList): void
    {
        $this->servicesList = $servicesList;
    }
}