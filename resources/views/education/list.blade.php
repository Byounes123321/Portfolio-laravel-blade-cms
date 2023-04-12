@extends ('layout.console')

@section ('content')

<section class="w3-padding">

    <h2>Manage Education</h2>

    <table class="w3-table w3-stripped w3-bordered w3-margin-bottom">
        <tr class="w3-red">
            <th></th>
            <th>School</th>
            <th>Credentials</th>
            <th>Start Date</th>
            <th>End Date</th>
            <th>Description</th>
            <th></th>
            <th></th>
            <th></th>
        </tr>
        @foreach ($education as $education)
            <tr>
                <td>
                    @if ($education->image)
                        <img src="{{asset('storage/'.$education->image)}}" width="100">
                    @endif
                </td>
                <td>{{$education->school}}</td>
                <td>{{$education->credentials}}</td>
                <td>{{$education->startDate}}</td>
                <td>{{$education->endDate}}</td>
                <td>{{$education->description}}</td>
                <td>{{$education->created_at->format('M j, Y')}}</td>
                <td><a href="/console/education/image/{{$education->id}}">Image</a></td>
                <td><a href="/console/education/edit/{{$education->id}}">Edit</a></td>
                <td><a href="/console/education/delete/{{$education->id}}">Delete</a></td>
            </tr>
        @endforeach
    </table>

    <a href="/console/education/add" class="w3-button w3-green">New Education</a>

</section>

@endsection
