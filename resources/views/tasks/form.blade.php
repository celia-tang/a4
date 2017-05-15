

{{-- /resources/views/tasks/form.blade.php --}}
@extends('layouts.master')

@section('title')
    Tasks
@endsection

@section('content')
        <br><br>
        @if(count($errors) > 0)
            <div id="error">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>

        @endif
        <form method="get" action="/add">
            <label> Add New Task </label>
            Name: <input type='text' name='name' id='name'> 
            Priority: <select name="priority" id="priority"> 
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option></select>
            Deadline (YYYY-MM-DD):   <input type="date" name="deadline" id="deadline">
            Tag:        <select name="tag" id="tag">
                        <option value="homework">Homework</option>
                        <option value="chores">Chores</option>
                        <option value="exercise">Exercise</option>
                        <option value="other">Other</option></select>


            <input type='submit' name='submit' value='Submit'>
        </form>
<br><br><br><br>
    <div id="chart">

        <table class="table">
            <thead>
                <tr>
                    <th><a href="/upname" role="button" class="btn-block btn-info">Name</button></th>
                    <th><a href="/uppriority" role="button" class="btn-block btn-info">Priority</button></th>
                    <th><a href="/updue" role="button" class="btn-block btn-info">Due By</button></th>
                    @if($complete == 0)
                        <th><a href="/incomplete" role="button"  class="btn-block btn-info">Complete</button></th>
                    @elseif($complete == 1)
                        <th><a href="/completed" role="button" class="btn-block btn-danger">Complete</button></th>
                    @else
                        <th><a href="/" role="button" class="btn-block btn-warning">Complete</button></th>
                    @endif
                    <th><a href="/updue" role="button" class="btn-block btn-info">Tag</button></th>
                    <th><a href="" class="btn-block btn-info">Delete</button></th>
                </tr>
            </thead>
            <tbody>
                @foreach($entries as $entry) 
                        <tr>
                            <td>{{ $entry['name'] }}</td>
                            <td>{{ $entry['priority'] }}</td>
                            <td>{{ $entry['due_by'] }}</td>
                            <td><a href="/switch/{{ $entry['id'] }}" role="button" class="btn-block"> 
                                @if($entry['completed'] == 0)
                                    YES
                                @else
                                    NO
                                @endif
                            </button></td>
                            <td><a href="/tag/{{ $entry['id'] }}" role="button" class="btn-block"> {{ $tags[$entry['tag_id'] - 1]->description }}</td>
                            <td><a href="/delete/{{ $entry['id'] }}" role="button" class="btn-block">Delete</td>
                        </tr>

                @endforeach
             

            </tbody>
        </table>
        </div>


    </div>



@endsection
