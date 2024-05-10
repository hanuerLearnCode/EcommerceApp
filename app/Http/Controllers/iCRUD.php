<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

interface iCRUD
{
    public function index();

    public function add();

    public function doAdd(Request $request);

    public function edit($id);

    public function doEdit(Request $request, string $id);

    public function delete($id);
}
