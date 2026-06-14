<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactController extends Controller
{
    /** Show the Contact Us page. */
    public function index()
    {
        $subjects = [
            'General Enquiry',
            'Job Seeker Support',
            'Employer / Hiring Support',
            'Billing & Payments',
            'Report a Bug',
            'Partnership Opportunity',
            'Press & Media',
            'Other',
        ];

        $contactInfo = [
            [
                'icon'    => 'M17.657 16.657L13.414 20.9a2 2 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0zM15 11a3 3 0 11-6 0 3 3 0 016 0z',
                'label'   => 'Our Office',
                'lines'   => ['12 Talent Square, Floor 4', 'London, EC2A 4NE', 'United Kingdom'],
                'color'   => 'bg-[#e6f7f7] text-[#149696]',
            ],
            [
                'icon'    => 'M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z',
                'label'   => 'Phone',
                'lines'   => ['+44 20 7946 0958', 'Mon–Fri, 9 am – 6 pm GMT'],
                'color'   => 'bg-amber-50 text-amber-500',
                'href'    => 'tel:+442079460958',
            ],
            [
                'icon'    => 'M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z',
                'label'   => 'Email Us',
                'lines'   => ['hello@postpulse.io', 'support@postpulse.io'],
                'color'   => 'bg-violet-50 text-violet-500',
                'href'    => 'mailto:hello@postpulse.io',
            ],
            [
                'icon'    => 'M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z',
                'label'   => 'Business Hours',
                'lines'   => ['Monday – Friday: 9 am – 6 pm GMT', 'Saturday: 10 am – 2 pm GMT', 'Sunday: Closed'],
                'color'   => 'bg-emerald-50 text-emerald-500',
            ],
        ];

        return view('contact.index', compact('subjects', 'contactInfo'));
    }

    /**
     * Handle contact form submission.
     * TODO: replace Session::flash with Mail::to(...)->send(...) once mail is configured.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'    => ['required', 'string',     'max:100'],
            'email'   => ['required', 'email',      'max:150'],
            'phone'   => ['nullable', 'string',     'max:30'],
            'subject' => ['required', 'string',     'max:150'],
            'message' => ['required', 'string',     'min:10', 'max:3000'],
        ], [
            'name.required'    => 'Please enter your full name.',
            'email.required'   => 'Please enter your email address.',
            'email.email'      => 'Please enter a valid email address.',
            'subject.required' => 'Please select or enter a subject.',
            'message.required' => 'Please write your message.',
            'message.min'      => 'Your message must be at least 10 characters.',
        ]);

        // TODO: Mail::to('hello@postpulse.io')->send(new ContactFormMail($validated));

        return redirect()
            ->route('contact')
            ->with('success', 'Thank you, ' . $validated['name'] . '! Your message has been received. We\'ll get back to you within one business day.');
    }
}
