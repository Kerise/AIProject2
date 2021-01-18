<?php

namespace app\Core;

abstract class DeviceModel extends DbModel
{
    abstract public function getDisplayName(): string;
}