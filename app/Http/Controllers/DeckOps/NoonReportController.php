<?php

namespace App\Http\Controllers\DeckOps;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\DeckOps\NoonReportService;

class NoonReportController extends Controller
{
    public function __construct(NoonReportService $service){
        $this->service = $service;
    }

    public function index(){
        return $this->service->index();
    }

    public function show($id){
        return $this->service->show($id);
    }

    public function create(){
        return $this->service->create();
    }

    public function store(Request $request){
        return $this->service->store($request);
    }

    public function edit($id){
        return $this->service->edit($id);
    }

    public function update($id, Request $request){
        return $this->service->update($id, $request);
    }

    public function destroy($id){
        return $this->service->destroy($id);
    }
}
