<?php

namespace App\Http\Controllers;


use App\Device;

use Illuminate\Http\Request;


use App\Http\Requests;

class DeviceController extends Controller
{
    public function postCreate(Request $request)
    {
        $items = $request['items'];
        $contact = $request['contact'];
        $note = $request['note'];
        $date = date("Y-m-d H:i:s");
        $id = bcrypt($items . $contact . $date . $note);

        $device = new Device();
        $device->id = $id;
        $device->date = $date;
        $device->items = $items;
        $device->contact = $contact;
        $device->note = $note;

        $device->save();

        return view('table', ['devices' => Device::all()->sortBy('date'),
            'message' => "
                    <div class='alert alert-success'>
                        <strong>Erfolgreich erstellt:</strong>
                        <input type='text' readonly value=" . $id . " class='form-control'>
                    </div>"]);

    }

    public function postUpdate(Request $request)
    {
        $items = $request['items'];
        $contact = $request['contact'];
        $note = $request['note'];
        $date = date("Y-m-d H:i:s");
        $id = $request['id'];

        $device = Device::find($id);

        if ($device) {
            $device->date = $date;
            $device->items = $items;
            $device->contact = $contact;
            $device->note = $note;
            $device->save();
        }
        return view('table', ['devices' => Device::all()->sortBy('date'),
            'message' => '
                    <div class="alert alert-success">
                        <strong>Erfolgreich aktualisiert!</strong>
                    </div>']);

    }

    public function postDelete(Request $request)
    {
        $id = $request['id'];

        $device = Device::find($id);
        $device->delete();

        return view('table', ['devices' => Device::all()->sortBy('date'),
            'message' => '
                    <div class="alert alert-success">
                        <strong>Erfolgreich gelöscht!</strong>
                    </div>']);

    }

    public function getDevices()
    {
        return view('table', ['devices' => Device::all()->sortBy('date')]);
    }
}
