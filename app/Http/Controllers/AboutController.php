<?php

namespace App\Http\Controllers;

class AboutController extends Controller
{
    public function index()
    {
        $team = [
            [
                'name'   => 'Sarah Mitchell',
                'role'   => 'CEO & Co-Founder',
                'bio'    => 'Former Head of Talent at Stripe. Sarah built PostPulse to fix the hiring process she lived through for 10 years.',
                'avatar' => 'https://i.pravatar.cc/200?img=47',
                'linkedin' => '#',
                'twitter'  => '#',
            ],
            [
                'name'   => 'James Owens',
                'role'   => 'CTO & Co-Founder',
                'bio'    => 'Ex-Google engineer. James leads the platform and AI matching engine that puts the right candidates in front of the right employers.',
                'avatar' => 'https://i.pravatar.cc/200?img=12',
                'linkedin' => '#',
                'twitter'  => '#',
            ],
            [
                'name'   => 'Priya Sharma',
                'role'   => 'Head of Product',
                'bio'    => 'Previously at Notion & Figma. Priya obsesses over the candidate and employer experience so every interaction feels effortless.',
                'avatar' => 'https://i.pravatar.cc/200?img=32',
                'linkedin' => '#',
                'twitter'  => '#',
            ],
            [
                'name'   => 'Carlos Rivera',
                'role'   => 'Head of Engineering',
                'bio'    => 'Built infrastructure for millions of users at Shopify. Carlos keeps PostPulse fast, reliable, and always shipping.',
                'avatar' => 'https://i.pravatar.cc/200?img=15',
                'linkedin' => '#',
                'twitter'  => '#',
            ],
            [
                'name'   => 'Leila Nasser',
                'role'   => 'Head of Growth',
                'bio'    => 'Growth operator with a track record across Airbnb and HubSpot. Leila is focused on connecting more employers and talent every day.',
                'avatar' => 'https://i.pravatar.cc/200?img=44',
                'linkedin' => '#',
                'twitter'  => '#',
            ],
            [
                'name'   => 'Marcus Chen',
                'role'   => 'Lead Designer',
                'bio'    => 'Obsessed with clarity and detail. Marcus shapes every pixel of PostPulse to ensure the experience is never in the way.',
                'avatar' => 'https://i.pravatar.cc/200?img=33',
                'linkedin' => '#',
                'twitter'  => '#',
            ],
        ];

        $values = [
            [
                'icon'  => 'M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z',
                'label' => 'Trust First',
                'color' => 'bg-[#e6f7f7] text-[#149696]',
                'desc'  => 'Every employer is verified. Every listing is real. We protect job seekers from fake postings and spam with active moderation.',
            ],
            [
                'icon'  => 'M13 10V3L4 14h7v7l9-11h-7z',
                'label' => 'Speed Matters',
                'color' => 'bg-amber-50 text-amber-500',
                'desc'  => 'A great opportunity shouldn\'t wait. We built PostPulse to move fast — from posting a job to getting your first qualified applicant.',
            ],
            [
                'icon'  => 'M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z',
                'label' => 'People Over Metrics',
                'color' => 'bg-violet-50 text-violet-500',
                'desc'  => 'Behind every profile is a real person with real ambitions. We design every feature to serve them — not just optimise our conversion rate.',
            ],
            [
                'icon'  => 'M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064',
                'label' => 'Built for Everyone',
                'color' => 'bg-emerald-50 text-emerald-500',
                'desc'  => 'From solo freelancers to Fortune 500 hiring teams, PostPulse scales to serve every kind of professional and every kind of employer.',
            ],
        ];

        $milestones = [
            ['year' => '2021', 'title' => 'The Idea',        'desc' => 'Sarah and James met at a hiring conference and spent the evening drawing PostPulse on a napkin.'],
            ['year' => '2022', 'title' => 'First Launch',    'desc' => 'Beta launched with 50 employers and 2,000 job seekers. We hit 1,000 applications in our first week.'],
            ['year' => '2023', 'title' => 'Series A',        'desc' => 'Raised $8M to grow the team and launch AI-powered job matching. Crossed 100,000 registered users.'],
            ['year' => '2024', 'title' => 'Global Reach',    'desc' => 'Expanded to 40 countries. Crossed 1M job seekers and 10,000 active employers on the platform.'],
            ['year' => '2025', 'title' => '1M Hires',        'desc' => 'PostPulse facilitated its one millionth hire. Launched Employer Branding and Salary Insights tools.'],
            ['year' => '2026', 'title' => 'What\'s Next',    'desc' => 'AI interview prep, anonymous applications, and a mobile app. The best version of PostPulse is still ahead.'],
        ];

        $testimonials = [
            [
                'quote'  => 'PostPulse changed how we think about hiring. We went from posting a job and hoping for the best, to having a curated pipeline of exactly the right people within 48 hours.',
                'name'   => 'Alex Torres',
                'role'   => 'CTO, Nexus Co.',
                'avatar' => 'https://i.pravatar.cc/80?img=8',
                'rating' => 5,
                'type'   => 'employer',
            ],
            [
                'quote'  => 'I had been job hunting for four months with zero traction. I joined PostPulse on a Tuesday and had three interviews booked by Friday. I accepted an offer two weeks later.',
                'name'   => 'Amira Siddiqui',
                'role'   => 'UX Designer, now at Airbnb',
                'avatar' => 'https://i.pravatar.cc/80?img=47',
                'rating' => 5,
                'type'   => 'seeker',
            ],
            [
                'quote'  => 'The quality of candidates on PostPulse is genuinely different. These are people who are serious about their careers, not just spraying applications everywhere.',
                'name'   => 'Mei-Ling Park',
                'role'   => 'VP People, Orbi',
                'avatar' => 'https://i.pravatar.cc/80?img=25',
                'rating' => 5,
                'type'   => 'employer',
            ],
            [
                'quote'  => 'I was switching industries and terrified nobody would look at my CV. PostPulse\'s matching found three roles that actually valued what I was bringing. I got my first offer in 18 days.',
                'name'   => 'Marcus Lim',
                'role'   => 'Product Analyst, career changer',
                'avatar' => 'https://i.pravatar.cc/80?img=17',
                'rating' => 5,
                'type'   => 'seeker',
            ],
            [
                'quote'  => 'We use PostPulse for every hire now. The featured listing placement and AI matching mean we spend less time sifting and more time actually meeting great people.',
                'name'   => 'Sophie Laurent',
                'role'   => 'Head of Talent, BuildStack',
                'avatar' => 'https://i.pravatar.cc/80?img=44',
                'rating' => 5,
                'type'   => 'employer',
            ],
            [
                'quote'  => 'The salary insights tool alone was worth signing up for. I went into my negotiation knowing exactly what my role was worth and walked out with a 22% increase.',
                'name'   => 'Ravi Kumar',
                'role'   => 'Senior Engineer, Series B startup',
                'avatar' => 'https://i.pravatar.cc/80?img=33',
                'rating' => 5,
                'type'   => 'seeker',
            ],
        ];

        $stats = [
            ['value' => '1M+',   'label' => 'Successful hires',     'icon' => 'M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z'],
            ['value' => '500k+', 'label' => 'Active job seekers',   'icon' => 'M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z'],
            ['value' => '12k+',  'label' => 'Hiring companies',     'icon' => 'M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-2 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4'],
            ['value' => '40+',   'label' => 'Countries reached',    'icon' => 'M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064'],
        ];

        return view('about.index', compact('team', 'values', 'milestones', 'testimonials', 'stats'));
    }
}
