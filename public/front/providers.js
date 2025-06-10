// Providers page functionality
document.addEventListener('DOMContentLoaded', function() {
    // Search functionality
    const searchInput = document.querySelector('input[placeholder="البحث عن مزودي الخدمات"]');
    if (searchInput) {
        searchInput.addEventListener('input', function(e) {
            const searchTerm = e.target.value.toLowerCase();
            filterProviders(searchTerm);
        });
    }

    // Filter providers based on search term
    function filterProviders(searchTerm) {
        const providerCards = document.querySelectorAll('.flex.items-stretch.justify-between.gap-4.rounded-lg');
        providerCards.forEach(card => {
            const providerName = card.querySelector('.text-base.font-bold').textContent.toLowerCase();
            const providerDesc = card.querySelector('.text-sm.font-normal').textContent.toLowerCase();
            
            if (providerName.includes(searchTerm) || providerDesc.includes(searchTerm)) {
                card.style.display = 'flex';
            } else {
                card.style.display = 'none';
            }
        });
    }

    // View Profile button handlers
    const viewProfileButtons = document.querySelectorAll('button span.truncate');
    viewProfileButtons.forEach(button => {
        if (button.textContent === 'عرض الملف الشخصي') {
            button.parentElement.addEventListener('click', function() {
                const providerName = this.closest('.flex.items-stretch').querySelector('.text-base.font-bold').textContent;
                // Here you would typically navigate to the provider's profile page
                console.log('Viewing profile for:', providerName);
                alert(`جاري عرض الملف الشخصي لـ ${providerName}`);
            });
        }
    });

    // Post a Job button handler
    const postJobButton = document.querySelector('button span.truncate');
    if (postJobButton && postJobButton.textContent === 'نشر طلب') {
        postJobButton.parentElement.addEventListener('click', function() {
            // Here you would typically navigate to the job posting page
            console.log('Navigating to job posting page');
            alert('جاري الانتقال إلى صفحة نشر الطلب');
        });
    }

    // Register as Provider button handler
    const registerButton = document.querySelector('button span.truncate');
    if (registerButton && registerButton.textContent === 'التسجيل كمزود خدمة') {
        registerButton.parentElement.addEventListener('click', function() {
            // Here you would typically navigate to the provider registration page
            console.log('Navigating to provider registration page');
            alert('جاري الانتقال إلى صفحة تسجيل مزود الخدمة');
        });
    }

    // Featured providers scroll functionality
    const featuredProviders = document.querySelector('.flex.overflow-y-auto');
    if (featuredProviders) {
        let isDown = false;
        let startX;
        let scrollLeft;

        featuredProviders.addEventListener('mousedown', (e) => {
            isDown = true;
            featuredProviders.style.cursor = 'grabbing';
            startX = e.pageX - featuredProviders.offsetLeft;
            scrollLeft = featuredProviders.scrollLeft;
        });

        featuredProviders.addEventListener('mouseleave', () => {
            isDown = false;
            featuredProviders.style.cursor = 'grab';
        });

        featuredProviders.addEventListener('mouseup', () => {
            isDown = false;
            featuredProviders.style.cursor = 'grab';
        });

        featuredProviders.addEventListener('mousemove', (e) => {
            if (!isDown) return;
            e.preventDefault();
            const x = e.pageX - featuredProviders.offsetLeft;
            const walk = (x - startX) * 2;
            featuredProviders.scrollLeft = scrollLeft - walk;
        });
    }
}); 