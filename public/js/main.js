
document.addEventListener('DOMContentLoaded', function () {
    document.getElementById('findToolsBtn').addEventListener('click', function () {
        const platform = document.querySelector('select[name="platform"]').value;
        const budget = document.querySelector('select[name="budget"]').value;
        const customization = document.querySelector('select[name="customization"]').value;

        
    logDebug("Reading selected filters...");
    logDebug("Platform: " + platform + ", Budget: " + budget + ", Customization: " + customization);
    const results = getEnhancedRecommendations(platform, budget, customization);
    logDebug("Found " + results.length + " matching tools.");
    
        renderResults(results);
    });
});

function getEnhancedRecommendations(platform, budget, customization) {
    const tools = [
        { name: "TidyCal", platform: "html", budget: "free", customization: "low", tutorial: "tidycal" },
        { name: "Wix Bookings (Free)", platform: "wix", budget: "free", customization: "low", tutorial: "wix-bookings-free" },
        { name: "Wix Bookings Pro", platform: "wix", budget: "25", customization: "high", tutorial: "wix-bookings-pro" },
        { name: "Calendly Pro", platform: "html", budget: "25", customization: "high", tutorial: "calendly-pro" },
        { name: "Amelia Lite", platform: "wordpress", budget: "free", customization: "low", tutorial: "amelia-lite" },
        { name: "Amelia Pro", platform: "wordpress", budget: "25", customization: "high", tutorial: "amelia-pro" },
        { name: "Bookly Pro (Basic)", platform: "wordpress", budget: "25", customization: "low", tutorial: "bookly-pro-basic" },
        { name: "Acuity Free", platform: "squarespace", budget: "free", customization: "medium", tutorial: "acuity-scheduling-free-tier" },
        { name: "Acuity Paid", platform: "squarespace", budget: "25", customization: "high", tutorial: "acuity-scheduling-paid" },
        { name: "BookThatApp", platform: "shopify", budget: "10", customization: "medium", tutorial: "bookthatapp-basic" },
        { name: "Sesami", platform: "shopify", budget: "25", customization: "high", tutorial: "sesami-or-appointly" },
        { name: "SimplyBook.me", platform: "html", budget: "free", customization: "medium", tutorial: "simplybookme" },
        { name: "Google Appointments", platform: "html", budget: "free", customization: "low", tutorial: "google-appointment" }
    ];

    const customizationRanks = {
        low: 1,
        medium: 2,
        high: 3
    };

    const budgetToNumber = {
        free: 0,
        "10": 10,
        "25": 25,
        unlimited: Infinity
    };

    const userBudget = budgetToNumber[budget];
    const userCustomization = customizationRanks[customization];

    return tools.filter(tool => {
        const toolBudget = budgetToNumber[tool.budget];
        const toolCustomization = customizationRanks[tool.customization];
        return (
            tool.platform === platform &&
            toolBudget <= userBudget &&
            toolCustomization >= userCustomization
        );
    });
}


function logDebug(msg) {
    const out = document.getElementById('debugOutput');
    out.textContent += "\n" + msg;
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
            <div class='bg-blue-100 p-4 rounded-lg shadow mb-4'>
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
