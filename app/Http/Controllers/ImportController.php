<?php

namespace App\Http\Controllers;

use App\Jobs\ImportJob;
use Exception;
use Illuminate\Routing\Controller;
use Log;

class ImportController extends Controller
{
    public function index(): array
    {
        try {
            dispatch(new ImportJob());
        } catch(Exception $e) {
            Log::error('error new job. ' . json_encode($e, JSON_UNESCAPED_UNICODE));
        }
        return ['message' => 'Обработка импорта даннных запущена!', 'code' => 200];
    }
}
