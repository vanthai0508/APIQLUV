<?php
namespace App\service;
use App\Repositories\CVRepo;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
class CVService 
{
    protected $repo;
    public function __construct(CVRepo $repo)
    {
        $this->repo = $repo;
    }

    //create cv
    public function create(array $request)
    {
       
            $file = $request['file'];

            $file->move('cv', $file->getClientOriginalName());

            $request['id_user'] = Auth::user()->id;

            $link = $file->getClientOriginalName();

            $request['file'] = 'public/cv/'.$link;

            
        $this->repo->create($request);          
    }   

    // list cv
    public function list()
    {
      return  $this->repo->list();
    }

    // find cv
    public function find($id)
    {
        return $this->repo->find($id);
    }

    //get user follow cv
    public function getUser($id)
    {
        return $this->repo->getUser($id);
    }

    public function update(array $request, $id)
    {
        $request['status'] = 0 ;
        $this->repo->update($request, $id);
    }


    //change status
    public function done($id)
    {
        $this->repo->done($id);
    }

    // reject cv
    public function reject($id)
    {
        
        $user = $this->getUser($id);
        Mail::send('mail', array('name'=>$user->name,'email'=>$user->email), function ($message) use ($user){
	        $message->to($user->email, 'User')->subject('Feedback From MOR!');
	    });

        $this->done($id);
        
    }

    // value for confirm
    public function valueConfirm($id)
    {
        return $this->repo->valueConfirm($id);
    }

    // send mail approve and change status
    public function sendMail($id, $dateInterview)
    {
        $user = $this->getUser($id);
        
        Mail::send('mailApprove', array('name'=>$user->name, 'email'=>$user->email, 'dateinterview' => $dateInterview), function ($message) use ($user){
	        $message->to( $user->email , 'User')->subject('Feedback From MOR!');
	    });

        $this->done($id);
    }
}
?>