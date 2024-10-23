<?php

namespace Pishgaman\Pishgaman\Http\Controllers\Web;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Pishgaman\Pishgaman\Repositories\downloadRepository;
use Pishgaman\Pishgaman\Database\Models\Messages\Attachment;

class DownloadController extends Controller
{
    public function download(Request $request, downloadRepository $downloadRepository)
    {
        $options = [
            'conditions' => [
                [
                    'column' => 'id',
                    'operator' => '=',
                    'value' => $request->id,
                ],
            ],
            'get' => true
        ];
        $downloadList = $downloadRepository->Get($options);
        $downloadList = $downloadList->first();
    
        // استفاده از تابع response()->download()
        return response()->download(
            storage_path('app/public/' . $downloadList->file_path),
            $downloadList->file_name,
            [],
            'inline'
        );
    }
    
    public function downloadMsgAttachment(Request $request)
    {
        $Attachment = Attachment::find($request->id);
        return response()->download(
            storage_path('app/public/' . $Attachment->file_path),
            $Attachment->file_name,
            [],
            'inline'
        );
    }
}
