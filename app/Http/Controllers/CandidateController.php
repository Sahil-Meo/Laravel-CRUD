<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CandidateController extends Controller
{
    // ── Static filter options (shared with view) ─────────────────────────────
    private const CATEGORIES   = ['All', 'Engineering', 'Design', 'Marketing', 'Data', 'Finance', 'HR', 'Operations', 'Sales'];
    private const EXPERIENCE   = ['All', 'Junior (0–2 yrs)', 'Mid (3–5 yrs)', 'Senior (6–9 yrs)', 'Lead / Principal (10+ yrs)'];
    private const AVAILABILITY = ['All', 'Actively looking', 'Open to offers', 'Not available'];
    private const WORK_TYPE    = ['All', 'Full-time', 'Part-time', 'Contract', 'Freelance', 'Remote only'];
    private const SORT_OPTIONS = ['Newest first', 'Experience: High to Low', 'Experience: Low to High', 'Alphabetical'];

    // ── Dummy candidate pool ─────────────────────────────────────────────────
    private function candidates(): array
    {
        return [
            [
                'id'           => 1,
                'name'         => 'Amira Siddiqui',
                'title'        => 'Senior UX Designer',
                'avatar'       => 'https://i.pravatar.cc/200?img=47',
                'location'     => 'London, UK',
                'remote'       => true,
                'category'     => 'Design',
                'experience'   => 'Senior (6–9 yrs)',
                'years'        => 7,
                'availability' => 'Actively looking',
                'work_type'    => 'Full-time',
                'salary'       => '£70k – £90k',
                'education'    => 'BA Graphic Design, UAL London',
                'summary'      => 'User-centred designer specialising in SaaS products and design systems. Previously at Monzo and Deliveroo, I turn complex problems into clean, intuitive experiences.',
                'skills'       => ['Figma', 'UX Research', 'Prototyping', 'Design Systems', 'Accessibility', 'User Testing'],
                'featured'     => true,
            ],
            [
                'id'           => 2,
                'name'         => 'Carlos Rivera',
                'title'        => 'Staff Backend Engineer',
                'avatar'       => 'https://i.pravatar.cc/200?img=15',
                'location'     => 'San Francisco, CA',
                'remote'       => true,
                'category'     => 'Engineering',
                'experience'   => 'Lead / Principal (10+ yrs)',
                'years'        => 12,
                'availability' => 'Open to offers',
                'work_type'    => 'Full-time',
                'salary'       => '$170k – $220k',
                'education'    => 'BSc Computer Science, UC Berkeley',
                'summary'      => 'Distributed systems engineer with 12 years scaling backend infrastructure. Led platform teams at Stripe and Cloudflare handling billions of requests daily.',
                'skills'       => ['Node.js', 'Go', 'Kubernetes', 'PostgreSQL', 'Redis', 'AWS', 'System Design'],
                'featured'     => true,
            ],
            [
                'id'           => 3,
                'name'         => 'Priya Mehta',
                'title'        => 'Product Marketing Manager',
                'avatar'       => 'https://i.pravatar.cc/200?img=32',
                'location'     => 'Remote · Global',
                'remote'       => true,
                'category'     => 'Marketing',
                'experience'   => 'Mid (3–5 yrs)',
                'years'        => 5,
                'availability' => 'Actively looking',
                'work_type'    => 'Full-time',
                'salary'       => '$95k – $120k',
                'education'    => 'MBA, INSEAD',
                'summary'      => 'Go-to-market strategist helping B2B SaaS companies launch products and build category leadership. Proven track record across Series A through IPO-stage companies.',
                'skills'       => ['GTM Strategy', 'Competitive Analysis', 'Content Marketing', 'HubSpot', 'SQL', 'Positioning'],
                'featured'     => false,
            ],
            [
                'id'           => 4,
                'name'         => 'James Owens',
                'title'        => 'Senior Data Engineer',
                'avatar'       => 'https://i.pravatar.cc/200?img=12',
                'location'     => 'Berlin, Germany',
                'remote'       => true,
                'category'     => 'Data',
                'experience'   => 'Senior (6–9 yrs)',
                'years'        => 8,
                'availability' => 'Open to offers',
                'work_type'    => 'Contract',
                'salary'       => '€95k – €120k',
                'education'    => 'MSc Data Science, TU Berlin',
                'summary'      => 'Data engineering specialist building reliable, scalable pipelines for analytics teams. Deep expertise in dbt, Spark, and modern data stack tooling at N26 and Zalando.',
                'skills'       => ['Python', 'dbt', 'Apache Spark', 'Snowflake', 'Airflow', 'BigQuery', 'SQL'],
                'featured'     => false,
            ],
            [
                'id'           => 5,
                'name'         => 'Sofia Andersen',
                'title'        => 'Full Stack Engineer',
                'avatar'       => 'https://i.pravatar.cc/200?img=44',
                'location'     => 'Copenhagen, Denmark',
                'remote'       => true,
                'category'     => 'Engineering',
                'experience'   => 'Mid (3–5 yrs)',
                'years'        => 4,
                'availability' => 'Actively looking',
                'work_type'    => 'Full-time',
                'salary'       => '450k – 550k DKK',
                'education'    => 'BSc Software Engineering, DTU',
                'summary'      => 'Full stack developer with a love for clean code and fast UIs. I build with React, Laravel, and TypeScript and care deeply about developer experience and performance.',
                'skills'       => ['React', 'TypeScript', 'Laravel', 'Tailwind CSS', 'PostgreSQL', 'Docker', 'Testing'],
                'featured'     => false,
            ],
            [
                'id'           => 6,
                'name'         => 'Marcus Chen',
                'title'        => 'Lead Product Designer',
                'avatar'       => 'https://i.pravatar.cc/200?img=33',
                'location'     => 'Singapore',
                'remote'       => false,
                'category'     => 'Design',
                'experience'   => 'Senior (6–9 yrs)',
                'years'        => 9,
                'availability' => 'Open to offers',
                'work_type'    => 'Full-time',
                'salary'       => 'SGD 140k – 180k',
                'education'    => 'BDes Industrial Design, NUS',
                'summary'      => 'Multi-disciplinary designer leading product and brand teams across fintech and e-commerce. Strong track record shipping high-impact features for 10M+ user products.',
                'skills'       => ['Product Design', 'Brand Identity', 'Figma', 'Motion Design', 'iOS / Android', 'Storybook'],
                'featured'     => false,
            ],
            [
                'id'           => 7,
                'name'         => 'Leila Nasser',
                'title'        => 'Growth Marketing Lead',
                'avatar'       => 'https://i.pravatar.cc/200?img=24',
                'location'     => 'Dubai, UAE',
                'remote'       => true,
                'category'     => 'Marketing',
                'experience'   => 'Senior (6–9 yrs)',
                'years'        => 7,
                'availability' => 'Actively looking',
                'work_type'    => 'Full-time',
                'salary'       => '$110k – $140k',
                'education'    => 'BA Business, American University Dubai',
                'summary'      => 'Growth specialist with deep expertise in paid acquisition, lifecycle marketing, and experiment design. Scaled user acquisition from 50k to 2M at two MENA-region startups.',
                'skills'       => ['Paid Ads', 'A/B Testing', 'Email Marketing', 'Analytics', 'Mixpanel', 'Copywriting'],
                'featured'     => false,
            ],
            [
                'id'           => 8,
                'name'         => 'Ravi Kumar',
                'title'        => 'DevOps / Platform Engineer',
                'avatar'       => 'https://i.pravatar.cc/200?img=68',
                'location'     => 'Bangalore, India',
                'remote'       => true,
                'category'     => 'Engineering',
                'experience'   => 'Senior (6–9 yrs)',
                'years'        => 6,
                'availability' => 'Open to offers',
                'work_type'    => 'Remote only',
                'salary'       => '$80k – $110k',
                'education'    => 'BTech Computer Science, IIT Bombay',
                'summary'      => 'Platform engineer obsessed with reliability and developer productivity. Built self-service infra platforms at Flipkart and Razorpay serving hundreds of internal engineering teams.',
                'skills'       => ['Terraform', 'Kubernetes', 'CI/CD', 'AWS', 'GCP', 'Golang', 'Prometheus'],
                'featured'     => false,
            ],
            [
                'id'           => 9,
                'name'         => 'Emma Wilson',
                'title'        => 'Talent Acquisition Partner',
                'avatar'       => 'https://i.pravatar.cc/200?img=20',
                'location'     => 'Manchester, UK',
                'remote'       => false,
                'category'     => 'HR',
                'experience'   => 'Mid (3–5 yrs)',
                'years'        => 4,
                'availability' => 'Actively looking',
                'work_type'    => 'Full-time',
                'salary'       => '£45k – £60k',
                'education'    => 'BA Human Resources, University of Manchester',
                'summary'      => 'In-house recruiter specialising in technical and product hiring for high-growth startups. Strong pipeline-building skills and experience hiring across 8 countries.',
                'skills'       => ['Technical Recruiting', 'Sourcing', 'Employer Branding', 'LinkedIn Recruiter', 'Greenhouse', 'Interviewing'],
                'featured'     => false,
            ],
            [
                'id'           => 10,
                'name'         => 'Tom Hayes',
                'title'        => 'VP of Finance',
                'avatar'       => 'https://i.pravatar.cc/200?img=17',
                'location'     => 'New York, NY',
                'remote'       => false,
                'category'     => 'Finance',
                'experience'   => 'Lead / Principal (10+ yrs)',
                'years'        => 14,
                'availability' => 'Open to offers',
                'work_type'    => 'Full-time',
                'salary'       => '$200k – $260k',
                'education'    => 'MBA Finance, Wharton',
                'summary'      => 'Senior finance leader with P&L ownership experience across SaaS and marketplace businesses. Took two companies through successful exits — one IPO, one $400M acquisition.',
                'skills'       => ['FP&A', 'Financial Modelling', 'M&A', 'SaaS Metrics', 'Board Reporting', 'Fundraising'],
                'featured'     => false,
            ],
            [
                'id'           => 11,
                'name'         => 'Yuki Tanaka',
                'title'        => 'iOS Engineer',
                'avatar'       => 'https://i.pravatar.cc/200?img=56',
                'location'     => 'Tokyo, Japan',
                'remote'       => true,
                'category'     => 'Engineering',
                'experience'   => 'Mid (3–5 yrs)',
                'years'        => 4,
                'availability' => 'Actively looking',
                'work_type'    => 'Full-time',
                'salary'       => '¥9M – ¥12M',
                'education'    => 'BSc Information Science, Keio University',
                'summary'      => 'Native iOS developer with strong SwiftUI and UIKit skills. Shipped consumer apps with 1M+ downloads at LINE and CyberAgent. Passionate about performance and smooth UX.',
                'skills'       => ['Swift', 'SwiftUI', 'UIKit', 'Combine', 'Core Data', 'Xcode', 'App Store'],
                'featured'     => false,
            ],
            [
                'id'           => 12,
                'name'         => 'Zara Okonkwo',
                'title'        => 'Sales Operations Manager',
                'avatar'       => 'https://i.pravatar.cc/200?img=39',
                'location'     => 'Lagos, Nigeria',
                'remote'       => true,
                'category'     => 'Sales',
                'experience'   => 'Mid (3–5 yrs)',
                'years'        => 5,
                'availability' => 'Actively looking',
                'work_type'    => 'Full-time',
                'salary'       => '$60k – $80k',
                'education'    => 'BSc Business Administration, University of Lagos',
                'summary'      => 'Sales ops professional building the infrastructure behind high-performing revenue teams. Expert in CRM optimisation, territory planning, and sales analytics at Andela and Flutterwave.',
                'skills'       => ['Salesforce', 'RevOps', 'SQL', 'Data Analysis', 'Forecasting', 'Process Automation'],
                'featured'     => false,
            ],
        ];
    }

    public function index(Request $request)
    {
        $all          = $this->candidates();
        $categories   = self::CATEGORIES;
        $experiences  = self::EXPERIENCE;
        $availabilities = self::AVAILABILITY;
        $workTypes    = self::WORK_TYPE;
        $sortOptions  = self::SORT_OPTIONS;

        // Read filters
        $search       = $request->query('search', '');
        $category     = $request->query('category', 'All');
        $experience   = $request->query('experience', 'All');
        $availability = $request->query('availability', 'All');
        $work_type    = $request->query('work_type', 'All');
        $remote_only  = $request->boolean('remote_only');
        $sort         = $request->query('sort', 'Newest first');
        $page         = max(1, (int) $request->query('page', 1));
        $per_page     = 9;

        // Apply filters
        $filtered = array_filter($all, function ($c) use ($search, $category, $experience, $availability, $work_type, $remote_only) {
            if ($search !== '') {
                $needle = strtolower($search);
                $haystack = strtolower($c['name'] . ' ' . $c['title'] . ' ' . implode(' ', $c['skills']) . ' ' . $c['summary']);
                if (!str_contains($haystack, $needle)) return false;
            }
            if ($category !== 'All' && $c['category'] !== $category) return false;
            if ($experience !== 'All' && $c['experience'] !== $experience) return false;
            if ($availability !== 'All' && $c['availability'] !== $availability) return false;
            if ($work_type !== 'All' && $c['work_type'] !== $work_type) return false;
            if ($remote_only && !$c['remote']) return false;
            return true;
        });

        // Sort
        $filtered = array_values($filtered);
        usort($filtered, function ($a, $b) use ($sort) {
            return match ($sort) {
                'Experience: High to Low' => $b['years'] <=> $a['years'],
                'Experience: Low to High' => $a['years'] <=> $b['years'],
                'Alphabetical'            => strcmp($a['name'], $b['name']),
                default                   => $b['id'] <=> $a['id'], // Newest first
            };
        });

        // Paginate
        $total      = count($filtered);
        $total_pages = (int) ceil($total / $per_page);
        $page       = min($page, max(1, $total_pages));
        $candidates  = array_slice($filtered, ($page - 1) * $per_page, $per_page);

        // Active filter count (for badge on mobile)
        $active_filters = collect([$category, $experience, $availability, $work_type])
            ->filter(fn($v) => $v !== 'All')
            ->count() + ($search ? 1 : 0) + ($remote_only ? 1 : 0);

        return view('candidates.index', compact(
            'candidates', 'categories', 'experiences', 'availabilities', 'workTypes',
            'sortOptions', 'search', 'category', 'experience', 'availability',
            'work_type', 'remote_only', 'sort', 'page', 'total', 'total_pages',
            'per_page', 'active_filters'
        ));
    }
}
