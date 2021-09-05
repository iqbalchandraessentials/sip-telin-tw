<?php

namespace App\Interfaces;

interface CustomerUltimaInterface
{
    public function getAll();
    public function getLeadCollection($page,$limit,$tipe_keyword,$keyword,$year,$filter);
    public function getProcessCollection($page,$limit,$tipe_keyword,$keyword,$year,$filter);
    public function getActivatedCollection($page,$limit,$tipe_keyword,$keyword,$year,$filter);
    public function getDataPart($name, $status);
    public function getDetailSummary($id_customer, $id_customer_number);
}
