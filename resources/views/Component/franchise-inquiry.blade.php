{{-- ============================================================
     resources/views/Component/franchise-inquiry.blade.php
     Franchise offer + Inquiry form
     Usage: @include('Component.franchise-inquiry')
     ============================================================ --}}

@once
    @push('styles')
        <link rel="stylesheet" href="{{ asset('css/franchise-inquiry.css') }}">
    @endpush
@endonce

<section class="frq" id="franchise-inquiry" data-frq>
    {{-- Ambient glows --}}
    <div class="frq__glow frq__glow--1" aria-hidden="true"></div>
    <div class="frq__glow frq__glow--2" aria-hidden="true"></div>

    <div class="frq__inner">

        {{-- LEFT — Franchise pitch --}}
        <div class="frq__pitch" data-frq-reveal>

            {{-- Woman image — floating, with soft glow --}}
            <div class="frq__hero">
                <div class="frq__hero-glow" aria-hidden="true"></div>
                <img src="{{ asset('Assets/img7.webp') }}"
                     alt="Professional business consultant"
                     class="frq__hero-img"
                     loading="lazy">
            </div>

            {{-- Headline --}}
            <h2 class="frq__headline">
                Tax Plus Accounting is now offering
                <span class="frq__headline-accent">financial and tax franchises</span>
                across the UK!
            </h2>

            {{-- Logo --}}
            <div class="frq__logo-wrap">
                <img src="{{ asset('Assets/img2.png') }}"
                     alt="Tax Plus Accounting"
                     class="frq__logo-img">
            </div>

            {{-- Subheadline --}}
            <p class="frq__sub">
                Let us make <span class="frq__sub-accent">our success</span> into <span class="frq__sub-accent">your success</span>!
            </p>

            {{-- Info chips --}}
            <div class="frq__info-chips">
                <div class="frq__chip frq__chip--amber">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none"
                         stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <circle cx="12" cy="12" r="10"/>
                        <line x1="12" y1="16" x2="12" y2="12"/>
                        <line x1="12" y1="8" x2="12.01" y2="8"/>
                    </svg>
                    <span>TaxPlus Information</span>
                </div>
                <a href="tel:0203900406" class="frq__chip frq__chip--blue">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none"
                         stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"/>
                    </svg>
                    <span>0203900406</span>
                </a>
            </div>

        </div>

        {{-- RIGHT — Inquiry form --}}
        <div class="frq__form-wrap" data-frq-reveal>
            <div class="frq__form-card glass">

                <div class="frq__form-head">
                    <span class="frq__form-dot"></span>
                    <h3 class="frq__form-title">Tax Plus Accounting Inquiry</h3>
                </div>

                <form class="frq__form" method="POST" action="{{ url('/contact') }}">
                    @csrf

                    <div class="frq__row frq__row--2">
                        <div class="frq__field">
                            <label class="frq__label" for="frq-first">First Name</label>
                            <input class="frq__input" id="frq-first" type="text" name="first_name" placeholder="First Name" required>
                        </div>
                        <div class="frq__field">
                            <label class="frq__label" for="frq-last">Last Name</label>
                            <input class="frq__input" id="frq-last" type="text" name="last_name" placeholder="Last Name" required>
                        </div>
                    </div>

                    <div class="frq__field">
                        <label class="frq__label" for="frq-email">Email</label>
                        <input class="frq__input" id="frq-email" type="email" name="email" placeholder="Email" required>
                    </div>

                    <div class="frq__field">
                        <label class="frq__label" for="frq-phone">Phone</label>
                        <input class="frq__input" id="frq-phone" type="tel" name="phone" placeholder="Phone" required>
                    </div>

                    <div class="frq__row frq__row--2">
                        <div class="frq__field">
                            <label class="frq__label" for="frq-city">City</label>
                            <input class="frq__input" id="frq-city" type="text" name="city" placeholder="City">
                        </div>
                        <div class="frq__field">
                            <label class="frq__label" for="frq-state">State</label>
                            <input class="frq__input" id="frq-state" type="text" name="state" placeholder="State">
                        </div>
                    </div>

                    <div class="frq__field">
                        <label class="frq__label" for="frq-comments">Comments/Questions</label>
                        <textarea class="frq__input frq__textarea" id="frq-comments" name="comments" placeholder="Comments/Questions" rows="4"></textarea>
                    </div>

                    <button type="submit" class="frq__submit">
                        <span class="frq__submit-label">Submit Your Inquiry</span>
                        <span class="frq__submit-flash" aria-hidden="true"></span>
                    </button>

                </form>

            </div>
        </div>

    </div>
</section>

@once
    @push('scripts')
        <script src="{{ asset('js/franchise-inquiry.js') }}" defer></script>
    @endpush
@endonce