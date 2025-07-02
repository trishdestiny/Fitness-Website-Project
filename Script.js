document.addEventListener('DOMContentLoaded', () => {
    // --- 1. Scroll-Triggered Animations ---
    const animatedElements = document.querySelectorAll('.reveal-on-scroll');

    if (animatedElements.length > 0) {
        const observerOptions = {
            root: null,
            rootMargin: '0px',
            threshold: 0.1
        };

        const observerCallback = (entries, observer) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('in-view');
                }
            });
        };

        const scrollObserver = new IntersectionObserver(observerCallback, observerOptions);

        animatedElements.forEach(el => {
            scrollObserver.observe(el);
        });
    }

    // --- 2. Sticky Header Style Change ---
    const header = document.querySelector('header');
    if (header) {
        window.addEventListener('scroll', () => {
            if (window.scrollY > 50) {
                header.classList.add('scrolled');
            } else {
                header.classList.remove('scrolled');
            }
        });
    }

    // --- 3. Mobile Navigation Toggle ---
    const mobileNavToggle = document.querySelector('.mobile-nav-toggle');
    const primaryNav = document.querySelector('.primary-navigation');

    if (mobileNavToggle && primaryNav) {
        mobileNavToggle.addEventListener('click', () => {
            const isVisible = primaryNav.getAttribute('data-visible') === 'true';
            primaryNav.setAttribute('data-visible', !isVisible);
            mobileNavToggle.setAttribute('aria-expanded', !isVisible);
            document.body.classList.toggle('no-scroll', !isVisible);
        });

        primaryNav.querySelectorAll('a').forEach(link => {
            link.addEventListener('click', () => {
                primaryNav.setAttribute('data-visible', false);
                mobileNavToggle.setAttribute('aria-expanded', false);
                document.body.classList.remove('no-scroll');
            });
        });

        document.addEventListener('click', (e) => {
            if (!primaryNav.contains(e.target) && !mobileNavToggle.contains(e.target) && primaryNav.getAttribute('data-visible') === 'true') {
                primaryNav.setAttribute('data-visible', false);
                mobileNavToggle.setAttribute('aria-expanded', false);
                document.body.classList.remove('no-scroll');
            }
        });
    }

    // --- 4. Card Tilt Effect ---
    const tiltCards = document.querySelectorAll('.tilt-card');

    tiltCards.forEach(card => {
        const maxTilt = 10;

        card.addEventListener('mousemove', (e) => {
            const cardRect = card.getBoundingClientRect();
            const centerX = cardRect.left + cardRect.width / 2;
            const centerY = cardRect.top + cardRect.height / 2;
            const tiltX = ((e.clientY - centerY) / (cardRect.height / 2)) * -maxTilt;
            const tiltY = ((e.clientX - centerX) / (cardRect.width / 2)) * maxTilt;
            card.style.transform = `perspective(1000px) rotateX(${tiltX}deg) rotateY(${tiltY}deg) scale3d(1.03, 1.03, 1.03)`;
        });

        card.addEventListener('mouseleave', () => {
            card.style.transform = 'perspective(1000px) rotateX(0deg) rotateY(0deg) scale3d(1, 1, 1)';
        });
    });

    // --- 5. Dark Mode Toggle ---
    const toggle = document.getElementById('darkToggle');
    const prefersDark = localStorage.getItem('nialinaDarkMode') === 'true';

    if (prefersDark) {
        document.body.classList.add('dark-mode');
        if (toggle) toggle.checked = true;
    }

    if (toggle) {
        toggle.addEventListener('change', () => {
            document.body.classList.toggle('dark-mode', toggle.checked);
            localStorage.setItem('nialinaDarkMode', toggle.checked);
        });
    }
});
