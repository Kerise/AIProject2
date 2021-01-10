<?php


namespace app\Core;


abstract class LicenceModel extends DbModel
{
    abstract public function getDisplayName(): string;
}