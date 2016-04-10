<?php
/**
 * Created by PhpStorm.
 * User: GrzegorzOLD
 * Date: 3/20/2016
 * Time: 11:26 AM
 */

namespace Subsites\Model;
use Zend\Db\TableGateway\TableGateway;

class SubsitesTable
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

    public function getSubsites($id)
    {
        $id  = (int) $id;
        $rowset = $this->tableGateway->select(array('id' => $id));
        $row = $rowset->current();
        if (!$row) {
            throw new \Exception("Nie znaleziono wiersza o $id");
        }
        return $row;
    }

    public function getSubsitesUrl($url)
    {
        $url  = (string) $url;
        $rowset = $this->tableGateway->select(array('url' => $url));
        $row = $rowset->current();
        if (!$row) {
            throw new \Exception("Nie znaleziono wiersza o $url");
        }
        return $row;
    }

    public function saveSubsites(Subsites $subsites)
    {
        $data = array(
            'title'  => $subsites->title,
            'description' => $subsites->description,
            'url' => $subsites->url
        );

        $id = (int) $subsites->id;
        if ($id == 0) {
            $this->tableGateway->insert($data);
        } else {
            if ($this->getSubsites($id)) {
                $this->tableGateway->update($data, array('id' => $id));
            } else {
                throw new \Exception('Id Subsitesa nie istnieje!');
            }
        }
    }

    public function deleteSubsites($id)
    {
        $this->tableGateway->delete(array('id' => (int) $id));
    }
}