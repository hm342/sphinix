<?php

namespace Database\Seeders;

use App\Data\AgencyData;
use App\Models\CaseStudy;
use App\Models\CaseStudySlide;
use App\Models\ClientLogo;
use App\Models\Faq;
use App\Models\Insight;
use App\Models\Service;
use App\Models\SiteSetting;
use App\Models\Testimonial;
use Illuminate\Database\Seeder;

class AgencyContentSeeder extends Seeder
{
    public function run(): void
    {
        $this->seedSettings();
        $this->seedServices();
        $this->seedCaseStudies();
        $this->seedClientLogos();
        $this->seedInsights();
        $this->seedTestimonials();
        $this->seedFaqs();
    }

    private function seedSettings(): void
    {
        SiteSetting::setMany(SiteSetting::defaults(), 'agency');
    }

    private function seedServices(): void
    {
        foreach (AgencyData::services() as $index => $item) {
            Service::query()->updateOrCreate(
                ['slug' => $item['id']],
                [
                    'num' => $item['num'],
                    'nav_title' => $item['nav_title'],
                    'nav_desc' => $item['nav_desc'],
                    'nav_icon' => $item['nav_icon'],
                    'eyebrow' => $item['eyebrow'],
                    'dot_color' => $item['dot_color'],
                    'title' => $item['title'],
                    'card_title' => $item['card_title'],
                    'short_desc' => $item['short_desc'],
                    'full_desc' => str_replace(' [CONFIRM $36 ROI STAT SOURCE]', '', $item['full_desc']),
                    'chips' => $item['chips'],
                    'features' => $item['features'],
                    'tools' => preg_replace('/\s*·\s*\[CONFIRM[^\]]+\]/', '', $item['tools']),
                    'cta_card' => $item['cta_card'],
                    'cta_detail' => $item['cta_detail'],
                    'route_name' => $item['route_name'],
                    'anchor' => $item['anchor'],
                    'detail_route' => $item['detail_route'] ?? null,
                    'image_path' => $item['img'],
                    'alt' => $item['alt'],
                    'accordion_alt' => $item['accordion_alt'],
                    'is_active' => true,
                    'sort_order' => $index + 1,
                ]
            );
        }
    }

    private function seedCaseStudies(): void
    {
        $summaries = [
            'aabo' => [
                'services' => 'Brand Visuals, Social Media Creatives, Campaign Reels & Product Launch',
                'summary' => 'Creative campaign production, digital product storytelling, and social poster systems crafted by Sphinix Marketing for aabo.',
            ],
            'weconnect-care' => [
                'services' => 'Healthcare Video Production, Social Media Management & Lead Campaigns',
                'summary' => 'Patient-centric healthcare communication, video showcase reels, and awareness creatives built with WeConnect Care.',
            ],
            'saurashtra-group' => [
                'services' => 'Industrial Branding, Corporate Collateral & Digital Presence',
                'summary' => 'Structured corporate visual identity, product showcase creatives, and multi-channel communication for Saurashtra Group.',
            ],
            'veer-jewellers' => [
                'services' => 'Jewelry Photography Direction, Festive Reels & Meta Ad Creatives',
                'summary' => 'Collection showcase posters, festive campaign visuals, and social media storytelling tailored for Veer Jewellers.',
            ],
            'kothari-agencies' => [
                'services' => 'Trade Marketing Creatives, Catalog Visuals & Digital Campaigns',
                'summary' => 'Consistent trade branding, dealer communication posters, and campaign visuals delivered for Kothari Agencies.',
            ],
            'riyom-jewels' => [
                'services' => 'Editorial Jewelry Creatives, Social Calendars & Campaign Posters',
                'summary' => 'Refined jewelry campaign direction, seasonal posters, and social media creative assets for Riyom Jewels.',
            ],
        ];

        $index = 0;
        foreach (AgencyData::caseStudies() as $slug => $item) {
            $index++;
            $meta = $summaries[$slug] ?? [
                'services' => 'Digital Marketing, Creative Production & Web Support',
                'summary' => $item['description'],
            ];

            $caseStudy = CaseStudy::query()->updateOrCreate(
                ['slug' => $slug],
                [
                    'name' => $item['name'],
                    'categories' => $item['categories'],
                    'industry' => $item['industry'],
                    'services_delivered' => $meta['services'],
                    'description' => $item['description'],
                    'summary' => $meta['summary'],
                    'cover_image' => $item['cover'],
                    'has_dot_mark' => (bool) ($item['has_dot_mark'] ?? false),
                    'is_published' => true,
                    'sort_order' => $index,
                ]
            );

            if ($caseStudy->slides()->count() === 0) {
                foreach ($item['slides'] as $slideIdx => $slidePath) {
                    CaseStudySlide::query()->create([
                        'case_study_id' => $caseStudy->id,
                        'image_path' => $slidePath,
                        'caption' => $item['name'].' campaign visual '.($slideIdx + 1),
                        'sort_order' => $slideIdx + 1,
                    ]);
                }
            }
        }
    }

    private function seedClientLogos(): void
    {
        $logos = [
            // Row 1 (LTR Marquee)
            ['name' => 'aabo.', 'subtitle' => 'Tech & Product', 'case_study_slug' => 'aabo', 'row' => 1, 'marquee' => true, 'dir' => true],
            ['name' => 'Saurashtra Group', 'subtitle' => 'Manufacturing & Trade', 'case_study_slug' => 'saurashtra-group', 'row' => 1, 'marquee' => true, 'dir' => true],
            ['name' => 'Oilenza', 'subtitle' => 'Client Partner', 'case_study_slug' => null, 'row' => 1, 'marquee' => true, 'dir' => true],
            ['name' => 'HCP', 'subtitle' => 'Client Partner', 'case_study_slug' => null, 'row' => 1, 'marquee' => true, 'dir' => true],
            ['name' => 'Janmoti', 'subtitle' => 'Client Partner', 'case_study_slug' => null, 'row' => 1, 'marquee' => true, 'dir' => true],
            ['name' => 'FunBun', 'subtitle' => 'Client Partner', 'case_study_slug' => null, 'row' => 1, 'marquee' => true, 'dir' => true],
            ['name' => 'Kothari Agencies', 'subtitle' => 'Trade & Distribution', 'case_study_slug' => 'kothari-agencies', 'row' => 1, 'marquee' => true, 'dir' => true],
            ['name' => 'Swarn Mandir', 'subtitle' => 'Client Partner', 'case_study_slug' => null, 'row' => 1, 'marquee' => true, 'dir' => true],
            // Row 2 (RTL Marquee)
            ['name' => 'Riyom Jewels', 'subtitle' => 'Jewelry & Lifestyle', 'case_study_slug' => 'riyom-jewels', 'row' => 2, 'marquee' => true, 'dir' => true],
            ['name' => 'Pishi Holidays', 'subtitle' => 'Travel & Hospitality', 'case_study_slug' => null, 'row' => 2, 'marquee' => true, 'dir' => true],
            ['name' => 'Satyam Travel', 'subtitle' => 'Travel & Hospitality', 'case_study_slug' => null, 'row' => 2, 'marquee' => true, 'dir' => true],
            ['name' => 'Fruitamins', 'subtitle' => 'FMCG & Food', 'case_study_slug' => null, 'row' => 2, 'marquee' => true, 'dir' => true],
            ['name' => 'WeConnect Care', 'subtitle' => 'Healthcare & Services', 'case_study_slug' => 'weconnect-care', 'row' => 2, 'marquee' => true, 'dir' => true],
            ['name' => 'Veer Jewellers', 'subtitle' => 'Jewelry & Retail', 'case_study_slug' => 'veer-jewellers', 'row' => 2, 'marquee' => true, 'dir' => true],
            ['name' => 'Nikki', 'subtitle' => 'Client Partner', 'case_study_slug' => null, 'row' => 2, 'marquee' => false, 'dir' => true],
            ['name' => 'NHOC', 'subtitle' => 'Client Partner', 'case_study_slug' => null, 'row' => 2, 'marquee' => true, 'dir' => true],
            ['name' => 'Ganga', 'subtitle' => 'Client Partner', 'case_study_slug' => null, 'row' => 2, 'marquee' => false, 'dir' => true],
            ['name' => 'Elite Discoveries', 'subtitle' => '+100 More Clients', 'case_study_slug' => null, 'row' => 2, 'marquee' => true, 'dir' => true],
        ];

        foreach ($logos as $idx => $logo) {
            ClientLogo::query()->updateOrCreate(
                ['name' => $logo['name']],
                [
                    'subtitle' => $logo['subtitle'],
                    'case_study_slug' => $logo['case_study_slug'],
                    'carousel_row' => $logo['row'],
                    'show_in_marquee' => $logo['marquee'],
                    'show_in_directory' => $logo['dir'],
                    'is_active' => true,
                    'sort_order' => $idx + 1,
                ]
            );
        }
    }

    private function seedInsights(): void
    {
        $articles = [
            [
                'slug' => 'studio-checklist-for-clean-paid-search-and-whatsapp-routing',
                'title' => 'How we align Google Ads, landing pages, and WhatsApp lead follow-up under one roof',
                'category' => 'strategy',
                'category_label' => 'Strategy & Systems',
                'excerpt' => 'Connecting high-intent search clicks directly to structured ChatBox 360 Suite inquiry routing so leads never go cold.',
                'body' => "Paid campaigns rarely underperform on clicks alone — most wasted budget happens after a prospect lands on the page or sends an initial inquiry.\n\nAt Sphinix Marketing, our in-house ad buyers and software engineers review weekly search term reports alongside ChatBox 360 Suite conversation routing. By matching ad copy tightly to landing page headings and auto-assigning WhatsApp inquiries to the right team member, small and mid-sized businesses respond faster without inflating cost per lead.\n\nThis note outlines our standard pre-launch audit across tracking tags, negative keyword lists, message templates, and team handoff rules.",
                'cover_image' => 'images/insight_featured_cover.jpg',
                'cover_alt' => 'Warm directional sunlight across dark architectural desk and editorial proofs',
                'author_name' => 'Sphinix Strategy Team',
                'read_time' => '5 min read',
                'published_at' => '2026-05-12',
                'cta_label' => 'Read Featured Note',
                'is_featured' => true,
                'show_on_home' => false,
                'sort_order' => 1,
            ],
            [
                'slug' => 'weekly-negative-keyword-cleanup-checklist-for-google-ads',
                'title' => 'Weekly negative-keyword cleanups that protect small-business Google Ads budgets',
                'category' => 'ads',
                'category_label' => 'Paid Ads',
                'excerpt' => 'A practical Search, Display, and Shopping bid check routine used across regional and B2B ad accounts.',
                'body' => "Broad match keywords can quickly pull irrelevant search queries into small-business Search campaigns.\n\nOur weekly Google Ads checklist covers three recurring checks: auditing the search terms report for non-buyer intent, segmenting brand vs. non-brand queries into separate campaigns, and verifying conversion actions before adjusting bids.\n\nConsistent hygiene keeps ad spend focused on high-intent buyers rather than generic informational clicks.",
                'cover_image' => 'images/insight_paid_ads.jpg',
                'cover_alt' => 'Precision studio light prism representing Paid Ads media targeting',
                'author_name' => 'Sphinix Performance Team',
                'read_time' => '4 min read',
                'published_at' => '2026-05-05',
                'cta_label' => 'Explore Paid Ads Notes',
                'is_featured' => false,
                'show_on_home' => true,
                'sort_order' => 2,
            ],
            [
                'slug' => 'technical-seo-and-google-maps-foundations-for-local-brands',
                'title' => 'Technical SEO crawls and Google Business Profile fixes before scaling content',
                'category' => 'seo',
                'category_label' => 'SEO & Organic',
                'excerpt' => 'Fixing indexation bottlenecks, page titles, and local Maps categories before publishing new service pages.',
                'body' => "Publishing new articles on a website with crawl errors, duplicate titles, or an unverified Google Business Profile slows down organic momentum.\n\nBefore scaling content production, we audit Search Console coverage, clean up broken internal links, verify structured local NAP (Name, Address, Phone) details, and organize service pages around clear search intent.\n\nClean technical foundations help search engines understand every service location and product line accurately.",
                'cover_image' => 'images/insight_seo.jpg',
                'cover_alt' => 'Stepped archival linen volumes representing structured SEO indexing',
                'author_name' => 'Sphinix SEO Team',
                'read_time' => '5 min read',
                'published_at' => '2026-04-22',
                'cta_label' => 'Explore SEO & Organic Notes',
                'is_featured' => false,
                'show_on_home' => true,
                'sort_order' => 3,
            ],
            [
                'slug' => 'whatsapp-business-api-follow-up-workflows-with-chatbox-360',
                'title' => 'Designing 24/7 WhatsApp follow-up and shared team inbox workflows in ChatBox 360',
                'category' => 'strategy',
                'category_label' => 'Strategy & Systems',
                'excerpt' => 'Structuring welcome replies, appointment reminders, and CRM tags so inquiries convert consistently.',
                'body' => "When inquiries arrive across Instagram, Google Ads, and your website simultaneously, manual phone-to-phone replies break down fast.\n\nUsing ChatBox 360 Suite, teams centralize every WhatsApp conversation into one shared inbox, use automated SmartBot routing to qualify intent outside office hours, and keep sales pipelines tagged for follow-up.\n\nClear routing rules help businesses turn ad clicks into booked consultations and orders.",
                'cover_image' => 'images/insight_strategy.jpg',
                'cover_alt' => 'Connected matte geometric forms linked by a brass rod representing workflow systems',
                'author_name' => 'Sphinix Product Team',
                'read_time' => '4 min read',
                'published_at' => '2026-04-10',
                'cta_label' => 'Explore Strategy Notes',
                'is_featured' => false,
                'show_on_home' => true,
                'sort_order' => 4,
            ],
            [
                'slug' => 'meta-reels-creative-testing-and-hook-pacing',
                'title' => 'Structuring short-form Reels and static carousel hooks for Meta ad creative testing',
                'category' => 'ads',
                'category_label' => 'Paid Ads',
                'excerpt' => 'How our Creative Studio pairs product shoots with concise hook variations for Meta campaigns.',
                'body' => "Strong targeting cannot rescue unclear creative in social feeds.\n\nAt our Mokhdaji Circle studio, we film modular 15-to-30 second vertical cuts so media buyers can test distinct opening three-second hooks against the same core product demonstration.",
                'cover_image' => 'images/svc_01_social.jpg',
                'cover_alt' => 'Social media production setup',
                'author_name' => 'Sphinix Creative Studio',
                'read_time' => '4 min read',
                'published_at' => '2026-03-28',
                'cta_label' => 'Read Paid Ads Note',
                'is_featured' => false,
                'show_on_home' => false,
                'sort_order' => 5,
            ],
            [
                'slug' => 'ecommerce-marketplace-listing-and-a-plus-content-seo',
                'title' => 'Marketplace keyword architecture and A+ visuals for Amazon and Flipkart catalogs',
                'category' => 'ads',
                'category_label' => 'Paid Ads',
                'excerpt' => 'Aligning sponsored product bids with clean titles, bullet benefits, and brand store banners.',
                'body' => "Marketplace ads work best when product detail pages answer buyer objections immediately.\n\nBefore raising sponsored ad budgets on Amazon or Flipkart, we standardize catalog titles, backend search terms, and mobile-first A+ visual comparison charts.",
                'cover_image' => 'images/svc_06_ecommerce.jpg',
                'cover_alt' => 'E-commerce catalog visuals',
                'author_name' => 'Sphinix E-Commerce Team',
                'read_time' => '5 min read',
                'published_at' => '2026-03-14',
                'cta_label' => 'Read E-Commerce Note',
                'is_featured' => false,
                'show_on_home' => false,
                'sort_order' => 6,
            ],
            [
                'slug' => 'on-page-service-architecture-and-internal-linking',
                'title' => 'Organizing service pages and internal links so search crawlers index deep offerings',
                'category' => 'seo',
                'category_label' => 'SEO & Organic',
                'excerpt' => 'Why dedicated service pages outperform single catch-all landing pages for local organic reach.',
                'body' => "Lumping eight distinct marketing services onto one single page dilutes topical relevance.\n\nStructuring dedicated pages for Technical SEO, Social Media Management, and software suites gives search engines clean URL signals and gives prospective clients clear next steps.",
                'cover_image' => 'images/svc_02_seo.jpg',
                'cover_alt' => 'SEO architecture notebook',
                'author_name' => 'Sphinix SEO Team',
                'read_time' => '4 min read',
                'published_at' => '2026-03-01',
                'cta_label' => 'Read SEO Note',
                'is_featured' => false,
                'show_on_home' => false,
                'sort_order' => 7,
            ],
            [
                'slug' => 'mobile-aso-metadata-and-store-screenshot-hierarchy',
                'title' => 'App Store Optimization (ASO) fundamentals: titles, screenshots, and keyword updates',
                'category' => 'seo',
                'category_label' => 'SEO & Organic',
                'excerpt' => 'Improving organic mobile app visibility on Google Play through clear screenshot captions and store metadata.',
                'body' => "Mobile app discovery relies heavily on concise store titles, clear feature screenshots, and consistent update cadence.\n\nWe apply the same clarity principles from web SEO to Google Play metadata and visual preview frames.",
                'cover_image' => 'images/insight_seo.jpg',
                'cover_alt' => 'Mobile ASO indexing note',
                'author_name' => 'Sphinix SEO Team',
                'read_time' => '3 min read',
                'published_at' => '2026-02-18',
                'cta_label' => 'Read ASO Note',
                'is_featured' => false,
                'show_on_home' => false,
                'sort_order' => 8,
            ],
            [
                'slug' => 'retention-email-drip-flows-for-repeat-buyers',
                'title' => 'Setting up welcome sequences and seasonal retention emails alongside paid acquisition',
                'category' => 'strategy',
                'category_label' => 'Strategy & Systems',
                'excerpt' => 'Turning first-time website buyers into repeat customers with automated lifecycle email flows.',
                'body' => "Relying exclusively on new paid traffic makes growth expensive over time.\n\nPairing acquisition campaigns with welcome sequences, abandoned cart reminders, and seasonal festival campaigns keeps existing customers engaged without repurchasing their click.",
                'cover_image' => 'images/svc_07_email.jpg',
                'cover_alt' => 'Email retention sequence workflow',
                'author_name' => 'Sphinix Strategy Team',
                'read_time' => '4 min read',
                'published_at' => '2026-02-05',
                'cta_label' => 'Read Retention Note',
                'is_featured' => false,
                'show_on_home' => false,
                'sort_order' => 9,
            ],
        ];

        foreach ($articles as $article) {
            Insight::query()->updateOrCreate(
                ['slug' => $article['slug']],
                array_merge($article, ['is_published' => true])
            );
        }
    }

    private function seedTestimonials(): void
    {
        $items = [
            [
                'tab_label' => 'Video & Healthcare',
                'quote' => 'Professional video production and hospital promotion workflows handled smoothly from shoot planning to final campaign edits.',
                'author_name' => 'Healthcare & Hospital Client',
                'author_role' => 'Video Production & Promotion Theme',
                'rating' => 5,
                'sort_order' => 1,
            ],
            [
                'tab_label' => 'Social & Engagement',
                'quote' => 'Consistent Facebook marketing, creative content calendars, and strong social media knowledge that support ongoing customer engagement.',
                'author_name' => 'Social Media Partner',
                'author_role' => 'Content Creation & Online Reach Theme',
                'rating' => 5,
                'sort_order' => 2,
            ],
            [
                'tab_label' => 'Team & Support',
                'quote' => 'Knowledgeable in-house staff, smooth day-to-day coordination, and reliable support across our digital marketing campaigns.',
                'author_name' => 'Retainer Business Client',
                'author_role' => 'Account Support & Delivery Theme',
                'rating' => 5,
                'sort_order' => 3,
            ],
        ];

        foreach ($items as $item) {
            Testimonial::query()->updateOrCreate(
                ['tab_label' => $item['tab_label']],
                array_merge($item, ['is_active' => true])
            );
        }
    }

    private function seedFaqs(): void
    {
        $faqs = [
            // Home FAQs
            [
                'placement' => 'home',
                'question' => 'Can we bundle agency services with ChatBox 360?',
                'answer' => 'Yes. Clients can pair Google Ads and Social Media campaigns with ChatBox 360 Suite to capture and route inquiries on WhatsApp.',
                'is_open_by_default' => true,
                'sort_order' => 1,
            ],
            [
                'placement' => 'home',
                'question' => 'How quickly can we launch a new campaign?',
                'answer' => 'Timelines depend on project scope and requirements — after onboarding discovery, we share a clear schedule and content calendar.',
                'is_open_by_default' => false,
                'sort_order' => 2,
            ],
            [
                'placement' => 'home',
                'question' => 'Do you work with clients outside Gujarat or India?',
                'answer' => 'Yes. Our Head Office and Creative Studio are in Bhavnagar, Gujarat, and we work with 150+ clients worldwide.',
                'is_open_by_default' => false,
                'sort_order' => 3,
            ],
            [
                'placement' => 'home',
                'question' => 'How do you measure and report results?',
                'answer' => 'You receive regular reports covering traffic, ad performance, leads, and campaign activity.',
                'is_open_by_default' => false,
                'sort_order' => 4,
            ],
            // Contact FAQs
            [
                'placement' => 'contact',
                'question' => 'How soon can we begin working together?',
                'answer' => 'After an intro call and scope sign-off, onboarding starts with account access, an initial audit, and a monthly calendar.',
                'is_open_by_default' => true,
                'sort_order' => 1,
            ],
            [
                'placement' => 'contact',
                'question' => 'Can we bundle agency services with ChatBox 360 Suite?',
                'answer' => 'Yes. Ad campaigns can connect directly to ChatBox 360 Suite so inbound WhatsApp inquiries get automated replies and routing.',
                'is_open_by_default' => false,
                'sort_order' => 2,
            ],
            [
                'placement' => 'contact',
                'question' => 'Do you work with businesses outside India?',
                'answer' => 'Yes. Our offices are in Bhavnagar, Gujarat, and we work with 150+ clients remotely across India and worldwide.',
                'is_open_by_default' => false,
                'sort_order' => 3,
            ],
            [
                'placement' => 'contact',
                'question' => 'How do you handle reporting and communication?',
                'answer' => 'You get direct communication with your account team and regular updates covering active campaigns and deliverables.',
                'is_open_by_default' => false,
                'sort_order' => 4,
            ],
        ];

        foreach ($faqs as $faq) {
            Faq::query()->updateOrCreate(
                ['placement' => $faq['placement'], 'question' => $faq['question']],
                array_merge($faq, ['is_active' => true])
            );
        }
    }
}
