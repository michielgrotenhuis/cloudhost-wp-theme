<?php
/**
 * The front page template for CloudHost Pro theme - Clean Lifestyle Edition
 * 
 * This template displays ONLY the lifestyle sections with no duplicates
 *
 * @package CloudHost_Pro
 */

// Prevent direct access
if (!defined('ABSPATH')) {
    exit;
}

// Prevent any page content from loading to avoid duplicates
add_filter('the_content', '__return_empty_string', 999);
remove_all_actions('wp_head');
remove_all_actions('wp_footer');

get_header();
?>

<main id="primary" class="site-main">

    <!-- Lifestyle Hero Section -->
    <section class="lifestyle-hero" id="hero">
        <div class="lifestyle-hero-content">
            <div class="lifestyle-badge">
                🏆 Exclusively Luxembourg
            </div>
            <h1 class="lifestyle-headline">
                Beyond Hosting
            </h1>
            <p class="lifestyle-subheadline">
                Experience the pinnacle of cloud excellence. Where Luxembourg's financial precision meets cutting-edge technology. Your data deserves nothing less than perfection.
            </p>
            <div class="flex flex-col sm:flex-row justify-center items-center gap-4 mt-8">
                <a href="#pricing" class="lifestyle-cta lifestyle-cta-primary">
                    Experience Excellence
                </a>
                <a href="#discover" class="lifestyle-cta lifestyle-cta-secondary">
                    Discover More
                </a>
            </div>
            
            <!-- Status Indicators -->
            <div class="lifestyle-feature-grid max-w-4xl mx-auto">
                <div class="lifestyle-feature-card">
                    <div class="text-center">
                        <div class="text-4xl mb-4">🇱🇺</div>
                        <h3 class="text-xl font-semibold mb-2">Luxembourg Sovereignty</h3>
                        <p class="text-gray-300">Your data never leaves our borders</p>
                    </div>
                </div>
                <div class="lifestyle-feature-card">
                    <div class="text-center">
                        <div class="text-4xl mb-4">🛡️</div>
                        <h3 class="text-xl font-semibold mb-2">Fortress Security</h3>
                        <p class="text-gray-300">Military-grade protection</p>
                    </div>
                </div>
                <div class="lifestyle-feature-card">
                    <div class="text-center">
                        <div class="text-4xl mb-4">⚡</div>
                        <h3 class="text-xl font-semibold mb-2">Lightning Performance</h3>
                        <p class="text-gray-300">Sub-millisecond response times</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Features Section - Lifestyle Design -->
    <section class="lifestyle-section lifestyle-features" id="discover">
        <div class="lifestyle-section-content">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center mb-20">
                    <div class="lifestyle-badge">
                        The Luxembourg Advantage
                    </div>
                    <h2 class="lifestyle-headline text-5xl lg:text-7xl mb-8">
                        Crafted for 
                        <span style="background: linear-gradient(135deg, #d4af37, #ffd700); -webkit-background-clip: text; -webkit-text-fill-color: transparent;">Excellence</span>
                    </h2>
                    <p class="lifestyle-subheadline max-w-4xl mx-auto">
                        Every detail engineered to perfection. From our state-of-the-art data centers in Luxembourg's financial district to our zero-knowledge security architecture.
                    </p>
                </div>
                
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">
                    <!-- Feature Content -->
                    <div class="space-y-12">
                        <div class="lifestyle-feature-card">
                            <div class="flex items-center mb-6">
                                <div class="w-16 h-16 rounded-2xl bg-gradient-to-br from-blue-500 to-blue-600 flex items-center justify-center mr-6">
                                    <i class="fas fa-university text-2xl text-white"></i>
                                </div>
                                <div>
                                    <h3 class="text-2xl font-bold mb-2">Financial District Security</h3>
                                    <p class="text-gray-400">Banking-grade infrastructure</p>
                                </div>
                            </div>
                            <p class="text-gray-300 leading-relaxed">
                                Your data resides in the same ultra-secure facilities that protect Luxembourg's most sensitive financial institutions. Multi-layered access controls, biometric security, and 24/7 armed surveillance.
                            </p>
                        </div>
                        
                        <div class="lifestyle-feature-card">
                            <div class="flex items-center mb-6">
                                <div class="w-16 h-16 rounded-2xl bg-gradient-to-br from-purple-500 to-purple-600 flex items-center justify-center mr-6">
                                    <i class="fas fa-shield-alt text-2xl text-white"></i>
                                </div>
                                <div>
                                    <h3 class="text-2xl font-bold mb-2">Zero-Knowledge Privacy</h3>
                                    <p class="text-gray-400">Your data, your control</p>
                                </div>
                            </div>
                            <p class="text-gray-300 leading-relaxed">
                                Revolutionary encryption ensures that even we cannot access your data. Combined with Luxembourg's fortress-like privacy laws, your information enjoys unprecedented protection.
                            </p>
                        </div>
                        
                        <div class="lifestyle-feature-card">
                            <div class="flex items-center mb-6">
                                <div class="w-16 h-16 rounded-2xl bg-gradient-to-br from-green-500 to-green-600 flex items-center justify-center mr-6">
                                    <i class="fas fa-bolt text-2xl text-white"></i>
                                </div>
                                <div>
                                    <h3 class="text-2xl font-bold mb-2">Lightning Performance</h3>
                                    <p class="text-gray-400">European network excellence</p>
                                </div>
                            </div>
                            <p class="text-gray-300 leading-relaxed">
                                Direct fiber connections to major European internet exchanges deliver sub-millisecond latency across the continent. Performance that matches your ambitions.
                            </p>
                        </div>
                    </div>
                    
                    <!-- Visual Element -->
                    <div class="relative">
                        <div class="lifestyle-feature-card text-center p-12">
                            <div class="text-8xl mb-8">🏰</div>
                            <h3 class="text-3xl font-bold mb-4">Luxembourg Fortress</h3>
                            <p class="text-xl text-gray-300 mb-8">Where tradition meets innovation</p>
                            <div class="grid grid-cols-2 gap-6 text-center">
                                <div>
                                    <div class="text-2xl font-bold text-gold mb-2" style="color: #d4af37;">99.999%</div>
                                    <div class="text-sm text-gray-400">Uptime SLA</div>
                                </div>
                                <div>
                                    <div class="text-2xl font-bold text-gold mb-2" style="color: #d4af37;">&lt;1ms</div>
                                    <div class="text-sm text-gray-400">EU Latency</div>
                                </div>
                                <div>
                                    <div class="text-2xl font-bold text-gold mb-2" style="color: #d4af37;">24/7</div>
                                    <div class="text-sm text-gray-400">Concierge Support</div>
                                </div>
                                <div>
                                    <div class="text-2xl font-bold text-gold mb-2" style="color: #d4af37;">0</div>
                                    <div class="text-sm text-gray-400">Data Breaches</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Pricing Section - Tesla Style -->
    <section class="lifestyle-section lifestyle-pricing" id="pricing">
        <div class="lifestyle-section-content">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center mb-20">
                    <div class="lifestyle-badge">
                        Membership Tiers
                    </div>
                    <h2 class="lifestyle-headline text-5xl lg:text-7xl mb-8">
                        Choose Your 
                        <span style="background: linear-gradient(135deg, #d4af37, #ffd700); -webkit-background-clip: text; -webkit-text-fill-color: transparent;">Experience</span>
                    </h2>
                    <p class="lifestyle-subheadline max-w-4xl mx-auto">
                        From executive-level protection to enterprise sovereignty. Each tier crafted for discerning organizations who demand excellence.
                    </p>
                </div>
                
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    <!-- Business Elite -->
                    <div class="lifestyle-pricing-card">
                        <div class="text-center">
                            <div class="lifestyle-badge mb-8">Executive</div>
                            <h3 class="text-3xl font-bold mb-4">Business Elite</h3>
                            <div class="mb-8">
                                <div class="text-5xl font-bold mb-2" style="color: #d4af37;">€25</div>
                                <div class="text-gray-400">per month, billed annually</div>
                            </div>
                            <ul class="space-y-4 mb-10 text-left">
                                <li class="flex items-center">
                                    <div class="w-6 h-6 rounded-full bg-green-500 flex items-center justify-center mr-4">
                                        <i class="fas fa-check text-white text-sm"></i>
                                    </div>
                                    <span>5 Premium Websites</span>
                                </li>
                                <li class="flex items-center">
                                    <div class="w-6 h-6 rounded-full bg-green-500 flex items-center justify-center mr-4">
                                        <i class="fas fa-check text-white text-sm"></i>
                                    </div>
                                    <span>50GB Ultra-Fast SSD</span>
                                </li>
                                <li class="flex items-center">
                                    <div class="w-6 h-6 rounded-full bg-green-500 flex items-center justify-center mr-4">
                                        <i class="fas fa-check text-white text-sm"></i>
                                    </div>
                                    <span>Luxembourg Sovereignty</span>
                                </li>
                                <li class="flex items-center">
                                    <div class="w-6 h-6 rounded-full bg-green-500 flex items-center justify-center mr-4">
                                        <i class="fas fa-check text-white text-sm"></i>
                                    </div>
                                    <span>Executive Support</span>
                                </li>
                            </ul>
                            <a href="#" class="lifestyle-cta lifestyle-cta-secondary w-full">
                                Start Elite Trial
                            </a>
                        </div>
                    </div>
                    
                    <!-- Professional Platinum - Featured -->
                    <div class="lifestyle-pricing-card lifestyle-pricing-featured">
                        <div class="absolute -top-4 left-1/2 transform -translate-x-1/2">
                            <div class="lifestyle-badge" style="background: linear-gradient(135deg, #d4af37, #ffd700); color: #000;">
                                👑 Most Popular
                            </div>
                        </div>
                        <div class="text-center pt-4">
                            <div class="lifestyle-badge mb-8" style="background: rgba(212, 175, 55, 0.3); color: #d4af37;">Platinum</div>
                            <h3 class="text-3xl font-bold mb-4">Professional Platinum</h3>
                            <div class="mb-8">
                                <div class="text-6xl font-bold mb-2" style="background: linear-gradient(135deg, #d4af37, #ffd700); -webkit-background-clip: text; -webkit-text-fill-color: transparent;">€59</div>
                                <div class="text-gray-400">per month, billed annually</div>
                            </div>
                            <ul class="space-y-4 mb-10 text-left">
                                <li class="flex items-center">
                                    <div class="w-6 h-6 rounded-full bg-gradient-to-r from-yellow-400 to-yellow-500 flex items-center justify-center mr-4">
                                        <i class="fas fa-crown text-white text-sm"></i>
                                    </div>
                                    <span>15 Premium Websites</span>
                                </li>
                                <li class="flex items-center">
                                    <div class="w-6 h-6 rounded-full bg-gradient-to-r from-yellow-400 to-yellow-500 flex items-center justify-center mr-4">
                                        <i class="fas fa-crown text-white text-sm"></i>
                                    </div>
                                    <span>200GB Ultra-Fast SSD</span>
                                </li>
                                <li class="flex items-center">
                                    <div class="w-6 h-6 rounded-full bg-gradient-to-r from-yellow-400 to-yellow-500 flex items-center justify-center mr-4">
                                        <i class="fas fa-crown text-white text-sm"></i>
                                    </div>
                                    <span>Concierge Support (4 Languages)</span>
                                </li>
                                <li class="flex items-center">
                                    <div class="w-6 h-6 rounded-full bg-gradient-to-r from-yellow-400 to-yellow-500 flex items-center justify-center mr-4">
                                        <i class="fas fa-crown text-white text-sm"></i>
                                    </div>
                                    <span>Advanced Security Suite</span>
                                </li>
                                <li class="flex items-center">
                                    <div class="w-6 h-6 rounded-full bg-gradient-to-r from-yellow-400 to-yellow-500 flex items-center justify-center mr-4">
                                        <i class="fas fa-crown text-white text-sm"></i>
                                    </div>
                                    <span>Priority Infrastructure</span>
                                </li>
                            </ul>
                            <a href="#" class="lifestyle-cta lifestyle-cta-primary w-full">
                                Join Platinum Elite
                            </a>
                        </div>
                    </div>
                    
                    <!-- Enterprise Diamond -->
                    <div class="lifestyle-pricing-card">
                        <div class="text-center">
                            <div class="lifestyle-badge mb-8">Enterprise</div>
                            <h3 class="text-3xl font-bold mb-4">Enterprise Diamond</h3>
                            <div class="mb-8">
                                <div class="text-5xl font-bold mb-2" style="color: #d4af37;">€149</div>
                                <div class="text-gray-400">per month, billed annually</div>
                            </div>
                            <ul class="space-y-4 mb-10 text-left">
                                <li class="flex items-center">
                                    <div class="w-6 h-6 rounded-full bg-purple-500 flex items-center justify-center mr-4">
                                        <i class="fas fa-gem text-white text-sm"></i>
                                    </div>
                                    <span>Unlimited Websites</span>
                                </li>
                                <li class="flex items-center">
                                    <div class="w-6 h-6 rounded-full bg-purple-500 flex items-center justify-center mr-4">
                                        <i class="fas fa-gem text-white text-sm"></i>
                                    </div>
                                    <span>1TB Ultra-Fast SSD</span>
                                </li>
                                <li class="flex items-center">
                                    <div class="w-6 h-6 rounded-full bg-purple-500 flex items-center justify-center mr-4">
                                        <i class="fas fa-gem text-white text-sm"></i>
                                    </div>
                                    <span>Dedicated Account Executive</span>
                                </li>
                                <li class="flex items-center">
                                    <div class="w-6 h-6 rounded-full bg-purple-500 flex items-center justify-center mr-4">
                                        <i class="fas fa-gem text-white text-sm"></i>
                                    </div>
                                    <span>Custom Security Policies</span>
                                </li>
                                <li class="flex items-center">
                                    <div class="w-6 h-6 rounded-full bg-purple-500 flex items-center justify-center mr-4">
                                        <i class="fas fa-gem text-white text-sm"></i>
                                    </div>
                                    <span>Private Infrastructure</span>
                                </li>
                            </ul>
                            <a href="#" class="lifestyle-cta lifestyle-cta-secondary w-full">
                                Request Consultation
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Testimonials Section - Apple Style -->
    <section class="lifestyle-section" style="background: linear-gradient(135deg, #000 0%, #1a1a1a 50%, #000 100%);">
        <div class="lifestyle-section-content">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center mb-20">
                    <div class="lifestyle-badge">
                        Client Stories
                    </div>
                    <h2 class="lifestyle-headline text-5xl lg:text-7xl mb-8">
                        Trusted by 
                        <span style="background: linear-gradient(135deg, #d4af37, #ffd700); -webkit-background-clip: text; -webkit-text-fill-color: transparent;">Leaders</span>
                    </h2>
                    <p class="lifestyle-subheadline max-w-4xl mx-auto">
                        From Luxembourg's financial institutions to Europe's most innovative startups. Discover why industry leaders choose our platform.
                    </p>
                </div>
                
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    <!-- Testimonial 1 -->
                    <div class="lifestyle-testimonial">
                        <div class="mb-8">
                            <div class="flex text-yellow-400 text-lg mb-6">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                            </div>
                            <blockquote class="text-xl leading-relaxed font-light italic mb-8">
                                "Data sovereignty isn't just compliance—it's competitive advantage. This platform gives us the security our algorithms demand with the performance our clients expect."
                            </blockquote>
                        </div>
                        <div class="flex items-center">
                            <div class="w-16 h-16 rounded-full bg-gradient-to-br from-blue-500 to-blue-600 flex items-center justify-center text-white font-bold text-xl mr-6">
                                ML
                            </div>
                            <div>
                                <div class="font-bold text-xl">Marie Leclerc</div>
                                <div class="text-gray-400 font-medium">Chief Technology Officer</div>
                                <div class="text-sm text-gray-500">LuxFinance International</div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Testimonial 2 -->
                    <div class="lifestyle-testimonial">
                        <div class="mb-8">
                            <div class="flex text-yellow-400 text-lg mb-6">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                            </div>
                            <blockquote class="text-xl leading-relaxed font-light italic mb-8">
                                "The level of service transcends typical hosting. When you're orchestrating mission-critical operations across Europe, you need partners who understand excellence."
                            </blockquote>
                        </div>
                        <div class="flex items-center">
                            <div class="w-16 h-16 rounded-full bg-gradient-to-br from-red-500 to-red-600 flex items-center justify-center text-white font-bold text-xl mr-6">
                                JW
                            </div>
                            <div>
                                <div class="font-bold text-xl">Jean Weber</div>
                                <div class="text-gray-400 font-medium">Director of Infrastructure</div>
                                <div class="text-sm text-gray-500">EuroConsult Partners</div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Testimonial 3 -->
                    <div class="lifestyle-testimonial">
                        <div class="mb-8">
                            <div class="flex text-yellow-400 text-lg mb-6">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                            </div>
                            <blockquote class="text-xl leading-relaxed font-light italic mb-8">
                                "Infrastructure that matches our brand ethos. When your customers expect luxury, every touchpoint must deliver. This platform understands that standard."
                            </blockquote>
                        </div>
                        <div class="flex items-center">
                            <div class="w-16 h-16 rounded-full bg-gradient-to-br from-green-500 to-green-600 flex items-center justify-center text-white font-bold text-xl mr-6">
                                AS
                            </div>
                            <div>
                                <div class="font-bold text-xl">Anna Schmidt</div>
                                <div class="text-gray-400 font-medium">Founder & CEO</div>
                                <div class="text-sm text-gray-500">LuxShop Premium</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Final CTA Section - Tesla Style -->
    <section class="lifestyle-hero" style="min-height: 80vh;">
        <div class="lifestyle-hero-content">
            <div class="lifestyle-badge mb-8">
                🎯 Exclusive Access
            </div>
            <h2 class="lifestyle-headline text-5xl lg:text-7xl mb-8">
                Ready to 
                <span style="background: linear-gradient(135deg, #d4af37, #ffd700); -webkit-background-clip: text; -webkit-text-fill-color: transparent;">Ascend?</span>
            </h2>
            <p class="lifestyle-subheadline max-w-5xl mx-auto mb-12">
                Join the select few who refuse to compromise. Experience Luxembourg's premier cloud platform where Swiss precision meets German engineering, protected by the world's strongest privacy laws.
            </p>
            
            <!-- Stats Grid -->
            <div class="grid grid-cols-2 md:grid-cols-4 gap-8 max-w-4xl mx-auto mb-16">
                <div class="text-center">
                    <div class="text-4xl font-bold mb-2" style="background: linear-gradient(135deg, #d4af37, #ffd700); -webkit-background-clip: text; -webkit-text-fill-color: transparent;">99.999%</div>
                    <div class="text-sm text-gray-400 uppercase tracking-wider">Uptime Guaranteed</div>
                </div>
                <div class="text-center">
                    <div class="text-4xl font-bold mb-2" style="background: linear-gradient(135deg, #d4af37, #ffd700); -webkit-background-clip: text; -webkit-text-fill-color: transparent;">&lt;1ms</div>
                    <div class="text-sm text-gray-400 uppercase tracking-wider">EU Latency</div>
                </div>
                <div class="text-center">
                    <div class="text-4xl font-bold mb-2" style="background: linear-gradient(135deg, #d4af37, #ffd700); -webkit-background-clip: text; -webkit-text-fill-color: transparent;">24/7</div>
                    <div class="text-sm text-gray-400 uppercase tracking-wider">Concierge Support</div>
                </div>
                <div class="text-center">
                    <div class="text-4xl font-bold mb-2" style="background: linear-gradient(135deg, #d4af37, #ffd700); -webkit-background-clip: text; -webkit-text-fill-color: transparent;">0</div>
                    <div class="text-sm text-gray-400 uppercase tracking-wider">Compromises</div>
                </div>
            </div>
            
            <div class="flex flex-col sm:flex-row justify-center items-center gap-6">
                <a href="#pricing" class="lifestyle-cta lifestyle-cta-primary">
                    Begin Your Journey
                </a>
                <a href="#contact" class="lifestyle-cta lifestyle-cta-secondary">
                    Schedule Private Demo
                </a>
            </div>
            
            <div class="mt-12 text-sm text-gray-500 max-w-2xl mx-auto">
                * 30-day exclusive trial includes dedicated onboarding specialist, priority migration support, and unconditional satisfaction guarantee. No setup fees. Cancel anytime.
            </div>
        </div>
    </section>

</main>

<?php
get_footer();
?>