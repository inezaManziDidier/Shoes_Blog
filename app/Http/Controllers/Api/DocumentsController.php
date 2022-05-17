<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Document;

class DocumentsController extends Controller
{

    public function getDocument($doc)
    {
        $doc = Document::where('body', $doc)->first();
        if ($doc) {
            return response()->json([
            'message' => 'doc_found'
        ], 200);
        } else {
            return response()->json([
            'message' => 'doc_not_found'
        ], 201);
        }
    }
}
