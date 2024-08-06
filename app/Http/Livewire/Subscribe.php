<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\SubscribersModel;

class Subscribe extends Component
{

    public $email;

    public function subscribe()
    {

        // Validate the email input
        $validator = \Validator::make(['email' => $this->email], [
            'email' => 'required|email|unique:subscribers,email',
        ]);

        if ($validator->fails()) {
            // If validation fails, show error messages
            $this->emit('showErrorMsg', "Invalid Email Address");
            return;
        }
        SubscribersModel::create([
            'email' => $this->email
        ]);
        // Perform your subscription logic here
        // You can access $this->email to get the email input value

        // After performing the subscription, you can reset the input
        $this->email = '';

        // You can also emit events or update other data here

        // For example, you can emit an event to notify the parent component
        $this->emit('showSuccessMsg', "Subscription Successful");
    }

    public function render()
    {
        return view('livewire.subscribe');
    }
}