<?php include_once '../includes/header.php'; ?>

<section class="text-center mb-10">
    <h2 class="text-3xl font-semibold mb-4">Find the Best Booking Tool</h2>
    <p class="mb-6 text-gray-600">Use our calculator to choose the right tool based on your needs.</p>

    <button onclick="toggleCalculator()" 
        class="bg-blue-600 text-white px-6 py-2 rounded hover:bg-blue-700 transition">
        📊 Show/Hide Calculator
    </button>
</section>

<section id="calculator" class="overflow-hidden transition-all max-h-0 bg-white rounded shadow mb-10 duration-700">
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
<iframe src="https://calendar.google.com/calendar/appointments/schedules/AcZssZ02fSQ10uXsQLeUOePhGDIrk-Fm3fFDFqS9aVtqwOGP8vrlBMVNP0CNu8Dp496ltxtBZnXlA8wZ?gv=true" style="border: 0" width="100%" height="600" frameborder="0"></iframe>
<!-- end Google Calendar Appointment Scheduling -->
<script>
function toggleCalculator() {
    const section = document.getElementById('calculator');
    if (section.classList.contains('max-h-0')) {
        section.classList.remove('max-h-0');
        section.classList.add('max-h-[1200px]');
    } else {
        section.classList.remove('max-h-[1200px]');
        section.classList.add('max-h-0');
    }
}

document.getElementById('toolForm').addEventListener('submit', function(e) {
    e.preventDefault();
    const form = e.target;
    const platform = form.platform.value;
    const budget = form.budget.value;
    const customization = form.customization.value;
    let suggestions = [];

    if (platform === "wordpress" && budget === "free") {
        suggestions.push(["Amelia Lite", "Free WordPress plugin with basic booking features."]);
    }
    if (platform === "html" && budget === "free") {
        suggestions.push(["Google Appointment Embed", "Simple and free for static sites."]);
    }
    if (budget === "10" && customization !== "high") {
        suggestions.push(["TidyCal", "Affordable and clean interface."]);
    }
    if (budget === "25" || budget === "unlimited") {
        suggestions.push(["SimplyBook.me", "Advanced tool with payments and branding."]);
        suggestions.push(["Calendly Pro", "Powerful with integrations and team features."]);
    }

    const results = document.getElementById('results');
    if (suggestions.length === 0) {
        results.innerHTML = '<p class="text-center text-red-500">No matching tools found. Try adjusting your selections.</p>';
    } else {
        results.innerHTML = '<h3 class="text-xl font-semibold mb-4">🧠 Recommended Tools:</h3>' +
            suggestions.map(tool => `
                <div class="p-4 border rounded bg-gray-50 mb-2">
                    <h4 class="text-lg font-bold">${tool[0]}</h4>
                    <p class="text-sm text-gray-600">${tool[1]}</p>
                </div>
            `).join('');
    }
});
</script>

<?php include_once '../includes/footer.php'; ?>
