/**
 * CloudHost Pro Theme JavaScript
 * 
 * @package CloudHost_Pro
 */

(function($) {
    'use strict';

    // DOM Ready
    $(document).ready(function() {
        
        // Initialize all functionality
        initMobileMenu();
        initSmoothScrolling();
        initBackToTop();
        initAnimationOnScroll();
        initFormValidation();
        initTooltips();
        
    });

    /**
     * Mobile Menu Functionality
     */
    function initMobileMenu() {
        const mobileMenuToggle = $('.mobile-menu-toggle');
        const mobileMenu = $('#mobile-menu');
        
        mobileMenuToggle.on('click', function(e) {
            e.preventDefault();
            
            const isExpanded = $(this).attr('aria-expanded') === 'true';
            
            // Toggle aria-expanded
            $(this).attr('aria-expanded', !isExpanded);
            
            // Toggle menu visibility
            mobileMenu.toggleClass('hidden');
            
            // Change icon
            const icon = $(this).find('i');
            icon.toggleClass('fa-bars fa-times');
            
            // Prevent body scroll when menu is open
            $('body').toggleClass('mobile-menu-open', !mobileMenu.hasClass('hidden'));
        });
        
        // Close mobile menu on window resize
        $(window).on('resize', function() {
            if ($(window).width() >= 768 && !mobileMenu.hasClass('hidden')) {
                mobileMenu.addClass('hidden');
                mobileMenuToggle.attr('aria-expanded', 'false');
                mobileMenuToggle.find('i').removeClass('fa-times').addClass('fa-bars');
                $('body').removeClass('mobile-menu-open');
            }
        });
        
        // Close mobile menu when clicking on a link
        mobileMenu.find('a').on('click', function() {
            mobileMenu.addClass('hidden');
            mobileMenuToggle.attr('aria-expanded', 'false');
            mobileMenuToggle.find('i').removeClass('fa-times').addClass('fa-bars');
            $('body').removeClass('mobile-menu-open');
        });
    }

    /**
     * Smooth Scrolling for Anchor Links
     */
    function initSmoothScrolling() {
        $('a[href^="#"]').on('click', function(e) {
            const target = $(this.getAttribute('href'));
            
            if (target.length) {
                e.preventDefault();
                
                $('html, body').animate({
                    scrollTop: target.offset().top - 80 // Account for fixed header
                }, 800, 'easeInOutQuad');
            }
        });
    }

    /**
     * Back to Top Button
     */
    function initBackToTop() {
        const backToTopButton = $('#back-to-top');
        
        if (backToTopButton.length) {
            $(window).on('scroll', function() {
                if ($(window).scrollTop() > 300) {
                    backToTopButton.removeClass('opacity-0 invisible').addClass('opacity-100 visible');
                } else {
                    backToTopButton.removeClass('opacity-100 visible').addClass('opacity-0 invisible');
                }
            });
            
            backToTopButton.on('click', function(e) {
                e.preventDefault();
                $('html, body').animate({ scrollTop: 0 }, 800, 'easeInOutQuad');
            });
        }
    }

    /**
     * Animation on Scroll
     */
    function initAnimationOnScroll() {
        if ('IntersectionObserver' in window) {
            const observerOptions = {
                threshold: 0.1,
                rootMargin: '0px 0px -50px 0px'
            };

            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        const element = entry.target;
                        element.style.opacity = '1';
                        element.style.transform = 'translateY(0)';
                        
                        // Add a slight delay for staggered animations
                        const delay = Array.from(element.parentNode.children).indexOf(element) * 100;
                        element.style.transitionDelay = delay + 'ms';
                        
                        observer.unobserve(element);
                    }
                });
            }, observerOptions);

            // Observe elements with animation classes
            $('.card-hover, .animate-fade-in-up').each(function() {
                if (!$(this).hasClass('animate-fade-in-up')) {
                    this.style.opacity = '0';
                    this.style.transform = 'translateY(20px)';
                    this.style.transition = 'opacity 0.6s ease, transform 0.6s ease';
                }
                observer.observe(this);
            });
        }
    }

    /**
     * Form Validation
     */
    function initFormValidation() {
        // Comment form validation
        $('#commentform').on('submit', function(e) {
            let isValid = true;
            const requiredFields = $(this).find('[aria-required="true"]');
            
            requiredFields.each(function() {
                const field = $(this);
                const value = field.val().trim();
                
                // Remove existing error styling
                field.removeClass('border-red-500');
                field.next('.error-message').remove();
                
                if (!value) {
                    isValid = false;
                    field.addClass('border-red-500');
                    field.after('<div class="error-message text-red-500 text-sm mt-1">This field is required.</div>');
                }
                
                // Email validation
                if (field.attr('type') === 'email' && value) {
                    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                    if (!emailRegex.test(value)) {
                        isValid = false;
                        field.addClass('border-red-500');
                        field.after('<div class="error-message text-red-500 text-sm mt-1">Please enter a valid email address.</div>');
                    }
                }
            });
            
            if (!isValid) {
                e.preventDefault();
                // Scroll to first error
                const firstError = $('.border-red-500').first();
                if (firstError.length) {
                    $('html, body').animate({
                        scrollTop: firstError.offset().top - 100
                    }, 500);
                }
            }
        });
        
        // Search form enhancement
        $('.search-form').on('submit', function(e) {
            const searchField = $(this).find('.search-field');
            const value = searchField.val().trim();
            
            if (!value) {
                e.preventDefault();
                searchField.focus();
                searchField.addClass('border-red-500');
                
                setTimeout(function() {
                    searchField.removeClass('border-red-500');
                }, 2000);
            }
        });
    }

    /**
     * Initialize Tooltips
     */
    function initTooltips() {
        $('[data-tooltip]').each(function() {
            const element = $(this);
            const tooltipText = element.data('tooltip');
            
            element.on('mouseenter', function() {
                const tooltip = $('<div class="tooltip bg-gray-900 text-white text-sm px-2 py-1 rounded absolute z-50 pointer-events-none">' + tooltipText + '</div>');
                $('body').append(tooltip);
                
                const rect = this.getBoundingClientRect();
                tooltip.css({
                    top: rect.top - tooltip.outerHeight() - 5,
                    left: rect.left + (rect.width / 2) - (tooltip.outerWidth() / 2)
                });
            });
            
            element.on('mouseleave', function() {
                $('.tooltip').remove();
            });
        });
    }

    /**
     * Pricing Table Interactions
     */
    $('.pricing-plan').hover(
        function() {
            $(this).addClass('transform scale-105 shadow-2xl');
        },
        function() {
            $(this).removeClass('transform scale-105 shadow-2xl');
        }
    );

    /**
     * Feature Cards Stagger Animation
     */
    function staggerCardAnimations() {
        $('.card-hover').each(function(index) {
            $(this).css('animation-delay', (index * 0.1) + 's');
        });
    }

    /**
     * Lazy Loading for Images
     */
    function initLazyLoading() {
        if ('IntersectionObserver' in window) {
            const imageObserver = new IntersectionObserver((entries, observer) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        const img = entry.target;
                        img.src = img.dataset.src;
                        img.classList.remove('lazy');
                        imageObserver.unobserve(img);
                    }
                });
            });

            document.querySelectorAll('img[data-src]').forEach(img => {
                imageObserver.observe(img);
            });
        }
    }

    /**
     * Header Scroll Behavior
     */
    function initHeaderScrollBehavior() {
        let lastScrollTop = 0;
        const header = $('header.site-header');
        
        $(window).on('scroll', function() {
            const scrollTop = $(this).scrollTop();
            
            if (scrollTop > lastScrollTop && scrollTop > 100) {
                // Scrolling down
                header.addClass('header-hidden');
            } else {
                // Scrolling up
                header.removeClass('header-hidden');
            }
            
            // Add background to header when scrolled
            if (scrollTop > 50) {
                header.addClass('header-scrolled');
            } else {
                header.removeClass('header-scrolled');
            }
            
            lastScrollTop = scrollTop;
        });
    }

    /**
     * Initialize Additional Features
     */
    $(window).on('load', function() {
        staggerCardAnimations();
        initLazyLoading();
        initHeaderScrollBehavior();
    });

    /**
     * Handle Contact Forms (if present)
     */
    $('.contact-form').on('submit', function(e) {
        e.preventDefault();
        
        const form = $(this);
        const submitButton = form.find('[type="submit"]');
        const originalText = submitButton.text();
        
        // Show loading state
        submitButton.text('Sending...').prop('disabled', true);
        
        // Simulate form submission (replace with actual AJAX call)
        setTimeout(function() {
            // Show success message
            form.html('<div class="text-center p-8"><div class="text-green-600 text-2xl mb-4"><i class="fas fa-check-circle"></i></div><h3 class="text-xl font-semibold mb-2">Thank You!</h3><p class="text-gray-600">Your message has been sent successfully. We\'ll get back to you soon.</p></div>');
        }, 2000);
    });

    /**
     * Keyboard Navigation Enhancement
     */
    $(document).on('keydown', function(e) {
        // ESC key closes mobile menu
        if (e.keyCode === 27) {
            const mobileMenu = $('#mobile-menu');
            if (!mobileMenu.hasClass('hidden')) {
                $('.mobile-menu-toggle').trigger('click');
            }
        }
    });

    /**
     * Print Styles Handler
     */
    window.addEventListener('beforeprint', function() {
        // Hide unnecessary elements before printing
        $('.mobile-menu-toggle, #back-to-top, .social-share').hide();
    });

    window.addEventListener('afterprint', function() {
        // Show elements after printing
        $('.mobile-menu-toggle, #back-to-top, .social-share').show();
    });

})(jQuery);

// Custom easing function for jQuery animations
jQuery.easing.easeInOutQuad = function(x, t, b, c, d) {
    if ((t /= d / 2) < 1) return c / 2 * t * t + b;
    return -c / 2 * ((--t) * (t - 2) - 1) + b;
};