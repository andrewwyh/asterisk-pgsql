@extends('layouts.app')

@section('content')
<div class="col-sm-12">

  @if(session()->get('success'))
    <div class="alert alert-success">
      {{ session()->get('success') }}  
    </div>
  @endif
</div>
  
<div class="row">
<div class="col-sm-8 offset-sm-2">
    <h2 class="display-4">All Extensions</h2>    

<div style="margin-top:100px"></div>

  <table class="table table-striped">
    <thead>
        <tr>
          <td>Company</td>
          <td>Context</td>
          <td>ID</td>
          <td>Auth Username</td>
          <td>Auth Password</td>
          <td>Registered?</td>
          <td>User Agent</td>
          <td colspan = 2>Actions</td>
        </tr>
    </thead>
    <tbody>
    @foreach($ps_endpoints as $endpoint)
        <tr>
            <td><a href="/company/?company={{$endpoint->company}}">{{$endpoint->company}}</a> </td>
            <td>{{$endpoint->context}}</td>
            <td>{{$endpoint->id}}</td>
            <td>{{$endpoint->username}} </td>
            <td>{{$endpoint->password}} </td>
            <td>@if (!$endpoint->uri=="")Yes
                @else No
                @endif
            </td>
            <td>{{$endpoint->user_agent}} </td>
              <td>
                <a href="{{ URL::to('endpoints/' . $endpoint->id) . '/edit'}}" class="btn btn-primary">Edit</a>
            </td>
            <td>
                <form action="{{ URL::to('endpoints/' . $endpoint->id)}}" method="post">
                  @csrf
                  @method('DELETE')
                  <button class="btn btn-danger" type="submit">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach

        </tbody>
  </table>
</div>
</div>
@endsection