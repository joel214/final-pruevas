<?php 

interface servirBase {
    public function GetByid($id);
    public function  Getlist();
    public function add($entity);
    public function update($id, $entity);
    public function delete($id);
}




?>