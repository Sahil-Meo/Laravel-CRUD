<?php

namespace App\Http\Controllers;

class FeaturedController extends Controller
{
    public function index()
    {
        // ── Hero ──────────────────────────────────────────────────────────
        $hero = [
            'label'         => 'Featured Opportunities',
            'title'         => 'Hand-picked jobs from the world\'s best employers',
            'subtitle'      => 'Our team curates the most exciting, high-impact roles across every industry. Updated every week so you never miss the right opportunity.',
            'image'         => 'https://images.unsplash.com/photo-1497366811353-6870744d04b2?w=1400&auto=format&fit=crop&q=80',
            'cta_primary'   => ['label' => 'Browse All Jobs', 'url' => '#jobs'],
            'cta_secondary' => ['label' => 'Post a Role', 'url' => '#'],
            'stats' => [
                ['value' => '10k+',  'label' => 'Live job listings'],
                ['value' => '3,200', 'label' => 'Companies hiring'],
                ['value' => '48k+',  'label' => 'Hires this year'],
                ['value' => '4.8★',  'label' => 'Candidate rating'],
            ],
        ];

        // ── Featured job listings ─────────────────────────────────────────
        $jobs = [
            [
                'badge'        => 'Featured',
                'badgeColor'   => 'teal',
                'title'        => 'Senior Product Designer',
                'company'      => 'Airbnb',
                'logo_letter'  => 'A',
                'logo_bg'      => 'bg-rose-100',
                'logo_text'    => 'text-rose-600',
                'location'     => 'Remote · USA',
                'salary'       => '$130k – $160k',
                'type'         => 'Full-time',
                'category'     => 'Design',
                'posted'       => '2 days ago',
                'description'  => 'Lead end-to-end product design across Airbnb\'s core booking experience. Work closely with research, engineering, and data teams.',
            ],
            [
                'badge'        => 'Urgent',
                'badgeColor'   => 'red',
                'title'        => 'Backend Engineer (Node.js)',
                'company'      => 'Stripe',
                'logo_letter'  => 'S',
                'logo_bg'      => 'bg-blue-100',
                'logo_text'    => 'text-blue-600',
                'location'     => 'San Francisco, CA',
                'salary'       => '$150k – $200k',
                'type'         => 'Full-time',
                'category'     => 'Engineering',
                'posted'       => '1 day ago',
                'description'  => 'Build and scale the infrastructure powering billions of dollars in payments. Deep Node.js, distributed systems, and reliability engineering experience required.',
            ],
            [
                'badge'        => 'Hot',
                'badgeColor'   => 'amber',
                'title'        => 'Growth Marketing Lead',
                'company'      => 'Notion',
                'logo_letter'  => 'N',
                'logo_bg'      => 'bg-gray-100',
                'logo_text'    => 'text-gray-700',
                'location'     => 'Remote · Global',
                'salary'       => '$100k – $130k',
                'type'         => 'Full-time',
                'category'     => 'Marketing',
                'posted'       => '3 days ago',
                'description'  => 'Own acquisition, activation, and retention across paid and organic channels. You\'ll drive Notion\'s next phase of global growth.',
            ],
            [
                'badge'        => 'Featured',
                'badgeColor'   => 'teal',
                'title'        => 'Data Analyst',
                'company'      => 'Shopify',
                'logo_letter'  => 'S',
                'logo_bg'      => 'bg-green-100',
                'logo_text'    => 'text-green-600',
                'location'     => 'Ottawa, Canada',
                'salary'       => '$90k – $115k',
                'type'         => 'Hybrid',
                'category'     => 'Data',
                'posted'       => '5 days ago',
                'description'  => 'Analyse merchant behaviour, build dashboards, and turn data into insights that shape how millions of businesses run on Shopify.',
            ],
            [
                'badge'        => 'New',
                'badgeColor'   => 'teal',
                'title'        => 'DevOps Engineer',
                'company'      => 'Vercel',
                'logo_letter'  => 'V',
                'logo_bg'      => 'bg-gray-900',
                'logo_text'    => 'text-white',
                'location'     => 'Remote · Europe',
                'salary'       => '$120k – $150k',
                'type'         => 'Full-time',
                'category'     => 'Infrastructure',
                'posted'       => '1 day ago',
                'description'  => 'Help run one of the internet\'s most-loved deployment platforms. Own CI/CD pipelines, infrastructure-as-code, and SRE practices.',
            ],
            [
                'badge'        => 'New',
                'badgeColor'   => 'teal',
                'title'        => 'Customer Success Manager',
                'company'      => 'Linear',
                'logo_letter'  => 'L',
                'logo_bg'      => 'bg-violet-100',
                'logo_text'    => 'text-violet-600',
                'location'     => 'New York, NY',
                'salary'       => '$80k – $105k',
                'type'         => 'Hybrid',
                'category'     => 'Operations',
                'posted'       => '4 days ago',
                'description'  => 'Be the trusted partner for Linear\'s fastest-growing enterprise accounts. Own onboarding, retention, and expansion for a portfolio of key customers.',
            ],
            [
                'badge'        => 'Hot',
                'badgeColor'   => 'amber',
                'title'        => 'Full Stack Engineer (React + Laravel)',
                'company'      => 'Figma',
                'logo_letter'  => 'F',
                'logo_bg'      => 'bg-orange-100',
                'logo_text'    => 'text-orange-600',
                'location'     => 'Remote · USA',
                'salary'       => '$140k – $175k',
                'type'         => 'Full-time',
                'category'     => 'Engineering',
                'posted'       => '2 days ago',
                'description'  => 'Build the tools designers and developers rely on daily. Own features end-to-end across the Figma web platform and its APIs.',
            ],
            [
                'badge'        => 'Featured',
                'badgeColor'   => 'teal',
                'title'        => 'Talent Acquisition Specialist',
                'company'      => 'HubSpot',
                'logo_letter'  => 'H',
                'logo_bg'      => 'bg-orange-50',
                'logo_text'    => 'text-orange-500',
                'location'     => 'Dublin, Ireland',
                'salary'       => '€60k – €80k',
                'type'         => 'Hybrid',
                'category'     => 'HR',
                'posted'       => '6 days ago',
                'description'  => 'Own the end-to-end recruitment process for HubSpot\'s EMEA engineering teams. Partner with hiring managers and build diverse, high-performing teams.',
            ],
            [
                'badge'        => 'Urgent',
                'badgeColor'   => 'red',
                'title'        => 'Finance Business Partner',
                'company'      => 'Canva',
                'logo_letter'  => 'C',
                'logo_bg'      => 'bg-teal-100',
                'logo_text'    => 'text-teal-600',
                'location'     => 'Sydney, Australia',
                'salary'       => 'AU$110k – $140k',
                'type'         => 'Full-time',
                'category'     => 'Finance',
                'posted'       => '3 days ago',
                'description'  => 'Partner with Canva\'s product and marketing leaders to drive financial strategy, forecasting, and planning as we scale to the next 100 million users.',
            ],
        ];

        // ── Spotlight employer stories ────────────────────────────────────
        $spotlights = [
            [
                'tag'     => 'Employer Spotlight',
                'title'   => 'How Airbnb Fills Critical Roles 3× Faster with PostPulse',
                'body'    => 'Airbnb\'s global talent team shares how PostPulse\'s AI matching and featured listings reduced their average time-to-hire from 38 days to just 12 — without compromising on candidate quality.',
                'image'   => 'https://images.unsplash.com/photo-1521737711867-e3b97375f902?w=900&auto=format&fit=crop&q=80',
                'cta'     => 'Read the full story',
                'reverse' => false,
            ],
            [
                'tag'     => 'Career Guide',
                'title'   => 'The 2026 Salary Guide: What Top Roles Are Paying Right Now',
                'body'    => 'Our annual benchmark report covers 200+ roles across engineering, design, marketing, and operations. Know your worth before your next negotiation.',
                'image'   => 'https://images.unsplash.com/photo-1554224155-8d04cb21cd6c?w=900&auto=format&fit=crop&q=80',
                'cta'     => 'Download the guide',
                'reverse' => true,
            ],
        ];

        // ── Testimonials ──────────────────────────────────────────────────
        $testimonials = [
            [
                'quote'  => 'I applied to four jobs on PostPulse on a Tuesday. By Thursday I had two interviews booked. I was hired in under two weeks.',
                'name'   => 'Amira Siddiqui',
                'role'   => 'UX Designer, now at Airbnb',
                'avatar' => 'https://i.pravatar.cc/80?img=47',
                'rating' => 5,
            ],
            [
                'quote'  => 'PostPulse is the only job board that actually understands what we need as a scaling startup. Candidates are vetted and relevant — not just a flood of applications.',
                'name'   => 'Marcus Li',
                'role'   => 'Head of Talent, Series B Startup',
                'avatar' => 'https://i.pravatar.cc/80?img=12',
                'rating' => 5,
            ],
            [
                'quote'  => 'After six months of searching, I found my dream job — a remote Product Manager role paying 40% more than I was making. PostPulse changed my career.',
                'name'   => 'Leila Torres',
                'role'   => 'Senior PM, now at Notion',
                'avatar' => 'https://i.pravatar.cc/80?img=32',
                'rating' => 5,
            ],
        ];

        // ── Platform stats ────────────────────────────────────────────────
        $stats = [
            ['value' => '500k+',  'label' => 'Active job seekers',       'sub' => 'registered this year'],
            ['value' => '3,200',  'label' => 'Companies hiring now',     'sub' => 'from startups to Fortune 500'],
            ['value' => '12 hrs', 'label' => 'Avg. time to first match', 'sub' => 'for featured listings'],
            ['value' => '94%',    'label' => 'Employer satisfaction',    'sub' => 'would rehire via PostPulse'],
        ];

        // ── CTA ───────────────────────────────────────────────────────────
        $cta = [
            'title'    => 'Ready to find your next opportunity?',
            'subtitle' => 'Join 500,000+ professionals already using PostPulse to discover jobs, grow their careers, and connect with great companies.',
            'image'    => 'https://images.unsplash.com/photo-1573496359142-b8d87734a5a2?w=1400&auto=format&fit=crop&q=80',
        ];

        return view('featured.index', compact(
            'hero', 'jobs', 'spotlights', 'testimonials', 'stats', 'cta'
        ));
    }
}
