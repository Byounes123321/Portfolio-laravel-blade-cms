@extends ('layout.console')

@section ('content')

<section class="w3-padding">

    <h2>Manage Associations</h2>

    <table class="w3-table w3-stripped w3-bordered w3-margin-bottom">
        <tr class="w3-red">
            <th>Project_id</th>
            <th>Skill_id</th>
            <th></th>
            <th></th>
        </tr>
        <?php foreach($projectsSkills as $projectSkill): ?>
            <tr>
                <td>{{$projectSkill->project_id}}</td>
                <td>{{$projectSkill->skill_id}}</td>
                <td><a href="/console/projectsskills/edit/{{$projectSkill->id}}">Edit</a></td>
                <td><a href="/console/projectsskills/delete/{{$projectSkill->id}}">Delete</a></td>
            </tr>
        <?php endforeach; ?>
    </table>

    <a href="/console/projectsskills/add" class="w3-button w3-green">New association</a>

</section>

@endsection