// JavaScript for NikahFix Clone

document.addEventListener('DOMContentLoaded', function() {
    // Open Invitation Button
    const openInvitationBtn = document.getElementById('openInvitation');
    if (openInvitationBtn) {
        openInvitationBtn.addEventListener('click', function() {
            // Scroll to the next section
            document.querySelector('.welcome').scrollIntoView({
                behavior: 'smooth'
            });

            // Play music when invitation is opened
            playMusic();
        });
    }

    // Music Player
    const musicToggle = document.getElementById('musicToggle');
    const musicState = document.getElementById('musicState');
    let isPlaying = true;

    // Create audio element
    const audio = new Audio();
    audio.loop = true;

    // For demo purposes, we'll use a placeholder
    // In a real implementation, you would use the actual music file
    audio.src = 'https://www.soundhelix.com/examples/mp3/SoundHelix-Song-1.mp3';

    if (musicToggle) {
        musicToggle.addEventListener('click', function() {
            if (isPlaying) {
                audio.pause();
                musicState.textContent = 'Play';
                isPlaying = false;
            } else {
                playMusic();
            }
        });
    }

    // Function to play music
    function playMusic() {
        audio.play().catch(e => console.log("Audio play failed:", e));
        if (musicState) {
            musicState.textContent = 'Pause';
        }
        isPlaying = true;
    }

    // Animate elements when they come into view
    const animateOnScroll = function() {
        const elements = document.querySelectorAll('.fade-in, .staggered-animation > *');

        elements.forEach(element => {
            const elementPosition = element.getBoundingClientRect().top;
            const screenPosition = window.innerHeight / 1.3;

            if (elementPosition < screenPosition) {
                element.style.opacity = 1;
                element.style.transform = 'translateY(0)';
            }
        });
    };

    // Initial check
    animateOnScroll();

    // Add scroll event listener
    window.addEventListener('scroll', animateOnScroll);

    // Form handling for RSVP (if implemented)
    const rsvpForm = document.getElementById('rsvpForm');
    if (rsvpForm) {
        rsvpForm.addEventListener('submit', function(e) {
            e.preventDefault();

            // Get form data
            const name = document.getElementById('guestName').value;
            const attendance = document.querySelector('input[name="attendance"]:checked').value;

            // In a real implementation, you would send this data to a server
            alert(`Terima kasih ${name}! Konfirmasi kehadiran Anda telah diterima.`);

            // Reset form
            rsvpForm.reset();
        });
    }

    // Gallery lightbox functionality
    const galleryItems = document.querySelectorAll('.gallery-item img');
    galleryItems.forEach(item => {
        item.addEventListener('click', function() {
            // In a real implementation, you would open a lightbox
            alert('Gallery item clicked! In a full implementation, this would open a lightbox.');
        });
    });

    // Smooth scrolling for navigation links
    const links = document.querySelectorAll('a[href^="#"]');
    links.forEach(link => {
        link.addEventListener('click', function(e) {
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

// Play music automatically when page loads (with user interaction required)
window.addEventListener('click', function() {
    const audio = document.querySelector('audio');
    if (audio) {
        audio.play().catch(e => console.log("Auto-play prevented:", e));
    }
}, { once: true });
