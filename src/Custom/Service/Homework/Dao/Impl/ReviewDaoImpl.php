<?php
namespace Custom\Service\Homework\Dao\Impl;

use Topxia\Service\Common\BaseDao;
use Custom\Service\Homework\Dao\ReviewDao;

class ReviewDaoImpl extends BaseDao implements ReviewDao
{
    protected $table = 'homework_review';

    public function create($review){
        $affected = $this->getConnection()->insert($this->table, $review);
        if ($affected <= 0) {
            throw $this->createDaoException('Insert homework review error.');
        }
        return $this->get($this->getConnection()->lastInsertId());
    }

    public function get($id){
        $sql = "SELECT * FROM {$this->table} WHERE id = ? limit 1";
        return  $this->getConnection()->fetchAssoc($sql,array($id)) ? : array();
    }

    public function countUserPairReviews($homeworkId, $userId){
        $sql = "SELECT count(id) FROM {$this->table} WHERE homeworkId=? and userId=?";
        return $this->getConnection()->fetchColumn($sql, array($homeworkId,$userId));
    }

    public function findReviewsByResultId($resultId){
        $sql = "SELECT * FROM {$this->table} WHERE homeworkResultId = ?";
        return $this->getConnection()->fetchAll($sql, array($resultId)) ? : null;
    }
}