<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Test;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tests = Test::leftJoin('projects', 'tests.project', '=', 'projects.id')
                ->select('tests.*', 'projects.name as projectName')
                ->get();
        // dd($tests);
        $projects = Project::get();
        return view("tests.index",compact("tests","projects"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $projects = Project::get();
        return view("tests.create",compact("projects"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $this->testValidation($request);

        $test = $this->testData($request);
        Test::create($test);
        return redirect()->route("tests.index");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Test  $test
     * @return \Illuminate\Http\Response
     */
    public function show(Test $test)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Test  $test
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // dd($id);
        $test = Test::where("id",$id)->first();
        $projects = Project::get();
        return view("tests.edit",compact("test","projects"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Test  $test
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // dd($request->all(),$id);
        $test = Test::findOrFail($id);
        if($test){
            $this->testValidation($request);
            $testUpdate = $this->testData($request);
            $testUpdate["updated_at"] = Carbon::now();
            Test::where("id",$id)->update($testUpdate);
            return redirect()->route("tests.index");
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Test  $test
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // dd($id);
        Test::where("id",$id)->delete();
        return back();
    }
    private function testValidation($request){
        Validator::make($request->all(), [
            "testName"=>"required",
            "priority"=>"required",
            "project"=>"required"
        ])->validate();
    }
    private function testData($request){
        return [
            "name" => $request ->testName,
            "priority" => $request -> priority,
            "project" => $request -> project
        ];
    }
}
