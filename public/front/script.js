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
const searchInput = document.querySelector('.form-input');
searchInput.addEventListener('input', (e) => {
    const searchTerm = e.target.value.toLowerCase();
    const serviceCards = document.querySelectorAll('.service-card');
    
    serviceCards.forEach(card => {
        const title = card.querySelector('p').textContent.toLowerCase();
        if (title.includes(searchTerm)) {
            card.style.display = 'flex';
        } else {
            card.style.display = 'none';
        }
    });
});

// Button click handlers
document.querySelector('.register-btn').addEventListener('click', () => {
    alert('سيتم توجيهك إلى صفحة التسجيل');
});

document.querySelector('.provider-btn').addEventListener('click', () => {
    alert('سيتم توجيهك إلى صفحة تسجيل مقدمي الخدمات');
});

document.querySelector('.customer-btn').addEventListener('click', () => {
    alert('سيتم توجيهك إلى صفحة تسجيل العملاء');
});

// Initialize services when DOM is loaded
document.addEventListener('DOMContentLoaded', () => {
    populateServices();
}); 