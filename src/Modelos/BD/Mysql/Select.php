<?php
namespace MVCWeb\Modelos\BD\Mysql;

use MVCWeb\Modelos\BD\Common;

class Select extends Common\Select
{
    /**
     * [calcFoundRows description]
     * @param  boolean $enable [description]
     * @return [type]          [description]
     */
    public function calcFoundRows($enable = true)
    {
        $this->setFlag('SQL_CALC_FOUND_ROWS', $enable);
        return $this;
    }
    /**
     * [cache description]
     * @param  boolean $enable [description]
     * @return [type]          [description]
     */
    public function cache( $enable = true )
    {
        $this->setFlag('SQL_CACHE', $enable);
        return $this;
    }

    /**
     * [noCache description]
     * @param  boolean $enable [description]
     * @return [type]          [description]
     */
    public function noCache( $enable = true )
    {
        $this->setFlag('SQL_NO_CACHE', $enable);
        return $this;
    }

    /**
     * [straightJoin description]
     * @param  boolean $enable [description]
     * @return [type]          [description]
     */
    public function straightJoin($enable = true)
    {
        $this->setFlag('STRAIGHT_JOIN', $enable);
        return $this;
    }

    /**
     * [highPriority description]
     * @param  boolean $enable [description]
     * @return [type]          [description]
     */
    public function highPriority($enable = true)
    {
        $this->setFlag('HIGH_PRIORITY', $enable);
        return $this;
    }

    /**
     * [smallResult description]
     * @param  boolean $enable [description]
     * @return [type]          [description]
     */
    public function smallResult($enable = true)
    {
        $this->setFlag('SQL_SMALL_RESULT', $enable);
        return $this;
    }

    /**
     * [bigResult description]
     * @param  boolean $enable [description]
     * @return [type]          [description]
     */
    public function bigResult($enable = true)
    {
        $this->setFlag('SQL_BIG_RESULT', $enable);
        return $this;
    }

    /**
     * [bufferResult description]
     * @param  boolean $enable [description]
     * @return [type]          [description]
     */
    public function bufferResult($enable = true)
    {
        $this->setFlag('SQL_BUFFER_RESULT', $enable);
        return $this;
    }
}
?>
