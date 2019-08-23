<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ApiPublicSignInController extends Controller
{
    /**
     * @param Request $request
     * @return mixed
     */
    public function __invoke(Request $request)
    {
        $data = $request->all();
        $data['client_id'] = config('services.vue_client.id');
        $data['client_secret'] = config('services.vue_client.secret');
        $data['grant_type'] = (array_key_exists('grant-type', $data)
            && $data['grant_type'] != '')
            ? $data['grant_type']
            : 'password';

        $request = Request::create('/oauth/token', 'POST', $data);

        return app()->handle($request);
    }
}
