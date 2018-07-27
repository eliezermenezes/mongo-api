<?php
namespace App\Service;
use Illuminate\Http\Request;

interface IAreaService
{
    public function createArea(Request $request);

    public function getAreas();

    public function getAreaById($id);

    public function updateArea($id, Request $request);

    public function deleteArea($id);
}