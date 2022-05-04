
<?php
class CategoriesModel extends BaseModel
{
    ///2------thì sẽ chạy vào đây rồi gọi đến all của basemodel
    //bảng trong db
    const TABLE = 'categories';
    public function getAll($select = ['*'], $orderBy = [], $limit = 15)
    {
        return $this->all(self::TABLE, $select, $orderBy, $limit);
    }
    // public function getAll()
    // {
    //     return $this->all(self::TABLE);
    // }
    public function findById($id)
    {
        return $this->find(self::TABLE, $id);
    }
    public function store($data)
    {
        $this->create(self::TABLE, $data);
    }
    public function destroy($id)
    {
        $this->deleteCate(self::TABLE, $id);
    }
    public function updateData($id, $data)
    {
        $this->updateCate(self::TABLE, $id, $data);
    }
}
