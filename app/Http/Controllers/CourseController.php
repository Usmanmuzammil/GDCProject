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
        $course->course_title = $validatedData['course_title'];
    
        // Ensure file paths are properly stored
        $course->pdf_image = isset($pdfImagePath) ? '/storage/' . $pdfImagePath : null;
        $course->pdf = isset($pdfPath) ? '/storage/' . $pdfPath : null;
    
        $course->save();
    
        // Return a response indicating success
        return redirect()->back()->with('message', 'Course uploaded successfully!');
    }
    
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    public function downloadPdf($courseId)
    {
        // Find the course by its ID
        $course = Course::find($courseId);
    
        if ($course) {
            // Correct the path to the file (from /storage/ to the full path in storage)
            $pdfPath = storage_path('app/public/course_pdfs/' . basename($course->pdf));
    
            if (file_exists($pdfPath)) {
                // Increment the download count
                $course->download_count++;
                $course->save();
    
                // Serve the PDF file to the user
                return response()->file($pdfPath);
            } else {
                // If file doesn't exist, return a 404 error
                return abort(404, 'File not found');
            }
        }
    
        // Return 404 if course not found
        return abort(404);
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
        return back()->with(['success' => 'Book deleted successfully']);
    }
}
