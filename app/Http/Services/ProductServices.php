<?php

namespace App\Http\Services;

use Illuminate\Http\Request;

interface ProductServices
{
    public function index();
    public function show($product);
    public function store($request);
    public function update($request, $product);
    public function destroy($product);
    public function getall();
    public function getProductById($id);
}