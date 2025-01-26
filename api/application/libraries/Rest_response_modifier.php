<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Rest_response_modifier 
{

    public function sendResponse($result, $message)
    {
    	$response = [
            // 'success' => true,
            'status' => true,
            'status_code' => 200,
            'message' => $message,
            'err_res' => '',
            'data'    => $result,
        ];

        return $response;
    }

    public function NewSendResponse($result, $message)
    {
    	$response = [
            'status' => true,
            'status_code' => 200,
            'message' => $message,
            'err_res' => '',
            'data'    => $result,
            'total' => $result->total(),
            'prev'  => $result->previousPageUrl(),
            'next'  => $result->nextPageUrl(),
            'current_page'  => $result->CurrentPage(),
            'per_page'  => $result->PerPage(),
        ];
        return $response;
    }

    public function groupUserResponse($result, $message, $case = [])
    {
    	$response = [
            'success' => true,
            'message' => $message,
            'err_res' => '',
            'status' => 200,
            'case_info' =>$case,
            'data'    => $result,
        ];
        return $response;
    }


   
    public function sendError($error, $errorMessages = [], $code = 404)
    {
    	$response = [
            'status' => false,
            'status_code' => $code,
            'message' => $error,
            'err_res' => null,
            // 'status' => $code,
            'data' => null,
        ];

        if(!empty($errorMessages)){
            $response['err_res'] = $errorMessages['error'];
        }

        return $response;
    }

}