<?php

    namespace App\Http\Controllers\Backend;

    use App\Http\Controllers\Controller;
    use App\Http\Requests\ContactRequest;
    use App\Mail\ContactMessage;
    use App\Models\Contact;
    use Illuminate\Contracts\View\View;
    use Illuminate\Support\Facades\Mail;

    class ContactController extends Controller
    {
        public function store(ContactRequest $request)
        {
            $request->validate([
                'name'    => 'required',
                'email'   => 'required|email',
                'phone'   => 'required|numeric',
                'subject' => 'required',
                'body'    => 'required',
            ]);

            $input = $request->all();

            Contact::create($input);

            //  Send mail to admin
            Mail::send('contact-mail', array(
                'name'    => $input['name'],
                'email'   => $input['email'],
                'phone'   => $input['phone'],
                'subject' => $input['subject'],
                'body'    => $input['body'],
            ), function($message) use ($request){
                $message->from($request->email);
                $message->to('admin@admin.com', 'Admin')->subject($request->get('subject'));
            });

            return redirect()->back()->with('message',"Contact Form Submit Successfully");
        }


//            return redirect()->route('contact.show');

        public function show(): View
        {
            return view('backend/contact.show');
        }
    }
