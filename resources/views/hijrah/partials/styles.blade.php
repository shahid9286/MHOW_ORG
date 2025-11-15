<link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@400;600;700;900&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">

<style>
    body {
        font-family: 'Roboto', sans-serif !important;
    }

    h1,
    .hijrah-section-title,
    .hero-title {
        font-family: 'Cinzel', serif !important;
        /* maybe heavier weight for strong impact */
    }

    h2,
    .hijrah-info-subtitle,
    .hijrah-modern-title {
        font-family: 'Poppins', sans-serif !important;
        /* medium to semi-bold weight */
    }

    /* CSS Variables */
    :root {
        /* Colors */
        --hijrah-primary: #28a745;
        --hijrah-secondary: #d4af37;
        --hijrah-accent: #8d6e63;
        --hijrah-success: #28a745;
        --hijrah-warning: #ffc107;
        --hijrah-danger: #dc3545;
        --hijrah-info: #17a2b8;
        --hijrah-light: #f8f5e6;
        --hijrah-dark: #2c3e50;
        --hijrah-body-bg: #ffffff;
        --hijrah-body-text: #333333;
        --hijrah-muted: #6c757d;
        --hijrah-sand: #e1d5a6;
        --hijrah-sand-dark: #b39f74;

        /* Spacing */
        --hijrah-space-1: 0.25rem;
        --hijrah-space-2: 0.5rem;
        --hijrah-space-3: 1rem;
        --hijrah-space-4: 1.5rem;
        --hijrah-space-5: 3rem;
        --hijrah-space-6: 4.5rem;
        --hijrah-space-7: 6rem;
        --hijrah-space-8: 9rem;

        /* Typography */
        --hijrah-font-family-base: 'Roboto', sans-serif;
        --hijrah-font-family-heading: 'Playfair Display', serif;
        --hijrah-font-size-base: 1rem;
        --hijrah-line-height-base: 1.6;
        --hijrah-font-weight-light: 300;
        --hijrah-font-weight-normal: 400;
        --hijrah-font-weight-medium: 500;
        --hijrah-font-weight-bold: 700;

        /* Other */
        --hijrah-border-radius: 0.375rem;
        --hijrah-border-radius-lg: 0.5rem;
        --hijrah-border-radius-xl: 1rem;
        --hijrah-box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15);
        --hijrah-box-shadow-lg: 0 1rem 3rem rgba(0, 0, 0, 0.175);
    }

    .bg-theme {
        background: #28a745 !important;
    }

    .hero-swiper {
        width: 100%;
        height: auto;
    }

    .hero-swiper .swiper-slide {
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .hero-swiper .swiper-slide img {
        width: 100%;
        /* fits full X-axis */
        height: auto;
        /* keeps aspect ratio */
        object-fit: contain;
        /* no crop */
    }

    .hijrah-container {
        max-width: 1200px;
        margin: 0 auto;
        padding: 30px 20px;
    }

    .hijrah-header {
        text-align: center;
        margin-bottom: 40px;
    }

    .hijrah-header h1 {
        font-size: 2.8rem;
        color: var(--title-color);
        /* forest green */
        margin-bottom: 15px;
        position: relative;
        display: inline-block;
    }

    .hijrah-header h1:after {
        content: '';
        position: absolute;
        bottom: -10px;
        left: 50%;
        transform: translateX(-50%);
        width: 80px;
        height: 4px;
        background: var(--yellow-color);
        /* warm accent */
        border-radius: 2px;
    }

    .hijrah-header p {
        font-size: 1.2rem;
        color: var(--body-color);
        /* muted green-gray */
        max-width: 800px;
        margin: 0 auto;
        line-height: 1.6;
    }

    .hijrah-styles-container {
        display: grid;
        grid-template-columns: 1fr;
        gap: 50px;
        margin-top: 40px;
    }

    .hijrah-style-section {
        background: var(--white-color);
        border-radius: 12px;
        padding: 30px;
        /* box-shadow: 0 5px 20px rgba(0, 0, 0, 0.08); */
    }

    .hijrah-style-title {
        font-size: 1.8rem;
        color: var(--title-color);
        margin-bottom: 25px;
        padding-bottom: 10px;
        border-bottom: 2px solid var(--yellow-color);
        display: inline-block;
    }

    /* Info Style 1: Image Left, Content Right */
    .hijrah-info-style1 {
        display: flex;
        align-items: center;
        gap: 40px;
    }

    .hijrah-info-image-style1 {
        flex: 1;
        border-radius: 12px;
        overflow: hidden;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.15);
    }

    .hijrah-info-image-style1 img {
        width: 100%;
        height: auto;
        display: block;
    }

    .hijrah-info-content-style1 {
        flex: 1;
    }

    .hijrah-info-title-style1 {
        font-size: 2rem;
        color: var(--title-color);
        /* forest green */
        margin-bottom: 15px;
    }

    .hijrah-info-subtitle-style1 {
        font-size: 1.2rem;
        color: var(--theme-color);
        /* main green accent */
        margin-bottom: 20px;
        font-weight: 500;
    }

    .hijrah-info-desc-style1 {
        color: var(--body-color);
        /* muted green-gray */
        line-height: 1.7;
        margin-bottom: 25px;
    }

    .hijrah-info-points-style1 {
        list-style-type: none;
    }

    .hijrah-info-points-style1 li {
        padding: 10px 0;
        border-bottom: 1px dashed var(--gray-color);
        /* soft green-gray */
        color: var(--body-color);
        display: flex;
        align-items: center;
        gap: 12px;
    }

    .hijrah-info-points-style1 li:last-child {
        border-bottom: none;
    }

    @media (max-width: 968px) {

        .hijrah-info-style1,
        .hijrah-info-style2 {
            flex-direction: column;
        }

        .hijrah-info-points-style2 {
            grid-template-columns: 1fr;
        }

        .hijrah-info-points-style3 {
            flex-direction: column;
        }

        .hijrah-header h1 {
            font-size: 2.2rem;
        }
    }

    /* Ensure hero container never overflows */
    .th-hero-wrapper,
    .hero-swiper {
        width: 100% !important;
        max-width: 100% !important;
        overflow: hidden;
    }

    /* Swiper wrapper and slides */
    .hero-swiper .swiper-wrapper {
        width: 100% !important;
    }

    .hero-swiper .swiper-slide {
        width: 100% !important;
        flex-shrink: 0;
    }

    /* Make images responsive */
    .hero-swiper .swiper-slide img {
        width: 100%;
        height: auto;
        object-fit: cover;
        /* or contain if you don’t want cropping */
        display: block;
    }

    /* Option 1: Single Side Timeline */
    .hijrah-timeline-single {
        position: relative;
        margin-left: 40px;
        /* padding-left: 60px; */
        /* space for line + icon */
    }

    .hijrah-timeline-single-item::before {
        content: '';
        position: absolute;
        top: 50%;
        left: 0;
        width: 4px;
        height: 100%;
        background: var(--gray-color);
        z-index: 0;
    }

    .hijrah-timeline-single-item:last-child::before {
        display: none;
    }

    .hijrah-timeline-single-item {
        position: relative;
        margin-bottom: 40px;
        padding-left: 60px;
        display: flex;
        align-items: center;
        /* vertical align icon + card */
    }

    /* Icon circle */
    .hijrah-timeline-single-icon {
        position: absolute;
        left: -20px;
        top: 50%;
        transform: translateY(-50%);
        width: 40px;
        height: 40px;
        background: var(--theme-color);
        border: 3px solid var(--smoke-color);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        color: var(--white-color);
        /* font-size: 1.2rem; */
        z-index: 1;
    }

    /* Card */
    .hijrah-timeline-single-content {
        background: var(--smoke-color2);
        padding: 20px 25px;
        border-radius: 12px;
        box-shadow: 0 4px 10px rgba(8, 28, 21, 0.08);
        flex: 1;
    }

    .hijrah-timeline-single-title {
        color: var(--title-color);
        font-family: 'Montserrat', sans-serif;
        margin-bottom: 8px;
        font-size: 1.5rem;
    }

    .hijrah-timeline-single-content p {
        color: var(--body-color);
        font-family: var(--body-font);
        margin: 0;
    }

    .hijrah-timeline-alternating::before {
        content: '';
        position: absolute;
        left: 50%;
        top: 0;
        bottom: 0;
        width: 4px;
        background: var(--hijrah-secondary);
        transform: translateX(-50%);
    }

    .hijrah-timeline-alternating-item {
        position: relative;
        margin-bottom: var(--hijrah-space-5);
        width: 50%;
        padding: var(--hijrah-space-3);
        box-sizing: border-box;
    }

    .hijrah-timeline-alternating-item:nth-child(odd) {
        left: 0;
        padding-right: var(--hijrah-space-5);
        text-align: right;
    }

    .hijrah-timeline-alternating-item:nth-child(even) {
        left: 50%;
        padding-left: var(--hijrah-space-5);
    }

    .hijrah-timeline-alternating-icon {
        position: absolute;
        width: 50px;
        height: 50px;
        background: var(--hijrah-primary);
        border: 4px solid var(--hijrah-secondary);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-size: 1.5rem;
        top: var(--hijrah-space-3);
    }

    .hijrah-timeline-alternating-item:nth-child(odd) .hijrah-timeline-alternating-icon {
        right: -25px;
    }

    .hijrah-timeline-alternating-item:nth-child(even) .hijrah-timeline-alternating-icon {
        left: -25px;
    }

    .hijrah-timeline-alternating-content {
        background: var(--hijrah-light);
        padding: var(--hijrah-space-3);
        border-radius: var(--hijrah-border-radius);
        box-shadow: var(--hijrah-box-shadow);
    }

    .hijrah-timeline-alternating-title {
        color: var(--hijrah-primary);
        margin-bottom: var(--hijrah-space-2);
    }

    /* Responsive adjustments */
    @media (max-width: 768px) {
        .hijrah-timeline-alternating::before {
            left: 30px;
        }

        .hijrah-timeline-alternating-item {
            width: 100%;
            padding-left: 70px;
            padding-right: 0;
            text-align: left;
        }

        .hijrah-timeline-alternating-item:nth-child(odd),
        .hijrah-timeline-alternating-item:nth-child(even) {
            left: 0;
            padding-right: 0;
            text-align: left;
        }

        .hijrah-timeline-alternating-item:nth-child(odd) .hijrah-timeline-alternating-icon,
        .hijrah-timeline-alternating-item:nth-child(even) .hijrah-timeline-alternating-icon {
            left: 5px;
            right: auto;
        }
    }

    /* Additional styles for these options */
    .hijrah-option-section {
        padding: var(--section-space) 0;
        /* border-bottom: 1px solid var(--th-border-color); */
    }

    .hijrah-section-title {
        font-family: 'Montserrat', sans-serif;
        font-weight: 700;
        font-size: 2.5rem;
        text-align: center;
        margin-bottom: 1.5rem;
        color: var(--theme-color);
        position: relative;
    }

    .hijrah-section-title::after {
        content: '';
        position: absolute;
        bottom: -10px;
        left: 50%;
        transform: translateX(-50%);
        width: 60px;
        height: 4px;
        background: linear-gradient(90deg, var(--hijrah-primary), var(--hijrah-secondary));
        border-radius: 2px;
    }

    .hijrah-section-subtitle {
        text-align: center;
        margin-bottom: var(--section-title-space);
        max-width: 800px;
        margin-left: auto;
        margin-right: auto;
        color: var(--body-color);
        font-family: var(--body-font);
    }

    /* Info box styles */
    .hijrah-info-box {
        background: var(--white-color);
        border-radius: var(--hijrah-border-radius-lg);
        box-shadow: var(--hijrah-box-shadow);
        padding: var(--hijrah-space-4);
        height: 100%;
        transition: all 0.3s ease;
    }

    /* .hijrah-info-box:hover {
                transform: translateY(-5px);
                box-shadow: var(--hijrah-box-shadow-lg);
            } */

    .hijrah-info-item {
        display: flex;
        align-items: center;
        padding: var(--hijrah-space-3);
        margin-bottom: var(--hijrah-space-3);
        border-radius: var(--hijrah-border-radius);
        background: var(--smoke-color);
        transition: all 0.3s ease;
    }

    .hijrah-info-box .row {
        display: flex;
        align-items: center;
        /* vertically center both col-6 */
    }

    .hijrah-info-box .col-lg-6 {
        display: flex;
        flex-direction: column;
        justify-content: center;
        /* vertically center inner content */
    }

    .hijrah-info-item:hover {
        background: var(--smoke-color2);
        transform: translateX(5px);
    }

    .hijrah-info-item:last-child {
        margin-bottom: 0;
    }

    .hijrah-info-icon {
        font-size: 1.5rem;
        color: var(--theme-color);
        margin-right: var(--hijrah-space-3);
        min-width: 30px;
    }

    .hijrah-info-content {
        flex: 1;
    }

    .hijrah-info-title {
        font-weight: var(--hijrah-font-weight-bold);
        color: var(--title-color);
        margin-bottom: var(--hijrah-space-1);
    }

    /* Option-specific styles */
    /* CTA Style 1: Simple Centered */
    .hijrah-cta-style1 {
        text-align: center;
        padding: 40px;
        background: linear-gradient(135deg, var(--title-color) 0%, var(--theme-color) 100%);
        color: var(--white-color);
    }

    .hijrah-cta-style1 h2 {
        font-size: 2rem;
        margin-bottom: 20px;
        color: var(--white-color);
        font-family: var(--title-font);
    }

    .hijrah-cta-style1 p {
        font-size: 1.1rem;
        max-width: 800px;
        margin: 0 auto 25px;
        line-height: 1.6;
        color: var(--light-color);
        font-family: var(--body-font);
    }

    .hijrah-btn-style1 {
        display: inline-block;
        background: var(--yellow-color);
        color: var(--black-color);
        padding: 15px 35px;
        border-radius: 50px;
        text-decoration: none;
        font-weight: bold;
        font-size: 1.1rem;
        transition: all 0.3s ease;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
        font-family: var(--body-font);
    }

    .hijrah-btn-style1:hover {
        transform: translateY(-3px);
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.3);
    }


    /* Option 2: Modern Minimalist (Green Theme) */
    .hijrah-modern-card {
        background: var(--white-color);
        border-radius: 12px;
        /* replaced var(--hijrah-radius-lg) */
        padding: 2.5rem;
        /* replaced var(--hijrah-space-lg) */
        height: 100%;
        transition: all 0.3s ease;
        box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.1);
        /* replaced var(--hijrah-shadow) */
        border: 1px solid var(--th-border-color);
        text-align: center;
        position: relative;
    }

    .hijrah-modern-card:hover {
        transform: translateY(-8px);
        box-shadow: 0 1rem 2rem rgba(0, 0, 0, 0.15);
        /* replaced var(--hijrah-shadow-xl) */
    }

    .hijrah-modern-icon {
        width: 80px;
        height: 80px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 1.5rem;
        /* replaced var(--hijrah-space-md) */
        font-size: 2rem;
        color: var(--theme-color);
        background-color: rgba(46, 125, 50, 0.1);
        /* light green tint from --theme-color */
        position: relative;
        transition: all 0.3s ease;
    }

    .hijrah-modern-card:hover .hijrah-modern-icon {
        background-color: var(--theme-color);
        color: var(--white-color);
        transform: scale(1.1);
    }

    .hijrah-modern-title {
        font-family: var(--title-font);
        font-weight: 600;
        font-size: 1.5rem;
        margin-bottom: 1rem;
        color: var(--title-color);
    }

    .hijrah-modern-text {
        color: var(--body-color);
        margin-bottom: 0;
    }

    .map-wrapper iframe {
        width: 100%;
        height: 300px;
        border: 0;
    }

    .hijrah-newsletter-section {
        background: #1B4332;
        color: var(--white-color);
        /* margin: var(--hijrah-space-5) auto; */
        padding: var(--hijrah-space-5) var(--hijrah-space-3);
        box-shadow: var(--hijrah-box-shadow-lg);
    }

    .hijrah-newsletter-title {
        font-family: var(--title-font);
        font-size: 2rem;
        font-weight: 700;
        color: var(--white-color);
        margin-bottom: var(--hijrah-space-2);
    }

    .hijrah-newsletter-subtitle {
        font-family: var(--body-font);
        font-size: 1.1rem;
        color: var(--light-color);
        margin: 0 auto;
        max-width: 700px;
        line-height: 1.6;
    }

    .hijrah-newsletter-form {
        max-width: 600px;
        margin: 0 auto;
        gap: var(--hijrah-space-2);
    }

    .hijrah-newsletter-input {
        flex: 1;
        min-width: 250px;
        border-radius: 50px;
        padding: 12px 20px;
        border: 1px solid var(--th-border-color);
        font-family: var(--body-font);
    }

    .hijrah-newsletter-btn {
        border-radius: 50px;
        padding: 12px 30px;
        background: var(--yellow-color);
        color: var(--black-color);
        font-weight: bold;
        font-family: var(--body-font);
        transition: all 0.3s ease;
    }

    .hijrah-newsletter-btn:hover {
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
    }

    .hijrah-newsletter-disclaimer {
        font-size: 0.85rem;
        color: var(--light-color);
        margin-top: var(--hijrah-space-3);
    }


    .hijrah-icon {
        font-size: 2.5rem;
        color: var(--theme-color);
        margin-bottom: 15px;
    }

    .hijrah-feature-list {
        list-style-type: none;
        padding: 0;
    }

    .hijrah-feature-list li {
        padding: 8px 0;
        border-bottom: 1px dashed var(--th-border-color);
        color: var(--body-color);
    }

    .hijrah-feature-list li:last-child {
        border-bottom: none;
    }

    .hijrah-feature-list i {
        color: var(--yellow-color);
        margin-right: 10px;
    }

    .hijrah-donation-option {
        border: 2px solid var(--th-border-color);
        border-radius: 8px;
        padding: 30px 15px 15px 15px;
        text-align: center;
        cursor: pointer;
        transition: all 0.3s ease;
        margin-bottom: 15px;
        height: 100%;
        background-color: var(--white-color);
    }

    .hijrah-donation-option:hover {
        border-color: var(--theme-color);
        transform: translateY(-3px);
        background-color: var(--smoke-color2);
    }

    .hijrah-donation-option.selected {
        border-color: var(--theme-color);
        background-color: rgba(46, 125, 50, 0.08);
        /* theme-color soft overlay */
    }

    .hijrah-donation-amount {
        font-size: 1.5rem;
        font-weight: bold;
        color: var(--theme-color);
        margin-bottom: 5px;
    }

    .hijrah-donation-label {
        font-size: 0.9rem;
        color: var(--black-color2);
    }

    .hijrah-donation-input {
        border: 2px solid var(--th-border-color);
        border-radius: 8px;
        padding: 15px;
        font-size: 1.1rem;
        transition: all 0.3s ease;
        text-align: center;
        color: var(--black-color);
        background-color: var(--white-color);
    }

    .hijrah-donation-input:focus {
        border-color: var(--theme-color);
        box-shadow: 0 0 0 0.25rem rgba(46, 125, 50, 0.25);
    }

    .hijrah-btn-primary {
        background: linear-gradient(135deg, var(--theme-color) 0%, var(--yellow-color) 100%);
        border: none;
        padding: 12px 30px;
        border-radius: 50px;
        font-weight: bold;
        color: var(--white-color);
        transition: all 0.3s ease;
    }

    .hijrah-btn-primary:hover {
        transform: translateY(-3px);
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.25);
    }

    .hijrah-btn-secondary {
        background: var(--yellow-color);
        color: var(--black-color);
        border: none;
        padding: 12px 30px;
        border-radius: 50px;
        font-weight: bold;
        transition: all 0.3s ease;
    }

    .hijrah-btn-secondary:hover {
        transform: translateY(-3px);
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.25);
    }

    html {
        scroll-behavior: smooth !important;
    }


    .hijrah-timer-container {
        background: var(--hijrah-body-bg);
        padding: var(--hijrah-space-5);
        width: 100%;
        max-width: 900px;
    }

    .hijrah-timer-header {
        text-align: center;
        margin-bottom: var(--hijrah-space-5);
    }

    .hijrah-timer-title {
        font-family: var(--hijrah-font-family-heading);
        font-size: 2.5rem;
        font-weight: var(--hijrah-font-weight-bold);
        color: var(--hijrah-primary);
        margin-bottom: var(--hijrah-space-3);
        position: relative;
        display: inline-block;
    }

    .hijrah-timer-title::after {
        content: "";
        position: absolute;
        bottom: -10px;
        left: 50%;
        transform: translateX(-50%);
        width: 80px;
        height: 4px;
        background: var(--hijrah-secondary);
        border-radius: 2px;
    }

    .hijrah-timer-subtitle {
        font-size: 1.1rem;
        color: var(--hijrah-muted);
        max-width: 600px;
        margin: 0 auto;
    }

    .hijrah-timer-content {
        display: flex;
        justify-content: center;
        gap: var(--hijrah-space-3);
        margin-bottom: var(--hijrah-space-5);
    }

    .hijrah-timer-unit {
        text-align: center;
        flex: 1;
        max-width: 180px;
    }

    .hijrah-timer-value {
        background: #3c6c3e;
        color: var(--hijrah-light);
        font-size: 3.5rem;
        font-weight: var(--hijrah-font-weight-bold);
        padding: var(--hijrah-space-4) var(--hijrah-space-3);
        border-radius: var(--hijrah-border-radius-lg);
        margin-bottom: var(--hijrah-space-3);
        box-shadow: var(--hijrah-box-shadow);
        position: relative;
        overflow: hidden;
        font-family: var(--hijrah-font-family-heading);
    }

    .hijrah-timer-value::before {
        content: "";
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 50%;
        background: rgb(4 14 4 / 10%);
    }

    .hijrah-timer-label {
        font-size: 1.1rem;
        font-weight: var(--hijrah-font-weight-medium);
        color: var(--hijrah-primary);
        text-transform: uppercase;
        letter-spacing: 1px;
    }

    .hijrah-timer-separator {
        display: flex;
        align-items: flex-start;
        justify-content: center;
        font-size: 2.5rem;
        font-weight: var(--hijrah-font-weight-bold);
        color: var(--hijrah-secondary);
        padding: 20px var(--hijrah-space-2);
    }

    .hijrah-timer-footer {
        text-align: center;
        padding-top: var(--hijrah-space-4);
        border-top: 1px solid var(--hijrah-sand);
    }

    .hijrah-timer-message {
        font-size: 1.2rem;
        color: var(--hijrah-primary);
        margin-bottom: var(--hijrah-space-4);
    }

    .hijrah-timer-button {
        background: var(--hijrah-primary);
        color: var(--hijrah-light);
        border: none;
        padding: var(--hijrah-space-3) var(--hijrah-space-5);
        border-radius: 50px;
        font-weight: var(--hijrah-font-weight-medium);
        transition: all 0.3s ease;
        display: inline-flex;
        align-items: center;
        gap: var(--hijrah-space-2);
    }

    .hijrah-timer-button:hover {
        background: var(--hijrah-secondary);
        color: var(--hijrah-dark);
        transform: translateY(-3px);
        box-shadow: var(--hijrah-box-shadow);
    }

    .hijrah-timer-icon {
        font-size: 1.2rem;
    }

    /* Responsive adjustments */
    @media (max-width: 992px) {
        .hijrah-timer-value {
            font-size: 3rem;
            padding: var(--hijrah-space-3) var(--hijrah-space-2);
        }
    }

    @media (max-width: 768px) {
        .hijrah-timer-container {
            padding: var(--hijrah-space-4);
        }

        .hijrah-timer-title {
            font-size: 2rem;
        }

        .hijrah-timer-content {
            gap: var(--hijrah-space-2);
        }

        .hijrah-timer-value {
            font-size: 2.2rem;
            padding: var(--hijrah-space-3) var(--hijrah-space-2);
        }

        .hijrah-timer-label {
            font-size: 0.9rem;
        }

        .hijrah-timer-separator {
            font-size: 2rem;
            padding: 0 var(--hijrah-space-1);
        }
    }

    @media (max-width: 576px) {
        .hijrah-timer-container {
            padding: var(--hijrah-space-3) var(--hijrah-space-2);
        }

        .hijrah-timer-title {
            font-size: 1.75rem;
        }

        .hijrah-timer-value {
            font-size: 1.8rem;
            padding: var(--hijrah-space-2) var(--hijrah-space-1);
        }

        .hijrah-timer-label {
            font-size: 0.8rem;
        }

        .hijrah-timer-separator {
            font-size: 1.5rem;
        }

        .hijrah-timer-message {
            font-size: 1rem;
        }
    }

    .registration-container {
        background: white;
        border-radius: 15px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        overflow: hidden;
        max-width: 90%;
        margin: 0 auto;
    }

    .form-header {
        background: var(--hijrah-primary);
        color: white;
        padding: 25px;
        text-align: center;
    }

    .form-header h3 {
        font-weight: 600;
        margin: 0;
    }

    .form-header p {
        opacity: 0.9;
        margin: 10px 0 0;
    }

    .form-body {
        padding: 30px;
    }

    .form-section {
        margin-bottom: 30px;
        padding-bottom: 20px;
        border-bottom: 1px solid #E0E0E0;
    }

    .section-title {
        color: var(--hijrah-primary);
        font-weight: 600;
        margin-bottom: 20px;
        padding-bottom: 10px;
        border-bottom: 2px solid var(--hijrah-primary);
        display: flex;
        align-items: center;
    }

    .section-title i {
        margin-right: 10px;
        background: var(--hijrah-primary);
        color: white;
        width: 32px;
        height: 32px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .form-label {
        font-weight: 500;
        color: var(--dark);
        margin-bottom: 8px;
    }

    .form-control,
    .form-select {
        border: 2px solid #E0E0E0;
        border-radius: 8px;
        transition: all 0.3s;
    }

    #newsLetterInput::placeholder {
        color: black;
        opacity: 1;
    }

    .form-control:focus,
    .form-select:focus {
        border-color: var(--hijrah-primary);
        box-shadow: 0 0 0 0.25rem rgba(46, 125, 50, 0.25);
    }

    .required-field::after {
        content: "*";
        color: #F44336;
        margin-left: 4px;
    }

    .submit-btn {
        background: var(--hijrah-primary);
        color: white;
        border: none;
        padding: 12px 30px;
        border-radius: 8px;
        font-weight: 600;
        transition: all 0.3s;
        width: 100%;
        margin-top: 10px;
    }

    .submit-btn:hover {
        background: var(--hijrah-primary);
        transform: translateY(-2px);
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    .submit-btn:active {
        transform: translateY(0);
    }

    .input-group-text {
        background: var(--hijrah-primary);
        color: white;
        border: none;
        border-radius: 8px 0 0 8px;
    }

    @media (max-width: 768px) {
        .form-body {
            padding: 20px;
        }

        .form-section {
            margin-bottom: 20px;
        }
    }
</style>
