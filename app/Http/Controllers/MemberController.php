<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Member;

class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $member = new Member();
        $memberDetail = $request->toArray();
        $memberDetail['password'] = hash('md5', $memberDetail['password']);
        $member->fill($memberDetail);
        if ($member->save()) {
            $data = [
                "result" => "Success",
                "data" => null,
                "errorMessage" => null
            ];
            return response()->json($data, 200);
        } else {
            $data = [
                "result" => "Fail",
                "data" => null,
                "errorMessage" => null
            ];
            return response()->json($data, 400);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function login(Request $request)
    {

        $member = Member::where('username', $request->username)
            ->where('password', hash('md5', $request->password))
            ->first();

        if(count($member)){
            $data = [
                "result" => "Success",
                "data" => [
                    "id" => $member->id
                ],
                "errorMessage" => null
            ];
            return response()->json($data);
        }
        else{
            $data = [
                "result" => "Fail",
                "data" => null,
                "errorMessage" => "Member Not Found"
            ];
            return response()->json($data, 400);
        }

    }
}
