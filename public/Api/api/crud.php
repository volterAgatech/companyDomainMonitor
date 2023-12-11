<?php
class Crud
{
    //пример select
    function getPlaybill($limit, $month, $category)
    {
        //текущий год
        $year = date('Y');
        //вернуть задачи где status == авторизированный пользователь
        $rows = R::getAll('SELECT * FROM playbill WHERE MONTH(dateevent) =' . $month . 'and YEAR(dateevent) =' . $year . 'and category = ' . $category . 'limit' . $limit);
        return $rows;
    }
    function insertIntoTable($tablename, $formData)
    {
        $table = R::dispense($tablename);
        // Заполняем объект свойствами
        //var_dump($table);
        foreach ($formData as $key => $value) {
            print "$key => $value\n";
            $table->$key = $value;
        }
        R::store($table);
    }
    function updateTableRow($tablename, $rowId, $formData)
    {
        $row = R::load($tablename, $rowId);
        // Заполняем объект свойствами
        if ($formData->pass) {
            $formData->pass = password_hash($formData->pass, PASSWORD_DEFAULT);
        }
        foreach ($formData as $key => $value) {
            print "$key => $value\n";
            $row->$key = $value;
        }
        R::store($row);
    }
    function deleteRowById($id, $tablename)
    {
        //DELETE FROM `cities` WHERE `id` = 13
        R::exec('DELETE FROM ' . $tablename . ' WHERE id = ' . $id);
        $table = R::getAll('SELECT * FROM ' . $tablename);
        return $table;
    }
}
?>