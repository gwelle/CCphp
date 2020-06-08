<?php

namespace carsery\core;

use carsery\core\Connection\BDDInterface;
use carsery\core\Connection\PDOConnection;

class QueryBuilder{

	
	protected $connection;
	protected $query;
	protected $parameters;
	protected $alias;

        /**
         * 
         * @param BDDInterface $connection
         */
	public function __construct(BDDInterface $connection = null){

		$this->connection = $connection ;
	}

        /**
         * 
         * @param string $values
         * @return \carsery\core\QueryBuilder
         */
	function select(string $values = '*') : QueryBuilder {

    	$this->query = "SELECT ".$values;
    	return $this;
	}
	
        /**
         * 
         * @param string $table
         * @param type $alias
         * @return \carsery\core\QueryBuilder
         */
	function from(string $table, $alias) : QueryBuilder {

		$this->alias = $alias;
		$this->query = "FROM ".$table. " AS ".$this->alias;
		return $this;
	} 
        
        /**
         * 
         * @param string $conditions
         * @return \carsery\core\QueryBuilder
         */
	function where(string $conditions) : QueryBuilder{

		$this->query = "WHERE ".$conditions ;
		return $this;
	}
        
        /**
         * 
         * @param type $key
         * @param type $value
         * @return \carsery\core\QueryBuilder
         */
	function setParameters($key, $value) : QueryBuilder{


		return $this;
	}

        /**
         * 
         * @param string $table
         * @param string $aliasTarget
         * @param string $fieldSource
         * @param type $fieldTarget
         * @return \carsery\core\QueryBuilder
         */
	public function join(string $table, string $aliasTarget, 
		string $fieldSource = 'id', $fieldTarget = 'id') : QueryBuilder {

		$this->query = $this->alias." INNER JOIN ".$table." AS ".$aliasTarget." ON ".$this->alias.".".$fieldSource." = ".$aliasTarget.".".$fieldTarget;

		return $this ;

	}
        
        /**
         * 
         * @param string $table
         * @param string $aliasTarget
         * @param string $fieldSource
         * @param type $fieldTarget
         * @return \carsery\core\QueryBuilder
         */
	public function leftJoin(string $table, string $aliasTarget, 
		string $fieldSource = 'id', $fieldTarget = 'id') : QueryBuilder {

		return $this;
	}

        /**
         * 
         * @param string $query
         * @return \carsery\core\QueryBuilder
         */
	public function addToQuery(string $query) : QueryBuilder{

		$this->connection->query($query);
		return $this ;
	}

        /**
         * 
         */
	public function getQuery() : ResultInterface{

		
	}

/*CREATE TABLE `ymnx_posts` (
  `id` int(11) NOT NULL,
  `title` varchar(200) NOT NULL,
  `author` int(11) NOT NULL,
  `date_inserted` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `date_updated` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

ALTER TABLE ymnx_posts ADD FOREIGN KEY (`author`) references ymnw_users(id);*/

}