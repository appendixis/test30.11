<?php

namespace App\Http\Controllers;

use App\Services\PathEncoderService;
use Illuminate\Http\Request;

class PathEncoderController extends Controller
{
    /**
     * @var PathEncoderService
     */
    protected $service;

    /**
     * PathEncoderController constructor.
     *
     * @param PathEncoderService $service
     */
    public function __construct(PathEncoderService $service)
    {
        $this->service = $service;
    }

    /**
     * @param Request $request
     * @return \App\Models\Link
     */
    public function encode(Request $request)
    {
        $request->validate([
            'url' => 'required|url|max:255',
        ]);

        return $this->service->encode($request->url);
    }
}
