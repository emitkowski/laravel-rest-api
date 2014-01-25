<?php namespace RestApiSample\Repositories;

use Eloquent;

/*
 * This class defines Eloquent methods
 */

abstract class EloquentRepositoryAbstract extends Eloquent implements RepositoryInterface {

    protected $guarded = array();

    public $timestamps = true;

    /*
     * Find set of repo objects.
     *
     * @param $sort_column
     * @param $sort_dir
     * @param $limit
     * @return array
     */
    public function findAll($sort_column = null, $sort_dir = null, $limit = null)
    {

        $query = $this;

        if($sort_column != null && $sort_dir != null)
        {
            $query = $query->orderBy($sort_column , $sort_dir);
        }

        if($limit != null)
        {
            $query = $query->take($limit);
        }

        $items = $query->get();

        return $items;

    }


 /*
  * Find repo object by id.
  *
  * @param $id
  * @return object
  */
    public function findById($id)
    {
        return $this->find($id);
    }

   /*
    * Find repo object by field.
    *
    * @param $field
    * @param $value
    * @return array
    */
    public function findByField($field, $value)
    {
        return $this->where($field, $value)->get();
    }

   /*
    * Create repo object.
    *
    * @param $input
    * @return object
    */
    public function createRow($input)
    {
        return $this->create($input);
    }

   /*
    * Update repo object.
    *
    * @param $input
    * @return object
    */
    public function updateRow($input)
    {
        return $this->update($input);
    }

    /*
     * Delete repo object.
     *
     * @param $id
     * @return bool
     */
    public function deleteRow($id)
    {
       return $this->find($id)->delete();
    }

    /*
    * Get Total objects in table.
    *
    * @return integer
    */
    public function getTotal()
    {
        return $this->count();
    }

}