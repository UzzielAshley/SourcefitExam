<?php

namespace App\Http\Controllers;
use App\Http\Resources\ProfileCollection;
use Illuminate\Http\Request;
use App\Profile;
use App\Repositories\Repository;

class ProfileController extends Controller
{
    protected $todo;

    public function __construct(Repository $todo, Profile $model)
    {
    $this->repo = $todo;
    $this->model = $model;
    }
    public function store(Request $request)
    {
        return $this->repo->insert($request);
    }

    public function index()
    {
        return new ProfileCollection($this->model->all());
    }

    public function edit($id)
    {
        return $this->repo->getEdit($id);
    }

    public function update($id, Request $request)
    {
        return $this->repo->update($id, $request);
    }

    public function delete($id)
    {
        return $this->repo->delete($id);
    }

    public function show($id)
    {
        return $this->repo->show($id);
    }

}
