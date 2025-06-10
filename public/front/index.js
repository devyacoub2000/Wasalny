document.addEventListener('DOMContentLoaded', function() {
    // Search functionality
    const searchInput = document.querySelector('.search-input');
    if (searchInput) {
        searchInput.addEventListener('input', function(e) {
            const searchTerm = e.target.value.toLowerCase();
            const serviceCards = document.querySelectorAll('.service-card');
            
            serviceCards.forEach(card => {
                const serviceName = card.querySelector('p').textContent.toLowerCase();
                if (serviceName.includes(searchTerm)) {
                    card.style.display = 'flex';
                } else {
                    card.style.display = 'none';
                }
            });
        });
    }

    // Register button click handler
    const registerBtn = document.querySelector('.btn-primary');
    if (registerBtn) {
        registerBtn.addEventListener('click', function() {
            alert('سيتم توجيهك إلى صفحة التسجيل');
            console.log('Register button clicked');
        });
    }

    // Service card click handler
    const serviceCards = document.querySelectorAll('.service-card');
    serviceCards.forEach(card => {
        card.addEventListener('click', function() {
            const serviceName = this.querySelector('p').textContent;
            window.location.href = `service-details.html?service=${encodeURIComponent(serviceName)}`;
        });
    });

    // Join network buttons
    const providerBtn = document.querySelector('.join-buttons .btn-primary');
    const customerBtn = document.querySelector('.join-buttons .btn-secondary');

    if (providerBtn) {
        providerBtn.addEventListener('click', function() {
            alert('سيتم توجيهك إلى صفحة تسجيل مزودي الخدمات');
            console.log('Register as provider clicked');
        });
    }

    if (customerBtn) {
        customerBtn.addEventListener('click', function() {
            alert('سيتم توجيهك إلى صفحة تسجيل العملاء');
            console.log('Register as customer clicked');
        });
    }

    // Add hover effects to service cards
    serviceCards.forEach(card => {
        card.addEventListener('mouseenter', function() {
            this.style.transform = 'translateY(-5px)';
            this.style.boxShadow = '0 4px 6px rgba(0, 0, 0, 0.1)';
        });

        card.addEventListener('mouseleave', function() {
            this.style.transform = 'translateY(0)';
            this.style.boxShadow = 'none';
        });
    });

    // Smooth scroll for navigation links
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            e.preventDefault();
            const target = document.querySelector(this.getAttribute('href'));
            if (target) {
                target.scrollIntoView({
                    behavior: 'smooth'
                });
            }
        });
    });
}); 