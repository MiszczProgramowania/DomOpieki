<?php
/**
 * Created by PhpStorm.
 * User: GrzegorzOLD
 * Date: 3/20/2016
 * Time: 11:26 AM
 */

namespace News\Model;
use Zend\Db\TableGateway\TableGateway;

class NewsTable
{
    protected $tableGateway;

    public function __construct(TableGateway $tableGateway)
    {
        $this->tableGateway = $tableGateway;
    }

    public function fetchAll()
    {
        $resultSet = $this->tableGateway->select();
        return $resultSet;
    }

    public function getNews($id)
    {
        $id  = (int) $id;
        $rowset = $this->tableGateway->select(array('id' => $id));
        $row = $rowset->current();
        if (!$row) {
            throw new \Exception("Nie znaleziono wiersza o $id");
        }
        return $row;
    }

    public function saveNews(News $news)
    {
        $data = array(
            'title'  => $news->title,
            'description' => $news->description,
        );

        $id = (int) $news->id;
        if ($id == 0) {
            $this->tableGateway->insert($data);
        } else {
            if ($this->getNews($id)) {
                $this->tableGateway->update($data, array('id' => $id));
            } else {
                throw new \Exception('Id Newsa nie istnieje!');
            }
        }
    }

    public function deleteNews($id)
    {
        $this->tableGateway->delete(array('id' => (int) $id));
    }
}