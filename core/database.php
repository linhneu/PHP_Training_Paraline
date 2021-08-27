<?php
interface Database
{
    public function _query($sql);

    public function create($table, $data = []);
    
    public function update($table, $id, $data = []);

    public function delete($table, $id, $del_flag);

}
