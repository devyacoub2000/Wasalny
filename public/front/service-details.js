// Service details page functionality
document.addEventListener('DOMContentLoaded', function() {
    // Form submission handler
    const requestForm = document.querySelector('form');
    const submitButton = document.querySelector('button[type="submit"]');

    if (submitButton) {
        submitButton.addEventListener('click', function(e) {
            e.preventDefault();
            
            // Get form values
            const name = document.querySelector('input[placeholder="أدخل اسمك"]').value;
            const email = document.querySelector('input[placeholder="أدخل بريدك الإلكتروني"]').value;
            const phone = document.querySelector('input[placeholder="أدخل رقم هاتفك"]').value;
            const address = document.querySelector('input[placeholder="أدخل عنوانك"]').value;
            const date = document.querySelector('input[placeholder="اختر تاريخ النقل"]').value;
            const notes = document.querySelector('textarea').value;

            // Validate form
            if (!name || !email || !phone || !address || !date) {
                alert('الرجاء ملء جميع الحقول المطلوبة');
                return;
            }

            // Here you would typically send the data to your backend
            console.log('Service Request:', {
                name,
                email,
                phone,
                address,
                date,
                notes
            });

            // Show success message
            alert('تم إرسال طلبك بنجاح! سنتواصل معك قريباً.');
            
            // Reset form
            document.querySelectorAll('input, textarea').forEach(input => {
                input.value = '';
            });
        });
    }

    // Date input handler
    const dateInput = document.querySelector('input[placeholder="اختر تاريخ النقل"]');
    if (dateInput) {
        dateInput.addEventListener('focus', function() {
            this.type = 'date';
        });
    }

    // Search functionality
    const searchInput = document.querySelector('input[placeholder="بحث"]');
    if (searchInput) {
        searchInput.addEventListener('input', function(e) {
            const searchTerm = e.target.value.toLowerCase();
            // Here you would typically filter services or redirect to search results
            console.log('Searching for:', searchTerm);
        });
    }

    // Notification button handler
    const notificationButton = document.querySelector('button[class*="bg-[#e7edf4]"]');
    if (notificationButton) {
        notificationButton.addEventListener('click', function() {
            alert('لا توجد إشعارات جديدة');
        });
    }
}); 