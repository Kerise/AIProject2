<?php


namespace app\models;


use app\Core\InvoiceModel;
use app\Core\Model;
use app\Core\DbModel;


class Invoice extends InvoiceModel
{
    public string $nrFaktury='';
    public string $nrKonrathenta='';
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

    public function tableName(): string
    {
        return 'documents';
    }
    public function primaryKey(): string
    {
        return 'id';
    }

    public function save()
    {
        return parent::save();
    }

    public function attributes(): array
    {
        return ['nrfaktury', 'nrkontrahenta', 'vatid', 'kwotanetto', 'kwotapodatkuvat','kwotabrutto'];
    }

    public function labels(): array
    {
        return [
            'nrfaktury' => 'Numer faktury',
            'nrkontrahenta' => 'Numer kontrahenta',
            'vatid' => 'VAT ID',
            'kwotanetto' => 'Kwota netto',
            'kwotapodatkuvat' => 'Kwota podatku VAT',
            'kwotabrutto' => 'Kwota brutto',
        ];
    }
    public function getDisplayName(): string
    {
        return $this->nrFaktury . ' ' .$this->nrKonrathenta;
    }
}