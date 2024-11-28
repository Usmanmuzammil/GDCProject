<?php

namespace App\Http\Controllers;

use App\Models\course;
use Exception;
use Illuminate\Http\Request;
use Storage;
use Validator;
use Yajra\DataTables\Facades\DataTables;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Course::select('*');
    
            return DataTables::of($data)
                ->editColumn('pdf', function ($row) {
                    // Return the link to the PDF
                    return '<a href="'.$row->pdf.'" target="_blank">View PDF</a>';
                })
                ->editColumn('PDFImage', function ($row) {
                    // return '<div class="image-container">
                    //         <img src="'.$row->pdf_image.'" alt="Image" width="90px" >                
                    // </div>';
                    return '<img class="img-thumbnail" alt="200x200" width="100" src="'.$row->pdf_image.'">';
                })
                ->addColumn('action', function ($data) {
                    return view('admin.course.action_modal', compact('data'));
                })
                ->rawColumns(['pdf', 'action','PDFImage']) // Make sure 'pdf' is processed as HTML
                ->make(true);
        }
    
        return view('admin.course.index');
    }
    
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the request
        $validatedData = $request->validate([
            'course_title' => 'required|string',
            'pdf_image' => 'required|image|max:10240', // 10MB max image size
            'pdf' => 'required|mimes:pdf|max:100000', // 100MB max PDF size
        ]);
    
        // Handle the PDF Image upload
        if ($request->hasFile('pdf_image')) {
            $pdfImage = $request->file('pdf_image');
            $pdfImagePath = $pdfImage->store('course_images', 'public');
        }
    
        // Handle the Course PDF upload
        if ($request->hasFile('pdf')) {
            $pdf = $request->file('pdf');
            $pdfPath = $pdf->store('course_pdfs', 'public');
        }
    
        // Create a new course record (or handle the logic for course creation)
        $course = new Course();
        $course->title = $validatedData['course_title'];
        $course->pdf_image = $pdfImagePath ?? null;
        $course->pdf = $pdfPath;
        $course->save();
    
        // Return a response indicating success
        return response()->json(['message' => 'Course uploaded successfully!'], 200);
    }
    
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // Find the course by ID
        $course = course::findOrFail($id);

        // Delete the course (also handle any associated files if necessary)
        $course->delete();

        // Optionally, you can return a JSON response for AJAX calls
        return back()->with(['success' => 'Course deleted successfully']);
    }
}
