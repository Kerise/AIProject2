<?php


namespace app\Core;


abstract class DbModel extends Model
{
    abstract public function tableName(): string;

    abstract public function attributes(): array;

    abstract public function primaryKey() : string;

    public function save()
    {
        $tableName = $this->tableName();
        $attributes = $this->attributes();
        $params = array_map(function ($attr) {
            return ":$attr";
        },$attributes);

        $statement = self::prepare("INSERT INTO $tableName (".implode(',', $attributes).") 
                VALUES(".implode(',', $params).")");

            foreach ($attributes as $attribute) {
                $statement->bindValue(":$attribute", $this->{$attribute});
        }

        $statement->execute();
        return true;
    }
    public function edit($id)
    {
        $tableName = $this->tableName();
        $attributes = $this->attributes();
        if($tableName == "documents")
        {
            $decrement=3;
        }
        elseif($tableName == "licences")
        {
            $decrement=2;
        }
        elseif($tableName == "devices")
        {
            $decrement=3;
        }
        $params = array_map(function ($attr) {
            return ":$attr";
        },$attributes);
        $tab = [];
        foreach ($attributes as $i=>$a){
            $tab[$a]=$params[$i];
        }

        $str = "";
        $index=0;
        foreach ($tab as $i=>$r){
            if($index==(count($tab)-($decrement-1))){
                break;
            }
            if($index==(count($tab)-$decrement)){
                $str .= "$i=$r";
            }else{
                $str .= "$i=$r,";
            }
            $index+=1;
        }
        $statement = self::prepare("UPDATE $tableName SET $str where id=:id");
        $index=0;
        foreach ($attributes as $attribute) {
            if($index==(count($attributes)-($decrement-1))){
                break;
            }
            $statement->bindValue(":id", $id);
            $statement->bindValue(":$attribute", $this->{$attribute});
            $index+=1;
        }

        $statement->execute();
       return true;
    }
    public function findOne($where)
    {
        $tableName = static::tableName();
        $attributes = array_keys($where);
        $sql = implode("AND ",array_map(function ($attr) {
            return "$attr = :$attr";
        },$attributes));
        $statement = self::prepare("SELECT * FROM $tableName WHERE $sql");
        foreach($where as $key => $item)
        {
            $statement->bindValue(":$key",$item);
        }
        $statement->execute();
        return $statement->fetchObject(static::class);
    }
    public function findAll()
    {
        $tableName= static::tableName();
        $statement = self::prepare("SELECT * FROM users,$tableName where users.id = $tableName.UserID ");
        $statement->execute();
        return $statement->fetchAll();
    }
    public function findByUser($where)
    {
        $tableName = static::tableName();
        $statement = self::prepare("SELECT * FROM $tableName WHERE UserID=$where");
        $statement->execute();
        return $statement->fetchAll();
    }

    public function deleteById($id)
    {
        $tableName = static::tableName();
        $statement = self::prepare("DELETE FROM $tableName WHERE id=$id");
        $statement->execute();
        return 'OK';
    }


    public static function prepare($sql)
    {
        return Application::$app->db->pdo->prepare($sql);
    }
}