{{-- ============================================================
     resources/views/Component/testimonials.blade.php
     Section: What People Say — team image + testimonials
     Usage: @include('Component.testimonials')
     ============================================================ --}}

@once
    @push('styles')
        <link rel="stylesheet" href="{{ asset('css/testimonials.css') }}">
    @endpush
@endonce

<section class="tst" id="testimonials" data-tst>
    {{-- Ambient glows --}}
    <div class="tst__glow tst__glow--1" aria-hidden="true"></div>
    <div class="tst__glow tst__glow--2" aria-hidden="true"></div>

    <div class="tst__inner">

        {{-- LEFT — Team image --}}
        <div class="tst__media" data-tst-reveal>
            <div class="tst__media-frame">
                <img src="{{ asset('Assets/img6.webp') }}"
                     alt="Team of consultants reviewing financial documents"
                     class="tst__media-img"
                     loading="lazy">
                <div class="tst__media-sheen" aria-hidden="true"></div>

                {{-- Floating metric badge --}}
                <div class="tst__metric glass-chip">
                    <span class="tst__metric-value">4.9<span>/5</span></span>
                    <span class="tst__metric-label">Average Rating</span>
                    <div class="tst__metric-stars">
                        <svg width="12" height="12" viewBox="0 0 24 24" fill="#FBBF24"><path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/></svg>
                        <svg width="12" height="12" viewBox="0 0 24 24" fill="#FBBF24"><path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/></svg>
                        <svg width="12" height="12" viewBox="0 0 24 24" fill="#FBBF24"><path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/></svg>
                        <svg width="12" height="12" viewBox="0 0 24 24" fill="#FBBF24"><path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/></svg>
                        <svg width="12" height="12" viewBox="0 0 24 24" fill="#FBBF24"><path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/></svg>
                    </div>
                </div>
            </div>
        </div>

        {{-- RIGHT — Testimonials --}}
        <div class="tst__content" data-tst-reveal>
            <div class="tst__eyebrow">
                <span class="tst__eyebrow-dot"></span>
                What People Say
            </div>

            <h2 class="tst__title">
                Trusted by <span class="tst__title-accent">Businesses</span> Across the UK
            </h2>

            {{-- Testimonial cards --}}
            <div class="tst__list">

                <article class="tst__card glass" data-tst-reveal>
                    <div class="tst__quote-mark">“</div>
                    <p class="tst__quote">
                        Tax Plus transformed how we handle our accounts. The team is
                        proactive, accurate, and genuinely invested in our success.
                        We've saved thousands with their advice.
                    </p>
                    <div class="tst__author">
                        <div class="tst__avatar">
                            <span>JM</span>
                        </div>
                        <div class="tst__author-info">
                            <strong>James Mitchell</strong>
                            <small>Director, Mitchell &amp; Co. Ltd</small>
                        </div>
                    </div>
                </article>

                <article class="tst__card glass" data-tst-reveal>
                    <div class="tst__quote-mark">“</div>
                    <p class="tst__quote">
                        When HMRC came calling, they handled everything. Calm, professional,
                        and completely on top of it. I can't recommend them enough.
                    </p>
                    <div class="tst__author">
                        <div class="tst__avatar tst__avatar--alt">
                            <span>SR</span>
                        </div>
                        <div class="tst__author-info">
                            <strong>Sarah Reynolds</strong>
                            <small>Founder, Reynolds Consulting</small>
                        </div>
                    </div>
                </article>

                <article class="tst__card glass" data-tst-reveal>
                    <div class="tst__quote-mark">“</div>
                    <p class="tst__quote">
                        Clear communication, sharp insights, and always a step ahead.
                        Exactly what you want from an accounting partner.
                    </p>
                    <div class="tst__author">
                        <div class="tst__avatar tst__avatar--alt2">
                            <span>DK</span>
                        </div>
                        <div class="tst__author-info">
                            <strong>David Khan</strong>
                            <small>Owner, Khan Retail Group</small>
                        </div>
                    </div>
                </article>

            </div>
        </div>

    </div>
</section>

@once
    @push('scripts')
        <script src="{{ asset('js/testimonials.js') }}" defer></script>
    @endpush
@endonce