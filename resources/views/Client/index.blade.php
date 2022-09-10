
@extends('layout')

@section('content')
<table class="table table-dark table-striped-columns">
<thead>
    <tr>
      <th scope="col">Id</th>
      <th scope="col">Nom</th>
      <th scope="col">Prenom</th>
      <th scope="col">Num_tel</th>
      <th scope="col">Email</th>
      <th scope="col">Password</th>
    </tr>
  </thead>
</table>
<tbody>
@foreach($Client as $Client)
<tr>
    <td>{{$Client->id}}</td>
    <td>{{$Client->nom}}</td>
    <td>{{$Client->prenom}}</td>
    <td>{{$Client->num_tel}}</td>
    <td>{{$Client->email}}</td>
    <td>{{$Client->password}}</td>
</tr>
 @endforeach
 </tbody>
</table>
<div>
@endsection
