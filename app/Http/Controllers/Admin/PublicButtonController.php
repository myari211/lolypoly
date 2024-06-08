<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Validator;
use App\Helpers\GeneralFunction;
use Ramsey\Uuid\Uuid;
use Carbon\Carbon;

class PublicButtonController extends Controller
{
    public function index() {
        $data = DB::table('10_public_buttons')
            ->get();

        return view('admin.public_button.index', compact('data'));
    }

    public function by_id($id) {
        $data = DB::table('10_public_buttons')
            ->where('id', $id)
            ->first();

        return response()->json([
            "success" => true,
            "data" => $data,
        ]);
    }

    public function create(Request $request) {
        $validator = Validator::make($request->all(), [
            "icon" => ['required'],
            "url" => ['required'],
        ]);

        if($validator->fails()) {
            return response()->json([
                "success" => false,
                "messages" => $validator->messages()->all(),
            ]);
        }

        try {
            $create = DB::table('10_public_buttons')
                ->insert([
                    "id" => Uuid::uuid4()->toString(),
                    "icon" => $request->icon,
                    "url" => $request->url,
                    'created_at' => Carbon::now(),
                ]);
            
            $status = true;
            $messages = "Success Created";
        }
        catch(\Exception $e) {
            $status = false;
            $messages = $e->getMessage();
        }

        return response()->json([
            "success" => $status,
            "messages" => $messages,
        ]);
    }

    public function update($id, Request $request) {
        $validator = Validator::make($request->all(), [
            "icon" => ['required'],
            'url' => ['required'],
        ]);

        if($validator->fails()) {
            return response()->json([
                "success" => false,
                "messages" => $validator->messages()->all(),
            ]);
        }
        
        $check = DB::table('10_public_buttons')
            ->where('id', $id)
            ->count();

        if($check < 1) {
            return response()->json([
                "success" => false,
                "messages" => "Data Not Found",
            ]);
        }

        try {
            $update = DB::table('10_public_buttons')
                ->where('id', $id)
                ->update([
                    "icon" => $request->icon,
                    "url" => $request->url,
                    "updated_at" => Carbon::now(),
                ]);

            $status = true;
            $messages = "Success Updated";
        }
        catch(\Exception $e) {
            $status = false;
            $messages = $e->getMessage();
        }

        return response()->json([
            "success" => $status,
            "messages" => $messages,
        ]);
    }

    public function delete($id) {
        $check = DB::table("10_public_buttons")
            ->where('id', $id)
            ->count();

        if($check < 1) {
            return response()->json([
                "success" => false,
                "messages" => "Data Not Found",
            ]);
        }

        try {
            $delete = DB::table('10_public_buttons')
                ->where('id', $id)
                ->delete();

            $success = true;
            $messages = "Success Deleted";
        }
        catch(\Exception $e) {
            $success = false;
            $messages = $e->getMessage();
        }

        return response()->json([
            "success" => $success,
            "messages" => $messages,
        ]);
    }
}
