<!DOCTYPE html>
<html lang="en"> 
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width,initial-scale=1" /> 
</head>
<body>
    <header> 
        <h1>Explore Nepal — Laravel Travel Package Booking System</h1> 
        <p> <strong>Explore Nepal</strong> is a Laravel-based travel package booking system built for tourism companies to manage travel packages, guide coordination, and tourist bookings.                         The platform supports three roles — <em>Admin</em>, <em>Guide</em>, and <em>Tourist</em> — and includes features such as dynamic pricing, discounts, and commission                             handling to make operations transparent and flexible. </p> 
    </header> 
    <nav> 
        <h2>Table of Contents</h2> 
        <ul> 
            <li><a href="#features">Features</a></li> 
            <li><a href="#system-highlights">System Highlights</a></li>
            <li><a href="#tech-stack">Technology Stack</a></li>
            <li><a href="#installation">Installation &amp; Setup</a></li>
        </ul> 
    </nav> 
    <main> 
        <section id="features"> <h2>Features</h2>
    <article> 
        <h3>Tourist</h3>
        <ul>
          <li>Register, log in, and manage a personal profile.</li>
          <li>Browse travel packages with detailed pricing and destination information.</li>
          <li>Book travel packages and submit trip requests.</li>
          <li>View assigned guide information after request acceptance.</li>
          <li>Cancel trips within a valid time period.</li>
        </ul>
    </article>

  <article>
    <h3>Guide</h3>
    <ul>
      <li>Log in using credentials provided/approved by Admin.</li>
      <li>View and accept trip requests that match their guiding location.</li>
      <li>Access tourist contact details once a request is accepted.</li>
      <li>Manage schedule via a personal dashboard.</li>
    </ul>
  </article>

  <article>
    <h3>Admin</h3>
    <ul>
      <li>Add, edit, and delete travel packages.</li>
      <li>Set dynamic pricing, discounts, and guide commission rates.</li>
      <li>Manage tourist and guide accounts and approve guide registrations.</li>
      <li>Monitor trip requests and overall system workflow.</li>
    </ul>
  </article>
</section>

<section id="system-highlights">
  <h2>System Highlights</h2>
  <ul>
    <li>Dynamic pricing based on destination and number of tourists.</li>
    <li>Discount system with decreasing incremental rates.</li>
    <li>Guide commission calculation and commission handling.</li>
    <li>Role-based dashboards for Admin, Guide, and Tourist.</li>
    <li>One-trip-at-a-time workflow for both tourists and guides.</li>
    <li>View tourist/guide profiles after request acceptance for contact/sharing details.</li>
  </ul>
</section>

<section id="tech-stack">
  <h2>Technology Stack</h2>
  <ul>
    <li><strong>Framework:</strong> Laravel (PHP)</li>
    <li><strong>Frontend:</strong> Blade templates, HTML, CSS, JavaScript</li>
    <li><strong>Database:</strong> MySQL</li>
    <li><strong>Editor:</strong> Visual Studio Code</li>
  </ul>
</section>

<section id="installation">
  <h2>Installation &amp; Setup</h2>
  <p>The following are the typical steps to get the project running locally. Adjust values (database name, user, password) to your environment.</p>

  <h3>Requirements</h3>
  <ul>
    <li>PHP (supported version for your Laravel release)</li>
    <li>Composer</li>
    <li>MySQL (or compatible DB)</li>
    <li>Node.js &amp; npm (for compiling assets)</li>
    <li>Visual Studio Code (recommended)</li>
  </ul>
</section>
