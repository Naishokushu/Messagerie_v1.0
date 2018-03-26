<?php

namespace App\Http\Controllers;

use App\Repository\ProfilRepository;
use App\Http\Requests\StoreMessageRequest;
use App\Notifications\MessageReceived;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\AuthManager;
use Illuminate\Support\Carbon;
use App\Policies\UserPolicy;

class ProfilController extends Controller
{
    /**
     *@var ProfilRepository
     */
    private $r;

    /**
     *@var AuthManager
     */
    private $auth;

    public function __construct(ProfilRepository $profilRepository, AuthManager $auth)
    {
        $this->middleware('auth');
        $this->r = $profilRepository;
        $this->auth = $auth;
    }


    public function index ()
    {
        return view('profil',[
            'user' => $this->auth->user()->id
        ]);
    }


    public function edit(User $user)
    {
        $me = $this->auth->user();
        return view('profil/edit',[
            'user' => $me->id
        ]);
    }

    public function setDesiredLanguages(User $user, string $lang, string $niveau)
    {
        $changeOK = $this->r->setDesiredLanguages(
            $this->auth->user()->id,
            $lang,
            $niveau
        );
        return redirect(route('profil' ,['id'=>$user->id]));
    }
}
