<?php

trait Timestampable
{
    protected $createdAt;
    protected $updatedAt;

    public function setCreatedAt($date)
    {
        $this->createdAt = $date;
    }

    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    public function setUpdatedAt($date)
    {
        $this->updatedAt = $date;
    }

    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }

    public function touch()
    {
        $this->updatedAt = date('Y-m-d H:i:s');
    }
}