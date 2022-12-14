<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Http\Request;
use App\Models\User;

class UserPagination extends Component {
    public function render(){
        return view('livewire.user-pagination', [
            'users' => User::latest()->paginate(10),
        ]);
    }

public function index(){
    $users = User::latest()->paginate(10);
    return response()->json([
       'message' => 'selected successfully',
       'data'=> $users
    ]);
}
public function store(Request $request){
    $validate = $request([

    ]);

}
public function delete(User $user){
    $user->delete();
}


}
