<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    /** Categories used across create form and filter toolbar. */
    private const CATEGORIES = ['Design', 'Development', 'Infrastructure', 'Culture'];

    /**
     * Display the blog listing page.
     * Posts from DB are merged with static seed posts for display.
     */
    public function index(Request $request)
    {
        $categories = array_merge(['All'], self::CATEGORIES);
        $active     = $request->query('category', 'All');
        $search     = $request->query('search', '');

        // ── Static seed posts (always shown as the base catalogue) ──────────
        $staticPosts = [
            [
                'id'          => 's1',
                'title'       => 'Designing Systems That Scale: A Practical Guide',
                'description' => 'Learn how to architect your applications from day one so they can grow gracefully without painful rewrites.',
                'category'    => 'Design',
                'author'      => 'Sarah Mitchell',
                'avatar'      => 'https://i.pravatar.cc/40?img=47',
                'created_at'  => 'May 28, 2026',
                'read'        => '6 min read',
                'image_url'   => 'https://images.unsplash.com/photo-1558655146-364adaf1fcc9?w=800&auto=format&fit=crop&q=80',
                'featured'    => true,
                'source'      => 'static',
            ],
            [
                'id'          => 's2',
                'title'       => 'The State of JavaScript in 2026',
                'description' => 'From Signals to server components — a deep dive into what has changed and what it means for your next project.',
                'category'    => 'Development',
                'author'      => 'Carlos Rivera',
                'avatar'      => 'https://i.pravatar.cc/40?img=15',
                'created_at'  => 'May 22, 2026',
                'read'        => '9 min read',
                'image_url'   => 'https://images.unsplash.com/photo-1555066931-4365d14bab8c?w=800&auto=format&fit=crop&q=80',
                'featured'    => false,
                'source'      => 'static',
            ],
            [
                'id'          => 's3',
                'title'       => 'How We Cut Our Cloud Bill by 40%',
                'description' => 'Real numbers, real decisions. Here is exactly what we changed in our infrastructure to save thousands every month.',
                'category'    => 'Infrastructure',
                'author'      => 'James Owens',
                'avatar'      => 'https://i.pravatar.cc/40?img=12',
                'created_at'  => 'May 15, 2026',
                'read'        => '7 min read',
                'image_url'   => 'https://images.unsplash.com/photo-1451187580459-43490279c0fa?w=800&auto=format&fit=crop&q=80',
                'featured'    => false,
                'source'      => 'static',
            ],
            [
                'id'          => 's4',
                'title'       => 'Building a Design System from Scratch',
                'description' => 'Tokens, components, documentation — everything you need to ship a consistent product at any team size.',
                'category'    => 'Design',
                'author'      => 'Priya Sharma',
                'avatar'      => 'https://i.pravatar.cc/40?img=32',
                'created_at'  => 'May 10, 2026',
                'read'        => '8 min read',
                'image_url'   => 'https://images.unsplash.com/photo-1561070791-2526d30994b5?w=800&auto=format&fit=crop&q=80',
                'featured'    => false,
                'source'      => 'static',
            ],
            [
                'id'          => 's5',
                'title'       => "Laravel 12: What's New and Why It Matters",
                'description' => 'A hands-on walkthrough of the most impactful features in the latest Laravel release, with code examples.',
                'category'    => 'Development',
                'author'      => 'Carlos Rivera',
                'avatar'      => 'https://i.pravatar.cc/40?img=15',
                'created_at'  => 'May 4, 2026',
                'read'        => '5 min read',
                'image_url'   => 'https://images.unsplash.com/photo-1607798748738-b15c40d33d57?w=800&auto=format&fit=crop&q=80',
                'featured'    => false,
                'source'      => 'static',
            ],
            [
                'id'          => 's6',
                'title'       => 'Remote Team Culture: Lessons After 3 Years',
                'description' => 'What we got right, what we got wrong, and the rituals that actually keep a distributed team close.',
                'category'    => 'Culture',
                'author'      => 'Sarah Mitchell',
                'avatar'      => 'https://i.pravatar.cc/40?img=47',
                'created_at'  => 'Apr 28, 2026',
                'read'        => '6 min read',
                'image_url'   => 'https://images.unsplash.com/photo-1522071820081-009f0129c71c?w=800&auto=format&fit=crop&q=80',
                'featured'    => false,
                'source'      => 'static',
            ],
            [
                'id'          => 's7',
                'title'       => 'Postgres Full-Text Search: Better Than You Think',
                'description' => 'Skip Elasticsearch for most use cases. Here is how to get powerful search from the database you already have.',
                'category'    => 'Infrastructure',
                'author'      => 'James Owens',
                'avatar'      => 'https://i.pravatar.cc/40?img=12',
                'created_at'  => 'Apr 20, 2026',
                'read'        => '10 min read',
                'image_url'   => 'https://images.unsplash.com/photo-1544383835-bda2bc66a55d?w=800&auto=format&fit=crop&q=80',
                'featured'    => false,
                'source'      => 'static',
            ],
            [
                'id'          => 's8',
                'title'       => 'The UX of Error Messages',
                'description' => 'Most error messages are written for developers, not users. Here is how to write ones that actually help people.',
                'category'    => 'Design',
                'author'      => 'Priya Sharma',
                'avatar'      => 'https://i.pravatar.cc/40?img=32',
                'created_at'  => 'Apr 14, 2026',
                'read'        => '4 min read',
                'image_url'   => 'https://images.unsplash.com/photo-1587620962725-abab7fe55159?w=800&auto=format&fit=crop&q=80',
                'featured'    => false,
                'source'      => 'static',
            ],
            [
                'id'          => 's9',
                'title'       => 'Product-Led Growth: A Practical Playbook',
                'description' => 'How to let your product do the selling. The frameworks, metrics, and mindset shifts that make PLG work.',
                'category'    => 'Culture',
                'author'      => 'Sarah Mitchell',
                'avatar'      => 'https://i.pravatar.cc/40?img=47',
                'created_at'  => 'Apr 7, 2026',
                'read'        => '7 min read',
                'image_url'   => 'https://images.unsplash.com/photo-1460925895917-afdab827c52f?w=800&auto=format&fit=crop&q=80',
                'featured'    => false,
                'source'      => 'static',
            ],
        ];

        // ── Real posts from the database ─────────────────────────────────────
        $dbQuery = Post::latest();

        if ($active !== 'All') {
            $dbQuery->where('category', $active);
        }

        if ($search !== '') {
            $dbQuery->where(function ($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                  ->orWhere('description', 'like', "%{$search}%");
            });
        }

        $dbPosts = $dbQuery->get()->map(fn($p) => [
            'id'          => $p->id,
            'title'       => $p->title,
            'description' => $p->description,
            'category'    => $p->category,
            'author'      => 'You',
            'avatar'      => 'https://i.pravatar.cc/40?img=0',
            'created_at'  => $p->created_at->format('M j, Y'),
            'read'        => '3 min read',
            'image_url'   => $p->image_url,
            'featured'    => false,
            'source'      => 'db',
        ])->toArray();

        // ── Apply filters to static posts ────────────────────────────────────
        $filtered = $staticPosts;

        if ($active !== 'All') {
            $filtered = array_filter($filtered, fn($p) => $p['category'] === $active);
        }

        if ($search !== '') {
            $term     = strtolower($search);
            $filtered = array_filter($filtered, fn($p) =>
                str_contains(strtolower($p['title']), $term) ||
                str_contains(strtolower($p['description']), $term)
            );
        }

        // DB posts appear first (newest first), then static ones
        $posts = array_merge($dbPosts, array_values($filtered));

        // Featured post — only on the default unfiltered view
        $featured = null;
        if ($active === 'All' && $search === '' && count($posts) > 0) {
            // Prefer a static featured post at the top
            foreach ($posts as $k => $p) {
                if (!empty($p['featured'])) {
                    $featured = $p;
                    unset($posts[$k]);
                    $posts = array_values($posts);
                    break;
                }
            }
        }

        return view('blog.index', compact('posts', 'categories', 'active', 'search', 'featured'));
    }

    /**
     * Show a single blog post.
     * Looks in DB first, then falls back to static seed posts.
     */
    public function show(string $id)
    {
        // ── All static posts ─────────────────────────────────────────────────
        $staticPosts = $this->staticPosts();

        // ── Try DB first ─────────────────────────────────────────────────────
        if (!str_starts_with($id, 's')) {
            $dbPost = Post::find($id);
            if ($dbPost) {
                $post = [
                    'id'          => $dbPost->id,
                    'title'       => $dbPost->title,
                    'description' => $dbPost->description,
                    'category'    => $dbPost->category,
                    'author'      => 'You',
                    'avatar'      => 'https://i.pravatar.cc/80?img=0',
                    'created_at'  => $dbPost->created_at->format('F j, Y'),
                    'read'        => '3 min read',
                    'image_url'   => $dbPost->image_url,
                    'featured'    => false,
                    'source'      => 'db',
                    'content'     => $dbPost->description,
                    'tags'        => [$dbPost->category],
                ];
                $related = array_slice(array_filter($staticPosts, fn($p) =>
                    $p['category'] === $dbPost->category
                ), 0, 3);
                return view('blog.show', compact('post', 'related', 'staticPosts'));
            }
        }

        // ── Fall back to static post ─────────────────────────────────────────
        $post = collect($staticPosts)->firstWhere('id', $id);
        if (!$post) {
            abort(404);
        }

        $related = array_slice(array_filter($staticPosts, fn($p) =>
            $p['category'] === $post['category'] && $p['id'] !== $post['id']
        ), 0, 3);

        return view('blog.show', compact('post', 'related', 'staticPosts'));
    }

    /** Extract static posts as a reusable method. */
    private function staticPosts(): array
    {
        return [
            [
                'id'          => 's1',
                'title'       => 'Designing Systems That Scale: A Practical Guide',
                'description' => 'Learn how to architect your applications from day one so they can grow gracefully without painful rewrites.',
                'category'    => 'Design',
                'author'      => 'Sarah Mitchell',
                'avatar'      => 'https://i.pravatar.cc/80?img=47',
                'created_at'  => 'May 28, 2026',
                'read'        => '6 min read',
                'image_url'   => 'https://images.unsplash.com/photo-1558655146-364adaf1fcc9?w=1200&auto=format&fit=crop&q=80',
                'featured'    => true,
                'source'      => 'static',
                'tags'        => ['Design', 'Architecture', 'Scalability'],
                'content'     => '<p>Building software that scales isn\'t just about picking the right database or framework — it\'s about making a series of small, deliberate decisions from day one that compound over time.</p><h2>Start with your domain, not your tech stack</h2><p>The biggest mistake teams make is reaching for infrastructure before they understand their domain. Before you write a single line of code, map out the core concepts of your product. What are the entities? What are the relationships? What are the invariants that must always be true?</p><p>When you start from domain understanding, your code structure naturally reflects the problem you\'re solving — not the framework you happened to pick up.</p><h2>Embrace boring technology</h2><p>Every technology choice is a future maintenance burden. Prefer proven, boring tools over exciting new ones unless you have a compelling, specific reason. PostgreSQL, Redis, and a well-structured monolith will take you further than most teams think.</p><blockquote>The most scalable system is the one your team can reason about at 2am when something breaks.</blockquote><h2>Design for change, not perfection</h2><p>Your requirements will change. Your understanding of the problem will deepen. Design your system so that the most likely changes are the easiest to make. This means clear module boundaries, dependency injection, and avoiding premature abstraction.</p><p>Good architecture isn\'t about making everything flexible — it\'s about identifying what will change and protecting the things that won\'t.</p><h2>Measure before you optimise</h2><p>Performance optimisation without measurement is guesswork. Instrument your application from day one with meaningful metrics. Know your p95 latency. Know your slow queries. Know where your users are dropping off.</p><p>When a problem appears, you want data, not intuition.</p>',
            ],
            [
                'id'          => 's2',
                'title'       => 'The State of JavaScript in 2026',
                'description' => 'From Signals to server components — a deep dive into what has changed and what it means for your next project.',
                'category'    => 'Development',
                'author'      => 'Carlos Rivera',
                'avatar'      => 'https://i.pravatar.cc/80?img=15',
                'created_at'  => 'May 22, 2026',
                'read'        => '9 min read',
                'image_url'   => 'https://images.unsplash.com/photo-1555066931-4365d14bab8c?w=1200&auto=format&fit=crop&q=80',
                'featured'    => false,
                'source'      => 'static',
                'tags'        => ['JavaScript', 'Development', 'Frontend'],
                'content'     => '<p>JavaScript in 2026 looks remarkably different from even three years ago. Signals have gone mainstream, server components are production-ready in multiple frameworks, and the runtime wars have settled into a surprisingly healthy ecosystem.</p><h2>Signals are now the default mental model</h2><p>The reactive programming model pioneered by SolidJS and later adopted by Angular, Preact, and others has fundamentally changed how we think about UI state. Instead of virtual DOM diffing, we now think in terms of reactive values that automatically propagate changes to exactly the parts of the UI that depend on them.</p><p>This shift has real performance implications. Apps that used to require manual memoisation now stay fast by default.</p><h2>Server components have matured</h2><p>After years of experimentation, the mental model for server components has finally clicked for most developers. The key insight — that components can run on the server without client-side JavaScript while still composing with interactive client components — has unlocked a genuinely new approach to building web applications.</p><blockquote>The framework wars are over. We won. Now we can focus on building things.</blockquote><h2>TypeScript is table stakes</h2><p>If you\'re starting a new project without TypeScript in 2026, you need a very compelling reason. The tooling, the type inference, and the developer experience have all improved dramatically. Types are no longer a tax — they\'re a productivity multiplier.</p>',
            ],
            [
                'id'          => 's3',
                'title'       => 'How We Cut Our Cloud Bill by 40%',
                'description' => 'Real numbers, real decisions. Here is exactly what we changed in our infrastructure to save thousands every month.',
                'category'    => 'Infrastructure',
                'author'      => 'James Owens',
                'avatar'      => 'https://i.pravatar.cc/80?img=12',
                'created_at'  => 'May 15, 2026',
                'read'        => '7 min read',
                'image_url'   => 'https://images.unsplash.com/photo-1451187580459-43490279c0fa?w=1200&auto=format&fit=crop&q=80',
                'featured'    => false,
                'source'      => 'static',
                'tags'        => ['Infrastructure', 'AWS', 'Cost Optimisation'],
                'content'     => '<p>Last quarter we reduced our AWS bill from $47,000/month to $28,000/month without degrading performance. Here\'s exactly what we did, in the order we did it.</p><h2>Right-size your instances first</h2><p>The single highest-impact change was reviewing every EC2 instance we were running and asking whether it was actually using the resources it was paying for. The answer, in most cases, was no.</p><p>We used AWS Compute Optimizer recommendations as a starting point, but the real work was understanding our actual traffic patterns. Most of our services had 4x more compute than they needed outside of peak hours.</p><h2>Reserved instances for predictable workloads</h2><p>After right-sizing, we identified the workloads with predictable, steady-state traffic and converted them to Reserved Instances. The 1-year commitment saved us 35% on those services immediately.</p><blockquote>The cloud is not expensive. Running the wrong size instances 24/7 is expensive.</blockquote><h2>S3 intelligent tiering</h2><p>We had years of data sitting in S3 Standard that hadn\'t been accessed in months. Moving it to S3 Intelligent-Tiering automatically moves data between access tiers based on usage patterns. This change alone saved $800/month.</p><h2>Kill your idle resources</h2><p>We found 23 unused Elastic IPs, 8 unattached EBS volumes, and 3 forgotten RDS snapshots from 2023. Cleaning these up was free money — $400/month with zero effort.</p>',
            ],
            [
                'id'          => 's4',
                'title'       => 'Building a Design System from Scratch',
                'description' => 'Tokens, components, documentation — everything you need to ship a consistent product at any team size.',
                'category'    => 'Design',
                'author'      => 'Priya Sharma',
                'avatar'      => 'https://i.pravatar.cc/80?img=32',
                'created_at'  => 'May 10, 2026',
                'read'        => '8 min read',
                'image_url'   => 'https://images.unsplash.com/photo-1561070791-2526d30994b5?w=1200&auto=format&fit=crop&q=80',
                'featured'    => false,
                'source'      => 'static',
                'tags'        => ['Design', 'Design Systems', 'UI'],
                'content'     => '<p>A design system is not a component library. A design system is not a style guide. A design system is the shared language that allows designers and engineers to build consistent, high-quality products efficiently at scale.</p><h2>Start with decisions, not components</h2><p>The biggest mistake teams make when building a design system is starting with components. Components are the output of decisions. Start with the decisions: What are your spacing values? What is your type scale? What are your colour semantics?</p><p>These foundational decisions — often called design tokens — are the bedrock of everything that follows. Get them right and the rest becomes systematic.</p><h2>Design tokens done right</h2><p>Tokens have three layers: global (raw values like #149696), semantic (functional names like color.brand.primary), and component (scoped usage like button.background.primary). Most teams only build the global layer and wonder why their system doesn\'t scale.</p><blockquote>A design token is not a variable. It is a decision with a name, a value, and a reason.</blockquote><h2>Documentation is the product</h2><p>The best component library in the world is useless without documentation that explains when to use each component, what the variants mean, and what the accessible alternative is when the primary component doesn\'t fit the use case.</p>',
            ],
            [
                'id'          => 's5',
                'title'       => "Laravel 12: What's New and Why It Matters",
                'description' => 'A hands-on walkthrough of the most impactful features in the latest Laravel release, with code examples.',
                'category'    => 'Development',
                'author'      => 'Carlos Rivera',
                'avatar'      => 'https://i.pravatar.cc/80?img=15',
                'created_at'  => 'May 4, 2026',
                'read'        => '5 min read',
                'image_url'   => 'https://images.unsplash.com/photo-1607798748738-b15c40d33d57?w=1200&auto=format&fit=crop&q=80',
                'featured'    => false,
                'source'      => 'static',
                'tags'        => ['Laravel', 'PHP', 'Backend'],
                'content'     => '<p>Laravel 12 shipped quietly but the feature set is anything but quiet. After a year of incremental improvements, version 12 brings several changes that will meaningfully improve the day-to-day experience of Laravel developers.</p><h2>Native attribute casting on Eloquent models</h2><p>The new PHP 8.3 attribute-based casting syntax is now first-class in Laravel 12. Instead of overriding the $casts property, you can now annotate model properties directly. The result is cleaner, more IDE-friendly model definitions.</p><h2>Improved query builder type inference</h2><p>The query builder now returns typed collections and the IDE plugins have been updated to reflect this. If you\'re using PHPStan or Psalm, you\'ll notice significantly fewer type errors in database code.</p><blockquote>Laravel\'s greatest strength has always been making the right thing the easy thing.</blockquote><h2>First-party rate limiting improvements</h2><p>The rate limiting API received a significant overhaul with support for sliding window algorithms, per-user dynamic limits, and graceful degradation when the rate limit store is unavailable.</p>',
            ],
            [
                'id'          => 's6',
                'title'       => 'Remote Team Culture: Lessons After 3 Years',
                'description' => 'What we got right, what we got wrong, and the rituals that actually keep a distributed team close.',
                'category'    => 'Culture',
                'author'      => 'Sarah Mitchell',
                'avatar'      => 'https://i.pravatar.cc/80?img=47',
                'created_at'  => 'Apr 28, 2026',
                'read'        => '6 min read',
                'image_url'   => 'https://images.unsplash.com/photo-1522071820081-009f0129c71c?w=1200&auto=format&fit=crop&q=80',
                'featured'    => false,
                'source'      => 'static',
                'tags'        => ['Culture', 'Remote Work', 'Teams'],
                'content'     => '<p>Three years ago we went fully remote. Not hybrid, not flexible — fully distributed across 11 time zones. Here is what we learned, honestly.</p><h2>The things that worked</h2><p>Async-first communication was the best decision we made. By defaulting to written, asynchronous communication, we forced ourselves to think more clearly, document more thoroughly, and respect each other\'s time and focus.</p><p>Weekly team updates — written, not video — became our most-read internal content. People read them on their own schedule, leave reactions, and reference them later.</p><h2>The things that failed</h2><p>Fully async doesn\'t mean zero synchronous time. We tried to eliminate all recurring meetings and the result was a team that felt disconnected and uncertain about direction. Some synchronous time is essential, especially for ambiguous problems and relationship-building.</p><blockquote>Remote work doesn\'t fail because of distance. It fails because of unclear expectations and poor written communication culture.</blockquote><h2>The rituals that actually stuck</h2><p>Three rituals survived every reorganisation and culture reset: weekly written updates, monthly virtual social hours with zero agenda, and a public wins channel where anyone can celebrate anything, no matter how small.</p>',
            ],
        ];
    }

    /**
     * Show the create post form.
     */
    public function create()    {
        $categories = self::CATEGORIES;

        return view('blog.create', compact('categories'));
    }

    /**
     * Validate and persist a new post to the database.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title'       => ['required', 'string', 'min:5', 'max:150'],
            'image_url'   => ['required', 'url', 'max:500'],
            'category'    => ['required', 'in:Design,Development,Infrastructure,Culture'],
            'description' => ['required', 'string', 'min:10', 'max:500'],
        ], [
            'title.required'       => 'A post title is required.',
            'title.min'            => 'The title must be at least 5 characters.',
            'image_url.required'   => 'An image URL is required.',
            'image_url.url'        => 'Please enter a valid URL (including https://).',
            'category.required'    => 'Please select a category.',
            'category.in'          => 'Please choose a valid category.',
            'description.required' => 'A short description is required.',
            'description.min'      => 'The description must be at least 10 characters.',
            'description.max'      => 'Keep the description under 500 characters.',
        ]);

        // Persist to the database
        Post::create($validated);

        return redirect()->route('blog.index')
                         ->with('success', 'Your post "' . $validated['title'] . '" was published successfully!');
    }
}
