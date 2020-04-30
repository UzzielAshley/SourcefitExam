<?php

namespace App\Repositories;

use Illuminate\database\Eloquent\Model;
use App\Profile;

class Repository implements RepositoryInterface
{
    protected $todo;

    public function __construct(Profile $model)
    {
    $this->model = $model;
    }
    public function insert($request){
        
        $profile = new Profile([
            'name' => $request->get('name'),
            'address' => $request->get('address'),
            'contact' => $request->get('contact'),
            'email' => $request->get('email'),
            'birthdate' => $request->get('birthdate')
        ]);
    
        $profile->save();

        return response()->json('successfully added');
    }

    public function getEdit($id)
    {
        $profile = $this->model->find($id);
        return response()->json($profile);
    }

    public function update($id, $request)
    {
        $profile = $this->model->find($id);
        $profile->update($request->all());
        return response()->json('successfully updated');
    }

    public function delete($id){
        $profile = $this->model->find($id);

        $profile->delete();
    
        return response()->json('successfully deleted');
    }

    public function show($id){
        $profile    = $this->model->find($id);
        return response()->json($profile);
    }

    
}
