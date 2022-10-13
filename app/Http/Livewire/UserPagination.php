<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\User;

class UserPagination extends Component {
    public function render(){
        return view('livewire.user-pagination', [
            'users' => User::latest()->paginate(10),
        ]);
    }

}
