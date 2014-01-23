<?php namespace NewProject\Repositories;

interface RepositoryInterface  {


    /*
     * Find set of repo objects.
     *
     * @return array
     */
    public function findAll($sort_column, $sort_dir, $limit, $include);

    /*
     * Find repo object by id.
     *
     * @param $id
     * @return object
     */
    public function findById($id, $include);

    /*
    * Find repo object by field.
    *
    * @param $field
    * @param $value
    * @return object
    */
    public function findByField($field, $value);

    /*
     * Update repo object.
     *
     * @param $input
     * @return bool
     */
    public function createRow($input);

    /*
     * Update repo object.
     *
     * @param $input
     * @return bool
     */

    public function updateRow($input);

    /*
     * Delete repo object.
     *
     * @param $id
     * @return bool
     */
    public function deleteRow($id);

    /*
    * Get Total objects in table.
    *
    * @return integer
    */
    public function getTotal();

    /*
     * Get formatted create field.
     *
     * @return date
     */
    public function getFormattedCreatedAttribute();

    /*
    * Get formatted modified field.
    *
    * @return date
    */
    public function getFormattedModifiedAttribute();


}