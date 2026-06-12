<?php

namespace App\Http\Controllers;

class FeaturedController extends Controller
{
    public function index()
    {
        // ── Hero spotlight ────────────────────────────────────────────────
        $hero = [
            'label'    => 'Feature of the Month',
            'title'    => 'DostTech Platform 3.0 — Built for Scale',
            'subtitle' => 'A complete rethink of how teams design, ship, and iterate on digital products. Faster pipelines, smarter collaboration, zero compromise.',
            'image'    => 'https://images.unsplash.com/photo-1551434678-e076c223a692?w=1200&auto=format&fit=crop&q=80',
            'cta_primary'   => ['label' => 'Explore the Platform', 'url' => '#'],
            'cta_secondary' => ['label' => 'Watch Overview', 'url' => '#'],
            'stats' => [
                ['value' => '3×',    'label' => 'Faster delivery'],
                ['value' => '98%',   'label' => 'Uptime SLA'],
                ['value' => '12k+',  'label' => 'Active teams'],
                ['value' => '4.9★',  'label' => 'Average rating'],
            ],
        ];

        // ── Featured items grid ───────────────────────────────────────────
        $items = [
            [
                'badge'   => 'New',
                'badgeColor' => 'teal',
                'title'   => 'Smart Workflow Automation',
                'excerpt' => 'Automate repetitive tasks with drag-and-drop rule builders. No code required — just results.',
                'image'   => 'https://images.unsplash.com/photo-1518186285589-2f7649de83e0?w=600&auto=format&fit=crop&q=80',
                'tag'     => 'Productivity',
                'meta'    => 'Released May 2026',
            ],
            [
                'badge'   => 'Popular',
                'badgeColor' => 'amber',
                'title'   => 'Real-Time Team Dashboard',
                'excerpt' => 'See every sprint, blocker, and delivery milestone in one living view your whole team can trust.',
                'image'   => 'https://images.unsplash.com/photo-1460925895917-afdab827c52f?w=600&auto=format&fit=crop&q=80',
                'tag'     => 'Analytics',
                'meta'    => 'Updated April 2026',
            ],
            [
                'badge'   => 'Beta',
                'badgeColor' => 'violet',
                'title'   => 'AI-Powered Code Review',
                'excerpt' => 'Our AI model surfaces critical issues, style violations, and security gaps before code hits production.',
                'image'   => 'https://images.unsplash.com/photo-1555066931-4365d14bab8c?w=600&auto=format&fit=crop&q=80',
                'tag'     => 'AI',
                'meta'    => 'Beta — June 2026',
            ],
            [
                'badge'   => 'New',
                'badgeColor' => 'teal',
                'title'   => 'Unified Design Tokens',
                'excerpt' => 'One source of truth for colors, typography, and spacing across web, iOS, and Android.',
                'image'   => 'https://images.unsplash.com/photo-1561070791-2526d30994b5?w=600&auto=format&fit=crop&q=80',
                'tag'     => 'Design',
                'meta'    => 'Released May 2026',
            ],
            [
                'badge'   => 'Popular',
                'badgeColor' => 'amber',
                'title'   => 'One-Click Deployments',
                'excerpt' => 'Push to any cloud in seconds. Rollbacks, previews, and canary releases built right in.',
                'image'   => 'https://images.unsplash.com/photo-1451187580459-43490279c0fa?w=600&auto=format&fit=crop&q=80',
                'tag'     => 'Infrastructure',
                'meta'    => 'Updated March 2026',
            ],
            [
                'badge'   => 'New',
                'badgeColor' => 'teal',
                'title'   => 'Async Video Standups',
                'excerpt' => 'Replace daily meetings with 2-minute async videos. Transcripts, summaries, and action items auto-generated.',
                'image'   => 'https://images.unsplash.com/photo-1522071820081-009f0129c71c?w=600&auto=format&fit=crop&q=80',
                'tag'     => 'Culture',
                'meta'    => 'Released June 2026',
            ],
        ];

        // ── Big editorial spotlight (alternating layout) ──────────────────
        $spotlights = [
            [
                'eyebrow' => 'Deep Dive',
                'title'   => 'How DostTech Cuts Time-to-Ship by 60%',
                'body'    => 'We rebuilt our CI/CD pipeline from the ground up. Here is exactly what changed, why it works, and how you can replicate it inside your own team — regardless of stack.',
                'image'   => 'https://images.unsplash.com/photo-1504384308090-c894fdcc538d?w=900&auto=format&fit=crop&q=80',
                'cta'     => 'Read the case study',
                'reverse' => false,
                'tag'     => 'Engineering',
            ],
            [
                'eyebrow' => 'Customer Story',
                'title'   => 'How Orbi Scaled to 1M Users Without Rewriting Their Core',
                'body'    => 'Orbi\'s engineering team used DostTech to progressively refactor a 5-year-old monolith into microservices — without a single major incident or missed sprint.',
                'image'   => 'https://images.unsplash.com/photo-1497366216548-37526070297c?w=900&auto=format&fit=crop&q=80',
                'cta'     => 'Read their story',
                'reverse' => true,
                'tag'     => 'Case Study',
            ],
        ];

        // ── Social proof ──────────────────────────────────────────────────
        $testimonials = [
            [
                'quote'   => 'DostTech is the first tool that actually kept up with how fast we move. Every feature feels like it was built for us.',
                'name'    => 'Alex Torres',
                'role'    => 'CTO, Nexus Co.',
                'avatar'  => 'https://i.pravatar.cc/80?img=8',
                'rating'  => 5,
            ],
            [
                'quote'   => 'The AI code review alone saved us three days of back-and-forth on our last sprint. Genuinely impressive.',
                'name'    => 'Maria Kim',
                'role'    => 'Lead Engineer, Orbi',
                'avatar'  => 'https://i.pravatar.cc/80?img=44',
                'rating'  => 5,
            ],
            [
                'quote'   => 'We deprecated four internal tools after adopting DostTech. The team is happier, the product is faster.',
                'name'    => 'Tom Hayes',
                'role'    => 'VP Engineering, BuildStack',
                'avatar'  => 'https://i.pravatar.cc/80?img=17',
                'rating'  => 5,
            ],
        ];

        // ── Comparison table ──────────────────────────────────────────────
        $comparison = [
            'headers' => ['Feature', 'DostTech', 'Competitor A', 'Competitor B'],
            'rows'    => [
                ['Workflow Automation',     true,  true,  false],
                ['Real-Time Dashboard',     true,  false, true ],
                ['AI Code Review',          true,  false, false],
                ['One-Click Deployments',   true,  true,  true ],
                ['Async Video Standups',    true,  false, false],
                ['Design Token Sync',       true,  false, false],
                ['SSO & Audit Logs',        true,  true,  true ],
                ['24/7 Dedicated Support',  true,  false, true ],
            ],
        ];

        // ── Newsletter / CTA ──────────────────────────────────────────────
        $cta = [
            'title'    => 'Get early access to every new feature',
            'subtitle' => 'We ship every two weeks. Join 4,200+ developers and designers who get the first look.',
            'image'    => 'https://images.unsplash.com/photo-1573164713712-03790a178651?w=1200&auto=format&fit=crop&q=80',
        ];

        return view('featured.index', compact(
            'hero', 'items', 'spotlights', 'testimonials', 'comparison', 'cta'
        ));
    }
}
