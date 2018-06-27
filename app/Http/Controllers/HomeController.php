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
final class HomeController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('index', []);
    }
}
