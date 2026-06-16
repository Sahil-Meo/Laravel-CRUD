<?php

namespace App\Http\Controllers;

class PricingController extends Controller
{
    public function index()
    {
        // Each plan carries both monthly and annual prices so the JS toggle
        // can switch them client-side without a page reload.
        $plans = [
            [
                'name'          => 'Free',
                'badge'         => null,
                'highlight'     => false,
                'audience'      => 'For job seekers — always free',
                'price_monthly' => '$0',
                'price_annual'  => '$0',
                'note_monthly'  => 'For job seekers — always free',
                'note_annual'   => 'For job seekers — always free',
                'period'        => '/mo',
                'cta_label'     => 'Get started free',
                'cta_href'      => route('profile.create'),
                'features'      => [
                    ['text' => 'Unlimited job search',        'included' => true],
                    ['text' => 'Apply to 5 jobs / month',     'included' => true],
                    ['text' => 'Basic candidate profile',     'included' => true],
                    ['text' => 'Job alert emails',            'included' => false],
                    ['text' => 'AI job matching',             'included' => false],
                    ['text' => 'Priority listing visibility', 'included' => false],
                    ['text' => 'Resume / CV upload',          'included' => false],
                ],
            ],
            [
                'name'          => 'Employer Pro',
                'badge'         => 'Most Popular',
                'highlight'     => true,
                'audience'      => 'Per active job posting',
                'price_monthly' => '$49',
                'price_annual'  => '$39',
                'note_monthly'  => 'Per active job posting',
                'note_annual'   => 'Per posting · billed annually',
                'period'        => '/mo',
                'cta_label'     => 'Post a Job',
                'cta_href'      => route('profile.create'),
                'features'      => [
                    ['text' => 'Featured placement in search', 'included' => true],
                    ['text' => 'Unlimited applicants',         'included' => true],
                    ['text' => 'AI candidate matching',        'included' => true],
                    ['text' => 'Applicant tracking dashboard', 'included' => true],
                    ['text' => 'Browse candidate profiles',    'included' => true],
                    ['text' => 'Company branding page',        'included' => true],
                    ['text' => 'Priority support',             'included' => true],
                ],
            ],
            [
                'name'          => 'Enterprise',
                'badge'         => null,
                'highlight'     => false,
                'audience'      => 'Volume hiring & staffing agencies',
                'price_monthly' => 'Custom',
                'price_annual'  => 'Custom',
                'note_monthly'  => 'Volume hiring & staffing agencies',
                'note_annual'   => 'Volume hiring & staffing agencies',
                'period'        => '',
                'cta_label'     => 'Contact Sales',
                'cta_href'      => route('contact'),
                'features'      => [
                    ['text' => 'Everything in Employer Pro',  'included' => true],
                    ['text' => 'Unlimited job postings',      'included' => true],
                    ['text' => 'Dedicated recruiter tools',   'included' => true],
                    ['text' => 'SSO & audit logs',            'included' => true],
                    ['text' => 'Analytics & reporting',       'included' => true],
                    ['text' => 'Custom integrations / API',   'included' => true],
                    ['text' => 'Dedicated account manager',   'included' => true],
                ],
            ],
        ];

        $faqs = [
            ['q' => 'Can I switch plans at any time?',
             'a' => 'Yes. You can upgrade, downgrade or cancel your plan at any time from your dashboard. Changes take effect immediately and we pro-rate any billing differences.'],
            ['q' => 'Is there a free trial for paid plans?',
             'a' => 'Employer Pro comes with a 14-day free trial — no credit card required. Enterprise plans include a personalised demo and pilot period.'],
            ['q' => 'What payment methods do you accept?',
             'a' => 'We accept all major credit and debit cards (Visa, Mastercard, Amex), PayPal, and bank transfer for annual Enterprise plans. All payments are secured by Stripe.'],
            ['q' => 'Are there discounts for annual billing?',
             'a' => 'Yes — paying annually saves you 20% on the Employer Pro plan. The discount is applied automatically when you select annual billing at checkout.'],
            ['q' => 'What happens when a job posting expires?',
             'a' => 'Job postings on the Employer Pro plan are active for 30 days. You can renew, refresh, or close them at any time. Renewals are billed at your current rate.'],
            ['q' => 'Do you offer refunds?',
             'a' => 'We offer a full refund within 48 hours of your first purchase if you\'re not satisfied. For recurring billing, we handle each case fairly — just contact our support team.'],
        ];

        $testimonials = [
            ['quote'  => 'We switched to Employer Pro and filled three roles in 10 days. The AI matching is genuinely better than anything we\'ve tried.',
             'name'   => 'Marcus Li',  'role' => 'Head of Talent, Series B Startup', 'avatar' => 'https://i.pravatar.cc/80?img=12'],
            ['quote'  => 'The free plan is genuinely useful — I found my role without spending a penny. PostPulse is miles ahead of every other job board.',
             'name'   => 'Amira S.',   'role' => 'UX Designer · Hired via PostPulse', 'avatar' => 'https://i.pravatar.cc/80?img=47'],
            ['quote'  => 'The Enterprise plan scales perfectly for our agency. The API access and custom integrations saved us weeks of work.',
             'name'   => 'Sophie L.',  'role' => 'Head of Talent, BuildStack',        'avatar' => 'https://i.pravatar.cc/80?img=44'],
        ];

        return view('pricing.index', compact('plans', 'faqs', 'testimonials'));
    }
}
