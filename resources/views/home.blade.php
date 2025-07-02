<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Happy Parking - Smart Parking Management System for Bhutan</title>

    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.4.0/css/all.min.css">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    <!-- AOS Animation Library -->
    <link href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css" rel="stylesheet">

    <style>
        :root {
            --bhutan-maroon: #8B0000;
            --bhutan-gold: #FFD700;
            --bhutan-blue: #003366;
            --bhutan-orange: #FF8C00;
            --bhutan-white: #FFFFFF;
            --gradient-primary: linear-gradient(135deg, #8B0000, #FF8C00);
            --gradient-secondary: linear-gradient(135deg, #003366, #0066CC);
            --shadow-soft: 0 10px 30px rgba(0,0,0,0.1);
            --shadow-hover: 0 20px 40px rgba(0,0,0,0.15);
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Poppins', sans-serif;
            line-height: 1.6;
            color: #333;
            overflow-x: hidden;
        }

        /* Smooth Scrolling */
        html {
            scroll-behavior: smooth;
        }

        /* Custom Scrollbar */
        ::-webkit-scrollbar {
            width: 8px;
        }

        ::-webkit-scrollbar-track {
            background: #f1f1f1;
        }

        ::-webkit-scrollbar-thumb {
            background: var(--bhutan-maroon);
            border-radius: 10px;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: var(--bhutan-orange);
        }

        /* Navigation */
        .navbar {
            backdrop-filter: blur(10px);
            background: rgba(255, 255, 255, 0.95) !important;
            box-shadow: 0 2px 20px rgba(0,0,0,0.1);
            transition: all 0.3s ease;
            padding: 1rem 0;
        }

        .navbar-brand {
            font-weight: 800;
            font-size: 1.8rem;
            background: var(--gradient-primary);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .navbar-nav .nav-link {
            font-weight: 500;
            margin: 0 0.5rem;
            color: var(--bhutan-blue) !important;
            position: relative;
            transition: all 0.3s ease;
        }

        .navbar-nav .nav-link:hover {
            color: var(--bhutan-maroon) !important;
            transform: translateY(-2px);
        }

        .navbar-nav .nav-link::after {
            content: '';
            position: absolute;
            width: 0;
            height: 2px;
            bottom: -5px;
            left: 50%;
            background: var(--bhutan-orange);
            transition: all 0.3s ease;
            transform: translateX(-50%);
        }

        .navbar-nav .nav-link:hover::after {
            width: 100%;
        }

        /* Floating Animation */
        @keyframes float {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-20px); }
        }

        .floating {
            animation: float 6s ease-in-out infinite;
        }

        /* Typing Animation */
        @keyframes typing {
            from { width: 0 }
            to { width: 100% }
        }

        @keyframes blink-caret {
            from, to { border-color: transparent }
            50% { border-color: var(--bhutan-orange) }
        }

        .typing-animation {
            overflow: hidden;
            border-right: 3px solid var(--bhutan-orange);
            white-space: nowrap;
            margin: 0 auto;
            animation: typing 3.5s steps(40, end), blink-caret 0.75s step-end infinite;
        }

        /* Hero Section */
        .hero-section {
            min-height: 100vh;
            background: linear-gradient(135deg, rgba(139, 0, 0, 0.9), rgba(255, 140, 0, 0.8)), url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1000 1000"><defs><pattern id="bhutan-pattern" x="0" y="0" width="100" height="100" patternUnits="userSpaceOnUse"><circle cx="50" cy="50" r="2" fill="%23FFD700" opacity="0.1"/></pattern></defs><rect width="100%" height="100%" fill="url(%23bhutan-pattern)"/></svg>');
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            display: flex;
            align-items: center;
            position: relative;
            overflow: hidden;
        }

        .hero-section::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1000 1000"><path d="M0,500 Q250,400 500,500 T1000,500 L1000,1000 L0,1000 Z" fill="rgba(255,255,255,0.05)"/></svg>');
            background-size: cover;
            animation: float 10s ease-in-out infinite;
        }

        .hero-content {
            position: relative;
            z-index: 2;
        }

        .hero-title {
            font-size: 4rem;
            font-weight: 800;
            color: white;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.3);
            margin-bottom: 2rem;
        }

        .hero-subtitle {
            font-size: 1.5rem;
            color: rgba(255,255,255,0.9);
            margin-bottom: 3rem;
            font-weight: 300;
        }

        .btn-hero {
            background: var(--gradient-primary);
            border: none;
            padding: 1rem 2rem;
            border-radius: 50px;
            color: white;
            font-weight: 600;
            font-size: 1.1rem;
            transition: all 0.3s ease;
            box-shadow: var(--shadow-soft);
            text-decoration: none;
            display: inline-block;
            margin: 0.5rem;
        }

        .btn-hero:hover {
            transform: translateY(-3px);
            box-shadow: var(--shadow-hover);
            color: white;
        }

        .btn-secondary-hero {
            background: transparent;
            border: 2px solid white;
            color: white;
        }

        .btn-secondary-hero:hover {
            background: white;
            color: var(--bhutan-maroon);
        }

        /* Section Spacing */
        .section {
            padding: 6rem 0;
            position: relative;
        }

        .section:nth-child(even) {
            background: linear-gradient(135deg, #f8f9fa, #e9ecef);
        }

        /* Section Titles */
        .section-title {
            font-size: 3rem;
            font-weight: 700;
            text-align: center;
            margin-bottom: 1rem;
            background: var(--gradient-primary);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .section-subtitle {
            font-size: 1.2rem;
            text-align: center;
            margin-bottom: 4rem;
            color: #666;
            max-width: 600px;
            margin-left: auto;
            margin-right: auto;
        }

        /* Feature Cards */
        .feature-card {
            background: white;
            border-radius: 20px;
            padding: 3rem 2rem;
            text-align: center;
            box-shadow: var(--shadow-soft);
            transition: all 0.3s ease;
            height: 100%;
            border: none;
            margin-bottom: 2rem;
        }

        .feature-card:hover {
            transform: translateY(-10px);
            box-shadow: var(--shadow-hover);
        }

        .feature-icon {
            width: 80px;
            height: 80px;
            border-radius: 50%;
            background: var(--gradient-primary);
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 2rem auto;
            font-size: 2rem;
            color: white;
            transition: all 0.3s ease;
        }

        .feature-card:hover .feature-icon {
            transform: rotate(360deg);
        }

        .feature-title {
            font-size: 1.5rem;
            font-weight: 600;
            margin-bottom: 1rem;
            color: var(--bhutan-blue);
        }

        .feature-description {
            color: #666;
            line-height: 1.6;
        }

        /* App Preview Cards */
        .app-card {
            background: white;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: var(--shadow-soft);
            transition: all 0.3s ease;
            margin-bottom: 3rem;
        }

        .app-card:hover {
            transform: translateY(-5px);
            box-shadow: var(--shadow-hover);
        }

        .app-card-header {
            background: var(--gradient-primary);
            color: white;
            padding: 2rem;
            text-align: center;
        }

        .app-card-body {
            padding: 3rem 2rem;
        }

        .app-title {
            font-size: 2rem;
            font-weight: 700;
            margin-bottom: 1rem;
        }

        .app-description {
            font-size: 1.1rem;
            margin-bottom: 2rem;
            line-height: 1.6;
        }

        .app-features {
            list-style: none;
            padding: 0;
        }

        .app-features li {
            padding: 0.5rem 0;
            color: #666;
            position: relative;
            padding-left: 2rem;
        }

        .app-features li::before {
            content: '\f00c';
            font-family: 'Font Awesome 6 Free';
            font-weight: 900;
            color: var(--bhutan-orange);
            position: absolute;
            left: 0;
            top: 0.5rem;
        }

        /* Stats Counter */
        .stats-section {
            background: var(--gradient-secondary);
            color: white;
            padding: 4rem 0;
        }

        .stat-item {
            text-align: center;
            margin-bottom: 2rem;
        }

        .stat-number {
            font-size: 3rem;
            font-weight: 800;
            margin-bottom: 0.5rem;
            color: var(--bhutan-gold);
        }

        .stat-label {
            font-size: 1.1rem;
            opacity: 0.9;
        }

        /* Testimonials */
        .testimonial-card {
            background: white;
            border-radius: 20px;
            padding: 3rem 2rem;
            text-align: center;
            box-shadow: var(--shadow-soft);
            margin-bottom: 2rem;
            position: relative;
        }

        .testimonial-card::before {
            content: '\f10d';
            font-family: 'Font Awesome 6 Free';
            font-weight: 900;
            font-size: 3rem;
            color: var(--bhutan-gold);
            position: absolute;
            top: -1rem;
            left: 50%;
            transform: translateX(-50%);
            background: white;
            padding: 0 1rem;
        }

        .testimonial-text {
            font-style: italic;
            margin-bottom: 2rem;
            color: #666;
            line-height: 1.6;
        }

        .testimonial-author {
            font-weight: 600;
            color: var(--bhutan-blue);
        }

        /* Contact Section */
        .contact-section {
            background: linear-gradient(135deg, var(--bhutan-blue), var(--bhutan-maroon));
            color: white;
        }

        .contact-form {
            background: rgba(255,255,255,0.1);
            backdrop-filter: blur(10px);
            border-radius: 20px;
            padding: 3rem;
            box-shadow: var(--shadow-soft);
        }

        .form-control {
            background: rgba(255,255,255,0.1);
            border: 1px solid rgba(255,255,255,0.3);
            border-radius: 10px;
            color: white;
            padding: 1rem;
            margin-bottom: 1rem;
        }

        .form-control:focus {
            background: rgba(255,255,255,0.2);
            border-color: var(--bhutan-gold);
            box-shadow: 0 0 0 0.2rem rgba(255, 215, 0, 0.25);
            color: white;
        }

        .form-control::placeholder {
            color: rgba(255,255,255,0.7);
        }

        /* Footer */
        .footer {
            background: #222;
            color: white;
            padding: 3rem 0 1rem 0;
        }

        .footer-brand {
            font-size: 1.5rem;
            font-weight: 700;
            background: var(--gradient-primary);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            margin-bottom: 1rem;
        }

        .footer-links {
            list-style: none;
            padding: 0;
        }

        .footer-links li {
            margin-bottom: 0.5rem;
        }

        .footer-links a {
            color: #ccc;
            text-decoration: none;
            transition: all 0.3s ease;
        }

        .footer-links a:hover {
            color: var(--bhutan-orange);
        }

        .social-links {
            display: flex;
            gap: 1rem;
            margin-top: 1rem;
        }

        .social-links a {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: var(--gradient-primary);
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            text-decoration: none;
            transition: all 0.3s ease;
        }

        .social-links a:hover {
            transform: translateY(-3px);
            box-shadow: var(--shadow-soft);
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .hero-title {
                font-size: 2.5rem;
            }

            .hero-subtitle {
                font-size: 1.2rem;
            }

            .section-title {
                font-size: 2rem;
            }

            .section {
                padding: 4rem 0;
            }

            .feature-card {
                margin-bottom: 2rem;
            }

            .app-card {
                margin-bottom: 2rem;
            }
        }

        /* Loading Animation */
        .loading-spinner {
            border: 4px solid #f3f3f3;
            border-top: 4px solid var(--bhutan-orange);
            border-radius: 50%;
            width: 50px;
            height: 50px;
            animation: spin 1s linear infinite;
            margin: 0 auto;
        }

        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }

        /* Particle Animation */
        .particles {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            overflow: hidden;
            z-index: 1;
        }

        .particle {
            position: absolute;
            background: var(--bhutan-gold);
            border-radius: 50%;
            opacity: 0.1;
            animation: particleFloat 15s infinite linear;
        }

        @keyframes particleFloat {
            0% {
                transform: translateY(100vh) rotate(0deg);
                opacity: 0;
            }
            10% {
                opacity: 0.1;
            }
            90% {
                opacity: 0.1;
            }
            100% {
                transform: translateY(-100px) rotate(360deg);
                opacity: 0;
            }
        }
    </style>
</head>
<body>
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg fixed-top">
        <div class="container">
            <a class="navbar-brand" href="#home">
                <i class="fas fa-car"></i> Happy Parking
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="#home">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#features">Features</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#apps">Apps</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#about">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#contact">Contact</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section id="home" class="hero-section">
        <div class="particles">
            <div class="particle" style="left: 10%; width: 4px; height: 4px; animation-delay: 0s;"></div>
            <div class="particle" style="left: 20%; width: 6px; height: 6px; animation-delay: 2s;"></div>
            <div class="particle" style="left: 30%; width: 3px; height: 3px; animation-delay: 4s;"></div>
            <div class="particle" style="left: 40%; width: 5px; height: 5px; animation-delay: 6s;"></div>
            <div class="particle" style="left: 50%; width: 4px; height: 4px; animation-delay: 8s;"></div>
            <div class="particle" style="left: 60%; width: 6px; height: 6px; animation-delay: 10s;"></div>
            <div class="particle" style="left: 70%; width: 3px; height: 3px; animation-delay: 12s;"></div>
            <div class="particle" style="left: 80%; width: 5px; height: 5px; animation-delay: 14s;"></div>
            <div class="particle" style="left: 90%; width: 4px; height: 4px; animation-delay: 16s;"></div>
        </div>
        <div class="container hero-content">
            <div class="row align-items-center">
                <div class="col-lg-6" data-aos="fade-right" data-aos-duration="1000">
                    <h1 class="hero-title typing-animation">Happy Parking</h1>
                    <p class="hero-subtitle" data-aos="fade-up" data-aos-delay="500">
                        Smart Parking Management System for Bhutan - Find, Book, and Manage Parking Slots with Ease
                    </p>
                    <div data-aos="fade-up" data-aos-delay="1000">
                        <a href="#apps" class="btn-hero">
                            <i class="fas fa-mobile-alt"></i> Get Started
                        </a>
                        <a href="#features" class="btn-hero btn-secondary-hero">
                            <i class="fas fa-play-circle"></i> Learn More
                        </a>
                    </div>
                </div>
                <div class="col-lg-6" data-aos="fade-left" data-aos-duration="1000" data-aos-delay="500">
                    <div class="floating text-center">
                        <i class="fas fa-car-side" style="font-size: 15rem; color: rgba(255,255,255,0.8);"></i>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section id="features" class="section">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h2 class="section-title" data-aos="fade-up">Features</h2>
                    <p class="section-subtitle" data-aos="fade-up" data-aos-delay="200">
                        Discover the powerful features that make Happy Parking the perfect solution for Bhutan's parking needs
                    </p>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="300">
                    <div class="feature-card">
                        <div class="feature-icon">
                            <i class="fas fa-mobile-alt"></i>
                        </div>
                        <h3 class="feature-title">Mobile App</h3>
                        <p class="feature-description">
                            Easy-to-use mobile application for users to find and book parking slots instantly
                        </p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="400">
                    <div class="feature-card">
                        <div class="feature-icon">
                            <i class="fas fa-shield-alt"></i>
                        </div>
                        <h3 class="feature-title">Security Guard App</h3>
                        <p class="feature-description">
                            Dedicated app for security guards to monitor and manage parking areas efficiently
                        </p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="500">
                    <div class="feature-card">
                        <div class="feature-icon">
                            <i class="fas fa-cogs"></i>
                        </div>
                        <h3 class="feature-title">Admin Panel</h3>
                        <p class="feature-description">
                            Comprehensive dashboard for administrators to manage the entire parking system
                        </p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="600">
                    <div class="feature-card">
                        <div class="feature-icon">
                            <i class="fas fa-clock"></i>
                        </div>
                        <h3 class="feature-title">Real-time Updates</h3>
                        <p class="feature-description">
                            Get instant notifications about parking availability and booking confirmations
                        </p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="700">
                    <div class="feature-card">
                        <div class="feature-icon">
                            <i class="fas fa-credit-card"></i>
                        </div>
                        <h3 class="feature-title">Digital Payments</h3>
                        <p class="feature-description">
                            Secure online payment system supporting multiple payment methods
                        </p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="800">
                    <div class="feature-card">
                        <div class="feature-icon">
                            <i class="fas fa-chart-bar"></i>
                        </div>
                        <h3 class="feature-title">Analytics</h3>
                        <p class="feature-description">
                            Detailed reports and analytics to optimize parking management
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Stats Section -->
    <section class="stats-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="100">
                    <div class="stat-item">
                        <div class="stat-number" data-count="1000">0</div>
                        <div class="stat-label">Happy Users</div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="200">
                    <div class="stat-item">
                        <div class="stat-number" data-count="50">0</div>
                        <div class="stat-label">Parking Locations</div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="300">
                    <div class="stat-item">
                        <div class="stat-number" data-count="5000">0</div>
                        <div class="stat-label">Bookings Completed</div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="400">
                    <div class="stat-item">
                        <div class="stat-number" data-count="99">0</div>
                        <div class="stat-label">% Satisfaction Rate</div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Apps Section -->
    <section id="apps" class="section">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h2 class="section-title" data-aos="fade-up">Our Apps</h2>
                    <p class="section-subtitle" data-aos="fade-up" data-aos-delay="200">
                        Three powerful applications working together to provide the best parking experience
                    </p>
                </div>
            </div>

            <!-- User App -->
            <div class="row align-items-center mb-5">
                <div class="col-lg-6" data-aos="fade-right" data-aos-duration="1000">
                    <div class="app-card">
                        <div class="app-card-header">
                            <i class="fas fa-mobile-alt" style="font-size: 4rem; margin-bottom: 1rem;"></i>
                            <h3 class="app-title">User App</h3>
                        </div>
                        <div class="app-card-body">
                            <p class="app-description">
                                The perfect companion for drivers in Bhutan. Find, book, and pay for parking slots with just a few taps.
                            </p>
                            <ul class="app-features">
                                <li>Find nearby parking slots</li>
                                <li>Real-time availability updates</li>
                                <li>Easy booking system</li>
                                <li>Digital payment integration</li>
                                <li>Booking history and receipts</li>
                                <li>GPS navigation to parking spot</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6" data-aos="fade-left" data-aos-duration="1000" data-aos-delay="300">
                    <div class="text-center floating">
                        <i class="fas fa-user-circle" style="font-size: 10rem; color: var(--bhutan-orange);"></i>
                    </div>
                </div>
            </div>

            <!-- Guard App -->
            <div class="row align-items-center mb-5">
                <div class="col-lg-6 order-lg-2" data-aos="fade-left" data-aos-duration="1000">
                    <div class="app-card">
                        <div class="app-card-header" style="background: var(--gradient-secondary);">
                            <i class="fas fa-shield-alt" style="font-size: 4rem; margin-bottom: 1rem;"></i>
                            <h3 class="app-title">Security Guard App</h3>
                        </div>
                        <div class="app-card-body">
                            <p class="app-description">
                                Empower security personnel with tools to efficiently manage and monitor parking areas.
                            </p>
                            <ul class="app-features">
                                <li>Verify booking QR codes</li>
                                <li>Monitor parking occupancy</li>
                                <li>Report parking violations</li>
                                <li>Emergency alert system</li>
                                <li>Real-time communication</li>
                                <li>Shift management tools</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 order-lg-1" data-aos="fade-right" data-aos-duration="1000" data-aos-delay="300">
                    <div class="text-center floating">
                        <i class="fas fa-user-shield" style="font-size: 10rem; color: var(--bhutan-blue);"></i>
                    </div>
                </div>
            </div>

            <!-- Admin Panel -->
            <div class="row align-items-center">
                <div class="col-lg-6" data-aos="fade-right" data-aos-duration="1000">
                    <div class="app-card">
                        <div class="app-card-header" style="background: linear-gradient(135deg, #28a745, #20c997);">
                            <i class="fas fa-cogs" style="font-size: 4rem; margin-bottom: 1rem;"></i>
                            <h3 class="app-title">Admin Panel</h3>
                        </div>
                        <div class="app-card-body">
                            <p class="app-description">
                                Comprehensive management dashboard for parking administrators and business owners.
                            </p>
                            <ul class="app-features">
                                <li>Complete system overview</li>
                                <li>User and guard management</li>
                                <li>Revenue analytics</li>
                                <li>Parking spot configuration</li>
                                <li>Pricing management</li>
                                <li>Reports and insights</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6" data-aos="fade-left" data-aos-duration="1000" data-aos-delay="300">
                    <div class="text-center floating">
                        <i class="fas fa-user-cog" style="font-size: 10rem; color: var(--bhutan-maroon);"></i>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Testimonials Section -->
    <section id="about" class="section">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h2 class="section-title" data-aos="fade-up">What Our Users Say</h2>
                    <p class="section-subtitle" data-aos="fade-up" data-aos-delay="200">
                        Hear from satisfied users across Bhutan who love using Happy Parking
                    </p>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4" data-aos="fade-up" data-aos-delay="300">
                    <div class="testimonial-card">
                        <p class="testimonial-text">
                            "Happy Parking has made finding parking in Thimphu so much easier. I love being able to book a spot before I even arrive at my destination!"
                        </p>
                        <div class="testimonial-author">
                            - Tenzin Dorji, Thimphu
                        </div>
                    </div>
                </div>
                <div class="col-lg-4" data-aos="fade-up" data-aos-delay="400">
                    <div class="testimonial-card">
                        <p class="testimonial-text">
                            "As a security guard, the guard app has streamlined my work. Managing parking areas has never been this efficient."
                        </p>
                        <div class="testimonial-author">
                            - Karma Wangchuk, Parking Guard
                        </div>
                    </div>
                </div>
                <div class="col-lg-4" data-aos="fade-up" data-aos-delay="500">
                    <div class="testimonial-card">
                        <p class="testimonial-text">
                            "The admin panel gives me complete control over my parking business. The analytics help me make better decisions every day."
                        </p>
                        <div class="testimonial-author">
                            - Pema Lhamo, Business Owner
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section id="contact" class="section contact-section">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h2 class="section-title text-white" data-aos="fade-up">Get In Touch</h2>
                    <p class="section-subtitle text-white" data-aos="fade-up" data-aos-delay="200">
                        Ready to revolutionize parking in Bhutan? Contact us today!
                    </p>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="contact-form" data-aos="fade-up" data-aos-delay="400">
                        <form>
                            <div class="row">
                                <div class="col-md-6">
                                    <input type="text" class="form-control" placeholder="Your Name" required>
                                </div>
                                <div class="col-md-6">
                                    <input type="email" class="form-control" placeholder="Your Email" required>
                                </div>
                            </div>
                            <input type="text" class="form-control" placeholder="Subject" required>
                            <textarea class="form-control" rows="5" placeholder="Your Message" required></textarea>
                            <div class="text-center">
                                <button type="submit" class="btn-hero">
                                    <i class="fas fa-paper-plane"></i> Send Message
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-4" data-aos="fade-up">
                    <div class="footer-brand">Happy Parking</div>
                    <p style="color: #ccc; margin-bottom: 2rem;">
                        Making parking easy and efficient across Bhutan with smart technology and user-friendly design.
                    </p>
                    <div class="social-links">
                        <a href="#"><i class="fab fa-facebook-f"></i></a>
                        <a href="#"><i class="fab fa-twitter"></i></a>
                        <a href="#"><i class="fab fa-instagram"></i></a>
                        <a href="#"><i class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>
                <div class="col-lg-2 col-md-6" data-aos="fade-up" data-aos-delay="200">
                    <h5 style="color: white; margin-bottom: 1rem;">Quick Links</h5>
                    <ul class="footer-links">
                        <li><a href="#home">Home</a></li>
                        <li><a href="#features">Features</a></li>
                        <li><a href="#apps">Apps</a></li>
                        <li><a href="#about">About</a></li>
                        <li><a href="#contact">Contact</a></li>
                    </ul>
                </div>
                <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="300">
                    <h5 style="color: white; margin-bottom: 1rem;">Apps</h5>
                    <ul class="footer-links">
                        <li><a href="#">User Mobile App</a></li>
                        <li><a href="#">Security Guard App</a></li>
                        <li><a href="#">Admin Panel</a></li>
                        <li><a href="#">Download Center</a></li>
                    </ul>
                </div>
                <div class="col-lg-3" data-aos="fade-up" data-aos-delay="400">
                    <h5 style="color: white; margin-bottom: 1rem;">Contact Info</h5>
                    <ul class="footer-links">
                        <li><i class="fas fa-map-marker-alt"></i> Thimphu, Bhutan</li>
                        <li><i class="fas fa-phone"></i> +975 XXXX XXXX</li>
                        <li><i class="fas fa-envelope"></i> info@happyparking.bt</li>
                    </ul>
                </div>
            </div>
            <hr style="border-color: #444; margin: 2rem 0;">
            <div class="row">
                <div class="col-12 text-center">
                    <p style="color: #ccc; margin: 0;">
                        &copy; 2024 Happy Parking. All rights reserved. Made with <i class="fas fa-heart" style="color: var(--bhutan-orange);"></i> in Bhutan
                    </p>
                </div>
            </div>
        </div>
    </footer>

    <!-- Bootstrap 5 JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <!-- AOS Animation JS -->
    <script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>

    <script>
        // Initialize AOS
        AOS.init({
            duration: 1000,
            once: true,
            offset: 100
        });

        // Counter Animation
        function animateCounters() {
            const counters = document.querySelectorAll('.stat-number');

            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        const counter = entry.target;
                        const target = parseInt(counter.getAttribute('data-count'));
                        let count = 0;
                        const increment = target / 100;

                        const timer = setInterval(() => {
                            count += increment;
                            if (count >= target) {
                                counter.textContent = target + (target === 99 ? '%' : '+');
                                clearInterval(timer);
                            } else {
                                counter.textContent = Math.floor(count) + (target === 99 ? '%' : '+');
                            }
                        }, 20);

                        observer.unobserve(counter);
                    }
                });
            });

            counters.forEach(counter => observer.observe(counter));
        }

        // Smooth scrolling for navigation links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            });
        });

        // Navbar background change on scroll
        window.addEventListener('scroll', function() {
            const navbar = document.querySelector('.navbar');
            if (window.scrollY > 50) {
                navbar.style.background = 'rgba(255, 255, 255, 0.98)';
                navbar.style.backdropFilter = 'blur(15px)';
            } else {
                navbar.style.background = 'rgba(255, 255, 255, 0.95)';
                navbar.style.backdropFilter = 'blur(10px)';
            }
        });

        // Form submission
        document.querySelector('form').addEventListener('submit', function(e) {
            e.preventDefault();

            // Show loading spinner
            const button = this.querySelector('button[type="submit"]');
            const originalText = button.innerHTML;
            button.innerHTML = '<div class="loading-spinner" style="width: 20px; height: 20px; border-width: 2px;"></div>';
            button.disabled = true;

            // Simulate form submission
            setTimeout(() => {
                button.innerHTML = '<i class="fas fa-check-circle"></i> Message Sent!';
                button.style.background = 'linear-gradient(135deg, #28a745, #20c997)';

                setTimeout(() => {
                    button.innerHTML = originalText;
                    button.disabled = false;
                    button.style.background = 'var(--gradient-primary)';
                    this.reset();
                }, 2000);
            }, 2000);
        });

        // Initialize counter animation when page loads
        document.addEventListener('DOMContentLoaded', function() {
            animateCounters();
        });

        // Add floating animation to feature cards on hover
        document.querySelectorAll('.feature-card').forEach(card => {
            card.addEventListener('mouseenter', function() {
                this.style.transform = 'translateY(-10px) scale(1.02)';
            });

            card.addEventListener('mouseleave', function() {
                this.style.transform = 'translateY(0) scale(1)';
            });
        });

        // Parallax effect for hero section
        window.addEventListener('scroll', function() {
            const scrolled = window.pageYOffset;
            const hero = document.querySelector('.hero-section');
            if (hero) {
                hero.style.transform = `translateY(${scrolled * 0.5}px)`;
            }
        });

        // Add ripple effect to buttons
        document.querySelectorAll('.btn-hero').forEach(button => {
            button.addEventListener('click', function(e) {
                const ripple = document.createElement('span');
                const rect = this.getBoundingClientRect();
                const size = Math.max(rect.width, rect.height);
                const x = e.clientX - rect.left - size / 2;
                const y = e.clientY - rect.top - size / 2;

                ripple.style.cssText = `
                    position: absolute;
                    width: ${size}px;
                    height: ${size}px;
                    left: ${x}px;
                    top: ${y}px;
                    background: rgba(255, 255, 255, 0.4);
                    border-radius: 50%;
                    transform: scale(0);
                    animation: ripple 0.6s linear;
                    pointer-events: none;
                `;

                this.style.position = 'relative';
                this.style.overflow = 'hidden';
                this.appendChild(ripple);

                setTimeout(() => ripple.remove(), 600);
            });
        });

        // Add ripple animation CSS
        const style = document.createElement('style');
        style.textContent = `
            @keyframes ripple {
                to {
                    transform: scale(4);
                    opacity: 0;
                }
            }
        `;
        document.head.appendChild(style);
    </script>
</body>
</html>
