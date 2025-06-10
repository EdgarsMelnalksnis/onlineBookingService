<?php include_once '../includes/header.php'; ?>

<section class="text-center mb-10">
    <h2 class="text-3xl font-semibold mb-4">Find the Best Booking Tool</h2>
    <p class="mb-6 text-gray-600">Use our calculator to find the perfect booking solution for your needs</p>
</section>

<section id="calculator" class="bg-white rounded-lg shadow-md mb-10 p-6 max-w-4xl mx-auto">
    <form id="toolForm" class="grid md:grid-cols-3 gap-6">
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-2">Website Platform</label>
            <select name="platform" class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500">
                <option value="wordpress">WordPress</option>
                <option value="wix">Wix</option>
                <option value="html">Static HTML</option>
                <option value="shopify">Shopify</option>
                <option value="squarespace">Squarespace</option>
            </select>
        </div>
        
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-2">Budget</label>
            <select name="budget" class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500">
                <option value="free">Free</option>
                <option value="10">Under $10/month</option>
                <option value="25">Under $25/month</option>
                <option value="unlimited">Unlimited</option>
            </select>
        </div>
        
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-2">Customization Level</label>
            <select name="customization" class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500">
                <option value="low">Basic</option>
                <option value="medium">Moderate</option>
                <option value="high">Advanced</option>
            </select>
        </div>
        
        <div class="md:col-span-3 text-center">
            <button type="submit" class="bg-green-600 text-white px-8 py-3 rounded-lg hover:bg-green-700 transition-colors duration-300 font-medium text-lg">
                Find Matching Tools
            </button>
        </div>
    </form>
    
    <div id="results" class="mt-10 space-y-4 hidden"></div>
</section>

<script>
document.getElementById('toolForm').addEventListener('submit', function(e) {
    e.preventDefault();
    const platform = this.platform.value;
    const budget = this.budget.value;
    const customization = this.customization.value;
    const results = document.getElementById('results');
    
    // Clear previous results
    results.innerHTML = '';
    results.classList.remove('hidden');
    
    // Get recommendations based on selections
    const recommendations = getRecommendations(platform, budget, customization);
    
    if (recommendations.length === 0) {
        results.innerHTML = `
            <div class="p-6 bg-red-50 border border-red-200 rounded-lg text-center">
                <h3 class="text-lg font-medium text-red-800">No tools found matching your criteria</h3>
                <p class="text-red-600">Try adjusting your filters for more options</p>
            </div>
        `;
        return;
    }
    
    // Display recommendations
    results.innerHTML = `
        <h3 class="text-xl font-semibold text-gray-800 mb-6 text-center">Recommended Tools</h3>
        <div class="grid md:grid-cols-2 gap-6">
            ${recommendations.map(rec => createToolCard(rec)).join('')}
        </div>
    `;
});

function getRecommendations(platform, budget, customization) {
    const tools = {
        wordpress: {
            free: [
                { 
                    name: "Amelia Lite", 
                    description: "Basic booking plugin for WordPress with calendar view", 
                    features: ["Calendar view", "Basic scheduling", "Email notifications"],
                    tutorial: "amelia-lite"
                }
            ],
            '10': [
                { 
                    name: "Bookly PRO (Basic)", 
                    description: "Flexible plugin with add-ons for service businesses", 
                    features: ["Staff management", "Service extras", "Coupons"],
                    tutorial: "bookly-pro"
                }
            ],
            // ... other WordPress options
        },
        // ... other platforms
    };

    return tools[platform]?.[budget] || [];
}

function createToolCard(tool) {
    return `
        <div class="bg-white border border-gray-200 rounded-lg shadow-sm overflow-hidden hover:shadow-md transition-shadow">
            <div class="p-6">
                <h4 class="text-lg font-semibold mb-2">${tool.name}</h4>
                <p class="text-gray-600 mb-4">${tool.description}</p>
                
                <ul class="space-y-2 mb-6">
                    ${tool.features.map(f => `<li class="flex items-center">
                        <svg class="w-4 h-4 mr-2 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                        ${f}
                    </li>`).join('')}
                </ul>
                
                <div class="flex flex-wrap gap-3">
                    <button onclick="openTutorial('${tool.tutorial}')" 
                            class="flex-1 bg-blue-50 text-blue-600 px-4 py-2 rounded-md hover:bg-blue-100 transition-colors border border-blue-100">
                        I'll do it myself
                    </button>
                    <button onclick="requestHelp('${tool.name}')" 
                            class="flex-1 bg-green-600 text-white px-4 py-2 rounded-md hover:bg-green-700 transition-colors">
                        Get help implementing
                    </button>
                </div>
            </div>
        </div>
    `;
}

function openTutorial(toolId) {
    // Implement tutorial loading
    console.log("Loading tutorial for:", toolId);
}

function requestHelp(toolName) {
    // Implement help request
    console.log("Requesting help with:", toolName);
}
</script>

<?php include_once '../includes/footer.php'; ?>
