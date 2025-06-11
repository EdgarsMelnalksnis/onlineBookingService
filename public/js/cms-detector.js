
async function detectCMS() {
    const urlInputRaw = document.getElementById("site-url").value.trim();
    const resultDiv = document.getElementById("detection-result");
    const screenshotImg = document.getElementById("screenshot-preview");

    resultDiv.innerHTML = "🔄 Starting detection...<br>";
    screenshotImg.src = "";

    let urlInput = urlInputRaw;
    if (!urlInput.startsWith("http://") && !urlInput.startsWith("https://")) {
        urlInput = "https://" + urlInput;
        resultDiv.innerHTML += `🌐 Added https:// prefix. New URL: ${urlInput}<br>`;
    }

    try {
        const proxy = "https://api.allorigins.win/get?url=" + encodeURIComponent(urlInput);
        resultDiv.innerHTML += `📡 Fetching via AllOrigins proxy...<br>`;

        const response = await fetch(proxy);
        resultDiv.innerHTML += `✅ Fetched response, parsing...<br>`;

        const data = await response.json();
        const html = data.contents;

        let cms = "Unknown";

        resultDiv.innerHTML += `🔍 Scanning HTML for CMS markers...<br>`;

        if (html.includes("wp-content") || html.includes("wordpress")) cms = "WordPress";
        else if (html.includes("wix.com")) cms = "Wix";
        else if (html.includes("shopify")) cms = "Shopify";
        else if (html.includes("squarespace")) cms = "Squarespace";
        else if (html.includes("weebly")) cms = "Weebly";
        else if (html.includes("webflow")) cms = "Webflow";

        resultDiv.innerHTML += `<strong>🎯 Detected CMS:</strong> ${cms}<br><br>
        <strong>Integration Options:</strong><br>
        <pre>
1️⃣ Add this button in your header:
&lt;a href="https://yourbookinglink.com" class="btn btn-primary"&gt;Book Online&lt;/a&gt;

2️⃣ Embed this form in main page:
&lt;iframe src="https://yourbookinglink.com/form" style="width:100%; height:600px;"&gt;&lt;/iframe&gt;
        </pre>`;

        // Set screenshot preview
        screenshotImg.src = "https://image.thum.io/get/" + urlInput;

    } catch (e) {
        console.error("Detection error:", e);
        resultDiv.innerHTML += `❌ Error occurred: ${e.message}<br>`;
        resultDiv.innerHTML += "⚠️ Failed to fetch the website. Make sure it's accessible and CORS is allowed.";
    }
}
