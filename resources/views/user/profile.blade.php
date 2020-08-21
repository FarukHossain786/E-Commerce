@extends('layouts.app')
@include('_navbermain')
<head>
    <style>
        .profilePic{
            width: 300px; 
            height: 300px; 
            border-radius: 50%;
        }
    </style>
</head>

<div class="container">
  <div class="col-sm-12">
    @if (session()->has('message'))
    <div class="alert alert-success">
        {{session('message')}}
    </div>
    @endif
</div>
<div class="col-sm-12">
  @if (session()->has('error'))
  <div class="alert alert-danger">
      {{session('message')}}
  </div>
  @endif
</div>

{{-- @foreach ($profile as $item) --}}
  <div class="container">
    <table class="table" style="border: none">
          <tr>
            <th colspan="4" style="text-align: center; vertical-align: middle;">
                 <img class="profilePic"
                src="{{asset('storage/'.$profile->photo)}}" alt="Avatar" class="avatar">
            </th>
          </tr>
          <tr>
            <th colspan="4" style="text-align: center; vertical-align: middle;">
                 <h1 style="color: rgb(207, 18, 160)">{{$profile->name}}</h1>   
            </th>
          </tr>
          <tr>
            <th></th>
            <td style="text-align: right;"><h4 style="color: rgb(207, 18, 160)">Adderss</h4> </td>
            <th> <h4 style="color: rgb(207, 18, 160)">
              {{$profile->address}},
              {{$profile->city->name}},
              {{$profile->state->name}},
              {{$profile->country->name}},
              {{$profile->pin}}
            </h4> </th>
            <td></td>
          </tr>
          <tr>
            <th></th>
            <td style="text-align: right;"><h4 style="color: rgb(207, 18, 160)">Phone</h4> </td>
            <th> <h4 style="color: rgb(207, 18, 160)">{{$profile->phone}}</h4> </th>
            <td></td>
          </tr>
          <tr>
            <th colspan="4"  style="text-align: right;">
              <a  class="btn btn-warning" href="{{route('user.profile.edit', $profile->id)}}">Edit</a></th>
          </tr>
      </table>
  {{-- @endforeach --}}
  </div>