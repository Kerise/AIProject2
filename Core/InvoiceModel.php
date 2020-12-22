<?php


namespace app\Core;


abstract class InvoiceModel extends DbModel
{
    abstract public function getDisplayName(): string;
}