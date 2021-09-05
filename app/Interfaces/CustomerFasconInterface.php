<?php

namespace App\Interfaces;

interface CustomerFasconInterface
{
    public function getAll();

    public function getPending();
    public function getPendingName($name);
    public function getPendingCollection();

    public function getRegistered();
    public function getRegisteredName($name);
    public function getRegisteredCollection();

    public function getRejected();
    public function getRejectedName($name);
    public function getRejectedCollection();

    public function getTrashed();
    public function getTrashedName($name);
    public function getTrashedCollection();

    public function getDataPart($name, $status);
    public function getDetailSummary($id_customer, $id_customer_number);
}
