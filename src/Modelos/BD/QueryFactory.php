<?php
namespace MVCWeb\Modelos\BD;

class QueryFactory
{
    const COMMON = 'common';
    protected $db;
    protected $common = false;
    protected $quotes = array(
        'Common' => array('"', '"'),
        'Mysql'  => array('`', '`'),
        'Pgsql'  => array('"', '"'),
        'Sqlite' => array('"', '"'),
        'Sqlsrv' => array('[', ']'),
    );
    protected $quote_name_prefix;
    protected $quote_name_suffix;
    protected $quoter;
    protected $instance_count = 0;
    
    public function __construct( $db, $common = null )
    {
        $this->db = ucfirst(strtolower($db));
        $this->common = ($common === self::COMMON);
        $this->quote_name_prefix = $this->quotes[$this->db][0];
        $this->quote_name_suffix = $this->quotes[$this->db][1];
    }

    protected function getQuoter()
    {
        if (! $this->quoter) {
            $this->quoter = new Quoter(
                $this->quote_name_prefix,
                $this->quote_name_suffix
            );
        }

        return $this->quoter;
    }

    protected function newSeqBindPrefix()
    {
        $seq_bind_prefix = '';
        if( $this->instance_count )
        {
            $seq_bind_prefix = '_' . $this->instance_count;
        }
        $this->instance_count ++;
        return $seq_bind_prefix;
    }

    public function newSelect()
    {
        return $this->newInstance('Select');
    }

    protected function newInstance($query)
    {
        if( $this->common )
        {
            $class = "MVCWeb\Modelos\BD\Common";
        }else
        {
            $class = "MVCWeb\Modelos\BD\\{$this->db}";
        }
        $class .= "\\{$query}";
        return new $class(
            $this->getQuoter(),
            $this->newSeqBindPrefix()
        );
    }
}
?>
