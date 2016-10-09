@extends('layouts.master')

@section('title')
    Aktualisieren
@endsection

@section('content')
    <div class="panel panel-default">
        <div class="panel-body">Hier kannst Du deinen Eintrag aktualisieren.</div>
    </div>
    <div class="panel panel-default">
        <div class="panel-body panel-heading">Die Daten, welche Du hier einträgst sind <b>öffentlich</b> sichtbar!</div>
        <div class="panel-body">
            <form action="{{ route('update') }}" method="post" class="">
                <div class="form-group">
                    <label for="id">Gib hier bitte deine id ein:</label>
                    <input type="text" placeholder="$2y$10$qHvRsh0mwNQ2hg8hdDJVGuCoo..." name="id" required
                           class="form-control">
                </div>
                <div class="form-group">
                    <label for="items">Geräte:</label>
                    <input type="text" placeholder="WR1043ND,WDR4300" name="items" required class="form-control">
                </div>
                <div class="form-group">
                    <label for="items">Kontakt:</label>
                    <input type="text" placeholder="mail@domain.tld" name="contact" required class="form-control">
                </div>
                <div class="form-group">
                    <label for="note">Anmerkung:</label>
                    <textarea class=" form-control" id="note" name="note"></textarea>
                </div>
                <div class="form-group">
                    <input type="hidden" name="_token" value="{{ Session::token() }}">
                    <input type="submit" name="submit" value="Aktualisieren" class="btn btn-info">
                </div>
            </form>
        </div>
    </div>
@endsection