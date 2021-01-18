<?php


namespace app\models;


use app\Core\DeviceModel;
use app\Core\Model;

class Device extends DeviceModel
{
    public int $nrinwentarz=0;
    public string $nazwasprzetu='';
    public string $numerseryjny='';
    public string $datazakupu='';
    public int $idfaktury=0;
    public string $gwarancja='';
    public int $wartoscnetto=0;
    public string $posiadaczsprzetu='';
    public string $notatki='';
    public int $userID=0;


    public function save()
    {
        return parent::save();
    }
    public function edit($id)
    {
        return parent::edit($id);
    }
    public function rules(): array
    {
        return [
            'nrinwentarz' => [self::RULE_REQUIRED],
            'idfaktury' => [self::RULE_REQUIRED]
        ];
    }
    public function attributes(): array
    {
        return ['nrinwentarz', 'nazwasprzetu', 'numerseryjny', 'datazakupu', 'idfaktury','gwarancja','wartoscnetto', 'posiadaczsprzetu', 'notatki','UserID'];
    }
    public function labels(): array
    {
        return [
            'nrinwentarz' => 'Numer inwentarzowy',
            'nazwasprzetu' => 'Nazwa sprzętu',
            'numerseryjny' => 'Numer seryjny',
            'datazakupu' => 'Data zakupu',
            'idfaktury' => 'ID faktury',
            'gwarancja' => 'Kiedy wygasa gwarancja',
            'wartoscnetto' => 'Wartosc netto',
            'posiadaczsprzetu' => 'Kto jest posiadaczem sprzętu',
            'notatki' => 'Notatki...',


        ];
    }

    public function tableName(): string
    {
        return 'devices';
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