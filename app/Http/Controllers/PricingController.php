<?php

namespace App\Http\Controllers;

class PricingController extends Controller
{
    public function index()
    {
        $plans = [
            [
                'name'       => 'Free',
                'badge'      => null,
                'audience'   => 'For job seekers — always free',
                'price'      => '$0',
                'period'     => '/mo',
                'highlight'  => false,
                'cta_label'  => 'Get started free',
                'cta_href'   => route('profile.create'),
                'features'   => [
                    ['text' => 'Unlimited job search',          'included' => true],
                    ['text' => 'Apply to 5 jobs / month',       'included' => true],
                    ['text' => 'Basic candidate profile',       'included' => true],
                    ['text' => 'Job alert emails',              'included' => false],
                    ['text' => 'AI job matching',               'included' => false],
                    ['text' => 'Priority listing visibility',   'included' => false],
                    ['text' => 'Resume / CV upload',            'included' => false],
                    ['text' => 'Dedicated support',             'included' => false],
                ],
            ],
            [
                'name'       => 'Pro Seeker',
                'badge'      => null,
                'audience'   => 'For serious job seekers',
                'price'      => '$12',
                'period'     => '/mo',
                'highlight'  => false,
                'cta_label'  => 'Start free trial',
                'cta_href'   => route('profile.create'),
                'features'   => [
                    ['text' => 'Unlimited job search',          'included' => true],
                    ['text' => 'Unlimited applications',        'included' => true],
                    ['text' => 'Enhanced candidate profile',    'included' => true],
                    ['text' => 'Job alert emails',              'included' => true],
                    ['text' => 'AI job matching',               'included' => true],
                    ['text' => 'Priority listing visibility',   'included' => true],
                    ['text' => 'Resume / CV upload',            'included' => true],
                    ['text' => 'Dedicated support',             'included' => false],
                ],
            ],
            [
                'name'       => 'Employer Pro',
                'badge'      => 'Most Popular',
                'audience'   => 'Per active job posting',
                'price'      => '$49',
                'period'     => '/mo',
                'highlight'  => true,
                'cta_label'  => 'Post a Job',
                'cta_href'   => route('profile.create'),
                'features'   => [
                    ['text' => 'Featured placement in search',  'included' => true],
                    ['text' => 'Unlimited applicants',          'included' => true],
                    ['text' => 'AI candidate matching',         'included' => true],
                    ['text' => 'Applicant tracking dashboard',  'included' => true],
                    ['text' => 'Browse candidate profiles',     'included' => true],
                    ['text' => 'Company branding page',         'included' => true],
                    ['text' => 'Analytics & reporting',         'included' => false],
                    ['text' => 'Dedicated account manager',     'included' => false],
                ],
            ],
            [
                'name'       => 'Enterprise',
                'badge'      => null,
                'audience'   => 'Volume hiring & staffing agencies',
                'price'      => 'Custom',
                'period'     => '',
                'highlight'  => false,
                'cta_label'  => 'Contact Sales',
                'cta_href'   => route('contact'),
                'features'   => [
                    ['text' => 'Everything in Employer Pro',    'included' => true],
                    ['text' => 'Unlimited job postings',        'included' => true],
                    ['text' => 'Dedicated recruiter tools',     'included' => true],
                    ['text' => 'SSO & audit logs',              'included' => true],
                    ['text' => 'Analytics & reporting',         'included' => true],
                    ['text' => 'Custom integrations / API',     'included' => true],
                    ['text' => 'SLA & uptime guarantee',        'included' => true],
                    ['text' => 'Dedicated account manager',     'included' => true],
                ],
            ],
        ];

        $faqs = [
            ['q' => 'Can I switch plans at any time?',
             'a' => 'Yes. You can upgrade, downgrade or cancel your plan at any time from your dashboard. Changes take effect immediately and we pro-rate any billing differences.'],
            ['q' => 'Is there a free trial for paid plans?',
             'a' => 'Employer Pro comes with a 14-day free trial — no credit card required. Pro Seeker includes a 7-day trial. Enterprise plans include a personalised demo and pilot period.'],
            ['q' => 'What payment methods do you accept?',
             'a' => 'We accept all major credit and debit cards (Visa, Mastercard, Amex), PayPal, and bank transfer for annual Enterprise plans. All payments are secured by Stripe.'],
            ['q' => 'Are there discounts for annual billing?',
             'a' => 'Yes — paying annually saves you 20% on Pro Seeker and Employer Pro plans. The discount is applied automatically when you select annual billing at checkout.'],
            ['q' => 'What happens when a job posting expires?',
             'a' => 'Job postings on the Employer Pro plan are active for 30 days. You can renew, refresh, or close them at any time. Renewals are billed at the standard monthly rate.'],
            ['q' => 'Do you offer refunds?',
             'a' => 'We offer a full refund within 48 hours of your first purchase if you\'re not satisfied. For recurring billing, we handle each case fairly — just contact our support team.'],
        ];

        $testimonials = [
            ['quote'  => 'We switched to Employer Pro and filled three roles in 10 days. The AI matching is genuinely better than anything we\'ve tried.',
             'name'   => 'Marcus Li',  'role' => 'Head of Talent, Series B Startup', 'avatar' => 'https://i.pravatar.cc/80?img=12'],
            ['quote'  => 'Pro Seeker paid for itself in week one. The unlimited applications and priority visibility made a huge difference.',
             'name'   => 'Amira S.',   'role' => 'UX Designer · Hired via PostPulse', 'avatar' => 'https://i.pravatar.cc/80?img=47'],
            ['quote'  => 'The Enterprise plan scales perfectly for our agency. The API access and custom integrations saved us weeks of work.',
             'name'   => 'Sophie L.',  'role' => 'Head of Talent, BuildStack',        'avatar' => 'https://i.pravatar.cc/80?img=44'],
        ];

        return view('pricing.index', compact('plans', 'faqs', 'testimonials'));
    }
}
