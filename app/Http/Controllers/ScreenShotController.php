<?php
declare(strict_types=1);

namespace App\Http\Controllers;

use Illuminate\Contracts\Filesystem\FileNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Session\Store;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\Exception\RequestExceptionInterface;

/**
 * Class ScreenShotController
 *
 * @package App\Http\Controllers
 */
final class ScreenShotController extends Controller
{
    const SCREEN_SHOTS_PREFIX = 'public/';

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        try {
            $paths = Storage::directories(self::SCREEN_SHOTS_PREFIX);
        } catch (FileNotFoundException $e) {
            \Log::debug('catch the error');
            \Log::debug($e->getMessage());
            $paths = [];
        }

        $dates = [];
        foreach ($paths as $path) {
            $dates[] = str_replace(self::SCREEN_SHOTS_PREFIX, '', $path);
        }

        return view('index', [
            'dates' => array_reverse($dates),
        ]);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function list(Request $request)
    {
        $date = $request->route('date');

        try {
            $paths = Storage::files(sprintf("%s%s/", self::SCREEN_SHOTS_PREFIX, $date));
        } catch (FileNotFoundException $e) {
            \Log::debug('catch the error');
            \Log::debug($e->getMessage());
            $paths = [];
        }

        $images = [];
        foreach ($paths as $path) {
            $image = str_replace(sprintf('%s%s/', self::SCREEN_SHOTS_PREFIX, $date), '', $path);
            $images[] = str_replace('.png', '', $image);
        }

        return view('list', [
            'date' => $date,
            'images' => array_reverse($images),
        ]);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show(Request $request)
    {
        $image = $request->route('image');
        $date = substr($image, 0, 8);

        $imagePath = sprintf("%s/%s.png", $date, $image);
        if (!Storage::exists(  self::SCREEN_SHOTS_PREFIX.$imagePath)) {
            $imagePath = '';
        }

        return view('show', [
            'imagePath' => $imagePath,
        ]);
    }

    /**
     * @param Request $request
     * @return int
     */
    public function upload(Request $request)
    {
        $this->validate($request, [
            'image' => [
                'required',
                'file',
            ],
            'date' => [
                'required',
                'string',
                'size:8'
            ]
        ]);

        if ($request->file('image')->isValid()) {
            \Log::debug('valid');
            $filename = $request->file('image')->getClientOriginalName();
            $date = $request->input('date');

            $request->file('image')->storeAs('public/'.$date, $filename);
        } else {
            \Log::debug('invalid');
            \Log::debug($request);
            return 400;
        }

        return 200;
    }
}
