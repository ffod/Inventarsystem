@extends('layouts.master')

@section('title')
    Löschen
@endsection

@section('content')

    <p>Die Daten werden unwiderruflich gelöscht!</p>
    <form action="{{ route('delete') }}" method="post" class="">
        <div class="form-group">
            <label for="id">Gib hier bitte deine id ein:</label>
            <input type="text" placeholder="$2y$10$qHvRsh0mwNQ2hg8hdDJVGuCoo..." name="id" required class="container">
        </div>
        <div class="form-group">
            <input type="hidden" name="_token" value="{{ Session::token() }}">
            <input type="submit" name="submit" value="Löschen" class="btn btn-danger">
        </div>
    </form>

@endsection