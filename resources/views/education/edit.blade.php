@extends ('layout.console')

@section ('content')

<section class="w3-padding">

    <h2>Edit Education</h2>

    <form method="post" action="/console/education/edit/{{$education->id}}" novalidate class="w3-margin-bottom">

        @csrf

        <div class="w3-margin-bottom">
            <label for="school">School:</label>
            <input type="name" name="school" id="school" value="{{old('school', $education->school)}}" required>
            
            @if ($errors->first('school'))
                <br>
                <span class="w3-text-red">{{$errors->first('school')}}</span>
            @endif
        </div>

        <div class="w3-margin-bottom">
            <label for="credentials">Credentials:</label>
            <input type="text" name="credentials" id="credentials" value="{{old('credentials', $education->credentials)}}">

            @if ($errors->first('credentials'))
                <br>
                <span class="w3-text-red">{{$errors->first('credentials')}}</span>
            @endif
        </div>

        <div class="w3-margin-bottom">
            <label for="startDate">Start Date:</label>
            <input type="date" name="startDate" id="startDate" value="{{old('startDate', $education->startDate)}}" required>

            @if ($errors->first('startDate'))
                <br>
                <span class="w3-text-red">{{$errors->first('startDate')}}</span>
            @endif
        </div>
        
            <label for="endDate">EndDate:</label>
            <input type="date" name="endDate" id="endDate" value="{{old('endDate', $education->endDate)}}" required>

            @if ($errors->first('endDate'))
                <br>
                <span class="w3-text-red">{{$errors->first('endDate')}}</span>
            @endif
        </div>

        <div class="w3-margin-bottom">
            <label for="description">Description:</label>
            <input type="text" name="description" id="description" value="{{old('description', $education->description)}}">

            @if ($errors->first('description'))
                <br>
                <span class="w3-text-red">{{$errors->first('description')}}</span>
            @endif
        </div>

        <button type="submit" class="w3-button w3-green">Edit Education</button>

    </form>

    <a href="/console/education/list">Back to education List</a>

</section>

@endsection
