<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SalaryController extends Controller
{
    public function index(Request $request)
    {
        // ── KPI Stats ──────────────────────────────────────────────────────────
        $stats = [
            ['label' => 'Avg. UK Salary',       'value' => '£47,200', 'change' => '+4.2%', 'up' => true,  'icon' => 'currency'],
            ['label' => 'Roles Tracked',         'value' => '12,400+', 'change' => '+820',  'up' => true,  'icon' => 'briefcase'],
            ['label' => 'Companies Reporting',   'value' => '3,800+',  'change' => '+310',  'up' => true,  'icon' => 'building'],
            ['label' => 'Salary Reports Filed',  'value' => '94,000',  'change' => '+6.1%', 'up' => true,  'icon' => 'chart'],
        ];

        // ── Top Job Titles ─────────────────────────────────────────────────────
        $topTitles = [
            ['title' => 'Software Engineer',  'category' => 'Engineering', 'avg_salary' => '£72,000', 'min_salary' => 55000, 'max_salary' => 110000, 'median' => 72000, 'bar_pct' => 85, 'yoy' => '+6.1%', 'demand' => 'High'],
            ['title' => 'Product Manager',    'category' => 'Product',     'avg_salary' => '£68,500', 'min_salary' => 52000, 'max_salary' => 95000,  'median' => 68500, 'bar_pct' => 80, 'yoy' => '+4.8%', 'demand' => 'High'],
            ['title' => 'Data Scientist',     'category' => 'Data',        'avg_salary' => '£65,000', 'min_salary' => 48000, 'max_salary' => 98000,  'median' => 65000, 'bar_pct' => 76, 'yoy' => '+7.3%', 'demand' => 'High'],
            ['title' => 'UX Designer',        'category' => 'Design',      'avg_salary' => '£54,000', 'min_salary' => 40000, 'max_salary' => 78000,  'median' => 54000, 'bar_pct' => 63, 'yoy' => '+3.9%', 'demand' => 'Medium'],
            ['title' => 'DevOps Engineer',    'category' => 'Engineering', 'avg_salary' => '£70,000', 'min_salary' => 55000, 'max_salary' => 105000, 'median' => 70000, 'bar_pct' => 82, 'yoy' => '+5.5%', 'demand' => 'High'],
            ['title' => 'Marketing Manager',  'category' => 'Marketing',   'avg_salary' => '£48,000', 'min_salary' => 36000, 'max_salary' => 72000,  'median' => 48000, 'bar_pct' => 56, 'yoy' => '+2.1%', 'demand' => 'Medium'],
            ['title' => 'Finance Analyst',    'category' => 'Finance',     'avg_salary' => '£52,000', 'min_salary' => 38000, 'max_salary' => 80000,  'median' => 52000, 'bar_pct' => 61, 'yoy' => '+3.4%', 'demand' => 'Medium'],
            ['title' => 'HR Business Partner','category' => 'HR',          'avg_salary' => '£45,000', 'min_salary' => 34000, 'max_salary' => 65000,  'median' => 45000, 'bar_pct' => 52, 'yoy' => '+1.8%', 'demand' => 'Low'],
        ];

        // ── By Experience ──────────────────────────────────────────────────────
        $byExperience = [
            ['level' => 'Junior',         'years' => '0–2 yrs',   'avg' => '£32,000',  'min' => 25000, 'max' => 42000,  'bar_pct' => 35,  'color' => 'bg-[#149696]/40'],
            ['level' => 'Mid-Level',      'years' => '3–5 yrs',   'avg' => '£52,000',  'min' => 40000, 'max' => 68000,  'bar_pct' => 57,  'color' => 'bg-[#149696]/60'],
            ['level' => 'Senior',         'years' => '6–9 yrs',   'avg' => '£72,000',  'min' => 58000, 'max' => 92000,  'bar_pct' => 80,  'color' => 'bg-[#149696]'],
            ['level' => 'Lead/Principal', 'years' => '10–14 yrs', 'avg' => '£92,000',  'min' => 75000, 'max' => 120000, 'bar_pct' => 100, 'color' => 'bg-[#0f7a7a]'],
            ['level' => 'Director/VP',    'years' => '15+ yrs',   'avg' => '£125,000', 'min' => 95000, 'max' => 180000, 'bar_pct' => 100, 'color' => 'bg-gray-800'],
        ];

        // ── By Industry ────────────────────────────────────────────────────────
        $byIndustry = [
            ['industry' => 'Technology & Software',  'avg_salary' => '£74,500', 'growth' => '+6.8%', 'bar_pct' => 100, 'color' => 'bg-[#149696]'],
            ['industry' => 'Finance & Fintech',      'avg_salary' => '£71,200', 'growth' => '+5.1%', 'bar_pct' => 96,  'color' => 'bg-blue-500'],
            ['industry' => 'Healthcare & Biotech',   'avg_salary' => '£62,800', 'growth' => '+4.4%', 'bar_pct' => 84,  'color' => 'bg-emerald-500'],
            ['industry' => 'Legal',                  'avg_salary' => '£61,500', 'growth' => '+2.9%', 'bar_pct' => 82,  'color' => 'bg-violet-500'],
            ['industry' => 'E-Commerce & Retail',    'avg_salary' => '£48,200', 'growth' => '+3.2%', 'bar_pct' => 65,  'color' => 'bg-amber-500'],
            ['industry' => 'Education & EdTech',     'avg_salary' => '£42,100', 'growth' => '+2.0%', 'bar_pct' => 56,  'color' => 'bg-orange-400'],
            ['industry' => 'Non-Profit',             'avg_salary' => '£38,500', 'growth' => '+1.4%', 'bar_pct' => 52,  'color' => 'bg-gray-400'],
        ];

        // ── By Location ────────────────────────────────────────────────────────
        $byLocation = [
            ['city' => 'London',     'country' => 'UK', 'avg_salary' => '£68,500', 'growth' => '+5.2%', 'pct_above_avg' => '+45%', 'flag' => '🇬🇧', 'highlight' => true],
            ['city' => 'Manchester', 'country' => 'UK', 'avg_salary' => '£52,000', 'growth' => '+4.1%', 'pct_above_avg' => '+10%', 'flag' => '🏴󠁧󠁢󠁥󠁮󠁧󠁿', 'highlight' => false],
            ['city' => 'Edinburgh',  'country' => 'UK', 'avg_salary' => '£50,500', 'growth' => '+3.8%', 'pct_above_avg' => '+7%',  'flag' => '🏴󠁧󠁢󠁳󠁣󠁴󠁿', 'highlight' => false],
            ['city' => 'Bristol',    'country' => 'UK', 'avg_salary' => '£49,500', 'growth' => '+3.5%', 'pct_above_avg' => '+5%',  'flag' => '🇬🇧', 'highlight' => false],
            ['city' => 'Birmingham', 'country' => 'UK', 'avg_salary' => '£47,000', 'growth' => '+2.9%', 'pct_above_avg' => '+0%',  'flag' => '🇬🇧', 'highlight' => false],
            ['city' => 'Leeds',      'country' => 'UK', 'avg_salary' => '£46,500', 'growth' => '+3.1%', 'pct_above_avg' => '-1%',  'flag' => '🇬🇧', 'highlight' => false],
        ];

        // ── Trends ────────────────────────────────────────────────────────────
        $trends = [
            ['year' => '2021', 'avg' => 40500, 'bar_pct' => 54],
            ['year' => '2022', 'avg' => 42800, 'bar_pct' => 57],
            ['year' => '2023', 'avg' => 44200, 'bar_pct' => 59],
            ['year' => '2024', 'avg' => 45900, 'bar_pct' => 61],
            ['year' => '2025', 'avg' => 47200, 'bar_pct' => 63],
            ['year' => '2026', 'avg' => 47200, 'bar_pct' => 63, 'projected' => true],
        ];

        // ── Compensation Breakdown ────────────────────────────────────────────
        $compensation = [
            ['label' => 'Base Salary',         'pct' => 72, 'amount' => '£47,200', 'color' => '#149696'],
            ['label' => 'Annual Bonus',         'pct' => 12, 'amount' => '£7,870',  'color' => '#f59e0b'],
            ['label' => 'Benefits Package',     'pct' => 10, 'amount' => '£6,560',  'color' => '#8b5cf6'],
            ['label' => 'Other Compensation',   'pct' => 6,  'amount' => '£3,940',  'color' => '#10b981'],
        ];

        // ── Role Comparison ────────────────────────────────────────────────────
        $comparison = [
            'roles'   => ['Software Engineer', 'Product Manager', 'Data Scientist'],
            'metrics' => [
                ['label' => 'Average Base',   'values' => ['£72,000',  '£68,500',  '£65,000']],
                ['label' => 'Median Bonus',   'values' => ['£8,200',   '£11,400',  '£9,100']],
                ['label' => 'Total Comp.',    'values' => ['£83,500',  '£82,900',  '£77,400']],
                ['label' => 'Entry Level',    'values' => ['£45,000',  '£42,000',  '£40,000']],
                ['label' => 'Senior Level',   'values' => ['£105,000', '£98,000',  '£95,000']],
                ['label' => 'YoY Growth',     'values' => ['+6.1%',    '+4.8%',    '+7.3%']],
                ['label' => 'Remote Premium', 'values' => ['+12%',     '+8%',      '+15%']],
                ['label' => 'London Premium', 'values' => ['+42%',     '+38%',     '+36%']],
            ],
        ];

        // ── Featured Reports ──────────────────────────────────────────────────
        $reports = [
            [
                'title'       => '2026 UK Tech Salary Report',
                'description' => 'Comprehensive analysis of salaries across software engineering, product, and data roles at UK tech companies — from startups to FTSE 100.',
                'category'    => 'Technology',
                'date'        => 'June 2026',
                'pages'       => 48,
                'image_url'   => 'https://images.unsplash.com/photo-1551288049-bebda4e38f71?w=600&auto=format&fit=crop&q=80',
                'tag'         => 'Free',
            ],
            [
                'title'       => 'Finance & Fintech Compensation Guide',
                'description' => 'Deep dive into compensation structures at banks, hedge funds, and fintech scaleups — including bonus breakdowns, carry, and equity packages.',
                'category'    => 'Finance',
                'date'        => 'May 2026',
                'pages'       => 36,
                'image_url'   => 'https://images.unsplash.com/photo-1554224155-6726b3ff858f?w=600&auto=format&fit=crop&q=80',
                'tag'         => 'Premium',
            ],
            [
                'title'       => 'Remote Work Salary Premium Report',
                'description' => 'How remote work is changing salary expectations and geographic pay gaps — with data from 8,000+ remote job listings and employee surveys.',
                'category'    => 'Remote',
                'date'        => 'April 2026',
                'pages'       => 28,
                'image_url'   => 'https://images.unsplash.com/photo-1522202176988-66273c2fd55f?w=600&auto=format&fit=crop&q=80',
                'tag'         => 'Free',
            ],
        ];

        // ── Filters ───────────────────────────────────────────────────────────
        $filters = [
            'title'      => $request->query('title', ''),
            'industry'   => $request->query('industry', 'All'),
            'location'   => $request->query('location', 'All'),
            'experience' => $request->query('experience', 'All'),
        ];

        $industries  = ['All', 'Technology & Software', 'Finance & Fintech', 'Healthcare & Biotech', 'Legal', 'E-Commerce & Retail', 'Education & EdTech', 'Non-Profit'];
        $locations   = ['All', 'London', 'Manchester', 'Edinburgh', 'Bristol', 'Birmingham', 'Leeds'];
        $experiences = ['All', 'Junior (0-2 yrs)', 'Mid-Level (3-5 yrs)', 'Senior (6-9 yrs)', 'Lead/Principal (10-14 yrs)', 'Director/VP (15+ yrs)'];

        return view('salary.index', compact(
            'stats', 'topTitles', 'byExperience', 'byIndustry', 'byLocation',
            'trends', 'compensation', 'comparison', 'reports',
            'filters', 'industries', 'locations', 'experiences'
        ));
    }
}
