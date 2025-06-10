<?php include_once '../includes/header.php'; ?>

<section class="text-center mb-10">
    <h2 class="text-3xl font-semibold mb-4">Find the Best Booking Tool</h2>
    <p class="mb-6 text-gray-600">Use our calculator to choose the right tool based on your needs.</p>

    </section>

<section id="calculator" class="transition-all max-h-screen bg-white rounded shadow mb-10 duration-700">
    <div class="p-6">
        <form id="toolForm" class="grid gap-4 max-w-2xl mx-auto">
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Website Platform:</label>
                <select name="platform" class="w-full p-2 border rounded">
                    <option value="wordpress">WordPress</option>
                    <option value="wix">Wix</option>
                    <option value="html">Static HTML</option>
                    <option value="shopify">Shopify</option>
                    <option value="squarespace">Squarespace</option>
                </select>
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Budget:</label>
                <select name="budget" class="w-full p-2 border rounded">
                    <option value="free">Free</option>
                    <option value="10">Under $10</option>
                    <option value="25">Under $25</option>
                    <option value="unlimited">Unlimited</option>
                </select>
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Customization:</label>
                <select name="customization" class="w-full p-2 border rounded">
                    <option value="low">Low</option>
                    <option value="medium">Medium</option>
                    <option value="high">High</option>
                </select>
            </div>
            <div class="text-center">
                <button type="submit" class="bg-green-600 text-white px-6 py-2 rounded hover:bg-green-700">
                    Find Tools
                </button>
            </div>
        </form>
        <div id="results" class="mt-8"></div>
    </div>
</section>
<!-- Google Calendar Appointment Scheduling begin -->

<!-- end Google Calendar Appointment Scheduling -->
<script>
document.getElementById('toolForm').addEventListener('submit', function(e) {
  e.preventDefault();
  const platform = this.platform.value;
  const budget = this.budget.value;
  const customization = this.customization.value;
  const results = document.getElementById('results');
  let suggestions = [];

  if (platform === "wordpress") {
    if (budget === "free") suggestions.push(["Amelia Lite", "Basic booking plugin for WordPress."]);
    else if (budget === "10" || budget === "25") suggestions.push(["Bookly PRO (basic)", "Flexible plugin with add-ons."]);
    else suggestions.push(["Amelia Pro", "Full-featured system with payments and sync."]);
  }

  if (platform === "html") {
    if (budget === "free") suggestions.push(["Google Appointment", "Embed Google Calendar."]);
    else if (budget === "10" || budget === "25") suggestions.push(["TidyCal", "Budget-friendly external tool."]);
    else suggestions.push(["SimplyBook.me", "White-labeled, customizable solution."]);
  }

  if (platform === "wix") {
    if (budget === "free") suggestions.push(["Wix Bookings (Free)", "Easy built-in tool."]);
    else if (budget === "10" || budget === "25") suggestions.push(["Wix Bookings + Add-ons", "Extra features and calendar tools."]);
    else suggestions.push(["Wix Bookings Pro", "CRM, SMS, and full branding."]);
  }

  if (platform === "shopify") {
    if (budget === "10" || budget === "25") suggestions.push(["BookThatApp (Basic)", "Basic Shopify booking system."]);
    else suggestions.push(["Sesami or Appointly", "Advanced ecommerce booking."]);
  }

  if (platform === "squarespace") {
    if (budget === "free") suggestions.push(["Acuity Scheduling (Free)", "Simple Squarespace integration."]);
    else if (budget === "10" || budget === "25") suggestions.push(["Acuity Scheduling (Paid)", "More integrations and options."]);
    else suggestions.push(["Calendly Pro", "Premium scheduling experience."]);
  }

  if (suggestions.length === 0) {
    results.innerHTML = '<p class="text-red-500">No tools found. Try different options.</p>';
    return;
  }

  results.innerHTML = '<h2 class="text-xl font-semibold mb-4">Recommended Tools:</h2>' + suggestions.map(tool => `
    <div class="p-4 border rounded bg-gray-50 mb-4">
      <h3 class="text-lg font-bold">${tool[0]}</h3>
      <p class="mb-2">${tool[1]}</p>
      <div class="flex gap-4">
        <button onclick="openTutorial('${tool[0]}')" class="bg-blue-600 text-white px-4 py-1 rounded hover:bg-blue-700">I'll do it myself</button>
        <button onclick="requestHelp('${tool[0]}')" class="bg-green-600 text-white px-4 py-1 rounded hover:bg-green-700">Please help me with this</button>
      </div>
    </div>
  `).join('');
});

function openTutorial(tool) {
  const file = tool.toLowerCase().replace(/ /g, '-').replace(/[()./]/g, '') + '.html';
  fetch('tutorials/' + file)
    .then(res => res.text())
    .then(html => {
      html = html.replace(/<\/?(html|head|body)[^>]*>/gi, '');
      document.getElementById('results').innerHTML = html;
    });
}

function requestHelp(tool) {
  alert('We will help you implement: ' + tool);
}
</script>

<?php include_once '../includes/footer.php'; ?>


<div style="text-align: center; margin-top: 30px;">
    <button onclick="toggleCalendly()" style="padding: 10px 20px; margin: 10px;">Show Calendly</button>
    <button onclick="toggleGoogleCalendar()" style="padding: 10px 20px; margin: 10px;">Show Google Calendar</button>
</div>
