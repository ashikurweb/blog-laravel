// Mobile Humburger

const mobileMenuToggle = document.getElementById('mobile-menu-toggle');
const mobileMenu = document.getElementById('mobile-menu');

mobileMenuToggle.addEventListener('click', () => {
    mobileMenu.classList.toggle('active');
});

const mobileMenuLinks = mobileMenu.querySelectorAll('a');
mobileMenuLinks.forEach(link => {
    link.addEventListener('click', () => {
        mobileMenu.classList.remove('active');
    });
});



// Dropdown 
function toggleDropdown() {
    const dropdown = document.getElementById('dropdown');

    if (dropdown.classList.contains('hidden')) {
        dropdown.classList.remove('hidden');
        setTimeout(() => {
            dropdown.classList.remove('opacity-0', 'scale-95');
            dropdown.classList.add('opacity-100', 'scale-100');
        }, 10);
    } else {
        dropdown.classList.add('opacity-0', 'scale-95');
        dropdown.classList.remove('opacity-100', 'scale-100');
        setTimeout(() => {
            dropdown.classList.add('hidden');
        }, 300);
    }
}

// Close dropdown when clicking outside
window.onclick = function (event) {
    const dropdown = document.getElementById('dropdown');
    if (!event.target.closest('.relative')) {
        dropdown.classList.add('opacity-0', 'scale-95');
        dropdown.classList.remove('opacity-100', 'scale-100');
        setTimeout(() => {
            dropdown.classList.add('hidden');
        }, 300);
    }
};


