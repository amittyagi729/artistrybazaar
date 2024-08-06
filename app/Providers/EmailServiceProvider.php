<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Mailsetting;
use Config;

class EmailServiceProvider extends ServiceProvider
{
    public function boot()
    {
         $mailsetting = Mailsetting::first();
        if(isset($mailsetting)){
            $data = [
                'driver'            => $mailsetting->mail_transport,
                'host'              => $mailsetting->mail_host,
                'port'              => $mailsetting->mail_port,
                'encryption'        => $mailsetting->mail_encryption,
                'username'          => $mailsetting->mail_username,
                'password'          => $mailsetting->mail_password,
                'from'              => [
                    'address'=>$mailsetting->mail_from,
                    'name'   => 'ArtistryBazaar'
                ]
            ];
            Config::set('mail',$data);
        }
    
     }
}
