<?php

namespace App\Http\Controllers;

use Exception;
use App\Jobs\ImportJob;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Log;
use Illuminate\Foundation\Bus\DispatchesJobs;

class ImportController extends Controller
{
    use DispatchesJobs;

    public function index(): array
    {
        try {
            $this->dispatch(new ImportJob());
        } catch (Exception $e) {
            Log::error('error new job. '.json_encode($e, JSON_UNESCAPED_UNICODE));
        }

        return ['message' => 'Обработка импорта даннных запущена!', 'code' => 200];
    }
}
