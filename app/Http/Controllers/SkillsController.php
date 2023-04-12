<?php

namespace App\Http\Controllers;

use App\Models\Skill;
use Illuminate\Http\Request;

class SkillsController extends Controller
{
    public function list()
    {
        return view('skills.list', [
            'skills' =>Skill::all()
        ]);
    }

    public function addForm()
    {

        return view('skills.add');
    }
    
    public function add()
    {

        $attributes = request()->validate([
            'name' => 'required',
        ]);

        $skill = new Skill();
        $skill->name = $attributes['name'];
        $skill->save();

        return redirect('/console/skills/list')
            ->with('message', 'Skill has been added!');
    }

    public function editForm(Skill $skill)
    {
        return view('skills.edit', [
            'skill' => $skill,
        ]);
    }

    public function edit(Skill $skill)
    {

        $attributes = request()->validate([
            'name' => 'required',
        ]);

        $skill->name = $attributes['name'];
        $skill->save();

        return redirect('/console/skills/list')
            ->with('message', 'Skill has been edited!');
    }

    public function delete(Skill $skill)
    {
        $skill->delete();
        
        return redirect('/console/skills/list')
            ->with('message', 'Skill has been deleted!');        
    }

}
