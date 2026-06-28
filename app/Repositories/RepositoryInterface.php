<?php

interface RepositoryInterface
{
    public function create($data);

    public function findAll();

    public function findById($id);

    public function update($id, $data);

    public function delete($id);
}