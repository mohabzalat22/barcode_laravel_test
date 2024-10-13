<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Picqer\Barcode\BarcodeGeneratorPNG;
class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('welcome',['students'=>Student::paginate(10)]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //save
        $validatedData = $request->validate([
            "name" => ['required','string','unique:students,name','max:255']
        ]);
        $uuid = Str::uuid()->toString();
        if($validatedData){
            $generator = new BarcodeGeneratorPNG();
            $barcode_name = time().'.png';
            file_put_contents(public_path('barcodes/' . $barcode_name), $generator->getBarcode($uuid, $generator::TYPE_CODE_128, 3, 50));
            Student::create([
                'uuid' => $uuid,
                'name'=> $validatedData['name'],
                'barcode' => $barcode_name
            ]);
            //create barcode

            return redirect()->route('students.index',['students'=>Student::all()])->with('message', 'Successfully Saved !');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return view('welcome',['students'=>Student::where('id', $id)->get()]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('edit',['students'=>Student::where('id', $id)->get()]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
