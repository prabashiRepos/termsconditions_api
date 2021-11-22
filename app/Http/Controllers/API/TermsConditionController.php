<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\TermsCondition;
use Illuminate\Http\Request;
use App\Http\Resources\TermsCondition as TermsResource;
use Illuminate\Support\Facades\Validator;

class TermsConditionController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getAll() {

        $termsList = TermsCondition::with('userType', 'sectionType')->get();

        if ($termsList == null) {
            return response()->json(["error" => 'Terms and Conditions not found'], 400);
        }

        return response()->json(['success' => true, 'message' => 'Terms and Conditions retrieved successfully', 'data' => $termsList]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function createTerm(Request $request) {
        $user_type_id = $request->input('user_type_id');
        $sec_type_id = $request->input('sec_type_id');
        $description = $request->input('description');

        $validator = Validator::make($request->all(), [
                    'user_type_id' => 'required|exists:user_types,id',
                    'sec_type_id' => 'required|exists:section_types,id',
                    'description' => 'required'
        ]);

        if ($validator->fails()) {
            return $this->sendError('Validation Error.', $validator->errors());
        }

        $termsCondition = new TermsCondition();
        $termsCondition->user_type_id = $user_type_id;
        $termsCondition->sec_type_id = $sec_type_id;
        $termsCondition->description = $description;
        $termsCondition->save();

        return response()->json(['success' => true, 'data' => $termsCondition, 'message' => 'Terms and Conditions created successfully.'], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TermsCondition  $termsCondition
     * @return \Illuminate\Http\Response
     */
    public function GetTerm($termsId) {
        $termsCondition = TermsCondition::with('userType', 'sectionType')->find($termsId);

        if ($termsCondition == null) {
            return response()->json(["error" => 'Terms and Conditions not found'], 400);
        }

        return response()->json(['success' => true, 'data' => $termsCondition, 'message' => 'Terms and Condition Retrieved successfully.'], 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TermsCondition  $termsCondition
     * @return \Illuminate\Http\Response
     */
    public function updateTerm(Request $request, $termsId = false) {

        $term_id = $request->input('term_id');
        $user_type_id = $request->input('user_type_id');
        $sec_type_id = $request->input('sec_type_id');
        $description = $request->input('description');

        $validator = Validator::make($request->all(), [
                    'user_type_id' => 'required|exists:user_types,id',
                    'sec_type_id' => 'required|exists:section_types,id',
                    'description' => 'required'
        ]);
        if ($validator->fails()) {
            return $this->sendError('Validation Error.', $validator->errors());
        }

        $termsCondition = TermsCondition::where('id', '=', $term_id)->first();

        if ($termsCondition == null) {
            return response()->json(["error" => 'Terms and Conditions not found'], 400);
        }

        $termsCondition->user_type_id = $user_type_id;
        $termsCondition->sec_type_id = $sec_type_id;
        $termsCondition->description = $description;
        $termsCondition->save();

        return response()->json(['success' => true, 'data' => $termsCondition, 'message' => 'Terms and Conditions updated successfully.'], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TermsCondition  $termsCondition
     * @return \Illuminate\Http\Response
     */
    public function deleteTerm(Request $request) {

        $termId = $request->input('term_id');

        $deleteTerm = TermsCondition::with('userType', 'sectionType')->find($termId);

        if ($deleteTerm == null) {
            return response()->json(["error" => 'Terms and Conditions data missing'], 400);
        }

        $deleteTerm->delete();

        return response()->json(['success' => true, 'data' => $deleteTerm, 'message' => 'Terms and Conditions deleted successfully.'], 200);
    }

}
