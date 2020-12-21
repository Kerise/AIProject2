<?php


namespace app\models;


use app\Core\Model;

class Invoice extends Model
{
    public string $nr='';
    public string $name='';
    public int $vat=0;
    public int $kwotaNetto=0;
    public int $kwotaVAT=0;
    public int $kwotaBrutto=0;
    public function rules(): array
    {
        return [
            'nr' => [self::RULE_REQUIRED],
            'name' => [self::RULE_REQUIRED]
        ];
    }
}