<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\Banner;
use App\Models\course;
use App\Models\Teacher;
use Illuminate\Http\Request;

class WebController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function home()
    {
        $banner = Banner::get();
        $about = About::first();
        $teachers = Teacher::paginate(8);
        $courses = course::all();  // Fetch all courses from the database
        return view('webiste.home',compact('banner','about','teachers','courses'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function getTeachers()
    {
        $teachers = Teacher::get();
        return view('webiste.teachers',compact('teachers'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function getAbout()
    {
        $about = About::first();
        return view('webiste.about',compact('about'));
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
        //
    }
}
