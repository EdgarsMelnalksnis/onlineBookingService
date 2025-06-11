<?php include_once '../includes/header.php'; ?>

<section class="text-center mb-10">
  <h2 class="text-3xl font-semibold mb-4">Find the Best Booking Tool</h2>
  <p class="mb-6 text-gray-600">Use our calculator to find the perfect booking solution for your needs</p>
</section>

<section class="bg-white rounded-2xl shadow-xl p-8 max-w-6xl mx-auto grid md:grid-cols-2 gap-10">
  <!-- Left: Filters -->
  <div>
    <h1 class="text-3xl font-bold mb-6">Find the Right<br>Online Booking Tool</h1>

    <form id="toolForm" class="space-y-4">
      <div>
        <label class="block font-medium text-gray-700 mb-1">Website Platform</label>
        <select name="platform" class="w-full p-3 border border-gray-300 rounded-lg">
          <option value="wordpress" selected>WordPress</option>
          <option value="wix">Wix</option>
          <option value="html">Static HTML</option>
          <option value="shopify">Shopify</option>
          <option value="squarespace">Squarespace</option>
        </select>
      </div>

      <div>
        <label class="block font-medium text-gray-700 mb-1">Budget</label>
        <select name="budget" class="w-full p-3 border border-gray-300 rounded-lg">
          <option value="free" selected>Free</option>
          <option value="10">Under $10/month</option>
          <option value="25">Under $25/month</option>
          <option value="unlimited">Unlimited</option>
        </select>
      </div>

      <div>
        <label class="block font-medium text-gray-700 mb-1">Customization Level</label>
        <select name="customization" class="w-full p-3 border border-gray-300 rounded-lg">
          <option value="low" selected>Basic</option>
          <option value="medium">Medium</option>
          <option value="high">Advanced</option>
        </select>
      </div>

      <button type="button" id="findToolsBtn" class="w-full mt-4 bg-blue-600 text-white py-3 rounded-lg hover:bg-blue-700">
        Find Matching Tools
      </button>
    </form>
  </div>

  <!-- Right: Illustration + Results -->
  <div class="flex flex-col items-center justify-center">
    <img src="images/goalUI.png" alt="Booking Illustration" class="w-64 mb-6" />
    <div id="resultsContainer" class="w-full bg-white rounded-xl shadow-md p-6">
      <p class="text-gray-700">Recommended Tools will appear here...</p>
    </div>
  </div>

</section>

<?php include_once '../includes/footer.php'; ?>

<script src="js/cms-detector.js"></script>

<script src="js/main.js"></script>
