<?php

namespace Pishgaman\Pishgaman\Http\Controllers\Api;

use Illuminate\Http\Request;
use Pishgaman\Pishgaman\Middleware\CheckMenuAccess;
use Pishgaman\Pishgaman\Database\Models\AccessLevel\AccessLevel;
use Illuminate\Support\Facades\Log;
use Pishgaman\Pishgaman\Database\Models\AccessLevel\AccessLevelMenu;
use Pishgaman\Pishgaman\Database\Models\User\User;
use Pishgaman\Pishgaman\Repositories\LogRepository;
use Pishgaman\Pishgaman\Database\Models\Messages\Messages;
use Pishgaman\Pishgaman\Database\Models\Messages\Attachment;
use Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Crypt;
use Carbon\Carbon;

class MessagesController extends Controller
{
    private $validActions = [
        'getCurrentUser',
        'upatePassword',
        'searchUser',
        'sendMsg',
        'getReciveMessagesList',
        'getSendMessagesList',
        'setReadMsgTime',
    ];

    protected $validMethods = [
        'GET' => ['getCurrentUser','searchUser','getReciveMessagesList','getSendMessagesList'], 
        'POST' => ['sendMsg'], 
        'PUT' => ['upatePassword','setReadMsgTime'],
        'DELETE' => []
    ];

    protected $user;
    protected $logRepository;

    public function __construct(LogRepository $logRepository)
    {
        $this->logRepository = $logRepository;
        $this->middleware(CheckMenuAccess::class);
        $this->user = auth()->user();
    }

    public function action(Request $request)
    {
        if ($request->has('action')) {
            $functionName = $request->action;
            $method = $request->method();
            if ($this->isValidAction($functionName, $method)) {
                return $this->$functionName($request);
            } else {
                return response()->json(['errors' => 'requestNotAllowed'], 422);
            }
        }

        return abort(404);
    }

    private function isValidAction($functionName, $method)
    {
        return in_array($functionName, $this->validActions) && in_array($functionName, $this->validMethods[$method]);
    }

    public function getCurrentUser()
    {
        if (!$this->isValidAction('getCurrentUser', 'GET')) {
            return response()->json(['errors' => 'requestNotAllowed'], 422);
        }

        $CurrentUser = auth()->user();

        return response()->json(['CurrentUser'=>$CurrentUser]);        
    }

    public function setReadMsgTime(Request $request)
    {
        if (!$this->isValidAction('setReadMsgTime', 'PUT')) {
            return response()->json(['errors' => 'requestNotAllowed'], 422);
        }
        
        $CurrentUser = auth()->user();

        $Messages = Messages::where([['recipient_id',$CurrentUser->id],['id',$request->id]])->first();

        if (is_null($Messages->read_at)) {
            $Messages->read_at = date('Y-m-d H:i:s');
            $Messages->save();
        }

        return response()->json([]);
    }

    public function getReciveMessagesList(Request $request)
    {
        if (!$this->isValidAction('getReciveMessagesList', 'GET')) {
            return response()->json(['errors' => 'requestNotAllowed'], 422);
        }

        $CurrentUser = auth()->user();

        $Messages = Messages::where('recipient_id', $CurrentUser->id)
        ->with(['recipient:id,username,name,last_name','sender:id,username,name,last_name','attachments'])
        ->orderby('created_at','desc')
        ->paginate(10);
        
        // استفاده از Collection برای رمزگشایی پیام‌ها
        $Messages->getCollection()->transform(function ($message) {
            try {
                // رمزگشایی و حذف نمک از متن رمزگشایی شده
                $message->subject = Crypt::decryptString($message->subject);
                $message->body = Crypt::decryptString($message->body);
            } catch (\Exception $e) {
                // در صورت خطا، می‌توانید خطای رمزگشایی را لاگ کنید یا پیام خطا را تنظیم کنید
                $message->subject = 'Error decrypting message';
            }
            $message->created_at = Carbon::parse($message->created_at)->setTimezone('Asia/Tehran');

            return $message;
        });

        $countUnRead = Messages::whereNull('read_at')->where('recipient_id',$CurrentUser->id)->count();

        return response()->json(['Messages' => $Messages,'countUnRead'=>$countUnRead]);
    }

    public function getSendMessagesList(Request $request)
    {
        if (!$this->isValidAction('getSendMessagesList', 'GET')) {
            return response()->json(['errors' => 'requestNotAllowed'], 422);
        }

        $CurrentUser = auth()->user();

        $Messages = Messages::where('sender_id', $CurrentUser->id)
        ->with(['recipient:id,username,name,last_name','sender:id,username,name,last_name','attachments'])
        ->orderby('created_at','desc')
        ->paginate(10);
        
        // استفاده از Collection برای رمزگشایی پیام‌ها
        $Messages->getCollection()->transform(function ($message) {
            try {
                // رمزگشایی و حذف نمک از متن رمزگشایی شده
                $message->subject = Crypt::decryptString($message->subject);
                $message->body = Crypt::decryptString($message->body);
            } catch (\Exception $e) {
                // در صورت خطا، می‌توانید خطای رمزگشایی را لاگ کنید یا پیام خطا را تنظیم کنید
                $message->subject = 'Error decrypting message';
            }
            $message->created_at = Carbon::parse($message->created_at)->setTimezone('Asia/Tehran');
            $message->updated_at = Carbon::parse($message->updated_at)->setTimezone('Asia/Tehran');
            return $message;
        });
        return response()->json(['Messages' => $Messages]);
    }

    public function sendMsg(Request $request)
    {
        if (!$this->isValidAction('sendMsg', 'POST')) {
            return response()->json(['errors' => 'requestNotAllowed'], 422);
        }
    
        $CurrentUser = auth()->user();
    
        // اعتبارسنجی داده‌های ورودی
        $validatedData = $request->validate([
            'subject' => 'required|string|max:255',
            'body' => 'required',
            'receivers' => 'required',
            'file' => 'nullable|file|mimes:jpg,jpeg,png,pdf,zip,rar,docx|max:2048',
        ]);
    
        // ذخیره پیام‌ها
        $messages = [];
        $receivers = json_decode($request->receivers, true);
    
        foreach ($receivers as $item) {
            $Message = new Messages;
            $Message->message_type = 'user';
            $Message->letter_number = date('ymdHis');
            $Message->sender_id = $CurrentUser->id;
            $Message->recipient_id = $item['id'];
            $Message->subject = Crypt::encryptString($request->subject);
            $Message->body = Crypt::encryptString($request->body);
            $Message->save();
    
            // اضافه کردن پیام به آرایه پیام‌ها
            $messages[] = $Message;
        }
    
        // ذخیره فایل ارسالی
        $filePath = null;
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $fileName = date('ymdhis'). '.' . $file->getClientOriginalExtension();
            $filePath = $file->storeAs('Messages/' . $CurrentUser->id, $fileName, 'public');
    
            // ذخیره اطلاعات فایل در پایگاه داده
            $Attachment = new Attachment;
            $Attachment->message_id = $Message->id; // شناسه آخرین پیام ذخیره شده
            $Attachment->file_name = $fileName;
            $Attachment->file_path = $filePath;
            $Attachment->save();
        }
    
        return response()->json(['status' => 'success']);
    }
    
    public function searchUser(Request $request)
    {
        if (!$this->isValidAction('searchUser', 'GET')) {
            return response()->json(['errors' => 'requestNotAllowed'], 422);
        }
    
        $searchTerm = $request->input('username') ?? 'gsjgsdogsogk';
        
        // اضافه کردن wildcard برای جستجوی مشابه
        $searchTerm = '%' . $searchTerm . '%';
    
        // اصلاح نحو دستورات و جلوگیری از حملات SQL Injection
        $users = User::where('username', 'like', $searchTerm)->get(['id', 'username', 'name', 'last_name']);
    
        return response()->json(['Users' => $users]);
    }

    public function upatePassword($request)
    {

        if (!$this->isValidAction('upatePassword', 'PUT')) {
            return response()->json(['errors' => 'requestNotAllowed'], 422);
        }

        $CurrentUser = auth()->user();

        $validatedData = $request->validate([
            'current_password'      => 'required',
            'password'              => 'required|confirmed',
            'password_confirmation' => 'required',
        ]);  

        $validCredentials = Hash::check($validatedData['current_password'] , $CurrentUser->password);
        if(!$validCredentials)
        {
            $message = 'رمز عبور فعلی صحیح نمی‌باشد';            
            return response()->json(['errors' => $message], 422);
        }

        $validCredentials = Hash::check($validatedData['password'] , $CurrentUser->password);
        if(!$validCredentials)
        {
            $CurrentUser->update([
                'password' => bcrypt($validatedData['password']), 
            ]);
            return response()->json(['message'=>'کلمه عبور شما با موفقیت به روز شد']);
        }else{
            $message = 'رمز عبور جدید نباید با رمز فعلی یکسان باشد';
            
            return response()->json(['errors' => $message], 422);
        }
    }      
}
