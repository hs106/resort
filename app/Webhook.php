<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Webhook extends Model
{
	protected $table = 'webhooks';
	public $fillable = ['id', 'url', 'event', 'tenant_id'];

	public function fire($data) {
	        $client = new Client();
	        $response = "";
	        try {
	            $response = $client->request('POST', $this->url, [
	                'json' => $data
	            ]);
	        } catch (Exception $e) {
	            Log::info($e->getMessage());
	        }
	        return $response;
	}
}
