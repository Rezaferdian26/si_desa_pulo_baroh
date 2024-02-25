<?php

namespace App\Http\Controllers;

use App\Penduduk;
use Illuminate\Http\Request;
use Telegram\Bot\Api;
use Telegram\Bot\Laravel\Facades\Telegram;

class BotController extends Controller
{
    public function setWeb()
    {
        $response = Telegram::setWebHook(['url' => env('TELEGRAM_WEBHOOK_URL')]);
        dd($response);
    }

    public function commandHandlerWeb()
    {
        $updates = Telegram::commandsHandler(true);
        $chat_id = $updates->getChat()->getId();
        try {
            $penduduk = Penduduk::where('nik', $updates->getMessage()->getText())->first();
            $message = '';
            if ($penduduk !== null) {
                $message = 'Nama  : ' . $penduduk->nama . "\n"
                    . 'NIK     : ' . $penduduk->nik . "\n"
                    . 'KK      : ' . $penduduk->kk . "\n"
                    . 'Alamat  : ' . $penduduk->alamat . "\n"
                    . 'Tanggal Lahir : ' . $penduduk->tanggal_lahir;
            }
            if ($penduduk) {
                return  Telegram::sendMessage([
                    'chat_id' => $chat_id,
                    'text' => $message
                ]);
            } else {
                return Telegram::sendMessage([
                    'chat_id' => $chat_id,
                    'text' => 'Nik tidak ada'
                ]);
            }
        } catch (\Exception $e) {
            return Telegram::sendMessage([
                'chat_id' => $chat_id,
                'text' => 'error'
            ]);
        }
    }
}
