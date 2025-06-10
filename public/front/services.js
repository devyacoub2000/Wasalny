// Services data
const services = [
    {
        icon: '🚛',
        title: 'نقل العفش',
        image: 'https://images.unsplash.com/photo-1600513853492-fb82c97d1786?ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=60'
    },
    {
        icon: '🛠️',
        title: 'صيانة السيارات',
        image: 'https://images.unsplash.com/photo-1581091226825-a6a2a5aee158?ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=60'
    },
    {
        icon: '⚙️',
        title: 'قطع غيار',
        image: 'https://images.unsplash.com/photo-1607860108855-64acf2078ed9?ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=60'
    },
    {
        icon: '🚜',
        title: 'المعدات الثقيلة',
        image: 'https://images.unsplash.com/photo-1592982537447-7440770cbfc9?ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=60'
    },
    {
        icon: '🚚',
        title: 'شاحنات',
        image: 'https://images.unsplash.com/photo-1519003722824-194d4455a60c?ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=60'
    },
    {
        icon: '🚐',
        title: 'صهريج مياه',
        image: 'https://images.unsplash.com/photo-1581093458791-9f3c3900df4b?ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=60'
    },
    {
        icon: '🔧',
        title: 'إصلاح تكييف',
        image: 'https://images.unsplash.com/photo-1581093458791-9f3c3900df4b?ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=60'
    },
    {
        icon: '👨‍🏫',
        title: 'مدرس خصوصي',
        image: 'https://images.unsplash.com/photo-1503676260728-1c00da094a0b?ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=60'
    },
    {
        icon: '👷',
        title: 'عمال وحرفيين',
        image: 'https://images.unsplash.com/photo-1581093458791-9f3c3900df4b?ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=60'
    },
    {
        icon: '🌳',
        title: 'تنسيق حدائق',
        image: 'https://images.unsplash.com/photo-1581093458791-9f3c3900df4b?ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=60'
    },
    {
        icon: '🧼',
        title: 'خدمات تنظيف',
        image: 'https://images.unsplash.com/photo-1581093458791-9f3c3900df4b?ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=60'
    },
    {
        icon: '📸',
        title: 'كاميرا مراقبة',
        image: 'https://images.unsplash.com/photo-1581093458791-9f3c3900df4b?ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=60'
    },
    {
        icon: '🐜',
        title: 'مكافحة حشرات',
        image: 'https://images.unsplash.com/photo-1581093458791-9f3c3900df4b?ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=60'
    },
    {
        icon: '🥘',
        title: 'أكلات أسر منتجة',
        image: 'https://images.unsplash.com/photo-1581093458791-9f3c3900df4b?ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=60'
    },
    {
        icon: '🧴',
        title: 'فلاتر مياه',
        image: 'https://images.unsplash.com/photo-1581093458791-9f3c3900df4b?ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=60'
    },
    {
        icon: '🧱',
        title: 'مقاولات',
        image: 'https://images.unsplash.com/photo-1581093458791-9f3c3900df4b?ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=60'
    },
    {
        icon: '🎉',
        title: 'تجهيز حفلات',
        image: 'https://images.unsplash.com/photo-1581093458791-9f3c3900df4b?ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=60'
    },
    {
        icon: '🖥️',
        title: 'خدمات عامة',
        image: 'https://images.unsplash.com/photo-1581093458791-9f3c3900df4b?ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=60'
    },
    {
        icon: '📢',
        title: 'دعاية وإعلانات',
        image: 'https://images.unsplash.com/photo-1581093458791-9f3c3900df4b?ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=60'
    },
    {
        icon: '🧪',
        title: 'صناعة بلاستيك',
        image: 'https://images.unsplash.com/photo-1581093458791-9f3c3900df4b?ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=60'
    }
];

// Function to create service cards
function createServiceCard(service) {
    const card = document.createElement('div');
    card.className = 'flex flex-col gap-3 pb-3 service-card';
    
    card.innerHTML = `
        <div class="w-full bg-center bg-no-repeat aspect-square bg-cover rounded-lg relative overflow-hidden group" 
             style="background-image: url('${service.image}')">
            <div class="absolute inset-0 bg-black bg-opacity-40 opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-center justify-center">
                <span class="text-white text-4xl">${service.icon}</span>
            </div>
        </div>
        <p class="text-[#0d141c] text-base font-medium leading-normal text-center">${service.title}</p>
    `;
    
    return card;
}

// Function to populate services grid
function populateServices() {
    const servicesGrid = document.getElementById('services-grid');
    services.forEach(service => {
        servicesGrid.appendChild(createServiceCard(service));
    });
}

// Search functionality
const searchInputs = document.querySelectorAll('.search-input');
searchInputs.forEach(input => {
    input.addEventListener('input', function(e) {
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
});

// Filter buttons functionality
const filterButtons = document.querySelectorAll('.filter-btn');
filterButtons.forEach(button => {
    button.addEventListener('click', function() {
        // Remove active class from all buttons
        filterButtons.forEach(btn => btn.classList.remove('active'));
        // Add active class to clicked button
        this.classList.add('active');

        const filter = this.textContent.toLowerCase();
        const serviceCards = document.querySelectorAll('.service-card');

        if (filter === 'الكل') {
            serviceCards.forEach(card => card.style.display = 'flex');
        } else if (filter === 'القريب') {
            // Simulate nearby services (random for demo)
            serviceCards.forEach(card => {
                card.style.display = Math.random() > 0.5 ? 'flex' : 'none';
            });
        } else if (filter === 'الأكثر طلباً') {
            // Simulate popular services (random for demo)
            serviceCards.forEach(card => {
                card.style.display = Math.random() > 0.3 ? 'flex' : 'none';
            });
        }
    });
});

// Post request button click handler
const postRequestBtn = document.querySelector('.btn-primary');
if (postRequestBtn) {
    postRequestBtn.addEventListener('click', function() {
        alert('سيتم توجيهك إلى صفحة نشر الطلب');
        console.log('Post request button clicked');
    });
}

// Service card click handler
const serviceCards = document.querySelectorAll('.service-card');
serviceCards.forEach(card => {
    card.addEventListener('click', function() {
        const serviceName = this.querySelector('p').textContent;
        window.location.href = `service-details.html?service=${encodeURIComponent(serviceName)}`;
    });

    // Add hover effects
    card.addEventListener('mouseenter', function() {
        this.style.transform = 'translateY(-5px)';
        this.style.boxShadow = '0 4px 6px rgba(0, 0, 0, 0.1)';
    });

    card.addEventListener('mouseleave', function() {
        this.style.transform = 'translateY(0)';
        this.style.boxShadow = 'none';
    });
});

// Header search functionality
const headerSearchInput = document.querySelector('header .form-input');
if (headerSearchInput) {
    headerSearchInput.addEventListener('input', function(e) {
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

// Add loading animation for images
const serviceImages = document.querySelectorAll('.service-image');
serviceImages.forEach(image => {
    image.style.opacity = '0';
    image.style.transition = 'opacity 0.3s ease-in-out';
    
    // Simulate image loading
    setTimeout(() => {
        image.style.opacity = '1';
    }, Math.random() * 500);
});

// Add keyboard navigation for service cards
serviceCards.forEach(card => {
    card.setAttribute('tabindex', '0');
    card.addEventListener('keydown', function(e) {
        if (e.key === 'Enter' || e.key === ' ') {
            e.preventDefault();
            this.click();
        }
    });
});

// Initialize services when DOM is loaded
document.addEventListener('DOMContentLoaded', () => {
    populateServices();
}); 