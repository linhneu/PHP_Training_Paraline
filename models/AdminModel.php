<h1>Adminmodel</h1>
<?php
class AdminModel extends BaseModel
{
    const TABLE = 'admin';

    public function getAllAdmin($select = ['*']) {
        return $this->getAll(self::TABLE, $select);
    }
    
}