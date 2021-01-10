<?php


namespace app\models;


use app\Core\LicenceModel;
use app\Core\Model;

class Licence extends LicenceModel
{
    public int $nrinwentarz=0;
    public string $nazwalicencji='';
    public string $kluczseryjny='';
    public string $datazakupu='';
    public int $idfaktury=0;
    public string $datawsparcia='';
    public string $waznosclicencji='';
    public string $posiadaczlicencji='';
    public string $notatki='';


    public function save()
    {
        return parent::save();
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
        return ['nrinwentarz', 'nazwalicencji', 'kluczseryjny', 'datazakupu', 'idfaktury','datawsparcia','waznosclicencji', 'posiadaczlicencji', 'notatki'];
    }
    public function labels(): array
    {
        return [
            'nrinwentarz' => 'Numer inwentarzowy',
            'nazwalicencji' => 'Nazwa licencji',
            'kluczseryjny' => 'Klucz seryjny',
            'datazakupu' => 'Data zakupu',
            'idfaktury' => 'ID faktury',
            'datawsparcia' => 'Wsparcie techniczne ważne do',
            'waznosclicencji' => 'Licencja ważna do (data/bezterminowo)',
            'posiadaczlicencji' => 'Kto jest posiadaczem licencji',
            'notatki' => 'Notatki...',


        ];
    }

    public function tableName(): string
    {
        return 'licences';
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