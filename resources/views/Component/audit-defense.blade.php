{{-- ============================================================
     resources/views/Component/audit-defense.blade.php
     Ambient Focus — cinematic text over full image
     Usage: @include('Component.audit-defense')
     ============================================================ --}}

@once
    @push('styles')
        <link rel="stylesheet" href="{{ asset('css/audit-defense.css') }}">
    @endpush
@endonce

<section class="audit" id="audit-defense" data-audit>

    {{-- Full-bleed image --}}
    <div class="audit__bg" aria-hidden="true">
        <img src="{{ asset('Assets/img5.jpg') }}"
             alt=""
             class="audit__bg-img"
             loading="lazy">
        <div class="audit__bg-tint"></div>
        <div class="audit__bg-vignette"></div>
    </div>

    {{-- Centered content over the image --}}
    <div class="audit__inner">
        {{-- Ambient spotlight behind text --}}
        <div class="audit__spotlight" aria-hidden="true"></div>

        <div class="audit__content">

            {{-- Eyebrow --}}
            <div class="audit__eyebrow" data-audit-reveal>
                <span class="audit__eyebrow-dot"></span>
                Audit Defense &amp; HMRC Representation
            </div>

            {{-- Headline --}}
            <h2 class="audit__title" data-audit-reveal>
                Audit Defense You Can Trust
                <span class="audit__title-block">for Complete Peace of Mind</span>
            </h2>

            {{-- Amber divider --}}
            <div class="audit__divider" data-audit-reveal></div>

            {{-- Subheadline --}}
            <p class="audit__text" data-audit-reveal>
                Protect your finances with expert-backed audit defense services and
                minimize the impact of HMRC notices. We represent you directly —
                handling every inquiry, every letter, every meeting.
            </p>

            {{-- CTAs --}}
            <div class="audit__cta-row" data-audit-reveal>
                <a href="{{ url('/contact') }}" class="audit__cta">
                    <span class="audit__cta-label">Speak With an Expert</span>
                    <span class="audit__cta-flash" aria-hidden="true"></span>
                </a>
                <a href="{{ url('/services') }}" class="audit__cta-ghost">
                    Explore Services
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none"
                         stroke="currentColor" stroke-width="2" aria-hidden="true">
                        <path d="M5 12h14M12 5l7 7-7 7"/>
                    </svg>
                </a>
            </div>

            {{-- Contact strip --}}
            <div class="audit__contacts" data-audit-reveal>
                <a href="tel:07432205568" class="audit__contact">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none"
                         stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"/>
                    </svg>
                    <span>07432205568</span>
                </a>
                <span class="audit__contact-divider">|</span>
                <a href="tel:02039300406" class="audit__contact">
                    <span>02039300406</span>
                </a>
                <span class="audit__contact-divider">|</span>
                <a href="mailto:taxplusaccounting@yahoo.com" class="audit__contact">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none"
                         stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/>
                        <polyline points="22,6 12,13 2,6"/>
                    </svg>
                    <span>taxplusaccounting@yahoo.com</span>
                </a>
            </div>

        </div>
    </div>

</section>

@once
    @push('scripts')
        <script src="{{ asset('js/audit-defense.js') }}" defer></script>
    @endpush
@endonce