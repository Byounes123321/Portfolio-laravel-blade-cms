<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
use App\Models\Education;


class EducationController extends Controller
{
    public function list()
    {
        return view('education.list', [
            'education' =>Education::all()
        ]);
    }

    public function addForm()
    {

        return view('education.add');
    }
    
    public function add()
    {
        $attributes = request()->validate([
            'school' => 'required',
            'credentials' => 'required',
            'startDate' => 'nullable',
            'endDate' => 'nullable',
            'description' => 'nullable',

        ]);

        $education = new Education();
        $education->school= $attributes['school'];
        $education->credentials = $attributes['credentials'];
        $education->startDate = $attributes['startDate'];
        $education->endDate = $attributes['endDate'];
        $education->description = $attributes['description'];
        $education->save();

        return redirect('/console/education/list')
            ->with('message', 'Education has been added!');
    }

    public function editForm(Education $education)
    {
        return view('education.edit', [
            'education' => $education,
        ]);
    }

    public function edit(Education $education)
    {

        $attributes = request()->validate([
            'school' => 'required',
            'credentials' => 'required',
            'startDate' => 'nullable',
            'endDate' => 'nullable',
            'description' => 'nullable',
        ]);

        $education->school = $attributes['school'];
        $education->credentials = $attributes['credentials'];
        $education->startDate = $attributes['startDate'];
        $education->endDate = $attributes['endDate'];
        $education->description = $attributes['description'];
        $education->save();

        return redirect('/console/education/list')
            ->with('message', 'Education has been edited!');
    }

    public function delete(Education $education)
    {
        $education->delete();
        
        return redirect('/console/education/list')
            ->with('message', 'Education has been deleted!');        
    }

    public function imageForm(Education $education)
    {
        return view('education.image', [
            'education' => $education,
        ]);
    }

    public function image(Education $education)
    {

        $attributes = request()->validate([
            'image' => 'required|image',
        ]);

        if($education->image)
        {
            Storage::delete($education->image);
        }
        
        $path = request()->file('image')->store('education');

        $education->image = $path;
        $education->save();
        
        return redirect('/console/education/list')
            ->with('message', 'Education logo has been edited!');
    }
}
