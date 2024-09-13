
// Custom JavaScript for interactive behavior (like smooth scrolling, animations, etc.)
document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', function (e) {
        e.preventDefault();
        document.querySelector(this.getAttribute('href')).scrollIntoView({
            behavior: 'smooth'
        });
    });
});

document.addEventListener('DOMContentLoaded', function() {
    // Get all "View Details" buttons
    const toggleButtons = document.querySelectorAll('.toggle-desc');

    toggleButtons.forEach(button => {
        button.addEventListener('click', function() {
            const cardBody = this.parentElement;
            const shortDesc = cardBody.querySelector('.short-desc');
            const fullDesc = cardBody.querySelector('.full-desc');

            // Toggle visibility
            if (fullDesc.style.display === 'none') {
                fullDesc.style.display = 'block';
                shortDesc.style.display = 'none';
                this.textContent = 'Show Less';
            } else {
                fullDesc.style.display = 'none';
                shortDesc.style.display = 'block';
                this.textContent = 'View Details';
            }
        });
    });
});

