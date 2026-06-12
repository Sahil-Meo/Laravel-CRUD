<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    /**
     * Show the create-profile page.
     * The role (seeker / employer) is driven entirely by client-side JS;
     * the view just renders all components and the wizard handles visibility.
     */
    public function create()
    {
        return view('profile.create');
    }

    /**
     * Handle the job-seeker profile form submission.
     */
    public function storeSeekerProfile(Request $request)
    {
        $validated = $request->validate([
            'full_name'       => ['required', 'string', 'max:100'],
            'title'           => ['required', 'string', 'max:120'],
            'email'           => ['required', 'email', 'max:150'],
            'phone'           => ['nullable', 'string', 'max:30'],
            'location'        => ['nullable', 'string', 'max:100'],
            'skills'          => ['nullable', 'string', 'max:500'],
            'experience'      => ['nullable', 'string', 'max:2000'],
            'education'       => ['nullable', 'string', 'max:1000'],
            'summary'         => ['nullable', 'string', 'max:1000'],
            'portfolio_url'   => ['nullable', 'url', 'max:250'],
            'linkedin_url'    => ['nullable', 'url', 'max:250'],
            'resume'          => ['nullable', 'file', 'mimes:pdf,doc,docx', 'max:5120'],
            'profile_picture' => ['nullable', 'image', 'max:2048'],
        ]);

        // TODO: persist $validated — placeholder redirect for now
        return redirect()->route('home')
            ->with('success', 'Your job-seeker profile has been created! We\'ll notify you about matching opportunities.');
    }

    /**
     * Handle the employer profile form submission.
     */
    public function storeEmployerProfile(Request $request)
    {
        $validated = $request->validate([
            'company_name'        => ['required', 'string', 'max:150'],
            'contact_name'        => ['required', 'string', 'max:100'],
            'business_email'      => ['required', 'email', 'max:150'],
            'phone'               => ['nullable', 'string', 'max:30'],
            'company_website'     => ['nullable', 'url', 'max:250'],
            'industry'            => ['required', 'string', 'max:100'],
            'company_size'        => ['required', 'string'],
            'company_location'    => ['required', 'string', 'max:150'],
            'company_description' => ['required', 'string', 'max:2000'],
            'linkedin_company'    => ['nullable', 'url', 'max:250'],
            'twitter_company'     => ['nullable', 'url', 'max:250'],
            'company_logo'        => ['nullable', 'image', 'max:2048'],
        ]);

        // TODO: persist $validated — placeholder redirect for now
        return redirect()->route('home')
            ->with('success', 'Your employer profile is live! You can now start posting jobs on PostPulse.');
    }
}
