<?php


namespace app\Core\form;


use app\Core\Model;

class Form
{
    public static function begin($action, $method,$enctype="")
    {
        echo sprintf('<form action="%s" method="%s" enctype="%s">', $action, $method,$enctype);
        return new Form();
    }

    public static function end()
    {
        echo '</form>';
    }

    public function field(Model $model, $attribute)
    {
        return new Field($model, $attribute);
    }
    public function date_field(Model $model, $attribute)
    {
        return new DateField($model, $attribute);
    }
}