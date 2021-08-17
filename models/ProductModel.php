<h1>Load được model</h1>
<?php
class ProductModel extends BaseModel
{
    const TABLE = 'products';
    public function getAllProduct($select = ['*']) {
        return $this->getAll(self::TABLE, $select);

    }
    public function findById($id) {
        return [
            'id' => 12,
            'name' => 'Iphone12'
        ];
    }
    public function delete() {
        return __METHOD__;
    }
}