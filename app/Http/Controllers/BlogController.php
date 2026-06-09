<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BlogController extends Controller
{
    /**
     * All blog posts with static data.
     */
    private function posts(): array
    {
        return [
            [
                'id'       => 1,
                'title'    => 'Designing Systems That Scale: A Practical Guide',
                'excerpt'  => 'Learn how to architect your applications from day one so they can grow gracefully without painful rewrites.',
                'category' => 'Design',
                'author'   => 'Sarah Mitchell',
                'avatar'   => 'https://i.pravatar.cc/40?img=47',
                'date'     => 'May 28, 2026',
                'read'     => '6 min read',
                'image'    => 'https://images.unsplash.com/photo-1558655146-364adaf1fcc9?w=800&auto=format&fit=crop&q=80',
                'featured' => true,
            ],
            [
                'id'       => 2,
                'title'    => 'The State of JavaScript in 2026',
                'excerpt'  => 'From Signals to server components — a deep dive into what has changed and what it means for your next project.',
                'category' => 'Development',
                'author'   => 'Carlos Rivera',
                'avatar'   => 'https://i.pravatar.cc/40?img=15',
                'date'     => 'May 22, 2026',
                'read'     => '9 min read',
                'image'    => 'https://images.unsplash.com/photo-1555066931-4365d14bab8c?w=800&auto=format&fit=crop&q=80',
                'featured' => false,
            ],
            [
                'id'       => 3,
                'title'    => 'How We Cut Our Cloud Bill by 40%',
                'excerpt'  => 'Real numbers, real decisions. Here is exactly what we changed in our infrastructure to save thousands every month.',
                'category' => 'Infrastructure',
                'author'   => 'James Owens',
                'avatar'   => 'https://i.pravatar.cc/40?img=12',
                'date'     => 'May 15, 2026',
                'read'     => '7 min read',
                'image'    => 'https://images.unsplash.com/photo-1451187580459-43490279c0fa?w=800&auto=format&fit=crop&q=80',
                'featured' => false,
            ],
            [
                'id'       => 4,
                'title'    => 'Building a Design System from Scratch',
                'excerpt'  => 'Tokens, components, documentation — everything you need to ship a consistent product at any team size.',
                'category' => 'Design',
                'author'   => 'Priya Sharma',
                'avatar'   => 'https://i.pravatar.cc/40?img=32',
                'date'     => 'May 10, 2026',
                'read'     => '8 min read',
                'image'    => 'https://images.unsplash.com/photo-1561070791-2526d30994b5?w=800&auto=format&fit=crop&q=80',
                'featured' => false,
            ],
            [
                'id'       => 5,
                'title'    => 'Laravel 12: What\'s New and Why It Matters',
                'excerpt'  => 'A hands-on walkthrough of the most impactful features in the latest Laravel release, with code examples.',
                'category' => 'Development',
                'author'   => 'Carlos Rivera',
                'avatar'   => 'https://i.pravatar.cc/40?img=15',
                'date'     => 'May 4, 2026',
                'read'     => '5 min read',
                'image'    => 'https://images.unsplash.com/photo-1607798748738-b15c40d33d57?w=800&auto=format&fit=crop&q=80',
                'featured' => false,
            ],
            [
                'id'       => 6,
                'title'    => 'Remote Team Culture: Lessons After 3 Years',
                'excerpt'  => 'What we got right, what we got wrong, and the rituals that actually keep a distributed team close.',
                'category' => 'Culture',
                'author'   => 'Sarah Mitchell',
                'avatar'   => 'https://i.pravatar.cc/40?img=47',
                'date'     => 'Apr 28, 2026',
                'read'     => '6 min read',
                'image'    => 'https://images.unsplash.com/photo-1522071820081-009f0129c71c?w=800&auto=format&fit=crop&q=80',
                'featured' => false,
            ],
            [
                'id'       => 7,
                'title'    => 'Postgres Full-Text Search: Better Than You Think',
                'excerpt'  => 'Skip Elasticsearch for most use cases. Here is how to get powerful search from the database you already have.',
                'category' => 'Infrastructure',
                'author'   => 'James Owens',
                'avatar'   => 'https://i.pravatar.cc/40?img=12',
                'date'     => 'Apr 20, 2026',
                'read'     => '10 min read',
                'image'    => 'https://images.unsplash.com/photo-1544383835-bda2bc66a55d?w=800&auto=format&fit=crop&q=80',
                'featured' => false,
            ],
            [
                'id'       => 8,
                'title'    => 'The UX of Error Messages',
                'excerpt'  => 'Most error messages are written for developers, not users. Here is how to write ones that actually help people.',
                'category' => 'Design',
                'author'   => 'Priya Sharma',
                'avatar'   => 'https://i.pravatar.cc/40?img=32',
                'date'     => 'Apr 14, 2026',
                'read'     => '4 min read',
                'image'    => 'https://images.unsplash.com/photo-1587620962725-abab7fe55159?w=800&auto=format&fit=crop&q=80',
                'featured' => false,
            ],
            [
                'id'       => 9,
                'title'    => 'Product-Led Growth: A Practical Playbook',
                'excerpt'  => 'How to let your product do the selling. The frameworks, metrics, and mindset shifts that make PLG work.',
                'category' => 'Culture',
                'author'   => 'Sarah Mitchell',
                'avatar'   => 'https://i.pravatar.cc/40?img=47',
                'date'     => 'Apr 7, 2026',
                'read'     => '7 min read',
                'image'    => 'https://images.unsplash.com/photo-1460925895917-afdab827c52f?w=800&auto=format&fit=crop&q=80',
                'featured' => false,
            ],
        ];
    }

    /**
     * Display the blog listing page.
     */
    public function index(Request $request)
    {
        $posts      = $this->posts();
        $categories = ['All', 'Design', 'Development', 'Infrastructure', 'Culture'];
        $active     = $request->query('category', 'All');
        $search     = $request->query('search', '');

        // Filter by category
        if ($active !== 'All') {
            $posts = array_filter($posts, fn($p) => $p['category'] === $active);
        }

        // Filter by search term
        if ($search !== '') {
            $term  = strtolower($search);
            $posts = array_filter($posts, fn($p) =>
                str_contains(strtolower($p['title']), $term) ||
                str_contains(strtolower($p['excerpt']), $term)
            );
        }

        // Separate featured post (only on unfiltered "All" view with no search)
        $featured = null;
        if ($active === 'All' && $search === '') {
            $featured = array_shift($posts);
        }

        return view('blog.index', compact('posts', 'categories', 'active', 'search', 'featured'));
    }
}
