{{-- ============================================================
     resources/views/Component/tax-benefits.blade.php
     Section: "Maximize your Tax Deduction"
     Usage: @include('Component.tax-benefits')
     ============================================================ --}}

@once
    @push('styles')
        <link rel="stylesheet" href="{{ asset('css/tax-benefits.css') }}">
    @endpush
@endonce

<section class="taxb" id="tax-benefits" data-taxb>
    {{-- Ambient background glow --}}
    <div class="taxb__glow taxb__glow--1" aria-hidden="true"></div>
    <div class="taxb__glow taxb__glow--2" aria-hidden="true"></div>

    <div class="taxb__inner">

        {{-- LEFT — Image --}}
        <div class="taxb__media" data-taxb-reveal>
            <div class="taxb__media-frame">
                <img src="{{ asset('Assets/img4.webp') }}"
                     alt="Accountant reviewing tax documents with a client"
                     class="taxb__media-img"
                     loading="lazy">
                <div class="taxb__media-sheen" aria-hidden="true"></div>
            </div>

            {{-- Floating glass badge --}}
            <div class="taxb__badge glass-chip">
                <span class="taxb__badge-dot"></span>
                <span class="taxb__badge-text">
                    <strong>Maximized</strong>
                    <small>Every deduction. Every time.</small>
                </span>
            </div>
        </div>

        {{-- RIGHT — Content card --}}
        <div class="taxb__content" data-taxb-reveal>
            <div class="taxb__card glass">

                <div class="taxb__eyebrow">
                    <span class="taxb__eyebrow-dot"></span>
                    Maximize your Tax Deduction
                </div>

                <h2 class="taxb__title">
                    How can I ensure I'm getting the maximum <span class="taxb__title-accent">tax benefits</span>?
                </h2>

                <p class="taxb__text">
                    By partnering with a professional tax expert, you can uncover hidden
                    deductions, credits, and benefits that a basic tax preparer might miss.
                    Our team at TaxPlus Accounting ensures that every potential tax-saving
                    opportunity is fully utilized.
                </p>

                <div class="taxb__cta-row">
                    <a href="{{ url('/contact') }}" class="taxb__cta">
                        <span class="taxb__cta-label">Get a Free Consultation</span>
                        <span class="taxb__cta-flash" aria-hidden="true"></span>
                    </a>
                    <a href="{{ url('/services') }}" class="taxb__cta-ghost">
                        Learn more
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none"
                             stroke="currentColor" stroke-width="2" aria-hidden="true">
                            <path d="M5 12h14M12 5l7 7-7 7"/>
                        </svg>
                    </a>
                </div>

            </div>
        </div>

    </div>
</section>

@once
    @push('scripts')
        <script src="{{ asset('js/tax-benefits.js') }}" defer></script>
    @endpush
@endonce