<?php
/**
 * Created by PhpStorm.
 * User: GrzegorzOLD
 * Date: 3/20/2016
 * Time: 11:26 AM
 */

namespace News\Model;
use Zend\Db\ResultSet\ResultSet;
use Zend\Db\TableGateway\TableGateway;
use Zend\Db\Sql\Select;
use Zend\Paginator\Adapter\DbSelect;
use Zend\Paginator\Paginator;

class NewsTable
{
    protected $tableGateway;

    public function __construct(TableGateway $tableGateway)
    {
        $this->tableGateway = $tableGateway;
    }

    public function fetchAll($paginated=false)
    {
        if ($paginated) {
            // create a new Select object for the table album
            $select = new Select('news');
            $select->order('id DESC');
            // create a new result set based on the Album entity
            $resultSetPrototype = new ResultSet();
            $resultSetPrototype->setArrayObjectPrototype(new News());
            // create a new pagination adapter object
            $paginatorAdapter = new DbSelect(
            // our configured select object
                $select,
                // the adapter to run it against
                $this->tableGateway->getAdapter(),
                // the result set to hydrate
                $resultSetPrototype
            );
            $paginator = new Paginator($paginatorAdapter);
            return $paginator;
        }

        $resultSet = $this->tableGateway->select(function (Select $select) {
            $select->order('id DESC');
        });

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
            'imgUrl' => $news->imgUrl
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