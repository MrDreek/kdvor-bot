<?php

namespace App\Http\Controllers;

use Log;
use Exception;
use App\Jobs\ImportJob;
use Illuminate\Routing\Controller;

class ImportController extends Controller
{
    public function index(): array
    {
        try {
            dispatch(new ImportJob());
        } catch (Exception $e) {
            Log::error('error new job. '.json_encode($e, JSON_UNESCAPED_UNICODE));
        }

        return ['message' => 'Обработка импорта даннных запущена!', 'code' => 200];
    }
}
