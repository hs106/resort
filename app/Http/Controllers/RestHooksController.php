<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Webhook;

class RestHooksController extends Controller
{
	public function subscribe(Request $request) {
        $input = $request->all();

        $webhook = Webhook::create([
            "tenant_id" => auth()->user()->id,
            "url" => $input["target_url"],
            "event" => $input["event"]
        ]);

        return $webhook;
    }

    public function delete($id) {
        $webhook = Webhook::find($id);
        $webhook->delete();

        return response()->json([
            "success" => "success"
        ]);
    }

    public function pollForTrigger () {
        return response()->json([
            "name" => "Sample Name"
        ]);
    }
}
