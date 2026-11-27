@php
    $formats = [
        ['num' => '01', 'title' => 'Social Media Reels & Short-Form Content', 'desc' => 'Vertical hooks, studio shoots, and crisp rhythmic edits tailored for Instagram Reels and YouTube Shorts.'],
        ['num' => '02', 'title' => 'Brand & Corporate Films', 'desc' => 'Factory tours, founder stories, hospital walkthroughs, and company capability films.'],
        ['num' => '03', 'title' => 'Video Ads & Commercials', 'desc' => 'Conversion-focused video creatives paced for Meta, YouTube, and digital performance campaigns.'],
        ['num' => '04', 'title' => 'Explainer & Story-Driven Videos', 'desc' => 'Clear product walkthroughs and visual narratives explaining complex offerings simply.'],
        ['num' => '05', 'title' => 'Motion Graphics & Animation', 'desc' => '2D animated UI callouts, kinetic typography, logo reveals, and data visualizers.'],
        ['num' => '06', 'title' => 'UGC Videos', 'desc' => 'Creator-led product demonstrations and authentic conversational reviews built for social feeds.'],
        ['num' => '07', 'title' => 'Podcast Videos', 'desc' => 'Multi-camera studio recording, clean audio mastering, and clipped highlight reels.'],
        ['num' => '08', 'title' => 'AI Filmmaking', 'desc' => 'Next-generation AI-assisted visual sequences blending live-action shoots with generative scenes.'],
    ];
    $tools = ['Adobe Premiere Pro', 'Adobe After Effects', 'Filmora', 'Canva', 'Runway', 'Sora', 'ChatGPT', '& More Technologies'];
    $steps = [
        ['num' => '01', 'title' => 'Brief & Concept', 'desc' => 'Align on target platform, visual tone, messaging objectives, and distribution channels.'],
        ['num' => '02', 'title' => 'Script & Storyboard', 'desc' => 'Map scene flow, hooks, voiceover lines, shoot checklist, and on-screen callouts.'],
        ['num' => '03', 'title' => 'Shoot & Editing', 'desc' => 'Film at our Bhavnagar Creative Studio or client site, followed by cuts, color, and motion design.'],
        ['num' => '04', 'title' => 'Review & Revisions', 'desc' => 'Fine-tune pacing, captions, aspect ratios, and feedback notes before sign-off.'],
        ['num' => '05', 'title' => 'Final Delivery', 'desc' => 'Export high-bitrate masters across horizontal (16:9) and vertical (9:16) formats.'],
    ];
@endphp
<x-layouts.app
    title="Video Production — Sphinix Marketing | Reels, Corporate Films & Motion"
    description="Social media reels, corporate films, video ads, explainer videos, motion graphics, UGC, podcasts, and AI filmmaking from Sphinix Marketing."
    active-nav="services">

    <x-services.hero
        service-num="05"
        service-name="Video Production"
        headline="Visual stories that"
        accent-word="capture attention."
        description="We turn ideas into visual stories that capture attention, build emotion and drive action across every platform."
        cta-label="Plan a Video Shoot"
        tools-summary="Premiere Pro · After Effects · Canva · Runway · Sora"
        image="images/svc_05_video.jpg"
        image-alt="Video production, editing timeline, and vertical reels workflow illustration" />

    <!-- Studio Formats -->
    <section class="py-20 px-6 bg-[#FFFFFF] border-b border-[#E4E4E7]">
        <div class="max-w-7xl mx-auto flex flex-col gap-12">
            <div class="flex flex-col md:flex-row md:items-end justify-between gap-6">
                <div class="flex flex-col gap-2 max-w-2xl">
                    <span class="font-mono text-[11.5px] font-semibold uppercase tracking-[0.08em] text-[#A83300]">Creative Studio · Mokhdaji Circle</span>
                    <h2 data-reveal class="font-display font-bold text-[30px] sm:text-[36px] leading-[1.12] tracking-[-0.025em] text-[#18181B]">
                        Eight video &amp; motion formats.
                    </h2>
                </div>
                <p class="font-body text-[15px] text-[#52525B] max-w-md">
                    Video is the most consumed content format today—our team creates scroll-stopping reels and films strategically crafted for brand growth.
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-x-12 lg:gap-x-16 border-t border-[#D4D0C8]">
                @foreach ($formats as $idx => $item)
                    <div data-reveal style="--stagger: {{ $idx % 4 }};" class="py-7 border-b border-[#D4D0C8] flex flex-col gap-2">
                        <h3 class="font-title font-bold text-[21px] text-[#18181B]">{{ $item['title'] }}</h3>
                        <p class="font-body text-[15px] leading-[1.6] text-[#52525B]">{{ $item['desc'] }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Studio Capabilities + Technologies -->
    <section class="py-20 px-6 bg-light-surface border-b border-light-outline-variant">
        <div class="max-w-7xl mx-auto grid grid-cols-1 lg:grid-cols-12 gap-12 items-center">
            <div class="lg:col-span-6 flex flex-col gap-4">
                <h2 data-reveal class="font-headline text-headline-lg text-light-on-surface">
                    Filmed, edited, and color-graded in-house.
                </h2>
                <p class="font-body text-body-md text-light-on-surface-variant">
                    From monthly reel retainers for clinics, jewelry houses, and manufacturers to commercial product launches, our Creative Studio handles scripting, shooting, motion graphics, and final platform cuts under one roof.
                </p>
            </div>

            <div class="lg:col-span-6 bg-white border border-[#D4D0C8] p-8 flex flex-col gap-4">
                <span class="font-mono text-[11.5px] uppercase tracking-[0.08em] text-[#52525B]">Technologies That We Use</span>
                <div class="flex flex-wrap gap-2">
                    @foreach ($tools as $tool)
                        <span class="px-3.5 py-2 bg-[#F7F6F4] border border-[#E4E4E7] font-mono text-[12.5px] text-[#18181B]">{{ $tool }}</span>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    <x-services.process-band
        heading="The 5-step video production process."
        :steps="$steps"
        note="(Note: Video production timelines may vary depending on project scope, shoot requirements and revision cycles.)" />

    <x-services.other-services current-slug="video" />

    <x-section-cta
        variant="warm"
        title="Ready to plan your next shoot or reels retainer?"
        description="Visit our Creative Studio at Mokhdaji Circle or send us your brief to schedule production."
        primary-label="Plan a Video Shoot"
        :primary-href="route('contact.show')" />

</x-layouts.app>
