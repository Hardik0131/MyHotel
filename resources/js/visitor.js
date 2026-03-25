import '../../resources/js/bootstrap';

import '../css/app.css';
import '../css/booking.css';
import '../css/contact.css';
import '../css/details.css';
import '../css/filterdroom.css';
import '../css/home.css';
import '../css/nav.css';
import '../css/rooms.css';
import '../js/booking.js';

// Mobile menu toggle - slides down from top
document.addEventListener('DOMContentLoaded', function() {
    const menuIcon = document.querySelector('.ri-menu-3-line');
    const navMenu = document.querySelector('.nav_item .nav_menu');
    const navItem = document.querySelector('.nav_item');

    // Toggle menu when hamburger icon is clicked
    if (menuIcon && navMenu) {
        menuIcon.addEventListener('click', function(e) {
            e.stopPropagation();
            navMenu.classList.toggle('open');
        });
    }

    // Close menu when clicking outside
    document.addEventListener('click', function(e) {
        if (navItem && !navItem.contains(e.target) && navMenu) {
            navMenu.classList.remove('open');
        }
    });

    // Close menu when pressing Escape key
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape' && navMenu) {
            navMenu.classList.remove('open');
        }
    });

    // Close menu when clicking on any nav link
    if (navMenu) {
        const navLinks = navMenu.querySelectorAll('a');
        navLinks.forEach(link => {
            link.addEventListener('click', function() {
                navMenu.classList.remove('open');
            });
        });
    }
});