<?php

namespace App\Data;

final class AgencyData
{
    /**
     * Navigation Mega Menu & Core Disciplines list (shared across navbar & home marquee).
     *
     * @return array<int, array<string, mixed>>
     */
    public static function services(): array
    {
        return [
            [
                'id' => 'social-media',
                'num' => '01',
                'nav_title' => 'Social Media',
                'nav_desc' => 'Reels, strategy & paid social',
                'nav_icon' => 'campaign',
                'eyebrow' => 'ORGANIC & PAID SOCIAL',
                'dot_color' => '#E85D2A',
                'title' => 'Social Media Management',
                'card_title' => 'Social Media',
                'short_desc' => 'Content calendars, reels, motion posts, influencer promos, and paid social.',
                'full_desc' => 'Profile setup, monthly content calendars, reels, motion posts, and paid social ads managed day to day.',
                'chips' => ['Reels', 'Paid Social', 'Calendars'],
                'cta_card' => 'Explore social media',
                'cta_detail' => 'Explore Social Media',
                'route_name' => 'services.social',
                'anchor' => null,
                'img' => 'images/svc_01_social.jpg',
                'alt' => 'Social media content production and campaign visuals',
                'accordion_alt' => 'Minimal illustration of social media content calendar and reels workflow',
                'features' => [
                    'Profile Setup & Optimization',
                    'Monthly Content Calendars',
                    'Reels, Videos & Motion Posts',
                    'Social Media Ads & Branding',
                    'Influencer & Group Promotions',
                ],
                'tools' => 'FB, IG, LinkedIn, X, YouTube, WhatsApp · Meta Business Partner & LinkedIn Partner',
            ],
            [
                'id' => 'seo',
                'num' => '02',
                'nav_title' => 'SEO & Organic',
                'nav_desc' => 'Technical SEO & authority building',
                'nav_icon' => 'search',
                'eyebrow' => 'SEARCH ENGINE OPTIMIZATION',
                'dot_color' => '#18181B',
                'title' => 'Search Engine Optimization',
                'card_title' => 'SEO & Organic',
                'short_desc' => 'Technical SEO, on-page & off-page authority, local SEO, and mobile ASO.',
                'full_desc' => 'On-page fixes, technical site health, local Google Maps profiles, and link building to bring in organic search traffic.',
                'chips' => ['Technical SEO', 'Local Maps', 'ASO'],
                'cta_card' => 'Explore SEO',
                'cta_detail' => 'Explore SEO Service',
                'route_name' => 'services.seo',
                'anchor' => null,
                'img' => 'images/svc_02_seo.jpg',
                'alt' => 'Search engine optimization and ranking growth visuals',
                'accordion_alt' => 'Minimal illustration of search engine optimization and organic rankings',
                'features' => [
                    'Technical & On-Page SEO',
                    'Off-Page Backlink Building',
                    'Local & Map Search SEO',
                    'eCommerce Catalog SEO',
                    'Mobile App SEO (ASO)',
                ],
                'tools' => 'Google Search Console, Analytics, Semrush, Ahrefs, Moz, Yoast · Ahrefs Agency Partner',
            ],
            [
                'id' => 'google-ads',
                'num' => '03',
                'nav_title' => 'Google Ads',
                'nav_desc' => 'Search, display & YouTube ROAS',
                'nav_icon' => 'ads_click',
                'eyebrow' => 'PERFORMANCE MARKETING',
                'dot_color' => '#A83300',
                'title' => 'Google Ads',
                'card_title' => 'Google Ads',
                'short_desc' => 'Search, display, shopping, YouTube, and dynamic remarketing campaigns.',
                'full_desc' => 'Search, Display, Shopping, and YouTube campaigns set up with tight keyword targeting, negative lists, and weekly bid checks.',
                'chips' => ['Search Ads', 'Shopping', 'YouTube'],
                'cta_card' => 'Explore Google Ads',
                'cta_detail' => 'Explore Google Ads',
                'route_name' => 'services.google-ads',
                'anchor' => null,
                'img' => 'images/svc_03_ads.jpg',
                'alt' => 'Google Ads performance campaign visuals',
                'accordion_alt' => 'Minimal illustration of Google Ads performance targeting and conversion growth',
                'features' => [
                    'Search & Display Campaigns',
                    'YouTube Video & Gmail Ads',
                    'Shopping & Dynamic Ads',
                    'App Install & Remarketing',
                    'Keyword & Bid Optimization',
                ],
                'tools' => 'Google Ads, Google Analytics, Adalysis, SpyFu · Google Partner',
            ],
            [
                'id' => 'branding',
                'num' => '04',
                'nav_title' => 'Branding & Design',
                'nav_desc' => 'Logo, guidelines & identity',
                'nav_icon' => 'palette',
                'eyebrow' => 'BRANDING & IDENTITY',
                'dot_color' => '#E85D2A',
                'title' => 'Branding & Design',
                'card_title' => 'Branding & Design',
                'short_desc' => 'Logo systems, brand guidelines, packaging, pitch decks, and brochures.',
                'full_desc' => 'Logos, brand guidelines, packaging, brochures, and social graphics built to stay consistent across print and digital.',
                'chips' => ['Identity', 'Packaging', 'Guidelines'],
                'cta_card' => 'Explore branding',
                'cta_detail' => 'Explore Branding & Design',
                'route_name' => 'services.branding',
                'anchor' => null,
                'img' => 'images/svc_04_branding.jpg',
                'alt' => 'Brand identity, packaging, and print collateral visuals',
                'accordion_alt' => 'Minimal illustration of logo design, brand guidelines, and packaging layout',
                'features' => [
                    'Logo & Brand Guidelines',
                    'Social Media Graphics',
                    'Marketing Collateral & Print',
                    'Packaging & Label Design',
                    'Brochures & Catalogues',
                ],
                'tools' => 'Photoshop, Illustrator, InDesign, Figma, Canva',
            ],
            [
                'id' => 'video',
                'num' => '05',
                'nav_title' => 'Video Production',
                'nav_desc' => 'Reels, films & motion graphics',
                'nav_icon' => 'videocam',
                'eyebrow' => 'MOTION & FILM',
                'dot_color' => '#18181B',
                'title' => 'Video Production',
                'card_title' => 'Video Production',
                'short_desc' => 'Social reels, corporate films, motion graphics, UGC, and AI filmmaking.',
                'full_desc' => 'Product reels, corporate shoots, ad edits, and explainer videos filmed and edited at our Bhavnagar Creative Studio.',
                'chips' => ['Reels', 'Commercials', 'Motion'],
                'cta_card' => 'Explore video',
                'cta_detail' => 'Explore Video Production',
                'route_name' => 'services.video',
                'anchor' => null,
                'img' => 'images/svc_05_video.jpg',
                'alt' => 'Video production and motion graphics reel visuals',
                'accordion_alt' => 'Minimal illustration of video production, editing timeline, and vertical reels',
                'features' => [
                    'Social Reels & Short-Form',
                    'Brand & Corporate Films',
                    'Video Ads & Commercials',
                    'Explainer & Story Videos',
                    'Motion Graphics & UGC',
                ],
                'tools' => 'Premiere Pro, After Effects, Filmora, Runway, Sora',
            ],
            [
                'id' => 'ecommerce',
                'num' => '06',
                'nav_title' => 'E-Commerce',
                'nav_desc' => 'Marketplace catalog & storefront ads',
                'nav_icon' => 'storefront',
                'eyebrow' => 'MARKETPLACE GROWTH',
                'dot_color' => '#A83300',
                'title' => 'E-commerce Management',
                'card_title' => 'E-Commerce',
                'short_desc' => 'End-to-end marketplace catalog, A+ content, storefront design, and ads.',
                'full_desc' => 'Account setup, catalog uploads, A+ listing copy, keyword tuning, and sponsored ads across major Indian and global marketplaces.',
                'chips' => ['Catalogs', 'A+ Content', 'Storefronts'],
                'cta_card' => 'Explore e-commerce',
                'cta_detail' => 'Explore E-Commerce',
                'route_name' => 'services.ecommerce',
                'anchor' => null,
                'img' => 'images/svc_06_ecommerce.jpg',
                'alt' => 'E-commerce storefront and marketplace optimization visuals',
                'accordion_alt' => 'Minimal illustration of online store catalog and marketplace growth',
                'features' => [
                    'Account Setup & Approval',
                    'Catalog & Category Management',
                    'Listing & Keyword SEO',
                    'A+ Content & Brand Stores',
                    'Sponsored Marketplace Ads',
                ],
                'tools' => 'Amazon, Flipkart, JioMart, Myntra, Etsy, Nykaa',
            ],
            [
                'id' => 'email',
                'num' => '07',
                'nav_title' => 'Email Marketing',
                'nav_desc' => 'Drip sequences & $36 avg. ROI',
                'nav_icon' => 'mail',
                'eyebrow' => 'RETENTION & AUTOMATION',
                'dot_color' => '#E85D2A',
                'title' => 'Email Marketing',
                'card_title' => 'Email Marketing',
                'short_desc' => 'Automated drip sequences, abandoned cart recovery, and seasonal campaigns.',
                'full_desc' => 'Welcome flows, abandoned-cart reminders, seasonal campaigns, and newsletters set up to keep past buyers coming back. [CONFIRM $36 ROI STAT SOURCE]',
                'chips' => ['Drip Flows', 'Cart Recovery', 'Campaigns'],
                'cta_card' => 'Explore email',
                'cta_detail' => 'Explore Email Marketing',
                'route_name' => 'services.email',
                'anchor' => null,
                'img' => 'images/svc_07_email.jpg',
                'alt' => 'Email automation and drip sequence visuals',
                'accordion_alt' => 'Minimal illustration of automated email drip sequences and customer retention',
                'features' => [
                    'Promotional & Festival Campaigns',
                    'Automated Drip Sequences',
                    'Welcome & Onboarding Flows',
                    'Abandoned Cart Recovery',
                    'Newsletter Design & Copy',
                ],
                'tools' => 'Mailchimp, Brevo, HubSpot, Klaviyo, Zoho Mail',
            ],
            [
                'id' => 'dev',
                'num' => '08',
                'nav_title' => 'Web & App Dev',
                'nav_desc' => 'Responsive sites & custom builds',
                'nav_icon' => 'code',
                'eyebrow' => 'WEB & PRODUCT ENGINEERING',
                'dot_color' => '#18181B',
                'title' => 'Web & App Development',
                'card_title' => 'Web & App Dev',
                'short_desc' => 'Responsive websites, mobile apps, custom software, and e-commerce builds.',
                'full_desc' => 'Business websites, Shopify/WordPress stores, mobile apps, and custom internal software built and maintained in-house.',
                'chips' => ['Websites', 'Mobile Apps', 'Custom Dev'],
                'cta_card' => 'Explore web & apps',
                'cta_detail' => 'Explore Web & App Dev',
                'route_name' => 'services.dev',
                'anchor' => null,
                'img' => 'images/svc_08_dev.jpg',
                'alt' => 'Website and application development showcase visuals',
                'accordion_alt' => 'Minimal illustration of responsive website and mobile app engineering',
                'features' => [
                    'Responsive Web Design',
                    'Mobile App Development',
                    'eCommerce Development',
                    'Front-End & Back-End Builds',
                    'Custom Software Solutions',
                ],
                'tools' => 'WordPress, React, Node.js, Angular, Flutter, Shopify, PHP, AWS',
            ],
        ];
    }

    /**
     * All six published portfolio case studies.
     *
     * @return array<string, array<string, mixed>>
     */
    public static function caseStudies(): array
    {
        return [
            'aabo' => [
                'slug' => 'aabo',
                'name' => 'aabo.',
                'categories' => 'iot',
                'industry' => 'Tech & Product',
                'services' => '[ADD SERVICES DELIVERED]',
                'description' => 'Case study, campaign video, and poster gallery for aabo. with Sphinix Marketing.',
                'summary' => '[ADD VERIFIED CASE STUDY FOR AABO.: COMPANY BACKGROUND, CAMPAIGN CHALLENGE, WHAT SPHINIX MARKETING BUILT, AND OUTCOME]',
                'cover' => 'images/work/aabo-cover.png',
                'slides' => [
                    'images/work/aabo-slide-1.png',
                    'images/work/aabo-slide-2.png',
                    'images/work/aabo-slide-3.png',
                ],
                'has_dot_mark' => true,
            ],
            'weconnect-care' => [
                'slug' => 'weconnect-care',
                'name' => 'WeConnect Care',
                'categories' => 'healthcare',
                'industry' => 'Healthcare & Services',
                'services' => '[ADD SERVICES DELIVERED]',
                'description' => 'Case study, campaign video, and poster gallery for WeConnect Care with Sphinix Marketing.',
                'summary' => '[ADD VERIFIED CASE STUDY FOR WECONNECT CARE: COMPANY BACKGROUND, CAMPAIGN CHALLENGE, WHAT SPHINIX MARKETING BUILT, AND OUTCOME]',
                'cover' => 'images/work/weconnect-care-cover.png',
                'slides' => [
                    'images/work/weconnect-care-slide-1.png',
                    'images/work/weconnect-care-slide-2.png',
                    'images/work/weconnect-care-slide-3.png',
                ],
                'has_dot_mark' => false,
            ],
            'saurashtra-group' => [
                'slug' => 'saurashtra-group',
                'name' => 'Saurashtra Group',
                'categories' => 'industrial',
                'industry' => 'Manufacturing & Trade',
                'services' => '[ADD SERVICES DELIVERED]',
                'description' => 'Case study, campaign video, and poster gallery for Saurashtra Group with Sphinix Marketing.',
                'summary' => '[ADD VERIFIED CASE STUDY FOR SAURASHTRA GROUP: COMPANY BACKGROUND, CAMPAIGN CHALLENGE, WHAT SPHINIX MARKETING BUILT, AND OUTCOME]',
                'cover' => 'images/work/saurashtra-group-cover.png',
                'slides' => [
                    'images/work/saurashtra-group-slide-1.png',
                    'images/work/saurashtra-group-slide-2.png',
                    'images/work/saurashtra-group-slide-3.png',
                ],
                'has_dot_mark' => false,
            ],
            'veer-jewellers' => [
                'slug' => 'veer-jewellers',
                'name' => 'Veer Jewellers',
                'categories' => 'jewelry ecommerce',
                'industry' => 'Jewelry & Retail',
                'services' => '[ADD SERVICES DELIVERED]',
                'description' => 'Case study, campaign video, and poster gallery for Veer Jewellers with Sphinix Marketing.',
                'summary' => '[ADD VERIFIED CASE STUDY FOR VEER JEWELLERS: COMPANY BACKGROUND, CAMPAIGN CHALLENGE, WHAT SPHINIX MARKETING BUILT, AND OUTCOME]',
                'cover' => 'images/work/veer-jewellers-cover.png',
                'slides' => [
                    'images/work/veer-jewellers-slide-1.png',
                    'images/work/veer-jewellers-slide-2.png',
                    'images/work/veer-jewellers-slide-3.png',
                ],
                'has_dot_mark' => false,
            ],
            'kothari-agencies' => [
                'slug' => 'kothari-agencies',
                'name' => 'Kothari Agencies',
                'categories' => 'industrial ecommerce',
                'industry' => 'Trade & Distribution',
                'services' => '[ADD SERVICES DELIVERED]',
                'description' => 'Case study, campaign video, and poster gallery for Kothari Agencies with Sphinix Marketing.',
                'summary' => '[ADD VERIFIED CASE STUDY FOR KOTHARI AGENCIES: COMPANY BACKGROUND, CAMPAIGN CHALLENGE, WHAT SPHINIX MARKETING BUILT, AND OUTCOME]',
                'cover' => 'images/work/kothari-agencies-cover.png',
                'slides' => [
                    'images/work/kothari-agencies-slide-1.png',
                    'images/work/kothari-agencies-slide-2.png',
                    'images/work/kothari-agencies-slide-3.png',
                ],
                'has_dot_mark' => false,
            ],
            'riyom-jewels' => [
                'slug' => 'riyom-jewels',
                'name' => 'Riyom Jewels',
                'categories' => 'jewelry',
                'industry' => 'Jewelry & Lifestyle',
                'services' => '[ADD SERVICES DELIVERED]',
                'description' => 'Case study, campaign video, and poster gallery for Riyom Jewels with Sphinix Marketing.',
                'summary' => '[ADD VERIFIED CASE STUDY FOR RIYOM JEWELS: COMPANY BACKGROUND, CAMPAIGN CHALLENGE, WHAT SPHINIX MARKETING BUILT, AND OUTCOME]',
                'cover' => 'images/work/riyom-jewels-cover.png',
                'slides' => [
                    'images/work/riyom-jewels-slide-1.png',
                    'images/work/riyom-jewels-slide-2.png',
                    'images/work/riyom-jewels-slide-3.png',
                ],
                'has_dot_mark' => false,
            ],
        ];
    }

    /**
     * Return 4 peer case studies for "Other Work" section.
     *
     * @return array<int, array<string, mixed>>
     */
    public static function otherCaseStudies(string $currentSlug): array
    {
        return array_slice(
            array_values(array_filter(self::caseStudies(), static fn (array $item): bool => $item['slug'] !== $currentSlug)),
            0,
            4
        );
    }

    /**
     * Work portfolio directory names (linked when a case study exists).
     *
     * @return array<int, array{name: string, slug: ?string}>
     */
    public static function clientDirectory(): array
    {
        return [
            ['name' => 'aabo.', 'slug' => 'aabo'],
            ['name' => 'WeConnect Care', 'slug' => 'weconnect-care'],
            ['name' => 'Saurashtra Group', 'slug' => 'saurashtra-group'],
            ['name' => 'Veer Jewellers', 'slug' => 'veer-jewellers'],
            ['name' => 'Oilenza', 'slug' => null],
            ['name' => 'Janmoti', 'slug' => null],
            ['name' => 'FunBun', 'slug' => null],
            ['name' => 'Kothari Agencies', 'slug' => 'kothari-agencies'],
            ['name' => 'Riyom Jewels', 'slug' => 'riyom-jewels'],
            ['name' => 'Pishi Holidays', 'slug' => null],
            ['name' => 'Satyam Travel', 'slug' => null],
            ['name' => 'Fruitamins', 'slug' => null],
            ['name' => 'Nikki', 'slug' => null],
            ['name' => 'NHOC', 'slug' => null],
            ['name' => 'Ganga', 'slug' => null],
            ['name' => 'HCP', 'slug' => null],
            ['name' => 'Swarn Mandir', 'slug' => null],
            ['name' => 'Elite Discoveries', 'slug' => null],
        ];
    }

    /**
     * Insights journal entries used on home & blog index.
     *
     * @return array<int, array<string, string>>
     */
    public static function insightsArticles(): array
    {
        return [
            ['category' => 'ads', 'label' => 'Paid Ads', 'title' => '[ADD REAL PAID ADS ARTICLE TITLE 01]', 'cta_route' => 'services.index', 'cta_hash' => '#google-ads'],
            ['category' => 'ads', 'label' => 'Paid Ads', 'title' => '[ADD REAL PAID ADS ARTICLE TITLE 02]', 'cta_route' => 'services.social', 'cta_hash' => ''],
            ['category' => 'ads', 'label' => 'Paid Ads', 'title' => '[ADD REAL PAID ADS ARTICLE TITLE 03]', 'cta_route' => 'services.index', 'cta_hash' => '#ecommerce'],
            ['category' => 'seo', 'label' => 'SEO & Organic', 'title' => '[ADD REAL SEO ARTICLE TITLE 01]', 'cta_route' => 'services.seo', 'cta_hash' => ''],
            ['category' => 'seo', 'label' => 'SEO & Organic', 'title' => '[ADD REAL SEO ARTICLE TITLE 02]', 'cta_route' => 'services.seo', 'cta_hash' => ''],
            ['category' => 'seo', 'label' => 'SEO & Organic', 'title' => '[ADD REAL SEO ARTICLE TITLE 03]', 'cta_route' => 'services.seo', 'cta_hash' => ''],
            ['category' => 'strategy', 'label' => 'Strategy & Systems', 'title' => '[ADD REAL STRATEGY ARTICLE TITLE 01]', 'cta_route' => 'products.index', 'cta_hash' => '#chatbox360'],
            ['category' => 'strategy', 'label' => 'Strategy & Systems', 'title' => '[ADD REAL STRATEGY ARTICLE TITLE 02]', 'cta_route' => 'services.index', 'cta_hash' => '#email'],
            ['category' => 'strategy', 'label' => 'Strategy & Systems', 'title' => '[ADD REAL STRATEGY ARTICLE TITLE 03]', 'cta_route' => 'work.show', 'cta_params' => ['slug' => 'aabo'], 'cta_hash' => ''],
        ];
    }
}
