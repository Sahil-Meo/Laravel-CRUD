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
     * Show the create post form.
     */
    public function create()
    {
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
