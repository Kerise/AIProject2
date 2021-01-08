<?php


namespace app\models;


use app\Core\InvoiceModel;
use app\Core\Model;

class Invoice extends InvoiceModel
{
    public string $nrfaktury='';
    public string $nrkontrahenta='';
    public int $vatid=0;
    public int $kwotanetto=0;
    public int $kwotapodatkuvat=0;
    public int $kwotabrutto=0;
    public string $odnosnik='';


public function save()
{
    return parent::save();
}
    public function rules(): array
    {
        return [
            'nrfaktury' => [self::RULE_REQUIRED],
            'nrkontrahenta' => [self::RULE_REQUIRED]
        ];
    }
    public function attributes(): array
    {
        return ['nrfaktury', 'nrkontrahenta', 'vatid', 'kwotanetto', 'kwotapodatkuvat','kwotabrutto','odnosnik'];
    }
    public function labels(): array
    {
        return [
            'nrfaktury' => 'Numer faktury',
            'nrkontrahenta' => 'Numer kontrahenta',
            'vatid' => 'VAT ID',
            'kwotanetto' => 'Kwota Netto',
            'kwotapodatkuvat' => 'Kwota podatku VAT',
            'kwotabrutto' => 'Kwota brutto',
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

    public function getDisplayName(): string
    {
        // TODO: Implement getDisplayName() method.
    }
}