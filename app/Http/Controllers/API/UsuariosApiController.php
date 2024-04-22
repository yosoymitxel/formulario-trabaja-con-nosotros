<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Usuarios;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage; // For file storage

class UsuariosApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $users = Usuarios::all();
        return response()->json($users, 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nombre' => 'required|string|max:255',
            'fecha_nacimiento' => 'required|date',
            'celular' => 'required|string|max:255',
            'experiencias' => 'nullable|json',
            'idiomas' => 'nullable|json',
            'archivo' => 'nullable|file|mimes:pdf,docx,doc', // Optional file validation
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $data = $request->all();

        // Handle file upload (if present)
        // Handle file upload (if present)
        if ($request->hasFile('archivo')) {
            $file = $request->file('archivo');
            $data['archivo'] = base64_encode(file_get_contents($file->getRealPath())); // Encode file content as base64
        }

        $user = Usuarios::create($data);

        return response()->json($user, 201);
    }

}
