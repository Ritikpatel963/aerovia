@extends('layouts.app')

@section('title', 'Poland & Czechia 10D/11N Luxury Expedition | Aerovia Expeditions')
@section('meta_description', 'Join Aerovia Expeditions for an exclusive 10D/11N luxury tour of Poland & Czech Republic (Warsaw, Krakow, Prague, Zakopane) starting Oct 15, 2026. Flight inclusive.')

@section('content')
    <!-- Hero Card Banner with Background Video & Parallax -->
    <div class="hero-card-banner">
      <img src="{{ asset('assets/images/tour-desc-hero.webp') }}" class="hero-image-bg" alt="Hero Background">
      <div class="hero-img-overlay"></div>

      <!-- Hero Main Content -->
      <div class="hero-body">
        <div
          style="display: inline-flex; align-items: center; gap: 0.5rem; background: rgba(229, 184, 66, 0.25); border: 1px solid var(--star-gold); padding: 0.4rem 1.25rem; border-radius: var(--radius-full); font-size: 0.9rem; font-weight: 600; color: #FFF; margin-bottom: 1rem;">
          <i class="fas fa-calendar-alt" style="color: var(--star-gold);"></i> 15 OCT - 25 OCT 2026
        </div>
        <h1 class="hero-main-heading">Poland & Czechia<br>Expedition</h1>
        <p class="hero-sub-text">Warsaw • Krakow • Czestochowa • Wadowice • Wieliczka Salt Mine • Zakopane • Prague •
          Charles Bridge & Vltava River Cruise</p>

        <div style="display: flex; justify-content: center; gap: 1rem; flex-wrap: wrap;">
          <a href="https://wa.me/916289006014?text=Hi%20Aerovia,%20I%20want%20to%20Reserve%20a%20seat%20for%20the%20Poland%20%26%20Czechia%20Tour"
            target="_blank" class="btn btn-whatsapp-hero" style="padding: 0.85rem 2.25rem;"><i
              class="fab fa-whatsapp"></i> Reserve Now (via WhatsApp)</a>
          <a href="#itinerary-section" class="btn btn-pay-now" style="padding: 0.85rem 2.25rem;">View 2-Column
            Itinerary</a>
          <a href="#payment-section" class="btn btn-pay-now"> Pay Now</a>
        </div>
      </div>

      <!-- Hero Bottom Animated Stats Overlay Bar -->
      <div class="hero-stats-overlay">
        <div class="stats-container">
          <div class="stat-box">
            <h3>10D / 11N</h3>
            <p>Tour Duration</p>
          </div>
          <div class="stat-box">
            <h3>4 & 5 ★</h3>
            <p>Luxury Hotels</p>
          </div>
          <div class="stat-box">
            <h3>FREE eSIM</h3>
            <p>Europe Data Included</p>
          </div>
        </div>
      </div>

    </div>

    <!-- Quick Tour Highlights Bar -->
    <section class="content-section" style="padding-top: 3rem; padding-bottom: 2rem;">
      <div class="highlights-bar">
        <div class="highlight-item"><i class="fas fa-plane-departure"></i> Flight Inclusive (LOT & IndiGo)</div>
        <div class="highlight-item"><i class="fas fa-hotel"></i> 4★ & 5★ City Centre Hotels</div>
        <div class="highlight-item"><i class="fas fa-utensils"></i> Daily Breakfast, Local Lunch & Dinner</div>
        <div class="highlight-item"><i class="fas fa-wifi"></i> Free Europe eSIM Included</div>
        <div class="highlight-item"><i class="fas fa-user-shield"></i> Dedicated Tour Director</div>
      </div>
    </section>

    <!-- Pricing, Discounts & Payment Modes Section -->
    <section class="content-section" id="payment-section" style="padding-top: 1rem;">
      <h2 class="section-title">Tour Pricing & Special Discounts</h2>
      <p class="section-subtitle">Transparent pricing with flexible instalment plans available for all travelers.</p>

      <div class="pricing-overview-grid">
        <!-- Main Price Card -->
        <div class="price-box-card animate-card">
          <div class="price-box-header">
            <div>
              <span style="font-size: 0.9rem; text-transform: uppercase; letter-spacing: 1px; opacity: 0.9;">Sharing
                Occupancy</span>
              <div class="price-tag">₹ 3,49,999 <span>/ person</span></div>
            </div>
            <div style="text-align: right;">
              <span style="font-size: 0.85rem; opacity: 0.85;">Single Supplement</span>
              <div style="font-size: 1.15rem; font-weight: 700; color: var(--star-gold);">+ ₹ 42,000</div>
            </div>
          </div>

          <p style="font-size: 0.92rem; opacity: 0.95; line-height: 1.5;">
            Includes flights, 4★ & 5★ hotels, guided tours, highway transfers, entry permits, local lunches & dinners,
            plus a complimentary Europe eSIM!
          </p>

          <div class="discount-pills">
            <div class="discount-pill">
              <i class="fas fa-tags" style="color: var(--star-gold);"></i>
              ₹ 19,999 OFF for Returning Aerovia Customers
            </div>
            <div class="discount-pill">
              <i class="fas fa-bolt" style="color: var(--star-gold);"></i>
              ₹ 9,999 OFF for Early Bird Registrations (Before July 20th)
            </div>
          </div>

          <div style="display: flex; gap: 1rem; margin-top: 2rem;">
            <a href="https://wa.me/916289006014?text=Hi%20Aerovia,%20I%20want%20to%20Reserve%20a%20seat%20for%20the%20Poland%20%26%20Czechia%20Tour"
              target="_blank" class="btn btn-whatsapp-hero" style="flex: 1;"><i class="fab fa-whatsapp"></i> Reserve Now
              on WhatsApp</a>
            <a href="{{ url('contact') }}" class="btn btn-outline" style="color: #FFF; border-color: rgba(255,255,255,0.4);"><i
                class="fas fa-envelope"></i> Contact Us</a>
          </div>
        </div>

        <!-- Bank & Transfer Details Box -->
        <div class="payment-modes-card animate-card">
          <h4 style="font-size: 1.25rem; font-weight: 700; margin-bottom: 0.5rem; color: var(--primary-plum);">Bank
            Transfer Details</h4>
          <p style="font-size: 0.85rem; color: var(--text-muted); margin-bottom: 1rem;">Cheques payable to: <strong>DM
              Enterprises</strong></p>

          <table class="bank-detail-table">
            <tr>
              <td>Account Name:</td>
              <td>DM Enterprises</td>
            </tr>
            <tr>
              <td>Bank Name:</td>
              <td>HDFC Bank</td>
            </tr>
            <tr>
              <td>Branch:</td>
              <td>Parnashree Pally</td>
            </tr>
            <tr>
              <td>Account No:</td>
              <td>50200090161652</td>
            </tr>
            <tr>
              <td>IFSC Code:</td>
              <td>HDFC0006134</td>
            </tr>
            <tr>
              <td>UPI / VPA:</td>
              <td>9874386677@hdfcbank</td>
            </tr>
          </table>

          <div style="margin-top: 1.25rem; font-size: 0.82rem; color: var(--text-muted); text-align: center;">
            <i class="fas fa-shield-alt" style="color: var(--whatsapp-green);"></i> Instant digital receipt issued upon
            payment transfer.
          </div>
        </div>
      </div>

      <!-- Payment Schedule Grid -->
      <h3 class="section-title" style="font-size: 1.6rem; text-align: left; margin-bottom: 1.5rem;">Instalment Payment
        Schedules</h3>

      <div class="payment-schedule-container">
        <!-- Sharing Schedule -->
        <div class="schedule-card animate-card">
          <h4>
            <span>Sharing Occupancy</span>
            <span style="font-size: 0.9rem;" class="schedule-total">₹ 3,49,999 Total</span>
          </h4>
          <div class="schedule-step-list">
            <div class="schedule-step-item">
              <div>
                <strong style="display: block;">Registration Booking Amount</strong>
                <span class="due-date">Due upon seat reservation</span>
              </div>
              <span class="amount">₹ 50,000</span>
            </div>
            <div class="schedule-step-item">
              <div>
                <strong style="display: block;">1st Instalment</strong>
                <span class="due-date">Due: 3rd August 2026</span>
              </div>
              <span class="amount">₹ 90,000</span>
            </div>
            <div class="schedule-step-item">
              <div>
                <strong style="display: block;">2nd Instalment</strong>
                <span class="due-date">Due: 5th September 2026</span>
              </div>
              <span class="amount">₹ 90,000</span>
            </div>
            <div class="schedule-step-item">
              <div>
                <strong style="display: block;">3rd Final Instalment</strong>
                <span class="due-date">Due: 5th October 2026</span>
              </div>
              <span class="amount">₹ 69,999</span>
            </div>
          </div>
        </div>

        <!-- Single Occupancy Schedule -->
        <div class="schedule-card animate-card">
          <h4>
            <span>Single Occupancy</span>
            <span style="font-size: 0.9rem;" class="schedule-total">₹ 3,91,999 Total</span>
          </h4>
          <div class="schedule-step-list">
            <div class="schedule-step-item">
              <div>
                <strong style="display: block;">Registration Booking Amount</strong>
                <span class="due-date">Due upon seat reservation</span>
              </div>
              <span class="amount">₹ 80,000</span>
            </div>
            <div class="schedule-step-item">
              <div>
                <strong style="display: block;">1st Instalment</strong>
                <span class="due-date">Due: 3rd August 2026</span>
              </div>
              <span class="amount">₹ 1,20,000</span>
            </div>
            <div class="schedule-step-item">
              <div>
                <strong style="display: block;">2nd Instalment</strong>
                <span class="due-date">Due: 5th September 2026</span>
              </div>
              <span class="amount">₹ 1,20,000</span>
            </div>
            <div class="schedule-step-item">
              <div>
                <strong style="display: block;">3rd Final Instalment</strong>
                <span class="due-date">Due: 5th October 2026</span>
              </div>
              <span class="amount">₹ 59,999</span>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Flight & Luggage Allowances Section -->
    <section class="content-section"
      style="background: var(--theme-light-bg-gray); border-radius: var(--radius-xl); padding: 4rem 3rem;">
      <h2 class="section-title">Flight Route & Baggage Allowances</h2>
      <p class="section-subtitle">Comfortable international flight routing with generous checked baggage capacity.</p>

      <div class="flight-luggage-grid">
        <div class="flight-luggage-card animate-card">
          <i class="fas fa-plane-departure"></i>
          <h5>Kolkata to Delhi</h5>
          <p>IndiGo 6E5190<br>Check-in: <strong>15 kg</strong> | Cabin: <strong>7 kg</strong></p>
        </div>

        <div class="flight-luggage-card animate-card">
          <i class="fas fa-plane"></i>
          <h5>Delhi to Warsaw</h5>
          <p>Polish Airlines LOT LO72<br>Check-in: <strong>23 kg</strong> | Cabin: <strong>8 kg</strong></p>
        </div>

        <div class="flight-luggage-card animate-card">
          <i class="fas fa-plane-arrival"></i>
          <h5>Prague to Delhi</h5>
          <p>Air Arabia (via Sharjah)<br>Check-in: <strong>23 kg</strong> | Cabin: <strong>7 kg</strong></p>
        </div>

        <div class="flight-luggage-card animate-card">
          <i class="fas fa-suitcase-rolling"></i>
          <h5>Delhi to Kolkata</h5>
          <p>IndiGo 6E6836<br>Check-in: <strong>15 kg</strong> | Cabin: <strong>7 kg</strong></p>
        </div>
      </div>
    </section>

    <!-- 2-Column Detailed Day-by-Day Itinerary Section -->
    <section class="content-section" id="itinerary-section">
      <h2 class="section-title">Day-by-Day Tour Itinerary</h2>
      <p class="section-subtitle">A side-by-side 2-column overview of our 10-day expedition exploring Poland & Czechia.
      </p>

      <div class="timeline-container-2col">

        <!-- Day 1 -->
        <div class="timeline-day-card animate-card">
          <div class="timeline-day-header">
            <div class="timeline-day-title">
              <span class="day-badge">Day 1</span>
              <span>Thu, Oct 15 — Flight Departure</span>
            </div>
          </div>
          <div class="timeline-day-body">
            <div class="flight-info-banner">
              <i class="fas fa-plane"></i> IndiGo 6E5190 | Depart Kolkata 22:30 ➔ Arrive Delhi 00:55
            </div>
            <p>Meet at Kolkata Airport for flight to Delhi. Layover at Delhi Airport overnight before the international
              departure.</p>
          </div>
        </div>

        <!-- Day 2 -->
        <div class="timeline-day-card animate-card">
          <div class="timeline-day-header">
            <div class="timeline-day-title">
              <span class="day-badge">Day 2</span>
              <span>Fri, Oct 16 — Warsaw Arrival</span>
            </div>
          </div>
          <div class="timeline-day-body">
            <div class="flight-info-banner">
              <i class="fas fa-plane"></i> Polish Airlines LO72 | Depart Delhi 08:00 AM ➔ Arrive Warsaw 12:40 PM
            </div>
            <div class="hotel-info-badge"><i class="fas fa-hotel"></i> Stay: Holiday Inn Warsaw City Centre (4★)</div>
            <p>Arrival in Warsaw. Local lunch & hotel check-in. Guided evening walking tour covering Royal Castle, St.
              John's Archcathedral, Old Town Market Square, and Castle Square.</p>
            <div class="timeline-spots-list">
              <span class="spot-pill">Royal Castle</span>
              <span class="spot-pill">St. John's Archcathedral</span>
              <span class="spot-pill">Castle Square</span>
            </div>
          </div>
        </div>

        <!-- Day 3 -->
        <div class="timeline-day-card animate-card">
          <div class="timeline-day-header">
            <div class="timeline-day-title">
              <span class="day-badge">Day 3</span>
              <span>Sat, Oct 17 — Full Day Warsaw Sightseeing</span>
            </div>
          </div>
          <div class="timeline-day-body">
            <div class="hotel-info-badge"><i class="fas fa-hotel"></i> Stay: Holiday Inn Warsaw City Centre (4★)</div>
            <p>Breakfast at hotel. Full-day Warsaw tour: Lazienki Park, Palace on the Isle, Wilanow Palace, Old Town,
              and Presidential Palace. Free time for shopping. Local Lunch & Dinner included.</p>
            <div class="timeline-spots-list">
              <span class="spot-pill">Lazienki Park</span>
              <span class="spot-pill">Palace on the Isle</span>
              <span class="spot-pill">Wilanow Palace</span>
            </div>
          </div>
        </div>

        <!-- Day 4 -->
        <div class="timeline-day-card animate-card">
          <div class="timeline-day-header">
            <div class="timeline-day-title">
              <span class="day-badge">Day 4</span>
              <span>Sun, Oct 18 — Czestochowa to Krakow</span>
            </div>
          </div>
          <div class="timeline-day-body">
            <div class="hotel-info-badge"><i class="fas fa-hotel"></i> Stay: Holiday Inn Krakow City Centre (5★)</div>
            <p>Checkout from Warsaw. Depart for Czestochowa to visit Jasna Gora Monastery, Black Madonna Icon & Chapel
              of Our Lady. Evening walking tour of Krakow Old Town. Local Lunch & Dinner included.</p>
            <div class="timeline-spots-list">
              <span class="spot-pill">Jasna Gora Monastery</span>
              <span class="spot-pill">Black Madonna Icon</span>
              <span class="spot-pill">Krakow Old Town</span>
            </div>
          </div>
        </div>

        <!-- Day 5 -->
        <div class="timeline-day-card animate-card">
          <div class="timeline-day-header">
            <div class="timeline-day-title">
              <span class="day-badge">Day 5</span>
              <span>Mon, Oct 19 — Historic Krakow Tour</span>
            </div>
          </div>
          <div class="timeline-day-body">
            <div class="hotel-info-badge"><i class="fas fa-hotel"></i> Stay: Holiday Inn Krakow City Centre (5★)</div>
            <p>Visit Sanctuary of Divine Mercy, John Paul II Center, St. Mary's Basilica, Main Market Square, and Cloth
              Hall. Free leisure time in Krakow Old Town. Local Lunch & Dinner included.</p>
            <div class="timeline-spots-list">
              <span class="spot-pill">Sanctuary of Divine Mercy</span>
              <span class="spot-pill">St. Mary's Basilica</span>
              <span class="spot-pill">Cloth Hall</span>
            </div>
          </div>
        </div>

        <!-- Day 6 -->
        <div class="timeline-day-card animate-card">
          <div class="timeline-day-header">
            <div class="timeline-day-title">
              <span class="day-badge">Day 6</span>
              <span>Tue, Oct 20 — Wadowice & Salt Mine</span>
            </div>
          </div>
          <div class="timeline-day-body">
            <div class="hotel-info-badge"><i class="fas fa-hotel"></i> Stay: Holiday Inn Krakow City Centre (5★)</div>
            <p>Excursion to Wadowice (Pope John Paul II birthplace & Museum) and UNESCO Wieliczka Salt Mine. Local Lunch
              & Dinner included.</p>
            <div class="timeline-spots-list">
              <span class="spot-pill">Wadowice Basilica</span>
              <span class="spot-pill">Pope JPII Museum</span>
              <span class="spot-pill">Wieliczka Salt Mine</span>
            </div>
          </div>
        </div>

        <!-- Day 7 -->
        <div class="timeline-day-card animate-card">
          <div class="timeline-day-header">
            <div class="timeline-day-title">
              <span class="day-badge">Day 7</span>
              <span>Wed, Oct 21 — Zakopane Alpine Tour</span>
            </div>
          </div>
          <div class="timeline-day-body">
            <div class="hotel-info-badge"><i class="fas fa-hotel"></i> Stay: Holiday Inn Krakow City Centre (5★)</div>
            <p>Full day excursion to Zakopane in the Tatra Mountains. Krupowki Street, Gubalowka Funicular, Highlander
              Market, and Tatra Mountain Cable Car. Local Lunch & Dinner included.</p>
            <div class="timeline-spots-list">
              <span class="spot-pill">Krupowki Street</span>
              <span class="spot-pill">Gubalowka Funicular</span>
              <span class="spot-pill">Tatra Cable Car</span>
            </div>
          </div>
        </div>

        <!-- Day 8 -->
        <div class="timeline-day-card animate-card">
          <div class="timeline-day-header">
            <div class="timeline-day-title">
              <span class="day-badge">Day 8</span>
              <span>Thu, Oct 22 — Scenic Bus Drive to Prague</span>
            </div>
          </div>
          <div class="timeline-day-body">
            <div class="hotel-info-badge"><i class="fas fa-hotel"></i> Stay: Holiday Inn Prague Congress Centre (4★)
            </div>
            <p>Checkout from Krakow. Scenic coach drive to Prague, Czechia. Highway lunch. Check-in to hotel, followed
              by orientation walk to Old Town Square and Astronomical Clock. Dinner included.</p>
            <div class="timeline-spots-list">
              <span class="spot-pill">Highway Drive</span>
              <span class="spot-pill">Old Town Square</span>
              <span class="spot-pill">Astronomical Clock</span>
            </div>
          </div>
        </div>

        <!-- Day 9 -->
        <div class="timeline-day-card animate-card">
          <div class="timeline-day-header">
            <div class="timeline-day-title">
              <span class="day-badge">Day 9</span>
              <span>Fri, Oct 23 — Guided Tour of Prague</span>
            </div>
          </div>
          <div class="timeline-day-body">
            <div class="hotel-info-badge"><i class="fas fa-hotel"></i> Stay: Holiday Inn Prague Congress Centre (4★)
            </div>
            <p>Guided tour of Prague: Prague Castle, St. Vitus Cathedral, Charles Bridge, Infant Jesus of Prague Shrine,
              Old Town Square & Wenceslas Square. Local Lunch & Dinner included.</p>
            <div class="timeline-spots-list">
              <span class="spot-pill">Prague Castle</span>
              <span class="spot-pill">Charles Bridge</span>
              <span class="spot-pill">Infant Jesus Shrine</span>
            </div>
          </div>
        </div>

        <!-- Days 10 & 11 -->
        <div class="timeline-day-card animate-card">
          <div class="timeline-day-header">
            <div class="timeline-day-title">
              <span class="day-badge">Days 10 & 11</span>
              <span>Sat & Sun, Oct 24–25 — Return Flight</span>
            </div>
          </div>
          <div class="timeline-day-body">
            <div class="flight-info-banner">
              <i class="fas fa-plane"></i> Air Arabia (via Sharjah) | Depart Prague 13:15 ➔ Arrive Delhi 03:50 AM (Oct
              25)<br>
              <i class="fas fa-plane"></i> IndiGo 6E6836 | Depart Delhi 07:00 AM ➔ Arrive Kolkata 09:05 AM (Oct 25)
            </div>
            <p>Checkout from Prague hotel. Transfer to airport for Air Arabia return flight via Sharjah to Delhi,
              connecting to Kolkata. Arrive on Oct 25 morning.</p>
          </div>
        </div>

      </div>
    </section>

    <!-- Visa Documents Checklist Section -->
    <section class="content-section">
      <h2 class="section-title">Schengen Visa Documents Required</h2>
      <p class="section-subtitle">Aerovia handles flight/hotel reservations and insurance. Travelers must provide the
        following:</p>

      <div class="visa-docs-grid">
        <div class="visa-doc-card animate-card">
          <h4><i class="fas fa-briefcase"></i> Salaried Individuals</h4>
          <ul class="visa-doc-list">
            <li><i class="fas fa-check-circle"></i> Passport bio pages (front, back & used pages, 6 months validity).
            </li>
            <li><i class="fas fa-check-circle"></i> 2 Passport photos (white background).</li>
            <li><i class="fas fa-check-circle"></i> 3 months bank savings statement (stamped & signed).</li>
            <li><i class="fas fa-check-circle"></i> 3 months payslips & 2 years ITR returns.</li>
            <li><i class="fas fa-check-circle"></i> Official leave letter with travel dates & position.</li>
            <li><i class="fas fa-check-circle"></i> Employment contract copy.</li>
          </ul>
        </div>

        <div class="visa-doc-card animate-card">
          <h4><i class="fas fa-store"></i> Business Owners</h4>
          <ul class="visa-doc-list">
            <li><i class="fas fa-check-circle"></i> Passport bio pages & passport photos.</li>
            <li><i class="fas fa-check-circle"></i> Trade Licence copy.</li>
            <li><i class="fas fa-check-circle"></i> GST Registration Certificate.</li>
            <li><i class="fas fa-check-circle"></i> 3 months bank statement (stamped & signed).</li>
            <li><i class="fas fa-check-circle"></i> 2 years Income Tax Returns (ITR).</li>
          </ul>
        </div>

        <div class="visa-doc-card animate-card">
          <h4><i class="fas fa-user-clock"></i> Retired Persons</h4>
          <ul class="visa-doc-list">
            <li><i class="fas fa-check-circle"></i> Passport bio pages & passport photos.</li>
            <li><i class="fas fa-check-circle"></i> Pension statements for last 3 months.</li>
            <li><i class="fas fa-check-circle"></i> Proof of regular income (property/business).</li>
            <li><i class="fas fa-check-circle"></i> 3 months bank statement (stamped & signed).</li>
          </ul>
        </div>
      </div>
    </section>

    <!-- Terms, Exclusions & Disclaimers Section -->
    <section class="content-section">
      <div class="terms-box-card animate-card">
        <h3><i class="fas fa-exclamation-triangle"></i> Tour Cost Exclusions & Important Terms</h3>
        <ul class="terms-list">
          <li><i class="fas fa-times-circle"></i> <strong>Exclusions:</strong> Any hike in airfare, taxes, visa fees,
            border taxes, personal laundry, minibar, safe deposit vaults, or personal shopping.</li>
          <li><i class="fas fa-info-circle"></i> <strong>Itinerary Modifications:</strong> Day itinerary subject to
            last-minute adjustments due to local weather, traffic, strikes, or road conditions.</li>
          <li><i class="fas fa-hotel"></i> <strong>Check-in/Check-out:</strong> Standard hotel check-in at 14:00 hours /
            check-out at 12:00 hours. Early/late check-out subject to hotel availability.</li>
          <li><i class="fas fa-shield-alt"></i> <strong>Agent Capacity:</strong> Aerovia Expeditions acts in the
            capacity of an agent for independent suppliers (hotels, airlines, coaches).</li>
          <li><i class="fas fa-file-signature"></i> <strong>Passenger Agreement:</strong> All passengers traveling on
            the Poland & Czechia tour (15 Oct – 25 Oct 2026) agree to abide by the tour regulations led by Tour Director
            Mr. Dale Mogose.</li>
        </ul>
      </div>
    </section>

    <!-- Organizer Contact Card -->
    <section class="content-section" style="padding-bottom: 2rem;">
      <div class="organizer-contact-card animate-card">
        <div class="organizer-info">
          <h3>Aerovia Expeditions</h3>
          <p>Tour Director: Mr. Dale Mogose | Trale Travels Legacy</p>
        </div>

        <div class="organizer-contacts-flex">
          <a href="tel:+916289006014" class="contact-pill"><i class="fas fa-phone-alt"></i> +91 62890 06014</a>
          <a href="tel:+919874386677" class="contact-pill"><i class="fas fa-phone-alt"></i> +91 98743 86677</a>
          <a href="mailto:traletravelsinc@gmail.com" class="contact-pill"><i class="fas fa-envelope"></i>
            traletravelsinc@gmail.com</a>
          <div class="contact-pill"><i class="fas fa-map-marker-alt"></i> 127A Park Street, Kolkata - 700016</div>
        </div>
      </div>
    </section>

    <!-- Parallax Call to Action Banner -->
    <section class="content-section" style="padding-bottom: 2rem;">
            <div class="cta-parallax-banner animate-card" style="position: relative; overflow: hidden;">
        <div class="cta-parallax-bg parallax-bg" style="background-image: url('https://images.unsplash.com/photo-1507525428034-b723cf961d3e?auto=format&fit=crop&w=1920&q=80&fm=webp'); position: absolute; inset: 0; background-size: cover; background-position: center; z-index: 0;"></div>
        <div class="cta-left" style="position: relative; z-index: 2;">
          <h3>Ready to Explore Aerovia?</h3>
          <p>Start your journey today with expert planning, seamless booking, and unforgettable experiences.</p>
        </div>
        <a href="https://wa.me/916289006014" target="_blank" class="btn btn-whatsapp-hero" style="position: relative; z-index: 2;"><i
            class="fab fa-whatsapp"></i> Reserve Now on WhatsApp</a>
      </div>
    </section>
@endsection
