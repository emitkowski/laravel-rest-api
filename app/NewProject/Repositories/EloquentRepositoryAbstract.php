<?php namespace NewProject\Repositories;

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
     * @@return StdClass Object with $items and $totalItems
     */
    public function findAll($sort_column = NULL, $sort_dir = NULL, $limit = NULL, $include = array())
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

        if(!empty($include))
        {
            $query = $query->with($include);
        }

        $items = $query->get();

        $data = new \Stdclass;
        $data->items = $items->all();
        $data->totalItems = $items->count();

        return $items;

    }


 /*
  * Find repo object by id.
  *
  * @param $id
  * @return object
  */
    public function findById($id, $fail = false, $include = array())
    {

        $query = $this;

        if(!empty($include))
        {
            $query = $query->with($include);
        }

        if($fail == true)
        {
            return $query->findOrFail($id);
        }
        else
        {
            return $query->find($id);
        }

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
    * @return bool
    */
    public function createRow($input)
    {
        // dd($input);
        
        return $this->create($input);
    }

   /*
    * Update repo object.
    *
    * @param $input
    * @return bool
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

    /*
     * Get formatted create field.
     *
     * @return date
     */
    public function getFormattedCreatedAttribute()
    {
        if($this->offsetExists('created_at'))
        {
            return date('m/d/Y g:i a', strtotime($this->getAttribute('created_at')));
        }
    }

    /*
     * Get formatted create field.
     *
     * @return date
     */
    public function getFormattedModifiedAttribute()
    {
        if($this->offsetExists('updated_at'))
        {
            return date('m/d/Y g:i a', strtotime($this->getAttribute('updated_at')));
        }
    }

}