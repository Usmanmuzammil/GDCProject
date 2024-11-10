<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables;

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Teacher::select('*');

            return DataTables::of($data)
            ->addColumn('actions',function ($row) {
                $statusText = ($row->status == 1) ? 'Active' : 'InActive';
                $badgeClass = ($row->status == 1) ? 'success' : 'danger';
                return '<td>
                       <span class="badge bg-'.$badgeClass.'">'.$statusText.'</span>
                </td>';
            })
            ->editColumn('image', function ($row) {
                return '<div class="image-container">
                        <img src="'.$row->image.'" alt="Image"width="90px" >                
                </div>';
            })
                ->addColumn('actions', function ($data){
                    return view('admin.users.action_modal',compact('data'));

                })
                ->rawColumns(['actions','image'])
                ->make(true);
        }

        return view('admin.teacher.index');
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
        try {
            $data = Validator::make($request->all(),[
                'name' => 'required',
                'email' => 'required',
                'desgination' => 'required',
                'youtube_link' => 'nullable',
                'facebook_link' => 'nullable',
                'twitter_link' => 'nullable',
                'image' => 'required',
            ]);

            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $imageName = time().'.'.$image->getClientOriginalExtension();
                $path = public_path('/upload_image');
                $image->move($path, $imageName);
            }
            Teacher::create([
                'name' => $request->name,
                'email' => $request->email,
                'desgination' => $request->desgination,
                'youtube_link' => $request->youtube_link,
                'facebook_link' => $request->facebook_link,
                'twitter_link' => $request->twitter_link,
                'image' => '/upload_image/'.$imageName,
            ]);

            return back()->with(['success' => 'Teacher Added Successfully!']);

        } catch (Exception $ex) {
            return back()->with(['danger' => $ex->getMessage()]);
        }
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
    public function destroy(string $id)
    {
        try {
            
            $teacher = Teacher::findOrFail($id)->delete();
            if ($teacher) {
                return back()->with(['danger' => 'Teacher Deleted Successfully!']);
            } else {
                return back()->with(['success' => 'Teacher Id is not found!']);
            }
        } catch (Exception $ex) {
            return back()->with(['danger' => $ex->getMessage()]);
        }
    }
}
