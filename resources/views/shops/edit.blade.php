@extends('layouts.app')

@section('content')
    <h2>Edit shop</h2>

    <p>
        <a href="{{route('shops.index')}}">Back to shop</a>
    </p>

    <form method="POST" action="{{ route('shops.update', $shop) }}">
        @csrf
        @method('PUT')

        @if ($errors->any())
            <ul>
                @foreach ($errors->all() as $error)
                    <li><span style="color:red;">{{ $error }}</span></li>
                @endforeach
            </ul>
        @endif

        <p>
            <label for="name"><strong>NAME:</strong></label>
            <input type="text" id="name" name="name" value="{{old('name', $shop->name)}}">
        </p>

        <p>
            <label for="url"><strong>URL:</strong></label>
            <input type="url" id="url" name="url" value="{{old('url', $shop->url)}}">
        </p>

        <p>
            <label for="status"><strong>Status</strong></label>
            <select id="status" name="status">
                @foreach(App\Enums\ShopStatus::cases() as $case)
                    <option
                        value="{{$case->value}}" @selected(old('status', $shop->status->value) === $case->value)>{{$case->label()}}</option>
                @endforeach
            </select>
        </p>

        <button type="submit">UPDATE</button>
    </form>
@endsection
