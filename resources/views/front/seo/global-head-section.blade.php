<title>{{ $seoPage->meta_title ?? $seoGlobal->default_meta_title ?? config('app.name') }}</title>

<meta name="description" content="{{ $seoPage->meta_description ?? $seoGlobal->default_meta_description }}">
<meta name="keywords" content="{{ $seoPage->meta_keywords ?? $seoGlobal->default_meta_keywords }}">
<meta name="robots" content="{{ $seoPage->robots_tag ?? $seoGlobal->robots_default }}">
<link rel="canonical" href="{{ $seoPage->canonical_url ?? $seoGlobal->global_canonical ?? url()->current() }}">
<!-- Essential Favicons -->
<link rel="icon" type="image/png" sizes="32x32" href="{{ $setting->fav_icon }}">
<link rel="icon" type="image/png" sizes="16x16" href="{{ $setting->fav_icon }}">
<link rel="apple-touch-icon" href="{{ $setting->fav_icon }}">
<meta name="theme-color" content="#ffffff">



<!-- Basic OG tags -->
<meta property="og:title" content="{{ $seoGlobal->default_meta_title ?? 'MHOW – Muhammadiyah House of Wisdom' }}">
<meta property="og:description" content="{{ $seoGlobal->default_meta_description ?? 'A global institute promoting Islamic education, world peace, personality development, and charity programs through impactful events and workshops.' }}">
<meta property="og:type" content="website">
<meta property="og:url" content="{{ url()->current() }}">
<meta property="og:image" content="{{ asset($seoGlobal->default_meta_image ?? 'assets/images/og-default.png') }}">

<!-- Image details (recommended for better display) -->
<meta property="og:image:secure_url" content="{{ asset($seoGlobal->default_meta_image ?? 'assets/images/og-default.png') }}">
<meta property="og:image:alt" content="MHOW – Promoting Islamic Education and Global Peace">
<meta property="og:image:type" content="image/png">
<meta property="og:image:width" content="1200">
<meta property="og:image:height" content="630">

<!-- Website identity -->
<meta property="og:site_name" content="MHOW – Muhammadiyah House of Wisdom">
<meta property="og:locale" content="en_US">

<!-- Organization details -->
<meta property="og:see_also" content="https://www.facebook.com/HouseofWisdomOfficialCharity/">
<meta property="og:see_also" content="https://www.instagram.com/houseofwisdomcharity">
<meta property="og:see_also" content="https://www.tiktok.com/@houseofwisdom.official">

<!-- Optional (updates and cache control) -->
<meta property="og:updated_time" content="{{ now()->toIso8601String() }}">



<!-- Twitter Card Tags -->
<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:site" content="@mhow_org">

<meta name="twitter:title" content="{{ $seoGlobal->default_meta_title ?? 'MHOW – Muhammadiyah House of Wisdom' }}">
<meta name="twitter:description" content="{{ $seoGlobal->default_meta_description ?? 'A global institute promoting Islamic education, world peace, personality development, and charity programs through impactful events and workshops.' }}">
<meta name="twitter:image" content="{{ asset($seoGlobal->default_meta_image ?? 'assets/images/og-default.png') }}">
<meta name="twitter:image:alt" content="MHOW – Promoting Islamic Education and Global Peace">

<meta name="twitter:url" content="{{ url()->current() }}">
<meta name="twitter:creator" content="@mhow_org">
<meta name="twitter:domain" content="https://mhow.org/">

<!-- Optional Extra Info -->
<meta name="twitter:label1" content="Category">
<meta name="twitter:data1" content="Islamic Education">
<meta name="twitter:label2" content="Location">
<meta name="twitter:data2" content="Worldwide">



<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": ["Organization", "EducationalOrganization", "NGO"],
  "name": "Muhammadiyah House of Wisdom (MHOW)",
  "alternateName": "MHOW",
  "url": "https://mhow.org/",
  "logo": "{{ asset($setting->logo ?? 'assets/images/logo.png') }}",
  "image": "{{ asset($seoGlobal->default_meta_image ?? 'assets/images/og-default.png') }}",
  "description": "A global institute promoting Islamic education, world peace, personality development, and charity programs through impactful events and workshops.",
  "foundingDate": "2015",
  "foundingLocation": {
    "@type": "Place",
    "name": "Bolton, United Kingdom"
  },
  "address": {
    "@type": "PostalAddress",
    "streetAddress": "33 Ridling Lane",
    "addressLocality": "Hyde",
    "addressCountry": "United Kingdom"
  },
  "contactPoint": [
    {
      "@type": "ContactPoint",
      "telephone": "+44 20 7177 2253",
      "contactType": "Customer Service",
      "areaServed": "GB",
      "availableLanguage": ["English", "Urdu", "Arabic"]
    },
    {
      "@type": "ContactPoint",
      "telephone": "+44 7351 562341",
      "contactType": "WhatsApp / General Enquiries",
      "areaServed": "GB",
      "availableLanguage": ["English", "Urdu"]
    },
    {
      "@type": "ContactPoint",
      "email": "info@mhow.org",
      "contactType": "General Information",
      "areaServed": "Global",
      "availableLanguage": ["English", "Urdu"]
    }
  ],
  "sameAs": [
    "https://www.facebook.com/HouseofWisdomOfficialCharity/",
    "https://www.instagram.com/houseofwisdomcharity",
    "https://www.tiktok.com/@houseofwisdom.official"
  ],
  "knowsAbout": [
    "Islamic Education",
    "Charity Programs",
    "World Peace",
    "Personality Development",
    "Islamic Workshops",
    "Educational Events"
  ],
  "department": [
    {
      "@type": "Organization",
      "name": "House of Wisdom Charity Division",
      "url": "https://mhow.org/projects"
    },
    {
      "@type": "Organization",
      "name": "House of Wisdom Educational Division",
      "url": "https://mhow.org/events"
    }
  ],
  "hasOfferCatalog": {
    "@type": "OfferCatalog",
    "name": "MHOW Programs & Events",
    "itemListElement": [
      {
        "@type": "Offer",
        "itemOffered": {
          "@type": "Event",
          "name": "Islamic Educational Workshops",
          "url": "https://mhow.org/events"
        }
      },
      {
        "@type": "Offer",
        "itemOffered": {
          "@type": "Event",
          "name": "Charity & Donation Programs",
          "url": "https://mhow.org/projects"
        }
      }
    ]
  }
}
</script>





<!-- Webmaster Verification -->
@if(!empty($seoGlobal->google_site_verification))
<meta name="google-site-verification" content="{{ $seoGlobal->google_site_verification }}">
@endif

@if(!empty($seoGlobal->bing_site_verification))
<meta name="msvalidate.01" content="{{ $seoGlobal->bing_site_verification }}">
@endif

<!-- Custom / Tracking Scripts -->
{!! $seoPage->header_top ?? '' !!}
{!! $seoGlobal->global_header_scripts ?? '' !!}
