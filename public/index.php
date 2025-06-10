<?php include_once '../includes/header.php'; ?>

<section class="text-center mb-10">
    <h2 class="text-3xl font-semibold mb-4">Find the Best Booking Tool</h2>
    <p class="mb-6 text-gray-600">Use our FREE calculator to choose the right tool based on your needs.</p>

    <button onclick="document.getElementById('calculator').classList.toggle('hidden')" 
        class="bg-blue-600 text-white px-6 py-2 rounded hover:bg-blue-700 transition">
        📊 Show Calculator
    </button>
</section>

<section id="calculator" class="<?php echo isset($_GET['platform']) ? '' : 'hidden'; ?> bg-white p-6 rounded shadow mb-10 transition-all">
    <form method="GET" class="grid gap-4 max-w-2xl mx-auto">
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
            <label class="block text-sm font-medium text-gray-700 mb-1">Budget Per Month:</label>
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

    <?php
    if ($_GET) {
        $platform = $_GET['platform'];
        $budget = $_GET['budget'];
        $custom = $_GET['customization'];
        $suggestions = [];

        if ($platform == "wordpress" && $budget == "free") {
            $suggestions[] = ["Amelia Lite", "Free WordPress plugin with basic booking features."];
        }
        if ($platform == "html" && $budget == "free") {
            $suggestions[] = ["Google Appointment Embed", "Simple and free for static sites."];
        }
        if ($budget == "10" && $custom != "high") {
            $suggestions[] = ["TidyCal", "Affordable and clean interface."];
        }
        if ($budget == "25" || $budget == "unlimited") {
            $suggestions[] = ["SimplyBook.me", "Advanced tool with payments and branding."];
            $suggestions[] = ["Calendly Pro", "Powerful with integrations and team features."];
        }

        echo '<div class="mt-8">';
        echo '<h3 class="text-xl font-semibold mb-4">🧠 Recommended Tools:</h3>';
        if (count($suggestions) == 0) {
            echo '<p>No tools found. Try different options.</p>';
        } else {
            echo '<ul class="grid gap-4">';
            foreach ($suggestions as $tool) {
                echo '<li class="p-4 border rounded bg-gray-50">';
                echo '<h4 class="text-lg font-bold">' . $tool[0] . '</h4>';
                echo '<p class="text-sm text-gray-600">' . $tool[1] . '</p>';
                echo '</li>';
            }
            echo '</ul>';
        }
        echo '</div>';
    }
    ?>
</section>
<section class="bg-white p-6 rounded shadow mb-10">
    <h2 class="text-2xl font-bold mb-4 text-center">📅 Book an Appointment</h2>
    <p class="mb-4 text-center text-gray-600">Choose a time slot that works for you. You’ll receive a confirmation email from Google.</p>
    <!-- Google Calendar Appointment Scheduling begin -->
    <iframe 
        src="https://calendar.google.com/calendar/appointments/schedules/AcZssZ02fSQ10uXsQLeUOePhGDIrk-Fm3fFDFqS9aVtqwOGP8vrlBMVNP0CNu8Dp496ltxtBZnXlA8wZ?gv=true" 
        style="border: 0" 
        width="100%" 
        height="600" 
        frameborder="0">
    </iframe>
    <!-- end Google Calendar Appointment Scheduling -->
</section>

<?php include_once '../includes/footer.php'; ?>
