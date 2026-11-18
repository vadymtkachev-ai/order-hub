@extends('layouts.app')

@section('content')
    <table>
        <thead>
        <tr>
            <th>#</th>
            <th>Name</th>
            <th>Url</th>
            <th>Status</th>
        </tr>
        </thead>
        <tbody>
        @foreach($shops as $shop)
            <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{$shop->name}}</td>
                <td><a href="{{$shop->url}}" target="_blank" rel="noopener noreferrer">{{$shop->url}}</a></td>
                <td>{{$shop->status->label()}}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
