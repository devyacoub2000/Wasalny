document.addEventListener('DOMContentLoaded', function() {
    // Form elements
    const form = document.querySelector('.layout-content-container');
    const nameInput = form.querySelector('input[placeholder="أدخل اسمك"]');
    const emailInput = form.querySelector('input[placeholder="أدخل بريدك الإلكتروني"]');
    const subjectInput = form.querySelector('input[placeholder="أدخل الموضوع"]');
    const messageInput = form.querySelector('textarea[placeholder="أدخل رسالتك"]');
    const submitButton = form.querySelector('button span.truncate');

    // Form validation and submission
    if (submitButton) {
        submitButton.parentElement.addEventListener('click', function(e) {
            e.preventDefault();
            
            // Validate inputs
            if (!nameInput.value.trim()) {
                alert('الرجاء إدخال الاسم');
                nameInput.focus();
                return;
            }

            if (!emailInput.value.trim()) {
                alert('الرجاء إدخال البريد الإلكتروني');
                emailInput.focus();
                return;
            }

            if (!subjectInput.value.trim()) {
                alert('الرجاء إدخال الموضوع');
                subjectInput.focus();
                return;
            }

            if (!messageInput.value.trim()) {
                alert('الرجاء إدخال الرسالة');
                messageInput.focus();
                return;
            }

            // Email validation
            const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (!emailRegex.test(emailInput.value.trim())) {
                alert('الرجاء إدخال بريد إلكتروني صحيح');
                emailInput.focus();
                return;
            }

            // Prepare form data
            const formData = {
                name: nameInput.value.trim(),
                email: emailInput.value.trim(),
                subject: subjectInput.value.trim(),
                message: messageInput.value.trim()
            };

            // Here you would typically send the form data to your server
            console.log('Form submitted:', formData);
            
            // Show success message
            alert('تم إرسال رسالتك بنجاح! سنتواصل معك قريباً.');
            
            // Reset form
            nameInput.value = '';
            emailInput.value = '';
            subjectInput.value = '';
            messageInput.value = '';
        });
    }

    // Input focus effects
    const inputs = form.querySelectorAll('.form-input');
    inputs.forEach(input => {
        input.addEventListener('focus', function() {
            this.parentElement.classList.add('focused');
        });

        input.addEventListener('blur', function() {
            this.parentElement.classList.remove('focused');
        });
    });

    // Get Quote button handler
    const quoteButton = document.querySelector('header button span.truncate');
    if (quoteButton && quoteButton.textContent === 'احصل على عرض سعر') {
        quoteButton.parentElement.addEventListener('click', function() {
            // Scroll to contact form
            form.scrollIntoView({ behavior: 'smooth' });
        });
    }
}); 