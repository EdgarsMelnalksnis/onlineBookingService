
document.addEventListener('DOMContentLoaded', function () {
    document.getElementById('findToolsBtn').addEventListener('click', function () {
        const platform = document.querySelector('select[name="platform"]').value;
        const budget = document.querySelector('select[name="budget"]').value;
        const customization = document.querySelector('select[name="customization"]').value;

        const results = getEnhancedRecommendations(platform, budget, customization);
        renderResults(results);
    });
});

function getEnhancedRecommendations(platform, budget, customization) {
    const tools = [
        {
            name: "TidyCal",
            platform: "html",
            budget: "free",
            customization: "low",
            tutorial: "tidycal"
        },
        {
            name: "Wix Bookings (Free)",
            platform: "html",
            budget: "free",
            customization: "low",
            tutorial: "wix-bookings-free"
        },
        {
            name: "Calendly Pro",
            platform: "html",
            budget: "25",
            customization: "high",
            tutorial: "calendly-pro"
        },
        {
            name: "Amelia Lite",
            platform: "wordpress",
            budget: "free",
            customization: "low",
            tutorial: "amelia-lite"
        },
        {
            name: "Bookly Pro (Basic)",
            platform: "wordpress",
            budget: "25",
            customization: "low",
            tutorial: "bookly-pro-basic"
        }
    ];

    return tools.filter(tool =>
        tool.platform === platform &&
        tool.budget === budget &&
        tool.customization === customization
    );
}

function renderResults(tools) {
    const container = document.getElementById('resultsContainer');
    container.innerHTML = "";

    if (tools.length === 0) {
        container.innerHTML = "<p class='text-red-600'>No tools found matching your criteria.<br>Try adjusting your filters.</p>";
        return;
    }

    tools.forEach(tool => {
        container.innerHTML += `
            <div class='bg-blue-100 p-4 rounded-lg shadow'>
                <h3 class='text-lg font-bold mb-2'>${tool.name}</h3>
                <p><a class='text-blue-700 underline' href='/tutorials/${tool.tutorial}.html' target='_blank'>View Tutorial</a></p>
                <div class='mt-4 flex gap-2'>
                    <button class='bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700'>I’ll do it myself</button>
                    <button class='bg-gray-200 px-4 py-2 rounded hover:bg-gray-300'>Please help me</button>
                </div>
            </div>
        `;
    });
}
