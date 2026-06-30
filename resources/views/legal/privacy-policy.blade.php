@extends('layouts.app')

@section('title', 'Privacy Policy')

@push('styles')
<style>
.policy-prose h2 {
    font-size: 1.25rem; font-weight: 800; color: #111827;
    margin: 2.5rem 0 0.75rem; padding-top: 0.25rem;
}
.policy-prose h3 {
    font-size: 1.0625rem; font-weight: 700; color: #1f2937;
    margin: 1.75rem 0 0.5rem;
}
.policy-prose p {
    color: #4b5563; line-height: 1.8; margin-bottom: 1rem;
    font-size: 0.9375rem;
}
.policy-prose ul {
    list-style: none; padding: 0; margin-bottom: 1rem;
}
.policy-prose ul li {
    display: flex; align-items: flex-start; gap: 0.625rem;
    color: #4b5563; font-size: 0.9375rem;
    line-height: 1.8; margin-bottom: 0.35rem;
}
.policy-prose ul li::before {
    content: ""; display: block; width: 6px; height: 6px;
    background: #149696; border-radius: 50%; margin-top: 0.6rem; flex-shrink: 0;
}
.policy-prose a { color: #149696; text-decoration: underline; text-underline-offset: 3px; }
.policy-prose strong { color: #111827; font-weight: 700; }
.toc-link { transition: color 0.15s; }
.toc-link:hover { color: #149696; }
</style>
@endpush

@section('content')

{{-- ── HERO ── --}}
<section class="relative pt-32 pb-16 bg-gradient-to-br from-gray-950 via-gray-900 to-[#0a4f4f] overflow-hidden">
    <div class="absolute inset-0 opacity-10">
        <div class="absolute top-0 left-1/3 w-96 h-96 rounded-full bg-[#149696] blur-3xl"></div>
        <div class="absolute bottom-0 right-1/4 w-72 h-72 rounded-full bg-teal-400 blur-3xl"></div>
    </div>
    <div class="relative max-w-4xl mx-auto px-6 text-center">
        <span class="inline-flex items-center gap-2 bg-[#149696]/20 text-[#4dd4d4]
                     border border-[#149696]/30 text-xs font-bold px-3 py-1.5 rounded-full
                     uppercase tracking-widest mb-6">
            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round"
                      d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
            </svg>
            Legal &amp; Privacy
        </span>
        <h1 class="text-4xl lg:text-5xl font-extrabold text-white mb-4">Privacy Policy</h1>
        <p class="text-gray-300 text-lg max-w-xl mx-auto mb-6">
            We care deeply about your privacy. This policy explains how PostPulse
            collects, uses, and protects your personal data.
        </p>
        <div class="flex flex-wrap justify-center gap-4 text-sm text-gray-400">
            <span class="flex items-center gap-1.5">
                <svg class="w-4 h-4 text-[#149696]" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                </svg>
                Last updated: 1 June 2026
            </span>
            <span class="flex items-center gap-1.5">
                <svg class="w-4 h-4 text-[#149696]" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
                ~12 minute read
            </span>
        </div>
    </div>
</section>

{{-- ── MAIN: Sidebar TOC + Article ── --}}
<section class="py-16 bg-white">
    <div class="max-w-7xl mx-auto px-6">
        <div class="grid lg:grid-cols-[260px_1fr] gap-12 items-start">

            {{-- ── Sticky Table of Contents (desktop) ── --}}
            <aside class="hidden lg:block">
                <div class="sticky top-24 bg-gray-50 rounded-2xl border border-gray-100 p-6">
                    <p class="text-xs font-bold uppercase tracking-widest text-gray-500 mb-4">
                        On this page
                    </p>
                    <nav class="space-y-1.5 text-sm">
                        @foreach ([
                            ['href' => '#overview',       'label' => '1. Overview'],
                            ['href' => '#information',    'label' => '2. Information We Collect'],
                            ['href' => '#how-we-use',     'label' => '3. How We Use Your Data'],
                            ['href' => '#sharing',        'label' => '4. Sharing Your Data'],
                            ['href' => '#cookies',        'label' => '5. Cookies &amp; Tracking'],
                            ['href' => '#retention',      'label' => '6. Data Retention'],
                            ['href' => '#security',       'label' => '7. Security'],
                            ['href' => '#rights',         'label' => '8. Your Rights (GDPR)'],
                            ['href' => '#children',       'label' => '9. Children\'s Privacy'],
                            ['href' => '#international',  'label' => '10. International Transfers'],
                            ['href' => '#changes',        'label' => '11. Policy Changes'],
                            ['href' => '#contact-us',     'label' => '12. Contact Us'],
                        ] as $toc)
                        <a href="{{ $toc['href'] }}"
                           class="toc-link block text-gray-600 py-1 pl-3 border-l-2 border-transparent
                                  hover:border-[#149696] hover:text-[#149696] transition-all">
                            {!! $toc['label'] !!}
                        </a>
                        @endforeach
                    </nav>
                </div>
            </aside>

            {{-- ── Article body ── --}}
            <div class="policy-prose max-w-none">

                {{-- SECTION 1 --}}
                <div id="overview" class="scroll-mt-28">
                    <div class="inline-flex items-center gap-2 bg-[#e6f7f7] text-[#149696]
                                text-xs font-bold px-3 py-1.5 rounded-full mb-4">
                        Section 1
                    </div>
                    <h2>Overview</h2>
                    <p>PostPulse Ltd ("PostPulse", "we", "our", or "us") is committed to protecting your personal information and your right to privacy. This Privacy Policy explains how we collect, use, disclose, and safeguard your information when you visit our website <a href="{{ url('/') }}">postpulse.io</a> and use our services.</p>
                    <p>By using PostPulse, you agree to the collection and use of information in accordance with this policy. If you do not agree, please discontinue use of our services.</p>
                    <p><strong>Data Controller:</strong> PostPulse Ltd, 12 Talent Square, Floor 4, London EC2A 4NE, United Kingdom. Registered in England and Wales, Company No. 13456789.</p>
                </div>

                {{-- SECTION 2 --}}
                <div id="information" class="scroll-mt-28">
                    <div class="inline-flex items-center gap-2 bg-[#e6f7f7] text-[#149696]
                                text-xs font-bold px-3 py-1.5 rounded-full mb-4">
                        Section 2
                    </div>
                    <h2>Information We Collect</h2>
                    <h3>Information you provide directly</h3>
                    <ul>
                        <li>Account registration data (name, email address, password)</li>
                        <li>Profile information (professional title, location, skills, work history, education)</li>
                        <li>Uploaded documents (CV/resume, cover letters, portfolio files)</li>
                        <li>Contact form submissions and support correspondence</li>
                        <li>Payment information (processed securely by Stripe — we do not store card numbers)</li>
                        <li>Job application data including responses to employer questions</li>
                    </ul>
                    <h3>Information collected automatically</h3>
                    <ul>
                        <li>Log data (IP address, browser type, pages visited, timestamps)</li>
                        <li>Device information (operating system, screen resolution, hardware model)</li>
                        <li>Usage analytics (click patterns, search queries, features used)</li>
                        <li>Cookies and similar tracking technologies (see Section 5)</li>
                        <li>Approximate geolocation derived from IP address</li>
                    </ul>
                    <h3>Information from third parties</h3>
                    <ul>
                        <li>LinkedIn profile data if you connect your LinkedIn account</li>
                        <li>OAuth authentication data from Google Sign-In</li>
                        <li>Fraud prevention and identity verification providers</li>
                    </ul>
                </div>

                {{-- SECTION 3 --}}
                <div id="how-we-use" class="scroll-mt-28">
                    <div class="inline-flex items-center gap-2 bg-[#e6f7f7] text-[#149696]
                                text-xs font-bold px-3 py-1.5 rounded-full mb-4">Section 3</div>
                    <h2>How We Use Your Data</h2>
                    <p>We use your personal data only where we have a lawful basis to do so. Our purposes and legal bases are:</p>
                    <div class="overflow-x-auto rounded-2xl border border-gray-100 shadow-sm my-6">
                        <table class="w-full text-sm">
                            <thead class="bg-gray-50 border-b border-gray-100">
                                <tr>
                                    <th class="text-left px-5 py-3 font-semibold text-gray-700">Purpose</th>
                                    <th class="text-left px-5 py-3 font-semibold text-gray-700">Legal Basis</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-50">
                                @foreach ([
                                    ['Providing and operating the PostPulse platform',         'Contract performance'],
                                    ['Creating and managing your account',                     'Contract performance'],
                                    ['Matching candidates with relevant job opportunities',    'Contract / Legitimate interests'],
                                    ['Processing payments for paid plans',                    'Contract performance'],
                                    ['Sending transactional emails (alerts, confirmations)',  'Contract performance'],
                                    ['Sending marketing communications (opt-in only)',        'Consent'],
                                    ['Improving and personalising our services',              'Legitimate interests'],
                                    ['Fraud prevention and platform security',                'Legitimate interests / Legal obligation'],
                                    ['Complying with legal obligations',                      'Legal obligation'],
                                    ['Analytics and product research',                        'Legitimate interests'],
                                ] as [$purpose, $basis])
                                <tr class="hover:bg-gray-50/60 transition-colors">
                                    <td class="px-5 py-3 text-gray-700">{{ $purpose }}</td>
                                    <td class="px-5 py-3">
                                        <span class="text-xs font-semibold bg-[#e6f7f7] text-[#149696] px-2.5 py-1 rounded-full">
                                            {{ $basis }}
                                        </span>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <p>We will never sell your personal data to third parties for their own marketing purposes.</p>
                </div>

                {{-- SECTION 4 --}}
                <div id="sharing" class="scroll-mt-28">
                    <div class="inline-flex items-center gap-2 bg-[#e6f7f7] text-[#149696]
                                text-xs font-bold px-3 py-1.5 rounded-full mb-4">Section 4</div>
                    <h2>Sharing Your Data</h2>
                    <p>We share your information only in the following circumstances:</p>
                    <h3>With employers (job seekers)</h3>
                    <p>When you apply for a job or make your profile visible to employers, the employer can see the profile information you have chosen to display. You control your visibility settings at all times from your dashboard.</p>
                    <h3>With service providers</h3>
                    <ul>
                        <li><strong>Stripe</strong> — payment processing</li>
                        <li><strong>Amazon Web Services</strong> — cloud infrastructure and file storage</li>
                        <li><strong>Postmark</strong> — transactional email delivery</li>
                        <li><strong>Google Analytics</strong> — aggregated usage analytics (anonymised)</li>
                        <li><strong>Intercom</strong> — customer support and live chat</li>
                    </ul>
                    <p>All service providers are contractually bound to process your data only on our instructions and to maintain appropriate security measures.</p>
                    <h3>Legal requirements</h3>
                    <p>We may disclose your data where required by law, court order, or governmental authority, or where necessary to protect the rights, property, or safety of PostPulse, our users, or the public.</p>
                    <h3>Business transfers</h3>
                    <p>In the event of a merger, acquisition, or sale of assets, your data may be transferred as part of that transaction. We will notify you before your data becomes subject to a different privacy policy.</p>
                </div>

                {{-- SECTION 5 --}}
                <div id="cookies" class="scroll-mt-28">
                    <div class="inline-flex items-center gap-2 bg-[#e6f7f7] text-[#149696]
                                text-xs font-bold px-3 py-1.5 rounded-full mb-4">Section 5</div>
                    <h2>Cookies &amp; Tracking Technologies</h2>
                    <p>We use cookies and similar technologies to enhance your experience on PostPulse. A cookie is a small text file placed on your device when you visit our site.</p>
                    <h3>Types of cookies we use</h3>
                    <ul>
                        <li><strong>Essential cookies</strong> — required for the platform to function (authentication sessions, CSRF protection). Cannot be disabled.</li>
                        <li><strong>Preference cookies</strong> — remember your settings such as language and notification preferences.</li>
                        <li><strong>Analytics cookies</strong> — help us understand how visitors interact with PostPulse (page views, session duration, bounce rate). Data is anonymised where possible.</li>
                        <li><strong>Marketing cookies</strong> — used only with your consent to deliver relevant advertisements and measure their effectiveness.</li>
                    </ul>
                    <h3>Managing cookies</h3>
                    <p>You can control and delete cookies through your browser settings. Disabling certain cookies may affect the functionality of PostPulse. Most browsers allow you to refuse all cookies, accept all cookies, or be notified when a cookie is set.</p>
                    <p>To opt out of Google Analytics tracking across all websites, visit <a href="https://tools.google.com/dlpage/gaoptout" target="_blank" rel="noopener">tools.google.com/dlpage/gaoptout</a>.</p>
                </div>

                {{-- SECTION 6 --}}
                <div id="retention" class="scroll-mt-28">
                    <div class="inline-flex items-center gap-2 bg-[#e6f7f7] text-[#149696]
                                text-xs font-bold px-3 py-1.5 rounded-full mb-4">Section 6</div>
                    <h2>Data Retention</h2>
                    <p>We retain your personal data only for as long as necessary to fulfil the purposes described in this policy, unless a longer retention period is required or permitted by law.</p>
                    <ul>
                        <li><strong>Active accounts</strong> — data is retained for the duration of your account plus 30 days after deletion request</li>
                        <li><strong>Job applications</strong> — retained for 12 months after submission to allow employer review cycles to complete</li>
                        <li><strong>Payment records</strong> — retained for 7 years to comply with UK financial regulations</li>
                        <li><strong>Support communications</strong> — retained for 3 years</li>
                        <li><strong>Analytics data</strong> — anonymised and aggregated after 26 months</li>
                        <li><strong>Log files</strong> — retained for 90 days for security and debugging purposes</li>
                    </ul>
                    <p>When you delete your account, we begin the deletion process within 30 days. Some data may be retained in anonymised, aggregated form for analytical purposes.</p>
                </div>

                {{-- SECTION 7 --}}
                <div id="security" class="scroll-mt-28">
                    <div class="inline-flex items-center gap-2 bg-[#e6f7f7] text-[#149696]
                                text-xs font-bold px-3 py-1.5 rounded-full mb-4">Section 7</div>
                    <h2>Security</h2>
                    <p>We implement industry-standard technical and organisational measures to protect your personal data from unauthorised access, alteration, disclosure, or destruction. These include:</p>
                    <ul>
                        <li>TLS 1.3 encryption for all data in transit</li>
                        <li>AES-256 encryption for sensitive data at rest</li>
                        <li>Bcrypt password hashing (we never store plaintext passwords)</li>
                        <li>Role-based access controls limiting data access to authorised personnel only</li>
                        <li>Regular third-party security audits and penetration testing</li>
                        <li>Two-factor authentication available for all accounts</li>
                        <li>SOC 2 Type II compliant infrastructure via AWS</li>
                    </ul>
                    <p>Despite our best efforts, no method of transmission over the internet or method of electronic storage is 100% secure. In the event of a data breach that affects your rights and freedoms, we will notify you and the relevant supervisory authority within 72 hours as required under UK GDPR.</p>
                </div>

                {{-- SECTION 8 --}}
                <div id="rights" class="scroll-mt-28">
                    <div class="inline-flex items-center gap-2 bg-[#e6f7f7] text-[#149696]
                                text-xs font-bold px-3 py-1.5 rounded-full mb-4">Section 8</div>
                    <h2>Your Rights (GDPR &amp; UK GDPR)</h2>
                    <p>If you are located in the UK or European Economic Area, you have the following rights under data protection law:</p>
                    <div class="grid sm:grid-cols-2 gap-4 my-6 not-prose">
                        @foreach ([
                            ['title' => 'Right of Access',        'desc' => 'Request a copy of the personal data we hold about you (a Subject Access Request).'],
                            ['title' => 'Right to Rectification', 'desc' => 'Ask us to correct inaccurate or incomplete personal data we hold about you.'],
                            ['title' => 'Right to Erasure',       'desc' => 'Request deletion of your personal data where there is no compelling reason for us to continue processing it.'],
                            ['title' => 'Right to Restriction',   'desc' => 'Request that we restrict processing of your data in certain circumstances.'],
                            ['title' => 'Right to Portability',   'desc' => 'Receive your data in a structured, machine-readable format to transfer to another service.'],
                            ['title' => 'Right to Object',        'desc' => 'Object to processing based on legitimate interests or for direct marketing purposes.'],
                            ['title' => 'Withdrawal of Consent',  'desc' => 'Where processing is based on consent, withdraw that consent at any time without affecting prior lawful processing.'],
                            ['title' => 'Lodge a Complaint',      'desc' => 'Lodge a complaint with the UK Information Commissioner\'s Office (ICO) at ico.org.uk or call 0303 123 1113.'],
                        ] as $right)
                        <div class="bg-gray-50 rounded-2xl p-5 border border-gray-100
                                    hover:border-[#149696]/20 transition-colors">
                            <div class="flex items-start gap-3">
                                <div class="w-7 h-7 bg-[#149696] rounded-lg flex items-center justify-center shrink-0 mt-0.5">
                                    <svg class="w-3.5 h-3.5 text-white" fill="none" stroke="currentColor"
                                         stroke-width="2.5" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/>
                                    </svg>
                                </div>
                                <div>
                                    <p class="text-sm font-bold text-gray-900 mb-0.5">{{ $right['title'] }}</p>
                                    <p class="text-xs text-gray-500 leading-relaxed">{{ $right['desc'] }}</p>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <p>To exercise any of these rights, email us at <a href="mailto:privacy@postpulse.io">privacy@postpulse.io</a> or use the Data Request form in your account settings. We will respond within 30 days.</p>
                </div>

                {{-- SECTION 9 --}}
                <div id="children" class="scroll-mt-28">
                    <div class="inline-flex items-center gap-2 bg-[#e6f7f7] text-[#149696]
                                text-xs font-bold px-3 py-1.5 rounded-full mb-4">Section 9</div>
                    <h2>Children's Privacy</h2>
                    <p>PostPulse is not directed at or intended for use by children under the age of 16. We do not knowingly collect personal data from children. If you believe a child has provided us with personal data, please contact us immediately at <a href="mailto:privacy@postpulse.io">privacy@postpulse.io</a> and we will take steps to delete such information.</p>
                </div>

                {{-- SECTION 10 --}}
                <div id="international" class="scroll-mt-28">
                    <div class="inline-flex items-center gap-2 bg-[#e6f7f7] text-[#149696]
                                text-xs font-bold px-3 py-1.5 rounded-full mb-4">Section 10</div>
                    <h2>International Data Transfers</h2>
                    <p>PostPulse is based in the United Kingdom. Some of our service providers operate in countries outside the UK and European Economic Area. When we transfer your data internationally, we ensure appropriate safeguards are in place, including:</p>
                    <ul>
                        <li>UK International Data Transfer Agreements (IDTAs)</li>
                        <li>Standard Contractual Clauses approved by the European Commission</li>
                        <li>Transfers only to countries recognised as providing adequate data protection</li>
                    </ul>
                    <p>You can obtain details of the specific safeguards in place for any international transfers by contacting us at <a href="mailto:privacy@postpulse.io">privacy@postpulse.io</a>.</p>
                </div>

                {{-- SECTION 11 --}}
                <div id="changes" class="scroll-mt-28">
                    <div class="inline-flex items-center gap-2 bg-[#e6f7f7] text-[#149696]
                                text-xs font-bold px-3 py-1.5 rounded-full mb-4">Section 11</div>
                    <h2>Policy Changes</h2>
                    <p>We may update this Privacy Policy from time to time to reflect changes in our practices, technology, legal requirements, or other factors. When we make material changes, we will:</p>
                    <ul>
                        <li>Update the "Last updated" date at the top of this page</li>
                        <li>Send an email notification to all registered users</li>
                        <li>Display a prominent notice on the PostPulse platform for at least 30 days</li>
                        <li>For significant changes, request fresh consent where required by law</li>
                    </ul>
                    <p>We encourage you to review this policy periodically. Continued use of PostPulse after changes become effective constitutes acceptance of the revised policy.</p>
                    <p>We encourage you to review this policy periodically. Continued use of PostPulse after changes become effective constitutes acceptance of the revised policy.</p>
                </div>

                {{-- SECTION 12 --}}
                <div id="contact-us" class="scroll-mt-28">
                    <div class="inline-flex items-center gap-2 bg-[#e6f7f7] text-[#149696]
                                text-xs font-bold px-3 py-1.5 rounded-full mb-4">Section 12</div>
                    <h2>Contact Us</h2>
                    <p>If you have any questions, concerns, or requests regarding this Privacy Policy or our data practices, please contact our Data Protection team:</p>
                    <div class="bg-slate-50 rounded-2xl border border-gray-100 p-6 mt-4 not-prose">
                        <div class="grid sm:grid-cols-2 gap-6">
                            @foreach ([
                                ['icon'=>'M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z', 'label'=>'Email', 'value'=>'privacy@postpulse.io', 'href'=>'mailto:privacy@postpulse.io'],
                                ['icon'=>'M17.657 16.657L13.414 20.9a2 2 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0zM15 11a3 3 0 11-6 0 3 3 0 016 0z', 'label'=>'Post', 'value'=>'PostPulse Ltd, 12 Talent Square, Floor 4, London EC2A 4NE', 'href'=>null],
                                ['icon'=>'M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z', 'label'=>'Response time', 'value'=>'Within 30 days (usually faster)', 'href'=>null],
                                ['icon'=>'M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z', 'label'=>'ICO Registration', 'value'=>'ZA123456 (UK Information Commissioner)', 'href'=>null],
                            ] as $c)
                            <div class="flex items-start gap-3">
                                <div class="w-9 h-9 bg-[#e6f7f7] rounded-xl flex items-center justify-center shrink-0">
                                    <svg class="w-4 h-4 text-[#149696]" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="{{ $c['icon'] }}"/>
                                    </svg>
                                </div>
                                <div>
                                    <p class="text-xs font-bold text-gray-500 uppercase tracking-widest mb-0.5">{{ $c['label'] }}</p>
                                    @if($c['href'])
                                    <a href="{{ $c['href'] }}" class="text-sm text-[#149696] hover:underline font-medium">{{ $c['value'] }}</a>
                                    @else
                                    <p class="text-sm text-gray-700">{{ $c['value'] }}</p>
                                    @endif
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>

                {{-- Related policies --}}
                <div class="mt-12 pt-8 border-t border-gray-100 not-prose">
                    <p class="text-sm font-semibold text-gray-700 mb-4">Related legal documents</p>
                    <div class="flex flex-wrap gap-3">
                        <a href="{{ route('terms') }}"
                           class="inline-flex items-center gap-2 text-sm text-gray-600 bg-gray-50
                                  border border-gray-200 px-4 py-2 rounded-xl
                                  hover:border-[#149696] hover:text-[#149696] transition-colors">
                            Terms of Service →
                        </a>
                        <a href="{{ route('contact') }}"
                           class="inline-flex items-center gap-2 text-sm text-gray-600 bg-gray-50
                                  border border-gray-200 px-4 py-2 rounded-xl
                                  hover:border-[#149696] hover:text-[#149696] transition-colors">
                            Contact Us →
                        </a>
                    </div>
                </div>

            </div>{{-- /policy-prose --}}
        </div>{{-- /grid --}}
    </div>{{-- /max-w --}}
</section>{{-- /main section --}}

{{-- ── CTA band ── --}}
<section class="py-14 bg-[#149696]">
    <div class="max-w-4xl mx-auto px-6 flex flex-col sm:flex-row items-center justify-between gap-6">
        <div>
            <h3 class="text-xl font-extrabold text-white mb-1">Questions about your data?</h3>
            <p class="text-teal-200 text-sm">Our privacy team responds within 30 days. Usually much faster.</p>
        </div>
        <a href="{{ route('contact') }}"
           class="shrink-0 inline-flex items-center gap-2 bg-white text-[#0f7a7a] font-bold
                  px-6 py-3 rounded-xl hover:bg-[#e6f7f7] transition-colors shadow-sm text-sm">
            Contact Privacy Team →
        </a>
    </div>
</section>

@endsection
