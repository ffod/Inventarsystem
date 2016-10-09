@extends('layouts.master')

@section('title')
    Inventarliste
@endsection

@section('content')
    <div class="panel panel-default">
        <div class="panel-body">Hier kannst du Geräte eintragen, die Du z.B. an andere Freifunker verleihen kannst.
            Bitte trage eine gültige Kontakt
            möglichkeit ein.
        </div>
    </div>
    <div class="panel panel-default">
        <div class="panel-body panel-heading">Die Daten, welche Du hier einträgst sind <b>öffentlich</b> sichtbar!</div>
        <div class="panel-body">
            <form action="{{ route('create') }}" method="post" class="form-horizontal">
                <div class="form-group form-horizontal">
                    <label class="col-sm-1 control-label" for="items">Kontakt:</label>
                    <input type="email" placeholder="mail@domain.tld" name="contact" id="contact" maxlength="30"
                           required>
                </div>
                <div class="form-group">
                    <label class="col-sm-1 control-label" for="items">Geräte:</label>
                    <div class="col-sm-5">
                        <textarea class=" form-control" id="items" name="items" maxlength="200"></textarea>
                    </div>
                </div>
                <div class="form-group form-horizontal">
                    <label class="col-sm-1 control-label" for="note">Anmerkung:</label>
                    <div class="col-sm-5">
                        <textarea class=" form-control" id="note" name="note" maxlength="200"></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <input type="hidden" name="_token" value="{{ Session::token() }}">
                    <div class="col-sm-1">
                        <input type="submit" name="submit" value="Daten senden" class="btn btn-primary">
                    </div>

                </div>
            </form>
        </div>
    </div>


    @if(! empty($message))
        {!! $message !!}
    @endif
    <div class="panel panel-default">
        <div class="panel-body">
            <table class="table table-bordered table-responsive">
                <thead style="background-color: #f5f5f5">
                <tr>
                    <th>Kontakt</th>
                    <th>Geräte</th>
                    <th>Anmerkung</th>
                </tr>

                </thead>
                <tbody>
                @foreach ($devices as $device)
                    <tr>
                        <td class="col-md-1">
                            <script type="text/javascript">
                                document.write("{{ str_rot13($device['contact']) }}".replace(/[a-zA-Z]/g,
                                        function (c) {
                                            return String.fromCharCode((c <= "Z" ? 90 : 122) >= (c = c.charCodeAt(0) + 13) ? c : c - 26);
                                        }));
                            </script>
                        </td>
                        <td class="col-md-5">{{ $device['items'] }}</td>
                        <td>
                            {{ $device['note'] }}
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection


