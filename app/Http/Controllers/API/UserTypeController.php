<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\UserType;
use Illuminate\Http\Request;
use App\Http\Resources\ProjectResource;
use Illuminate\Support\Facades\Validator;

class UserTypeController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getAll() {
        $userTypes = UserType::where('status', '=', true)->get();

        if ($userTypes == null) {
            return response()->json(["error" => 'Terms and Conditions not found'], 400);
        }

        return response()->json(['success' => true, 'message' => 'User Types retrieved successfully', 'data' => $userTypes]);
    }

}
