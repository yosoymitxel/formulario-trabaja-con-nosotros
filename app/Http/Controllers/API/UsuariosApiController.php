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
        if ($request->hasFile('archivo')) {
            $fileName = time() . '_' . $request->file('archivo')->getClientOriginalName();
            $path = Storage::disk('your_storage_disk')->put('user-files', $request->file('archivo')); // Replace "your_storage_disk" with your configured disk name

            $data['archivo'] = $path;
        }

        $user = Usuarios::create($data);

        return response()->json($user, 201);
    }

}
