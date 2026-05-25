import Alpine from 'alpinejs';
import intersect from '@alpinejs/intersect';

Alpine.plugin(intersect);

Alpine.data('portfolio', () => ({
    activeSection: 'hero',
    mobileMenu: false,
    contactLoading: false,
    toast: { show: false, message: '', type: 'success' },

    initScrollSpy() {
        const sections = document.querySelectorAll('section[id]');
        const observer = new IntersectionObserver(
            (entries) => {
                entries.forEach((entry) => {
                    if (entry.isIntersecting) {
                        this.activeSection = entry.target.id;
                    }
                });
            },
            { rootMargin: '-20% 0px -70% 0px' }
        );
        sections.forEach((section) => observer.observe(section));
    },

    scrollTo(id) {
        const el = document.getElementById(id);
        if (el) {
            el.scrollIntoView({ behavior: 'smooth', block: 'start' });
        }
    },

    async submitContact(event) {
        this.contactLoading = true;
        const form = event.target;
        const formData = new FormData(form);

        try {
            const response = await fetch('/contact', {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                    'Accept': 'application/json',
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify(Object.fromEntries(formData)),
            });

            const data = await response.json();

            if (response.ok) {
                this.showToast(data.message || 'Message sent successfully!', 'success');
                form.reset();
            } else {
                const errors = data.errors ? Object.values(data.errors).flat().join(' ') : 'Something went wrong.';
                this.showToast(errors, 'error');
            }
        } catch {
            this.showToast('Failed to send message. Please try again.', 'error');
        } finally {
            this.contactLoading = false;
        }
    },

    showToast(message, type = 'success') {
        this.toast = { show: true, message, type };
        setTimeout(() => { this.toast.show = false; }, 4000);
    },
}));

Alpine.start();
