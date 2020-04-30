<?php

namespace App\Repositories;

interface RepositoryInterface
{
    // insert Data
    public function insert($request);

    // get by id
    public function getEdit($id);

    // update 
    public function update($id, $request);

    // delete
    public function delete($id);
    
    // upload image
    public function show($id);

}
