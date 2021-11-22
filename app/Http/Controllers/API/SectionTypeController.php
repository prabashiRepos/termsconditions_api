<?php

namespace App\Http\Controllers\API;

use App\Models\SectionType;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class SectionTypeController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getAll() {
        $sectionTypes = SectionType::where('status', '=', true)->get();

        if ($sectionTypes == null) {
            return response()->json(["error" => 'Terms and Conditions not found'], 400);
        }

        return response()->json(['success' => true, 'message' => 'Section Types retrieved successfully', 'data' => $sectionTypes]);
    }

}
